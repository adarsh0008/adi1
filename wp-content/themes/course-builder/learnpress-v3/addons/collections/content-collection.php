<?php
/**
 * Template for displaying collection content within the loop.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/addons/collection/content-collection.php.
 *
 * @author  ThimPress
 * @package LearnPress/Collections/Templates
 * @version 3.0.0
 */

/**
 * Prevent loading this file directly
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<li id="post-<?php the_ID(); ?>" <?php post_class( 'collection-item' ); ?>>

	<?php do_action( 'learn_press_collections_before_loop_item' ); ?>

	<?php
	if ( has_post_thumbnail() ) {
		thim_thumbnail( get_the_ID(), '264x177' );
	}
	?>
	<a class="collection-wrapper" href="<?php echo esc_url( get_the_permalink() ); ?>">
		<?php do_action( 'learn_press_collections_loop_item_title' ); ?>
		<?php Thim_SC_Courses_Collection::course_number( get_the_ID() ); ?>
	</a>

	<?php do_action( 'learn_press_collections_after_loop_item' ); ?>

</li>
