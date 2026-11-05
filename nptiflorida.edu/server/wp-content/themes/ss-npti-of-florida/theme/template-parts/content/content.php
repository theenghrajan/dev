<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ss_theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('relative h-full bg-blue-08 rounded-lg p-4 flex flex-col gap-4'); ?>>
	<?php
	if (has_post_thumbnail()): ?>
		<?php the_post_thumbnail('medium', ['class' => 'w-full md:h-[240px] xl:h-[315px] md:aspect-[324/240] xl:aspect-[379/315] object-cover rounded-lg']); ?>
	<?php endif; ?>
	<div class="grow flex flex-col gap-2">
		<div class="grow">
			<p class="font-ui text-xs text-steel">• <?php echo get_the_date('d M Y'); ?></p>
			<?php the_title(sprintf('<h3><a href="%s" class="font-heading font-bold text-lg text-navy leading-snug" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
			<p class="text-sm text-navy line-clamp-2"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
		</div>
		<a href="<?php the_permalink(); ?>"
			class="stretched-link flex items-center gap-2 text-orange font-bold uppercase text-xs no-underline transition-fast hover:opacity-80 self-start">
			Read More
			<i class="icon-arrow-right"></i>
		</a>
	</div>
</article><!-- #post-${ID} -->