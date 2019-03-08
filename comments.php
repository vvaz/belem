<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuzzKery
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
 $commenter = wp_get_current_commenter();
 $req = get_option( 'require_name_email' );
 $aria_req = ( $req ? " aria-required='true'" : '' );

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			DISCUSSÃO
		</h2><!-- .comments-title -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'wpbox' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'wpbox' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'wpbox' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php /*
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) ); */
				wp_list_comments(array('walker' => new comment_walker() ));
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'wpbox' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'wpbox' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'wpbox' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wpbox' ); ?></p>
	<?php
	endif;

	$args = array(
		'fields' => apply_filters(
			'comment_form_default_fields', array(
				'author' =>'<div class="row cust-comment-inp cf"><div class="comment-form-author fl w-100 w-100-wt w-100-wm w-third pa2 pl0">' . '<input id="author" placeholder="Nome" name="author" type="text" ' . $aria_req . ' />'.
					( $req ? '' : '' )  .
					'</div>'
					,
				'email'  => '<div class="comment-form-email fl w-100 w-100-wt w-100-wm w-third pa2">' . '<input id="email" placeholder="Email" name="email" type="text" ' . $aria_req . ' />'  .
					( $req ? '' : '' )
					 .
					'</div>',
				'url'    => '<div class="comment-form-url fl w-100 w-100-wt w-100-wm w-third pa2 pr0">' .
				 '<input id="url" name="url" placeholder="Website URL" type="text" /> ' .
		           '</div></div>'
			)
		),
		'comment_field' => '<p class="comment-form-comment">' .

			'<textarea id="comment" name="comment" placeholder="Comentário" cols="45" rows="8" aria-required="true"></textarea>' .
			'</p>',
	    'comment_notes_after' => '',
	    'title_reply' => '<div class="crunchify-text"> <h3>COMENTÁRIO</h3></div>'
	);

	comment_form($args);
	?>

</div><!-- #comments -->
