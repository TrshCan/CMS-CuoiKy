/* global wpforms_builder, WPFormsUtils, wpf */

/**
 * @param wpforms_builder.add_custom_value_label
 * @param wpforms_builder.select_field
 */

// noinspection ES6ConvertVarToLetConst
/**
 * Form Builder Field Map.
 *
 * @since 1.9.5
 */
var WPForms = window.WPForms || {}; // eslint-disable-line no-var

WPForms.Admin = WPForms.Admin || {};
WPForms.Admin.Builder = WPForms.Admin.Builder || {};

WPForms.Admin.Builder.FieldMap = WPForms.Admin.Builder.FieldMap || ( function( document, window, $ ) {
	/**
	 * Elements holder.
	 *
	 * @since 1.9.5
	 *
	 * @type {Object}
	 */
	const el = {};

	/**
	 * Public functions and properties.
	 *
	 * @since 1.9.5
	 *
	 * @type {Object}
	 */
	const app = {

		/**
		 * Start the engine.
		 *
		 * @since 1.9.5
		 */
		init() {
			$( app.ready );
		},

		/**
		 * DOM is fully loaded.
		 *
		 * @since 1.9.5
		 */
		ready() {
			app.setup();
			app.events();
		},

		/**
		 * Setup. Prepare some variables.
		 *
		 * @since 1.9.5
		 */
		setup() {
			// Cache DOM elements.
			el.$builder = $( '#wpforms-builder' );
		},

		/**
		 * Bind events.
		 *
		 * @since 1.9.5
		 */
		events() {
			// Field map table, update a key source.
			el.$builder.on( 'input', '.wpforms-field-map-table .key-source', function() {
				const value = $( this ).val(),
					$dest = $( this ).parent().parent().find( '.key-destination' ),
					name = $dest.data( 'name' );

				if ( value ) {
					$dest.attr( 'name', name.replace( '{source}', value.replace( /[^0-9a-zA-Z_-]/gi, '' ) ) );
				}
			} );

			// Field map table, delete row
			el.$builder.on( 'click', '.wpforms-field-map-table .remove', function( e ) {
				e.preventDefault();
				app.fieldMapTableDeleteRow( e, $( this ) );
			} );

			// Field map table, Add row
			el.$builder.on( 'click', '.wpforms-field-map-table .add', function( e ) {
				e.preventDefault();
				app.fieldMapTableAddRow( e, $( this ) );
			} );

			// Global select field mapping
			$( document ).on( 'wpformsFieldUpdate', app.fieldMapSelect );
		},

		/**
		 * Field map table - Delete row.
		 *
		 * @since 1.2.0
		 * @since 1.6.1.2 Registered `wpformsFieldMapTableDeletedRow` trigger.
		 *
		 * @param {Event}   e       Event.
		 * @param {Element} element Element.
		 */
		fieldMapTableDeleteRow( e, element ) {
			const $this = $( element ),
				$row = $this.closest( 'tr' ),
				$table = $this.closest( 'table' ),
				$block = $row.closest( '.wpforms-builder-settings-block' ),
				total = $table.find( 'tr' ).length;

			if ( total > '1' ) {
				$row.remove();

				el.$builder.trigger( 'wpformsFieldMapTableDeletedRow', [ $block ] );
			}
		},

		/**
		 * Field map table - Add row.
		 *
		 * @since 1.2.0
		 * @since 1.6.1.2 Registered `wpformsFieldMapTableAddedRow` trigger.
		 *
		 * @param {Event}   e       Event.
		 * @param {Element} element Element.
		 */
		fieldMapTableAddRow( e, element ) {
			const $this = $( element ),
				$row = $this.closest( 'tr' ),
				$block = $row.closest( '.wpforms-builder-settings-block' ),
				choice = $row.clone().insertAfter( $row );

			choice.find( 'input' ).val( '' );
			choice.find( 'select :selected' ).prop( 'selected', false );
			choice.find( '.key-destination' ).attr( 'name', '' );

			el.$builder.trigger( 'wpformsFieldMapTableAddedRow', [ $block, choice ] );
		},

		/**
		 * Update field mapped select items on form updates.
		 * Use data attributes to configure field mapping:
		 * - data-field-map-placeholder - A custom placeholder text shown in the select dropdown field.
		 * - data-field-map-allowed - Space-separated list of allowed field types (e.g. "email textarea"). Use "all-fields" to allow all available form fields.
		 * - data-field-map-allow-repeated-fields - Controls whether fields inside repeater blocks are included in the options (true/false).
		 * - data-custom-value-support - When true, adds a "Custom Value" option at the end of the dropdown list.
		 *
		 * @since 1.2.0
		 * @since 1.6.1.2 Registered `wpformsFieldSelectMapped` trigger.
		 * @since 1.9.7 Removed all passed arguments.
		 * @since 1.9.7 The list of fields is received via the `wpf.getFields` function.
		 * @since 1.9.7 Added multiple fields support.
		 */
		fieldMapSelect() {
			const event = WPFormsUtils.triggerEvent( el.$builder, 'wpformsBeforeFieldMapSelectUpdate' );

			// Allow callbacks on `wpformsBeforeFieldMapSelectUpdate` to cancel adding field
			// by triggering `event.preventDefault()`.
			if ( event.isDefaultPrevented() ) {
				return;
			}

			// eslint-disable-next-line complexity
			$( '.wpforms-field-map-select' ).each( function() {
				const $this = $( this );

				let placeholder = $this.data( 'field-map-placeholder' );

				// Check if a custom placeholder was provided.
				if ( typeof placeholder === 'undefined' || ! placeholder ) {
					placeholder = wpforms_builder.select_field;
				}

				let allowedFields = $this.data( 'field-map-allowed' );

				// If allowed, fields are not defined, bail.
				if ( typeof allowedFields === 'undefined' || ! allowedFields ) {
					return;
				}

				allowedFields = allowedFields.split( ' ' );
				allowedFields = $.inArray( 'all-fields', allowedFields ) >= 0 ? false : allowedFields;

				const isAllowedRepeatedFields = Boolean( $this.data( 'field-map-allow-repeated-fields' ) );
				const selectedValue = $this.val();
				const fields = wpf.getFields( allowedFields, true, isAllowedRepeatedFields );

				$this.empty();
				$this.append( $( '<option>', { value: '', text: placeholder } ) );

				if ( fields && ! $.isEmptyObject( fields ) ) {
					for ( const fieldID in fields ) {
						if ( ! fields[ fieldID ]?.id ) {
							continue;
						}

						const field = fields[ fieldID ];
						const label = wpf.sanitizeHTML( field?.label?.toString().trim() || wpforms_builder.field + ' #' + field.id );

						$this.append( $( '<option>', { value: field.id, text: label } ) );
					}
				}

				// Add a "Custom Value" option if it is supported.
				const customValueSupport = $this.data( 'custom-value-support' );

				if ( typeof customValueSupport === 'boolean' && customValueSupport ) {
					$this.append(
						$( '<option>', {
							value: 'custom_value',
							text: wpforms_builder.add_custom_value_label,
							class: 'wpforms-field-map-option-custom-value',
						} )
					);
				}

				if ( selectedValue ) {
					$this.val( selectedValue );
				}

				el.$builder.trigger( 'wpformsFieldSelectMapped', [ $this ] );
			} );
		},
	};

	// Provide access to public functions/properties.
	return app;
}( document, window, jQuery ) );

// Initialize.
WPForms.Admin.Builder.FieldMap.init();
