<?php
function sfsi_forum_notification_popup() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$query_uri_widgets = '/wp-json/wp/v2/widget-types';
	if (isset($_SERVER['REQUEST_URI']) && strpos(sanitize_textarea_field($_SERVER['REQUEST_URI']), $query_uri_widgets) !== false) {
		return;
	}

	/* Check if user is new or old */
	$sfsi_installDate = get_option( 'sfsi_installDate' );
	$sfsi_installDate_new = new DateTime( $sfsi_installDate );

	$sfsi_installDate_only = $sfsi_installDate_new->format( 'Y-m-d' );

	$sfsi_installDate_string = strtotime( $sfsi_installDate_only );
	$sfsi_current_Date_string = strtotime( date( 'Y-m-d' ) );

	if ( $sfsi_current_Date_string == $sfsi_installDate_string ) {
		$option_name = 'sfsi_show_admin_popup';
		$new_value = 'yes';

		if ( get_option( $option_name ) !== false ) {
			update_option( $option_name, $new_value );
		} else {
			$deprecated = null;
			$autoload = 'no';
			add_option( $option_name, $new_value, $deprecated, $autoload );
		}
	}

	/* Check WP language */
	$sfsi_language = get_bloginfo( 'language' );
	$sfsi_allowed_languages = array( 'en-US', 'en-AU', 'en-GB', 'en-NZ', 'en-CA', 'en-ZA' );

	if ( ! in_array( $sfsi_language, $sfsi_allowed_languages ) ) {
		return;
	}

//	$sfsi_show_admin_popup = get_option( 'sfsi_show_admin_popup' );
    $sfsi_show_admin_popup = (isset($option5['sfsi_show_admin_popup']))
        ? sanitize_text_field($option5['sfsi_show_admin_popup'])
        : 'yes';

	if( 'yes' !== $sfsi_show_admin_popup ) {
		return;
	}

	$option_5 = maybe_unserialize(get_option('sfsi_section5_options',false));
	$sfsi_show_admin_popup_option_5 = isset($option_5['sfsi_show_admin_popup']) ? $option_5['sfsi_show_admin_popup'] : 'yes';
	if( 'yes' !== $sfsi_show_admin_popup_option_5 ) {
		return;
	}

	$sfsi_hide_admin_forum_notification = get_option( 'sfsi_hide_admin_forum_notification' );
	if( 'yes' === $sfsi_hide_admin_forum_notification ) {
		return;
	}

	$sfsi_default_hide_admin_notification_class = '';
	$sfsi_default_hide_admin_notification = get_option( 'sfsi_default_hide_admin_notification' );
	if( 'hide' === $sfsi_default_hide_admin_notification ) {
		$sfsi_default_hide_admin_notification_class = ' usm-widget--open';
	}
?>
	<div id="usm-admin-notification-widget" class="usm-widget<?php echo esc_attr( $sfsi_default_hide_admin_notification_class ); ?>">
		<div class="usm-widget__body">
			<button type="button" class="usm-widget__toggle-btn">
				<svg id="icon-btn-arrows" class="usm-widget__toggle-btn-icon toggle-btn-icon" viewBox="0 0 19 11" width="19" height="11">
					<path class="toggle-btn-icon__arrow toggle-btn-icon__arrow--first" fill-rule="evenodd" clip-rule="evenodd" d="M18.7684 5.21646L14.1007 9.88417C13.7135 10.2714 13.0856 10.2714 12.6983 9.88417C12.3111 9.49691 12.3111 8.86905 12.6983 8.48179L15.9637 5.21646L12.6983 1.95112C12.3111 1.56386 12.3111 0.935999 12.6983 0.548743C13.0856 0.161487 13.7135 0.161487 14.1007 0.548743L18.7684 5.21646Z" fill="white"></path>
					<path class="toggle-btn-icon__arrow toggle-btn-icon__arrow--second" opacity="0.2" fill-rule="evenodd" clip-rule="evenodd" d="M12.8187 5.21646L8.15095 9.88417C7.7637 10.2714 7.13583 10.2714 6.74857 9.88417C6.36132 9.49691 6.36132 8.86905 6.74857 8.48179L10.0139 5.21646L6.74857 1.95112C6.36132 1.56386 6.36132 0.935999 6.74857 0.548743C7.13583 0.161487 7.7637 0.161487 8.15095 0.548743L12.8187 5.21646Z" fill="white"></path>
					<path class="toggle-btn-icon__arrow toggle-btn-icon__arrow--third" opacity="0.7" fill-rule="evenodd" clip-rule="evenodd" d="M6.8689 5.21646L2.20118 9.88417C1.81393 10.2714 1.18606 10.2714 0.798806 9.88417C0.411551 9.49691 0.411551 8.86905 0.798806 8.48179L4.06414 5.21646L0.798806 1.95112C0.411551 1.56386 0.411551 0.935999 0.798806 0.548743C1.18606 0.161487 1.81393 0.161487 2.20118 0.548743L6.8689 5.21646Z" fill="white"></path>
				</svg>
			</button>

			<div class="usm-widget__content">
				<div class="usm-widget__text-content">
					<p class="usm-widget__title"><?php _e( 'Do the social media icons show like you want to?', 'ultimate-social-media-icons' ); ?></p>

					<p class="usm-widget__text"><?php
						printf(
							__( 'If not, ask us in the %1$sforum%2$s, we\'re happy to help – %3$squickly & for free!%4$s','ultimate-social-media-icons' ),
							'<a class="usm-widget__text-link" href="https://goo.gl/auxJ9C#no-topic-0" target="_blank">',
							'</a>',
							'<b>',
							'</b>'
						);
					?></p>
					<p class="usm-widget__text"><?php _e( 'We can also consult you how to place them for maximum effect & assist with anything else.', 'ultimate-social-media-icons' ); ?></p>
					<a href="https://goo.gl/auxJ9C#no-topic-0" class="usm-widget__main-btn" target="_blank">
					<?php _e( 'Ask in forum', 'ultimate-social-media-icons' ); ?>
					<svg class="usm-widget__main-btn-icon" id="icon-arrow-right" viewBox="0 0 6 10" width="6" height="10">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M5.91925 5.21616L1.45963 9.67578C1.20579 9.92962 0.794233 9.92962 0.540392 9.67578C0.286551 9.42194 0.286551 9.01038 0.540392 8.75654L4.08077 5.21616L0.540392 1.67578C0.286551 1.42194 0.286551 1.01038 0.540392 0.756543C0.794233 0.502702 1.20579 0.502702 1.45963 0.756543L5.91925 5.21616Z" fill="white"></path>
					</svg>
					</a>

					<div class="usm-widget__info usm-widget-info">
						<div class="usm-widget-info__title">
							<?php _e( 'Trouble logging in?', 'ultimate-social-media-icons' ); ?>
							<svg class="usm-widget-info__icon" id="icon-info" viewBox="0 0 12 12" width="12" height="12">
								<path d="M12 6C12 9.31371 9.31371 12 6 12C2.68629 12 0 9.31371 0 6C0 2.68629 2.68629 0 6 0C9.31371 0 12 2.68629 12 6Z" fill="#AAB0B7"></path>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M7.42473 4.19644C7.41291 4.19437 7.40094 4.19332 7.38894 4.19335H7.34701C7.22141 4.18962 7.09573 4.1977 6.97164 4.21742C6.83561 4.24299 6.69549 4.26496 6.55997 4.28593L6.37024 4.31558L5.65427 4.4322L5.54739 4.45008L5.49625 4.45879L5.41954 4.47156L5.28249 4.89908H5.50597H5.57347C5.61754 4.89843 5.6616 4.90049 5.70541 4.90523C5.74381 4.90949 5.77906 4.92852 5.80369 4.95829C5.82831 4.98807 5.84037 5.02627 5.83735 5.06479C5.82518 5.18813 5.80139 5.31003 5.76628 5.4289C5.664 5.78687 5.55813 6.14486 5.45688 6.4967L5.31573 6.9815C5.29578 7.05156 5.27534 7.12162 5.25488 7.19219C5.19095 7.4126 5.12447 7.6402 5.06055 7.86521C5.01813 8.00297 4.99776 8.14656 5.0002 8.29068C5.00341 8.474 5.07832 8.64878 5.20886 8.77754C5.33621 8.90203 5.50291 8.97833 5.68036 8.99335C5.72163 8.99785 5.76311 9.00007 5.80462 9C5.96698 8.99949 6.12755 8.96608 6.27664 8.9018C6.4665 8.81823 6.63973 8.70111 6.78804 8.55608C6.97105 8.37936 7.13274 8.18181 7.26979 7.96747C7.31121 7.90405 7.35109 7.83859 7.38996 7.77569L7.44467 7.68773L7.51423 7.57677L7.13374 7.35278L7.06676 7.45507C7.06267 7.4607 7.05959 7.46581 7.05652 7.47093L7.04118 7.4929L6.97011 7.59519C6.91488 7.67343 6.85759 7.75422 6.79929 7.83144C6.73439 7.92032 6.65844 8.0006 6.57326 8.07028C6.55269 8.08674 6.52975 8.09999 6.50523 8.10964H6.50269C6.4993 8.10708 6.49636 8.10396 6.494 8.10043C6.49131 8.09732 6.48954 8.09352 6.48891 8.08945C6.48828 8.08538 6.48879 8.08122 6.49041 8.07743L6.50728 8.00124C6.5262 7.91226 6.54462 7.82839 6.56814 7.74554C6.81003 6.90276 7.05704 6.04617 7.29586 5.21771L7.52906 4.40969C7.53264 4.39742 7.5352 4.38564 7.53827 4.37439C7.54133 4.36314 7.53826 4.36469 7.54184 4.35906L7.57764 4.21792L7.43292 4.20103L7.42473 4.19644ZM7.44519 2.06492C7.34356 2.02202 7.23435 1.99996 7.12404 2C7.01494 2.00049 6.90705 2.0229 6.8068 2.06595C6.70655 2.109 6.616 2.1718 6.54052 2.25058C6.4637 2.32789 6.40303 2.41971 6.36203 2.5207C6.32103 2.62169 6.30053 2.72981 6.30172 2.83879C6.30291 2.94778 6.32576 3.05545 6.36896 3.15551C6.41215 3.25558 6.47483 3.34605 6.55332 3.42167C6.62765 3.49647 6.71599 3.5559 6.81331 3.59652C6.91062 3.63715 7.01499 3.65819 7.12045 3.65845H7.12812C7.31933 3.65768 7.50438 3.59083 7.65194 3.46924C7.7995 3.34764 7.9005 3.17877 7.93781 2.99124C7.97512 2.80371 7.94646 2.60905 7.85669 2.44023C7.76691 2.27141 7.62153 2.13883 7.44519 2.06492Z" fill="white"></path>
							</svg>
						</div>
						<p class="usm-widget-info__popup"><?php _e( 'Your account on Wordpress.org (where you open a new support thread) is different to the one you login to your WordPress dashboard (where you are now). If you don\'t have a WordPress.org account yet, please sign up at the top right on the Support Forum page, and then scroll down on that page . It only takes a minute :)', 'ultimate-social-media-icons' ); ?>
							<br>
							<br><?php _e( 'Thank you!', 'ultimate-social-media-icons' ); ?>
						</p>
					</div>
				</div>
				<footer class="usm-widget__footer">
					<p class="usm-widget__footer-text"><?php
						printf(
							__( 'This widget is %1$sonly visible to you as admin%2$s. You can %3$shide it forever.%4$s','ultimate-social-media-icons' ),
							'<b>',
							'</b>',
							'<a class="usm-widget__footer-text-link usm-widget__text-link" href="javascript:void(0)">',
							'</a>'
						);
					?></p>
				</footer>
				<p class="usm-widget__footer-bottom-text"><?php _e( 'By Ultimatelysocial', 'ultimate-social-media-icons' ); ?></p>
			</div>
		</div>
	</div>
<?php
}

add_action( 'wp_ajax_sfsi_hide_admin_forum_notification', 'sfsi_hide_admin_forum_notification_callback' );

function sfsi_hide_admin_forum_notification_callback() {
  
  if (!wp_verify_nonce(sanitize_text_field($_POST['nonce']), 'usm_universal_nonce_icons')) return wp_send_json_error();
  if (!current_user_can('manage_options')) return wp_send_json_error();
  
	$option_name = 'sfsi_hide_admin_forum_notification' ;
	$new_value = 'yes';

	if ( get_option( $option_name ) !== false ) {
		update_option( $option_name, $new_value );
	} else {
		$deprecated = null;
		$autoload = 'no';
		add_option( $option_name, $new_value, $deprecated, $autoload );
	}
  
	wp_send_json_success();
	die;
  
}

add_action( 'wp_ajax_nopriv_sfsi_default_hide_admin_notification', 'sfsi_default_hide_admin_notification_callback' );
add_action( 'wp_ajax_sfsi_default_hide_admin_notification', 'sfsi_default_hide_admin_notification_callback' );

function sfsi_default_hide_admin_notification_callback() {

	if ( !isset( $_POST['status'] ) ) {
		wp_send_json_error();
		die;
	}

	$option_name = 'sfsi_default_hide_admin_notification' ;
	$new_value = sanitize_text_field($_POST['status']);

	if ( get_option( $option_name ) !== false ) {
		update_option( $option_name, $new_value );
	} else {
		$deprecated = null;
		$autoload = 'no';
		add_option( $option_name, $new_value, $deprecated, $autoload );
	}
	wp_send_json_success();
	die;
}
