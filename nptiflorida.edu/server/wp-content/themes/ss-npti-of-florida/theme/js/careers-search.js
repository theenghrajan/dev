(function ($) {
	'use strict';

	var debounceTimer;

	function fetchJobs() {
		var $results = $('#job-results');
		var $loader = $('#careers-loader');

		var data = {
			action: 'careers_search',
			nonce: ssCareerSearch.nonce,
			keyword: $('#careers-keyword').val() || '',
			/*employer: $('#careers-employer').val()  || '',
			location: $('#careers-location').val()  || '',
			job_type: $('#careers-job-type').val()  || '',*/
		};

		$loader.css('display', 'flex');
		$results.css('opacity', '0').addClass('hidden');

		$.post(ssCareerSearch.ajaxUrl, data, function (response) {
			$loader.css('display', 'none');
			$results.html(response).removeClass('hidden').css('opacity', '1');
		});
	}

	function debounce(fn, delay) {
		clearTimeout(debounceTimer);
		debounceTimer = setTimeout(fn, delay);
	}

	// Live keyword search — debounced 400 ms
	$(document).on('input', '#careers-keyword', function () {
		debounce(fetchJobs, 400);
	});

	// Dropdown filters — fire immediately on change
	$(document).on('change', '#careers-employer, #careers-location, #careers-job-type', function () {
		fetchJobs();
	});

})(jQuery);
