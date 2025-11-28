<?php
/**
 * Filter to modify functionality of WP Job Manager plugin.
 *
 * @package JobScout 
 */

if( ! function_exists( 'job_board_taxonomy_publicview_modified_filter' ) ){
	/**
	 * Filter to modify job listing
	 */    
	function job_board_taxonomy_publicview_modified_filter( $public ) {
		$public['public'] = true;
		 return $public;
	}
}
add_filter( 'register_taxonomy_job_listing_type_args', 'job_board_taxonomy_publicview_modified_filter' );

/**
 * Modify job listings query to also search by location taxonomy
 * This allows the search to work with the custom location taxonomy
 */
function jobscout_add_location_taxonomy_to_search( $query_args ) {
	// Check if search_location is provided
	if ( ! empty( $query_args['search_location'] ) ) {
		$search_location = $query_args['search_location'];
		
		// Get location term by name
		$location_term = get_term_by( 'name', $search_location, 'job_location' );
		
		if ( $location_term && ! is_wp_error( $location_term ) ) {
			// Add taxonomy query to search by location taxonomy
			// This will be combined with the existing meta_query using OR relation
			if ( ! isset( $query_args['tax_query'] ) ) {
				$query_args['tax_query'] = array();
			}
			
			// Add location taxonomy query
			$query_args['tax_query'][] = array(
				'taxonomy' => 'job_location',
				'field'    => 'term_id',
				'terms'    => $location_term->term_id,
			);
			
			// If there are multiple tax queries, set relation
			if ( count( $query_args['tax_query'] ) > 1 ) {
				$query_args['tax_query']['relation'] = 'OR';
			}
		}
	}
	
	return $query_args;
}
add_filter( 'job_manager_get_job_listings_query_args', 'jobscout_add_location_taxonomy_to_search', 20 );