<?php

function thim_child_enqueue_styles() {
	if (is_rtl()) {
		wp_enqueue_style( 'thim-parent-style', get_template_directory_uri() . '/style-rtl.css', array('fontawesome','bootstrap','ionicons','magnific-popup','owl-carousel','select2') );		
	}else{
		wp_enqueue_style( 'thim-parent-style', get_template_directory_uri() . '/style.css', array('fontawesome','bootstrap','ionicons','magnific-popup','owl-carousel','select2') );
	}
}

add_action( 'wp_enqueue_scripts', 'thim_child_enqueue_styles', 1000 );