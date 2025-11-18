<?php
/**
 * Template Name: News Page
 *
 * @package JobScout
 */

get_header();

if (function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
}

// Lấy các setting banner từ Customizer
$banner_title    = get_theme_mod( 'news_banner_title', 'Latest News' );
$banner_image    = get_theme_mod( 'news_banner_image' );
$blog_section_title = get_theme_mod( 'blog_section_title', __( 'NEWEST BLOG ENTRIES', 'jobscout' ) );
?>

<!-- Custom News Banner -->
<?php if ( $banner_image ) : ?>
    <div id="news-banner" class="news-banner" style="background-image: url('<?php echo esc_url( $banner_image ); ?>');">
        <div class="banner-caption">
            <div class="caption-inner">
                <h1 class="title"><?php echo esc_html( $banner_title ); ?></h1>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- News Section -->
<div class="news-blog-section container">
    <!-- Section Title -->
    <h2 class="news-section-title"><?php echo esc_html( $blog_section_title ); ?></h2>
    <?php
    $news_query = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => 8,
            'orderby'        => 'date',
            'order'          => 'DESC',
    ));

    if ( $news_query->have_posts() ) :
        echo '<div class="news-list">';
        while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
            <div class="news-item">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="news-thumbnail">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                    </div>
                <?php endif; ?>
                <div class="news-content">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="excerpt"><?php the_excerpt(); ?></div>
                    <a class="read-more-btn" href="<?php the_permalink(); ?>">Read More</a>
                </div>
            </div>
        <?php endwhile;
        echo '</div>';
        wp_reset_postdata();
    else :
        echo '<p>No news found.</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>
