document.addEventListener('DOMContentLoaded', function () {
	let popups = []; // Array to store all popups
	let currentIndex = 0;

	// Fetch popup data
	const fetchPopupData = async (index) => {
		if (index < 0 || index >= popups.length) {
			console.error('Index out of bounds');
			return;
		}

		const postId = popups[index].id;
		try {
			const response = await fetch(`/wp-json/wp/v2/pop-up/${postId}`);
			if (response.ok) {
				const data = await response.json();
				populateModal(data);
				currentIndex = index;
			} else {
				console.error('Failed to fetch data:', response.statusText);
			}
		} catch (error) {
			console.error('Error fetching data:', error);
		}
	};

	// Populate modal
	const populateModal = (data) => {
		const modalHTML = `
            <div id="quickview-modal" class="modal myModal show" tabindex="-1" style="display: block;">
                <div class="modal-dialog pop-up-modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="status">${
								data.status || 'No status available'
							}</div>
                            <button class="close" type="button" data-dismiss="modal">×</button>
                        </div>
                        <h2 class="pop-up-title">${
							data.title || 'No title available'
						}</h2>
                        <div class="preview-slider">
                            <div id="home-carousel--nested" class="owl-carousel owl-theme home-carousel--nested pop-up-preview pop-owl">
                                ${data.gallery
									.slice(0, 5) // Limit to the first 5 images
									.map(
										(image) => `
                                    <div class="item">
                                        <a href="#">
                                            <img src="${image.url}" alt="${
											image.alt || ''
										}" />
                                        </a>
                                    </div>
                                `
									)
									.join('')}
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="preview-top">
                                ${(Array.isArray(data.type_of_event)
									? data.type_of_event
									: [data.type_of_event].filter(Boolean)
								)
									.map(
										(eventType) => `
                                    <a class="pop-up-type-link" href="/pop-ups/?_sfm_type_of_event=${eventType}">
                                        <span class="pop-up-type">${eventType}</span>
                                    </a>
                                `
									)
									.join('')}
                                <div class="dates-preview">
                                    <div class="start-date">${
										data.start_date ||
										'No start date available'
									}</div>
                                    <div class="end-date">${
										data.end_date || 'No end date available'
									}</div>
                                </div>
                            </div>
                            <div class="pop-up-location-box pop-up-location">
                                <span>${
									data.location_titles ||
									'No location available'
								}</span>
                            </div>
                            <p class="paragraph">${
								data.excerpt || 'No description available'
							}</p>
                            <div class="wp-block-buttons is-layout-flex wp-container-core-buttons-is-layout-1 wp-block-buttons-is-layout-flex">
                                <div class="wp-block-button">
                                    <a class="wp-block-button__link has-text-align-center wp-element-button" href="${
										data.link || '#'
									}">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-navigation">
                            <div class="modal-nav-button nav-left">
                                <button type="button" class="btn btn-default m-t-30 prev-arrow">←</button>
                            </div>
                            <div class="modal-nav-button nav-right">
                                <button type="button" class="btn btn-default m-t-30 next-arrow">→</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

		// Replace modal content
		const modalContainer = document.getElementById(
			'quickview-modal-container'
		);
		modalContainer.innerHTML = modalHTML;

		// Initialize the carousel inside the modal
		const dynamicCarousel = document.querySelector(
			'#home-carousel--nested'
		);
		if (dynamicCarousel) {
			jQuery(dynamicCarousel).owlCarousel({
				nav: true,
				navText: ['', ''],
				loop: true,
				dots: true,
				autoHeight: true,
				autoplay: true,
				autoplayTimeout: 5000, // Slower autoplay
				smartSpeed: 1500, // Smooth transitions
				autoplayHoverPause: true,
				touchDrag: true, // Enable touch drag for swiping
				mouseDrag: true, // Enable mouse drag
				items: 1,
				center: true,
				margin: 20,
				animateIn: null, // Disable animations
				animateOut: null, // Disable animations
				onTranslate: function () {
					console.log('Swiping or translating...'); // Debugging swiping behavior
				},
			});
		}

		// Add event listeners for next and previous arrows
		document
			.querySelector('.next-arrow')
			.addEventListener('click', showNextPopup);
		document
			.querySelector('.prev-arrow')
			.addEventListener('click', showPreviousPopup);
	};

	// Functions to show next and previous popups
	const showNextPopup = () => {
		fetchPopupData(currentIndex + 1);
	};

	const showPreviousPopup = () => {
		fetchPopupData(currentIndex - 1);
	};

	// Bind Quickview listeners to links
	const bindQuickviewListeners = () => {
		popups = []; // Reset popups array
		const quickviewLinks = document.querySelectorAll('.quickview-link');
		quickviewLinks.forEach((link, index) => {
			// Populate the popups array with IDs and other data
			popups.push({ id: link.getAttribute('data-id') });

			link.removeEventListener('click', handleQuickviewClick); // Remove any previous listener
			link.addEventListener('click', handleQuickviewClick);

			function handleQuickviewClick(e) {
				e.preventDefault();
				fetchPopupData(index); // Fetch and display the popup by index
			}
		});
	};

	// Rebind after filtering
	jQuery(document).on('sf:ajaxfinish', '.searchandfilter', function () {
		console.log('Search & Filter Pro finished filtering');
		bindQuickviewListeners();
	});

	// Initial bind
	bindQuickviewListeners();

	// Close modal on close button click
	document.addEventListener('click', function (e) {
		if (e.target.classList.contains('close')) {
			const modal = document.getElementById('quickview-modal');
			if (modal) {
				modal.style.display = 'none';
			}
		}
	});
});
