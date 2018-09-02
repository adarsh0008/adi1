<?php

class LP_PMPro_User_Hooks 
{
	public function __construct(){
		# add hook for CAN ENROLL COURSE
		add_filter( 'learn_press_user_can_enroll_course', array( $this, 'can_enroll_course_callback' ), 11, 3 );
		add_filter( 'learn-press/can-enroll-course', array( $this, 'can_enroll_course_callback' ), 11, 3 );

		# add hook for CAN PURCHASE COURSE
		add_filter( 'learn-press/user/can-purchase-course', array($this, 'can_purchase_course_callback'), 11, 3 );
		
		# add hook for can_retake_course
		add_filter( 'learn_press_user_can_retake_course', array($this, 'can_retake_course_callback'), 11, 3 );
	}

	public function can_enroll_course_callback( $can_enroll, $course_id, $user_id ){
		$buy_membership = ( LP()->settings->get( 'buy_through_membership' ) === 'yes' );
		$course_levels  = get_post_meta( $course_id, '_lp_pmpro_levels', false );
		
		if( empty($course_levels) ) {
			return $can_enroll;
		}

		if ( $buy_membership ) {
			$has_membership_level = learn_press_pmpro_hasMembershipLevel( $course_levels, $user_id );
			$can_enroll = $has_membership_level;
		} elseif( !$can_enroll ) {
			$has_membership_level = learn_press_pmpro_hasMembershipLevel( $course_levels, $user_id );
			$can_enroll = $has_membership_level;
		}
		return $can_enroll;
	}
	
	public function can_purchase_course_callback( $can_purchase, $user_id, $course_id ) {
		$course_levels = get_post_meta($course_id, '_lp_pmpro_levels');
		if( empty( $course_levels ) ) {
			return $can_purchase;
		}
		$buy_membership = ( LP()->settings->get( 'buy_through_membership' ) === 'yes' );
		// hide purchase button if only buy course via membership
		if( $buy_membership && !empty($course_levels)) {
			$can_purchase = false;
		}
		return $can_purchase;
	}
	
	public function can_retake_course_callback( $can_retake, $course_id, $user_id ) {
	    
		if($can_retake){
		    return $can_retake;
		}
		$course_levels  = get_post_meta( $course_id, '_lp_pmpro_levels', false );
		if( empty($course_levels) ) {
		    return $can_retake;
		}
		$has_membership_level = learn_press_pmpro_hasMembershipLevel( $course_levels, $user_id );
		$can_retake = 1;
		return $can_retake;
	}
}


$pmpro_user = new LP_PMPro_User_Hooks();
?>