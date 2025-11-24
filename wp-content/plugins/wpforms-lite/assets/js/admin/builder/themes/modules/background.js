/**
 * WPForms Form Builder Themes: Background module.
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

			WPFormsBuilderThemes.store.subscribe( 'backgroundUrl', ( value ) => {
				app.setImagePreview( value );
				app.maybeShowChooseButton();
			} );

			WPFormsBuilderThemes.store.subscribe( 'backgroundImage', ( value ) => {
				app.maybeShowImageSelector( value );
				app.maybeShowChooseButton();
			} );

			WPFormsBuilderThemes.store.subscribe( 'backgroundSizeMode', ( value ) => {
				app.handleSizeFromDimensions( value );
			} );
		},

		/**
		 * Setup.
		 *
		 * @since 1.9.7
		 */
		setup() {
			el.$builder = $( '#wpforms-builder' );
			el.$preview = $( '#wpforms-builder-themes-preview' );
			el.$imageSelector = $( '.wpforms-builder-themes-background-selector' );
			el.$imagePreview = el.$imageSelector.find( '.wpforms-builder-themes-bg-image-preview' );
			el.$chooseButton = el.$imageSelector.find( '.wpforms-builder-themes-bg-image-choose' );
			el.$removeButton = el.$imageSelector.find( '.wpforms-builder-themes-bg-image-remove' );

			app.initImageSelector();
		},

		/**
		 * Events.
		 *
		 * @since 1.9.7
		 */
		events() {
			el.$builder
				.on( 'click', '.wpforms-builder-themes-bg-image-remove', app.removeImage )
				.on( 'click', '.wpforms-builder-themes-bg-image-choose, .wpforms-builder-themes-bg-image-preview', app.chooseImage );
		},

		/**
		 * Init the Image Selector control.
		 *
		 * @since 1.9.7
		 */
		initImageSelector() {
			const settings = WPFormsBuilderThemes.getSettings();

			el.$imageSelector.removeClass( 'wpforms-hidden' );

			app.setImagePreview( settings.backgroundUrl );
			app.maybeShowChooseButton();
		},

		/**
		 * Handle image selector control state.
		 *
		 * @since 1.9.7
		 * @param {string} value `backgroundImage` setting value.
		 */
		maybeShowImageSelector( value ) {
			if ( value === 'none' ) {
				el.$imageSelector.addClass( 'wpforms-hidden' );
			} else {
				el.$imageSelector.removeClass( 'wpforms-hidden' );

				const backgroundUrl = WPFormsBuilderThemes.store.get( 'backgroundUrl' );

				// Here we need to clean the url value and set a new one.
				// Otherwise, the picture preview won't be updated.
				WPFormsBuilderThemes.store.set( 'backgroundUrl', 'url()' );
				WPFormsBuilderThemes.store.set( 'backgroundUrl', backgroundUrl );
			}
		},

		/**
		 * Remove an image button handler.
		 *
		 * @param {Object} e Event object
		 *
		 * @since 1.9.7
		 */
		removeImage( e ) {
			e.preventDefault();
			WPFormsBuilderThemes.store.set( 'backgroundUrl', 'url()' );
			el.$chooseButton.removeClass( 'wpforms-hidden' );
		},

		/**
		 * Choose an image button handler.
		 *
		 * @param {Object} e Event object
		 *
		 * @since 1.9.7
		 */
		chooseImage( e ) {
			e.preventDefault();
			const settings = WPFormsBuilderThemes.getSettings();

			if ( settings.backgroundImage === 'library' ) {
				app.openMediaLibrary();
			} else {
				WPFormsBuilderThemes.stockPhotos.openModal( 'bg-styles' );
			}

			app.maybeShowChooseButton();
		},

		/**
		 * Set the image preview.
		 *
		 * @param {null|string} value Image preview url value.
		 *
		 * @since 1.9.7
		 */
		setImagePreview( value = null ) {
			const isHidden = ! value || value === 'url()';
			const imageValue = isHidden ? 'url()' : `url(${ value })`;

			el.$imagePreview.css( 'background-image', imageValue );
			el.$imagePreview.toggleClass( 'wpforms-hidden', isHidden );
			el.$removeButton.toggleClass( 'wpforms-hidden', isHidden );
		},

		/**
		 * Conditionally show or hide the `Choose Image` button.
		 *
		 * @since 1.9.7
		 */
		maybeShowChooseButton() {
			const settings = WPFormsBuilderThemes.getSettings();

			if ( settings.backgroundImage !== 'none' && settings.backgroundUrl === 'url()' ) {
				el.$chooseButton.removeClass( 'wpforms-hidden' );
			} else {
				el.$chooseButton.addClass( 'wpforms-hidden' );
			}
		},

		/**
		 * Open media library modal and handle image selection.
		 *
		 * @since 1.9.7
		 */
		openMediaLibrary() {
			const frame = wp.media( {
				multiple: false,
				library: {
					type: 'image',
				},
			} );

			frame.on( 'select', () => {
				const attachment = frame.state().get( 'selection' ).first().toJSON();

				if ( attachment.url ) {
					WPFormsBuilderThemes.store.set( 'backgroundUrl', attachment.url );
				}
			} );

			frame.open();
		},

		/**
		 * Handle the real size from image dimensions.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} value Value.
		 */
		handleSizeFromDimensions( value ) {
			const settings = WPFormsBuilderThemes.getSettings();
			const $container = el.$preview.find( '.wpforms-container' )[ 0 ];
			const backgroundWidth = WPFormsBuilderThemes.common.prepareComplexAttrValues( settings.backgroundWidth, 'backgroundWidth' );
			const backgroundHeight = WPFormsBuilderThemes.common.prepareComplexAttrValues( settings.backgroundHeight, 'backgroundHeight' );
			const $backgroundSizeControl = WPFormsBuilderThemes.getControls( 'backgroundSize' );

			if ( value === 'cover' ) {
				app.setContainerBackgroundWidth( $container, backgroundWidth );
				app.setContainerBackgroundHeight( $container, backgroundHeight );

				$container.style.setProperty( `--wpforms-background-size`, 'cover' );
				$backgroundSizeControl.val( 'cover' );
			} else {
				$container.style.setProperty( `--wpforms-background-size`, backgroundWidth + ' ' + backgroundHeight );
				$backgroundSizeControl.val( backgroundWidth + ' ' + backgroundHeight );
			}

			$backgroundSizeControl.trigger( 'input' );
		},

		/**
		 * Handle real size from height.
		 *
		 * @since 1.9.7
		 *
		 * @param {HTMLElement} container Form preview container
		 * @param {string}      value     Value.
		 * @param {Object}      atts      Form style settings.
		 */
		handleSizeFromHeight( container, value, atts ) {
			const backgroundWidth = WPFormsBuilderThemes.common.prepareComplexAttrValues( atts.backgroundWidth, 'backgroundWidth' );
			const $backgroundSizeControl = WPFormsBuilderThemes.getControls( 'backgroundSize' );

			app.setContainerBackgroundHeight( container, value );

			if ( atts.backgroundSizeMode !== 'cover' ) {
				$backgroundSizeControl.val( backgroundWidth + ' ' + value );
				container.style.setProperty( `--wpforms-background-size`, backgroundWidth + ' ' + value );
				$backgroundSizeControl.trigger( 'input' );
			}
		},

		/**
		 * Handle real size from width.
		 *
		 * @since 1.9.7
		 *
		 * @param {HTMLElement} container Form preview container
		 * @param {string}      value     Value.
		 * @param {Object}      atts      Form style settings.
		 */
		handleSizeFromWidth( container, value, atts ) {
			const backgroundWidth = WPFormsBuilderThemes.common.prepareComplexAttrValues( atts.backgroundWidth, 'backgroundWidth' );
			const backgroundHeight = WPFormsBuilderThemes.common.prepareComplexAttrValues( atts.backgroundHeight, 'backgroundHeight' );
			const $backgroundSizeControl = WPFormsBuilderThemes.getControls( 'backgroundSize' );

			app.setContainerBackgroundWidth( container, backgroundWidth );

			if ( atts.backgroundSizeMode !== 'cover' ) {
				$backgroundSizeControl.val( value + ' ' + backgroundHeight );
				container.style.setProperty( `--wpforms-background-size`, value + ' ' + backgroundHeight );
				$backgroundSizeControl.trigger( 'input' );
			}
		},

		/**
		 * Set the container background color.
		 *
		 * @since 1.9.7
		 *
		 * @param {HTMLElement} container Container element.
		 * @param {string}      value     Value.
		 */
		setBackgroundColor( container, value ) {
			container.style.setProperty( `--wpforms-background-color`, value );
		},

		/**
		 * Set the container background url.
		 *
		 * @since 1.9.7
		 *
		 * @param {HTMLElement} container Container element.
		 * @param {string}      value     Value.
		 */
		setBackgroundUrl( container, value ) {
			container.style.setProperty( `--wpforms-background-url`, value );
		},

		/**
		 * Set the container background height.
		 *
		 * @since 1.9.7
		 *
		 * @param {HTMLElement} container Container element.
		 * @param {string}      value     Value.
		 */
		setContainerBackgroundHeight( container, value ) {
			container.style.setProperty( `--wpforms-background-height`, value );
		},

		/**
		 * Set the container background image.
		 *
		 * @since 1.9.7
		 *
		 * @param {HTMLElement} container Container element.
		 * @param {string}      value     Value.
		 */
		setContainerBackgroundImage( container, value ) {
			if ( value === 'none' ) {
				container.style.setProperty( `--wpforms-background-url`, 'url()' );
			}
		},

		/**
		 * Set the container background position.
		 *
		 * @since 1.9.7
		 *
		 * @param {HTMLElement} container Container element.
		 * @param {string}      value     Value.
		 */
		setContainerBackgroundPosition( container, value ) {
			container.style.setProperty( `--wpforms-background-position`, value );
		},

		/**
		 * Set container background repeat.
		 *
		 * @since 1.9.7
		 *
		 * @param {HTMLElement} container Container element.
		 * @param {string}      value     Value.
		 */
		setContainerBackgroundRepeat( container, value ) {
			container.style.setProperty( `--wpforms-background-repeat`, value );
		},

		/**
		 * Set the container background width.
		 *
		 * @since 1.9.7
		 *
		 * @param {HTMLElement} container Container element.
		 * @param {string}      value     Value.
		 */
		setContainerBackgroundWidth( container, value ) {
			container.style.setProperty( `--wpforms-background-width`, value );
		},
	};

	return app;
}
