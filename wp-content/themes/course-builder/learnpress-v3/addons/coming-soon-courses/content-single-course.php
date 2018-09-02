<?php
/**
 * Template for displaying content of landing course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/addons/coming-soon-courses/content-single-course.php.
 *
 * @author ThimPress
 * @package LearnPress/Coming-Soon-Courses/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$thim_course_page = LP()->settings->get( 'single_course_image_size' );
$width            = ! empty ( $thim_course_page['width'] ) ? $thim_course_page['width'] : 1022;
$height           = ! empty ( $thim_course_page['height'] ) ? $thim_course_page['height'] : 608;

$image_link = wp_get_attachment_url( get_post_thumbnail_id() );
$image_crop = thim_aq_resize( $image_link, $width, $height, true );
$image_html = $image_link ? '<img src="' . esc_url( $image_crop ) . '" alt="' . esc_attr( $post->post_title ) . '" title="' . esc_attr( $post->post_title ) . '" />' : '';


?>

<?php do_action( 'learn_press_before_content_coming_soon' ); ?>

	<figure class="thim-coming-soon-course">
		<?php
		if ( $image_html ) {
			echo( $image_html );
		}
		?>
		<div class="wrap-countdown">
			<?php do_action( 'learn_press_content_coming_soon_countdown' ); ?>
		</div>
		<figcaption class="course-info">
			<h4 class="status"><?php esc_html_e( 'Coming Soon', 'course-builder' ); ?></h4>
			<?php if ( $post->post_excerpt ): ?>
				<p class="excerpt"><?php echo( $post->post_excerpt ); ?></p>
			<?php endif; ?>
		</figcaption>
	</figure>

<?php do_action( 'learn_press_content_coming_soon_message' ); ?>

<?php do_action( 'learn_press_content_coming_soon_content_tabs' ); ?>

<?php do_action( 'learn_press_content_coming_soon_meta_details' ); ?>

<?php do_action( 'learn_press_after_content_coming_soon' ); ?>