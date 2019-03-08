<?php
/**
 * Template part for displaying posts in the homepage
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuzzKery
 */

?>

<div class="tag"><div data-ix="show-tag-title" style="transform: translateX(0px) translateY(0px) translateZ(0px); transition: transform 350ms ease 0s;">+ Partilhados</div></div>


<?php



	global $wp_query;
    $args = array(
      // 'cat' => '10', // by category ID
   		'tag' => 'most-shared',
      'posts_per_page' => 6); // if -1 get all posts

		$posts = get_posts($args);

		$i = 1;
		$checki = array(2, 5);




	    foreach ($posts as $post) :

				if(in_array($i, $checki)) :

					/*
					<div class="w-100 w-100-wt w-100 advertise-container relative pb4">
						<div id="tag-advertise" class="tag tag-ad"><div data-ix="show-tag-title" style="transform: translateX(0px) translateY(0px) translateZ(0px); transition: transform 350ms ease 0s;">Advertising</div></div>
						<img src="<?php echo home_url();?>/wp-content/uploads/2017/01/573c53bdb4bf17dc47a04bf3_fundo-teste-11-1920-B.jpg" alt="<?php the_title(); ?>" />
					</div>
            */
            ?>

					<div class="w-100 pb4">
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
							the_title( '<h1 class="entry-title pb0 teste f5 f4-ns mb0"><a class="ph2 ph0-ns pb0 link db" href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span>', '</span></a></h1>' );
						else :
							the_title( '<h2 class="entry-title pb0 f5 f4-ns mb0"><a class="ph2 ph0-ns pb0 link db" href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span>', '</span></a></h2>' );
						endif;
						?>
						</header><!-- .entry-header -->

						<footer class="entry-footer pa3 pt2 bg-white">
							<?php wpbox_entry_footer(); ?>
						</footer><!-- .entry-footer -->
						</article><!-- #post-## -->
					</div>

					<?php
					$i++;

				else :?>

	     	<div class="w-100 pb4">
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
						the_title( '<h1 class="entry-title f5 f4-ns mb0"><a class="ph2 ph0-ns pb0 link db" href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span>', '</span></a></h1>' );
					else :
						the_title( '<h2 class="entry-title pb0 f5 f4-ns mb0"><a class="ph2 ph0-ns pb0 link db" href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span>', '</span></a></h2>' );
					endif;
					?>
					</header><!-- .entry-header -->

					<footer class="entry-footer pa3 pt2 bg-white">
						<?php wpbox_entry_footer(); ?>
					</footer><!-- .entry-footer -->
					</article><!-- #post-## -->
				</div>
				<?php $i++; ?>

			<?php endif; ?>

				<?php endforeach; ?>

			<?php wp_reset_query(); ?>
