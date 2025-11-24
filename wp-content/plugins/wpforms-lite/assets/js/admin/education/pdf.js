/**
 * PDF Education.
 *
 * @since 1.9.7.3
 *
 * @param {Window} window The global window object.
 * @param {jQuery} $      The jQuery object.
 */
( function( window, $ ) {
	const app = {
		/**
		 * The whole popup element.
		 *
		 * @since 1.9.7.3
		 *
		 * @type {jQuery}
		 */
		$popup: null,

		/**
		 * The builder element.
		 *
		 * @since 1.9.7.3
		 *
		 * @type {jQuery}
		 */
		$builder: null,

		/**
		 * The close button element inside the popup. Closes popup.
		 *
		 * @since 1.9.7.3
		 *
		 * @type {jQuery}
		 */
		$close: null,

		/**
		 * The button element inside the popup. Triggers the PDF panel.
		 *
		 * @since 1.9.7.3
		 *
		 * @type {jQuery}
		 */
		$switchButton: null,

		/**
		 * The notification section element.
		 * This is what a user sees when clicking on Builder > Settings > Notifications.
		 *
		 * @since 1.9.7.3
		 *
		 * @type {jQuery}
		 */
		$notifications: null,

		/**
		 * The PDF panel element.
		 * This is what a user sees when clicking on Builder > Settings > PDF.
		 *
		 * @since 1.9.7.3
		 *
		 * @type {jQuery}
		 */
		$pdfPanel: null,

		/**
		 * Initializes the app.
		 *
		 * @since 1.9.7.3
		 */
		init() {
			$( app.ready );
		},

		/**
		 * Document ready.
		 *
		 * @since 1.9.7.3
		 */
		ready() {
			app.$popup = $( '#wpforms-pdf-popup' );
			app.$close = app.$popup.find( '.close-popup' );
			app.$switchButton = app.$popup.find( 'button.education-modal[data-target="wpforms-pdf"]' );
			app.$notifications = $( '.wpforms-panel-content-section.wpforms-panel-content-section-notifications' );
			app.$builder = $( '#wpforms-builder' );
			app.$pdfPanel = $( '.wpforms-panel-sidebar-section.wpforms-panel-sidebar-section-pdf' );

			app.run();
		},
		/**
		 * Runs the app.
		 *
		 * @since 1.9.7.3
		 */
		run() {
			/*
			 * User clicked on one of the subsections in Builder > Settings.
			 */
			app.$builder.on( 'wpformsPanelSectionSwitch', function( e, section ) {
				if ( section === 'default' || ! section ) {
					return;
				}

				app.$popup.toggle( section === 'notifications' );
			} );

			/*
			 * User clicked on the left dark sidebar in Builder.
			 */
			app.$builder.on( 'wpformsPanelSwitched', () => {
				app.$popup.toggle( app.$notifications.is( ':visible' ) );
			} );

			/*
			 * User clicked on the 'Try it Out' button.
			 */
			app.$switchButton.on( 'click', function( e ) {
				e.preventDefault();

				app.$pdfPanel.click();
			} );
		},
	};

	app.init();
}( window, jQuery ) );
