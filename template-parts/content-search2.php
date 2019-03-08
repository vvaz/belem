<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuzzKery
 */

?>

<div class="fl w-third-ns w-100-wt w-100-wm w-100 pv2 mv2 pa2 tag-allof-container relative ms-item">
<article id="post-<?php the_ID(); ?>" class="bg-white" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) { ?>


		<?php $text = get_post_meta( get_the_ID(), '_wpbox_credit', true ); ?>
							<div class="post-image-right">
								<a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
									<img src="<?php echo the_post_thumbnail_url();?>" alt="<?php the_title(); ?>" />
								</a>
								<h3 class="cap-right"><?php echo $text; ?></h3>
							</div>
	<?php } ?>


	<header class="entry-header pa3 pb0 bg-white">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
?>


	</header><!-- .entry-header -->


	<footer class="entry-footer pa3 pt2 bg-white article-date-categories">
		<?php wpbox_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
</div>
