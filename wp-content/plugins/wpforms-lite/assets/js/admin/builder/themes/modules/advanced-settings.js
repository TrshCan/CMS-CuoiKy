/* global wpforms_builder_themes  */

/**
 * WPForms Form Builder Themes: Advanced settings module.
 *
 * @since 1.9.7
 *
 * @param {Object} document Document object.
 * @param {Object} window   Window object.
 * @param {jQuery} $        jQuery object.
 *
 * @return {Object} Public functions and properties.
 */
export default function( document, window, $ ) { // eslint-disable-line max-lines-per-function
	const WPForms = window.WPForms || {};
	const WPFormsBuilderThemes = WPForms.Admin.Builder.Themes || {};

	/**
	 * Elements holder.
	 *
	 * @since 1.9.7
	 *
	 * @type {Object}
	 */
	const el = {};

	/**
	 * Public functions and properties.
	 *
	 * @since 1.9.7
	 */
	const app = {

		/**
		 * Start the engine.
		 *
		 * @since 1.9.7
		 */
		init() {
			app.setup();
			app.events();

			// Subscribe to all settings change.
			WPFormsBuilderThemes.store.subscribeAll( ( value, key ) => {
				app.updateCopyPasteContent( value, key );
			} );

			app.disableSpellCheck();
			app.updateCopyPasteContent();
		},

		/**
		 * Setup.
		 *
		 * @since 1.9.7
		 */
		setup() {
			el.$builder = $( '#wpforms-builder' );
		},

		/**
		 * Setup.
		 *
		 * @since 1.9.7
		 */
		events() {
		},

		/**
		 * Get the list of the settings key allowed to show in the Copy/paste field.
		 *
		 * @since 1.9.7
		 * @return {Array} List of allowed settings.
		 */
		getAllowedKeys() {
			const allowedKeys = [ 'themeName', 'isCustomTheme', 'wpformsTheme', 'customCss' ];
			const styleSettings = WPFormsBuilderThemes.common.getStyleAttributesKeys();

			return allowedKeys.concat( styleSettings );
		},

		/**
		 * Update the content of the "Copy/Paste" field.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} value Setting value
		 * @param {string} key   Setting key.
		 */
		updateCopyPasteContent( value = '', key = '' ) {
			if ( key === 'copyPasteJsonValue' ) {
				app.pasteSettings( value );
				return;
			}

			const content = {};
			const allowedKeys = app.getAllowedKeys();
			const settings = WPFormsBuilderThemes.getSettings();

			allowedKeys.forEach( ( settingKey ) => {
				content[ settingKey ] = settings[ settingKey ];
			} );

			// Update field content in a 'silent' mode.
			WPFormsBuilderThemes.store.set( 'copyPasteJsonValue', JSON.stringify( content ), true );
		},

		/**
		 * Paste settings handler.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} value New attribute value.
		 */
		pasteSettings( value ) {
			value = value.trim();

			const pasteAttributes = app.parseValidateJson( value );

			// Show the error modal if JSON is broken.
			if ( ! pasteAttributes ) {
				if ( value ) {
					app.showJsonErrorModal();
				}

				return;
			}

			const themeSlug = pasteAttributes?.wpformsTheme ?? pasteAttributes?.theme;
			const currentThemeSlug = WPFormsBuilderThemes.store.get( 'wpformsTheme' );
			const theme = WPFormsBuilderThemes.themes.getTheme( themeSlug );

			// If the theme already exists - set it.
			if ( theme && themeSlug !== currentThemeSlug ) {
				WPFormsBuilderThemes.themes.setFormTheme( themeSlug );
				WPFormsBuilderThemes.themes.updateThemesList();
				return;
			}

			// For not existed theme - parse and set settings.
			const allowedKeys = app.getAllowedKeys();

			allowedKeys.forEach( ( settingKey ) => {
				if ( pasteAttributes[ settingKey ] !== undefined ) {
					let settingValue = pasteAttributes[ settingKey ];

					settingValue = typeof settingValue === 'string'
						? settingValue.replace( /px$/, '' )
						: settingValue;

					WPFormsBuilderThemes.store.set( settingKey, settingValue );
				}
			} );
		},

		/**
		 * Parse and validate JSON string.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} value JSON string.
		 *
		 * @return {boolean|object} Parsed JSON object OR false on error.
		 */
		parseValidateJson( value ) {
			if ( typeof value !== 'string' ) {
				return false;
			}

			let atts;

			try {
				atts = JSON.parse( value.trim() );
			} catch ( error ) {
				atts = false;
			}

			return atts;
		},

		/**
		 * Show the error when pasted JSON is broken.
		 *
		 * @since 1.9.7
		 */
		showJsonErrorModal() {
			$.alert( {
				title: wpforms_builder_themes.strings.uhoh,
				content: wpforms_builder_themes.strings.copy_paste_error,
				icon: 'fa fa-exclamation-circle',
				type: 'red',
				buttons: {
					cancel: {
						text: wpforms_builder_themes.strings.close,
						btnClass: 'btn-confirm',
						keys: [ 'enter' ],
					},
				},
			} );
		},

		/**
		 * Disable spellcheck for the textarea settings fields.
		 *
		 * @since 1.9.7
		 */
		disableSpellCheck() {
			const customCssControl = WPFormsBuilderThemes.getControls( 'customCss' );
			const copyPasteControl = WPFormsBuilderThemes.getControls( 'copyPasteJsonValue' );

			if ( ! customCssControl || ! copyPasteControl ) {
				return;
			}

			copyPasteControl.attr( 'spellcheck', 'false' );
			customCssControl.attr( 'spellcheck', 'false' );
		},
	};

	return app;
}
