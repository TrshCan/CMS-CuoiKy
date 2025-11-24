<?php
/**
 * Template Name: All Jobs Template
 * Description: A custom template for displaying all jobs with banner
 *
 * @package JobScout
 */

get_header();
if (function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
}

// Lấy các setting banner từ Customizer
$banner_title    = get_theme_mod( 'job_banner_title', 'Latest News' );
$banner_image    = get_theme_mod( 'job_banner_image' );
$blog_section_title = get_theme_mod( 'blog_section_title', __( 'NEWEST BLOG ENTRIES', 'jobscout' ) );
?>
<!-- Custom News Banner -->
<?php if ( $banner_image ) : ?>
<div id="job-banner" class="job-banner" style="background-image: url('<?php echo esc_url( $banner_image ); ?>');">
    <div class="banner-caption">
        <div class="caption-inner">
            <h1 class="title"><?php echo esc_html( $banner_title ); ?></h1>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- All Jobs Section -->
<div id="all-jobs-section" class="all-jobs-section">
    <div class="container">
        <!-- Header with Title and Filter -->
        <div class="jobs-header">
            <h2 class="jobs-title">ALL JOBS</h2>
            <div class="jobs-filter">
                <select id="job-sort-filter" class="job-sort-select">
                    <option value="latest">Latest Jobs</option>
                    <option value="earliest">Earliest Jobs</option>
                </select>
            </div>
        </div>

        <?php
        // Get sort order from query parameter or default to latest
        $sort_order = isset($_GET['sort']) ? $_GET['sort'] : 'latest';
        $order = ($sort_order === 'earliest') ? 'ASC' : 'DESC';
        
        // Query all job listings
        $args = array(
            'post_type'      => 'job_listing',
            'post_status'    => 'publish',
            'posts_per_page' => -1, // Get all jobs
            'orderby'        => 'date',
            'order'          => $order,
        );
        
        $jobs_query = new WP_Query( $args );
        
        if ( $jobs_query->have_posts() ) : 
            $total_jobs = $jobs_query->found_posts;
            $job_index = 0;
        ?>
            <div class="jobs-grid">
                <?php while ( $jobs_query->have_posts() ) : $jobs_query->the_post();
                    $job_index++;
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
                    
                    // Add class to hide jobs after the 10th one
                    $hidden_class = ( $job_index > 10 ) ? 'job-hidden' : '';
                ?>
                
                <article <?php job_listing_class( 'job-grid-item ' . $hidden_class ); ?>>
                    <div class="job-listing-card">
                        <div class="job-card-header">
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
                
                <?php endwhile; ?>
            </div>
            
            <?php if ( $total_jobs > 10 ) : ?>
                <div class="load-more-wrapper">
                    <button id="load-more-jobs" class="load-more-btn">
                        Load More Jobs
                    </button>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <p class="no-jobs-found"><?php esc_html_e( 'No jobs found.', 'jobscout' ); ?></p>
        <?php endif;
        
        wp_reset_postdata();
        ?>
    </div>
</div>

<style>
.all-jobs-section {
    padding: 60px 0;
    background: #f8f9fa;
}

.all-jobs-section .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

/* Header with Title and Filter */
.jobs-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #e0e0e0;
}

.jobs-title {
    font-size: 32px;
    font-weight: 700;
    margin: 0;
    color: #333;
    letter-spacing: 1px;
}

.jobs-filter {
    display: flex;
    align-items: center;
}

.job-sort-select {
    padding: 10px 40px 10px 15px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background: #fff;
    color: #333;
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    transition: border-color 0.3s ease;
}

.job-sort-select:hover,
.job-sort-select:focus {
    border-color: #007bff;
    outline: none;
}

@media (max-width: 768px) {
    .jobs-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
    
    .jobs-title {
        font-size: 24px;
    }
}

/* Jobs Grid */
.jobs-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
}

@media (max-width: 768px) {
    .jobs-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}

.job-grid-item {
    position: relative;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.job-grid-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 16px rgba(0,0,0,0.15);
}

.job-listing-card {
    padding: 25px;
}

/* Job Card Header - Image and Info Side by Side */
.job-card-header {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    align-items: flex-start;
}

.company-logo {
    flex-shrink: 0;
    margin: 0;
    width: 120px;
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 10px;
    background: #fff;
}

.company-logo img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.company-logo-fallback {
    width: 100%;
    height: 100%;
    background: #f0f0f0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 4px;
}

.company-name-in-logo {
    font-size: 13px;
    font-weight: 600;
    color: #666;
    text-align: center;
    padding: 10px;
    word-break: break-word;
}

.job-title-wrap {
    flex: 1;
    min-width: 0;
}

.job-title-wrap .entry-title {
    font-size: 18px;
    margin: 0 0 10px 0;
    line-height: 1.4;
}

.job-title-wrap .entry-title a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
    font-weight: 600;
}

.job-title-wrap .entry-title a:hover {
    color: #007bff;
}

.created-date {
    font-size: 13px;
    color: #999;
    margin-bottom: 12px;
}

.job-details-bar {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.job-details-bar span {
    display: inline-block;
    padding: 5px 12px;
    font-size: 12px;
    border-radius: 4px;
    background: #e9ecef;
    color: #495057;
}

.job-type-item {
    background: #d1ecf1 !important;
    color: #0c5460 !important;
}

.job-category-item {
    background: #d4edda !important;
    color: #155724 !important;
}

.recruit-area-item {
    background: #fff3cd !important;
    color: #856404 !important;
}

.job-short-description {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
}

.job-short-description ul {
    margin: 0;
    padding-left: 20px;
    list-style: disc;
}

.job-short-description ul li {
    margin-bottom: 5px;
}

.featured-label {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #ffc107;
    color: #000;
    padding: 5px 12px;
    font-size: 12px;
    font-weight: 600;
    border-radius: 4px;
    text-transform: uppercase;
}

.no-jobs-found {
    text-align: center;
    font-size: 18px;
    color: #666;
    padding: 40px 0;
}

/* Load More Button */
.job-hidden {
    display: none;
}

.load-more-wrapper {
    text-align: center;
    margin-top: 40px;
    padding: 20px 0;
}

.load-more-btn {
    padding: 12px 40px;
    font-size: 16px;
    font-weight: 600;
    color: #ff6b35;
    background: transparent;
    border: 2px solid #ff6b35;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.load-more-btn:hover {
    background: #ff6b35;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 107, 53, 0.3);
}

.load-more-btn:active {
    transform: translateY(0);
}

.load-more-btn.hidden {
    display: none;
}

@media (max-width: 576px) {
    .job-card-header {
        flex-direction: column;
        align-items: center;
    }
    
    .company-logo {
        width: 100px;
        height: 100px;
    }
    
    .job-title-wrap {
        text-align: center;
    }
    
    .job-details-bar {
        justify-content: center;
    }
    
    .load-more-btn {
        padding: 10px 30px;
        font-size: 14px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sortSelect = document.getElementById('job-sort-filter');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            const url = new URL(window.location.href);
            url.searchParams.set('sort', this.value);
            window.location.href = url.toString();
        });
        
        // Set selected value from URL parameter
        const urlParams = new URLSearchParams(window.location.search);
        const sortParam = urlParams.get('sort');
        if (sortParam) {
            sortSelect.value = sortParam;
        }
    }
    
    // Load More Jobs functionality
    const loadMoreBtn = document.getElementById('load-more-jobs');
    if (loadMoreBtn) {
        let currentlyShown = 10;
        const jobsPerLoad = 10;
        const allJobs = document.querySelectorAll('.job-grid-item');
        const totalJobs = allJobs.length;
        
        loadMoreBtn.addEventListener('click', function() {
            const hiddenJobs = document.querySelectorAll('.job-grid-item.job-hidden');
            const jobsToShow = Array.from(hiddenJobs).slice(0, jobsPerLoad);
            
            jobsToShow.forEach(function(job) {
                job.classList.remove('job-hidden');
            });
            
            currentlyShown += jobsToShow.length;
            
            // Hide button if all jobs are shown
            if (currentlyShown >= totalJobs) {
                loadMoreBtn.classList.add('hidden');
            }
        });
    }
});
</script>

<?php
get_footer(); ?>
