<?php
/**
 * Template part for displaying posts in the homepage
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuzzKery
 */

?>

<?php

	global $wp_query;
    $args = array(
      // 'cat' => '10', // by category ID
   		'tag' => 'most-popular',
      'posts_per_page' => 3); // if -1 get all posts

		$posts = get_posts($args);

		$i = 1;

    foreach ($posts as $post) : ?>

     	<div class="fl w-100-wt w-100-wm w-third pa2 most-popular-article-container">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if ( has_post_thumbnail() ) { ?>

					<?php /*
					<div class="aspect-ratio aspect-ratio--1x1">
      			<img style="background-image:url(<?php echo the_post_thumbnail_url();?>);"
      			class="db bg-center cover aspect-ratio--object2" />
    			</div>
    			*/ ?>

					<?php $text = get_post_meta( get_the_ID(), '_wpbox_credit', true ); ?>
										<div class="post-image-right">
											<a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
												<img src="<?php echo the_post_thumbnail_url('16-9');?>" alt="<?php the_title(); ?>" />
											</a>
											<h3 class="cap-right"><?php echo $text; ?></h3>
										</div>


				<?php } ?>

				<header class="entry-header pa3 pb0 bg-white">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title f5 f4-ns mb0"><span>', '</span></h1>' );
				else :
					the_title( '<h2 class="entry-title f5 f4-ns mb0"><a class="ph2 ph0-ns link db" href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span>', '</span></a></h2>' );
				endif;
				?>
				</header><!-- .entry-header -->

				<footer class="entry-footer pa3 pt2 bg-white">
					<?php wpbox_entry_footer(); ?>
				</footer><!-- .entry-footer -->
				</article><!-- #post-## -->
			</div>

			<?php endforeach; ?>

			<?php wp_reset_query(); ?>
