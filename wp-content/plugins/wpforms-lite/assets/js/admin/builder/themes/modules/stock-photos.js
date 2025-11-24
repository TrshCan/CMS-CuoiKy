/* global wpforms_builder_themes */

/**
 * WPForms Form Builder Themes: Stock Photos module.
 *
 * @since 1.9.7
 *
 * @param {Object} document Document object.
 * @param {Object} window   Window object.
 * @param {jQuery} $        jQuery object.
 *
 * @return {Object} Public functions and properties.
 */
// eslint-disable-next-line max-lines-per-function
export default function( document, window, $ ) { // eslint-disable-line no-unused-vars
	const WPForms = window.WPForms || {};
	const WPFormsBuilderThemes = WPForms.Admin.Builder.Themes || {};

	/**
	 * Localized data aliases.
	 *
	 * @since 1.9.7
	 */
	const strings = wpforms_builder_themes.strings;
	const routeNamespace = wpforms_builder_themes.route_namespace;
	const pictureUrlPath = wpforms_builder_themes.stockPhotos?.urlPath;

	/**
	 * Elements holder.
	 *
	 * @since 1.9.7
	 *
	 * @type {Object}
	 */
	const el = {};

	/**
	 * Spinner markup.
	 *
	 * @since 1.9.7
	 *
	 * @type {string}
	 */
	const spinner = '<i class="wpforms-loading-spinner wpforms-loading-white wpforms-loading-inline"></i>';

	/**
	 * Runtime state.
	 *
	 * @since 1.9.7
	 *
	 * @type {Object}
	 */
	const state = {};

	/**
	 * Stock photos pictures' list.
	 *
	 * @since 1.9.7
	 *
	 * @type {Array}
	 */
	let pictures = wpforms_builder_themes.stockPhotos?.pictures;

	/**
	 * Stock photos picture selector markup.
	 *
	 * @since 1.9.7
	 *
	 * @type {string}
	 */
	let picturesMarkup = '';

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
		 * Open stock photos modal.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} from From where the modal was triggered, `themes` or `bg-styles`.
		 */
		openModal( from ) {
			if ( app.isPicturesAvailable() ) {
				app.picturesModal();

				return;
			}

			app.installModal( from );
		},

		/**
		 * Open stock photos install modal on a select theme.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} themeSlug The theme slug.
		 */
		onSelectTheme( themeSlug ) {
			const themesModule = WPFormsBuilderThemes.themes;

			if ( app.isPicturesAvailable() ) {
				return;
			}

			// Check only WPForms themes.
			if ( ! themesModule?.isWPFormsTheme( themeSlug ) ) {
				return;
			}

			const theme = themesModule?.getTheme( themeSlug );
			const bgUrl = theme.settings?.backgroundUrl;

			if ( bgUrl?.length && bgUrl !== 'url()' ) {
				app.installModal( 'themes' );
			}
		},

		/**
		 * Open a modal prompting to download and install the Stock Photos.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} from From where the modal was triggered, `themes` or `bg-styles`.
		 */
		installModal( from ) {
			const installStr = from === 'themes' ? strings.stockInstallTheme : strings.stockInstallBg;

			$.confirm( {
				title: strings.heads_up,
				content: installStr + ' ' + strings.stockInstall,
				icon: 'wpforms-exclamation-circle',
				type: 'orange wpforms-builder-themes-modal',
				buttons: {
					continue: {
						text: strings.continue,
						btnClass: 'btn-confirm',
						keys: [ 'enter' ],
						action() {
							// noinspection JSUnresolvedReference
							this.$$continue.prop( 'disabled', true )
								.html( spinner + strings.installing );

							// noinspection JSUnresolvedReference
							this.$$cancel
								.prop( 'disabled', true );

							app.install( this, from );

							return false;
						},
					},
					cancel: {
						text: strings.cancel,
						keys: [ 'esc' ],
					},
				},
			} );
		},

		/**
		 * Display the modal window with an error message.
		 *
		 * @since 1.9.7
		 *
		 * @param {string} error Error message.
		 */
		errorModal( error ) {
			$.alert( {
				title: strings.uhoh,
				content: error || strings.commonError,
				icon: 'fa fa-exclamation-circle',
				type: 'red',
				buttons: {
					cancel: {
						text    : strings.close,
						btnClass: 'btn-confirm',
						keys    : [ 'enter' ],
					},
				},
			} );
		},

		/**
		 * Display the modal window with pictures.
		 *
		 * @since 1.9.7
		 */
		picturesModal() {
			state.picturesModal = $.alert( {
				title : `${ strings.picturesTitle }<p>${ strings.picturesSubTitle }</p>`,
				content: app.getPictureMarkup(),
				type: 'picture-selector wpforms-builder-themes-modal',
				boxWidth: '800px',
				closeIcon: true,
				animation: 'opacity',
				closeAnimation: 'opacity',
				buttons: false,
				onOpen() {
					this.$content
						.off( 'click' )
						.on( 'click', '.wpforms-builder-stock-photos-picture', app.selectPicture );
				},
			} );
		},

		/**
		 * Install stock photos.
		 *
		 * @since 1.9.7
		 *
		 * @param {Object} modal The jQuery-confirm a modal window object.
		 * @param {string} from  From where the modal was triggered, `themes` or `bg-styles`.
		 */
		install( modal, from ) {
			// If a fetch is already in progress, exit the function.
			if ( state.isInstalling ) {
				return;
			}

			// Set the flag to true indicating a fetch is in progress.
			state.isInstalling = true;

			try {
				// Fetch themes data.
				wp.apiFetch( {
					path: routeNamespace + 'stock-photos/install/',
					method: 'POST',
					cache: 'no-cache',
				} ).then( ( response ) => {
					if ( ! response.result ) {
						app.errorModal( response.error );

						return;
					}

					// Store the pictures' data.
					pictures = response.pictures || [];

					// Update the theme or open the picture selector modal.
					if ( from === 'themes' ) {
						WPFormsBuilderThemes.store.set( 'backgroundUrl', 'url()' );
						WPFormsBuilderThemes.themes.setFormTheme( WPFormsBuilderThemes.store.get( 'wpformsTheme' ) );
					} else {
						app.picturesModal();
					}
				} ).catch( ( error ) => {
					// eslint-disable-next-line no-console
					console.error( error?.message );
					app.errorModal( `<p>${ strings.commonError }</p><p>${ error?.message }</p>` );
				} ).finally( () => {
					state.isInstalling = false;

					// Close the modal window.
					modal.close();
				} );
			} catch ( error ) {
				state.isInstalling = false;
				// eslint-disable-next-line no-console
				console.error( error );
				app.errorModal( strings.commonError + '<br>' + error );
			}
		},

		/**
		 * Detect whether pictures' data available.
		 *
		 * @since 1.9.7
		 *
		 * @return {boolean} True if pictures' data available, false otherwise.
		 */
		isPicturesAvailable() {
			return Boolean( pictures?.length );
		},

		/**
		 * Generate the pictures' selector markup.
		 *
		 * @since 1.9.7
		 *
		 * @return {string} Pictures' selector markup.
		 */
		getPictureMarkup() {
			if ( ! app.isPicturesAvailable() ) {
				return '';
			}

			if ( picturesMarkup !== '' ) {
				return picturesMarkup;
			}

			pictures.forEach( ( picture ) => {
				const pictureUrl = pictureUrlPath + picture;

				picturesMarkup += `<div class="wpforms-builder-stock-photos-picture"
					data-url="${ pictureUrl }"
					style="background-image: url( '${ pictureUrl }' )"
				></div>`;
			} );

			picturesMarkup = `<div class="wpforms-builder-stock-photos-pictures-wrap">${ picturesMarkup }</div>`;

			return picturesMarkup;
		},

		/**
		 * Select picture event handler.
		 *
		 * @since 1.9.7
		 */
		selectPicture() {
			const pictureUrl = $( this ).data( 'url' );

			// Update the settings.
			WPFormsBuilderThemes.store.set( 'backgroundUrl', pictureUrl );

			// Close the modal window.
			state.picturesModal?.close();
		},

	};

	return app;
}
