<?php

namespace WPForms\Forms\Fields\Traits;

/**
 * File Entry Preview Trait.
 *
 * Contains common methods for displaying file uploads in entries and emails.
 *
 * @since 1.9.8
 */
trait FileDisplayTrait {

	/**
	 * Format field value for display in Entries.
	 *
	 * @since 1.9.8
	 *
	 * @param string|mixed $val       Field value.
	 * @param array        $field     Field data.
	 * @param array        $form_data Form data.
	 * @param string       $context   Display context.
	 *
	 * @return string
	 * @noinspection PhpUnusedParameterInspection
	 */
	public function html_field_value( $val, array $field, array $form_data = [], string $context = '' ): string {

		$val = (string) $val;

		if ( empty( $field['value'] ) || $field['type'] !== $this->type ) {
			return $val;
		}

		// Process modern uploader.
		if ( ! empty( $field['value_raw'] ) ) {
			$values = $context === 'entry-table' ? array_slice( $field['value_raw'], 0, 3, true ) : $field['value_raw'];
			$html   = wpforms_chain( $values )
				->map(
					function ( $file ) use ( $context ) {

						if ( empty( $file['value'] ) || empty( $file['file_original'] ) ) {
							return '';
						}

						return $this->get_file_link_html( $file, $context ) . '<br>';
					}
				)
				->array_filter()
				->implode()
				->value();

			if ( count( $values ) < count( $field['value_raw'] ) ) {
				$html .= '&hellip;';
			}

			return $html;
		}

		return $this->get_file_link_html( $field, $context );
	}

	/**
	 * Get file link HTML.
	 *
	 * @since 1.9.8
	 *
	 * @param array  $file    File data.
	 * @param string $context Value display context.
	 *
	 * @return string
	 * @noinspection HtmlUnknownTarget
	 */
	private function get_file_link_html( array $file, string $context ): string {

		$html = in_array( $context, [ 'email-html', 'entry-single' ], true ) ? $this->file_icon_html( $file ) : '';

		$html .= sprintf(
			'<a href="%s" rel="noopener noreferrer" target="_blank" style="%s">%s</a>',
			esc_url( $this->get_file_url( $file ) ),
			$context === 'email-html' ? 'padding-left:10px;' : '',
			esc_html( $this->get_file_name( $file ) )
		);

		return $html;
	}

	/**
	 * Get the URL of a file.
	 *
	 * @since 1.9.8
	 *
	 * @param array $file File data.
	 * @param array $args Additional query arguments.
	 *
	 * @return string
	 */
	public function get_file_url( array $file, array $args = [] ): string {

		$file_url = $file['value'] ?? '';

		if ( ! empty( $file['protection_hash'] ) ) {
			$args = wp_parse_args(
				$args,
				[
					'wpforms_uploaded_file' => $file['protection_hash'],
				]
			);

			$file_url = add_query_arg( $args, home_url() );
		}

		/**
		 * Allow modifying the URL of a file.
		 *
		 * @since 1.9.8
		 *
		 * @param string $file_url File URL.
		 * @param array  $file     File data.
		 */
		return (string) apply_filters( 'wpforms_pro_fields_file_upload_get_file_url', $file_url, $file );
	}

	/**
	 * Get the name of a file.
	 *
	 * @since 1.9.8
	 *
	 * @param array $file File data.
	 *
	 * @return string
	 */
	public function get_file_name( array $file ): string {

		if ( ! $this->is_file_protected( $file ) ) {
			return $file['file_original'];
		}

		$ext = $file['ext'] ?? '';

		return sprintf( '%s.%s', hash( 'crc32b', $file['file_original'] ), $ext );
	}

	/**
	 * Check if the file is protected.
	 *
	 * @since 1.9.8
	 *
	 * @param array $file_data File data.
	 *
	 * @return bool True if the file is protected, false otherwise.
	 */
	private function is_file_protected( array $file_data ): bool {

		return ! empty( $file_data['protection_hash'] );
	}

	/**
	 * Get file icon HTML.
	 *
	 * @since 1.9.8
	 *
	 * @param array $file_data File data.
	 *
	 * @return string
	 * @noinspection HtmlUnknownTarget
	 */
	public function file_icon_html( array $file_data ): string {

		$src       = esc_url( $file_data['value'] );
		$ext_types = wp_get_ext_types();

		if ( $this->is_file_protected( $file_data ) || ! in_array( $file_data['ext'], $ext_types['image'], true ) ) {
			$src = wp_mime_type_icon( wp_ext2type( $file_data['ext'] ) ?? '' );
		} elseif ( $file_data['attachment_id'] ) {
			$image = wp_get_attachment_image_src( $file_data['attachment_id'], [ 16, 16 ], true );
			$src   = $image ? $image[0] : $src;
		}

		return sprintf( '<span class="file-icon"><img width="16" height="16" src="%s" alt="" /></span>', esc_url( $src ) );
	}
}
