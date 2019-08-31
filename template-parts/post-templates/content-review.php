<?php
/**
 * Template part for displaying post reviews
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Belem
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php /*
	<header class="entry-header bg-white">

		<?php
		if ( is_single() ) :
			// the_title( '<h1 class="entry-title"><span>', '</span></h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>


		<div class="subtitulo">

		<p>
		<?php
		// Grab the metadata from the database
		$text = get_post_meta( get_the_ID(), '_wpbox_text', true );

		// Echo the metadata
		echo $text;
		?></p>
		</div>

		<?php

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta article-date-categories">
			<?php wpbox_posted_on_categories(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php get_template_part( 'template-parts/content', 'share' ); ?>

	</header><!-- .entry-header -->
*/ ?>
  <?php
  $url = esc_url( get_post_meta( get_the_ID(), '_wpbox_embed', 1 ) );

  if ( !empty($url) ) : ?>
    <div class="video-iframe">
      <?php	echo wp_oembed_get( $url ); ?>
    </div>

  <?php  /*elseif ( has_post_thumbnail() ) : ?>


		<?php $text = get_post_meta( get_the_ID(), '_wpbox_credit', true ); ?>
							<div class="post-image-right">
								<a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
									<img src="<?php echo the_post_thumbnail_url();?>" alt="<?php the_title(); ?>" />
								</a>
								<h3 class="cap-right"><?php echo $text; ?></h3>
							</div>

<?php
  */
  endif;

  $categories = get_the_category();
  ?>



  <div class="w-100 cf">
    <header class="post-header w-100 tc">

      <?php if ( ! empty( $categories ) ) { ?>
        <div class="post-category boxblue">
          <?php echo esc_html( $categories[0]->name ); ?>
        </div>
      <?php } ?>

      <div class="post-title">
        <h1 class="title">
          <?php the_title(); ?>
        </h1>
      </div>

      <div class="post-thumbnail" style="background-image: url('<?php echo the_post_thumbnail_url();?>')"></div>

    </header><!-- .post-header -->
  </div>

  <div class="w-100-wt w-100-wm w-75-ns">


  <div class="entry-content pa3">
    <?php
    the_content( sprintf(
    /* translators: %s: Name of current post. */
      wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wpbox' ), array( 'span' => array( 'class' => array() ) ) ),
      the_title( '<span class="screen-reader-text">"', '"</span>', false )
    ) );

    wp_link_pages( array(
      'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpbox' ),
      'after'  => '</div>',
    ) );
    ?>
  </div><!-- .entry-content -->

  <footer class="entry-footer">
    <?php // wpbox_entry_footer(); ?>
  </footer><!-- .entry-footer -->

  </div>
</article><!-- #post-## -->
