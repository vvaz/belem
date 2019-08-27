<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuzzKery
 */

get_header(); ?>

<?php /*
<div class="test" style="height: 200px; width: 200px;"></div>
*/ ?>

  <div id="primary" class="content-area center">
    <main id="main" class="site-main cf" role="main">

      <div class="my-container cf">
        <div class="fl w-100 w-100-wt w-75-ns main-posts-container">
          <div class="mw8 center">

            <div class="cf">

              <section class="cf w-100">

                

								<?php
								if ( have_posts() ) :

								if ( is_home() && ! is_front_page() ) : ?>

				<div id="tag-most-recent" class="tag"><div data-ix="show-tag-title" style="transform: translateX(0px) translateY(0px) translateZ(0px); transition: transform 350ms ease 0s;">+ Recentes</div></div>
                  <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                  </header>

									<?php
								endif; ?>



								<?php
								$i = 1;
								$checki = array(2, 5, 9);
								$checki2 = array(3, 4, 7, 8);
								/* Start the Loop */
								while ( have_posts() && $i < 10) : the_post();

								if ($i == 1) :
								get_template_part( 'template-parts/content', 'homefw' );
								$i++;
								?>

                <div id="ms-container" class="masonry-loop">

									<?php

                  elseif ($i == 6) :
										get_template_part( 'template-parts/content', 'cta-facebook' );
										get_template_part( 'template-parts/content', 'home-wide' );
										$i++;

                  elseif (in_array($i, $checki)) :
										get_template_part( 'template-parts/content', 'home-wide' );
										$i++;

                  elseif (in_array($i, $checki2)) :
										get_template_part( 'template-parts/content', 'home' );
										$i++;


									endif;

									/*
																		 * Include the Post-Format-specific template for the content.
																		 * If you want to override this in a child theme, then include a file
																		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
																		 */


									endwhile;



									else :

										get_template_part( 'template-parts/content', 'none' );

									endif; ?>
                </div>
              </section>

            </div>
          </div>
        </div><?php // fl w-100 ?>



				<?php //get_sidebar(); ?>

				<?php // sidebar ?>
        <div class="fl w-100 w-100-wt w-25-ns pa2 sidebar">
					<?php get_template_part( 'template-parts/content', 'sidebar' ); ?>
        </div>

      </div>

			<?php // /sidebar ?>


			<?php // newsletter ?>

        <?php
        /**
         * Detect plugin. For use on Front End only.
         */
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

        // check for plugin using plugin name
        if ( is_plugin_active( 'wp-content/plugins/mailpoet.php' ) ) {
        //plugin is activated
        ?>
      <div class="cf newsletter">
        <div class="cf fl w-100 pa5 bg-problue newsletter-bg-bl">
          <div class="cf bg-near-white flex flex-newsletter">
            <div class="cf fl w-100 w-100-wt w-100-wm w-100-m w-50-ns bg-babyblue pa4 newsletter-calltoaction">
							<span class="newslettertxt">
								Receba a  <strong>Newsletter do Futuro é Mac</strong> no seu email.
							</span>
            </div>
            <div class="cf fl w-100 w-100-wt w-100-wm w-100-m w-50-ns bg-near-white pt2 ph4">

							<?php
							$form_widget = new \MailPoet\Form\Widget();
							echo $form_widget->widget(array('form' => 1, 'form_type' => 'php'));
							?>
              <br /><br />
              <p class="mt5">Ao subscrever está a aceitar a <a href="#">politica de privacidade.</a> d'<strong>O Futuro é Mac</strong></p>
            </div>
          </div>
        </div>
      </div>

    <?php } ?>
	    <?php // /newsletter ?>

			<?php // most shared ?>
      <div class="my-container-2 cf">
        <div id="most-popular-div" class="fl w-100 relative">
          <div id="tag-most-popular" class="tag"><div data-ix="show-tag-title" style="transform: translateX(0px) translateY(0px) translateZ(0px); transition: transform 350ms ease 0s;">Most Popular</div></div>
					<?php get_template_part( 'template-parts/content', 'most-popular' ); ?>
        </div>
      </div>
			<?php // /most shared ?>

    </main><!-- #main -->
  </div><!-- #primary -->
<?php get_footer('masonry');
