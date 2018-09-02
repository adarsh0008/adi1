<?php
/**
 * Panel LearnPress
 *
 * @package Thim_Starter_Theme
 */

thim_customizer()->add_panel(
	array(
		'id'       => 'learnpress',
		'priority' => 44,
		'title'    => esc_html__( 'LearnPress', 'course-builder' ),
		'icon'     => 'dashicons-welcome-learn-more',
	)
);
