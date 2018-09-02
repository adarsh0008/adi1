<?php

function thim_get_all_plugins_require( $plugins ) {
	return array(
		array(
			'name'     => 'LearnPress',
			'slug'     => 'learnpress',
			'required' => true,
		),
		array(
			'name'     => 'Thim Course Builder',
			'slug'     => 'thim-course-builder',
			'premium'  => true,
			'required' => true,
			'icon'     => 'https://plugins.thimpress.com/downloads/images/learnpress-certificates.png',
		),

		array(
			'name'     => 'Widget Logic',
			'slug'     => 'widget-logic',
			'premium'  => true,
			'required' => true,
		),

		array(
			'name'     => 'LearnPress - Announcements',
			'slug'     => 'learnpress-announcements',
			'premium'  => true,
			'required' => false,
//			'icon'     => 'https://plugins.thimpress.com/downloads/images/learnpress-announcements.png',
		),
		array(
			'name'        => 'Learnpress Certificates',
			'slug'        => 'learnpress-certificates',
			'premium'     => true,
			'required'    => false,
			'icon'        => 'https://plugins.thimpress.com/downloads/images/learnpress-certificates.png',
			'description' => 'An addon for LearnPress plugin to create certificate for a course By ThimPress.',
		),
		array(
			'name'        => 'LearnPress - Coming Soon Courses',
			'slug'        => 'learnpress-coming-soon-courses',
			'premium'     => true,
			'required'    => false,
			'description' => 'Set a course is "Coming Soon" and schedule to public.',
			'add-on'      => true,
		),
		array(
			'name'        => 'LearnPress Co-Instructors',
			'slug'        => 'learnpress-co-instructor',
			'premium'     => true,
			'required'    => false,
			'icon'        => 'https://plugins.thimpress.com/downloads/images/learnpress-co-instructor.png',
			'description' => 'Building courses with other instructors By ThimPress.',
		),
		array(
			'name'        => 'LearnPress Collections',
			'slug'        => 'learnpress-collections',
			'premium'     => true,
			'required'    => false,
			'icon'        => 'https://plugins.thimpress.com/downloads/images/learnpress-collections.png',
			'description' => 'Collecting related courses into one collection by administrator By ThimPress.',
		),
		array(
			'name'        => 'LearnPress - Content Drip',
			'slug'        => 'learnpress-content-drip',
			'premium'     => true,
			'required'    => false,
			'description' => 'Decide when learners will be able to access the lesson content.',
			'add-on'      => true,
		),
		array(
			'name'        => 'LearnPress Course Review',
			'slug'        => 'learnpress-course-review',
			'required'    => false,
			'description' => 'Adding review for course By ThimPress.',
		),
		array(
			'name'        => 'LearnPress – Export Import',
			'slug'        => 'learnpress-import-export',
			'required'    => false,
			'description' => 'Export/Import courses along with their lessons and quizzes.',
			'add-on'      => true,
		),
		array(
			'name'        => 'LearnPress - Fill-in-blank Question',
			'slug'        => 'learnpress-fill-in-blank',
			'required'    => false,
			'description' => 'Create fill-in-blank question type.',
			'add-on'      => true,
		),
		array(
			'name'        => 'LearnPress - Gradebook',
			'slug'        => 'learnpress-gradebook',
			'premium'     => true,
			'required'    => false,
			'description' => 'Adding Course Gradebook for LearnPress.',
			'add-on'      => true,
		),
		array(
			'name'        => 'LearnPress - Instructor Commission',
			'slug'        => 'learnpress-commission',
			'premium'     => true,
			'required'    => false,
			'description' => 'Commission add-on for LearnPress.',
			'add-on'      => true,
		),
		array(
			'name'        => 'LearnPress - myCred Integration',
			'slug'        => 'learnpress-mycred',
			'premium'     => true,
			'required'    => false,
			'description' => 'Running with the point management system - myCred.',
			'add-on'      => true,
		),
		array(
			'name'        => 'LearnPress – Offline Payment',
			'slug'        => 'learnpress-offline-payment',
			'required'    => false,
			'description' => 'Transaction can be done offline if other payment gateways are not available.',
			'add-on'      => true,
		),
		array(
			'name'        => 'LearnPress - Paid Membership Pro Integration',
			'slug'        => 'learnpress-paid-membership-pro',
			'premium'     => true,
			'required'    => false,
			'icon'        => 'https://plugins.thimpress.com/downloads/images/learnpress-paid-membership-pro.png',
			'description' => 'Paid Membership Pro add-on for LearnPress By ThimPress.',
		),
		array(
			'name'        => 'LearnPress – Prerequisites Courses',
			'slug'        => 'learnpress-prerequisites-courses',
			'required'    => false,
			'description' => 'Allow instructor to set prerequisite courses for a certain course.',
			'add-on'      => true,
		),
		array(
			'name'        => 'LearnPress - Randomize Quiz Questions',
			'slug'        => 'learnpress-random-quiz',
			'premium'     => true,
			'required'    => false,
			'description' => 'Mix all available questions in a quiz.',
			'add-on'      => true,
		),
		array(
			'name'        => 'LearnPress - Sorting Choice Question',
			'slug'        => 'learnpress-sorting-choice',
			'premium'     => true,
			'required'    => false,
			'description' => 'Sorting Choice provide ability to sorting the options of a question to the right order.',
			'add-on'      => true,
		),
		array(
			'name'        => 'LearnPress - Stripe Payment',
			'slug'        => 'learnpress-stripe',
			'premium'     => true,
			'required'    => false,
			'description' => 'Stripe payment gateway for LearnPress.',
			'add-on'      => true,
		),
		array(
			'name'        => 'LearnPress - Students List	',
			'slug'        => 'learnpress-students-list',
			'premium'     => true,
			'required'    => false,
			'description' => 'Get students list by filters.',
			'add-on'      => true,
		),
		array(
			'name'        => 'LearnPress Wishlist',
			'slug'        => 'learnpress-wishlist',
			'required'    => false,
			'description' => 'Wishlist feature By ThimPress.',
			'add-on'      => true,
		),
		array(
			'name'        => 'LearnPress - WooCommerce Payment Methods Integration',
			'slug'        => 'learnpress-woo-payment',
			'premium'     => true,
			'required'    => false,
			'icon'        => 'https://plugins.thimpress.com/downloads/images/learnpress-woo-payment.png',
			'description' => 'Support paying for a booking with the payment methods provided by Woocommerce.',
		),
		array(
			'name'        => 'LearnPress Assignments',
			'slug'        => 'learnpress-assignments',
			'premium'     => true,
			'required'    => false,
			'description' => 'Assignments add-on for LearnPress.',
			'add-on'      => true,
		),
		array(
			'name'     => 'WPBakery Visual Composer',
			'slug'     => 'js_composer',
			'premium'  => true,
			'required' => true,
		),
		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		),
		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false,
		),
		array(
			'name'     => 'WP Events Manager',
			'slug'     => 'wp-events-manager',
			'required' => false,
		),
		array(
			'name'     => 'Paid Memberships Pro',
			'slug'     => 'paid-memberships-pro',
			'required' => false,
		),
		array(
			'name'     => 'WordPress Social Login',
			'slug'     => 'wordpress-social-login',
			'required' => false,
		),

		array(
			'name'     => 'MailChimp for WordPress',
			'slug'     => 'mailchimp-for-wp',
			'required' => false,
		),
	);
}

add_action( 'thim_core_get_all_plugins_require', 'thim_get_all_plugins_require' );

function thim_get_core_require() {
	$thim_core = array(
		'name'    => 'Thim Core',
		'slug'    => 'thim-core',
		'version' => '1.0.6.1',
		'source'  => 'https://foobla.bitbucket.io/thim-core/dist/thim-core.zip',
	);

	return $thim_core;
}


function thim_envato_item_id() {
	return '20370918';
}

add_filter( 'thim_envato_item_id', 'thim_envato_item_id' );