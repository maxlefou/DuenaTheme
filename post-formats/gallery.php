<!--BEGIN .post -->
<article id="post-<?php the_ID(); ?>" <?php post_class('post__holder'); ?>>

	<?php
	$stickyclass = 'sticky';
	if(!is_singular()) :
		duena_revival_gallery_sl();
	endif; ?>
	<header class="post-header <?php if( is_singular() && is_sticky() ) echo esc_attr( $stickyclass ); ?>">

		<?php if ( is_sticky() ) echo "<span class='featured_badge'><i class='fas fa-thumbtack' style='font-weight: 900;'></i><strong>".__( 'Featured', 'duena-revival' )."</strong></span>"; ?>

		<?php if(!is_singular()) : ?>

		<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php esc_attr_e(__('Permalink to:', 'duena-revival'));?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

		<?php else :?>

		<h1 class="post-title"><?php the_title(); ?></h1>

		<?php endif; ?>

	</header>



	<?php if(!is_singular()) : ?>

		<div class="post_content">
			<?php if ( false != get_theme_mod('post_excerpt', true)) { ?>
				<div class="excerpt">
				<?php
					$excerpt = get_the_excerpt();
					if (has_excerpt()) {
						the_excerpt();
					} else {
						echo apply_filters( 'the_excerpt', duena_revival_string_limit_words($excerpt,55) );
					}
				?>
				</div>
			<?php } ?>
			<?php if ( false != get_theme_mod('post_button', true)) { ?>
				<a href="<?php the_permalink() ?>" class="more_link"><?php _e('Read more', 'duena-revival'); ?></a>
			<?php } ?>
		</div>

	<?php else :?>

		<!-- Gallery Post -->
		<div class="gallery-post">

			<?php
				if ( function_exists('the_remaining_content') ) {
					the_remaining_content( __( 'Continue reading', 'duena-revival' ) );
				} else {
					the_content('');
				}
			?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'duena-revival' ), 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );  ?>

		</div>
		<!-- /Gallery Post -->
		<?php if( has_tag() ) { ?>
			<footer class="post-footer">
				<i class="fa fa-tags"></i> <?php the_tags(__( 'Tags: ', 'duena-revival' ), ' ', ''); ?>
			</footer>
		<?php } ?>
		<?php endif; ?>

		<?php get_template_part('post-formats/post-meta'); ?>

</article><!--END .post-->

<?php if ( is_single() && get_the_author_meta( 'description' ) ) {
		get_template_part( 'post-formats/author-bio' );
	} ?>
