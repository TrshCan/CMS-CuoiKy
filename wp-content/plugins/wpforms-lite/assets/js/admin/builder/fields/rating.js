/**
 * WPForms Rating Field Builder Script
 *
 * @since 1.9.8
 */
var WPForms = window.WPForms || {}; // eslint-disable-line no-var

WPForms.Admin = WPForms.Admin || {};
WPForms.Admin.Builder = WPForms.Admin.Builder || {};

WPForms.Admin.Builder.FieldRating = WPForms.Admin.Builder.FieldRating || ( function( document, window, $ ) { // eslint-disable-line

	const app = {

		/**
		 * Initialize the application.
		 */
		init() {
			$( app.ready );
		},

		/**
		 * Called when the DOM is fully loaded.
		 */
		ready() {
			$( document )
				.on( 'input', '.wpforms-field-option-row-lowest_label input', app.updateLowestLabel )
				.on( 'input', '.wpforms-field-option-row-highest_label input', app.updateHighestLabel )
				.on( 'change', '.wpforms-field-option-row-label_position select', app.updateLabelPosition );
		},

		/**
		 * Update the lowest label in the preview when the input changes.
		 *
		 * @since 1.9.8
		 *
		 * @param {Event} event The input event.
		 */
		updateLowestLabel( event ) {
			app.updateLabel( event, 'lowest' );
		},

		/**
		 * Update the highest label in the preview when the input changes.
		 *
		 * @since 1.9.8
		 *
		 * @param {Event} event The input event.
		 */
		updateHighestLabel( event ) {
			app.updateLabel( event, 'highest' );
		},

		/**
		 * Update the label in the preview based on the input value.
		 *
		 * @since 1.9.8
		 *
		 * @param {Event}  event The input event.
		 * @param {string} type  The type of label being updated ('lowest' or 'highest').
		 */
		updateLabel( event, type ) {
			const $input = $( event.target ),
				label = $input.val(),
				$inputContainer = $input.closest( `.wpforms-field-option-row-${ type }_label` ),
				fieldId = $inputContainer.data( 'field-id' ),
				$previewField = $( `#wpforms-field-${ fieldId }` ),
				$previewLabel = $previewField.find( `.wpforms-rating-field-${ type }-label` );

			// Update the label in the preview.
			$previewLabel.text( label );

			// Show or hide the labels container based on whether any labels are set.
			app.toggleLabelsVisibility( $previewField );
		},

		/**
		 * Show or hide the labels container based on whether any labels are set.
		 *
		 * @since 1.9.8
		 *
		 * @param {jQuery} $previewField The jQuery object representing the preview field.
		 */
		toggleLabelsVisibility( $previewField ) {
			const labelsContainer = $previewField.find( '.wpforms-rating-field-labels' ),
				labels = labelsContainer.find( '.wpforms-sub-label' );

			const labelsArray = labels.map( ( _, el ) => $( el ).text() ).get(),
				filteredLabels = labelsArray.filter( ( ratingLabel ) => ratingLabel.trim() !== '' );

			labelsContainer.toggleClass( 'wpforms-hidden', filteredLabels.length === 0 );
		},

		/**
		 * Update the label position in the preview when the select changes.
		 *
		 * @since 1.9.8
		 *
		 * @param {Event} event The change event.
		 */
		updateLabelPosition( event ) {
			const $select = $( event.target ),
				labelPosition = $select.val(),
				$inputContainer = $select.closest( '.wpforms-field-option-row-label_position' ),
				fieldId = $inputContainer.data( 'field-id' ),
				$previewField = $( `#wpforms-field-${ fieldId }` );

			// Remove existing label position classes.
			$previewField.find( '.wpforms-rating-field-labels' ).toggleClass( 'wpforms-rating-field-labels-position-above', labelPosition === 'above' );
		},
	};

	return app;
}( document, window, jQuery ) ); // eslint-disable-line no-undef

// Initialize the application.
WPForms.Admin.Builder.FieldRating.init();
