<?php
/**
 * JobScout functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package JobScout
 */

$jobscout_theme_data = wp_get_theme();
if( ! defined( 'JOBSCOUT_THEME_VERSION' ) ) define ( 'JOBSCOUT_THEME_VERSION', $jobscout_theme_data->get( 'Version' ) );
if( ! defined( 'JOBSCOUT_THEME_NAME' ) ) define( 'JOBSCOUT_THEME_NAME', $jobscout_theme_data->get( 'Name' ) );

/**
 * Implement Local Font Method functions.
 */
require get_template_directory() . '/inc/class-webfont-loader.php';

/**
 * Custom Functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Standalone Functions.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Template Functions.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom functions for selective refresh.
 */
require get_template_directory() . '/inc/partials.php';

if( jobscout_is_rara_theme_companion_activated() ) :
	/**
	 * Modify filter hooks of RTC plugin.
	 */
	require get_template_directory() . '/inc/rtc-filters.php';
endif;

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Getting Started
*/
require get_template_directory() . '/inc/dashboard/dashboard.php';

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Add theme compatibility function for woocommerce if active
*/
if( jobscout_is_woocommerce_activated() ){
    require get_template_directory() . '/inc/woocommerce-functions.php';    
}

/**
 * Modify filter hooks of WP Job Manager plugin.
 */
if( jobscout_is_wp_job_manager_activated() ) :
	require get_template_directory() . '/inc/wp-job-manager-filters.php';
endif;

register_sidebar(array(
    'name'          => 'Footer Social Sidebar',
    'id'            => 'footer-social-sidebar',
    'before_widget' => '<div class="footer-social-widget">',
    'after_widget'  => '</div>',
));


function news_banner_customizer( $wp_customize ) {

    // Thêm panel riêng cho Banner
    $wp_customize->add_panel( 'custom_page_banner', array(
        'title'       => __( 'Page Banners', 'jobscout' ),
        'description' => 'Customize banners for each page',
        'priority'    => 200,
    ));

    // Thêm section cho News Page
    $wp_customize->add_section( 'news_page_banner_section', array(
        'title'    => __( 'News Page Banner', 'jobscout' ),
        'panel'    => 'custom_page_banner',
        'priority' => 10,
    ));

    // Banner Title
    $wp_customize->add_setting( 'news_banner_title', array(
        'default'           => 'Latest News',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'news_banner_title', array(
        'label'   => __( 'Banner Title', 'jobscout' ),
        'section' => 'news_page_banner_section',
        'type'    => 'text',
    ));

    // Banner Subtitle
    $wp_customize->add_setting( 'news_banner_subtitle', array(
        'default'           => 'Stay updated with the latest news.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'news_banner_subtitle', array(
        'label'   => __( 'Banner Subtitle', 'jobscout' ),
        'section' => 'news_page_banner_section',
        'type'    => 'text',
    ));

    // Banner Image
    $wp_customize->add_setting( 'news_banner_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'news_banner_image', array(
        'label'   => __( 'Banner Image', 'jobscout' ),
        'section' => 'news_page_banner_section',
    )));

    $wp_customize->add_section( 'job_page_banner_section', array(
        'title'    => __( 'Job Page Banner', 'jobscout' ),
        'panel'    => 'custom_page_banner',
        'priority' => 20,
    ));

    // Title
    $wp_customize->add_setting( 'job_banner_title', array(
        'default'           => 'Find Your Dream Job',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'job_banner_title', array(
        'label'   => __( 'Banner Title', 'jobscout' ),
        'section' => 'job_page_banner_section',
        'type'    => 'text',
    ));

    // Subtitle
    $wp_customize->add_setting( 'job_banner_subtitle', array(
        'default'           => 'Explore the best job opportunities.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( 'job_banner_subtitle', array(
        'label'   => __( 'Banner Subtitle', 'jobscout' ),
        'section' => 'job_page_banner_section',
        'type'    => 'text',
    ));

    // Image
    $wp_customize->add_setting( 'job_banner_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'job_banner_image', array(
        'label'   => __( 'Banner Image', 'jobscout' ),
        'section' => 'job_page_banner_section',
    )));
}

add_action( 'customize_register', 'news_banner_customizer' );

/**
 * Register custom taxonomy for Job Locations
 * This allows admins to manage locations from the admin menu
 */
function jobscout_register_job_locations_taxonomy() {
    // Only register if WP Job Manager is active
    if ( ! function_exists( 'jobscout_is_wp_job_manager_activated' ) || ! jobscout_is_wp_job_manager_activated() ) {
        return;
    }

    $labels = array(
        'name'              => _x( 'Job Locations', 'taxonomy general name', 'jobscout' ),
        'singular_name'     => _x( 'Job Location', 'taxonomy singular name', 'jobscout' ),
        'search_items'      => __( 'Search Locations', 'jobscout' ),
        'all_items'         => __( 'All Locations', 'jobscout' ),
        'parent_item'       => __( 'Parent Location', 'jobscout' ),
        'parent_item_colon' => __( 'Parent Location:', 'jobscout' ),
        'edit_item'         => __( 'Edit Location', 'jobscout' ),
        'update_item'       => __( 'Update Location', 'jobscout' ),
        'add_new_item'      => __( 'Add New Location', 'jobscout' ),
        'new_item_name'     => __( 'New Location Name', 'jobscout' ),
        'menu_name'         => __( 'Locations', 'jobscout' ),
    );

    $args = array(
        'hierarchical'      => true, // Allow parent/child relationships
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'job-location' ),
        'show_in_menu'      => true,
        'show_in_nav_menus' => false,
        'public'            => false,
        'publicly_queryable' => true,
    );

    register_taxonomy( 'job_location', array( 'job_listing' ), $args );
}
add_action( 'init', 'jobscout_register_job_locations_taxonomy', 0 );