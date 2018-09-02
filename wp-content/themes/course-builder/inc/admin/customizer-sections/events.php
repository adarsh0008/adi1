<?php
/**
 * Panel Blog
 * 
 * @package Thim_Starter_Theme
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'events',
        'priority' => 43,
        'title'    => esc_html__( 'Events', 'course-builder' ),
        'icon'     => 'dashicons-calendar',
    )
);