/**
 * Main JavaScript file.
 */
import Navigation from "./navigation.js";
import skipLinkFocus from "./skip-link-focus-fix.js";

document.addEventListener("DOMContentLoaded", () => {
	const navigation = new Navigation();
	skipLinkFocus();
	navigation.setupNavigation();

	const myPreloader = document.querySelector(".my-preloader");
	const page = document.querySelector("#page");

	setTimeout(() => {
		myPreloader.classList.add("my-preloader-off");
		page.classList.add("page-loaded");
		document.querySelector("body").classList.add("body-loaded");
	}, 600);

	setTimeout(() => {
		myPreloader.classList.add("my-preloader-none");
		page.classList.add("page-loaded");
	}, 700);

	// setTimeout(() => {
	// 	cookiesNotification();
	// }, 1000);

	const cookiesNotification = () => {
		const cookiesInfo = document.querySelector(".cookie-law-notification");
		const cookiesAcceptButton = document.querySelector("#cookie-law-button");

		if (localStorage.getItem("cookiesAreAccepted")) {
			return;
		} else {
			cookiesInfo.classList.add("cookies-notification-on");
			cookiesAcceptButton &&
				cookiesAcceptButton.addEventListener("click", () => {
					localStorage.setItem("cookiesAreAccepted", "1");
					cookiesInfo.classList.add("cookies-notification-off");
				});
			return;
		}
	};

	/* Light YouTube Embeds by @labnol */
	/* Web: http://labnol.org/?p=27941 */

	var div,
		n,
		v = document.getElementsByClassName("youtube-player");
	for (n = 0; n < v.length; n++) {
		div = document.createElement("div");
		div.setAttribute("data-id", v[n].dataset.id);
		div.innerHTML = labnolThumb(v[n].dataset.id);
		div.onclick = labnolIframe;
		v[n].appendChild(div);
	}

	function labnolThumb(id) {
		var thumb =
				'<img src="https://bmxschool.grapewebtech.pl/wp-content/uploads/2022/07/bmxschool_banner_black.jpg">',
			play = '<div class="play"></div>';
		return thumb.replace("ID", id) + play;
	}
	function labnolIframe() {
		var iframe = document.createElement("iframe");
		var embed = "https://www.youtube.com/embed/ID?autoplay=1";
		iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
		iframe.setAttribute("frameborder", "0");
		iframe.setAttribute("allowfullscreen", "1");
		this.parentNode.replaceChild(iframe, this);
	}

	/* Global scroll event listener */
	const scrollToTopBtn = document.querySelector(".scrollToTopBtn");

	document.addEventListener("scroll", () => {
		if (scrollToTopBtn) {
			if (scrollY > window.innerHeight) {
				scrollToTopBtn.classList.add("showBtn");
			} else {
				scrollToTopBtn.classList.remove("showBtn");
			}
			scrollToTopBtn.addEventListener("click", () => {
				window.scrollTo({
					top: 0,
					behavior: "smooth",
				});
			});
		}
	});

	// Cart
});
