<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BuzzKery
 */

get_header(); ?>

<?php  $categories = get_the_category(); ?>
<?php
    /*
    if we want background based on categories do this:
    echo z_taxonomy_image_url($categories[0]->term_id);?>'); */
?>

<header style="background-image: url('<?php if ( has_post_thumbnail()) {
      echo the_post_thumbnail_url();
      } ?>');" class="page-header parallax relative single-header">

	<div class="archive-title">
		<h1 class="page-title">
                <?php the_title(); ?>
        </h1>
        <span class="categorytop">
			<?php

				if ( ! empty( $categories ) ) {
					echo esc_html( $categories[0]->name );
				}
			?>
		</span>
	</div>
</header><!-- .page-header -->

<div id="primary" class="content-area mw9 center">
	<main id="main" class="site-main cf" role="main">
		<div class="my-container-4 cf">


		<div class="fl w-100 w-100-wt w-100-wm w-75-ns pt2 pa2 single-post-container">

		<?php while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );
			get_template_part( 'template-parts/content', 'share' );
      comments_template();
			// the_post_navigation();

			endwhile; // End of the loop.
		?>



		</div>

		<?php // sidebar ?>
		<div class="fl w-100 w-100-wt w-100-wm w-25-ns pa2 sidebar diferent-sidebar">
			<?php //get_template_part( 'template-parts/content', 'sidebar' ); ?>
			<?php get_sidebar(); ?>
		</div>
		<?php // /sidebar ?>


			</div>
			<?php get_template_part( 'template-parts/content', 'cta-single' ); ?>
	</main><!-- #main -->
</div><!-- #primary -->


<script>
AOS.init();

	AOS.refresh();
</script>

<?php get_footer();
