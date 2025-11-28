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
            <a href="<?php echo esc_url( home_url( '/jobs' ) ); ?>" class="breadcrumb-link">All Jobs</a>
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
                <button class="btn-share" data-job-id="<?php echo esc_attr( get_the_ID() ); ?>">SHARE</button>
                <button class="btn-apply" data-job-id="<?php echo esc_attr( get_the_ID() ); ?>">APPLY JOB</button>
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

<!-- Share Modal -->
<div id="share-modal" class="share-modal">
    <div class="share-modal-overlay"></div>
    <div class="share-modal-content">
        <div class="share-modal-header">
            <h3>Share Job</h3>
            <button class="share-modal-close">&times;</button>
        </div>
        <div class="share-modal-body">
            <div class="share-options">
                <a href="#" class="share-option" data-platform="facebook" title="Share on Facebook">
                    <div class="share-icon facebook-icon">f</div>
                    <span>Facebook</span>
                </a>
                <a href="#" class="share-option" data-platform="youtube" title="Share on YouTube">
                    <div class="share-icon youtube-icon">▶</div>
                    <span>YouTube</span>
                </a>
                <a href="#" class="share-option" data-platform="google" title="Share on Google">
                    <div class="share-icon google-icon">G+</div>
                    <span>Google</span>
                </a>
                <a href="#" class="share-option" data-platform="email" title="Share via Email">
                    <div class="share-icon email-icon">@</div>
                    <span>Email</span>
                </a>
                <a href="#" class="share-option" data-platform="copy" title="Copy Link">
                    <div class="share-icon copy-icon">📋</div>
                    <span>Copy Link</span>
                </a>
            </div>
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

/* Share Modal Styles */
.share-modal {
    display: none;
    position: fixed;
    z-index: 10000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
}

.share-modal.active {
    display: block;
}

.share-modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(2px);
}

.share-modal-content {
    position: relative;
    background: #fff;
    margin: 10% auto;
    padding: 0;
    border-radius: 12px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    animation: modalSlideIn 0.3s ease;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.share-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 25px;
    border-bottom: 1px solid #e9ecef;
}

.share-modal-header h3 {
    margin: 0;
    font-size: 22px;
    font-weight: 700;
    color: #333;
}

.share-modal-close {
    background: none;
    border: none;
    font-size: 32px;
    color: #999;
    cursor: pointer;
    padding: 0;
    width: 32px;
    height: 32px;
    line-height: 1;
    transition: color 0.3s ease;
}

.share-modal-close:hover {
    color: #333;
}

.share-modal-body {
    padding: 30px 25px;
}

.share-options {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.share-option {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 25px 15px;
    text-decoration: none;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    transition: all 0.3s ease;
    cursor: pointer;
    background: #fff;
}

.share-option:hover {
    border-color: #ff6b35;
    background: #fff5f2;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 107, 53, 0.2);
}

.share-option span {
    margin-top: 10px;
    font-size: 14px;
    font-weight: 600;
    color: #333;
}

.share-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    font-weight: 700;
    color: #fff;
}

.facebook-icon {
    background: #1877f2;
}

.youtube-icon {
    background: #ff0000;
}

.google-icon {
    background: #4285f4;
}

.email-icon {
    background: #34a853;
}

.copy-icon {
    background: #6c757d;
}

@media (max-width: 576px) {
    .share-modal-content {
        margin: 20% auto;
        width: 95%;
    }
    
    .share-options {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .share-option {
        flex-direction: row;
        padding: 20px;
        text-align: left;
    }
    
    .share-option span {
        margin-top: 0;
        margin-left: 15px;
    }
}

/* Copy Notification */
.copy-notification {
    position: fixed;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%) translateY(100px);
    background: #28a745;
    color: #fff;
    padding: 15px 30px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    z-index: 10001;
    opacity: 0;
    transition: all 0.3s ease;
    font-weight: 600;
    font-size: 14px;
}

.copy-notification.show {
    opacity: 1;
    transform: translateX(-50%) translateY(0);
}
</style>

<script type="text/javascript">
jQuery(document).ready(function($) {
    var currentUrl = window.location.href;
    var jobTitle = '<?php echo esc_js( get_the_title() ); ?>';
    
    // Share button - Open modal
    $('.btn-share').on('click', function(e) {
        e.preventDefault();
        $('#share-modal').addClass('active');
        $('body').css('overflow', 'hidden');
    });
    
    // Close modal
    $('.share-modal-close, .share-modal-overlay').on('click', function(e) {
        e.preventDefault();
        $('#share-modal').removeClass('active');
        $('body').css('overflow', '');
    });
    
    // Close modal on Escape key
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && $('#share-modal').hasClass('active')) {
            $('#share-modal').removeClass('active');
            $('body').css('overflow', '');
        }
    });
    
    // Handle share options
    $('.share-option').on('click', function(e) {
        e.preventDefault();
        var platform = $(this).data('platform');
        var shareUrl = encodeURIComponent(currentUrl);
        var shareTitle = encodeURIComponent(jobTitle);
        var shareWindow = '';
        
        switch(platform) {
            case 'facebook':
                shareWindow = 'https://www.facebook.com/sharer/sharer.php?u=' + shareUrl;
                window.open(shareWindow, 'facebook-share', 'width=600,height=400');
                break;
                
            case 'youtube':
                // YouTube doesn't have a direct share, but we can open YouTube with search
                shareWindow = 'https://www.youtube.com/results?search_query=' + shareTitle;
                window.open(shareWindow, 'youtube-share', 'width=800,height=600');
                break;
                
            case 'google':
                // Google+ is deprecated, using Google Bookmarks or general share
                shareWindow = 'https://www.google.com/bookmarks/mark?op=edit&bkmk=' + shareUrl + '&title=' + shareTitle;
                window.open(shareWindow, 'google-share', 'width=600,height=400');
                break;
                
            case 'email':
                var emailSubject = encodeURIComponent('Check out this job: ' + jobTitle);
                var emailBody = encodeURIComponent('I found this job that might interest you:\n\n' + jobTitle + '\n' + currentUrl);
                shareWindow = 'mailto:?subject=' + emailSubject + '&body=' + emailBody;
                window.location.href = shareWindow;
                break;
                
            case 'copy':
                copyToClipboard(currentUrl);
                $('#share-modal').removeClass('active');
                $('body').css('overflow', '');
                return false;
        }
    });
    
    // Copy to clipboard function
    function copyToClipboard(text) {
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(text).then(function() {
                showCopySuccess();
            }).catch(function(err) {
                console.error('Failed to copy: ', err);
                fallbackCopyTextToClipboard(text);
            });
        } else {
            fallbackCopyTextToClipboard(text);
        }
    }
    
    // Fallback function for copying text
    function fallbackCopyTextToClipboard(text) {
        var textArea = document.createElement("textarea");
        textArea.value = text;
        textArea.style.top = "0";
        textArea.style.left = "0";
        textArea.style.position = "fixed";
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        
        try {
            var successful = document.execCommand('copy');
            if (successful) {
                showCopySuccess();
            } else {
                alert('Unable to copy URL. Please copy manually: ' + text);
            }
        } catch (err) {
            console.error('Fallback: Oops, unable to copy', err);
            alert('Unable to copy URL. Please copy manually: ' + text);
        }
        
        document.body.removeChild(textArea);
    }
    
    // Show copy success message
    function showCopySuccess() {
        // Create a temporary notification
        var $notification = $('<div class="copy-notification">Link copied to clipboard!</div>');
        $('body').append($notification);
        setTimeout(function() {
            $notification.addClass('show');
        }, 100);
        
        setTimeout(function() {
            $notification.removeClass('show');
            setTimeout(function() {
                $notification.remove();
            }, 300);
        }, 2000);
    }
    
    // Apply button - Increment apply clicks
    $('.btn-apply').on('click', function(e) {
        e.preventDefault();
        var $btn = $(this);
        var jobId = $btn.data('job-id');
        
        // Disable button to prevent multiple clicks
        $btn.prop('disabled', true);
        var originalText = $btn.text();
        $btn.text('APPLYING...');
        
        // Make AJAX request
        $.ajax({
            url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
            type: 'POST',
            data: {
                action: 'jobscout_increment_apply_clicks',
                job_id: jobId,
                nonce: '<?php echo wp_create_nonce( 'jobscout_apply_nonce' ); ?>'
            },
            success: function(response) {
                if (response.success) {
                    $btn.text('APPLIED!');
                    $btn.css('background', '#28a745');
                    $btn.css('border-color', '#28a745');
                    $btn.css('color', '#fff');
                    
                    // Re-enable button after 2 seconds
                    setTimeout(function() {
                        $btn.prop('disabled', false);
                        $btn.text(originalText);
                        $btn.css('background', 'transparent');
                        $btn.css('border-color', '#ff6b35');
                        $btn.css('color', '#ff6b35');
                    }, 2000);
                } else {
                    alert('Error: ' + (response.data || 'Failed to record application'));
                    $btn.prop('disabled', false);
                    $btn.text(originalText);
                }
            },
            error: function() {
                alert('Error: Failed to record application. Please try again.');
                $btn.prop('disabled', false);
                $btn.text(originalText);
            }
        });
    });
});
</script>

<?php
endwhile; // End of the loop.

get_footer();