<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BuzzKery
 */

?>

	</div><!-- #content -->
</div><!-- #page -->

<?php
	$footer_title1 = get_theme_mod('footer_title1');
	$footer_title2 = get_theme_mod('footer_title2');
	$footer_title3 = get_theme_mod('footer_title3');
	$footer_title4 = get_theme_mod('footer_title4');
?>

<footer id="colophon" class="site-footer w-100 ph5-ns bg-white cf" role="contentinfo">
  <div class="site-info bg-white">
    <div class="mw9 center ph3-ns tc cf">
      <div class="fl w-50-wt w-25-ns w-100-wm pa2">
        <h4><?php echo $footer_title1 ?></h4>
        <div class="bottomMenu">
          <?php wp_nav_menu( array( 'theme_location' => 'Footeresq' ) ); ?>
        </div>
      </div>
      <div class="fl w-50-wt w-25-ns w-100-wm pa2">
        <h4><?php echo $footer_title2 ?></h4>
        <div class="bottomMenu">
          <?php wp_nav_menu( array( 'theme_location' => 'Footer2' ) ); ?>
					<a id="smoothup" class="go-up-link topbutton" href="#top">Go Up <i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></a>
        </div>
      </div>
      <div class="fl w-50-wt w-25-ns w-100-wm pa2">
        <h4><?php echo $footer_title3 ?></h4>
        <div class="bottomMenu">
          <?php wp_nav_menu( array( 'theme_location' => 'Footer3' ) ); ?>
        </div>
      </div>
      <div class="fl w-50-wt w-25-ns w-100-wm pa2">
        <h4><?php echo $footer_title4 ?></h4>
				<div class="social-navbar">
					<?php get_template_part( 'template-parts/content', 'sociallinks' ); ?>
				</div>
      </div>
    </div>


		<div class="mw9 center ph3-ns bg-white footer-copyright">
			<?php $text = get_theme_mod('footer_credit_blocks'); ?>
			<?php if (empty($text) ) : ?>
            <div class="w-100 tc">
                <?php echo 'Copyright &copy; 2017 - <strong>WPBox Blog Theme on WPBox.io</strong> - WordPress'; ?>
            </div>
			<?php else : ?>
				<div class="w-100 tc">
						<?php echo $text; ?>
				</div>
			<?php endif; ?>
    </div>

  </div><!-- .site-info -->
</footer><!-- #colophon -->


<?php wp_footer(); ?>


<script type="text/javascript">

		jQuery(window).on('load', function(){
	var container = document.querySelector('#ms-container');
	var msnry = new Masonry( container, {
		itemSelector: '.ms-item',
		columnWidth: '.ms-item',
	});

		});


</script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72702106-3', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
