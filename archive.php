<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuzzKery
 */

get_header(); ?>
<?php $categories = get_the_category(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">



		<?php
		if ( have_posts() ) : ?>

			<header class="page-header parallax relative" style="background-image: url('<?php echo z_taxonomy_image_url($categories[0]->term_id);?>');">
				<?php
					//the_archive_title( '<h1 class="page-title">', '</h1>' );
					// the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				<div class="archive-title">
					<h1 class="page-title">
						<?php echo single_term_title(); ?>
					</h1>
				</div>
			</header><!-- .page-header -->

		<div class="my-container-2 center cf">
			<div id="ms-container" class="flexcnt masonry-loop">
			<div id="tag-all-of"class="tag"><div data-ix="show-tag-title" style="transform: translateX(0px) translateY(0px) translateZ(0px); transition: transform 350ms ease 0s;">All <?php echo single_term_title(); ?></div></div>


			<?php
			$i = 1;
			$checki = array(5, 10, 15);
			while ( have_posts() ) : the_post();
			if(in_array($i, $checki)) : ?>
				<div class="fl w-third-ns w-100-wt w-100 pv2 mv2 pa2 advertise-container ms-item relative">
					<div id="tag-advertise"class="tag tag-ad"><div data-ix="show-tag-title" style="transform: translateX(0px) translateY(0px) translateZ(0px); transition: transform 350ms ease 0s;">Advertising</div></div>
					<img src="<?php echo home_url();?>/wp-content/uploads/2017/01/573c53bdb4bf17dc47a04bf3_fundo-teste-11-1920-B.jpg" alt="<?php the_title(); ?>" />
				</div>

				<?php get_template_part( 'template-parts/content', 'topics' ); ?>

			<?php
			$i++;

		else : ?>


			<?php get_template_part( 'template-parts/content', 'topics' ); ?>

			<?php $i++; ?>

		<?php endif; ?>

			<?php endwhile; ?>

			<?php //the_posts_navigation(); ?>
		</div>
		</div>

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

			<?php // newsletter ?>
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
			<?php // /newsletter ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer('masonry');
