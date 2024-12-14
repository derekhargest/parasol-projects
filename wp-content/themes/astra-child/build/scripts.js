jQuery(document).on('sf:ajaxfinish', '.searchandfilter', function () {
	setTimeout(function () {
		// Reinitialize the first Owl carousel
		jQuery('.home-carousel--nested')
			.trigger('destroy.owl.carousel')
			.owlCarousel({
				nav: true,
				navText: ['', ''],
				responsiveRefreshRate: true,
				loop: true,
				dots: true,
				thumbs: false,
				thumbImage: false,
				smartSpeed: 500,
				autoplayHoverPause: false,
				touchDrag: false,
				lazyLoad: true,
				mouseDrag: false,
				margin: 0,
				items: 1,
				center: true,
				dotsSpeed: 1000,
				singleItem: true,
				animateIn: 'fadeIn',
				animateOut: 'fadeOut',
				pagination: false,
				autoplay: false,
			});

		// Manually trigger lazy loading for images in the first carousel
		jQuery('.home-carousel--nested .owl-lazy').each(function () {
			var img = jQuery(this);
			var src = img.data('src');
			img.attr('src', src).css('opacity', 1); // Manually set the src and reveal the image
		});

		// Reinitialize the second Owl carousel
		jQuery('.owl-carousel-highlights')
			.trigger('destroy.owl.carousel')
			.owlCarousel({
				nav: false,
				navText: ['', ''],
				thumbs: false,
				thumbImage: false,
				loop: true,
				lazyLoad: true,
				dots: false,
				autoplay: true,
				autoplayTimeout: 3000,
				smartSpeed: 1000,
				autoplayHoverPause: true,
				singleItem: false,
				margin: 0,
				items: -1,
				center: true,
				responsive: {
					0: {
						items: 2,
						nav: false,
					},
					900: {
						items: 2,
					},
					1100: {
						items: 3,
					},
				},
			});

		// Manually trigger lazy loading for images in the first carousel
		jQuery('.owl-carousel-highlights .owl-lazy').each(function () {
			var img = jQuery(this);
			var src = img.data('src');
			img.attr('src', src).css('opacity', 1); // Manually set the src and reveal the image
		});
	}, 500); // Adjust the delay if necessary
});

jQuery(document).on('sf:ajaxfinish', '.searchandfilter', function () {
	// Select the div with the class "mobile-highlights" and hide it
	jQuery('.mobile-highlights').hide();
});

jQuery(document).ready(function ($) {
	$('.add-map').click(function () {
		$('#tab-02').prop('checked', true);
	});
});

jQuery(document).ready(function ($) {
	$('.add-floor').click(function () {
		$('#tab-01').prop('checked', true);
	});
});

document.addEventListener('DOMContentLoaded', function () {
	jQuery('.owl-carousel-highlights').owlCarousel({
		nav: false,
		navText: ['', ''],
		thumbs: false,
		thumbImage: false,
		loop: true,
		lazyLoad: true,
		dots: false,
		autoplay: true,
		autoplayTimeout: 3000,
		smartSpeed: 1000,
		autoplayHoverPause: true,
		singleItem: false,
		margin: 0,
		items: -1,
		center: true,
		responsive: {
			0: {
				items: 2,
				nav: false,
			},
			900: {
				items: 2,
			},
			1100: {
				items: 3,
			},
		},
	});
});

jQuery(document).ready(function ($) {
	//for testimonial
	var owl = $('#owl-testimonials');
	owl.owlCarousel({
		nav: false,
		thumbs: false,
		thumbImage: false,
		loop: true,
		dots: true,
		singleItem: true,
		autoplay: true,
		autoplayTimeout: 3000,
		smartSpeed: 1000,
		autoplayHoverPause: true,
		items: 1,
		center: true,
		slideSpeed: 300,
		paginationSpeed: 400,
		itemsDesktop: false,
		itemsDesktopSmall: false,
		itemsTablet: false,
		itemsMobile: false,
	});
});

jQuery(document).ready(function ($) {
	//for testimonial
	var owl = $('#owl-service-testimonials');
	owl.owlCarousel({
		nav: true,
		thumbs: false,
		thumbImage: false,
		loop: true,
		dots: true,
		singleItem: true,
		autoplay: true,
		autoplayTimeout: 3000,
		smartSpeed: 1000,
		autoplayHoverPause: true,
		items: 1,
		center: true,
		slideSpeed: 300,
		paginationSpeed: 400,
		itemsDesktop: false,
		itemsDesktopSmall: false,
		itemsTablet: false,
		itemsMobile: false,
	});
});

jQuery(document).ready(function ($) {
	//for testimonial
	var owl = $('#product-slider');
	owl.owlCarousel({
		nav: false,
		loop: false,
		dots: false,
		singleItem: true,
		items: 1,
		center: true,
		thumbs: true,
		thumbImage: true,
		thumbContainerClass: 'owl-thumbs',
		thumbItemClass: 'owl-thumb-item',
	});
});

jQuery(document).ready(function ($) {
	//for testimonial
	var owl = $('#floor-carousel');
	owl.owlCarousel({
		nav: false,
		loop: false,
		dots: false,
		singleItem: true,
		items: 1,
		center: true,
		thumbs: true,
		thumbImage: true,
		thumbContainerClass: 'owl-thumbs',
		thumbItemClass: 'owl-thumb-item',
	});
});

jQuery(document).ready(function ($) {
	//for Spaces
	var owl = $('#home-carousel');
	owl.owlCarousel({
		nav: true,

		navText: ['', ''],
		thumbs: false,
		thumbImage: false,
		loop: true,
		lazyLoad: true,
		dots: false,
		autoplay: true,
		autoplayTimeout: 3000,
		smartSpeed: 1000,
		autoplayHoverPause: true,
		singleItem: false,
		margin: 0,
		items: -1,
		center: false,
		responsive: {
			0: {
				items: 1,
				nav: false,
			},
			900: {
				items: 2,
			},
			1100: {
				items: 3,
			},
		},
	});
});

jQuery(document).ready(function ($) {
	//for Spaces
	var owl = $('#space-card-carousel');
	owl.owlCarousel({
		nav: true,
		navText: ['', ''],
		loop: true,
		thumbs: false,
		thumbImage: false,
		dots: false,
		autoplay: false,
		autoplayTimeout: 3000,
		smartSpeed: 1000,
		autoplayHoverPause: true,
		singleItem: true,
		margin: 0,
		items: -1,
		center: false,
		responsive: {
			0: {
				items: 1,
			},
			900: {
				items: 1,
			},
			1100: {
				items: 1,
			},
		},
	});
});

jQuery(document).ready(function ($) {
	//for Spaces
	var owl = $('#resource-carousel');
	owl.owlCarousel({
		nav: true,
		navText: ['', ''],
		loop: true,
		thumbs: false,
		thumbImage: false,
		mouseDrag: false,
		touchDrag: true,
		dots: false,
		autoplay: false,
		singleItem: false,
		margin: 0,
		items: 6,
		center: false,
		responsive: {
			0: {
				items: 1,
			},
			900: {
				items: 2,
			},
			1100: {
				items: 3,
			},
		},
	});
});

jQuery(document).ready(function ($) {
	//for Spaces
	var owl = $('#pop-up-carousel');
	owl.owlCarousel({
		nav: true,
		navText: ['', ''],
		loop: true,
		dots: true,
		thumbs: false,
		thumbImage: false,
		autoHeight: true,
		lazyLoad: true,
		autoplay: true,
		autoplayTimeout: 3000,
		smartSpeed: 1000,
		autoplayHoverPause: true,
		singleItem: false,
		margin: 20,
		items: -1,
		center: false,
		responsive: {
			0: {
				items: 1,
			},
			900: {
				items: 2,
			},
			1100: {
				items: 3,
			},
		},
	});
});

jQuery(document).ready(function ($) {
	//for Spaces
	var owl = $('.home-carousel--nested');
	owl.owlCarousel({
		nav: true,
		navText: ['', ''],
		responsiveRefreshRate: true,
		loop: true,
		dots: true,
		thumbs: false,
		thumbImage: false,
		smartSpeed: 500,
		autoplayHoverPause: false,
		touchDrag: false,
		lazyLoad: true,
		mouseDrag: false,
		margin: 0,
		items: 1,
		center: true,
		dotsSpeed: 1000,
		singleItem: true,
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		pagination: false,
		autoplay: false,
	});

	window.dispatchEvent(new Event('resize'));
	var dots = $('.home-carousel--nested .owl-dots')
		.css('position', 'absolute')
		.css('bottom', '5px');
	dots.css('left', 'calc(50% - ' + dots.width() / 2 + 'px)');

	$(function () {
		return $('.modal').on('show.bs.modal', function () {
			var curModal;
			curModal = this;
			$('.modal').each(function () {
				if (this !== curModal) {
					$(this).modal('hide');
				}
			});
		});
	});

	$('.home-carousel--nested .owl-dot').hover(
		function () {
			$(this).click();
		},
		function () {}
	);
});

jQuery(document).ready(function ($) {
	//for Spaces single gallery
	var owl = $('#space-slider');
	owl.owlCarousel({
		nav: true,
		navText: ['', ''],
		loop: true,
		dots: false,
		thumbs: false,
		thumbImage: false,
		autoplay: true,
		lazyLoad: true,
		autoplayTimeout: 3000,
		smartSpeed: 1000,
		autoplayHoverPause: true,
		singleItem: true,
		margin: 0,
		items: 1,
		center: true,
	});
});

jQuery(document).ready(function ($) {
	//for Spaces
	var owl = $('#space-carousel-nested');
	owl.owlCarousel({
		nav: true,
		navText: ['', ''],
		loop: true,
		dots: true,
		lazyLoad: true,
		thumbs: false,
		thumbImage: false,
		autoplay: false,
		autoplayTimeout: 3000,
		smartSpeed: 1000,
		autoplayHoverPause: false,
		singleItem: true,
		margin: 0,
		items: -1,
		center: true,
		responsive: {
			0: {
				items: 1,
			},
			900: {
				items: 1,
			},
			1100: {
				items: 1,
			},
		},
	});
});
// change active class, show the clicked element only and hide the others

// grab all the buttons
let Buttons = document.querySelectorAll('.selectSection button');

// loop through the buttons using for..of
for (let button of Buttons) {
	// listen for a click event
	button.addEventListener('click', (e) => {
		// et = event target
		const et = e.target;
		// slect active class
		const active = document.querySelector('.active-price');
		// check for the button that has active class and remove it
		if (active) {
			active.classList.remove('active-price');
		}
		// add active class to the clicked element
		et.classList.add('active-price');

		// select all classes with the name content
		let allContent = document.querySelectorAll('.price-content');

		// loop through all content classes
		for (let content of allContent) {
			// display the content if the class has the same data-attribute as the button
			if (
				content.getAttribute('data-number') ===
				button.getAttribute('data-number')
			) {
				content.style.display = 'block';
			}
			// if it's not equal then hide it.
			else {
				content.style.display = 'none';
			}
		}
	});
}

function accordionDirectory() {
	//specify your class/element targeting based on where your filters exist
	jQuery('.searchandfilter h4').wrap(
		"<a class='filter-accordion-title' href='#'></a>"
	);
	jQuery('.searchandfilter h4').after("<span class='counter'></span>");
	jQuery('.searchandfilter ul li ul').addClass('accordion-list');

	//again make sure your class/element targeting is based on where your filters exist, should match above
	jQuery(
		'.sf-field-post-meta-location a, .sf-field-post-meta-city a, .sf-field-taxonomy-pop-up-tag a, .sf-field-post-meta-neighborhoods a, .sf-field-post-meta-type_of_event a'
	)
		.click(function () {
			this.classList.toggle('active');
			event.preventDefault();
			jQuery(this).next().toggle();
			return false;
		})
		.next()
		.hide();
}

//run the function above upon first load
accordionDirectory();

jQuery(document).ready(function () {
	function getCounter() {
		var count = jQuery(this).find('.accordion-list').children('li').length;
		jQuery(this).find('span.counter').text(count);
	}

	jQuery('.accordion-list').each(function () {
		getCounter.call(this);
	});
});

const element = document.querySelector('#search-filter-form-11506');
const container = document.querySelector('#content');
const startPosition = 700; // The scroll position where you want the change to occur

window.addEventListener('scroll', () => {
	if (window.scrollY > startPosition) {
		// Change to sticky after scrolling past a certain point
		element.classList.add('sticky');
	} else {
		// Revert to absolute position when scrolling back up
		element.classList.remove('sticky');
	}
});

document.addEventListener('DOMContentLoaded', function () {
	const openBtn = document.getElementById('open-filter-box');
	const closeBtn = document.getElementById('close-filter-box');
	const doneBtn = document.getElementById('done-button');
	const filterBox = document.getElementById('mobile-filter-box');

	if (openBtn && closeBtn && doneBtn && filterBox) {
		// Open the box
		openBtn.addEventListener('click', function () {
			filterBox.classList.add('active');
		});

		// Close the box with the close button
		closeBtn.addEventListener('click', function () {
			filterBox.classList.remove('active');
		});

		// Close the box with the "Done" button
		doneBtn.addEventListener('click', function () {
			filterBox.classList.remove('active');
		});
	}
});
