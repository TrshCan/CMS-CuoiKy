/* global wpforms_builder_themes, wpf, WPFormsUtils */

// noinspection ES6ConvertVarToLetConst
/**
 * WPForms Form builder themes.
 *
 * @since 1.9.7
 */
var WPForms = window.WPForms || {}; // eslint-disable-line no-var

WPForms.Admin = WPForms.Admin || {};
WPForms.Admin.Builder = WPForms.Admin.Builder || {};

WPForms.Admin.Builder.Themes = WPForms.Admin.Builder.Themes || ( function( document, window, $ ) {
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
			$( app.ready );
		},

		/**
		 * Start the engine.
		 *
		 * @since 1.9.7
		 */
		ready() {
			app.setup();
			app.loadModules();
		},

		/**
		 * Setup. Prepare some variables.
		 *
		 * @since 1.9.7
		 */
		setup() {
			// Cache DOM elements.
			el.$builder = $( '#wpforms-builder' );
		},

		/**
		 * Centralized reactive store for theme style settings in the Form Builder.
		 *
		 * Provides a simple pub/sub mechanism to track and respond to setting changes.
		 * Automatically initializes its state from all inputs/selects matching `name="settings[themes][...]"`.
		 *
		 * Usage examples:
		 *
		 * // Subscribe to a specific setting change.
		 * app.store.subscribe('buttonTextColor', (value) => {
		 * console.log('Button text color changed to:', value);
		 * } );
		 *
		 * // Subscribe to all setting changes.
		 * app.store.subscribeAll(( value, key) => {
		 * console.log( Setting ${ key } changed to:`, value);
		 * });
		 *
		 * // Get current value.
		 * const padding = app.store.get('containerPadding');
		 *
		 * // Manually update a setting (will trigger listeners).
		 * // Use the 3rd argument as 'true' to set in a 'silent' mode when state and input will update,
		 * // but no listeners will be run.
		 * app.store.set('fieldSize', 'medium');
		 *
		 * @since 1.9.7
		 *
		 * @type {Object}
		 * @property {Function} get          Get current value of a setting by key.
		 * @property {Function} set          Set value of a setting by key and notify listeners.
		 * @property {Function} subscribe    Subscribe to a specific setting change: (key, callback) => void
		 * @property {Function} subscribeAll Subscribe to all setting changes: (callback) => void
		 * @property {Function} initFromDOM  Initialize the store from DOM inputs/selects.
		 * @property {Object}   state        Raw internal state object (mostly for debugging).
		 */
		store: ( () => {
			const state = {};
			const keyListeners = new Map();
			const inputElements = new Map();
			const globalListeners = [];
			const debouncedSetters = {};
			const DEBOUNCE_DELAY = 50;

			// Settings getter.
			const get = ( key ) => state[ key ];

			// Settings setter.
			const set = ( key, value, silent = false ) => {
				if ( state[ key ] === value ) {
					return;
				}

				state[ key ] = value;

				const $input = inputElements.get( key );

				if ( $input && $input.val() !== value ) {
					$input.val( value );
					if ( ! silent ) {
						$input.trigger( 'input' );
					}
				}

				if ( silent ) {
					return;
				}

				if ( keyListeners.has( key ) ) {
					$.each( keyListeners.get( key ), ( _, cb ) => cb( value, key ) );
				}
				$.each( globalListeners, ( _, cb ) => cb( value, key ) );
			};

			// Get bounced Setter.
			const getDebouncedSetter = ( key ) => {
				if ( ! debouncedSetters[ key ] ) {
					debouncedSetters[ key ] = _.debounce( ( value ) => set( key, value ), DEBOUNCE_DELAY );
				}
				return debouncedSetters[ key ];
			};

			// Allow subscribing to specific setting change.
			const subscribe = ( key, callback ) => {
				if ( ! keyListeners.has( key ) ) {
					keyListeners.set( key, [] );
				}
				keyListeners.get( key ).push( callback );
			};

			// Allow listening all settings change.
			const subscribeAll = ( callback ) => {
				globalListeners.push( callback );
			};

			// Initialize from DOM (should be called once during app init).
			const initFromDOM = () => {
				$( '[name^="settings[themes]"]' ).each( function() {
					const $input = $( this );
					const nameMatch = $input.attr( 'name' ).match( /\[themes]\[(.*?)]/ );
					if ( ! nameMatch ) {
						return;
					}

					const key = nameMatch[ 1 ];
					state[ key ] = $input.val();
					inputElements.set( key, $input );

					const tag = $input.prop( 'tagName' ).toLowerCase();
					const type = ( $input.attr( 'type' ) || '' ).toLowerCase();

					const isDebouncedInput = (
						( tag === 'input' && ( type === 'text' || type === 'number' || type === 'hidden' ) ) ||
						tag === 'textarea'
					);

					$input.on( isDebouncedInput ? 'input' : 'change', function() {
						const value = $( this ).val();
						if ( isDebouncedInput ) {
							getDebouncedSetter( key )( value );
						} else {
							set( key, value );
						}
					} );
				} );
			};

			return {
				get,
				set,
				subscribe,
				subscribeAll,
				initFromDOM,
				inputElements,
				state,
			};
		}
		)(),

		/**
		 * Get setting.
		 *
		 * @since 1.9.7
		 *
		 * @param {null|string} key Settings key.
		 *
		 * @return {Object} Setting value.
		 */
		getSettings( key = null ) {
			if ( key ) {
				return app.store.get( key );
			}
			return app.store.state;
		},

		/**
		 * Get controls.
		 *
		 * @since 1.9.7
		 *
		 * @param {null|string} key Settings key.
		 *
		 * @return {Object} Control
		 */
		getControls( key = null ) {
			if ( key ) {
				return app.store.inputElements.get( key );
			}
			return app.store.inputElements;
		},

		/**
		 * Load modules.
		 *
		 * @since 1.9.7
		 */
		loadModules() {
			const modules = wpforms_builder_themes.modules || [];

			// Import all modules dynamically.
			Promise.all( modules.map( ( module ) => import( module.path ) ) )
				.then( ( importedModules ) => {
					importedModules.forEach( ( module, index ) => {
						const moduleName = modules[ index ].name;
						app[ moduleName ] = module.default( document, window, $ );

						// Initialize module on `wpformsBuilderThemesLoaded` event.
						el.$builder.on( `wpformsBuilderThemesLoaded`, app[ moduleName ].init );
					} );

					// Trigger `wpformsBuilderThemesLoaded` event.
					WPFormsUtils.triggerEvent( el.$builder, 'wpformsBuilderThemesLoaded', [ importedModules ] );
				} )
				.catch( ( error ) => {
					wpf.debug( 'Error importing modules:', error );
				} );
		},
	};

	// Return the public-facing methods.
	return app;
}( document, window, jQuery ) );

// Initialize.
WPForms.Admin.Builder.Themes.init();
