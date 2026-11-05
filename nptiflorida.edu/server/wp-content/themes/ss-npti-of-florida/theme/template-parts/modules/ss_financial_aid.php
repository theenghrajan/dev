<?php
/**
 * Module: Financial Aid & Admissions
 * Template Part: template-parts/modules/ss_financial_aid.php
 * ACF Flexible Content Layout: ss_financial_aid
 *
 * Fields:
 *  - ss_financial_aid_section_heading (text)
 *  - ss_financial_aid_section_heading_highlight (text)
 *  - ss_financial_aid_tabs (repeater) 
 *   - ss_financial_aid_tabs_tab_label (text)
 *  - ss_financial_aid_tabs_tab_content (textarea)
 *  - ss_financial_aid_admissions_image (image)
 *  - ss_financial_aid_admissions_cta (link)
 */

$section_heading           = get_sub_field( 'ss_financial_aid_section_heading' );
$section_heading_highlight = get_sub_field( 'ss_financial_aid_section_heading_highlight' );

if ( have_rows( 'ss_financial_aid_tabs' ) ) {
  while ( have_rows( 'ss_financial_aid_tabs' ) ) { the_row();
    $tabs[] = [
      'tab_label' => get_sub_field('ss_financial_aid_tabs_tab_label'),
      'content_body' => get_sub_field('ss_financial_aid_tabs_tab_content'),
      'section_image' => get_sub_field('ss_financial_aid_admissions_image'),
      'citation_cta' => get_sub_field('ss_financial_aid_admissions_cta'),
    ];
  }
}
?>

<section
  id="ss-financial-aid"
  class="ss-module-financial-aid bg-white pad-section"
>
  <div class="container mx-auto px-4">
    <div class="col-center-center-16">

      <?php if ( $section_heading || $section_heading_highlight ) : ?>
        <h2 class="text-center mb-5">
          <?php echo esc_html( $section_heading ); ?> <span class="text-orange block"><?php echo esc_html( $section_heading_highlight ); ?></span>
        </h2>
      <?php endif; ?>

      <?php if ($tabs): ?>
        <div class="ss-generic-tabs w-full col-start-center-12">
          <div class="hidden lg:inline-flex bg-white rounded-pill p-1 items-center gap-1 flex-wrap justify-center shadow-card lg:mb-8 border border-navy/25 ">
            <?php foreach ($tabs as $index => $tab): ?>
                <button
                  class="tabBtn tab-btn font-heading font-medium text-sm rounded-pill px-6 py-3 whitespace-nowrap border-0 cursor-pointer transition-fast hover:bg-blue/5 hover:text-orange <?php echo $index === 0 ? 'bg-blue text-white' : 'text-blue'; ?>"
                  data-tab="<?php echo $index; ?>">
                  <?php echo esc_html($tab['tab_label']); ?>
                </button>
              <?php endforeach; ?>
          </div>
      
        <?php foreach ($tabs as $index => $tab): ?>
             <!-- Accordion toggle (mobile only) -->
            <button
              class="tabBtn ss-acc-btn relative lg:hidden w-full flex items-center py-4 pr-10  border-b border-navy/10 bg-transparent border-x-0 border-t-0 cursor-pointer <?php echo $index === 0 ? 'text-blue font-bold' : 'text-navy font-semibold'; ?>"
              data-tab="<?php echo $index; ?>">
              <span class="font-heading text-md leading-tight"><?php echo esc_html($tab['tab_label']); ?></span>
              <i class="ss-tab-icon icon-chevron-down text-sm absolute top-3 right-1.5  transition-transform duration-200 <?php echo $index === 0 ? 'rotate-180' : ''; ?>" aria-hidden="true"></i>
            </button>
            <div class="tab-body" data-panel="<?php echo $index; ?>" <?php if ($index > 0) echo 'style="display:none;"'; ?>>
              <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:items-start">

                <div class="col-start-start-16 ss-list-items">
                  <?php if ($tab['content_body']): ?>
                      <?php echo wp_kses_post($tab['content_body']); ?>
                    <?php endif; ?>

                  <?php if ($tab['citation_cta']): ?>
                      <a href="<?php echo esc_url($tab['citation_cta']['url']); ?>"
                        <?php if ($tab['citation_cta']['target']) echo ' target="' . esc_attr($tab['citation_cta']['target']) . '"'; ?>
                        class="btn-primary self-start">
                        <?php echo esc_html($tab['citation_cta']['title']); ?>
                      </a>
                    <?php endif; ?>
                </div>

                <?php if ($tab['section_image']): ?>
                    <div class="rounded-lg overflow-hidden">
                      <img src="<?php echo esc_url($tab['section_image']['url']); ?>"
                        alt="<?php echo esc_attr($tab['section_image']['alt']); ?>"
                        width="<?php echo esc_attr($tab['section_image']['width']); ?>"
                        height="<?php echo esc_attr($tab['section_image']['height']); ?>"
                        class="w-full object-cover rounded-lg">
                    </div>
                  <?php endif; ?>

              </div>
            </div>
        <?php endforeach; ?>
      
      <?php endif; ?>
      </div>

    </div>
  </div>
</section>
