<?php
/*
 * Section LearnPress / Features
 * */

thim_customizer()->add_section(
	array(
		'id'       => 'learnpress_features',
		'panel'    => 'learnpress',
		'title'    => esc_html__( 'Features', 'course-builder' ),
		'priority' => 10,
	)
);


thim_customizer()->add_field(
	array(
		'id'       => 'learnpress_new_course_duration',
		'type'     => 'number',
		'label'    => esc_html__( 'New Course Period ( Days )', 'course-builder' ),
		'tooltip'  => esc_html__( 'How long a course is considered as new course. A new course will have NEW label on their them.', 'course-builder' ),
		'section'  => 'learnpress_features',
		'default'  => 3,
		'priority' => 10,
		'choices'  => array(
			'min'  => '1',
			'max'  => '7',
			'step' => '1',
		),
	)
);

thim_customizer()->add_field( array(
	'label'   => esc_html__( 'Hidden Ads', 'course-builder' ),
	'id'      => 'thim_learnpress_hidden_ads',
	'type'    => 'switch',
	'section' => 'learnpress_features',
	'tooltip' => 'Check this box to hide/unhide advertisement',
	'default' => 1,
	'choices' => array(
		true  => esc_html__( 'On', 'course-builder' ),
		false => esc_html__( 'Off', 'course-builder' ),
	),
) );
