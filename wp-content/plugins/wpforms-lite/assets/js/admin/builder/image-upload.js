/* global WPFormsUtils, wpf, wpforms_builder */

// noinspection ES6ConvertVarToLetConst
/**
 * WPForms Image Upload Control for Builder Settings.
 *
 * @since 1.9.7.3
 */

var WPForms = window.WPForms || {}; // eslint-disable-line no-var
WPForms.Admin = WPForms.Admin || {};
WPForms.Admin.Builder = WPForms.Admin.Builder || {};
WPForms.Admin.Builder.Settings = WPForms.Admin.Builder.Settings || {};

/**
 * Image Upload functionality for Settings.
 *
 * @since 1.9.7.3
 */
WPForms.Admin.Builder.Settings.ImageUpload = WPForms.Admin.Builder.Settings.ImageUpload || ( function( document, window, $ ) {
	/**
	 * Image Upload Control methods and properties.
	 *
	 * @since 1.9.7.3
	 *
	 * @type {Object}
	 */
	const app = {

		/**
		 * Start the engine.
		 *
		 * @since 1.9.7.3
		 */
		init() {
			$( document ).ready( app.ready );
		},

		/**
		 * Document ready.
		 *
		 * @since 1.9.7.3
		 */
		ready() {
			app.$builder = $( '#wpforms-builder' );

			app.bindEvents();
		},

		/**
		 * Bind events.
		 *
		 * @since 1.9.7.3
		 */
		bindEvents() {
			$( document ).on( 'click', '.wpforms-image-upload-button', app.openMediaUploader );
			$( document ).on( 'click', '.wpforms-image-remove-button', app.removeImage );
		},

		/**
		 * Open media uploader when upload button is clicked.
		 *
		 * @since 1.9.7.3
		 *
		 * @param {Object} e Event object.
		 */
		openMediaUploader( e ) {
			e.preventDefault();

			const $control = $( this ).closest( '.wpforms-image-upload-control' );
			const controlId = $control.attr( 'id' );

			app.frames = app.frames ?? {};

			// If the media frame already exists, reopen it.
			if ( app.frames[ controlId ] ) {
				app.frame = app.frames[ controlId ];
				app.frame.open();
				return;
			}

			// Create a new media frame.
			app.frame = wpf.initMediaLibrary( {
				extensions: wpforms_builder.upload_image_extensions,
				extensionsError: wpforms_builder.upload_image_extensions_error,
				buttonText: wpforms_builder.upload_image_button,
			} );

			// When an image is selected in the media frame.
			app.frame.on( 'select', function() {
				// Get media attachment details.
				const attachment = app.frame.state().get( 'selection' ).first().toJSON();

				// Set image to the control.
				app.setImage( $control, attachment );
			} );

			// Finally, open the modal.
			app.frame.open();

			// Store the frame.
			app.frames[ controlId ] = app.frame;
		},

		/**
		 * Get control elements.
		 *
		 * @since 1.9.7.3
		 *
		 * @param {Object} $control Control element.
		 *
		 * @return {Object} Control elements.
		 */
		getControlElements( $control ) {
			return {
				$control,
				$idField: $control.find( '.wpforms-image-upload-id' ),
				$urlField: $control.find( '.wpforms-image-upload-url' ),
				$preview: $control.find( '.wpforms-image-preview img' ),
				$uploadBtn: $control.find( '.wpforms-image-upload-button' ),
				$removeBtn: $control.find( '.wpforms-image-remove-button' ),
			};
		},

		/**
		 * Set image to the control.
		 *
		 * @since 1.9.7.3
		 *
		 * @param {jQuery} $control   Control element.
		 * @param {Object} attachment Attachment data.
		 */
		setImage( $control, attachment ) {
			// Get control elements.
			const { $idField, $urlField, $preview, $uploadBtn, $removeBtn } = app.getControlElements( $control );

			// Update preview.
			$preview.attr( 'src', attachment.url );

			// Update fields.
			$idField.val( attachment.id );
			$urlField.val( attachment.url );

			// Toggle buttons
			$uploadBtn.addClass( 'wpforms-hidden' );
			$removeBtn.removeClass( 'wpforms-hidden' );

			// Trigger custom change event.
			WPFormsUtils.triggerEvent( app.$builder, 'wpformsImageUploadChange', [ $control, attachment ] );
		},

		/**
		 * Remove image when remove button is clicked.
		 *
		 * @since 1.9.7.3
		 *
		 * @param {Object} e Event object.
		 */
		removeImage( e ) {
			e.preventDefault();

			const $control = $( this ).closest( '.wpforms-image-upload-control' );
			const { $idField, $urlField, $preview, $uploadBtn, $removeBtn } = app.getControlElements( $control );

			// Reset preview.
			$preview.attr( 'src', '' );

			// Clear fields.
			$idField.val( '' );
			$urlField.val( '' );

			// Toggle buttons.
			$uploadBtn.removeClass( 'wpforms-hidden' );
			$removeBtn.addClass( 'wpforms-hidden' );

			// Trigger custom change event.
			WPFormsUtils.triggerEvent( app.$builder, 'wpformsImageUploadChange', [ $control, null ] );
		},
	};

	return app;
}( document, window, jQuery ) );

// Initialize.
WPForms.Admin.Builder.Settings.ImageUpload.init();
