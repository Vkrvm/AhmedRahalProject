import './bootstrap';
import 'bootstrap';
import Alpine from 'alpinejs';

import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';




window.Alpine = Alpine;
Alpine.start();

window.addEventListener('DOMContentLoaded', () => {
	const el = document.querySelector('.mySwiper');
	if (el) {
		Swiper.use([Navigation, Pagination, Autoplay]);
		new Swiper('.mySwiper', {
			centeredSlides: false,
			loop: true,
			grabCursor: true,
			speed: 700,
			autoplay: { delay: 2500, disableOnInteraction: true },
			spaceBetween: 24,
			breakpoints: {
				0: { slidesPerView: 1 },
				576: { slidesPerView: 2 },
				992: { slidesPerView: 3 },
				1400: { slidesPerView: 3 },
			},
		});
	}

	const header = document.querySelector('[data-scroll-header]');
	if (header) {
		const navbarCollapse = document.getElementById('mainNavbar');
		const navbarToggler = document.querySelector('.navbar-toggler');

		const toggleHeaderState = () => {
			const shouldBeScrolled = window.scrollY > 40;
			header.classList.toggle('is-scrolled', shouldBeScrolled);
		};

		window.addEventListener('scroll', () => {
			window.requestAnimationFrame(toggleHeaderState);
		}, { passive: true });

		if (navbarCollapse) {
			navbarCollapse.addEventListener('show.bs.collapse', () => {
				header.classList.add('is-scrolled');
				if (navbarToggler) {
					navbarToggler.classList.add('is-open');
				}
			});

			navbarCollapse.addEventListener('hide.bs.collapse', () => {
				if (navbarToggler) {
					navbarToggler.classList.remove('is-open');
				}
				toggleHeaderState();
			});
		}

		toggleHeaderState();
	}
});
