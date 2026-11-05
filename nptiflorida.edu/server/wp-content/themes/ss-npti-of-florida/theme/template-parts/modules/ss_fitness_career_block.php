<?php
/**
 * Module: Fitness Career Block
 * Template Part: template-parts/modules/ss_fitness_career_block.php
 * ACF Flexible Content Layout: ss_fitness_career_block
 *
 * Fields:
 *  - ss_fitness_career_block_row1_heading           (text)
 *  - ss_fitness_career_block_row1_heading_highlight (text)
 *  - ss_fitness_career_block_row1_items             (repeater)
 *      - ss_fitness_career_block_row1_items_item_text (text)
 *  - ss_fitness_career_block_row1_cta               (link)
 *  - ss_fitness_career_block_row1_image             (image)
 *  - ss_fitness_career_block_row2_image             (image)
 *  - ss_fitness_career_block_row2_heading           (text)
 *  - ss_fitness_career_block_row2_heading_highlight (text)
 *  - ss_fitness_career_block_row2_intro             (text)
 *  - ss_fitness_career_block_row2_items             (repeater)
 *      - ss_fitness_career_block_row2_items_item_text (text)
 *  - ss_fitness_career_block_row2_cta               (link)
 */

$row1_heading           = get_sub_field( 'ss_fitness_career_block_row1_heading' );
$row1_heading_highlight = get_sub_field( 'ss_fitness_career_block_row1_heading_highlight' );

if ( ! $row1_heading && ! $row1_heading_highlight ) return;

$row1_cta   = get_sub_field( 'ss_fitness_career_block_row1_cta' );
$row1_image = get_sub_field( 'ss_fitness_career_block_row1_image' );

$row2_image             = get_sub_field( 'ss_fitness_career_block_row2_image' );
$row2_heading           = get_sub_field( 'ss_fitness_career_block_row2_heading' );
$row2_heading_highlight = get_sub_field( 'ss_fitness_career_block_row2_heading_highlight' );
$row2_intro             = get_sub_field( 'ss_fitness_career_block_row2_intro' );
$row2_cta               = get_sub_field( 'ss_fitness_career_block_row2_cta' );
?>

<section
  id="ss-fitness-career"
  class="ss-module-fitness-career bg-light-blue py-10 md:py-16 lg:py-20"
>
  <div class="container mx-auto px-4 flex flex-col gap-16 md:gap-20">

    <!-- Row 1: Why Choose a Fitness Career? — content left, image right -->
    <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:gap-12">

      <!-- Left: content -->
      <div class="ss-list-items flex flex-col gap-6 w-full lg:w-1/2">

        <h2 class="font-heading font-bold text-3xl md:text-4xl text-navy leading-tight">
          <?php if ( $row1_heading ) : ?>
            <?php echo esc_html( $row1_heading ); ?>
          <?php endif; ?>
          <?php if ( $row1_heading_highlight ) : ?>
            <span class="text-orange"><?php echo esc_html( $row1_heading_highlight ); ?></span>
          <?php endif; ?>
        </h2>

        <?php if ( have_rows( 'ss_fitness_career_block_row1_items' ) ) : ?>
          <ul>
            <?php while ( have_rows( 'ss_fitness_career_block_row1_items' ) ) : the_row();
              $item_text = get_sub_field( 'ss_fitness_career_block_row1_items_item_text' );
            ?>
              <?php if ( $item_text ) : ?>
                <li>
                  <p><?php echo esc_html( $item_text ); ?></p>
                </li>
              <?php endif; ?>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>

        <?php if ( $row1_cta ) : ?>
          <div>
            <a
              href="<?php echo esc_url( $row1_cta['url'] ); ?>"
              <?php if ( $row1_cta['target'] ) : ?>target="<?php echo esc_attr( $row1_cta['target'] ); ?>"<?php endif; ?>
              class="inline-flex items-center justify-center bg-white hover:bg-orange/10 text-orange font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 border-1.5 border-orange transition-colors"
            >
              <?php echo esc_html( $row1_cta['title'] ); ?>
            </a>
          </div>
        <?php endif; ?>

      </div>

      <!-- Right: image -->
      <?php if ( $row1_image ) : ?>
        <div class="w-full lg:w-1/2 flex-shrink-0">
          <div class="overflow-hidden rounded">
            <img
              src="<?php echo esc_url( $row1_image['url'] ); ?>"
              alt="<?php echo esc_attr( $row1_image['alt'] ); ?>"
              width="<?php echo esc_attr( $row1_image['width'] ); ?>"
              height="<?php echo esc_attr( $row1_image['height'] ); ?>"
              class="w-full h-auto object-cover"
            >
          </div>
        </div>
      <?php endif; ?>

    </div>

    <!-- Row 2: Career Support Resources — image left, content right -->
    <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:gap-12">

      <!-- Left: image -->
      <?php if ( $row2_image ) : ?>
        <div class="w-full lg:w-1/2 flex-shrink-0 order-2 lg:order-1">
          <div class="overflow-hidden rounded">
            <img
              src="<?php echo esc_url( $row2_image['url'] ); ?>"
              alt="<?php echo esc_attr( $row2_image['alt'] ); ?>"
              width="<?php echo esc_attr( $row2_image['width'] ); ?>"
              height="<?php echo esc_attr( $row2_image['height'] ); ?>"
              class="w-full h-auto object-cover"
            >
          </div>
        </div>
      <?php endif; ?>

      <!-- Right: content -->
      <div class="ss-list-items flex flex-col gap-6 w-full lg:w-1/2 order-1 lg:order-2">

        <?php if ( $row2_heading || $row2_heading_highlight ) : ?>
          <h2 class="font-heading font-bold text-3xl md:text-4xl text-navy leading-tight">
            <?php if ( $row2_heading ) : ?>
              <?php echo esc_html( $row2_heading ); ?>
            <?php endif; ?>
            <?php if ( $row2_heading_highlight ) : ?>
              <span class="text-orange"><?php echo esc_html( $row2_heading_highlight ); ?></span>
            <?php endif; ?>
          </h2>
        <?php endif; ?>

        <?php if ( $row2_intro ) : ?>
          <p class="font-body font-normal text-md text-navy leading-relaxed">
            <?php echo esc_html( $row2_intro ); ?>
          </p>
        <?php endif; ?>

        <?php if ( have_rows( 'ss_fitness_career_block_row2_items' ) ) : ?>
          <ul>
            <?php while ( have_rows( 'ss_fitness_career_block_row2_items' ) ) : the_row();
              $item_text = get_sub_field( 'ss_fitness_career_block_row2_items_item_text' );
            ?>
              <?php if ( $item_text ) : ?>
                <li>
                  <p><?php echo esc_html( $item_text ); ?></p>
                </li>
              <?php endif; ?>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>

        <?php if ( $row2_cta ) : ?>
          <div>
            <a
              href="<?php echo esc_url( $row2_cta['url'] ); ?>"
              <?php if ( $row2_cta['target'] ) : ?>target="<?php echo esc_attr( $row2_cta['target'] ); ?>"<?php endif; ?>
              class="inline-flex items-center justify-center bg-white hover:bg-orange/10 text-orange font-body font-bold text-sm uppercase rounded-4xl px-9 py-3 border-1.5 border-orange transition-colors"
            >
              <?php echo esc_html( $row2_cta['title'] ); ?>
            </a>
          </div>
        <?php endif; ?>

      </div>

    </div>

  </div>
</section>
