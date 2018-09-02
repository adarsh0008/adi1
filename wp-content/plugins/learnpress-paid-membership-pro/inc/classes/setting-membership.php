<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class LP_Settings_PMPro_Membership extends LP_Abstract_Settings_Page {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->id   = 'membership';
		$this->text = __( 'Memberships', 'learnpress-pmpro' );

		parent::__construct();
	}

	public function output_section_general() {
		include LP_ADDON_PMPRO_PATH . '/inc/views/membership.php';
	}

	public function get_settings( $section = '', $tab = '' ) {
		return array(
			array(
				'title' => __( 'Paid Memberships Pro add-on for LearnPress', 'learnpress-pmpro' ),
				'type'  => 'title'
			),
			array(
				'title'   => __( 'Always buy the course through membership', 'learnpress-pmpro' ),
				'id'      => 'buy_through_membership',
				'default' => 'no',
				'type'    => 'yes-no',
			),
			array(
				'title'      => __( 'Button Buy Course', 'learnpress-pmpro' ),
				'id'         => 'button_buy_course',
				'default'    => 'Buy Now',
				'type'       => 'text',
				'visibility' => array(
					'state'       => 'show',
					'conditional' => array(
						array(
							'field'   => 'buy_through_membership',
							'compare' => '!=',
							'value'   => 'yes'
						)
					)
				)
			),
			array(
				'title'      => __( 'Button Buy Membership', 'learnpress-pmpro' ),
				'id'         => 'button_buy_membership',
				'default'    => 'Buy Membership',
				'type'       => 'text'
			),
			array(
				'title' => __( 'When membership access expires', 'learnpress-pmpro' ),
				'type'  => 'title'
			),
			array(
				'title'   => __( 'Preven access course', 'learnpress-pmpro' ),
				'id'      => 'pmpro_prevent_access_course',# mean cancel user order
				'default' => 'yes',
				'type'    => 'yes-no',
			),
			array(
				'title' => __( 'When membership level change', 'learnpress-pmpro' ),
				'type'  => 'title'
			),
			array(
				'title'   => __( 'Update access course', 'learnpress-pmpro' ),
				'id'	  => 'pmpro_update_access_course', # mean add course to user order
				'default' => 'yes',
				'type'	=> 'yes-no',
			),
		);
	}
}

return new LP_Settings_PMPro_Membership();