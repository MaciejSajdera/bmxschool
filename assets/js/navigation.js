/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

export default class Navigation {
	constructor() {
		this.siteHeader = document.querySelector(".site-header");
		this.desktopMenuContainer = document.querySelector(
			".desktop-menu-container"
		);
		this.mobileMenuContainer = document.querySelector(".mobile-menu-wrapper");
		this.button = document.querySelector(".menu-toggle");
		this.mainMenu = document.querySelector("#main-menu");
	}

	setupNavigation() {
		// Toggle mobile navigation
		this.button.onclick = () => {
			if (this.mobileMenuContainer.classList.contains("toggled")) {
				this.mobileMenuContainer.classList.remove("toggled");
				this.button.setAttribute("aria-expanded", "false");
			} else {
				this.mobileMenuContainer.classList.add("toggled");
				this.button.setAttribute("aria-expanded", "true");
			}
		};

		const handleHeaderOnScroll = (e) => {
			let lastScrollTop = 0;

			window.addEventListener(
				"scroll",
				() => {
					let st = window.pageYOffset || document.documentElement.scrollTop;
					if (st > lastScrollTop) {
						this.siteHeader.classList.add("site-header--scrolled");
					}
					if (st === 0) {
						this.siteHeader.classList.remove("site-header--scrolled");
					}

					lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
				},
				false
			);
		};

		handleHeaderOnScroll();

		const handleDesktopChange = (e) => {
			if (e.matches) {
				console.log("Media Query Desktop Matched!");

				const allMenuLinks =
					this.desktopMenuContainer.querySelectorAll("#main-menu > li");

				console.log(this.desktopMenuContainer);

				console.log(allMenuLinks);

				const background = document.querySelector(".dropdownBackground");

				allMenuLinks.forEach((link) => {
					link.addEventListener("mouseenter", handleEnter);
				});

				function handleEnter(e) {
					// console.log(e.target);

					const submenu = this.querySelector(".sub-menu");

					if (!submenu) {
						return;
					}

					submenu.classList.add("sub-menu--expanded");
					this.classList.add("trigger-enter");

					setTimeout(
						() =>
							this.classList.contains("trigger-enter") &&
							this.classList.add("trigger-enter-active"),
						150
					);

					background.classList.add("open");

					const dropdown = this.querySelector(".sub-menu");
					const dropdownCoords = dropdown.getBoundingClientRect();
					const shopMenuCoords = shopMenu.getBoundingClientRect();

					const coords = {
						height: dropdownCoords.height,
						width: dropdownCoords.width,
						top: 5,
						left: dropdownCoords.left - shopMenuCoords.left,
					};

					// console.log(`dropdownCoords.top${dropdownCoords.top}`);
					// console.log(
					// 	`mainMenuContainerCoords.top${mainMenuContainerCoords.top}`
					// );
					// console.log(
					// 	`mainMenuTopContainerCoords.top${mainMenuTopContainerCoords.top}`
					// );

					background.style.setProperty("width", `${coords.width}px`);
					background.style.setProperty("height", `${coords.height}px`);
					background.style.setProperty(
						"transform",
						`translate(${coords.left}px, ${coords.top}px)`
					);
				}

				allMenuLinks.forEach((link) => {
					link.addEventListener("mouseleave", handleLeave);
				});

				function handleLeave(e) {
					const submenu = this.querySelector(".sub-menu");

					if (!submenu) {
						return;
					}

					submenu.classList.remove("sub-menu--expanded");
					this.classList.remove("trigger-enter");
					this.classList.remove("trigger-enter-active");

					background.classList.remove("open");
				}
			}
		};

		const mediaQueryDesktop = window.matchMedia("(min-width: 1024px)");
		mediaQueryDesktop.addListener(handleDesktopChange);
		handleDesktopChange(mediaQueryDesktop);

		const mobileMenu = () => {
			const nav = document.querySelector("#mobile-menu");
			const allMenuItemsWithChildren = nav.querySelectorAll(
				".menu-item-has-children"
			);

			const wooMenu = document.querySelector("#menu-woomenu");

			allMenuItemsWithChildren.forEach((item) => {
				const link = item.querySelector("A");
				link.style.pointerEvents = "none";
			});

			// Flags
			let backButtonAppended = false;

			document.addEventListener("click", function (e) {
				// console.log(e);

				if (e.target.classList.contains("menu-item-has-children")) {
					const expandSubMenu = e.target.querySelector(".show-submenu");

					expandSubMenu.querySelector("#back-button")
						? expandSubMenu.querySelector("#back-button").remove()
						: "";

					const myBackButton = document.createElement("LI");
					myBackButton.id = "back-button";
					myBackButton.classList.add("back-button", "menu-item");

					const myBackButtonAnchor = document.createElement("A");
					myBackButtonAnchor.setAttribute("href", "#");
					myBackButtonAnchor.innerText =
						expandSubMenu.previousElementSibling.innerText;

					const myBackButtonSpan = document.createElement("SPAN");
					myBackButtonSpan.classList.add("hide-submenu");

					myBackButton.appendChild(myBackButtonAnchor);
					myBackButton.appendChild(myBackButtonSpan);

					const submenu = expandSubMenu.nextElementSibling;

					const appendButton = () => {
						if (!backButtonAppended) {
							submenu.appendChild(myBackButton);
							backButtonAppended = true;
						}
					};

					appendButton();

					// expandSubMenu.closest("UL").classList.add("move-back");

					submenu.classList.add("sub-menu--expanded");

					//delay
					if (wooMenu) {
						setTimeout(function () {
							wooMenu.scrollTop = 0;
						}, 0);
					}
				}

				if (e.target.classList.contains("back-button")) {
					const submenuExpanded = e.target.closest(".sub-menu--expanded");
					submenuExpanded.classList.remove("sub-menu--expanded");

					// const menuMovedBack = document.querySelector(".move-back");
					// menuMovedBack.classList.remove("move-back");

					setTimeout(() => {
						e.target.remove();
					}, 500);

					backButtonAppended = false;
				}

				const searchMobileHolder = document.querySelector(
					".search-mobile-holder"
				);
				const searchFormMobileTrigger = searchMobileHolder.querySelector(
					".dgwt-wcas-enable-mobile-form"
				);

				if (e.target.matches(".search-link")) {
					// searchModal.classList.add("open");
					searchFormMobileTrigger.click();
				} else {
					return;
				}
			});
		};

		const mediaQueryMobile = window.matchMedia("(max-width: 1024px)");

		let mobileMenuWasAlreadyFired = false;

		function handleMobileChange(e) {
			// Check if the media query is true
			if (e.matches && !mobileMenuWasAlreadyFired) {
				// Then log the following message to the console
				console.log("Media Query Mobile Matched!");
				mobileMenu();
				mobileMenuWasAlreadyFired = true;
			}
		}

		mediaQueryMobile.addListener(handleMobileChange);
		handleMobileChange(mediaQueryMobile);
	}
}
