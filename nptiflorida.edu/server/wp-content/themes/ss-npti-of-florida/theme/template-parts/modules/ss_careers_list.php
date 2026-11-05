<?php
/**
 * Module: Careers List
 * Template Part: template-parts/modules/ss_careers_list.php
 * ACF Flexible Content Layout: ss_careers_list
 *
 * Fields:
 *  - ss_careers_list_section_heading           (text)
 *  - ss_careers_list_section_heading_highlight (text)
 *  - ss_careers_list_section_subheading        (text)
 *  - ss_careers_list_section_intro             (textarea)
 *  - ss_careers_list_search_placeholder        (text)
 *  - ss_careers_list_search_button_label       (text)
 *  - ss_careers_list_job_listings              (relationship → ss_careers CPT)
 *
 * CPT fields accessed via get_field($field, $post->ID):
 *  - employer         (text)
 *  - location         (text)
 *  - job_type         (text)
 *  - job_description  (textarea)
 *  - job_qualifications (textarea)
 *  - job_apply_link   (link)
 */

$section_heading           = get_sub_field( 'ss_careers_list_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_careers_list_section_heading_highlight' );

if ( ! $section_heading && ! $section_heading_highlight ) return;

$section_subheading  = get_sub_field( 'ss_careers_list_section_subheading' );
$section_intro       = get_sub_field( 'ss_careers_list_section_intro' );
$search_placeholder  = get_sub_field( 'ss_careers_list_search_placeholder' );
$search_button_label = get_sub_field( 'ss_careers_list_search_button_label' );
$job_listings        = get_sub_field( 'ss_careers_list_job_listings' );
?>

<section
  id="ss-career-list"
  class="ss-module-fitness-career1 bg-light-blue py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4">

    <!-- Section header -->
    <div class="flex flex-col items-center gap-3 text-center mb-8 md:mb-10">

      <div class="flex flex-col items-center gap-4">
        <h2 class="font-heading font-bold text-2xl md:text-2xl text-navy leading-tight">
          <?php if ( $section_heading ) : ?>
            <?php echo esc_html( $section_heading ); ?>
          <?php endif; ?>
          <?php if ( $section_heading_highlight ) : ?>
            <span class="text-orange"><?php echo esc_html( $section_heading_highlight ); ?></span>
          <?php endif; ?>
        </h2>

        <?php if ( $section_subheading ) : ?>
          <h3 class="font-heading font-bold text-xl md:text-xl text-navy leading-snug">
            <?php echo esc_html( $section_subheading ); ?>
          </h3>
        <?php endif; ?>
      </div>

      <?php if ( $section_intro ) : ?>
        <p class="font-body font-normal text-md text-navy leading-relaxed max-w-[960px]">
          <?php echo esc_html( $section_intro ); ?>
        </p>
      <?php endif; ?>

    </div>

    <!-- Search bar -->
    <div class="flex justify-center mb-8 md:mb-10">
      <div class="flex items-center justify-between w-full max-w-xl bg-white border border-black/15 rounded-pill pl-2 pr-6 py-2 gap-3">
        <div class="flex items-center gap-2 flex-1 min-w-0">
          <i class="icon-search grid place-items-center size-10 shrink-0 text-white bg-blue rounded-full"></i>
          <input
            id="careers-keyword"
            type="text"
            placeholder="<?php echo esc_attr( $search_placeholder ); ?>"
            class="font-body font-normal text-sm text-navy bg-transparent border-none outline-none w-full placeholder:text-navy/50"
            autocomplete="off"
          >
        </div>
        <button
          type="button"
          class="font-body font-normal text-sm text-navy/50 whitespace-nowrap shrink-0 cursor-pointer hover:text-navy transition-colors"
          onclick="document.getElementById('careers-keyword').dispatchEvent(new Event('input'))"
        >
          <?php echo esc_html( $search_button_label ); ?>
        </button>
      </div>
    </div>

    <!-- Loader -->
    <div id="careers-loader" class="hidden justify-center py-10">
      <div class="w-10 h-10 rounded-full border-4 border-blue/20 border-t-blue animate-spin"></div>
    </div>

    <!-- Job listing cards -->
    <div id="job-results" class="flex flex-col gap-6 max-w-4xl mx-auto transition-opacity duration-200">
      <?php foreach ( (array) $job_listings as $post ) : setup_postdata( $post );
          $employer           = get_field( 'employer', $post->ID );
          $location           = get_field( 'location', $post->ID );
          $job_type           = get_field( 'job_type', $post->ID );
          $job_description    = get_field( 'job_description', $post->ID );
          $job_qualifications = get_field( 'job_qualifications', $post->ID );
          $job_apply_link     = get_field( 'job_apply_link', $post->ID );
        ?>
          <div class="bg-white border border-navy/10 rounded-2xl p-6 flex flex-col gap-4">

            <h3 class="font-heading font-bold text-xl text-navy leading-snug">
              <?php echo esc_html( get_the_title( $post->ID ) ); ?>
            </h3>

            <div class="flex flex-wrap items-center gap-x-3 gap-y-1">
              <?php if ( $employer ) : ?>
                <span class="font-body text-sm text-navy/50">
                  <strong class="font-semibold">Employer:</strong> <?php echo esc_html( $employer ); ?>
                </span>
              <?php endif; ?>
              <?php if ( $location ) : ?>
                <span class="text-navy/30 hidden sm:inline">|</span>
                <span class="font-body text-sm text-navy/50">
                  <strong class="font-semibold">Location:</strong> <?php echo esc_html( $location ); ?>
                </span>
              <?php endif; ?>
              <?php if ( $job_type ) : ?>
                <span class="text-navy/30 hidden sm:inline">|</span>
                <span class="font-body text-sm text-navy/50">
                  <strong class="font-semibold">Type:</strong> <?php echo esc_html( $job_type ); ?>
                </span>
              <?php endif; ?>
            </div>

            <?php if ( $job_description ) : ?>
              <p class="font-body font-normal text-md text-navy leading-relaxed">
                <strong class="font-semibold">Description:</strong>
                <?php echo esc_html( $job_description ); ?>
              </p>
            <?php endif; ?>

            <?php if ( $job_qualifications ) : ?>
              <p class="font-body font-normal text-md text-navy leading-relaxed">
                <strong class="font-semibold">Qualifications:</strong>
                <?php echo esc_html( $job_qualifications ); ?>
              </p>
            <?php endif; ?>

            <?php if ( $job_apply_link ) : ?>
              <div>
                <a
                  href="<?php echo esc_url( $job_apply_link['url'] ); ?>"
                  <?php if ( $job_apply_link['target'] ) : ?>target="<?php echo esc_attr( $job_apply_link['target'] ); ?>"<?php endif; ?>
                  class="inline-flex items-center justify-center bg-orange hover:bg-orange/90 text-white font-body font-bold text-sm uppercase rounded-4xl px-8 py-3 transition-fast no-underline"
                >
                  <?php echo esc_html( $job_apply_link['title'] ); ?>
                </a>
              </div>
            <?php endif; ?>

          </div>
      <?php endforeach; wp_reset_postdata(); ?>
    </div><!-- /#job-results -->

  </div>
</section>
