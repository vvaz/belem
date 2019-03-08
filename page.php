<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuzzKery
 */

get_header();
?>

<?php if ( has_post_thumbnail() ) {
	$thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
  $thumbnail_url = $thumbnail_data[0]; ?>

	<header style="background-image:url('<?php echo $thumbnail_url ?>')" class="page-header parallax relative single-header">

		<div class="archive-title">

		</div>
	</header><!-- .page-header -->

<?php } ?>



	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="my-container-3 cf">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
