/* global wpforms_builder_themes */

/**
 * WPForms Form Builder Themes: Theme module.
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
	 * Localized data aliases.
	 *
	 * @since 1.9.7
	 */
	const { isAdmin, isPro, isLicenseActive, strings, route_namespace: routeNamespace } = wpforms_builder_themes;

	/**
	 * Runtime state.
	 *
	 * @since 1.9.7
	 *
	 * @type {Object}
	 */
	const state = {};

	/**
	 * Themes data.
	 *
	 * @since 1.9.7
	 *
	 * @type {Object}
	 */
	const themesData = {
		wpforms: null,
		custom: null,
	};

	/**
	 * Enabled themes.
	 *
	 * @since 1.9.7
	 *
	 * @type {Object}
	 */
	let enabledThemes = null;

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
			app.fetchThemesData();
			app.setup();
			app.events();
		},

		/**
		 * Setup.
		 *
		 * @since 1.9.7
		 */
		setup() {
			el.$builder = $( '#wpforms-builder' );
			el.$themesControl = el.$builder.find( '.wpforms-builder-themes-control' );
			el.$customThemeRenamer = el.$builder.find( '#wpforms-panel-field-themes-themeName-wrap' );
			el.$customThemeRemover = el.$builder.find( '#wpforms-builder-themer-remove-theme' );
			el.$window = $( window );
		},

		/**
		 * Setup.
		 *
		 * @since 1.9.7
		 */
		events() {
			el.$window.on( 'wpformsBuilderThemesDataLoaded', app.themesControlSetup );
			el.$builder.on( 'wpformsSaved', app.saveCustomThemes );
		},

		/**
		 * Set up the Themes Select control.
		 *
		 * @since 1.9.7
		 */
		themesControlSetup() {
			// Debounce custom themes update and creation.
			const debouncedMaybeCreate = _.debounce( ( key ) => {
				app.maybeCreateCustomTheme();
				app.maybeUpdateCustomTheme( key );
			}, 300 );

			// Listen for all settings changes.
			WPFormsBuilderThemes.store.subscribeAll( ( value, key ) => {
				const allowedKeys = WPFormsBuilderThemes.common.getStyleAttributesKeys();
				if ( ! allowedKeys.includes( key ) ) {
					return;
				}

				debouncedMaybeCreate( key );
			} );

			// Listen for the theme name change.
			WPFormsBuilderThemes.store.subscribe( 'themeName', ( value ) => {
				app.changeThemeName( value );
				app.updateThemesList();
			} );

			// Listen for the isCustomTheme setting change.
			WPFormsBuilderThemes.store.subscribe( 'isCustomTheme', () => {
				app.toggleCustomThemeSettings();
			} );

			// Check if the selected theme exists. If no, create a new one.
			app.maybeCreateCustomTheme();

			app.toggleCustomThemeSettings();
			app.updateThemesList();
		},

		/**
		 * Update themes list.
		 *
		 * @since 1.9.7
		 */
		updateThemesList() {
			const selectedTheme = WPFormsBuilderThemes.store.get( 'wpformsTheme' ) ?? 'default';

			// Get all themes.
			const html = app.getThemesListMarkup( selectedTheme );

			el.$themesControl.html( html );

			app.addThemesEvents();
		},

		/**
		 * Get the Themes control markup.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} selectedTheme Selected theme slug.
		 *
		 * @return {string} Themes items HTML.
		 */
		getThemesListMarkup( selectedTheme ) {
			if ( ! themesData.wpforms ) {
				app.fetchThemesData();

				// Return markup with an error message if themes are not available.
				return `<div class="wpforms-no-themes">${ strings.themes_error }</div>`;
			}

			const allThemes = app.getAllThemes();

			if ( ! allThemes ) {
				return '';
			}

			const themes = Object.keys( allThemes );
			let theme, firstThemeSlug;
			let html = '';
			let itemsHtml = '';

			if ( ! app.isWPFormsTheme( selectedTheme ) ) {
				firstThemeSlug = selectedTheme;

				itemsHtml += app.getThemesItemMarkup( app.getTheme( firstThemeSlug ), firstThemeSlug, firstThemeSlug );
			}

			for ( const key in themes ) {
				const slug = themes[ key ];

				// Skip the first theme.
				if ( firstThemeSlug && firstThemeSlug === slug ) {
					continue;
				}

				// Ensure that all the theme settings are present.
				theme = { ...allThemes.default, ...( allThemes[ slug ] || {} ) };
				theme.settings = { ...allThemes.default.settings, ...( theme.settings || {} ) };

				itemsHtml += app.getThemesItemMarkup( theme, slug, selectedTheme );
			}

			html = `<div role="radiogroup" class="wpforms-builder-themes-radio-group">
						${ itemsHtml }
					</div>`;

			return html;
		},

		/**
		 * Get the theme item markup.
		 *
		 * @since 1.9.7
		 *
		 * @param {Object} theme         Theme data.
		 * @param {string} slug          Theme slug.
		 * @param {string} selectedTheme Selected theme slug.
		 *
		 * @return {string} Theme item HTML.
		 */
		getThemesItemMarkup( theme, slug, selectedTheme ) {
			if ( ! theme ) {
				return '';
			}

			const title = theme.name?.length > 0 ? theme.name : strings.theme_noname;
			let radioClasses = 'wpforms-builder-themes-radio ';
			const buttonClass = slug === selectedTheme ? 'is-active' : '';

			radioClasses += app.isDisabledTheme( slug ) ? 'wpforms-builder-themes-radio-disabled' : ' wpforms-builder-themes-radio-enabled';

			return `<button type="button" class="${ buttonClass }" value="${ slug }" role="radio">
						<div class="wpforms-builder-themes-radio ${ radioClasses }">
							<div class="wpforms-builder-themes-radio-title">${ title }</div>
						</div>

						<div class="wpforms-builder-themes-indicators">
							<span class="component-color-indicator" title="${ strings.button_background }" style="background: ${ theme.settings.buttonBackgroundColor };" data-index="0"></span>
							<span class="component-color-indicator" title="${ strings.button_text }" style="background: ${ theme.settings.buttonTextColor }" data-index="1"></span>
							<span class="component-color-indicator" title="${ strings.field_label }" style="background: ${ theme.settings.labelColor };" data-index="2"></span>
							<span class="component-color-indicator" title="${ strings.field_sublabel } " style="background: ${ theme.settings.labelSublabelColor };" data-index="3"></span>
							<span class="component-color-indicator" title="${ strings.field_border }"  style="background: ${ theme.settings.fieldBorderColor };" data-index="4"></span>
						</div>
					</button>`;
		},

		/**
		 * Show or hide the custom theme rename input.
		 *
		 * @since 1.9.7
		 */
		toggleCustomThemeSettings() {
			if ( ! isAdmin ) {
				return;
			}

			const value = WPFormsBuilderThemes.store.get( 'isCustomTheme' ) ?? '';
			const shouldShow = value === 'true';

			el.$customThemeRenamer.toggleClass( 'wpforms-hidden', ! shouldShow );
			el.$customThemeRemover.toggleClass( 'wpforms-hidden', ! shouldShow );
		},

		/**
		 * On settings change event handler.
		 *
		 * @since 1.9.7
		 */
		addThemesEvents() {
			const $radioButtons = el.$themesControl.find( '[role="radio"]' );

			// Add event listeners to the radio buttons.
			$radioButtons.off( 'click' ).on( 'click', function() {
				$radioButtons.removeClass( 'is-active' );

				$( this ).addClass( 'is-active' );

				const selectedValue = $( this ).val();

				app.selectTheme( selectedValue );
			} );

			// Add event listeners to the theme delete button.
			el.$customThemeRemover
				.off( 'click' )
				.on( 'click', app.deleteThemeModal );
		},

		/**
		 * Select theme event handler.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} value New attribute value.
		 */
		selectTheme( value ) {
			if ( ! app.setFormTheme( value ) ) {
				return;
			}

			app.onSelectThemeWithBG( value );
		},

		/**
		 * Set the form theme.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} themeSlug The theme slug.
		 *
		 * @return {boolean} True on success.
		 */
		setFormTheme( themeSlug ) {
			if ( app.maybeDisplayUpgradeModal( themeSlug ) ) {
				return false;
			}

			const theme = app.getTheme( themeSlug );

			if ( ! theme?.settings ) {
				return false;
			}

			const attributes = Object.keys( theme.settings );
			const isCustomTheme = !! themesData.custom[ themeSlug ];

			// Set the theme settings.
			WPFormsBuilderThemes.store.set( 'wpformsTheme', themeSlug );
			WPFormsBuilderThemes.store.set( 'isCustomTheme', isCustomTheme ? 'true' : '' );
			WPFormsBuilderThemes.store.set( 'themeName', isCustomTheme ? themesData.custom[ themeSlug ].name : '' );

			// Clean up the settings.
			const cleanSettings = {};

			for ( const key in attributes ) {
				const attr = attributes[ key ];
				const value = theme.settings[ attr ];

				cleanSettings[ attr ] = typeof value === 'string'
					? value.replace( /px$/, '' )
					: value;
			}

			// Update the theme settings.
			app.updateStylesAtts( cleanSettings );

			//Reinit color pickers.
			WPFormsBuilderThemes.common.loadColorPickers();

			return true;
		},

		/**
		 * Open stock photos install modal on the select theme.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} themeSlug The theme slug.
		 */
		onSelectThemeWithBG( themeSlug ) {
			if ( WPFormsBuilderThemes.stockPhotos.isPicturesAvailable() ) {
				return;
			}

			// Check only WPForms themes.
			if ( ! app.isWPFormsTheme( themeSlug ) ) {
				return;
			}

			/**
			 * @type {Object|null}
			 * @property {Object|null} settings Settings.
			 */
			const theme = app.getTheme( themeSlug );
			const bgUrl = theme.settings?.backgroundUrl;

			if ( bgUrl?.length && bgUrl !== 'url()' ) {
				WPFormsBuilderThemes.stockPhotos.installModal( 'themes' );
			}
		},

		/**
		 * Update styles atts.
		 *
		 * @since 1.9.7
		 *
		 * @param {Object} themeSettings Theme settings.
		 */
		updateStylesAtts( themeSettings ) {
			const allowedKeys = WPFormsBuilderThemes.common.getStyleAttributesKeys();
			const validSettings = {};

			for ( const key in themeSettings ) {
				if ( ! allowedKeys.includes( key ) ) {
					continue;
				}

				let value = themeSettings[ key ];

				if ( key === 'backgroundUrl' && typeof value === 'string' ) {
					value = app.getBackgroundUrl( value );
				}

				validSettings[ key ] = value;
			}

			// Update the settings.
			if ( Object.keys( validSettings ).length ) {
				Object.entries( validSettings ).forEach( ( [ key, value ] ) => {
					WPFormsBuilderThemes.store.set( key, value );
				} );
			}
		},

		/**
		 * Extract the background URL from the string.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} value Background value.
		 *
		 * @return {string} Extracted background image url.
		 */
		getBackgroundUrl( value ) {
			const match = value.match( /^url\(\s*['"]?(.*?)['"]?\s*\)$/i );
			return match?.[ 1 ] || 'url()';
		},

		/**
		 * Get all themes data.
		 *
		 * @since 1.9.7
		 *
		 * @return {Object} Themes data.
		 */
		getAllThemes() {
			return { ...( themesData.custom || {} ), ...( themesData.wpforms || {} ) };
		},

		/**
		 * Get theme data.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} slug Theme slug.
		 *
		 * @return {Object|null} Theme settings.
		 */
		getTheme( slug ) {
			return app.getAllThemes()[ slug ] || null;
		},

		/**
		 * Get enabled themes data.
		 *
		 * @since 1.9.7
		 *
		 * @return {Object} Themes data.
		 */
		getEnabledThemes() {
			if ( enabledThemes ) {
				return enabledThemes;
			}

			const allThemes = app.getAllThemes();

			if ( isPro && isLicenseActive ) {
				return allThemes;
			}

			enabledThemes = Object.keys( allThemes ).reduce( ( acc, key ) => {
				if ( allThemes[ key ].settings?.fieldSize && ! allThemes[ key ].disabled ) {
					acc[ key ] = allThemes[ key ];
				}
				return acc;
			}, {} );

			return enabledThemes;
		},

		/**
		 * Update enabled themes.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} slug  Theme slug.
		 * @param {Object} theme Theme settings.
		 */
		updateEnabledThemes( slug, theme ) {
			if ( ! enabledThemes ) {
				return;
			}

			enabledThemes = {
				...enabledThemes,
				[ slug ]: theme,
			};
		},

		/**
		 * Whether the theme is disabled.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} slug Theme slug.
		 *
		 * @return {boolean} True if the theme is disabled.
		 */
		isDisabledTheme( slug ) {
			return ! app.getEnabledThemes()?.[ slug ];
		},

		/**
		 * Whether the theme is one of the WPForms themes.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} slug Theme slug.
		 *
		 * @return {boolean} True if the theme is one of the WPForms themes.
		 */
		isWPFormsTheme( slug ) {
			return Boolean( themesData.wpforms[ slug ]?.settings );
		},

		/**
		 * Fetch themes data from Rest API.
		 *
		 * @since 1.9.7
		 */
		fetchThemesData() {
			// If a fetch is already in progress, exit the function.
			if ( state.isFetchingThemes || themesData.wpforms ) {
				return;
			}

			// Set the flag to true indicating a fetch is in progress.
			state.isFetchingThemes = true;

			try {
				// Fetch themes data.
				wp.apiFetch( {
					path: routeNamespace + 'themes/',
					method: 'GET',
					cache: 'no-cache',
				} )
					.then( ( response ) => {
						themesData.wpforms = response.wpforms || {};
						themesData.custom = response.custom || {};

						el.$window.trigger( 'wpformsBuilderThemesDataLoaded' );
					} )
					.catch( ( error ) => {
						// eslint-disable-next-line no-console
						console.error( error?.message );
					} )
					.finally( () => {
						state.isFetchingThemes = false;
					} );
			} catch ( error ) {
				// eslint-disable-next-line no-console
				console.error( error );
			}
		},

		/**
		 * Save custom themes.
		 *
		 * @since 1.9.7
		 */
		saveCustomThemes() {
			// Custom themes do not exist.
			if ( state.isSavingThemes || ! themesData.custom || ! isAdmin ) {
				return;
			}

			// Set the flag to true indicating a saving is in progress.
			state.isSavingThemes = true;

			try {
				// Save themes.
				wp.apiFetch( {
					path: routeNamespace + 'themes/custom/',
					method: 'POST',
					data: { customThemes: themesData.custom },
				} )
					.then( ( response ) => {
						if ( ! response?.result ) {
							// eslint-disable-next-line no-console
							console.log( response?.error );
						}
					} )
					.catch( ( error ) => {
						// eslint-disable-next-line no-console
						console.error( error?.message );
					} )
					.finally( () => {
						state.isSavingThemes = false;
					} );
			} catch ( error ) {
				// eslint-disable-next-line no-console
				console.error( error );
			}
		},

		/**
		 * Get the current style attributes state.
		 *
		 * @since 1.9.7
		 *
		 * @param {Object} settings Settings.
		 *
		 * @return {Array} Current style attributes.
		 */
		getCurrentStyleAttributes( settings ) {
			const defaultAttributes = Object.keys( themesData.wpforms.default?.settings );
			const currentStyleAttributes = {};

			for ( const key in defaultAttributes ) {
				const attr = defaultAttributes[ key ];

				currentStyleAttributes[ attr ] = WPFormsBuilderThemes.common.prepareComplexAttrValues( settings[ attr ], attr ) ?? '';
			}

			return currentStyleAttributes;
		},

		/**
		 * Maybe create a custom theme.
		 *
		 * @since 1.9.7
		 *
		 *
		 * @return {boolean} Whether the custom theme is created.
		 */
		maybeCreateCustomTheme() {
			const settings = WPFormsBuilderThemes.getSettings();
			const currentStyles = app.getCurrentStyleAttributes( settings );
			const isWPFormsTheme = !! themesData.wpforms[ settings.wpformsTheme ];
			const isCustomTheme = !! themesData.custom[ settings.wpformsTheme ];

			// It is one of the default themes without any changes.
			if (
				isWPFormsTheme &&
				app.getPreparedDefaultThemeSettings( themesData.wpforms[ settings.wpformsTheme ]?.settings ) === JSON.stringify( currentStyles )
			) {
				return false;
			}

			// It is a modified default theme OR unknown custom theme.
			if ( isWPFormsTheme || ! isCustomTheme ) {
				app.createCustomTheme( settings, currentStyles );
			}

			return true;
		},

		/**
		 * Prepare default theme settings for comparing.
		 *
		 * @since 1.9.7
		 *
		 * @param {Object} settings Theme properties.
		 *
		 * @return {string} Whether the custom theme is created.
		 */
		getPreparedDefaultThemeSettings( settings ) {
			const preparedSettings = {};

			Object.keys( settings ).forEach( ( key ) => {
				preparedSettings[ key ] = WPFormsBuilderThemes.common.removeRgbaSpaces( settings[ key ] );
			} );

			return JSON.stringify( preparedSettings );
		},

		/**
		 * Create a custom theme.
		 *
		 * @since 1.9.7
		 *
		 * @param {Object} settings      Style settings.
		 * @param {Object} currentStyles Current style settings.
		 *
		 * @return {boolean} Whether the custom theme is created.
		 */
		createCustomTheme( settings, currentStyles = null ) {
			let counter = 0;
			let themeSlug = settings.wpformsTheme;

			const baseTheme = app.getTheme( settings.wpformsTheme ) || themesData.wpforms.default;
			let themeName = baseTheme.name;

			themesData.custom = themesData.custom || {};

			// Determine the theme slug and the number of copies.
			do {
				counter++;
				themeSlug = themeSlug + '-copy-' + counter;
			} while ( themesData.custom[ themeSlug ] && counter < 10000 );

			const copyStr = counter < 2 ? strings.theme_copy : strings.theme_copy + ' ' + counter;

			themeName += ' (' + copyStr + ')';

			// Add the new custom theme.
			themesData.custom[ themeSlug ] = {
				name: themeName,
				settings: currentStyles || app.getCurrentStyleAttributes( settings ),
			};

			app.updateEnabledThemes( themeSlug, themesData.custom[ themeSlug ] );

			// Update the settings with the new custom theme settings.
			WPFormsBuilderThemes.store.set( 'wpformsTheme', themeSlug );
			WPFormsBuilderThemes.store.set( 'isCustomTheme', 'true' );
			WPFormsBuilderThemes.store.set( 'themeName', themeName );

			app.updateThemesList();

			return true;
		},

		/**
		 * Update custom theme.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} attribute Attribute name.
		 * @param {string} value     New attribute value.
		 */
		updateCustomThemeAttribute( attribute, value ) {
			const settings = WPFormsBuilderThemes.getSettings();
			const themeSlug = settings.wpformsTheme;

			// Skip if it is one of the WPForms themes OR the attribute is not in the theme settings.
			if (
				themesData.wpforms[ themeSlug ] ||
				(
					attribute !== 'themeName' &&
					! themesData.wpforms.default.settings[ attribute ]
				)
			) {
				return;
			}

			// Skip if the custom theme doesn't exist in some rare cases.
			if ( ! themesData.custom[ themeSlug ] ) {
				return;
			}

			// Update the theme data.
			if ( attribute === 'themeName' ) {
				themesData.custom[ themeSlug ].name = value;
			} else {
				themesData.custom[ themeSlug ].settings = themesData.custom[ themeSlug ].settings || themesData.wpforms.default.settings;
				themesData.custom[ themeSlug ].settings[ attribute ] = value;

				app.maybeUpdateColorIndicator( attribute, value );
			}
		},

		/**
		 * Maybe update the custom theme settings.
		 *
		 * @param {string} key Setting key.
		 *
		 * @since 1.9.7
		 */
		maybeUpdateCustomTheme( key ) {
			const settings = WPFormsBuilderThemes.getSettings();
			const isCustomTheme = settings.isCustomTheme === 'true';

			if ( ! isCustomTheme ) {
				return;
			}

			const attrValue = WPFormsBuilderThemes.common.prepareComplexAttrValues( settings[ key ], key );

			app.updateCustomThemeAttribute( key, attrValue );
		},

		/**
		 * Maybe update the color indicators for the custom theme.
		 *
		 * @param {string} settingKey   Setting key.
		 * @param {string} settingValue Setting value.
		 *
		 * @since 1.9.7
		 */
		maybeUpdateColorIndicator( settingKey, settingValue ) {
			const colorSettingKeys = [ 'buttonBackgroundColor', 'buttonTextColor', 'labelColor', 'labelSublabelColor', 'fieldBorderColor' ];

			if ( ! colorSettingKeys.includes( settingKey ) ) {
				return;
			}

			const $indicators = el.$themesControl.find( 'button.is-active .wpforms-builder-themes-indicators' );
			const indicatorIndex = colorSettingKeys.indexOf( settingKey );
			const $indicator = $indicators.find( `.component-color-indicator[data-index="${ indicatorIndex }"]` );

			if ( $indicator.length ) {
				$indicator.css( 'background-color', settingValue );
			}
		},

		/**
		 * Maybe display upgrades modal in Lite.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} themeSlug The theme slug.
		 *
		 * @return {boolean} True if modal was displayed.
		 */
		maybeDisplayUpgradeModal( themeSlug ) {
			if ( ! app.isDisabledTheme( themeSlug ) ) {
				return false;
			}

			if ( ! isPro ) {
				WPFormsBuilderThemes.common.showProModal( 'themes', strings.pro_sections.themes );

				return true;
			}

			if ( ! isLicenseActive ) {
				WPFormsBuilderThemes.common.showLicenseModal( 'themes', strings.pro_sections.themes, 'select-theme' );

				return true;
			}

			return false;
		},

		/**
		 * Change theme name event handler.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} value New attribute value.
		 */
		changeThemeName( value ) {
			app.updateCustomThemeAttribute( 'themeName', value );
		},

		/**
		 * Delete theme event handler.
		 *
		 * @param {string} deleteThemeSlug Theme slug.
		 *
		 * @since 1.9.7
		 */
		deleteTheme( deleteThemeSlug ) {
			// Remove theme from the theme storage.
			delete themesData.custom[ deleteThemeSlug ];
		},

		/**
		 * Open the theme delete the confirmation modal window.
		 *
		 * @since 1.9.7
		 *
		 * @param {Object} e Event object.
		 */
		deleteThemeModal( e ) {
			e.preventDefault();

			const settings = WPFormsBuilderThemes.getSettings();
			const selectedThemeSlug = settings.wpformsTheme;
			const selectedThemeName = app.getTheme( selectedThemeSlug )?.name;
			const confirm = strings.theme_delete_confirm.replace( '%1$s', `<b>${ _.escape( selectedThemeName ) }</b>` );
			const content = `<p class="wpforms-theme-delete-text">${ confirm } ${ strings.theme_delete_cant_undone }</p>`;

			$.confirm( {
				title: strings.theme_delete_title,
				content,
				icon: 'wpforms-exclamation-circle',
				type: 'red wpforms-builder-themes-modal',
				buttons: {
					confirm: {
						text: strings.theme_delete_yes,
						btnClass: 'btn-confirm',
						keys: [ 'enter' ],
						action() {
							// Delete the theme and switch to the default theme.
							app.deleteTheme( selectedThemeSlug );
							app.selectTheme( 'default' );
						},
					},
					cancel: {
						text: strings.cancel,
						keys: [ 'esc' ],
					},
				},
			} );
		},
	};

	return app;
}
