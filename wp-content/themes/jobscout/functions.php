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
 * Add job location settings to Customizer
 */
function jobscout_job_location_customizer( $wp_customize ) {
    // Add section for Job Location Settings
    $wp_customize->add_section( 'job_location_settings', array(
        'title'    => __( 'Job Location Settings', 'jobscout' ),
        'priority' => 30,
    ));

    // Default Sort Order
    $wp_customize->add_setting( 'job_location_default_sort_order', array(
        'default'           => 'ASC',
        'sanitize_callback' => 'jobscout_sanitize_sort_order',
    ));

    $wp_customize->add_control( 'job_location_default_sort_order', array(
        'label'   => __( 'Default Sort Order', 'jobscout' ),
        'section' => 'job_location_settings',
        'type'    => 'select',
        'choices' => array(
            'ASC'  => __( 'A-Z (Ascending)', 'jobscout' ),
            'DESC' => __( 'Z-A (Descending)', 'jobscout' ),
        ),
        'description' => __( 'Default sort order for locations in the dropdown. This matches the admin-side display.', 'jobscout' ),
    ));
}
add_action( 'customize_register', 'jobscout_job_location_customizer' );

/**
 * Sanitize sort order value
 */
function jobscout_sanitize_sort_order( $input ) {
    $valid = array( 'ASC', 'DESC' );
    if ( in_array( $input, $valid, true ) ) {
        return $input;
    }
    return 'ASC';
}

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

/**
 * Add custom fields to job location taxonomy add form
 */
function jobscout_job_location_add_form_fields() {
    ?>
    <div class="form-field">
        <label for="job_location_disabled">
            <input type="checkbox" name="job_location_disabled" id="job_location_disabled" value="1" />
            <?php _e( 'Disable in dropdown', 'jobscout' ); ?>
        </label>
        <p class="description"><?php _e( 'Check this to hide this location from the frontend dropdown without deleting it.', 'jobscout' ); ?></p>
    </div>
    <div class="form-field">
        <label for="job_location_sort_order"><?php _e( 'Sort Order', 'jobscout' ); ?></label>
        <select name="job_location_sort_order" id="job_location_sort_order">
            <option value="ASC"><?php _e( 'A-Z (Ascending)', 'jobscout' ); ?></option>
            <option value="DESC"><?php _e( 'Z-A (Descending)', 'jobscout' ); ?></option>
        </select>
        <p class="description"><?php _e( 'Default sort order for this location in the dropdown.', 'jobscout' ); ?></p>
    </div>
    <?php
}
add_action( 'job_location_add_form_fields', 'jobscout_job_location_add_form_fields' );

/**
 * Add custom fields to job location taxonomy edit form
 */
function jobscout_job_location_edit_form_fields( $term ) {
    $disabled = get_term_meta( $term->term_id, 'job_location_disabled', true );
    $sort_order = get_term_meta( $term->term_id, 'job_location_sort_order', true );
    if ( empty( $sort_order ) ) {
        $sort_order = 'ASC'; // Default to A-Z
    }
    ?>
    <tr class="form-field">
        <th scope="row">
            <label for="job_location_disabled"><?php _e( 'Disable in dropdown', 'jobscout' ); ?></label>
        </th>
        <td>
            <label>
                <input type="checkbox" name="job_location_disabled" id="job_location_disabled" value="1" <?php checked( $disabled, '1' ); ?> />
                <?php _e( 'Hide this location from the frontend dropdown', 'jobscout' ); ?>
            </label>
            <p class="description"><?php _e( 'Check this to hide this location from the frontend dropdown without deleting it.', 'jobscout' ); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row">
            <label for="job_location_sort_order"><?php _e( 'Sort Order', 'jobscout' ); ?></label>
        </th>
        <td>
            <select name="job_location_sort_order" id="job_location_sort_order">
                <option value="ASC" <?php selected( $sort_order, 'ASC' ); ?>><?php _e( 'A-Z (Ascending)', 'jobscout' ); ?></option>
                <option value="DESC" <?php selected( $sort_order, 'DESC' ); ?>><?php _e( 'Z-A (Descending)', 'jobscout' ); ?></option>
            </select>
            <p class="description"><?php _e( 'Default sort order for this location in the dropdown.', 'jobscout' ); ?></p>
        </td>
    </tr>
    <?php
}
add_action( 'job_location_edit_form_fields', 'jobscout_job_location_edit_form_fields' );

/**
 * Save custom fields when job location term is saved
 */
function jobscout_save_job_location_fields( $term_id ) {
    // Save disabled status
    if ( isset( $_POST['job_location_disabled'] ) ) {
        update_term_meta( $term_id, 'job_location_disabled', '1' );
    } else {
        update_term_meta( $term_id, 'job_location_disabled', '0' );
    }

    // Save sort order
    if ( isset( $_POST['job_location_sort_order'] ) && in_array( $_POST['job_location_sort_order'], array( 'ASC', 'DESC' ) ) ) {
        update_term_meta( $term_id, 'job_location_sort_order', sanitize_text_field( $_POST['job_location_sort_order'] ) );
    }
}
add_action( 'created_job_location', 'jobscout_save_job_location_fields' );
add_action( 'edited_job_location', 'jobscout_save_job_location_fields' );

/**
 * Add custom column to job location taxonomy list table
 */
function jobscout_job_location_add_custom_column( $columns ) {
    $columns['disabled'] = __( 'Disabled', 'jobscout' );
    $columns['sort_order'] = __( 'Sort Order', 'jobscout' );
    return $columns;
}
add_filter( 'manage_edit-job_location_columns', 'jobscout_job_location_add_custom_column' );

/**
 * Populate custom column in job location taxonomy list table
 */
function jobscout_job_location_custom_column_content( $content, $column_name, $term_id ) {
    if ( 'disabled' === $column_name ) {
        $disabled = get_term_meta( $term_id, 'job_location_disabled', true );
        $content = ( '1' === $disabled ) ? '<span style="color: red;">' . __( 'Yes', 'jobscout' ) . '</span>' : '<span style="color: green;">' . __( 'No', 'jobscout' ) . '</span>';
    }
    if ( 'sort_order' === $column_name ) {
        $sort_order = get_term_meta( $term_id, 'job_location_sort_order', true );
        if ( empty( $sort_order ) ) {
            $sort_order = 'ASC';
        }
        $content = ( 'ASC' === $sort_order ) ? __( 'A-Z', 'jobscout' ) : __( 'Z-A', 'jobscout' );
    }
    return $content;
}
add_filter( 'manage_job_location_custom_column', 'jobscout_job_location_custom_column_content', 10, 3 );

/**
 * Add bulk actions to job location taxonomy
 */
function jobscout_job_location_bulk_actions( $actions ) {
    $actions['enable_locations'] = __( 'Enable in dropdown', 'jobscout' );
    $actions['disable_locations'] = __( 'Disable in dropdown', 'jobscout' );
    $actions['set_sort_asc'] = __( 'Set Sort Order: A-Z', 'jobscout' );
    $actions['set_sort_desc'] = __( 'Set Sort Order: Z-A', 'jobscout' );
    return $actions;
}
add_filter( 'bulk_actions-edit-job_location', 'jobscout_job_location_bulk_actions' );

/**
 * Process bulk actions for job location taxonomy
 * WordPress taxonomies don't have built-in bulk action handlers, so we need to process manually
 */
function jobscout_job_location_process_bulk_actions() {
    // Only run on the job location taxonomy page
    if ( ! isset( $_GET['taxonomy'] ) || 'job_location' !== $_GET['taxonomy'] ) {
        return;
    }

    // Check if this is a bulk action request
    $action = isset( $_REQUEST['action'] ) ? sanitize_text_field( $_REQUEST['action'] ) : '';
    if ( '-1' === $action && isset( $_REQUEST['action2'] ) ) {
        $action = sanitize_text_field( $_REQUEST['action2'] );
    }

    // Check if this is one of our bulk actions
    if ( ! in_array( $action, array( 'enable_locations', 'disable_locations', 'set_sort_asc', 'set_sort_desc' ), true ) ) {
        return;
    }

    // Check nonce - try both possible nonce names
    $nonce_verified = false;
    if ( isset( $_REQUEST['_wpnonce'] ) ) {
        $nonce = sanitize_text_field( $_REQUEST['_wpnonce'] );
        if ( wp_verify_nonce( $nonce, 'bulk-tags' ) || wp_verify_nonce( $nonce, 'bulk-' . get_current_screen()->id ) ) {
            $nonce_verified = true;
        }
    }

    if ( ! $nonce_verified ) {
        wp_die( __( 'Security check failed.', 'jobscout' ) );
    }

    // Check user permissions
    if ( ! current_user_can( 'manage_categories' ) ) {
        wp_die( __( 'You do not have permission to perform this action.', 'jobscout' ) );
    }

    // Get term IDs - WordPress taxonomy pages use delete_tags[] for checkboxes
    $term_ids = array();
    if ( isset( $_REQUEST['delete_tags'] ) ) {
        if ( is_array( $_REQUEST['delete_tags'] ) ) {
            $term_ids = array_map( 'intval', $_REQUEST['delete_tags'] );
        } elseif ( is_string( $_REQUEST['delete_tags'] ) && ! empty( $_REQUEST['delete_tags'] ) ) {
            // Handle comma-separated values from JavaScript
            $term_ids = array_map( 'intval', explode( ',', $_REQUEST['delete_tags'] ) );
        }
    }

    if ( empty( $term_ids ) ) {
        return;
    }

    $updated = 0;

    foreach ( $term_ids as $term_id ) {
        if ( ! term_exists( $term_id, 'job_location' ) ) {
            continue;
        }

        switch ( $action ) {
            case 'enable_locations':
                update_term_meta( $term_id, 'job_location_disabled', '0' );
                $updated++;
                break;

            case 'disable_locations':
                update_term_meta( $term_id, 'job_location_disabled', '1' );
                $updated++;
                break;

            case 'set_sort_asc':
                update_term_meta( $term_id, 'job_location_sort_order', 'ASC' );
                $updated++;
                break;

            case 'set_sort_desc':
                update_term_meta( $term_id, 'job_location_sort_order', 'DESC' );
                $updated++;
                break;
        }
    }

    // Redirect with success message
    $redirect_url = add_query_arg(
        array(
            'taxonomy'    => 'job_location',
            'bulk_action' => $action,
            'updated'     => $updated,
        ),
        admin_url( 'edit-tags.php' )
    );

    wp_safe_redirect( $redirect_url );
    exit;
}
add_action( 'admin_init', 'jobscout_job_location_process_bulk_actions' );

/**
 * Display admin notices for bulk actions
 */
function jobscout_job_location_bulk_admin_notices() {
    if ( ! isset( $_REQUEST['bulk_action'] ) || ! isset( $_REQUEST['updated'] ) ) {
        return;
    }

    $action = sanitize_text_field( $_REQUEST['bulk_action'] );
    $updated = intval( $_REQUEST['updated'] );

    if ( $updated <= 0 ) {
        return;
    }

    $messages = array(
        'enable_locations'  => sprintf( _n( '%d location enabled in dropdown.', '%d locations enabled in dropdown.', $updated, 'jobscout' ), $updated ),
        'disable_locations' => sprintf( _n( '%d location disabled in dropdown.', '%d locations disabled in dropdown.', $updated, 'jobscout' ), $updated ),
        'set_sort_asc'      => sprintf( _n( 'Sort order set to A-Z for %d location.', 'Sort order set to A-Z for %d locations.', $updated, 'jobscout' ), $updated ),
        'set_sort_desc'     => sprintf( _n( 'Sort order set to Z-A for %d location.', 'Sort order set to Z-A for %d locations.', $updated, 'jobscout' ), $updated ),
    );

    if ( isset( $messages[ $action ] ) ) {
        echo '<div class="notice notice-success is-dismissible"><p>' . esc_html( $messages[ $action ] ) . '</p></div>';
    }
}
add_action( 'admin_notices', 'jobscout_job_location_bulk_admin_notices' );

/**
 * Enqueue JavaScript for bulk actions on taxonomy page
 */
function jobscout_job_location_bulk_actions_script( $hook ) {
    // Only load on the taxonomy edit page
    if ( 'edit-tags.php' !== $hook || ! isset( $_GET['taxonomy'] ) || 'job_location' !== $_GET['taxonomy'] ) {
        return;
    }
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        // Add bulk actions dropdown if it doesn't exist
        var $bulkActions = $('.bulkactions');
        if ($bulkActions.length === 0) {
            // Try to find where to insert it
            var $form = $('#posts-filter');
            if ($form.length) {
                var bulkActionsHTML = '<div class="tablenav top"><div class="alignleft actions bulkactions">' +
                    '<label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>' +
                    '<select name="action" id="bulk-action-selector-top">' +
                    '<option value="-1">Bulk actions</option>' +
                    '<option value="enable_locations"><?php echo esc_js( __( 'Enable in dropdown', 'jobscout' ) ); ?></option>' +
                    '<option value="disable_locations"><?php echo esc_js( __( 'Disable in dropdown', 'jobscout' ) ); ?></option>' +
                    '<option value="set_sort_asc"><?php echo esc_js( __( 'Set Sort Order: A-Z', 'jobscout' ) ); ?></option>' +
                    '<option value="set_sort_desc"><?php echo esc_js( __( 'Set Sort Order: Z-A', 'jobscout' ) ); ?></option>' +
                    '</select>' +
                    '<input type="submit" id="doaction" class="button action" value="Apply">' +
                    '</div></div>';
                $form.prepend(bulkActionsHTML);
            }
        }

        // Handle form submission for bulk actions
        $('#posts-filter, form').on('submit', function(e) {
            var $action = $('#bulk-action-selector-top, #bulk-action-selector-bottom, select[name="action"], select[name="action2"]');
            var action = $action.val();
            
            // Check if action2 exists (bottom bulk actions)
            if ((!action || action === '-1') && $('select[name="action2"]').length) {
                action = $('select[name="action2"]').val();
            }
            
            if (action && action !== '-1' && ['enable_locations', 'disable_locations', 'set_sort_asc', 'set_sort_desc'].indexOf(action) !== -1) {
                // Get selected checkboxes - WordPress uses delete_tags[] for taxonomy checkboxes
                var $checked = $('input[name="delete_tags[]"]:checked');
                if ($checked.length === 0) {
                    alert('<?php echo esc_js( __( 'Please select at least one location.', 'jobscout' ) ); ?>');
                    e.preventDefault();
                    return false;
                }
            }
        });
    });
    </script>
    <?php
}
add_action( 'admin_footer', 'jobscout_job_location_bulk_actions_script' );