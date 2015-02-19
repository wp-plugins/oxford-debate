<?php
/**
 * Oxd displaying Comments
 *
 *
 */

if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			Comments
			<?php
			/*	printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'oxd' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );*/
			?>
		</h2>

		<ol class="commentlist">
			<?php
				$arrcommA = array(
				'post_id' => get_the_ID(),
				'meta_key' => 'posture',
				'meta_value' => 'a'
				);
				$comments = get_comments($arrcommA);
			?>
			<p>POSTURE A</p>
			<?php
			/*
			printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'oxd' ),
                                        number_format_i18n( get_comments_number($arrcommA) ), '<span>' . get_the_title() . '</span>' );*/
			?>
			<?php wp_list_comments(); ?>




			<?php
				$arrcommB = array(
				'post_id' => get_the_ID(),
				'meta_key' => 'posture',
				'meta_value' => 'B'
				);
				$comments = get_comments($arrcommB);
			?>
			<p>POSTURE B</p>
        	<?php wp_list_comments(); ?>
		
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'oxd' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'oxd' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'oxd' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'oxd' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php $comment_args = array( 'title_reply'=>'Got Something To Say:',

	'fields' => apply_filters( 'comment_form_default_fields', array(
	'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Your Good Name' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .
        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></p>',   
    'email'  => '<p class="comment-form-email">' .
                '<label for="email">' . __( 'Your Email Please' ) . '</label> ' .
                ( $req ? '<span>*</span>' : '' ) .
                '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" />'.'</p>',
    'url'    => '' ) ),
    'comment_field' => 
		'<p>' . 
		'<label for="posture">'. __('Posture') . '</label>' .
    	'<span class="required">*</span>' .
    	'<select name="posture"> ' .
   		'	<option value="a">A</option> ' .
  		'	<option value="b">B</option> ' .
		'</select> </p>' .
		'<p>' .
        '<label for="comment">' . __( 'Let us know what you have to say:' ) . '</label>' .
        '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' .
        '</p>',
    'comment_notes_after' => '',
);

comment_form($comment_args); 
?>

</div><!-- #comments .comments-area -->