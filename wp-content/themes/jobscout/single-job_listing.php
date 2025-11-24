<?php
/**
 * The template for displaying all single job posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package JobScout
 */
get_header(); 

if (function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
}

while ( have_posts() ) : the_post();
    global $post;
    
    // Get job meta data
    $company_name = get_post_meta( get_the_ID(), '_company_name', true );
    $company_logo_url = get_the_company_logo( get_the_ID(), 'full' );
    $job_location = get_the_job_location();
    $created_date = get_the_date( 'M d, Y' );
    
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
    
    // Get company rating (you can customize this)
    $company_rating = get_post_meta( get_the_ID(), '_company_rating', true );
    if ( empty( $company_rating ) ) {
        $company_rating = 4.0; // Default rating
    }
    
    // Get company photos (you can customize this)
    $company_photos = get_post_meta( get_the_ID(), '_company_photos', true );
?>

<div id="job-detail-page" class="job-detail-page">
    <div class="container">
        <!-- Breadcrumb Navigation -->
        <nav class="job-breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="breadcrumb-link">Home</a>
            <span class="breadcrumb-separator">/</span>
            <a href="<?php echo esc_url( home_url( '/all-jobs' ) ); ?>" class="breadcrumb-link">All Jobs</a>
            <span class="breadcrumb-separator">/</span>
            <span class="breadcrumb-current"><?php the_title(); ?></span>
        </nav>
        
        <!-- Job Header -->
        <div class="job-header-card">
            <div class="job-header-content">
                <figure class="company-logo-large">
                    <?php if ( $company_logo_url ) : ?>
                        <img src="<?php echo esc_url( $company_logo_url ); ?>" alt="<?php echo esc_attr( $company_name ); ?>" />
                    <?php else : ?>
                        <div class="company-logo-fallback">
                            <?php if ( $company_name ) : ?>
                                <div class="company-name-in-logo"><?php echo esc_html( $company_name ); ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </figure>
                
                <div class="job-header-info">
                    <h1 class="job-title"><?php the_title(); ?></h1>
                    <div class="job-meta-info">
                        <span class="created-date">Created: <?php echo esc_html( $created_date ); ?></span>
                    </div>
                    <div class="job-tags">
                        <?php if ( $job_type_name ) : ?>
                            <span class="job-tag job-type"><?php echo esc_html( $job_type_name ); ?></span>
                        <?php endif; ?>
                        <?php if ( $job_category_name ) : ?>
                            <span class="job-tag job-category"><?php echo esc_html( $job_category_name ); ?></span>
                        <?php endif; ?>
                        <?php if ( $job_location ) : ?>
                            <span class="job-tag job-location"><?php echo esc_html( $job_location ); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="job-header-actions">
                <button class="btn-share">SHARE</button>
                <button class="btn-apply">APPLY JOB</button>
            </div>
        </div>
        
        <!-- Job Content with Sidebar -->
        <div class="job-content-wrapper">
            <!-- Main Content -->
            <div class="job-main-content">
                <section class="job-section">
                    <h2 class="section-title">Overview about Company</h2>
                    <div class="section-content">
                        <?php 
                        $content = get_the_content();
                        if ( ! empty( $content ) ) {
                            echo wpautop( $content );
                        } else {
                            echo '<p>No company overview available.</p>';
                        }
                        ?>
                    </div>
                </section>
                
                <section class="job-section">
                    <h2 class="section-title">Our Key Skills</h2>
                    <div class="section-content">
                        <?php 
                        $key_skills = get_post_meta( get_the_ID(), '_key_skills', true );
                        if ( ! empty( $key_skills ) ) {
                            echo wpautop( $key_skills );
                        } else {
                            echo '<p>No key skills information available.</p>';
                        }
                        ?>
                    </div>
                </section>
                
                <section class="job-section">
                    <h2 class="section-title">Why You'll Love Working Here</h2>
                    <div class="section-content">
                        <?php 
                        $why_work = get_post_meta( get_the_ID(), '_why_work_here', true );
                        if ( ! empty( $why_work ) ) {
                            echo wpautop( $why_work );
                        } else {
                            echo '<p>No information available.</p>';
                        }
                        ?>
                    </div>
                </section>
                
                <section class="job-section">
                    <h2 class="section-title">Location</h2>
                    <div class="section-content">
                        <?php if ( $job_location ) : ?>
                            <p><?php echo esc_html( $job_location ); ?></p>
                        <?php else : ?>
                            <p>No location information available.</p>
                        <?php endif; ?>
                    </div>
                </section>
            </div>
            
            <!-- Sidebar -->
            <aside class="job-sidebar">
                <!-- Staff Rating -->
                <div class="sidebar-widget rating-widget">
                    <h3 class="widget-title">Staff Rating</h3>
                    <div class="rating-display">
                        <?php 
                        $full_stars = floor( $company_rating );
                        $half_star = ( $company_rating - $full_stars ) >= 0.5;
                        $empty_stars = 5 - $full_stars - ( $half_star ? 1 : 0 );
                        
                        for ( $i = 0; $i < $full_stars; $i++ ) {
                            echo '<span class="star star-full">★</span>';
                        }
                        if ( $half_star ) {
                            echo '<span class="star star-half">★</span>';
                        }
                        for ( $i = 0; $i < $empty_stars; $i++ ) {
                            echo '<span class="star star-empty">★</span>';
                        }
                        ?>
                        <span class="rating-number"><?php echo number_format( $company_rating, 1 ); ?></span>
                    </div>
                </div>
                
                <!-- Company Photos -->
                <div class="sidebar-widget photos-widget">
                    <h3 class="widget-title">Company Photos</h3>
                    <div class="company-photos-grid">
                        <?php if ( $company_photos && is_array( $company_photos ) ) : ?>
                            <?php foreach ( $company_photos as $index => $photo_url ) : ?>
                                <?php if ( $index < 4 ) : ?>
                                    <div class="photo-item <?php echo ( $index === 3 ) ? 'photo-more' : ''; ?>">
                                        <img src="<?php echo esc_url( $photo_url ); ?>" alt="Company Photo" />
                                        <?php if ( $index === 3 && count( $company_photos ) > 4 ) : ?>
                                            <div class="photo-overlay">+<?php echo count( $company_photos ) - 3; ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="photo-item">
                                <div class="photo-placeholder">No photos available</div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>

<style>
.entry-header{
	display: none;
}
.job-detail-page {
    padding: 40px 0 60px;
    background: #f5f5f5;
}

.job-detail-page .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

/* Breadcrumb Navigation */
.job-breadcrumb {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 25px;
    padding: 15px 0;
    font-size: 14px;
}

.breadcrumb-link {
    color: #666;
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-link:hover {
    color: #ff6b35;
}

.breadcrumb-separator {
    color: #999;
}

.breadcrumb-current {
    color: #333;
    font-weight: 500;
}

/* Job Header Card */
.job-header-card {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    margin-bottom: 30px;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 30px;
}

.job-header-content {
    display: flex;
    gap: 25px;
    flex: 1;
}

.company-logo-large {
    flex-shrink: 0;
    margin: 0;
    width: 130px;
    height: 130px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 15px;
    background: #fff;
}

.company-logo-large img {
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
    font-size: 14px;
    font-weight: 600;
    color: #666;
    text-align: center;
    padding: 10px;
}

.job-header-info {
    flex: 1;
}

.job-title {
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 10px 0;
    color: #333;
    line-height: 1.3;
}

.job-meta-info {
    margin-bottom: 15px;
}

.created-date {
    font-size: 14px;
    color: #999;
}

.job-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.job-tag {
    display: inline-block;
    padding: 6px 14px;
    font-size: 13px;
    border-radius: 4px;
    background: #e9ecef;
    color: #495057;
    line-height: 1.4;
    height: fit-content;
}

.job-tag.job-type {
    background: #d1ecf1;
    color: #0c5460;
}

.job-tag.job-category {
    background: #d4edda;
    color: #155724;
}

.job-tag.job-location {
    background: #fff3cd;
    color: #856404;
}

.job-header-actions {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.btn-share,
.btn-apply {
    padding: 12px 35px;
    font-size: 14px;
    font-weight: 600;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    white-space: nowrap;
}

.btn-share {
    background: transparent;
    border: 2px solid #333;
    color: #333;
}

.btn-share:hover {
    background: #333;
    color: #fff;
}

.btn-apply {
    background: transparent;
    border: 2px solid #ff6b35;
    color: #ff6b35;
}

.btn-apply:hover {
    background: #ff6b35;
    color: #fff;
}

/* Job Content with Sidebar */
.job-content-wrapper {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 30px;
}

.job-main-content {
    background: #fff;
    padding: 35px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.job-section {
    margin-bottom: 40px;
}

.job-section:last-child {
    margin-bottom: 0;
}

.section-title {
    font-size: 20px;
    font-weight: 700;
    margin: 0 0 20px 0;
    color: #333;
}

.section-content {
    font-size: 15px;
    line-height: 1.8;
    color: #666;
}

.section-content p {
    margin-bottom: 15px;
}

/* Sidebar */
.job-sidebar {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.sidebar-widget {
    background: #fff;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.widget-title {
    font-size: 18px;
    font-weight: 700;
    margin: 0 0 20px 0;
    color: #333;
}

/* Rating Widget */
.rating-display {
    display: flex;
    align-items: center;
    gap: 5px;
}

.star {
    font-size: 28px;
    color: #ddd;
}

.star.star-full {
    color: #ff6b35;
}

.star.star-half {
    color: #ff6b35;
    opacity: 0.5;
}

.rating-number {
    font-size: 24px;
    font-weight: 700;
    color: #ff6b35;
    margin-left: 10px;
}

/* Company Photos */
.company-photos-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
}

.photo-item {
    position: relative;
    aspect-ratio: 1;
    border-radius: 8px;
    overflow: hidden;
}

.photo-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.photo-item.photo-more {
    position: relative;
}

.photo-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 32px;
    font-weight: 700;
}

.photo-placeholder {
    width: 100%;
    height: 100%;
    background: #f0f0f0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #999;
    font-size: 13px;
    text-align: center;
    padding: 10px;
}

/* Responsive */
@media (max-width: 992px) {
    .job-content-wrapper {
        grid-template-columns: 1fr;
    }
    
    .job-sidebar {
        order: -1;
    }
}

@media (max-width: 768px) {
    .job-header-card {
        flex-direction: column;
    }
    
    .job-header-content {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    
    .job-header-actions {
        width: 100%;
    }
    
    .btn-share,
    .btn-apply {
        width: 100%;
    }
    
    .job-tags {
        justify-content: center;
    }
}

@media (max-width: 576px) {
    .job-main-content {
        padding: 20px;
    }
    
    .job-title {
        font-size: 20px;
    }
    
    .section-title {
        font-size: 18px;
    }
}
</style>

<?php
endwhile; // End of the loop.

get_footer();