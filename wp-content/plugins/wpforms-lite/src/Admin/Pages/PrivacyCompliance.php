<?php

namespace WPForms\Admin\Pages;

/**
 * Privacy Compliance Subpage.
 *
 * @since 1.9.7.3
 */
class PrivacyCompliance {

	/**
	 * Admin menu page slug.
	 *
	 * @since 1.9.7.3
	 *
	 * @var string
	 */
	public const SLUG = 'wpforms-wpconsent';

	/**
	 * Configuration.
	 *
	 * @since 1.9.7.3
	 *
	 * @var array
	 */
	private $config = [
		'lite_plugin'          => 'wpconsent-cookies-banner-privacy-suite/wpconsent.php',
		'lite_wporg_url'       => 'https://wordpress.org/plugins/wpconsent-cookies-banner-privacy-suite/',
		'lite_download_url'    => 'https://downloads.wordpress.org/plugin/wpconsent-cookies-banner-privacy-suite.zip',
		'pro_plugin'           => 'wpconsent-premium/wpconsent-premium.php',
		'wpconsent_addon'      => 'wpconsent-premium/wpconsent-premium.php',
		'wpconsent_addon_page' => 'https://wpconsent.com/?utm_source=wpformsplugin&utm_medium=link&utm_campaign=privacy-compliance-page',
		'wpconsent_onboarding' => 'admin.php?page=wpconsent',
	];

	/**
	 * Runtime data used for generating page HTML.
	 *
	 * @since 1.9.7.3
	 *
	 * @var array
	 */
	private $output_data = [];

	/**
	 * Constructor.
	 *
	 * @since 1.9.7.3
	 */
	public function __construct() {

		if ( ! wpforms_current_user_can() ) {
			return;
		}

		$this->hooks();
	}

	/**
	 * Hooks.
	 *
	 * @since 1.9.7.3
	 */
	public function hooks(): void {

		if ( wp_doing_ajax() ) {
			remove_action( 'admin_init', 'wpconsent_maybe_redirect_onboarding', 9999 );
			add_action( 'wp_ajax_wpforms_privacy_compliance_page_check_plugin_status', [ $this, 'ajax_check_plugin_status' ] );
			add_action( 'wpforms_plugin_activated', [ $this, 'privacy_compliance_activated' ] );
		}

		// Check what page we are on.
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$page = isset( $_GET['page'] ) ? sanitize_key( wp_unslash( $_GET['page'] ) ) : '';

		// Only load if we are actually on the Privacy Compliance page.
		if ( $page !== self::SLUG ) {
			return;
		}

		add_filter( 'wpforms_admin_header', '__return_false' );
		add_action( 'wpforms_admin_page', [ $this, 'output' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_assets' ] );

		/**
		 * Hook for addons.
		 *
		 * @since 1.9.7.3
		 */
		do_action( 'wpforms_admin_pages_privacy_compliance_hooks' );
	}

	/**
	 * Enqueue JS and CSS files.
	 *
	 * @since 1.9.7.3
	 */
	public function enqueue_assets(): void {

		$min = wpforms_get_min_suffix();

		// Lity.
		wp_enqueue_style(
			'wpforms-lity',
			WPFORMS_PLUGIN_URL . 'assets/lib/lity/lity.min.css',
			null,
			'3.0.0'
		);

		wp_enqueue_script(
			'wpforms-lity',
			WPFORMS_PLUGIN_URL . 'assets/lib/lity/lity.min.js',
			[ 'jquery' ],
			'3.0.0',
			true
		);

		// Custom styles for Lity image size limitation.
		wp_add_inline_style(
			'wpforms-lity',
			'
			.lity-image .lity-container {
				max-width: 1040px !important;
			}
			.lity-image img {
				max-width: 1040px !important;
				width: 100%;
				height: auto;
			}
			'
		);

		wp_enqueue_script(
			'wpforms-admin-page-privacy-compliance',
			WPFORMS_PLUGIN_URL . "assets/js/admin/pages/privacy-compliance{$min}.js",
			[ 'jquery' ],
			WPFORMS_VERSION,
			true
		);

		wp_localize_script(
			'wpforms-admin-page-privacy-compliance',
			'wpforms_pluginlanding',
			$this->get_js_strings()
		);
	}

	/**
	 * JS Strings.
	 *
	 * @since 1.9.7.3
	 *
	 * @return array Array of strings.
	 * @noinspection HtmlUnknownTarget
	 */
	protected function get_js_strings(): array {

		$error_could_not_install = sprintf(
			wp_kses( /* translators: %s - Lite plugin download URL. */
				__( 'Could not install the plugin automatically. Please <a href="%s">download</a> it and install it manually.', 'wpforms-lite' ),
				[
					'a' => [
						'href' => true,
					],
				]
			),
			esc_url( $this->config['lite_download_url'] )
		);

		$error_could_not_activate = sprintf(
			wp_kses( /* translators: %s - Lite plugin download URL. */
				__( 'Could not activate the plugin. Please activate it on the <a href="%s">Plugins page</a>.', 'wpforms-lite' ),
				[
					'a' => [
						'href' => true,
					],
				]
			),
			esc_url( admin_url( 'plugins.php' ) )
		);

		return [
			'installing'                    => esc_html__( 'Installing...', 'wpforms-lite' ),
			'activating'                    => esc_html__( 'Activating...', 'wpforms-lite' ),
			'activated'                     => esc_html__( 'WPConsent Installed & Activated', 'wpforms-lite' ),
			'activated_pro'                 => esc_html__( 'WPConsent Pro Installed & Activated', 'wpforms-lite' ),
			'install_now'                   => esc_html__( 'Install Now', 'wpforms-lite' ),
			'activate_now'                  => esc_html__( 'Activate Now', 'wpforms-lite' ),
			'download_now'                  => esc_html__( 'Download Now', 'wpforms-lite' ),
			'plugins_page'                  => esc_html__( 'Go to Plugins page', 'wpforms-lite' ),
			'error_could_not_install'       => $error_could_not_install,
			'error_could_not_activate'      => $error_could_not_activate,
			'wpconsent_manual_install_url'  => $this->config['lite_download_url'],
			'wpconsent_manual_activate_url' => admin_url( 'plugins.php' ),
		];
	}

	/**
	 * Generate and output page HTML.
	 *
	 * @since 1.9.7.3
	 */
	public function output(): void {

		echo '<div id="wpforms-admin-privacy-compliance" class="wrap wpforms-admin-wrap wpforms-admin-plugin-landing">';

		$this->output_section_heading();
		$this->output_section_screenshot();
		$this->output_section_step_install();
		$this->output_section_step_setup();
		$this->output_section_step_addon();

		echo '</div>';
	}

	/**
	 * Generate and output heading section HTML.
	 *
	 * @since 1.9.7.3
	 *
	 * @noinspection HtmlUnknownTarget
	 */
	public function output_section_heading(): void {

		// Heading section.
		printf(
			'<section class="top">
				<img class="img-top" src="%1$s" alt="%2$s"/>
				<h1>%3$s</h1>
				<p>%4$s %5$s</p>
			</section>',
			esc_url( WPFORMS_PLUGIN_URL . 'assets/images/privacy-compliance/wpforms-wpconsent.svg' ),
			esc_attr__( 'WPForms ♥ WPConsent', 'wpforms-lite' ),
			esc_html__( 'Make Your Website Privacy-Compliant in Minutes', 'wpforms-lite' ),
			esc_html__( 'Build trust with clear, compliant privacy practices. WPConsent adds clean, professional banners and handles the technical side for you.', 'wpforms-lite' ),
			esc_html__( 'Built for transparency. Designed for ease.', 'wpforms-lite' )
		);
	}

	/**
	 * Generate and output screenshot section HTML.
	 *
	 * @since 1.9.7.3
	 *
	 * @noinspection HtmlUnknownTarget
	 */
	protected function output_section_screenshot(): void {

		// Screenshot section.
		printf(
			'<section class="screenshot">
				<div class="cont">
					<img src="%1$s" alt="%2$s" srcset="%8$s 2x"/>
					<a href="%3$s" class="hover" data-lity></a>
				</div>
				<ul>
					<li>%4$s</li>
					<li>%5$s</li>
					<li>%6$s</li>
					<li>%7$s</li>
				</ul>
			</section>',
			esc_url( WPFORMS_PLUGIN_URL . 'assets/images/privacy-compliance/screenshot-tnail.png' ),
			esc_attr__( 'WPConsent screenshot', 'wpforms-lite' ),
			esc_url( WPFORMS_PLUGIN_URL . 'assets/images/privacy-compliance/screenshot-full.png' ),
			esc_html__( 'A professional banner that fits your site.', 'wpforms-lite' ),
			esc_html__( 'Tools like Google Analytics and Facebook Pixel paused until consent.', 'wpforms-lite' ),
			esc_html__( 'Peace of mind knowing you’re aligned with global laws.', 'wpforms-lite' ),
			esc_html__( 'Self-hosted. Your data remains on your site.', 'wpforms-lite' ),
			esc_url( WPFORMS_PLUGIN_URL . 'assets/images/privacy-compliance/screenshot-tnail@2x.png' )
		);
	}

	/**
	 * Generate and output step 'Install' section HTML.
	 *
	 * @since 1.9.7.3
	 *
	 * @noinspection HtmlUnknownTarget
	 */
	protected function output_section_step_install(): void {

		$step = $this->get_data_step_install();

		if ( empty( $step ) ) {
			return;
		}

		$button_format       = '<button class="button %3$s" data-plugin="%1$s" data-action="%4$s">%2$s</button>';
		$button_allowed_html = [
			'button' => [
				'class'       => true,
				'data-plugin' => true,
				'data-action' => true,
			],
		];

		if (
			! $this->output_data['plugin_installed'] &&
			! $this->output_data['pro_plugin_installed'] &&
			! wpforms_can_install( 'plugin' )
		) {
			$button_format       = '<a class="link" href="%1$s" target="_blank" rel="nofollow noopener">%2$s <span aria-hidden="true" class="dashicons dashicons-external"></span></a>';
			$button_allowed_html = [
				'a'    => [
					'class'  => true,
					'href'   => true,
					'target' => true,
					'rel'    => true,
				],
				'span' => [
					'class'       => true,
					'aria-hidden' => true,
				],
			];
		}

		$button = sprintf( $button_format, esc_attr( $step['plugin'] ), esc_html( $step['button_text'] ), esc_attr( $step['button_class'] ), esc_attr( $step['button_action'] ) );

		printf(
			'<section class="step step-install">
				<aside class="num">
					<img src="%1$s" alt="%2$s" />
					<i class="loader hidden"></i>
				</aside>
				<div>
					<h2>%3$s</h2>
					<p>%4$s</p>
					%5$s
				</div>
			</section>',
			esc_url( WPFORMS_PLUGIN_URL . 'assets/images/' . $step['icon'] ),
			esc_attr__( 'Step 1', 'wpforms-lite' ),
			esc_html( $step['heading'] ),
			esc_html( $step['description'] ),
			wp_kses( $button, $button_allowed_html )
		);
	}

	/**
	 * Generate and output step 'Setup' section HTML.
	 *
	 * @since 1.9.7.3
	 *
	 * @noinspection HtmlUnknownTarget
	 */
	protected function output_section_step_setup(): void {

		$step = $this->get_data_step_setup();

		if ( empty( $step ) ) {
			return;
		}

		printf(
			'<section class="step step-setup %1$s">
				<aside class="num">
					<img src="%2$s" alt="%3$s" />
					<i class="loader hidden"></i>
				</aside>
				<div>
					<h2>%4$s</h2>
					<p>%5$s</p>
					<button class="button %6$s" data-url="%7$s">%8$s</button>
				</div>
			</section>',
			esc_attr( $step['section_class'] ),
			esc_url( WPFORMS_PLUGIN_URL . 'assets/images/' . $step['icon'] ),
			esc_attr__( 'Step 2', 'wpforms-lite' ),
			esc_html__( 'Set Up WPConsent', 'wpforms-lite' ),
			esc_html__( 'WPConsent has an intuitive setup wizard to guide you through the cookie consent configuration process.', 'wpforms-lite' ),
			esc_attr( $step['button_class'] ),
			esc_url( admin_url( $this->config['wpconsent_onboarding'] ) ),
			esc_html( $step['button_text'] )
		);
	}

	/**
	 * Generate and output step 'Addon' section HTML.
	 *
	 * @since 1.9.7.3
	 *
	 * @noinspection HtmlUnknownTarget
	 */
	protected function output_section_step_addon(): void {

		$step = $this->get_data_step_addon();

		if ( empty( $step ) ) {
			return;
		}

		printf(
			'<section class="step step-addon %1$s">
				<aside class="num">
					<img src="%2$s" alt="%3$s" />
					<i class="loader hidden"></i>
				</aside>
				<div>
					<h2>%4$s</h2>
					<p>%5$s</p>
					<button class="button %6$s" data-url="%7$s">%8$s</button>
				</div>
			</section>',
			esc_attr( $step['section_class'] ),
			esc_url( WPFORMS_PLUGIN_URL . 'assets/images/' . $step['icon'] ),
			esc_attr__( 'Step 3', 'wpforms-lite' ),
			esc_html__( 'Get Advanced Cookie Consent Features', 'wpforms-lite' ),
			esc_html__( 'With WPConsent Pro you can access advanced features like geolocation, popup layout, records of consent, multilanguage support, and more.', 'wpforms-lite' ),
			esc_attr( $step['button_class'] ),
			esc_url( $step['button_url'] ),
			esc_html( $step['button_text'] )
		);
	}

	/**
	 * Step 'Install' data.
	 *
	 * @since 1.9.7.3
	 *
	 * @return array Step data.
	 */
	protected function get_data_step_install(): array {

		$step                = [];
		$step['heading']     = esc_html__( 'Install & Activate WPConsent', 'wpforms-lite' );
		$step['description'] = esc_html__( 'Install WPConsent from the WordPress.org plugin repository.', 'wpforms-lite' );

		$this->output_data['all_plugins']          = get_plugins();
		$this->output_data['plugin_installed']     = array_key_exists( $this->config['lite_plugin'], $this->output_data['all_plugins'] );
		$this->output_data['plugin_activated']     = false;
		$this->output_data['pro_plugin_installed'] = array_key_exists( $this->config['pro_plugin'], $this->output_data['all_plugins'] );
		$this->output_data['pro_plugin_activated'] = false;

		if ( ! $this->output_data['plugin_installed'] && ! $this->output_data['pro_plugin_installed'] ) {
			$step['icon']          = 'step-1.svg';
			$step['button_text']   = esc_html__( 'Install WPConsent', 'wpforms-lite' );
			$step['button_class']  = 'button-primary';
			$step['button_action'] = 'install';
			$step['plugin']        = $this->config['lite_download_url'];

			if ( ! wpforms_can_install( 'plugin' ) ) {
				$step['heading']     = esc_html__( 'WPConsent', 'wpforms-lite' );
				$step['description'] = '';
				$step['button_text'] = esc_html__( 'WPConsent on WordPress.org', 'wpforms-lite' );
				$step['plugin']      = $this->config['lite_wporg_url'];
			}
		} else {
			$this->output_data['plugin_activated'] =
				is_plugin_active( $this->config['lite_plugin'] ) || is_plugin_active( $this->config['pro_plugin'] );
			$step['icon']                          = $this->output_data['plugin_activated'] ? 'step-complete.svg' : 'step-1.svg';
			$step['button_text']                   =
				$this->output_data['plugin_activated']
					? esc_html__( 'WPConsent Installed & Activated', 'wpforms-lite' )
					: esc_html__( 'Activate WPConsent', 'wpforms-lite' );
			$step['button_class']                  = $this->output_data['plugin_activated']
				? 'grey disabled'
				: 'button-primary';
			$step['button_action']                 = $this->output_data['plugin_activated'] ? '' : 'activate';
			$step['plugin']                        =
				$this->output_data['pro_plugin_installed'] ? $this->config['pro_plugin'] : $this->config['lite_plugin'];
		}

		return $step;
	}

	/**
	 * Step 'Setup' data.
	 *
	 * @since 1.9.7.3
	 *
	 * @return array Step data.
	 */
	protected function get_data_step_setup(): array {

		$step = [];

		$this->output_data['plugin_setup'] = false;

		if ( $this->output_data['plugin_activated'] ) {
			$this->output_data['plugin_setup'] = $this->is_wpconsent_configured();
		}

		$step['icon']          = 'step-2.svg';
		$step['section_class'] = $this->output_data['plugin_activated'] ? '' : 'grey';
		$step['button_text']   = esc_html__( 'Run Setup Wizard', 'wpforms-lite' );
		$step['button_class']  = 'grey disabled';

		if ( $this->output_data['plugin_setup'] ) {
			$step['icon']          = 'step-complete.svg';
			$step['section_class'] = '';
			$step['button_text']   = esc_html__( 'Setup Complete', 'wpforms-lite' );
		} else {
			$step['button_class'] = $this->output_data['plugin_activated'] ? 'button-primary' : 'grey disabled';
		}

		return $step;
	}

	/**
	 * Step 'Addon' data.
	 *
	 * @since 1.9.7.3
	 *
	 * @return array Step data.
	 * @noinspection PhpUndefinedFunctionInspection
	 */
	protected function get_data_step_addon(): array { // phpcs:ignore Generic.Metrics.CyclomaticComplexity.TooHigh

		$step = [];

		$step['icon']          = 'step-3.svg';
		$step['section_class'] = $this->output_data['plugin_setup'] ? '' : 'grey';
		$step['button_text']   = esc_html__( 'Learn More', 'wpforms-lite' );
		$step['button_class']  = 'grey disabled';
		$step['button_url']    = '';

		$plugin_license_level = false;

		if ( $this->output_data['plugin_activated'] ) {
			$plugin_license_level = 'lite';

			// Check if premium features are available.
			if ( function_exists( 'wpconsent' ) ) {
				$wpconsent = wpconsent();

				if ( isset( $wpconsent->license ) && method_exists( $wpconsent->license, 'is_active' ) ) {
					$plugin_license_level = $wpconsent->license->is_active() ? 'pro' : 'lite';
				}
			}
		}

		switch ( $plugin_license_level ) {
			case 'lite':
				$step['button_url']   = $this->config['wpconsent_addon_page'];
				$step['button_class'] = $this->output_data['plugin_setup'] ? 'button-primary' : 'grey';
				break;

			case 'pro':
				$addon_installed      = array_key_exists( $this->config['wpconsent_addon'], $this->output_data['all_plugins'] );
				$step['button_text']  =
					$addon_installed
						? esc_html__( 'WPConsent Pro Installed & Activated', 'wpforms-lite' )
						: esc_html__( 'Install Now', 'wpforms-lite' );
				$step['button_class'] = $this->output_data['plugin_setup'] ? 'grey disabled' : 'button-primary';
				$step['icon']         = $addon_installed ? 'step-complete.svg' : 'step-3.svg';
				break;
		}

		return $step;
	}

	/**
	 * Ajax endpoint. Check plugin setup status.
	 * Used to properly init the step 2 section after completing step 1.
	 *
	 * @since 1.9.7.3
	 *
	 * @noinspection PhpUndefinedFunctionInspection
	 */
	public function ajax_check_plugin_status(): void {

		// Security checks.
		if (
			! check_ajax_referer( 'wpforms-admin', 'nonce', false ) ||
			! wpforms_current_user_can()
		) {
			wp_send_json_error(
				[ 'error' => esc_html__( 'You do not have permission.', 'wpforms-lite' ) ]
			);
		}

		$result = [];

		if ( ! function_exists( 'wpconsent' ) ) {
			wp_send_json_error(
				[ 'error' => esc_html__( 'Plugin unavailable.', 'wpforms-lite' ) ]
			);
		}

		$result['setup_status'] = (int) $this->is_wpconsent_configured();

		$result['license_level']    = 'lite';
		$result['step3_button_url'] = $this->config['wpconsent_addon_page'];

		$wpconsent = wpconsent();

		if (
			isset( $wpconsent->license ) &&
			method_exists( $wpconsent->license, 'is_active' ) &&
			$wpconsent->license->is_active()
		) {
			$result['license_level'] = 'pro';
		}

		$result['addon_installed'] = (int) array_key_exists( $this->config['wpconsent_addon'], get_plugins() );

		wp_send_json_success( $result );
	}

	/**
	 * Set the source of the plugin installation.
	 *
	 * @since 1.9.8
	 *
	 * @param string $plugin_basename The basename of the plugin.
	 */
	public function privacy_compliance_activated( string $plugin_basename ): void {

		if ( $plugin_basename !== $this->config['lite_plugin'] ) {
			return;
		}

		$source = wpforms()->is_pro() ? 'WPForms' : 'WPForms Lite';

		update_option( 'wpconsent_source', $source );
		update_option( 'wpconsent_date', time() );
	}

	/**
	 * Whether WPConsent plugin configured or not.
	 *
	 * @since 1.9.7.3
	 *
	 * @return bool True if WPConsent is configured properly.
	 * @noinspection PhpUndefinedFunctionInspection
	 */
	protected function is_wpconsent_configured(): bool {

		if ( ! $this->is_wpconsent_activated() ) {
			return false;
		}

		// Check if WPConsent has been configured with basic settings.
		// The plugin is considered configured if the consent banner is enabled.
		if ( function_exists( 'wpconsent' ) ) {
			$wpconsent = wpconsent();

			if ( isset( $wpconsent->settings ) ) {
				$enable_consent_banner = $wpconsent->settings->get_option( 'enable_consent_banner', 0 );

				return ! empty( $enable_consent_banner );
			}
		}

		return false;
	}

	/**
	 * Whether WPConsent plugin active or not.
	 *
	 * @since 1.9.7.3
	 *
	 * @return bool True if WPConsent plugin is active.
	 */
	protected function is_wpconsent_activated(): bool {

		return (
			function_exists( 'wpconsent' ) &&
			(
				is_plugin_active( $this->config['lite_plugin'] ) ||
				is_plugin_active( $this->config['pro_plugin'] )
			)
		);
	}
}
