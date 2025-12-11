<?php
/**
 * Comments template
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	if ( have_comments() ) {
		?>
		<h2 class="comments-title">
			<?php
			$ascend_comment_count = get_comments_number();
			if ( 1 === $ascend_comment_count ) {
				echo esc_html__( 'One thought on &ldquo;', 'ascend' );
				the_title();
				echo esc_html__( '&rdquo;', 'ascend' );
			} else {
				echo esc_html(
					sprintf(
						_n(
							'%s thought on &ldquo;',
							'%s thoughts on &ldquo;',
							$ascend_comment_count,
							'ascend'
						),
						number_format_i18n( $ascend_comment_count )
					)
				);
				the_title();
				echo esc_html__( '&rdquo;', 'ascend' );
			}
			?>
		</h2><!-- .comments-title -->

		<?php
		wp_list_comments(
			array(
				'style'       => 'div',
				'short_ping'  => true,
				'avatar_size' => 50,
			)
		);
		?>

		<?php
		the_comments_pagination(
			array(
				'prev_text' => esc_html__( 'Older Comments', 'ascend' ),
				'next_text' => esc_html__( 'Newer Comments', 'ascend' ),
			)
		);
		?>
		<?php
	}
	?>

	<?php
	if ( ! comments_open() && get_comments_number() ) {
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ascend' ); ?></p>
		<?php
	}

	comment_form();
	?>

</div><!-- #comments -->
