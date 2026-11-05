<?php

/* Template Name: Static Template */

get_header();

?>

<div style="font-family:monospace;background:#111;color:#fff;padding:1rem 2rem;position:sticky;top:0;z-index:9999;font-size:.75rem;opacity:.85;">
	HTML Blocks Preview — <?php echo count(glob(__DIR__ . '/*.html')); ?> blocks loaded
</div>

<?php
$blocks = [
	'ss-logo-slides.html',
	'ss-site-header.html',
	'ss-grid-training.html',
	'ss-coaching-market.html',
	'ss-site-footer.html',
	'ss-articles.html',
	'ss-as-seen-on-fox.html',
	'ss-training-year.html',
	'ss-unmatched-growth.html',
	'ss-training-edu.html',
	'ss-personal-trainer.html',
	'ss-course-offered.html',
	'ss-student-testimonials.html',
	'ss-secure-future.html',
	'ss-fitness-business.html',
	'ss-curriculum-learn.html',
	'ss-future-career.html',
	'ss-graduate-employers.html',
	'ss-job-placement.html',
	'ss-faq.html',
	'ss-ready-to-learn.html',
	'ss-fitness-guide.html',
	'ss-about-fitness.html',
	'ss-guide-essential.html',
	'ss-employer-job.html',
	'ss-expert-insights.html',
	'ss-trainer-questions.html',
	'ss-success-graduates.html',
	'ss-master-strap.html',
	'ss-price-calculator.html',
	'ss-get-started.html',
	'ss-testimonials.html',
	'ss-asked-questions.html',
	'ss-location-map.html',
	'ss-blogs.html',
	'ss-choose-location.html',
	'ss-fitness-career.html',
	'ss-grid-fitness.html',
	'ss-financial-aid.html',
	'ss-blog.html',
	'ss-future-today.html',
	'ss-npti-class.html',
	'ss-npti-florida.html',
	'ss-career-fitness.html',
	'ss-florida-campuses.html',
	'ss-info-cat.html',
	'ss-npti-institute.html',
	'ss-npti-orlando.html',
	'ss-passion-fitness.html',
	'ss-personal-train.html',
	'ss-transition-guide.html',
	'ss-why-npti.html',
	'ss-national-training.html',
	'ss-meet-team.html',
	'ss-our-programs.html',
	'ss-specialization.html',
	'ss-live-location.html',
	'ss-single-team.html',
	'ss-why-choose.html',
	'ss-certification-accre.html',
	'ss-strap-training.html',
	'ss-certifications.html',
	'ss-how-it-works.html',
	'ss-benefits-outcomes.html',
	'ss-your-estimate.html',
	'ss-the-process.html',
	'ss-application-today.html',
	'ss-fitness-career-block.html',
	'ss-careers-list.html',
	'ss-share-data.html',
	'ss-contributors.html',
	'ss-veteran-owned-business.html',
	'ss-why-choose-national-personal-training-institute.html',
	'ss-health-and-wellness-coaching.html',
	'ss-health-coaching.html',
	'ss-2-col-content-bottom-image.html',
	'ss-2-col-image-content-buttons.html',
	'ss-hyflex-table.html',
	'ss-hours-table.html',
	'ss-option-1-housing-at-in-town-suites.html',
	'ss-heading-description-column.html',
	'ss-left-image-right-content-accordion.html',
	'ss-youth-fitness-certifications.html',
];

foreach ( $blocks as $block ) :
	$file = __DIR__ . '/' . $block;
	?>
	<div style="background:#1e1e2e;color:#cdd6f4;font-family:monospace;font-size:.7rem;padding:.35rem 1rem;border-top:2px solid #45475a;letter-spacing:.05em;">
		<?php echo esc_html( $block ); ?>
	</div>
	<?php
	if ( file_exists( $file ) ) {
		include $file;
	} else {
		echo '<p style="color:#f38ba8;font-family:monospace;padding:.5rem 1rem;">File not found: ' . esc_html( $block ) . '</p>';
	}
endforeach;
?>

<?php get_footer(); ?>
