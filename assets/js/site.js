// Visor de fotos históricas (reemplaza jQuery + fancybox)
document.addEventListener('DOMContentLoaded', function () {
	var visor = document.getElementById('visor');
	if (visor && typeof visor.showModal === 'function') {
		var img = visor.querySelector('img');
		var texto = visor.querySelector('p');

		document.querySelectorAll('[data-lightbox]').forEach(function (a) {
			a.addEventListener('click', function (ev) {
				ev.preventDefault();
				img.src = a.href;
				img.alt = a.dataset.caption || '';
				texto.textContent = a.dataset.caption || '';
				visor.showModal();
			});
		});
		visor.addEventListener('click', function (ev) {
			if (ev.target === visor || ev.target.classList.contains('visor-cerrar')) visor.close();
		});
	}

	// Miniaturas del detalle: marcar la activa al cambiar de foto
	var galeria = document.getElementById('galeria');
	if (galeria) {
		galeria.addEventListener('slide.bs.carousel', function (ev) {
			document.querySelectorAll('.miniaturas button').forEach(function (b, i) {
				b.classList.toggle('active', i === ev.to);
				if (i === ev.to) { b.setAttribute('aria-current', 'true'); b.scrollIntoView({ block: 'nearest', inline: 'nearest' }); }
				else b.removeAttribute('aria-current');
			});
		});
	}

	// Aparición suave al scrollear: solo se ocultan los elementos que están fuera de pantalla
	var reducir = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	if (!reducir && 'IntersectionObserver' in window) {
		var obs = new IntersectionObserver(function (entradas) {
			entradas.forEach(function (en) {
				if (en.isIntersecting) {
					en.target.classList.remove('oculto');
					obs.unobserve(en.target);
				}
			});
		}, { rootMargin: '0px 0px -8% 0px' });
		document.querySelectorAll('.revelar').forEach(function (el) {
			if (el.getBoundingClientRect().top > window.innerHeight) {
				// Escalonar elementos hermanos (tarjetas, pasos, fotos)
				var hermanos = Array.prototype.filter.call(el.parentElement.children, function (h) { return h.classList.contains('revelar'); });
				el.style.transitionDelay = (Math.min(hermanos.indexOf(el), 5) * 80) + 'ms';
				el.classList.add('oculto');
				obs.observe(el);
			}
		});
	}

	// Sin movimiento automático para quien lo pidió en su sistema
	var hero = document.getElementById('hero-fotos');
	if (hero && reducir && window.bootstrap) {
		bootstrap.Carousel.getOrCreateInstance(hero).pause();
	}

	// Cerrar el menú móvil al elegir una sección
	document.querySelectorAll('#menu .nav-link').forEach(function (link) {
		link.addEventListener('click', function () {
			var menu = document.getElementById('menu');
			if (menu.classList.contains('show') && window.bootstrap) bootstrap.Collapse.getOrCreateInstance(menu).hide();
		});
	});
});
