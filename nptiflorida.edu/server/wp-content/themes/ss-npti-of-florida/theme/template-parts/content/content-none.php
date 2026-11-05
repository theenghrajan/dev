<?php
/**
 * Template part for displaying a message when posts are not found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ss_theme
 */

?>
<section class="max-w-[900px] mx-auto py-12 2xl:py-20">
	<header>
		<?php if ( is_search() ) : ?>

			<h1>
				<?php
				printf(
					/* translators: 1: search result title. 2: search term. */
					'<h2>%1$s <span>%2$s</span></h2>',
					esc_html__( 'Search results for:', 'ss_theme' ),
					get_search_query()
				);
				?>
			</h1>

		<?php else : ?>

			<h2><?php esc_html_e( 'Nothing Found', 'ss_theme' ); ?></h2>

		<?php endif; ?>
	</header><!-- .page-header -->

	<div class="[&_label]:mb-0 [&_input[type='submit']]:border-blue [&_input[type='submit']]:border">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
			?>

			<p>
				<?php esc_html_e( 'Your site is set to show the most recent posts on your homepage, but you haven&rsquo;t published any posts.', 'ss_theme' ); ?>
			</p>

			<p>
				<a href="<?php echo esc_url( admin_url( 'edit.php' ) ); ?>">
					<?php
					/* translators: 1: link to WP admin new post page. */
					esc_html_e( 'Add or publish posts', 'ss_theme' );
					?>
				</a>
			</p>

			<?php
		elseif ( is_search() ) :
			?>

			<p>
				<?php esc_html_e( 'Your search generated no results. Please try a different search.', 'ss_theme' ); ?>
			</p>

			<?php
			get_search_form();
		else :
			?>

			<p>
				<?php esc_html_e( 'No content matched your request.', 'ss_theme' ); ?>
			</p>

			<?php
			get_search_form();
		endif;
		?>
	</div><!-- .page-content -->

</section>
