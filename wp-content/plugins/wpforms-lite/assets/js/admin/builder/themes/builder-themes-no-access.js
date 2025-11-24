/* global wpforms_builder_themes_no_access */

/**
 * @param wpforms_builder_themes_no_access.strings.permission_modal.confirm
 * @param wpforms_builder_themes_no_access.strings.permission_modal.content
 * @param wpforms_builder_themes_no_access.strings.permission_modal.title
 */

// noinspection ES6ConvertVarToLetConst
/**
 * WPForms Form builder themes - Non-admin version.
 *
 * @since 1.9.8
 */
var WPForms = window.WPForms || {}; // eslint-disable-line no-var

WPForms.Admin = WPForms.Admin || {};
WPForms.Admin.Builder = WPForms.Admin.Builder || {};

WPForms.Admin.Builder.ThemesNoAccess = WPForms.Admin.Builder.ThemesNoAccess || ( function( document, window, $ ) {
	/**
	 * Elements holder.
	 *
	 * @since 1.9.8
	 *
	 * @type {Object}
	 */
	const el = {};

	/**
	 * Public functions and properties.
	 *
	 * @since 1.9.8
	 */
	const app = {

		/**
		 * Start the engine.
		 *
		 * @since 1.9.8
		 */
		init() {
			$( app.ready );
		},

		/**
		 * Start the engine.
		 *
		 * @since 1.9.8
		 */
		ready() {
			app.setup();
			app.events();
		},

		/**
		 * Setup. Prepare some variables.
		 *
		 * @since 1.9.8
		 */
		setup() {
			// Cache DOM elements.
			el.$builder = $( '#wpforms-builder' );
		},

		/**
		 * Setup events.
		 *
		 * @since 1.9.8
		 */
		events() {
			el.$builder.on( 'wpformsPanelSectionSwitch', app.handlePanelSectionSwitch );
		},

		/**
		 * Handle panel section switch and show permission modal.
		 *
		 * @since 1.9.8
		 *
		 * @param {Object} _event  The event object.
		 * @param {string} section The section that was switched to.
		 */
		handlePanelSectionSwitch( _event, section ) {
			if ( section === 'themes' ) {
				$.alert( {
					title: wpforms_builder_themes_no_access.strings.permission_modal.title,
					content: wpforms_builder_themes_no_access.strings.permission_modal.content,
					icon: 'fa fa-exclamation-triangle',
					type: 'red',
					theme: 'modern',
					buttons: {
						confirm: {
							text: wpforms_builder_themes_no_access.strings.permission_modal.confirm,
							btnClass: 'btn-confirm',
							keys: [ 'enter' ],
						},
					},
				} );
				_event.preventDefault();
			}
		},
	};

	// Return the public-facing methods.
	return app;
}( document, window, jQuery ) );

// Initialize.
WPForms.Admin.Builder.ThemesNoAccess.init();
