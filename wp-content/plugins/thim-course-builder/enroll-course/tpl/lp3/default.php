<?php
/**
 * Template for displaying Course button shortcode default style for Learnpress v3.
 *
 * @author  ThimPress
 * @package Course Builder/Templates
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$course        = new LP_Course( intval( $params['id_course'] ) );
$id     = $course->get_id();

LP_Global::set_course( $course );

$hide_text = '';
if ( $params['hide_text'] == 'yes' ) {
	$hide_text = 'hide_text';
} ?>

<div class="thim-sc-enroll-course  <?php echo esc_attr( $params['el_class'] . '' . $hide_text ); ?>">
	<?php if ( $params['hide_text'] != 'yes' ): ?>

		<h3 class="title-course">
			<a href="<?php the_permalink( $id ); ?>">
				<?php echo esc_html( $course->get_title() ) . ' (' . $course->get_price_html() . ')'; ?>
			</a>
		</h3>

		<?php if ( get_the_excerpt( $id ) ): ?>
			<div class="excerpt">
				<p><?php echo esc_html( get_the_excerpt( $id ) ); ?></p>
			</div>
		<?php endif;
	endif; ?>

	<!-- LearnPress template single-course/buttons.php -->
	<div class="learn-press-course-buttons lp-course-buttons">
		<?php
		add_action( 'learn-press/course-button', 'learn_press_course_external_button', 5 );
		add_action( 'learn-press/course-button', 'learn_press_course_purchase_button', 10 );
		add_action( 'learn-press/course-button', 'learn_press_course_enroll_button', 15 );
		/**
		 * @see learn_press_course_purchase_button - 10
		 * @see learn_press_course_enroll_button - 10
		 * @see learn_press_course_retake_button - 10
		 */
		do_action( 'learn-press/course-button' );
		?>
	</div>
</div>