<?php
get_header();
?>

<div class="news-detail-wrapper container">

    <!-- Breadcrumb Navigation -->
    <div id="breadcrumbs" class="news-breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
        <span class="breadcrumb-separator">/</span>
        <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/news' ) ); ?>">All News</a>
        <span class="breadcrumb-separator">/</span>
        <span class="breadcrumb-current">News Detail</span>
    </div>

    <!-- Card news-detail-header -->
    <div class="news-detail-header">

        <!-- Thumb hình vuông bên trái -->
        <div class="news-detail-thumb">
            <?php if ( has_post_thumbnail() ) the_post_thumbnail('large'); ?>
        </div>

        <!-- Thông tin bên phải thumb -->
        <div class="news-detail-info">

            <!-- Tiêu đề -->
            <h1 class="news-detail-title"><?php the_title(); ?></h1>

            <!-- Ngày đăng -->
            <div class="news-meta-row">
                Posted: <?php echo get_the_date(); ?>
            </div>

            <!-- Category + Location nằm ngang -->
            <div class="news-meta-row category-location">
                <span>Category: <?php the_category(', '); ?></span>
                <span>Location: 
                    <?php 
                    $loc = get_post_meta(get_the_ID(), 'location', true);
                    echo $loc ? $loc : '—';
                    ?>
                </span>
            </div>

        </div>

        <!-- Nút Share bên phải -->
        <div class="share-box">
            <button class="share-btn">SHARE</button>
        </div>

    </div>
    <!-- End news-detail-header -->

    <!-- Nội dung bài viết -->
    <div class="news-detail-content">
        <?php
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
        ?>
    </div>

    <!-- Bài viết mới nhất -->
    <h2 class="news-section-title">NEWEST BLOG ENTRIES</h2>

    <div class="news-list">
        <?php
        $related = new WP_Query([
            'post_type' => 'post',
            'post__not_in' => [get_the_ID()],
            'posts_per_page' => 6,
        ]);

        while ( $related->have_posts() ) : $related->the_post(); ?>
            <div class="news-item">
                <div class="news-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                    </a>
                </div>

                <div class="news-content">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="excerpt"><?php the_excerpt(); ?></div>
                    <a class="read-more-btn" href="<?php the_permalink(); ?>">Read More</a>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>

</div>

<?php
get_footer();
?>
