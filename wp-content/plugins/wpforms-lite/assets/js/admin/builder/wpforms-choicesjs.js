/* global wpforms_builder, Choices, wpf */

/**
 * @param wpforms_builder.no_pages_found
 */

// noinspection ES6ConvertVarToLetConst
/**
 * WPForms ChoicesJS utility methods for the Admin Builder.
 *
 * @since 1.7.9
 */
var WPForms = window.WPForms || {}; // eslint-disable-line no-var

WPForms.Admin = WPForms.Admin || {};
WPForms.Admin.Builder = WPForms.Admin.Builder || {};

WPForms.Admin.Builder.WPFormsChoicesJS = WPForms.Admin.Builder.WPFormsChoicesJS || ( function( document, window, $ ) {
	/**
	 * Public functions and properties.
	 *
	 * @since 1.7.9
	 *
	 * @type {Object}
	 */
	const app = {

		/**
		 * Set up the Select Page ChoicesJS instance.
		 *
		 * @since 1.7.9
		 *
		 * @param {Object} element       DOM Element where to init ChoicesJS.
		 * @param {Object} choicesJSArgs ChoicesJS init options.
		 * @param {Object} ajaxArgs      Object containing `action` and `nonce` to perform AJAX search.
		 *
		 * @return {Choices} ChoicesJS instance.
		 */
		setup( element, choicesJSArgs, ajaxArgs ) {
			let $element = $( element );
			let choicesJS = $element.data( 'choicesjs' );

			// Destroy existing choicesJS instance.
			if ( choicesJS ) {
				choicesJS.destroy();
			}

			// Remove choicesJS elements from the DOM for cloned instances.
			if ( $element.hasClass( 'choices__input' ) ) {
				const $choices = $element.closest( '.choices' );
				const $select = $element.detach()
					.removeClass( 'choices__input' )
					.data( 'choice', null )
					.attr( 'data-choice', null );

				$choices.replaceWith( $select );
				$element = $choices.prevObject;
				element = $element[ 0 ];
			}

			choicesJSArgs.searchEnabled = true;
			choicesJSArgs.allowHTML = false; // TODO: Remove after next Choices.js release.
			choicesJSArgs.searchChoices = ajaxArgs.nonce === null; // Enable searchChoices when not using AJAX.
			choicesJSArgs.renderChoiceLimit = -1;
			choicesJSArgs.noChoicesText = choicesJSArgs.noChoicesText || wpforms_builder.no_pages_found;
			choicesJSArgs.noResultsText = choicesJSArgs.noResultsText || wpforms_builder.no_pages_found;

			choicesJS = new Choices( element, choicesJSArgs );

			if ( ajaxArgs.nonce === null ) {
				return choicesJS;
			}

			$element.data( 'choicesjs', choicesJS );
			app.setupEvents( $element, choicesJS, ajaxArgs );

			return choicesJS;
		},

		/**
		 * Setup ChoicesJS events.
		 *
		 * @since 1.9.8.3
		 *
		 * @param {Object} $element  jQuery element where to init ChoicesJS.
		 * @param {Object} choicesJS ChoicesJS instance.
		 * @param {Object} ajaxArgs  Object containing `action` and `nonce` to perform AJAX search.
		 */
		setupEvents( $element, choicesJS, ajaxArgs ) {
			const containerOuter = choicesJS.containerOuter?.element || $element.closest( '.choices' )[ 0 ];

			app.setupSearchEvents( $element, choicesJS, ajaxArgs );

			choicesJS.passedElement.element.addEventListener( 'change', function() {
				const select = $( this ),
					isMultiple = select.prop( 'multiple' );

				if ( ! isMultiple ) {
					return;
				}

				const fieldId = select.data( 'field-id' ),
					fieldName = select.data( 'field-name' ),
					value = choicesJS.getValue();

				const selected = value.map( function( item ) {
					return item.value;
				} );

				const $hidden = $( `#wpforms-field-${ fieldId }-${ fieldName }-select-multiple-options` );

				$hidden.val( JSON.stringify( selected ) );
			} );

			// Add the ability to close the drop-down menu.
			containerOuter?.addEventListener( 'click', function() {
				if ( $( this ).hasClass( 'is-open' ) ) {
					choicesJS.hideDropdown();
				}
			} );

			// Show more button for choices after the group is toggled.
			$( document )
				.on( 'wpformsFieldOptionGroupToggled', function() {
					wpf.showMoreButtonForChoices( containerOuter );
				} )
				.on( 'wpformsBeforeFieldDuplicate', function( event, id ) {
					if ( $element.data( 'field-id' ) !== id ) {
						return;
					}

					const choices = choicesJS.getValue( true );

					$element.data( 'choicesjs' ).destroy();

					$element.find( 'option' ).each( function( index, option ) {
						if ( choices.includes( $( option ).val() ) ) {
							$( option ).prop( 'selected', true );
						}
					} );
				} )
				.on( 'wpformsFieldDuplicated', function( event, id ) {
					if ( $element.data( 'field-id' ) !== id ) {
						return;
					}

					$element.data( 'choicesjs' ).init();
				} );
		},

		/**
		 * Setup ChoicesJS search events.
		 *
		 * @since 1.9.8.3
		 *
		 * @param {Object} $element  jQuery element where to init ChoicesJS.
		 * @param {Object} choicesJS ChoicesJS instance.
		 * @param {Object} ajaxArgs  Object containing `action` and `nonce` to perform AJAX search.
		 */
		setupSearchEvents( $element, choicesJS, ajaxArgs ) {
			const searchInput = choicesJS.input?.element || $element.nextAll( '.choices__input ' )[ 0 ];

			/*
			 * ChoicesJS doesn't handle empty string search with it's `search` event handler,
			 * so we work around it by detecting empty string search with the ` keyup ` event.
			 */
			searchInput?.addEventListener( 'keyup', function( ev ) {
				// Only capture backspace and delete keypress that results to empty string.
				if (
					( ev.which !== 8 && ev.which !== 46 ) ||
					ev.target.value.length > 0
				) {
					return;
				}

				app.performSearch( choicesJS, '', ajaxArgs );
			} );

			choicesJS.passedElement?.element.addEventListener( 'search', _.debounce( function( ev ) {
				// Make sure that the search term is actually changed.
				if ( choicesJS.input.element.value.length === 0 ) {
					return;
				}

				app.performSearch( choicesJS, ev.detail.value, ajaxArgs );
			}, 800 ) );
		},

		/**
		 * Perform search in ChoicesJS instance.
		 *
		 * @since 1.7.9
		 *
		 * @param {Choices} choicesJS  ChoicesJS instance.
		 * @param {string}  searchTerm Search term.
		 * @param {Object}  ajaxArgs   Object containing `action` and `nonce` to perform AJAX search.
		 */
		performSearch( choicesJS, searchTerm, ajaxArgs ) {
			if ( ! ajaxArgs.action || ! ajaxArgs.nonce ) {
				return;
			}

			app.displayLoading( choicesJS );

			const requestSearchChoices = app.ajaxSearch( ajaxArgs.action, searchTerm, ajaxArgs.nonce, choicesJS.getValue( true ) );

			requestSearchChoices.done( function( response ) {
				choicesJS.setChoices( response.data, 'value', 'label', true );
			} );
		},

		/**
		 * Display "Loading" in the ChoicesJS instance.
		 *
		 * @since 1.7.9
		 *
		 * @param {Choices} choicesJS ChoicesJS instance.
		 */
		displayLoading( choicesJS ) {
			choicesJS.setChoices(
				[
					{ value: '', label: `${ wpforms_builder.loading }...`, disabled: true },
				],
				'value',
				'label',
				true
			);
		},

		/**
		 * Perform AJAX search request.
		 *
		 * @since 1.7.9
		 * @deprecated 1.9.4 Use `ajaxSearch` instead.
		 *
		 * @param {string} action     Action to be used when doing ajax request for search.
		 * @param {string} searchTerm Search term.
		 * @param {string} nonce      Nonce to be used when doing ajax request.
		 *
		 * @return {Promise} jQuery ajax call promise.
		 */
		ajaxSearchPages( action, searchTerm, nonce ) {
			// eslint-disable-next-line no-console
			console.warn( 'WPForms.Admin.Builder.WPFormsChoicesJS.ajaxSearchPages is deprecated. Use WPForms.Admin.Builder.WPFormsChoicesJS.ajaxSearch instead.' );

			return app.ajaxSearch( action, searchTerm, nonce );
		},

		/**
		 * Perform AJAX search request.
		 *
		 * @since 1.9.4
		 *
		 * @param {string} action     Action to be used when doing ajax request for search.
		 * @param {string} searchTerm Search term.
		 * @param {string} nonce      Nonce to be used when doing ajax request.
		 * @param {Array}  exclude    Array of values to exclude from search results.
		 *
		 * @return {Promise} jQuery ajax call promise.
		 */
		ajaxSearch( action, searchTerm, nonce, exclude = [] ) {
			const args = {
				action,
				search: searchTerm,
				_wpnonce: nonce,
				exclude,
			};

			return $.get(
				wpforms_builder.ajax_url,
				args
			).fail(
				function( err ) {
					console.error( err ); // eslint-disable-line no-console
				}
			);
		},
	};

	// Provide access to public functions/properties.
	return app;
}( document, window, jQuery ) );
