import "slick-carousel";
import "easyzoom";

(function($) {
	/* This handler requires:
    - slick
    - easyzoom
    - magnetic-popup
    - Variation Swatches for Woocommerce plugin
    */

	// Initiate EasyZoom instances
	let $easyzoom = $(".easyzoom").easyZoom();
	$easyzoom.each(i => {
		$easyzoom
			.eq(i)
			.data("easyZoom")
			.teardown();
		$easyzoom
			.eq(i)
			.data("easyZoom")
			._init();
	});

	// Initiate Magnetic PopUp
	$(".img-popup").magnificPopup({
		type: "image",
		gallery: {
			enabled: true
		}
	});

	const mainGallerySlickSettings = {
		infinite: false,
		// centerMode: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		draggable: false,
		fade: false,
		asNavFor: "#sideGallerySlickContainer"
	};

	const sideGallerySlickSettings = {
		infinite: false,
		adaptiveHeight: true,
		slidesToShow: 2,
		slidesToScroll: 1,
		vertical: true,
		asNavFor: "#mainGallerySlickContainer",
		dots: false,
		focusOnSelect: true,
		fade: false,
		prevArrow: '<span class="slick-arrow">^</span>',
		nextArrow: '<span class="slick-arrow">v</span>'
		// responsive: [
		// 	{
		// 		breakpoint: 1365,
		// 		settings: {
		// 			slidesToShow: 3
		// 		}
		// 	},
		// 	{
		// 		breakpoint: 991,
		// 		settings: {
		// 			slidesToShow: 4
		// 		}
		// 	},
		// 	{
		// 		breakpoint: 767,
		// 		settings: {
		// 			slidesToShow: 4
		// 		}
		// 	},
		// 	{
		// 		breakpoint: 575,
		// 		settings: {
		// 			slidesToShow: 2
		// 		}
		// 	}
		// ]
	};

	/*-------------------------------------
        Product details big image slider
    ---------------------------------------*/
	$("#mainGallerySlickContainer").slick(mainGallerySlickSettings);

	/*----------------------------------------
	      Product details small image slider 2
	  ------------------------------------------*/
	$("#sideGallerySlickContainer").slick(sideGallerySlickSettings);

	// Helper functions
	const removeArrayOfNodes = arr => {
		arr &&
			arr.forEach(node => {
				node && node.remove();
			});
	};

	// Callback
	const callback = (dataJSON, thisAjaxLoader) => {
		//get data
		const variationValue = dataJSON.variation_value;
		let variationGalleryThumbnailsURLs =
			dataJSON.variation_gallery_urls_thumbnails;
		let variationGalleryFullSizeURLs = dataJSON.variation_gallery_urls_fullsize;

		if (variationValue === "reset_variations") {
			variationGalleryFullSizeURLs = dataJSON.product_gallery_urls_fullsize;
			variationGalleryThumbnailsURLs = dataJSON.product_gallery_urls_thumbnails;
		}

		if (
			variationGalleryThumbnailsURLs &&
			variationGalleryThumbnailsURLs.length <= 0
		) {
			console.error("Error: No images for variations have been added.");
			return;
		}

		/* SIDE GALLERY SLICK */
		// Clear Slick container
		$("#sideGallerySlickContainer").slick("unslick");

		const currentSideGallerySlickContainer = document.querySelector(
			"#sideGallerySlickContainer"
		);
		const currentSlickGalleryElementsArr = Array.from(
			currentSideGallerySlickContainer.children
		);
		currentSlickGalleryElementsArr &&
			removeArrayOfNodes(currentSlickGalleryElementsArr);

		// Create slick slides with new data
		const appendSlickSlides = new Promise((resolve, reject) => {
			variationGalleryThumbnailsURLs &&
				variationGalleryThumbnailsURLs.forEach((url, i, array) => {
					console.log(url);
					let markup = `
          <div class="product-dec-small active">
            <img src="${url[0]}" alt="">
          </div>
        `;
					currentSideGallerySlickContainer.innerHTML += markup;
					if (i === array.length - 1) resolve();
				});
		});

		appendSlickSlides.then(() => {
			// Re-init Side Gallery Slick
			console.log("Slides Side Gallery appended");
			$("#sideGallerySlickContainer").slick(sideGallerySlickSettings);
		});

		/* MAIN GALLERY SLICK */
		// Clear Slick container
		$("#mainGallerySlickContainer").slick("unslick");

		const currentMainGallerySlickContainer = document.querySelector(
			"#mainGallerySlickContainer"
		);

		if (!currentMainGallerySlickContainer) {
			console.error("Error: Variation Gallery is empty.");
			return;
		}

		let currentMainGallerySlickElementsArr;

		if (currentMainGallerySlickContainer.children) {
			currentMainGallerySlickElementsArr = Array.from(
				currentMainGallerySlickContainer.children
			);
		}

		currentMainGallerySlickElementsArr &&
			removeArrayOfNodes(currentMainGallerySlickElementsArr);

		// Create slick slides with new data
		const appendSlickSlidesMainGallery = new Promise((resolve, reject) => {
			variationGalleryFullSizeURLs &&
				variationGalleryFullSizeURLs.forEach((url, i, array) => {
					let markup = `
						<div class="easyzoom-style">
						<div class="easyzoom easyzoom--overlay">
							<a href="${url[0]}">
								<img class="" src="${url[0]}" alt="">
							</a>
						</div>
						<a class="easyzoom-pop-up img-popup" href="${url[0]}"><i class="lastudioicon-full-screen"></i></a>
						</div>
						`;
					currentMainGallerySlickContainer.innerHTML += markup;
					if (i === array.length - 1) resolve();
				});
		});

		appendSlickSlidesMainGallery.then(() => {
			// Re-init Main Gallery Slick
			console.log("Slides Main Gallery appended");
			$("#mainGallerySlickContainer")
				.not(".slick-initialized")
				.slick(mainGallerySlickSettings);
			// Remove ajax loader
			thisAjaxLoader.classList.remove("my-ajax-loader--active");
		});

		// Re-init Magnetic PopUp
		$(".img-popup").magnificPopup({
			type: "image",
			gallery: {
				enabled: true
			}
		});

		// Re-init Easy zoom
		$easyzoom = $(".easyzoom").easyZoom();
		$easyzoom.each(i => {
			$easyzoom
				.eq(i)
				.data("easyZoom")
				.teardown();
			$easyzoom
				.eq(i)
				.data("easyZoom")
				._init();
		});

		//End of callback function
	};

	// Ajax call trigger

	document.addEventListener("click", e => {
		if (
			e.target.classList.contains(".woo-variation-raw-select") ||
			e.target.closest(".woo-variation-raw-select")
		) {
			//Change variation gallery

			let variationValue =
				e.target.value ||
				e.target.closest(".woo-variation-raw-select").dataset.value;

			const ajaxURL = ajax_params.ajaxurl;
			const productID = document.querySelector("#productIDHolder").dataset
				.productId;
			const galleryWrapper = document.querySelector(
				".single-product-gallery__wrapper"
			);
			const thisAjaxLoader = galleryWrapper.querySelector(".my-ajax-loader");

			let start = new Date();
			let end;
			let timeInMilliseconds;

			$.ajax({
				url: ajaxURL + "?action=get_variation_gallery_with_ajax",
				type: "POST",
				data: { variation_value: variationValue, product_id: productID },

				beforeSend: function() {
					thisAjaxLoader.classList.add("my-ajax-loader--active");
				},

				success: function(data) {
					console.log("Ajax call successfull.");
					const dataJSON = JSON.parse(data);
					console.log(dataJSON);
					callback(dataJSON, thisAjaxLoader);
				},

				error: function(err) {
					console.error("Ajax call failure.");
					console.log(err);
				},

				complete: function() {
					console.log("Ajax call complete.");

					end = new Date();
					timeInMilliseconds = end - start;

					console.log(`duration: ${timeInMilliseconds}`);
				}
			});
		}

		if (
			e.target.classList.contains(".reset_variations") ||
			e.target.closest(".reset_variations")
		) {
			//Clear chosen variation
			const ajaxURL = ajax_params.ajaxurl;
			const productID = document.querySelector("#productIDHolder").dataset
				.productId;
			const galleryWrapper = document.querySelector(
				".single-product-gallery__wrapper"
			);
			const thisAjaxLoader = galleryWrapper.querySelector(".my-ajax-loader");

			let start = new Date();
			let end;
			let timeInMilliseconds;

			$.ajax({
				url: ajaxURL + "?action=get_product_main_image_and_gallery_with_ajax",
				type: "POST",
				data: { variation_value: "reset_variations", product_id: productID },

				beforeSend: function() {
					thisAjaxLoader.classList.add("my-ajax-loader--active");
				},

				success: function(data) {
					console.log("Ajax call successfull.");
					const dataJSON = JSON.parse(data);
					console.log(dataJSON);
					callback(dataJSON, thisAjaxLoader);
				},

				error: function(err) {
					console.error("Ajax call failure.");
					console.log(err);
				},

				complete: function() {
					console.log("Ajax call complete.");

					end = new Date();
					timeInMilliseconds = end - start;

					console.log(`duration: ${timeInMilliseconds}`);
				}
			});
		}
	});
})(jQuery);
