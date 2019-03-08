<?php
/*
Template Name: Contactos
Author: WPBox
*/
?>

<?php get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <header class="page-header parallax relative" style="background-image: url('http://ofuturoemac.dev/wp-content/uploads/2017/06/contactos.png');">
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
			<?php echo do_shortcode('[contact-form-7 id="950" title="Formulário de contacto 1"]') ?>
		</div>

  </main>
</div>


<?php get_footer(); ?>
