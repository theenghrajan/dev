<?php
/**
 * Module: Trainer Questions / FAQ
 * Template Part: template-parts/modules/ss_trainer_questions.php
 * ACF Flexible Content Layout: ss_trainer_questions
 *
 * Fields:
 *  - ss_trainer_questions_section_description (textarea)
 *  - ss_trainer_questions_icon_open (select — icomoon class)
 *  - ss_trainer_questions_icon_closed (select — icomoon class)
 *  - ss_trainer_questions_tabs (repeater)
 *      - ss_trainer_questions_tabs_tab_label (text)
 *      - ss_trainer_questions_tabs_faq_items (relationship → ss_faqs)
 *            Post title  = question
 *            Post content = answer
 */

$description  = get_sub_field( 'ss_trainer_questions_section_description' );
$icon_open    = get_sub_field( 'ss_trainer_questions_icon_open' )??'icon-minus';
$icon_closed  = get_sub_field( 'ss_trainer_questions_icon_closed' )??'icon-plus';

if ( ! have_rows( 'ss_trainer_questions_tabs' ) ) return;

// Pre-collect tabs data so we can render buttons then panels separately
$tabs = [];
while ( have_rows( 'ss_trainer_questions_tabs' ) ) : the_row();
    $tabs[] = [
        'label'     => get_sub_field( 'ss_trainer_questions_tabs_tab_label' ),
        'faq_posts' => get_sub_field( 'ss_trainer_questions_tabs_faq_items' ) ?: [],
    ];
endwhile;

if ( empty( $tabs ) ) return;
?>

<section id="ss-trainer-questions" class="ss-module-trainer-questions bg-light-blue py-10 md:py-16 lg:py-20">
    <div class="container mx-auto px-4">

        <!-- Tab switcher -->
        <div class="flex justify-center mb-6">
            <div class="inline-flex bg-white rounded-2xl lg:rounded-pill p-1 gap-0 flex-col sm:flex-row w-full sm:w-auto">
                <?php foreach ( $tabs as $tab_index => $tab ) : ?>
                    <button type="button"
                        class="ss-faq-tab <?php echo $tab_index === 0 ? 'bg-blue text-white' : 'text-blue'; ?> font-heading font-medium text-base 2xl:text-md rounded-pill px-8 py-3 lg:whitespace-nowrap transition-colors"
                        data-tab="tab-<?php echo $tab_index; ?>">
                        <?php echo esc_html( $tab['label'] ); ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <?php if ( $description ) : ?>
            <p class="font-body font-normal text-md text-navy text-center leading-relaxed max-w-[800px] mx-auto mb-8">
                <?php echo esc_html( $description ); ?>
            </p>
        <?php endif; ?>

        <!-- Tab panels -->
        <?php foreach ( $tabs as $tab_index => $tab ) : ?>
            <div class="ss-faq-panel accordion flex flex-col gap-4"
                data-panel="tab-<?php echo $tab_index; ?>"
                <?php echo $tab_index !== 0 ? 'style="display:none;"' : ''; ?>>

                <?php if ( ! empty( $tab['faq_posts'] ) ) : ?>
                    <?php foreach ( $tab['faq_posts'] as $faq_index => $faq_post ) : ?>
                        <?php
                        $is_first = ( $faq_index === 0 && $tab_index === 0 );
                        $question = get_the_title( $faq_post );
                        $answer   = get_the_content( null, false, $faq_post );
                        ?>
                        <div class="ss-faq-item accordion-item <?php echo $is_first ? ' itemActive' : ''; ?> bg-white border border-navy/10 rounded px-6 py-4 cursor-pointer">
                            <div class="accordionBtn flex items-start justify-between gap-6 <?php echo $is_first ? ' active' : ''; ?> [&.active_i]:rotate-180 [&.active_i]:before:content-['\e92d']">
                                <p class="mb-0 font-body font-semibold text-lg text-navy leading-snug"><?php echo esc_html( $question ); ?></p>
                                <?php if ( $icon_open || $icon_closed ) : ?>
                                    <i class="ss-faq-icon <?php echo esc_attr( $is_first ? $icon_open : $icon_closed ); ?> mt-1 shrink-0 text-sm leading-none transition-all duration-300 origin-center pointer-events-none"
                                        data-open-class="<?php echo esc_attr( $icon_open ); ?>"
                                        data-closed-class="<?php echo esc_attr( $icon_closed ); ?>"
                                        aria-hidden="true"></i>
                                <?php endif; ?>
                            </div>
                            <div class="ss-faq-body accordionBody mt-3"<?php echo $is_first ? '' : ' style="display:none;"'; ?>>
                                <div class="font-body font-normal text-md text-navy leading-relaxed">
                                    <?php echo wp_kses_post( apply_filters( 'the_content', $answer ) ); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="bg-white border border-navy/10 rounded px-6 py-4">
                        <p class="font-body font-semibold text-lg text-navy">No FAQ items added yet.</p>
                    </div>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>

    </div>
</section>
