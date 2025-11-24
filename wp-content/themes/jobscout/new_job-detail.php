<?php
/**
 * Template Name: Job Detail Template
 * Description: A custom template for displaying job details
 *
 * @package JobScout
 */

get_header();

if (function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
}
?>

<!-- Job Detail Section -->
<div id="job-detail-section" class="job-detail-section">
    <div class="container">
        <h1>Job Detail Page</h1>
        <p>This is the job detail template.</p>
    </div>
</div>

<style>
.job-detail-section {
    padding: 60px 0;
    background: #f8f9fa;
}

.job-detail-section .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}
</style>

<?php
get_footer();
?>
