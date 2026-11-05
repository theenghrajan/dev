<?php
/**
 * Module: Training Education
 * Template Part: template-parts/modules/ss_training_edu.php
 * ACF Flexible Content Layout: ss_training_edu
 *
 * Fields:
 *  - ss_training_edu_section_heading           (text)
 *  - ss_training_edu_section_heading_highlight (text)
 *  - ss_training_edu_tabs (repeater)
 *    - ss_training_edu_tabs_tab_label      (text)
 *    - ss_training_edu_content_heading     (text)
 *    - ss_training_edu_content_body_1      (textarea)
 *    - ss_training_edu_content_body_2      (textarea)
 *    - ss_training_edu_content_tagline     (text)
 *    - ss_training_edu_section_image       (image)
 *    - ss_training_edu_citation_cta        (link)
 */

$section_heading = get_sub_field('ss_training_edu_section_heading');
$section_heading_highlight = get_sub_field('ss_training_edu_section_heading_highlight');

if (!$section_heading)
  return;

// Collect all tab data first so we can loop twice (tab bar + content panels).
$tabs = [];
if (have_rows('ss_training_edu_tabs')) {
  while (have_rows('ss_training_edu_tabs')) {
    the_row();
    $tabs[] = [
      'tab_label' => get_sub_field('ss_training_edu_tabs_tab_label'),
      'content_body' => get_sub_field('ss_training_edu_content_body_1'),
      'section_image' => get_sub_field('ss_training_edu_section_image'),
      'citation_cta' => get_sub_field('ss_training_edu_citation_cta'),
    ];
  }
}
?>

<section id="ss-training-edu" class="ss-module-training-edu bg-light-blue pad-section !pb-8">
  <div class="container mx-auto px-4">

    <div class="col-start-center-12">

      <h2 class="text-center">
        <?php echo esc_html($section_heading); ?>
        <?php if ($section_heading_highlight): ?>
          <span class="text-orange"><?php echo esc_html($section_heading_highlight); ?></span>
        <?php endif; ?>
      </h2>

      <?php if ($tabs): ?>

        <div class="ss-generic-tabs w-full col-start-center-12">

          <!-- Tab bar (desktop only) -->
          <div class="hidden lg:inline-flex bg-white rounded-pill p-1 items-center gap-1 flex-wrap justify-center shadow-card mb-4 xl:mb-8">
            <?php foreach ($tabs as $index => $tab): ?>
              <button
                class="tabBtn font-heading text-md font-medium rounded-pill px-8 py-3 leading-tight whitespace-nowrap cursor-pointer <?php echo $index === 0 ? 'bg-blue text-white' : 'text-blue'; ?>"
                data-tab="<?php echo $index; ?>">
                <?php echo esc_html($tab['tab_label']); ?>
              </button>
            <?php endforeach; ?>
          </div>

          <!-- Accordion headers + panels (accordion on mobile, panels only on desktop) -->
          <?php foreach ($tabs as $index => $tab): ?>

            <!-- Accordion toggle (mobile only) -->
            <button
              class="tabBtn ss-acc-btn lg:hidden w-full flex items-center justify-between gap-4 py-4 border-b border-navy/10 bg-transparent border-x-0 border-t-0 cursor-pointer <?php echo $index === 0 ? 'text-blue font-bold' : 'text-navy font-semibold'; ?>"
              data-tab="<?php echo $index; ?>">
              <span class="font-heading text-md leading-tight"><?php echo esc_html($tab['tab_label']); ?></span>
              <i class="ss-tab-icon icon-chevron-down text-sm transition-transform duration-200 <?php echo $index === 0 ? 'rotate-180' : ''; ?>" aria-hidden="true"></i>
            </button>

            <!-- Panel -->
            <div
              class="tab-body flex flex-col gap-10 lg:flex-row lg:gap-12 lg:items-start w-full"
              data-panel="<?php echo $index; ?>"
              <?php if ($index > 0) echo 'style="display:none;"'; ?>>

              <!-- Left — text content -->
              <div class="col-start-start-16 lg:w-1/2 ss-list-items [&>p>em>strong]:font-semibold">
                <?php if ($tab['content_body']): ?>
                  <?php echo wp_kses_post($tab['content_body']); ?>
                <?php endif; ?>

                <?php if ($tab['citation_cta']): ?>
                  <a href="<?php echo esc_url($tab['citation_cta']['url']); ?>"
                    <?php if ($tab['citation_cta']['target']) echo ' target="' . esc_attr($tab['citation_cta']['target']) . '"'; ?>
                    class="btn btn-secondary mt-2">
                    <?php echo esc_html($tab['citation_cta']['title']); ?>
                  </a>
                <?php endif; ?>
              </div>

              <!-- Right — image -->
              <?php if ($tab['section_image']): ?>
                <div class="lg:w-1/2">
                  <img src="<?php echo esc_url($tab['section_image']['url']); ?>"
                    alt="<?php echo esc_attr($tab['section_image']['alt']); ?>"
                    width="<?php echo esc_attr($tab['section_image']['width']); ?>"
                    height="<?php echo esc_attr($tab['section_image']['height']); ?>"
                    class="img-cover rounded-xl w-full">
                </div>
              <?php endif; ?>

            </div><!-- /.tab-body -->

          <?php endforeach; ?>

        </div><!-- /.ss-generic-tabs -->

      <?php endif; ?>

    </div>

  </div>
</section>