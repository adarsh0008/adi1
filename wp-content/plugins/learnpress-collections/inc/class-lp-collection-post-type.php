<?php
/**
 * Learnpress Collection Custom post type class.
 *
 * @author   ThimPress
 * @package  LearnPress/Collections/Classes
 * @version  3.0.0
 */

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'LP_Collection_Post_Type' ) ) {
	/**
	 * Class LP_Collection_Post_Type.
	 */
	final class LP_Collection_Post_Type extends LP_Abstract_Post_Type {

		/**
		 * @var null
		 */
		protected static $_instance = null;

		/**
		 * LP_Collection_Post_Type constructor.
		 *
		 * @param $post_type
		 */
		public function __construct( $post_type ) {
			parent::__construct( $post_type );

			add_filter( 'learn_press_admin_tabs_info', array( $this, 'admin_tabs_info' ) );
		}

		/**
		 * Register collection post type.
		 *
		 * @return array|bool
		 */
		public function register() {
			$labels = array(
				'name'               => _x( 'Collections', 'Post Type General Name', 'learnpress-collections' ),
				'singular_name'      => _x( 'Collection', 'Post Type Singular Name', 'learnpress-collections' ),
				'menu_name'          => __( 'Collections', 'learnpress-collections' ),
				'parent_item_colon'  => __( 'Parent Item:', 'learnpress-collections' ),
				'all_items'          => __( 'Collections', 'learnpress-collections' ),
				'view_item'          => __( 'View Collection', 'learnpress-collections' ),
				'add_new_item'       => __( 'Add New Collection', 'learnpress-collections' ),
				'add_new'            => __( 'Add New', 'learnpress-collections' ),
				'edit_item'          => __( 'Edit Collection', 'learnpress-collections' ),
				'update_item'        => __( 'Update Collection', 'learnpress-collections' ),
				'search_items'       => __( 'Search Collection', 'learnpress-collections' ),
				'not_found'          => __( 'No collection found', 'learnpress-collections' ),
				'not_found_in_trash' => __( 'No collection found in Trash', 'learnpress-collections' ),
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'has_archive'        => true,
				'capability_type'    => 'lp_order',
				'map_meta_cap'       => true,
				'show_in_menu'       => 'learn_press',
				'show_in_admin_bar'  => true,
				'show_in_nav_menus'  => true,
				'taxonomies'         => array(),
				'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions', 'comments', 'excerpt' ),
				'hierarchical'       => true,
				'rewrite'            => array( 'slug' => 'collections', 'hierarchical' => true, 'with_front' => false )
			);

			///flush_rewrite_rules();
			add_rewrite_tag( '%collection_page%', '([^&]+)' );
			add_rewrite_rule( '^collections/([^/]*)/page/(.*)', 'index.php?lp_collection=$matches[1]&collection_page=$matches[2]', 'top' );

			return $args;
		}

		/**
		 * Add Collection tab into admin archive course page.
		 *
		 * @param $tabs
		 *
		 * @return mixed
		 */
		public function admin_tabs_info( $tabs ) {
			$post_type = filter_input( INPUT_GET, 'post_type' );
			if ( LP_COURSE_CPT == $post_type ) {
				$tabs[11] = array(
					"link" => "edit.php?post_type=lp_collection",
					"name" => __( "Collections", "learnpress-collections" ),
					"id"   => "edit-lp_collection",
				);
			}

			return $tabs;
		}

		/**
		 * Meta box in admin collection editor.
		 */
		public function add_meta_boxes() {
			$meta_boxes = apply_filters( 'learn-press/collection-meta-box-args',
				array(
					'id'     => 'collection_settings',
					'title'  => __( 'Collection Settings', 'learnpress-collections' ),
					'pages'  => array( LP_COLLECTION_CPT ),
					'fields' => array(
						array(
							'name'        => __( 'Courses', 'learnpress-collections' ),
							'id'          => '_lp_collection_courses',
							'type'        => 'post',
							'post_type'   => LP_COURSE_CPT,
							'field_type'  => 'select_advanced',
							'multiple'    => true,
							'desc'        => __( 'Collecting related courses into one collection.', 'learnpress-collections' ),
							'desc_none'   => wp_kses( __( 'There is no course to select. Create <a href="' . admin_url( "post-new.php?post_type=" . LP_COURSE_CPT ) . '" target="_blank">here</a>.', 'learnpress-collections' ), array(
								'a' => array(
									'href'   => array(),
									'target' => array()
								)
							) ),
							'placeholder' => __( 'Select courses', 'learnpress-collections' ),
							'query_args'  => array( 'author' => '' )
						),
						array(
							'name'    => __( 'Courses per page', 'learnpress-collections' ),
							'id'      => '_lp_collection_courses_per_page',
							'type'    => 'number',
							'default' => '10',
							'desc'    => __( 'Number of courses per each page. Default is 10.' )
						)
					)
				)
			);

			new RW_Meta_Box( $meta_boxes );
			parent::add_meta_boxes();
		}

		/**
		 * Custom column.
		 *
		 * @param $columns
		 *
		 * @return array
		 */
		public function columns_head( $columns ) {
			$columns = array(
				'cb'          => $columns['cb'],
				'title'       => $columns['title'],
				LP_COURSE_CPT => __( 'Courses', 'learnpress-collections' ),
				'comments'    => $columns['comments'],
				'date'        => $columns['date']
			);

			return $columns;
		}

		/**
		 * Display content for custom column.
		 *
		 * @param $column
		 * @param int $post_id
		 */
		public function columns_content( $column, $post_id = 0 ) {
			if ( LP_COURSE_CPT == $column ) {
				$ids = get_post_meta( $post_id, '_lp_collection_courses' );
				if ( empty( $ids ) ) {
					_e( 'No Items', 'learnpress-collections' );
				} else {
					foreach ( $ids as $id ) {
						$item = get_post( $id );
						if ( $item ) {
							echo '<a href="' . get_permalink( $item->ID ) . '">' . $item->post_title . '</a> | ';
						}
					}
				}
			}
		}

		/**
		 * Instance.
		 *
		 * @return LP_Collection_Post_Type|null
		 */
		public static function instance() {
			if ( ! self::$_instance ) {
				self::$_instance = new self( LP_COLLECTION_CPT );
			}

			return self::$_instance;
		}
	}
}

$collection_post_type = LP_Collection_Post_Type::instance();