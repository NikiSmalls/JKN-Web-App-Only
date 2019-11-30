<?php
/**
 * The template for displaying comments
 * @package Child Education
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
if ( comments_open()) : ?>
<div class="row">
    <div class="col-xs-12">
    	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php $child_education_comments_number = get_comments_number();
			if ( '1' === $child_education_comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'child-education' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$child_education_comments_number,
						'comments title',
						'child-education'
					),
					number_format_i18n( $child_education_comments_number ),
					get_the_title()
				);
			} ?>
		</h2>
        <div class="comment-area">
            <?php wp_list_comments( array(
				'avatar_size' => 60,
				'style'       => 'div',
				'short_ping'  => true,
				'reply_text'  => esc_html__( 'Reply', 'child-education' ),
			) ); ?>
        </div>
        <?php the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous', 'child-education' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next', 'child-education' ) . '</span>',
		) );
		endif; ?>
    </div>
</div>
<!--Comments-Area-Start-->
<?php comment_form();
endif;