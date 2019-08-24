<?php
/**
 * WPBox functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WPBox
 */

if ( ! function_exists( 'wpbox_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wpbox_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on BuzzKery, use a find and replace
	 * to change 'wpbox' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wpbox', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( '4-3', 1024, 768, true );
	add_image_size( '16-9', 1024, 576, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'wpbox' ),
	) );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wpbox_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'wpbox_setup' );

// include custom jQuery
function shapeSpace_include_custom_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);

}
// add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wpbox_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wpbox_content_width', 640 );
}
add_action( 'after_setup_theme', 'wpbox_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wpbox_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wpbox' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wpbox' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wpbox_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wpbox_scripts() {

  wp_enqueue_style( 'tachyons', get_template_directory_uri() . '/assets/css/tachyons.min.css' );

	wp_enqueue_style( 'wpbox-style', get_stylesheet_uri() );

	wp_enqueue_style( 'wpbox-style2', get_template_directory_uri() . '/wpbox.css' );

	wp_enqueue_script( 'wpbox-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wpbox-custom-js', get_template_directory_uri() . '/js/custom.min.js', array('jquery'), null, true);

	wp_enqueue_script( 'wpbox-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'masonry', '//cdnjs.cloudflare.com/ajax/libs/masonry/3.1.2/masonry.pkgd.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpbox_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
-* CMB2 Fields
 */
//require get_template_directory() . '/cmb2.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// This theme uses wp_nav_menu() in two locations.
function register_my_menus() {
register_nav_menus( array(
  'Topo' => __( 'Topo', 'wpbox' ),
  'Footeresq' => __('Footer Esq', 'wpbox'),
  'Footer2' => __('Footer 2', 'wpbox'),
  'Footer3' => __('Footer 3', 'wpbox'),
	'mobile-menu' => __('Mobile', 'wpbox'),
) );
}
add_action( 'init', 'register_my_menus' );

function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');

add_shortcode('wpbsearch', 'get_search_form');



function add_last_nav_item($items, $args) {

    $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page responsive-menu-pro-item"><a id="smoothup2" class="go-up-link topbutton" href="#top">Go Up <i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></a></li>';

  return $items;
}
add_filter( 'wp_nav_menu_mobile-menu_items', 'add_last_nav_item', 10, 2 );

/* comments */
class comment_walker extends Walker_Comment {
		var $tree_type = 'comment';
		var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

		// constructor – wrapper for the comments list
		function __construct() { ?>

			<section class="comments-list">

		<?php }

		// start_lvl – wrapper for child comments list
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>

			<section class="child-comments comments-list">



		<?php }

		// end_lvl – closing wrapper for child comments list
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>

			</section>

		<?php }

		// start_el – HTML for comment template
		function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
			$depth++;
			$GLOBALS['comment_depth'] = $depth;
			$GLOBALS['comment'] = $comment;
			$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' );

			if ( 'article' == $args['style'] ) {
				$tag = 'article';
				$add_below = 'comment';
			} else {
				$tag = 'article';
				$add_below = 'comment';
			} ?>

			<article <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
				<div class="cf">
					<div class="fl w-100-wt w-100-wm w-20">
						<figure class="gravatar"><?php echo get_avatar( $comment, 65, 'http://2.gravatar.com/avatar/2d191aa2252df76ee91554475ce51b98?s=32&r=g&forcedefault=1', 'Author’s gravatar',  array( 'class' => array( 'img-circle' ) ) ); ?></figure>
					</div>
					<div class="fl w-100-wt w-100-wm w-80">
						<div class="comment-meta post-meta" role="complementary">
							<h4 class="comment-author">
								<a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?> </a>
								<time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('jS F Y') ?> at <a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php comment_time() ?></a></time>
							</h4>

							<?php edit_comment_link('<p class="comment-meta-item">Edit this comment</p>','',''); ?>
							<?php if ($comment->comment_approved == '0') : ?>
							<p class="comment-meta-item">Your comment is awaiting moderation.</p>
							<?php endif; ?>
						</div>
						<div class="comment-content post-content" itemprop="text">
							<?php comment_text() ?>
							<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
						</div>
					</div>
				</div>

			<?php }

		// end_el – closing HTML for comment template
		function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

			</article>

		<?php }

		// destructor – closing wrapper for the comments list
		function __destruct() { ?>

			</section>

		<?php }

	}
