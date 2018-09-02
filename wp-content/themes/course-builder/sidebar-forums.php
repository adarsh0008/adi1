<?php
/**
 * The Sidebar containing the main widget areas.
 *
 */
if ( ! is_active_sidebar( 'sidebar_forums' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-sm-3 sticky-sidebar">
	<?php if ( ! dynamic_sidebar( 'sidebar_forums' ) ) :
		dynamic_sidebar( 'sidebar_forums' );
	endif; ?>
</aside><!-- #sidebar-forums -->
