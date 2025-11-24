/* global wpf, wpforms_builder_themes, WPFormsBuilder, wpforms_education, WPFormsEducation, WPFormsUtils */

/**
 * WPForms Form Builder Themes: Common module.
 *
 * @since 1.9.7
 *
 * @param {Object} document Document object.
 * @param {Object} window   Window object.
 * @param {jQuery} $        jQuery object.
 *
 * @return {Object} Public functions and properties.
 */
export default function( document, window, $ ) {// eslint-disable-line max-lines-per-function
	const WPForms = window.WPForms || {};
	const WPFormsBuilderThemes = WPForms.Admin.Builder.Themes || {};

	/**
	 * Localized data aliases.
	 *
	 * @since 1.9.7
	 */
	const { isPro, isLicenseActive, isModern, isFullStyles, isLowFormPagesVersion, strings } = wpforms_builder_themes;

	/**
	 * Elements holder.
	 *
	 * @since 1.9.7
	 *
	 * @type {Object}
	 */
	const el = {};

	/**
	 * Field dependencies configuration.
	 *
	 * @since 1.9.7
	 *
	 * @type {Object}
	 */
	const fieldDependencies = {
		fieldBorderStyle: {
			none: {
				disable: [ 'fieldBorderSize', 'fieldBorderColor' ],
			},
		},
		buttonBorderStyle: {
			none: {
				disable: [ 'buttonBorderSize', 'buttonBorderColor' ],
			},
		},
		containerBorderStyle: {
			none: {
				disable: [ 'containerBorderWidth', 'containerBorderColor' ],
			},
		},
		backgroundImage: {
			none: {
				hide: [ 'backgroundPosition', 'backgroundRepeat', 'backgroundSizeMode', 'backgroundWidth', 'backgroundHeight' ],
			},
		},
		backgroundSizeMode: {
			cover: {
				hide: [ 'backgroundWidth', 'backgroundHeight' ],
			},
		},
	};

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

			// Maybe show the sidebar after page reload.
			app.handlePanelSwitch();

			// Init color pickers.
			app.loadColorPickers();

			// Init settings store.
			WPFormsBuilderThemes.store.initFromDOM();

			// Subscribe to all settings change.
			WPFormsBuilderThemes.store.subscribeAll( ( value, key ) => {
				app.changeStyleSettings( value, key );
				app.handleFieldDependencies( key, value );
			} );

			// Render already saved settings.
			app.renderSavedSettings();

			// Apply initial dependencies.
			app.applyAllDependencies();

			// Block PRO controls.
			app.blockProSections();

			// Run checks.
			app.runChecks();
		},

		/**
		 * Setup.
		 *
		 * @since 1.9.7
		 */
		setup() {
			el.$builder = $( '#wpforms-builder' );
			el.$settings = $( '.wpforms-panel-content-section-themes' );
			el.$sidebar = $( '#wpforms-builder-themes-sidebar' );
			el.$preview = $( '#wpforms-builder-themes-preview' );
			el.$tabs = $( '#wpforms-builder-themes-sidebar-tabs > a' );

			// Set the custom class to sidebar content for macOS.
			if ( app.isMac() ) {
				el.$sidebar.find( '.wpforms-builder-themes-sidebar-content' ).addClass( 'wpforms-is-mac' );
			}
		},

		/**
		 * Setup.
		 *
		 * @since 1.9.7
		 */
		events() {
			el.$builder
				.on( 'click', '#wpforms-builder-themes-back', app.handleClosePreviewSidebar )
				.on( 'click', '.wpforms-panel-sidebar-section-themes', app.handleOpenPreviewSidebar )
				.on( 'wpformsPanelSwitched', '.wpforms-panel-sidebar-section-themes', app.handlePanelSwitch )
				.on( 'wpformsPanelSectionSwitch', app.handlePanelSectionSwitch )
				.on( 'click', '.wpforms-panel-settings-button.active[data-panel="settings"]', app.handleSettingsTabClick );

			el.$tabs.on( 'click', app.handleTabClick );
		},

		/**
		 * Handle sidebar closing when the 'Settings' tab button is clicked.
		 *
		 * @since 1.9.7
		 */
		handleSettingsTabClick() {
			if ( el.$sidebar.hasClass( 'wpforms-hidden' ) ) {
				return;
			}

			app.handleClosePreviewSidebar( null );
		},

		/**
		 * Handle field dependencies when a field value changes.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} fieldKey   The field key that changed.
		 * @param {string} fieldValue The new field value.
		 */
		handleFieldDependencies( fieldKey, fieldValue ) {
			// After handling the specific field dependency, re-apply all dependencies
			// to ensure all conditions are properly evaluated with current values.
			app.applyFieldDependency( fieldKey, fieldValue );
			app.applyAllDependencies();
		},

		/**
		 * Apply dependency for a specific field.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} fieldKey   The field key that changed.
		 * @param {string} fieldValue The new field value.
		 */
		applyFieldDependency( fieldKey, fieldValue ) {
			if ( ! fieldDependencies[ fieldKey ] ) {
				return;
			}

			const dependencies = fieldDependencies[ fieldKey ];

			// Check each condition for the field.
			// eslint-disable-next-line complexity
			Object.keys( dependencies ).forEach( ( conditionValue ) => {
				const condition = dependencies[ conditionValue ];
				const shouldApply = fieldValue === conditionValue;

				// Handle disable conditions.
				if ( condition.disable && shouldApply ) {
					condition.disable.forEach( ( dependentField ) => {
						app.disableField( dependentField );
					} );
				} else if ( condition.disable ) {
					condition.disable.forEach( ( dependentField ) => {
						app.enableField( dependentField );
					} );
				}

				// Handle enable conditions.
				if ( condition.enable && shouldApply ) {
					condition.enable.forEach( ( dependentField ) => {
						app.enableField( dependentField );
					} );
				} else if ( condition.enable ) {
					condition.enable.forEach( ( dependentField ) => {
						app.disableField( dependentField );
					} );
				}

				// Handle hide conditions.
				if ( condition.hide && shouldApply ) {
					condition.hide.forEach( ( dependentField ) => {
						app.hideField( dependentField );
					} );
				} else if ( condition.hide ) {
					condition.hide.forEach( ( dependentField ) => {
						app.showField( dependentField );
					} );
				}

				// Handle show conditions.
				if ( condition.show && shouldApply ) {
					condition.show.forEach( ( dependentField ) => {
						app.showField( dependentField );
					} );
				} else if ( condition.show ) {
					condition.show.forEach( ( dependentField ) => {
						app.hideField( dependentField );
					} );
				}
			} );
		},

		/**
		 * Apply all dependencies based on current settings.
		 *
		 * @since 1.9.7
		 */
		applyAllDependencies() {
			const settings = WPFormsBuilderThemes.getSettings();

			Object.keys( fieldDependencies ).forEach( ( fieldKey ) => {
				const fieldValue = settings[ fieldKey ];
				if ( fieldValue !== undefined ) {
					app.applyFieldDependency( fieldKey, fieldValue );
				}
			} );
		},

		/**
		 * Disable a field and its wrapper.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} fieldKey The field key to disable.
		 */
		disableField( fieldKey ) {
			const $field = el.$sidebar.find( `[name*="${ fieldKey }"]` );

			if ( $field.length ) {
				$field.addClass( 'wpforms-builder-themes-disabled' );
			}
		},

		/**
		 * Enable a field and its wrapper.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} fieldKey The field key to enable.
		 */
		enableField( fieldKey ) {
			const $field = el.$sidebar.find( `[name*="${ fieldKey }"]` );

			if ( $field.length ) {
				$field.removeClass( 'wpforms-builder-themes-disabled' );
			}
		},

		/**
		 * Hide a field and its wrapper.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} fieldKey The field key to hide.
		 */
		hideField( fieldKey ) {
			const $field = el.$sidebar.find( `[name*="${ fieldKey }"]` );
			const $wrapper = $field.parent().parent().hasClass( 'wpforms-builder-themes-conditional-hide' )
				? $field.parent().parent()
				: $field.parent( '.wpforms-panel-field' );

			if ( $field.length ) {
				$field.prop( 'disabled', true );
				$wrapper.addClass( 'wpforms-builder-themes-hidden' );
			}
		},

		/**
		 * Show a field and its wrapper.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} fieldKey The field key to show.
		 */
		showField( fieldKey ) {
			const $field = el.$sidebar.find( `[name*="${ fieldKey }"]` );
			const $wrapper = $field.parent().parent().hasClass( 'wpforms-builder-themes-conditional-hide' )
				? $field.parent().parent()
				: $field.parent( '.wpforms-panel-field' );

			if ( $field.length ) {
				$field.prop( 'disabled', false );
				$wrapper.removeClass( 'wpforms-builder-themes-hidden' );
			}
		},

		/**
		 * Handle opening the custom settings sidebar.
		 *
		 * @since 1.9.7
		 *
		 * @param {Object} event The event object.
		 */
		handleOpenPreviewSidebar( event ) {
			el.$sidebar?.removeClass( 'wpforms-hidden' );
			event?.preventDefault();
		},

		/**
		 * Handle closing the custom settings sidebar.
		 *
		 * @since 1.9.7
		 *
		 * @param {Object} event The event object.
		 */
		handleClosePreviewSidebar( event ) {
			el.$sidebar?.addClass( 'wpforms-hidden' );
			event?.preventDefault();
		},

		/**
		 * Handle panel switch and maybe open the sidebar.
		 *
		 * @since 1.9.7
		 */
		handlePanelSwitch() {
			if ( wpf.getQueryString( 'section' ) === 'themes' ) {
				app.handleOpenPreviewSidebar( null );
			}
		},

		/**
		 * Handle panel section switch and maybe open the sidebar.
		 *
		 * @since 1.9.7
		 *
		 * @param {Object} _event  The event object.
		 * @param {string} section The section that was switched to.
		 */
		handlePanelSectionSwitch( _event, section ) {
			if ( section === 'themes' ) {
				app.checkForFormFeatures();
			}
		},

		/**
		 * Handle tabs click.
		 *
		 * @since 1.9.7
		 *
		 * @param {Object} e Event object.
		 */
		handleTabClick( e ) {
			e.preventDefault();
			el.$tabs.toggleClass( 'active' );
			$( '.wpforms-builder-themes-sidebar-tab-content' ).toggleClass( 'wpforms-hidden' );
		},

		/**
		 * Get a list of the style settings keys.
		 *
		 * @since 1.9.7
		 *
		 * @return {Array} Settings keys
		 */
		getStyleAttributesKeys() {
			return [
				'containerPadding',
				'containerBorderStyle',
				'containerBorderWidth',
				'containerBorderRadius',
				'containerShadowSize',
				'containerBorderColor',
				'fieldSize',
				'fieldBorderStyle',
				'fieldBorderRadius',
				'fieldBorderSize',
				'fieldBackgroundColor',
				'fieldBorderColor',
				'fieldTextColor',
				'fieldMenuColor',
				'pageBreakColor',
				'labelSize',
				'labelColor',
				'labelSublabelColor',
				'labelErrorColor',
				'buttonSize',
				'buttonBorderStyle',
				'buttonBorderSize',
				'buttonBorderRadius',
				'buttonBackgroundColor',
				'buttonBorderColor',
				'buttonTextColor',
				'backgroundColor',
				'backgroundPosition',
				'backgroundUrl',
				'backgroundRepeat',
				'backgroundSize',
				'backgroundSizeMode',
				'backgroundWidth',
				'backgroundHeight',
				'backgroundImage',
			];
		},

		/**
		 * Get style handlers.
		 *
		 * @since 1.9.7
		 *
		 * @return {Object} Style handlers.
		 */
		getStyleHandlers() {
			return {
				'background-url': WPFormsBuilderThemes.background.setBackgroundUrl,
				'background-image': WPFormsBuilderThemes.background.setContainerBackgroundImage,
				'background-position': WPFormsBuilderThemes.background.setContainerBackgroundPosition,
				'background-repeat': WPFormsBuilderThemes.background.setContainerBackgroundRepeat,
				'background-color': WPFormsBuilderThemes.background.setBackgroundColor,
				'background-height': WPFormsBuilderThemes.background.handleSizeFromHeight,
				'background-width': WPFormsBuilderThemes.background.handleSizeFromWidth,
			};
		},

		/**
		 * Change style setting handler.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} settingValue Setting value.
		 * @param {string} settingKey   Setting key.
		 */
		changeStyleSettings( settingValue, settingKey ) {// eslint-disable-line complexity
			const wpformsContainer = el.$preview.find( '.wpforms-container' )[ 0 ];

			if ( ! wpformsContainer ) {
				return;
			}

			// Process only styles related settings
			if ( ! app.getStyleAttributesKeys().includes( settingKey ) ) {
				return;
			}

			const settings = WPFormsBuilderThemes.getSettings();

			/**
			 * @type {Object}
			 */
			const property = settingKey.replace( /[A-Z]/g, ( letter ) => `-${ letter.toLowerCase() }` );
			settingValue = app.prepareComplexAttrValues( settingValue, settingKey );

			// Check for custom handlers.
			if ( typeof app.getStyleHandlers()[ property ] === 'function' ) {
				app.getStyleHandlers()[ property ]( wpformsContainer, settingValue, settings );
				return;
			}

			switch ( property ) {
				case 'field-size':
				case 'label-size':
				case 'button-size':
				case 'container-shadow-size':
					for ( const key in wpforms_builder_themes.sizes[ property ][ settingValue ] ) {
						wpformsContainer.style.setProperty(
							`--wpforms-${ property }-${ key }`,
							wpforms_builder_themes.sizes[ property ][ settingValue ][ key ],
						);
					}

					break;

				case 'button-background-color':
					app.maybeUpdateAccentColor( settings.buttonBorderColor, settingValue, wpformsContainer );
					settingValue = app.maybeSetButtonAltBackgroundColor( settingValue, settings.buttonBorderColor, wpformsContainer );
					app.maybeSetButtonAltTextColor( settings.buttonTextColor, settingValue, settings.buttonBorderColor, wpformsContainer );
					wpformsContainer.style.setProperty( `--wpforms-${ property }`, settingValue );

					break;

				case 'button-border-color':
					app.maybeUpdateAccentColor( settingValue, settings.buttonBackgroundColor, wpformsContainer );
					app.maybeSetButtonAltTextColor( settings.buttonTextColor, settings.buttonBackgroundColor, settingValue, wpformsContainer );
					wpformsContainer.style.setProperty( `--wpforms-${ property }`, settingValue );

					break;

				case 'button-text-color':
					app.maybeSetButtonAltTextColor( settingValue, settings.buttonBackgroundColor, settings.buttonBorderColor, wpformsContainer );
					wpformsContainer.style.setProperty( `--wpforms-${ property }`, settingValue );

					break;
				default:
					wpformsContainer.style.setProperty( `--wpforms-${ property }`, settingValue );
					wpformsContainer.style.setProperty( `--wpforms-${ property }-spare`, settingValue );
			}
		},

		/**
		 * Maybe update accent color.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} color                 Color value.
		 * @param {string} buttonBackgroundColor Button background color.
		 * @param {Object} container             Form container.
		 */
		maybeUpdateAccentColor( color, buttonBackgroundColor, container ) {
			// Setting the CSS property value to the child element overrides the parent property value.
			const formWrapper = container.querySelector( '#builder-themes-form-preview-wrapper' );

			// Fallback to the default color if the border color is transparent.
			color = WPFormsUtils.cssColorsUtils.isTransparentColor( color ) ? '#066aab' : color;

			if ( WPFormsUtils.cssColorsUtils.isTransparentColor( buttonBackgroundColor ) ) {
				formWrapper.style.setProperty( '--wpforms-button-background-color-alt', 'rgba( 0, 0, 0, 0 )' );
				formWrapper.style.setProperty( '--wpforms-button-background-color', color );
			} else {
				container.style.setProperty( '--wpforms-button-background-color-alt', buttonBackgroundColor );
				formWrapper.style.setProperty( '--wpforms-button-background-color-alt', null );
				formWrapper.style.setProperty( '--wpforms-button-background-color', null );
			}
		},

		/**
		 * Maybe set the button's alternative background color.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} value             Setting value.
		 * @param {string} buttonBorderColor Button border color.
		 * @param {Object} container         Form container.
		 *
		 * @return {string|*} New background color.
		 */
		maybeSetButtonAltBackgroundColor( value, buttonBorderColor, container ) {
			// Setting the CSS property value to the child element overrides the parent property value.
			const formWrapper = container.querySelector( '#builder-themes-form-preview-wrapper' );

			formWrapper.style.setProperty( '--wpforms-button-background-color-alt', value );

			if ( WPFormsUtils.cssColorsUtils.isTransparentColor( value ) ) {
				return WPFormsUtils.cssColorsUtils.isTransparentColor( buttonBorderColor ) ? '#066aab' : buttonBorderColor;
			}

			return value;
		},

		/**
		 * Maybe set the button's alternative text color.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} value                 Setting value.
		 * @param {string} buttonBackgroundColor Button background color.
		 * @param {string} buttonBorderColor     Button border color.
		 * @param {Object} container             Form container.
		 */
		maybeSetButtonAltTextColor( value, buttonBackgroundColor, buttonBorderColor, container ) {
			const formWrapper = container.querySelector( '#builder-themes-form-preview-wrapper' );

			let altColor = null;

			value = value.toLowerCase();

			if (
				WPFormsUtils.cssColorsUtils.isTransparentColor( value ) ||
				value === buttonBackgroundColor ||
				(
					WPFormsUtils.cssColorsUtils.isTransparentColor( buttonBackgroundColor ) &&
					value === buttonBorderColor
				)
			) {
				altColor = WPFormsUtils.cssColorsUtils.getContrastColor( buttonBackgroundColor );
			}

			container.style.setProperty( `--wpforms-button-text-color-alt`, value );
			formWrapper.style.setProperty( `--wpforms-button-text-color-alt`, altColor );
		},

		/**
		 * Prepare complex setting values.
		 *
		 * @since 1.9.7
		 *
		 * @param {string|Object} value Setting value.
		 * @param {string}        key   Attribute key.
		 *
		 * @return {string|Object} Prepared setting value.
		 */
		prepareComplexAttrValues( value, key ) {
			const pxItems = [
				'fieldBorderRadius',
				'fieldBorderSize',
				'buttonBorderRadius',
				'buttonBorderSize',
				'containerPadding',
				'containerBorderWidth',
				'containerBorderRadius',
				'backgroundWidth',
				'backgroundHeight',
			];

			if ( pxItems.includes( key ) ) {
				if ( typeof value === 'number' || ( typeof value === 'string' && ! value.trim().endsWith( 'px' ) ) ) {
					value = `${ value }px`;
				}
			}

			if ( key === 'backgroundUrl' ) {
				if ( typeof value === 'string' && ! value.trim().startsWith( 'url(' ) ) {
					value = value ? `url( ${ value } )` : 'url()';
				}
			}

			// Remove spaces after/before braces in rgb/rgba colors.
			value = app.removeRgbaSpaces( value );

			return value;
		},

		/**
		 * Remove extra spaces in rgba/rgb values.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} value Setting value.
		 *
		 * @return {string} Prepared setting value.
		 */
		removeRgbaSpaces( value ) {
			if ( typeof value !== 'string' || ! value.includes( 'rgb' ) ) {
				return value;
			}

			return value
				.replace( /\(\s*/g, '(' )
				.replace( /\s*\)/g, ')' );
		},

		/**
		 * Render already saved settings.
		 *
		 * @since 1.9.7
		 */
		renderSavedSettings() {
			const wpformsContainer = el.$preview.find( '.wpforms-container' )[ 0 ];

			if ( ! wpformsContainer ) {
				return;
			}

			const settings = WPFormsBuilderThemes.getSettings();

			_.each( settings, ( value, key ) => {
				app.changeStyleSettings( value, key );
			} );
		},

		/**
		 * Custom loader for color pickers.
		 *
		 * @since 1.9.7
		 */
		loadColorPickers() {
			WPFormsBuilder.loadColorPickers( el.$sidebar, {
				position: 'top left',
			} );
		},

		/**
		 * Disable PRO sections.
		 *
		 * @since 1.9.7
		 */
		blockProSections() {
			if ( isPro && isLicenseActive ) {
				return;
			}

			const $proSectionsHeadings = $( '.wpforms-add-fields-heading[data-group="background_styles"], .wpforms-add-fields-heading[data-group="container_styles"]' );
			const proSections = $( '.wpforms-builder-themes-pro-section' );

			// Disable sections and show the PRO badge.
			proSections.addClass( 'wpforms-builder-themes-disabled-pro' );
			$proSectionsHeadings.addClass( 'wpforms-builder-themes-pro-blocked' );

			// Disable clicks on blocked sections.
			proSections.off( 'click' ).on( 'click', app.handleProSectionClick );
		},

		/**
		 * Disable all sections.
		 *
		 * @since 1.9.7
		 * @param {boolean} unblock Need to unblock status.
		 */
		blockAllSections( unblock = false ) {
			const sections = el.$sidebar.find( '.wpforms-add-fields-buttons, .wpforms-builder-themes-sidebar-advanced' );

			// Disable/Enable all sections.
			if ( ! unblock ) {
				sections.addClass( 'wpforms-builder-themes-disabled' );
			} else {
				sections.removeClass( 'wpforms-builder-themes-disabled' );
			}
		},

		/**
		 * Handle the PRO section click.
		 *
		 * @since 1.9.7
		 */
		handleProSectionClick() {
			const section = $( this ).prev( 'a' ).data( 'group' )?.replace( '_styles', '' );

			if ( ! isPro ) {
				app.showProModal( section, strings.pro_sections[ section ] );
				return;
			}

			if ( ! isLicenseActive ) {
				app.showLicenseModal( strings.pro_sections[ section ], strings.pro_sections[ section ], 'pro-section' );
			}
		},

		/**
		 * Open the educational popup for users with no Pro license.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} panel   Panel slug.
		 * @param {string} feature Feature name.
		 */
		showProModal( panel, feature ) {
			const type = 'pro';
			const message = wpforms_education.upgrade[ type ].message_plural.replace( /%name%/g, feature );
			const utmContent = {
				container: 'General Container Styles',
				background: 'General Background Styles',
				themes: 'General Pro Themes',
			};

			$.alert( {
				backgroundDismiss: true,
				title: feature + ' ' + wpforms_education.upgrade[ type ].title_plural,
				icon: 'fa fa-lock',
				content: message,
				boxWidth: '550px',
				theme: 'modern,wpforms-education',
				closeIcon: true,
				onOpenBefore: function() { // eslint-disable-line object-shorthand
					this.$btnc.after( '<div class="discount-note">' + wpforms_education.upgrade_bonus + '</div>' );
					this.$btnc.after( wpforms_education.upgrade[ type ].doc.replace( /%25name%25/g, 'AP - ' + feature ) );
					this.$body.find( '.jconfirm-content' ).addClass( 'lite-upgrade' );
				},
				buttons: {
					confirm: {
						text: wpforms_education.upgrade[ type ].button,
						btnClass: 'btn-confirm',
						keys: [ 'enter' ],
						action: () => {
							window.open( WPFormsEducation.core.getUpgradeURL( utmContent[ panel ], type ), '_blank' );
							WPFormsEducation.core.upgradeModalThankYou( type );
						},
					},
				},
			} );
		},

		/**
		 * Open license modal.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} feature    Feature name.
		 * @param {string} fieldName  Field name.
		 * @param {string} utmContent UTM content.
		 */
		showLicenseModal( feature, fieldName, utmContent ) {
			WPFormsEducation.proCore.licenseModal( feature, fieldName, utmContent );
		},

		/**
		 * Run custom checks.
		 *
		 * @since 1.9.7
		 */
		runChecks() {
			app.checkForClassicStyles();

			if ( isPro && isLicenseActive && isModern && isFullStyles ) {
				app.checkForFormFeatures();
			}

			app.checkForOldFP();
		},

		/**
		 * Conditionally show/hide classic styles notice and block/unblock controls.
		 *
		 * @since 1.9.7
		 */
		checkForClassicStyles() {
			const $notice = $( '.wpforms-builder-themes-style-notice' );
			const $previewNotice = $( '.wpforms-builder-themes-preview-notice' );

			if ( ! isModern || ! isFullStyles ) {
				app.blockAllSections();
				$notice.removeClass( 'wpforms-hidden' );
				$previewNotice.addClass( 'wpforms-hidden' );
			}
		},

		/**
		 * Check both Lead Forms and Conversational Forms states and update the UI accordingly.
		 *
		 * @since 1.9.7
		 */
		checkForFormFeatures() {
			const $LFSwitch = $( '#wpforms-panel-field-lead_forms-enable' );
			const $CFSwitch = $( '#wpforms-panel-field-settings-conversational_forms_enable' );
			const isLFEnabled = $LFSwitch.prop( 'checked' ) ?? false;
			const isCFEnabled = $CFSwitch.prop( 'checked' ) ?? false;
			const $LFNotice = $( '.wpforms-builder-themes-lf-notice' );
			const $CFNotice = $( '.wpforms-builder-themes-cf-notice' );
			const $previewNotice = $( '.wpforms-builder-themes-preview-notice' );

			// Handle Lead Forms notice visibility
			if ( isLFEnabled ) {
				$LFNotice.removeClass( 'wpforms-hidden' );
			} else {
				$LFNotice.addClass( 'wpforms-hidden' );
			}

			// Handle Conversational Forms notice visibility
			if ( isCFEnabled ) {
				$CFNotice.removeClass( 'wpforms-hidden' );
			} else {
				$CFNotice.addClass( 'wpforms-hidden' );
			}

			// If either feature is enabled, hide preview and block sections
			if ( isLFEnabled || isCFEnabled ) {
				$previewNotice.addClass( 'wpforms-hidden' );
				el.$preview.addClass( 'wpforms-hidden' );
				app.blockAllSections();
			} else {
				// Only if both features are disabled, show preview and unblock sections
				el.$preview.removeClass( 'wpforms-hidden' );
				if ( isModern && isFullStyles ) {
					app.blockAllSections( true );
					$previewNotice.removeClass( 'wpforms-hidden' );
				}
			}

			// Set up event handlers if they haven't been set up yet
			app.setupFormFeatureEventHandlers();
		},

		/**
		 * Set up event handlers for Lead Forms and Conversational Forms switches.
		 *
		 * @since 1.9.7
		 */
		setupFormFeatureEventHandlers() {
			// Set up notice link handlers
			$( '.wpforms-builder-themes-lf-notice a' ).off( 'click', app.openLFSettings ).on( 'click', app.openLFSettings );
			$( '.wpforms-builder-themes-cf-notice a' ).off( 'click', app.openCFSettings ).on( 'click', app.openCFSettings );
		},

		/**
		 * Shows the notice if the Form Pages addons version is low.
		 *
		 * @since 1.9.7
		 */
		checkForOldFP() {
			const $FPContent = $( '#wpforms-form-pages-content-block' );
			const $notice = $( '#wpforms-page-forms-fbst-notice' );

			if ( $FPContent.length ) {
				if ( isLowFormPagesVersion ) {
					$FPContent.prepend( $notice );
					$notice.removeClass( 'wpforms-hidden' );
				}
			}
		},

		/**
		 * Open the Lead Forms settings page.
		 *
		 * @since 1.9.7
		 *
		 * @param {Object} event Event object.
		 */
		openLFSettings( event ) {
			app.handleClosePreviewSidebar( event );

			$( 'a.wpforms-panel-sidebar-section-lead_forms' ).click();
		},

		/**
		 * Open the Conversational Forms settings page.
		 *
		 * @since 1.9.7
		 *
		 * @param {Object} event Event object.
		 */
		openCFSettings( event ) {
			app.handleClosePreviewSidebar( event );

			$( 'a.wpforms-panel-sidebar-section-conversational_forms' ).click();
		},

		/**
		 * Determine if the user is on a Mac.
		 *
		 * @return {boolean} True if the user is on a Mac.
		 */
		isMac() {
			return navigator.userAgent.includes( 'Macintosh' );
		},
	};

	return app;
}
