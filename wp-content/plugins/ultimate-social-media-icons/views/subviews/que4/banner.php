<div class="sf_si_our_prmium_plugin-add sfsi_prem_icons_added col-md-12">
    <div class="sf_si_prmium_head">
        <h2><?php 
            printf(
                __( '%1$sNew%2$s In our Premium Plugin we added:', 'ultimate-social-media-icons' ),
                '<span>',
                '</span>'
            );
        ?></h2>
    </div>
    <?php

    $arrDefaultImages = array(
        'default_icon_1.png', 'default_icon_2.png', 'default_icon_3.png',
        'default_icon_4.png', 'default_icon_5.png', 'default_icon_6.jpg',
        'default_icon_7.png', 'default_icon_8.jpg'
    );

    $arrThemeImages = array(
        'default_icon_9.png', 'default_icon_10.png', 'default_icon_11.png',
        'default_icon_12.png', 'default_icon_13.png', 'default_icon_14.png',
        'default_icon_15.png', 'default_icon_16.png', 'default_icon_17.png',
        'default_icon_18.png'
    );

    function sfsi_banner_sub_section($sectionTitle, $arrImages, $hrefViewMore) { 
        $imgBasePath = SFSI_PLUGURL . "images/banner/";
        ?>

        <h4 class="bannerTitle"><?php echo $sectionTitle; ?></h4>
        <div class="row banner-img">

        <?php foreach ($arrImages as $key => $img) :

                    $src = $imgBasePath . $img; ?>

        <div class="sfsi_row_table">
            <img class="banner_icon_img" src="<?php echo $src; ?>" alt='error' />
        </div>

        <?php endforeach; ?>

    </div>
    <div class="banner_view_more_wrapper">
        <a class="banner_view_more" target="_blank" href="<?php echo $hrefViewMore; ?>"><?php _e("View more",'ultimate-social-media-icons') ?><span><img src="<?php echo $imgBasePath.'arrow.png';?>"></span></a>
    </div>
    <?php } ?>


    <div class="col-md-12 sf_si_default_design d-flex">

        <div class="col-md-6">
            <?php sfsi_banner_sub_section("A) More default design styles", $arrDefaultImages, "https://www.ultimatelysocial.com/extra-icon-styles/"); ?>
        </div>

        <div class="col-md-6 sfsi-banner-right">
            <?php sfsi_banner_sub_section("B) Themed styles <span>(to match the content of your site)</span>", $arrThemeImages, "https://www.ultimatelysocial.com/themed-icons-search/"); ?>
        </div>
    </div>

    <div class="sfsi_need_another_tell_us sf_si_all_features_premium">
        <span class="star">&#9733;</span>
        <a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=more_icons_designs&utm_medium=banner" target="_blank"><?php 
            printf(
                __( 'See all %1$sfeatures%2$s Premium Plugin', 'ultimate-social-media-icons' ),
                '<span class="sbold">',
                '</span>'
            );
        ?></a>
    </div>
</div>