<?php
/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.27.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;
$job_salary   = get_post_meta( get_the_ID(), '_job_salary', true );
$job_featured = get_post_meta( get_the_ID(), '_featured', true );
$company_name = get_post_meta( get_the_ID(), '_company_name', true );

// Get job categories
$job_categories = get_the_terms( get_the_ID(), 'job_listing_category' );
$job_category_name = '';
if ( $job_categories && ! is_wp_error( $job_categories ) ) {
	$job_category_name = $job_categories[0]->name;
}

// Get job types
$job_types = wpjm_get_the_job_types();
$job_type_name = '';
if ( ! empty( $job_types ) ) {
	$job_type_name = $job_types[0]->name;
}

// Get job location
$job_location = get_the_job_location();

// Get job description excerpt
$job_description = get_the_excerpt();
if ( empty( $job_description ) ) {
	$job_description = wp_trim_words( get_the_content(), 20 );
}

// Get created date
$created_date = get_the_date( 'M d, Y' );

?>
<article <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr( $post->geolocation_lat ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_long ); ?>">

	<div class="job-listing-card">
		<figure class="company-logo">
			<?php 
			$company_logo_url = get_the_company_logo( get_the_ID(), 'thumbnail' );
			if ( $company_logo_url ) {
				echo '<img src="' . esc_url( $company_logo_url ) . '" alt="' . esc_attr( $company_name ? $company_name : 'Company Logo' ) . '" />';
			} else {
				// Fallback: show company name if no logo
				echo '<div class="company-logo-fallback">';
				if ( $company_name ) {
					echo '<div class="company-name-in-logo">' . esc_html( $company_name ) . '</div>';
				}
				echo '</div>';
			}
			?>
		</figure>

		<div class="job-title-wrap">
			<h2 class="entry-title">
				<a href="<?php the_job_permalink(); ?>"><?php wpjm_the_job_title(); ?></a>
			</h2>
			
			<div class="created-date">
				Created: <?php echo esc_html( $created_date ); ?>
			</div>
			
			<div class="job-details-bar">
				<?php if ( $job_type_name ) { ?>
					<span class="job-type-item"><?php echo esc_html( $job_type_name ); ?></span>
				<?php } ?>
				
				<?php if ( $job_category_name ) { ?>
					<span class="job-category-item"><?php echo esc_html( $job_category_name ); ?></span>
				<?php } ?>
				
				<?php if ( $job_location ) { ?>
					<span class="recruit-area-item"><?php echo esc_html( $job_location ); ?></span>
				<?php } ?>
			</div>
		</div>

		<?php if ( $job_description ) { ?>
			<div class="job-short-description">
				<?php 
				// Check if description already has bullet points or line breaks
				if ( strpos( $job_description, "\n" ) !== false || strpos( $job_description, "\r" ) !== false ) {
					// Has line breaks, split by them
					$description_lines = preg_split( '/[\r\n]+/', $job_description );
					echo '<ul>';
					foreach ( $description_lines as $line ) {
						$line = trim( $line );
						// Remove existing bullets or dashes
						$line = preg_replace( '/^[•\-\*]\s*/', '', $line );
						if ( ! empty( $line ) ) {
							echo '<li>' . esc_html( $line ) . '</li>';
						}
					}
					echo '</ul>';
				} elseif ( strpos( $job_description, '•' ) !== false || ( strpos( $job_description, '-' ) !== false && substr_count( $job_description, '-' ) > 1 ) ) {
					// Has bullet points or multiple dashes
					$lines = preg_split( '/[•\-\*]\s+/', $job_description );
					echo '<ul>';
					foreach ( $lines as $line ) {
						$line = trim( $line );
						if ( ! empty( $line ) ) {
							echo '<li>' . esc_html( $line ) . '</li>';
						}
					}
					echo '</ul>';
				} else {
					// Try to split by sentences if multiple sentences exist
					$description_lines = preg_split( '/[\.\!?]\s+/', $job_description );
					if ( count( $description_lines ) > 1 && strlen( $job_description ) > 100 ) {
						echo '<ul>';
						foreach ( $description_lines as $line ) {
							$line = trim( $line );
							if ( ! empty( $line ) && strlen( $line ) > 10 ) {
								echo '<li>' . esc_html( $line ) . '</li>';
							}
						}
						echo '</ul>';
					} else {
						// Single sentence or short description
						echo '<ul><li>' . esc_html( $job_description ) . '</li></ul>';
					}
				}
				?>
			</div>
		<?php } ?>
	</div>

	<?php if( $job_featured ){ ?>
		<div class="featured-label"><?php esc_html_e( 'Featured', 'jobscout' ); ?></div>
	<?php } ?>

</article>
