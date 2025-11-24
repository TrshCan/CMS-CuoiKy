/* global wpforms_builder, WPFormsBuilder */

// noinspection ES6ConvertVarToLetConst
var WPForms = window.WPForms || {}; // eslint-disable-line no-var
WPForms.Admin = WPForms.Admin || {};
WPForms.Admin.Builder = WPForms.Admin.Builder || {};

/**
 * Multiple Choices functionality.
 *
 * @since 1.9.8.3
 */
WPForms.Admin.Builder.MultipleChoices = WPForms.Admin.Builder.MultipleChoices || ( function( document, window, $ ) {
	/**
	 * Multiple Choices methods and properties.
	 *
	 * @since 1.9.8.3
	 *
	 * @type {Object}
	 */
	const app = {

		/**
		 * Start the engine.
		 *
		 * @since 1.9.8.3
		 */
		init() {
			$( app.ready );
		},

		/**
		 * Init.
		 *
		 * @since 1.9.8.3
		 */
		ready() {
			app.bindEvents();
		},

		/**
		 * Bind actions.
		 *
		 * @since 1.9.8.3
		 */
		// eslint-disable-next-line max-lines-per-function
		bindEvents() {
			// Cache builder element.
			app.$builder = $( '#wpforms-builder' );

			// Switch Add other option toggle.
			app.$builder.on( 'change', '.wpforms-field-option-row-choices_other input', app.toggleOtherOption );

			// Real-time update Other input placeholder in preview.
			app.$builder.on( 'input', '.wpforms-field-option-row-other_placeholder input', app.updateOtherOptionPlaceholder );

			// Real-time update Other input size in preview.
			app.$builder.on( 'change', '.wpforms-field-option-row-other_size select', app.updateOptionInputFieldSize );

			// When AI inserts choices, append the Other choice if the toggle is enabled.
			$( document ).on( 'wpformsAIModalAfterChoicesInsert', app.appendOtherOption );

			// Real-time preview Other input value while typing in the Other choice Value when Show Values is enabled.
			app.$builder.on( 'input', '.wpforms-field-option-row-choices li.wpforms-choice-other-option input.value', app.updateOptionInputPreview );

			// When Dynamic Choices is toggled ON, force-disable Other option.
			app.$builder.on( 'change', '.wpforms-field-option-row-dynamic_choices select', app.toggleDynamicChoices );

			app.$builder.on( 'wpformsChoicesSetDefault', app.updateDefaultOptionState );
		},

		/**
		 * Updates the preview of the "Other" input field in a form field based on the updated option value.
		 * This method checks if the "Show Values" option is enabled, fetches the current value from the input field,
		 * and updates the corresponding preview input with the value or a placeholder.
		 *
		 * @since 1.9.8.3
		 */
		updateOptionInputPreview() {
			const $val = $( this );
			const $list = $val.closest( '.choices-list' );
			const fieldID = $list.data( 'field-id' );
			const $options = $( '#wpforms-field-option-' + fieldID );
			const showValuesOn = $options.find( '.wpforms-field-option-row-show_values input' ).is( ':checked' );

			if ( ! showValuesOn ) {
				return;
			}
			const value = $val.val();
			const $preview = $( '#wpforms-field-' + fieldID );
			const $otherInput = $preview.find( '.wpforms-other-input' );
			const placeholder = $options.find( '.wpforms-field-option-row-other_placeholder input' ).val() || '';
			$otherInput.val( value ?? placeholder );
		},

		/**
		 * Updates the size of an option input field based on its selected value.
		 *
		 * This method retrieves the selected value of a dropdown associated with an option input field,
		 * determines its size, and applies the updated size to the respective container using the application logic.
		 *
		 * @since 1.9.8.3
		 */
		updateOptionInputFieldSize() {
			const $select = $( this );
			const fieldID = $select.closest( '.wpforms-field-option-row' ).data( 'field-id' );
			const val = $select.val() || 'medium';
			app.setOtherSizeOnContainer( fieldID, val );
		},

		/**
		 * Updates the default option state for a choice field, particularly handling behavior for Radio fields
		 * and the "Other" choice option. Manages UI adjustments, such as showing or hiding the "Other" input field
		 * in the preview based on the selected default option.
		 *
		 * @since 1.9.8.3
		 *
		 * @param {Event}       e  The event object triggered during the state change.
		 * @param {HTMLElement} el The HTML element representing the choice being toggled.
		 */
		updateDefaultOptionState( e, el ) {
			const $this = $( el ),
				$choicesList = $this.closest( '.choices-list' ),
				fieldType = $choicesList.data( 'field-type' );

			if ( fieldType !== 'radio' ) {
				return;
			}

			const fieldId = $choicesList.data( 'field-id' );

			// If toggling default for Radio field's Other choice, show/hide preview Other input accordingly.
			const $li = $this.closest( 'li' ),
				$previewField = $( '#wpforms-field-' + fieldId ),
				$otherInput = $previewField.find( '.wpforms-other-input' );

			if ( ! $li.hasClass( 'wpforms-choice-other-option' ) ) {
				$otherInput.addClass( 'wpforms-hidden' ).val( '' );
				return;
			}

			// Toggle visibility based on whether this radio is checked.
			const checked = $this.is( ':checked' );
			$otherInput.toggleClass( 'wpforms-hidden', ! checked );
		},

		/**
		 * Toggles the "Other" option functionality in the options interface of a form field.
		 * This includes adding or removing the "Other" choice, updating its placeholder and size options,
		 * and updating the preview state accordingly.
		 *
		 * @since 1.9.8.3
		 *
		 * @param {Event} e The event object triggered during the state change.
		 */
		toggleOtherOption( e ) {
			const $this = $( this ),
				$optionRow = $this.closest( '.wpforms-field-option-row' ),
				fieldID = $optionRow.data( 'field-id' ),
				$fieldOptions = $( '#wpforms-field-option-' + fieldID ),
				checked = $this.is( ':checked' ),
				type = $fieldOptions.find( '.wpforms-field-option-hidden-type' ).val(),
				$choicesList = $( '#wpforms-field-option-row-' + fieldID + '-choices .choices-list' );

			let id = $choicesList.attr( 'data-next-id' );

			if ( checked ) {
				app.fieldChoiceAddOther( e, $( this ), id );
				id++;
				$choicesList.attr( 'data-next-id', id );
			} else {
				$choicesList.find( 'li.wpforms-choice-other-option' ).remove();
				$( '#wpforms-field-' + fieldID ).find( '.wpforms-other-input' ).addClass( 'wpforms-hidden' );
			}

			// Toggle the visibility of the Other Placeholder and Field Size option rows.
			$fieldOptions.find( '.wpforms-field-option-row-other_placeholder' ).toggleClass( 'wpforms-hidden', ! checked );
			$fieldOptions.find( '.wpforms-field-option-row-other_size' ).toggleClass( 'wpforms-hidden', ! checked );

			// Apply/remove container size class accordingly.
			if ( checked ) {
				const sizeVal = $fieldOptions.find( '.wpforms-field-option-row-other_size select' ).val() || 'medium';
				app.setOtherSizeOnContainer( fieldID, sizeVal );
			} else {
				app.setOtherSizeOnContainer( fieldID, null );
			}

			// Update preview.
			WPFormsBuilder.fieldChoiceUpdate( type, fieldID );
			app.updatePreviewState( fieldID );
		},

		/**
		 * Toggles the placeholder attribute of the "other" input field in a form preview
		 * based on the value from the corresponding field option settings.
		 *
		 * Finds the relevant field ID based on the context of the input element, and
		 * updates the placeholder text of the "other" input field in the preview if it exists.
		 *
		 * @return {void} Does not return a value.
		 */
		updateOtherOptionPlaceholder() {
			const $input = $( this );
			const fieldID = $input.closest( '.wpforms-field-option-row' ).data( 'field-id' );
			const value = $input.val();
			const $previewOther = $( '#wpforms-field-' + fieldID + ' .wpforms-other-input' );
			if ( $previewOther.length ) {
				$previewOther.attr( 'placeholder', value );
			}
		},

		/**
		 * Toggles the state of dynamic choices for a select input field.
		 * Verifies if a selected value exists, performs operations on associated field options,
		 * and updates the preview state based on user interaction.
		 *
		 * @since 1.9.8.3
		 *
		 * @return {void} Does not return a value.
		 */
		toggleDynamicChoices() {
			const $select = $( this );
			const dynamicOn = $select.val() !== '';
			if ( ! dynamicOn ) {
				return;
			}
			const fieldID = $select.closest( '.wpforms-field-option-row' ).data( 'field-id' );
			const $fieldOptions = $( '#wpforms-field-option-' + fieldID );
			const $otherToggle = $fieldOptions.find( '.wpforms-field-option-row-choices_other input' );

			if ( $otherToggle.is( ':checked' ) ) {
				$otherToggle.prop( 'checked', false ).trigger( 'change' );
			}

			app.updatePreviewState( fieldID );
		},

		/**
		 * Create a new "Other" choice element.
		 *
		 * @since 1.9.8.3
		 *
		 * @param {jQuery} $choicesList The choices list container.
		 * @param {string} fieldID      Field ID.
		 * @param {number} key          Next choice key.
		 *
		 * @return {jQuery} The cloned and prepared Other choice element.
		 */
		createOtherChoice( $choicesList, fieldID, key ) {
			const $last = $choicesList.children( 'li' ).last();
			const $clone = $last.clone();

			const otherLabel = wpforms_builder.other;

			$clone.attr( 'data-key', key );
			$clone.find( 'input.label' ).val( otherLabel ).attr( 'name', `fields[${ fieldID }][choices][${ key }][label]` );
			$clone.find( 'input.value' ).val( '' ).attr( 'name', `fields[${ fieldID }][choices][${ key }][value]` );
			$clone.find( '.wpforms-image-upload input.source' ).val( '' ).attr( 'name', `fields[${ fieldID }][choices][${ key }][image]` );
			$clone.find( '.wpforms-icon-select input.source-icon' ).val( wpforms_builder.icon_choices.default_icon ).attr( 'name', `fields[${ fieldID }][choices][${ key }][icon]` );
			$clone.find( '.wpforms-icon-select input.source-icon-style' ).val( wpforms_builder.icon_choices.default_icon_style ).attr( 'name', `fields[${ fieldID }][choices][${ key }][icon_style]` );
			$clone.find( '.wpforms-icon-select .ic-fa-preview' ).removeClass().addClass( `ic-fa-preview ic-fa-${ wpforms_builder.icon_choices.default_icon_style } ic-fa-${ wpforms_builder.icon_choices.default_icon }` );
			$clone.find( '.wpforms-icon-select .ic-fa-preview + span' ).text( wpforms_builder.icon_choices.default_icon );
			$clone.find( 'input.default' ).attr( 'name', `fields[${ fieldID }][choices][${ key }][default]` ).prop( 'checked', false );
			$clone.find( '.preview' ).empty();
			$clone.find( '.wpforms-image-upload-add' ).show();

			// Mark as special "Other" item for clarity and sorting prevention.
			$clone.addClass( 'wpforms-choice-other-option not-draggable' );
			$clone.find( '.move, .add, .remove' ).addClass( 'wpforms-disabled' );

			// Add hidden input flag to identify this choice as "Other".
			$clone.find( 'input.other-flag' ).remove();
			$clone.append(
				`<input type="hidden" class="other-flag" name="fields[${ fieldID }][choices][${ key }][other]" value="1">`
			);

			return $clone;
		},

		/**
		 * Add Other choice to a field.
		 *
		 * @since 1.9.8.3
		 *
		 * @param {Event|null} event Event object.
		 * @param {Element}    el    The toggle element.
		 * @param {number}     key   Next choice key.
		 */
		fieldChoiceAddOther( event, el, key ) {
			const $optionRow = $( el ).closest( '.wpforms-field-option-row' );
			const fieldID = $optionRow.data( 'field-id' );
			const $choicesList = $( `#wpforms-field-option-row-${ fieldID }-choices .choices-list` );

			const $clone = app.createOtherChoice( $choicesList, fieldID, key );
			$choicesList.append( $clone );
		},

		/**
		 * Append Other option at the end of the choices list when toggle is on.
		 *
		 * @since 1.9.8.3
		 *
		 * @param {Object} event Event object.
		 */
		appendOtherOption( event ) {
			const fieldId = event?.detail?.fieldId;
			const $fieldOptions = $( `#wpforms-field-option-${ fieldId }` );
			const $toggle = $fieldOptions.find( '.wpforms-field-option-row-choices_other input' );

			if ( ! $toggle.length || ! $toggle.is( ':checked' ) ) {
				return;
			}

			const $choicesList = $( `#wpforms-field-option-row-${ fieldId }-choices .choices-list` );

			// Prevent duplicate Other choice.
			if ( $choicesList.find( 'li.wpforms-choice-other-option' ).length > 0 ) {
				return;
			}

			let nextId = parseInt( $choicesList.attr( 'data-next-id' ), 10 );
			nextId = isNaN( nextId ) ? 1 : nextId;

			const $clone = app.createOtherChoice( $choicesList, fieldId, nextId );
			$choicesList.append( $clone );
			$choicesList.attr( 'data-next-id', nextId + 1 );

			const type = $fieldOptions.find( '.wpforms-field-option-hidden-type' ).val();
			WPFormsBuilder.fieldChoiceUpdate( type, fieldId );
		},

		/**
		 * Set size for the container of other option to reach the correct style changes.
		 *
		 * @since 1.9.8.3
		 *
		 * @param {string} fieldId Field ID.
		 * @param {string} size    The size.
		 */
		setOtherSizeOnContainer( fieldId, size ) {
			const $container = $( '#wpforms-field-' + fieldId + '.wpforms-field-radio' );

			$container.removeClass( 'size-small size-medium size-large' );

			if ( size ) {
				$container.addClass( 'size-' + size );
			}
		},

		/**
		 * Show other input on the preview.
		 *
		 * @since 1.9.8.3
		 *
		 * @param {jQuery} $field A field or list of fields.
		 */
		showPreviewOther( $field ) {
			const $otherInput = $field.find( '.wpforms-other-input' );

			if ( ! $otherInput.length ) {
				return;
			}

			$otherInput.removeClass( 'wpforms-hidden' );

			const $otherRadio = $field.find( 'li.wpforms-other-choice input[type="radio"]' );

			if ( ! $otherRadio.length ) {
				return;
			}

			$otherRadio.val( $otherInput.val() );
		},

		/**
		 * Hide other input on the preview.
		 *
		 * @since 1.9.8.3
		 *
		 * @param {jQuery} $field A field or list of fields.
		 */
		hidePreviewOther( $field ) {
			const $otherInput = $field.find( '.wpforms-other-input' );

			if ( ! $otherInput.length ) {
				return;
			}

			$otherInput.addClass( 'wpforms-hidden' ).val( '' );
		},

		/**
		 * Update other input preview state configuration changes.
		 *
		 * @since 1.9.8.3
		 *
		 * @param {number|string} fieldId Field ID.
		 */
		updatePreviewState( fieldId ) {
			const $options = $( '#wpforms-field-option-' + fieldId );
			const $preview = $( '#wpforms-field-' + fieldId );
			const addOtherOn = $options.find( '.wpforms-field-option-row-choices_other input' ).is( ':checked' );

			// 1. Handle Add Other toggle.
			if ( ! addOtherOn ) {
				app.hidePreviewOther( $preview );
				return;
			}

			// 2. Show/hide Other input in preview depending on radio state.
			const $otherRadio = $options.find( '.choices-list li.wpforms-choice-other-option input[type="radio"]' );
			if ( $otherRadio.length && $otherRadio.is( ':checked' ) ) {
				app.showPreviewOther( $preview );
			} else {
				app.hidePreviewOther( $preview );
			}

			// 3. Handle the Show Values toggle.
			const $otherInput = $preview.find( '.wpforms-other-input' );

			if ( ! $otherInput.length ) {
				return;
			}

			const showValuesOn = $options.find( '.wpforms-field-option-row-show_values input' ).is( ':checked' );
			const placeholder = $options.find( '.wpforms-field-option-row-other_placeholder input' ).val() || '';

			if ( ! showValuesOn ) {
				$otherInput.val( '' ).attr( 'placeholder', placeholder );
				return;
			}

			// 4. Sync value from choices into preview input.
			const val = $options.find( '.choices-list li.wpforms-choice-other-option input.value' ).val() || '';
			$otherInput.val( val ).attr( 'placeholder', placeholder );
		},
	};

	return app;
}( document, window, jQuery ) );

// Initialize.
WPForms.Admin.Builder.MultipleChoices.init();
