<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BuzzKery
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="fb:app_id" content="1234" />
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
  <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>

  <script src="https://use.fontawesome.com/b9d228215f.js"></script>

	<?php wp_head(); ?>
</head>

<!-- Begin Inspectlet Embed Code -->
<script type="text/javascript" id="inspectletjs">
    window.__insp = window.__insp || [];
    __insp.push(['wid', 834032438]);
    (function() {
        function ldinsp(){if(typeof window.__inspld != "undefined") return; window.__inspld = 1; var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); };
        setTimeout(ldinsp, 500); document.readyState != "complete" ? (window.attachEvent ? window.attachEvent('onload', ldinsp) : window.addEventListener('load', ldinsp, false)) : ldinsp();
    })();
</script>
<!-- End Inspectlet Embed Code -->

<body <?php body_class(); ?>>


<div id="page" class="site cf">

  <header id="masthead" class="site-header fixed cf w-100 ph4-m bg-white" role="banner">
    <div class="fl w-15">

      <?php if ( get_theme_mod( 'wpbox_logo' ) ) : ?>
          <div class='site-branding'>
              <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                <img src='<?php echo esc_url( get_theme_mod( 'wpbox_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
              </a>
          </div>
      <?php else : ?>
          <hgroup>
              <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
              <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
          </hgroup>
      <?php endif; ?>

      
    </div>

    <div id="buzz-top-nav" class="fl w-65 pv3 ph5">
      <nav id="site-navigation" class="main-navigation f6 fw6 ttu" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
      </nav><!-- #site-navigation -->
    </div>

    <div class="fl w-20 social-navbar-cont">
      <div class="social-navbar tr hide-479">
				<?php get_template_part( 'template-parts/content', 'sociallinks' ); ?>
      </div>
    </div>
		<?php get_search_form(); ?>
  </header><!-- #masthead -->

  <div id="content" class="site-content cf">
