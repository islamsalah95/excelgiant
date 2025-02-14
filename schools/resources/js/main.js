// Vendor JS
import 'bootstrap/dist/js/bootstrap.min.js';
import WOW from 'wow.js';
import Swiper from 'swiper/bundle';
import Cookies from 'js-cookie';
import moment from 'moment';

// Vendors CSS
import 'modern-normalize/modern-normalize.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'wow.js/css/libs/animate.css';
import 'swiper/css/bundle';

// Styles
import '../scss/base.scss';

(function () {
	"use strict";

    /* Components */

    // Scroll to X
    function scrollTo(element, to = 0, duration = 500) {
        const start = element.scrollTop;
        const change = to - start;
        const increment = 20;
        let currentTime = 0;

        const animateScroll = () => {
            currentTime += increment;
            element.scrollTop = Math.easeInOutQuad(currentTime, start, change, duration);
            if (currentTime < duration) {
                setTimeout(animateScroll, increment);
            }
        };

        animateScroll();
    }

    // Easing
    Math.easeInOutQuad = function (t, b, c, d) {
        t /= d / 2;
        if (t < 1) return (c / 2) * t * t + b;
        t--;
        return (-c / 2) * (t * (t - 2) - 1) + b;
    };

    // Cart Offcanvas
    const CartOffcanvas = document.getElementById('cart__offcanvas');
    const offcanvasToggle = async () => {
        // await updateCartOffcanvas();

        CartOffcanvas.classList.toggle('show');
        if(CartOffcanvas.classList.contains('show')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = 'auto';
        }
    }

    const AddToCart = (btn) => {

        // Check if added to cart before
        if (Cookies.get('cartItems')) {
            const cartItems = JSON.parse(Cookies.get('cartItems'));
            const section = btn.closest('.pricing-box');
            const itemCode = section.querySelector('.title').textContent;

            if(cartItems.some(item => item.name === itemCode)) {
                return;
            }
        }

        const section = btn.closest('.pricing-box');

        const itemData = {
            'name': section.querySelector('.title').textContent,
            'price': section.querySelector('.price').textContent,
            'period': section.querySelector('.period').textContent,
            'variants': [],
        };

        const variants = section.querySelectorAll('.feature-item');
        variants.forEach(variant => {
            const variantName = variant.querySelector('.name').textContent;
            const variantValue = variant.querySelector('.value').textContent;
            itemData['variants'].push([variantName, variantValue]);
        });

        if (Cookies.get('cartItems')) {
            let cartItems = JSON.parse(Cookies.get('cartItems'));
            cartItems.push(itemData);
            Cookies.set('cartItems', JSON.stringify(cartItems), { expires: 30 });
        } else {
            Cookies.set('cartItems', JSON.stringify([itemData]), { expires: 30 });
        }
    }

    const updateCartOffcanvas = () => {
        const cartItems = JSON.parse(Cookies.get('cartItems'));
        const cartItemsContainer = document.querySelector('#cart__offcanvas .offcanvas-content');
        cartItemsContainer.innerHTML = '';

        cartItems.forEach(item => {
            cartItemsContainer.innerHTML += `
                <div class="item">
                    <div class="heading">
                        <span class="itemName">${item.name}</span>
                        <span class="itemDelete">
                            <i class="fa-regular fa-trash-can"></i>
                        </span>
                    </div>
                    <div class="variants">
                    `
                    +
                    item.variants.map((variant, i) => {
                        if (++i === item.variants.length) {
                            return `<span class="itemVariant">${variant[0]}: ${variant[1]}</span>`;
                        } else {
                            return `<span class="itemVariant">${variant[0]}: ${variant[1]}</span> | `;
                        }
                    }).join('')
                    +
                    `
                    </div>
                    <div class="price">
                        <span class="itemPrice">${item.price}</span>
                    </div>
                    <small class="itemPeriod">${item.period}</small>
                </div>
            `;
        });

        const itemDelete = cartItemsContainer.querySelectorAll('.itemDelete');
        itemDelete.forEach(btn => {
            btn.addEventListener('click', () => {
                const itemCode = btn.closest('.item').querySelector('.itemName').textContent;
                deleteCartItem(itemCode);
                btn.closest('.item').remove();
            });
        });
    }

    const deleteCartItem = (itemCode) => {
        let cartItems = JSON.parse(Cookies.get('cartItems'));
        cartItems = cartItems.filter(item => item.name !== itemCode);
        Cookies.set('cartItems', JSON.stringify(cartItems), { expires: 30 });
    }

    /* ================================ */

	/* Window Events */

    // Scroll
	window.onscroll = function () {
		// show or hide the back-top-top button
		const backToTop = document.querySelector(".back-to-top");
		if (
			document.body.scrollTop > 50 ||
			document.documentElement.scrollTop > 50
		) {
			backToTop.style.display = "flex";
		} else {
			backToTop.style.display = "none";
		}
	};

    /* ================================ */

    /* Functionalities */

	// Close navbar-collapse when a clicked
	let navbarToggler = document.querySelector(".navbar-toggler");
	const navbarCollapse = document.querySelector(".navbar-collapse");
	document.querySelectorAll(".ud-menu-scroll").forEach((e) =>
		e.addEventListener("click", () => {
			navbarToggler.classList.remove("active");
			navbarCollapse.classList.remove("show");
		})
	);
	navbarToggler.addEventListener("click", function () {
		navbarToggler.classList.toggle("active");
		navbarCollapse.classList.toggle("show");
	});

	// Submenu
	const submenuButton = document.querySelectorAll(".nav-item-has-children");
	submenuButton.forEach((elem) => {
		elem.querySelector("a").addEventListener("click", () => {
			elem.querySelector(".ud-submenu").classList.toggle("show");
		});
	});

    // Back to top
    document.querySelector(".back-to-top").onclick = () => {
        scrollTo(document.documentElement);
    };

    // Scroll to section
    const pageLink = document.querySelectorAll(".ud-menu-scroll");
    pageLink.forEach((elem) => {
        elem.addEventListener("click", (e) => {
            e.preventDefault();

            if(elem.getAttribute("href").split('')[0] === "#") {
                document.querySelector(elem.getAttribute("href")).scrollIntoView({
                    behavior: "smooth",
                    offsetTop: 1 - 60,
                });
            }
        });
    });

    // TOC
    const TOC = document.getElementById('service__TOC');
    if(TOC) {
        const TOCToggle = () => {
            TOC.classList.toggle('show');

            if(TOC.classList.contains('show')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'auto';
            }
        }

        TOC.nextElementSibling.addEventListener('click', TOCToggle);

        TOC.querySelectorAll('ul li a, [data-offcanvas-toc]').forEach(link => {
            link.addEventListener('click', TOCToggle);
        });
    }

    // Cart OffCanvas
    if (CartOffcanvas) {
        CartOffcanvas.nextElementSibling.addEventListener('click', offcanvasToggle);
        document.querySelectorAll('[data-offcanvas-cart]').forEach(link => {
            link.addEventListener('click', offcanvasToggle);
        });
    }

    // Add to cart [Logged in]
    const addToCart = document.querySelectorAll('[data-add-to-cart]');
    // addToCart.forEach(btn => {
    //     btn.addEventListener('click', async (e) => {
    //         e.preventDefault();
    //
    //         await AddToCart(e.target);
    //         offcanvasToggle();
    //     });
    // });

    if (document.querySelector('[data-load-news]')) {
        window.addEventListener('load', (e) => {
            fetch('https://graph.facebook.com/v22.0/562939826892804/published_posts?fields=message%2Cmessage_tags%2Ccreated_time%2Cvideo_buying_eligibility%2Cpermalink_url%2Cfull_picture%2Cthumbnails&access_token=EAAc4uMoqyoYBO3w20tUOIIVsWLX25KWNZA7hpZBaiNIxf23ZAZBB7rXJ8AOVnZCpYYPzbTYlYeUb5BVYZClgkwHkhVV6kYtzvbp3cZAZAqZCOzORciXhMaG1AtMFRdsRN6WI7JvO5lIZCRfMqz78yxJZBint2a5n3nzD3N1zhRytCYZC5St81JQxLiIOhGMONGp1p9Yzr0rMNt1mmW6MfGgt') // api for the get request
                .then(response => response.json())
                .then(data => {
                    document.querySelector('[data-load-news] .posts-loading').remove();

                    const content = data.data;

                    for (let i = 0; i < content.length; i++) {
                        if (content[i].message) {
                            let imgSrc = '/frontend/dist/assets/images/blog/placeholder.jpg';
                            let mainContent = content[i].message;
                            let readMoreText = 'Read More';
                            let readLessText = 'Read Less';

                            if (content[i].full_picture) {
                                imgSrc = content[i].full_picture;
                            }

                            if (content[i].message.length > 400) {
                                readMoreText = document.querySelector('[data-load-news]').getAttribute('data-read-more-text');
                                readLessText = document.querySelector('[data-load-news]').getAttribute('data-read-less-text');
                                mainContent = content[i].message.substr(0, 400) + '... ' + `<a onclick="this.parentElement.style.display = 'none';this.parentElement.nextElementSibling.style.display = 'block';" href="javascript:void(0)">${readMoreText}</a>`;
                                const fullContent = content[i].message + ` <a onclick="this.parentElement.style.display = 'none';this.parentElement.previousElementSibling.style.display = 'block';" href="javascript:void(0)">${readLessText}</a>`;

                                document.querySelector('[data-load-news] .row').innerHTML += `
                                <div class="col-12 mb-4" data-post-id="${content[i].id}">
                                    <div class="ud-single-blog">
                                        <div class="ud-blog-image">
                                            <a href="${content[i].permalink_url}" target="_blank">
                                                <img src="${imgSrc}" alt="${content[i].permalink_url}" />
                                            </a>
                                        </div>
                                        <div class="ud-blog-content">
                                            <span class="ud-blog-date">${moment(content[i].created_time).format('LL')}</span>
                                            <p class="ud-blog-desc">
                                                ${mainContent}
                                            </p>
                                            <p class="ud-blog-desc full" style="display: none">
                                                ${fullContent}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                               `;
                            } else {
                                document.querySelector('[data-load-news] .row').innerHTML += `
                                <div class="col-12 mb-4" data-post-id="${content[i].id}">
                                    <div class="ud-single-blog">
                                        <div class="ud-blog-image">
                                            <a href="${content[i].permalink_url}" target="_blank">
                                                <img src="${imgSrc}" alt="${content[i].permalink_url}" />
                                            </a>
                                        </div>
                                        <div class="ud-blog-content">
                                            <span class="ud-blog-date">${moment(content[i].created_time).format('LL')}</span>
                                            <p class="ud-blog-desc">
                                                ${mainContent}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                `;
                            }
                        }
                    }
                });
        });
    }

    /* ================================ */

	/* Vendors */

    // WOW
	new WOW().init();
    // Swiper
    const swiper = new Swiper('.swiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
        },
    });
})();
