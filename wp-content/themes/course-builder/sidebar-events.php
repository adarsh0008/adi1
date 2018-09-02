<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package thim
 */
if ( ! is_active_sidebar( 'sidebar_events' ) ) {
	return;
}
$wrapper_layout = 'sidebar-left';
if ( get_theme_mod( 'event_archive_layout' ) != '' ) {
	$wrapper_layout = get_theme_mod( 'event_archive_layout' );
}

// Get class layout
$sidebar_class_col = 'flex-last';
if ( $wrapper_layout == 'sidebar-left' ) {
	$sidebar_class_col = "flex-first";
}
if ( $wrapper_layout == 'sidebar-right' ) {
	$sidebar_class_col = 'flex-last';
}
?>
<?php if ( $wrapper_layout != 'full-sidebar' ) { ?>
	<aside id="secondary" class="sidebar-events widget-area col-md-3 sticky-sidebar <?php echo esc_attr( $sidebar_class_col ); ?>">
		<?php

		if( is_singular('tp_event') ) {
			echo '<div class="widget_book-event">';
			wpems_get_template( 'loop/booking-form.php', array( 'event_id' => get_the_ID() ) );
			echo '</div>';
		}
		?>

        <?php
        if ( is_archive() ) {
            if ( ! dynamic_sidebar( 'sidebar_events' ) ) :
			dynamic_sidebar( 'sidebar_events' );
		    endif;
        }
        ?>
	</aside><!-- #secondary -->
<?php } ?>