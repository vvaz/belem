<?php
/*
 * Template Name: Review Posts
 * Template Post Type: post, page, product
 */

get_header(); ?>

  <div class="content-area mw9 center">
    <main id="main" class="site-main cf" role="main">
      <div class="posts-container cf">


        <div class="fl w-100 pt2 pa2 single-post-container">

          <?php while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/post-templates/content', 'review' );
            get_template_part( 'template-parts/content', 'share' );
            comments_template();
            // the_post_navigation();

          endwhile; // End of the loop.
          ?>



        </div>

        <?php // sidebar ?>
        <div class="fl w-100 w-100-wt w-100-wm w-25-ns pa2 sidebar diferent-sidebar">
          <?php //get_template_part( 'template-parts/content', 'sidebar' ); ?>
          <?php // get_sidebar(); ?>
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