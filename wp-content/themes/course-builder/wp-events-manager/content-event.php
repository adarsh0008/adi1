<?php
/**
 * The template for displaying event content in the single-event.php template
 *
 * Override this template by copying it to yourtheme/tp-event/templates/content-event.php
 *
 * @author        ThimPress
 * @package       tp-event
 * @version       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$theme_options_data = get_theme_mods();
$column_event     = 4;

$column = isset( $thim_options['event_columns'] ) ? get_theme_mod( 'event_columns' ) : 3;

 if ( isset( $theme_options_data['event_columns'] ) && $theme_options_data['event_columns'] <> '' && $theme_options_data['event_style'] == 'grid' ) {
	 $column_event = 12 / $theme_options_data['event_columns'];
}

if ( ! empty( $_REQUEST['cols'] ) ) {
	$column_event = 12 / $_REQUEST['cols'];
}

$classes[] = 'col-md-' . $column_event . ' col-12 col-sm-6 col-xs-6';
?>

<?php
/**
 * tp_event_before_loop_event hook
 *
 */
do_action( 'tp_event_before_loop_event' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}

?>

<article id="event-<?php the_ID(); ?>" <?php post_class($classes); ?>>

	<div class="content-inner">
		<?php
		/**
		 * tp_event_before_loop_event_summary hook
		 *
		 * @hooked tp_event_show_event_sale_flash - 10
		 * @hooked tp_event_show_event_images - 20
		 */
		do_action( 'tp_event_before_loop_event_item' );
		?>

		<?php if ( has_post_thumbnail() ) : ?>
            <div class="thumbnail-content">

	            <?php do_action( 'tp_event_single_event_thumbnail' ); ?>
                <div class="thumbnail">
		            <?php thim_thumbnail( get_the_ID(), '370x250' ); ?>
                </div>

                <div class="read-more grid">
                    <a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Read more', 'course-builder' ); ?>
                        <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
                <div class="date">
                    <span class="date-start"><?php echo( wpems_event_start( 'd' ) ); ?></span>
                    <span class="month-start"><?php echo( wpems_event_start( 'M' ) ); ?></span>
                </div>
            </div>
		<?php endif; ?>

        <div class="content">
            <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

            <div class="entry-meta">
						<span class="time">
							<i class="fa fa-calendar" aria-hidden="true"></i> <?php echo( wpems_event_start( 'g:i a' ) ); ?> - <?php echo( wpems_event_end( 'g:i a' ) ); ?>
						</span>
				<?php if ( wpems_event_location() ) { ?>
                    <span class="location">
								<i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo( wpems_event_location() ); ?>
							</span>
				<?php } ?>
				<?php thim_entry_meta_author(); ?>
            </div>

            <div class="entry-excerpt">
				<?php the_excerpt(); ?>
            </div>

            <div class="read-more">
                <a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Read more', 'course-builder' ); ?>
                    <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
        </div>


		<?php
		/**
		 * tp_event_after_loop_event_item hook
		 *
		 * @hooked tp_event_show_event_sale_flash - 10
		 * @hooked tp_event_show_event_images - 20
		 */
		do_action( 'tp_event_after_loop_event_item' );
		?>
    </div>

</article>

<?php do_action( 'tp_event_after_loop_event' ); ?>
