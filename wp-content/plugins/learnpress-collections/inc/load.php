<?php
/**
 * Plugin load class.
 *
 * @author   ThimPress
 * @package  LearnPress/Collections/Classes
 * @version  3.0.0
 */
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'LP_Addon_Collections' ) ) {
	/**
	 * Class LP_Addon_Collections
	 */
	class LP_Addon_Collections extends LP_Addon {
		/**
		 * @var string
		 */
		public $version = LP_ADDON_COLLECTIONS_VER;

		/**
		 * @var string
		 */
		public $require_version = LP_ADDON_COLLECTIONS_REQUIRE_VER;

		/**
		 * @var bool
		 */
		public static $in_loop = false;

		/**
		 * LP_Addon_Collections constructor.
		 */
		public function __construct() {
			parent::__construct();
			add_action( 'widgets_init', array( $this, 'register_widget' ) );
		}

		/**
		 * Define Learnpress Collections constants.
		 *
		 * @since 3.0.0
		 */
		protected function _define_constants() {
			define( 'LP_COLLECTIONS_PATH', dirname( LP_ADDON_COLLECTIONS_FILE ) );
			define( 'LP_COLLECTIONS_INC', LP_COLLECTIONS_PATH . '/inc/' );
			define( 'LP_COLLECTIONS_TEMPLATES', LP_COLLECTIONS_PATH . '/templates/' );
			define( 'LP_COLLECTION_CPT', 'lp_collection' );
		}

		/**
		 * Include required core files used in admin and on the frontend.
		 *
		 * @since 3.0.0
		 */
		protected function _includes() {
			require_once LP_COLLECTIONS_INC . 'functions.php';
			require_once LP_COLLECTIONS_INC . 'class-lp-collection-post-type.php';
			require_once LP_COLLECTIONS_INC . 'widget.php';
		}

		/**
		 * Init hooks.
		 */
		protected function _init_hooks() {
			add_filter( 'learn-press/admin-course-tabs', array( $this, 'add_course_tab' ) );
			add_filter( 'is_learnpress', array( $this, 'is_learnpress' ) );
			add_action( 'template_include', array( $this, 'show_collection' ), 10 );
			add_filter( 'post_class', array( $this, 'collection_class' ) );
			add_action( 'save_post_' . LP_COLLECTION_CPT, array( $this, 'update_collection' ), 10 );
			add_action( 'save_post_' . LP_COURSE_CPT, array( $this, 'update_course' ), 10 );
			add_shortcode( 'learn_press_collection', array( $this, 'shortcode' ) );
		}

		/**
		 * Add Collections tab in admin course.
		 *
		 * @param $tabs
		 *
		 * @return array
		 */
		public function add_course_tab( $tabs ) {
			$collection = array( 'course_collection' => new RW_Meta_Box( self::course_collections_meta_box() ) );

			return array_merge( $tabs, $collection );
		}

		/**
		 * Collections meta box in admin course.
		 *
		 * @return mixed
		 */
		public function course_collections_meta_box() {
//
//			$args = array(
//				'post_types' => LP_COLLECTION_CPT
//			);

			$meta_box = array(
				'title'      => __( 'Collections', 'learnpress-collections' ),
				'post_types' => LP_COURSE_CPT,
				'context'    => 'normal',
				'icon'       => 'dashicons-list-view',
				'priority'   => 'high',
				'pages'      => array( LP_COURSE_CPT ),
				'fields'     => array(
					array(
						'name'        => __( 'Collections', 'learnpress_collections' ),
						'id'          => '_lp_course_collections',
						'type'        => 'post',
						'post_type'   => LP_COLLECTION_CPT,
						'field_type'  => 'select_advanced',
						'multiple'    => true,
						'desc'        => __( 'Select collections that contains this course.', 'learnpress-collections' ),
						'desc_none'   => wp_kses( __( 'There is no collection to select. Create <a href="' . admin_url( "post-new.php?post_type=" . LP_COLLECTION_CPT ) . '" target="_blank">here</a>.', 'learnpress-collections' ), array(
							'a' => array(
								'href'   => array(),
								'target' => array()
							)
						) ),
						'placeholder' => __( 'Select collections', 'learnpress_collections' ),
						'query_args'  => array( 'author' => '' )
					)
				)
			);

			return apply_filters( 'learn-press/course-collections/settings-meta-box-args', $meta_box );
		}

		/**
		 * @param $template
		 *
		 * @return string
		 */
		public function show_collection( $template ) {
			$file = '';
			if ( is_singular( array( LP_COLLECTION_CPT ) ) ) {
				global $post;
				if ( ! preg_match( '/\[learn_press_collection\s?(.*)\]/', $post->post_content ) ) {
					$post->post_content .= '[learn_press_collection id="' . get_the_ID() . '" limit="2"]';
				}

				$file   = 'single-collection.php';
				$find[] = learn_press_template_path() . "/addons/collections/{$file}";
			} elseif ( is_post_type_archive( LP_COLLECTION_CPT ) ) {
				$file   = 'archive-collection.php';
				$find[] = learn_press_template_path() . "/addons/collections/{$file}";
			}
			if ( $file ) {
				$template = locate_template( array_unique( $find ) );
				if ( ! $template ) {
					$template = LP_COLLECTIONS_TEMPLATES . $file;
				}
			}

			return $template;
		}

		/**
		 * Register new Collections widget
		 */
		public function register_widget() {
			register_widget( 'LP_Collections_Widget' );
		}

		/**
		 * Add is_learnpress condition.
		 *
		 * @param $is
		 *
		 * @return bool
		 */
		public function is_learnpress( $is ) {
			return $is || is_post_type_archive( LP_COLLECTION_CPT ) || is_singular( array( LP_COLLECTION_CPT ) );
		}

		/**
		 * @param $classes
		 *
		 * @return array
		 */
		public function collection_class( $classes ) {
			if ( is_singular( array( LP_COLLECTION_CPT ) ) ) {
				$classes = (array) $classes;
				if ( false !== ( $key = array_search( 'hentry', $classes ) ) ) {
					unset( $classes[ $key ] );
				}
			}

			return $classes;
		}

		/**
		 * @param array $atts
		 *
		 * @return string
		 */
		public function shortcode( $atts = null ) {
			$atts = shortcode_atts(
				array(
					'id'    => 0,
					'limit' => 10
				),
				$atts
			);
			ob_start();
			$id      = $atts['id'];
			$content = '';
			if ( $id ) {
				$courses = get_post_meta( $id, '_lp_collection_courses' );
				if ( ! $courses ) {
					$courses = array( 0 );
				}
				$limit    = absint( get_post_meta( $id, '_lp_collection_courses_per_page', true ) );
				$limit    = $limit ? $limit : $atts['limit'];
				$args     = array(
					'post_type'           => 'lp_course',
					'post_status'         => 'publish',
					'post__in'            => $courses,
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => $limit,
					'offset'              => ( max( intval( get_query_var( 'collection_page' ) ) - 1, 0 ) ) * $limit
				);
				$query    = new WP_Query( $args );
				$template = learn_press_collections_locate_template( 'archive-collection-course.php' );
				include $template;
				wp_reset_postdata();
			}
			$content = ob_get_clean();

			return $content;
		}

		/**
		 * Update collection.
		 *
		 * @param $collection_id
		 */
		public function update_collection( $collection_id ) {
			$new_courses = isset( $_POST['_lp_collection_courses'] ) ? $_POST['_lp_collection_courses'] : array();
			$old_courses = get_post_meta( $collection_id, '_lpr_collection_courses' ) ? get_post_meta( $collection_id, '_lp_collection_courses' ) : array();
			$added       = array_diff( $new_courses, $old_courses );
			$removed     = array_diff( $old_courses, $new_courses );
			if ( $added ) {
				foreach ( $added as $course ) {
					$collections = get_post_meta( $course, '_lp_course_collections' );
					if ( ! in_array( $collection_id, $collections ) ) {
						add_post_meta( $course, '_lp_course_collections', $collection_id );
					}
				}
			}
			if ( $removed ) {
				foreach ( $removed as $course ) {
					$collections = get_post_meta( $course, '_lp_course_collections' );
					if ( in_array( $collection_id, $collections ) ) {
						delete_post_meta( $course, '_lp_course_collections', $collection_id );
					}
				}
			}
		}

		/**
		 * Update course.
		 *
		 * @param $course_id
		 */
		public function update_course( $course_id ) {
			$new_collections = isset ( $_POST['_lp_course_collections'] ) ? $_POST['_lp_course_collections'] : array();
			$old_collections = get_post_meta( $course_id, '_lp_course_collections' ) ? get_post_meta( $course_id, '_lp_course_collections' ) : array();
			$added           = array_diff( $new_collections, $old_collections );
			$removed         = array_diff( $old_collections, $new_collections );

			if ( $added ) {
				foreach ( $added as $collection ) {
					$courses = get_post_meta( $collection, '_lp_collection_courses' );
					if ( ! in_array( $course_id, $courses ) ) {
						add_post_meta( $collection, '_lp_collection_courses', $course_id );
					}
				}
			}
			if ( $removed ) {
				foreach ( $removed as $collection ) {
					$courses = get_post_meta( $collection, '_lp_collection_courses' );
					if ( in_array( $course_id, $courses ) ) {
						delete_post_meta( $collection, '_lp_collection_courses', $course_id );
					}
				}
			}
		}
	}
}

add_action( 'plugins_loaded', array( 'LP_Addon_Collections', 'instance' ) );
