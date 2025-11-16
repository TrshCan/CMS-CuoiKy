<!-- Loader Image section  -->
<div id="sfpageLoad">

</div>
<!-- END Loader Image section  -->

<!-- javascript error loader  -->
<div class="error" id="sfsi_onload_errors" style="margin-left: 60px;display: none;">
<p><?php _e( 'We found errors in your javascript which may cause the plugin to not work properly. Please fix the error:', 'ultimate-social-media-icons' ); ?></p>
    <p id="sfsi_jerrors"></p>
</div> <!-- END javascript error loader  -->

<!-- START Admin view for plugin-->
<div class="wapper sfsi_mainContainer">

    <!-- Get notification bar-->
    <?php if (get_option("show_new_notification") == "yes") { ?>
        <script type="text/javascript">
            jQuery(document).ready(function(e) {
                jQuery(".sfsi_show_notification").click(function() {
                    SFSI.ajax({
                        url: sfsi_icon_ajax_object.ajax_url,
                        type: "post",
                        data: {
                            action: "notification_read",
                            nonce: "<?php echo wp_create_nonce('notification_read'); ?>"
                        },
                        success: function(msg) {
                            if (jQuery.trim(msg) == 'success') {
                                jQuery(".sfsi_show_notification").hide("fast");
                            }
                        }
                    });
                });
            });
        </script>
        <style type="text/css">
            .sfsi_show_notification {
                float: left;
                margin-bottom: 45px;
                padding: 12px 13px;
                width: 98%;
                background-image: url(<?php echo SFSI_PLUGURL; ?>images/notification-close.png);
                background-position: right 20px center;
                background-repeat: no-repeat;
                cursor: pointer;
                text-align: center;
            }
        </style>
        <!-- <div class="sfsi_show_notification" style="background-color: #38B54A; color: #fff; font-size: 18px;">
        New: You can now also show a subscription form on your site, increasing sign-ups! (Question 8)
        <p>
        (If question 8 gets displayed in a funny way then please reload the page by pressing Control+F5(PC) or Command+R(Mac))
        </p>
    </div> -->
    <?php } ?>
    <!-- Get notification bar-->
    <div class="sfsi_notificationBannner"></div>

    <!-- Get new_notification bar-->
    <script type="text/javascript">
        jQuery(document).ready(function() {

            jQuery("#floating").click(function() {
                jQuery("#ui-id-9").trigger("click");
                jQuery('html, body').animate({
                    scrollTop: jQuery("#ui-id-9").offset().top - jQuery("#ui-id-9").height()
                }, 2000);
            });

            jQuery("#afterposts").click(function() {
                if ("none" == jQuery("#ui-id-12").css('display')) {
                    jQuery("#ui-id-11").trigger("click");
                }
                jQuery('html, body').animate({
                    scrollTop: jQuery("#ui-id-11").offset().top - jQuery("#ui-id-11").height()
                }, 2000);
            });

        });
    </script>

    <!-- Top content area of plugin -->
    <div class="main_contant">
        <div class="row">
            <div class="col-7 col-md-9 col-lg-12">
                <h1><?php _e( 'Welcome to the Ultimate Social Icons and Share Plugin!', 'ultimate-social-media-icons' ); ?></h1>
                <div>
                    <div class="row">
                        <div class="col-12 col-lg-8 col-xxl-10">
                            <p class='sfsi-top-header-subheading font-italic'><?php
                                printf(
                                    __( 'Simply answer the questions below %1$s(at least the first 3)%2$s - that`s it!', 'ultimate-social-media-icons' ),
                                    '<span class="sfsi-top-banner-no-decoration">',
                                    '</span>'
                                );
                            ?></p>
                            <p><?php
                                printf(
                                    __( 'If you face any issue, please ask in %1$sSupport Forum%2$s. We\'ll try to respond quickly. Thank you!', 'ultimate-social-media-icons' ),
                                    '<a target="_blank" href="http://bit.ly/USM_SUPPORT_FORUM" class="sfsi-top-banner-no-decoration text-success">',
                                    '</a>'
                                );
                            ?></p>
                            <div class="d-none d-lg-flex row">
                                <div class="col-9 col-xxl-10">
                                    <p class="sfsi-top-banner-higligted-text"><?php
                                        printf(
                                            __( 'If you want %1$smore likes & shares%2$s, more placement options, better sharing features (eg: define the text and image that gets shared), optimization for mobile, %3$smore icon design styles,%4$sanimated icons,%5$sthemed icons,%6$s and %7$smuch more%8$s, then %9$sgo premium%10$s.', 'ultimate-social-media-icons' ),
                                            '<span class="font-weight-bold font-italic">',
                                            '</span>',
                                            '<a target="_blank" href="https://www.ultimatelysocial.com/extra-icon-styles/?utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" class="font-italic text-success" style="font-family: helvetica-light;">',
                                            '</a> <a target="_blank" href="https://www.ultimatelysocial.com/animated-social-media-icons/?utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" class=" text-success font-italic" style="font-family:helvetica-light">',
                                            '</a> <a target="_blank" href="https://www.ultimatelysocial.com/themed-icons-search/?utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" class="text-success font-italic" style="font-family: helvetica-light;">',
                                            '</a>',
                                            '<a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" target="_blank" class="text-success font-italic" style="font-family: helvetica-light;">',
                                            '</a>',
                                            '<a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" style="cursor:pointer; color: #12a252 !important;border-bottom: 1px solid #12a252;text-decoration: none;font-weight: bold;" target="_blank">',
                                            '</a>'
                                        );
                                    ?></p>
                                </div>
                                <div class="col-3 text-center px-0 col-xxl-2">
                                    <div class='d-table' style='width:100%;height:100%;'>
                                        <div class='d-table-row'>
                                            <div class='d-table-cell align-middle'>
                                                <div class='sfsi-premium-btn'>
                                                    <a target="_blank" href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" class="btn btn-success" style="font-family:helveticabold;font-size: 17px;text-decoration: none;"><?php _e( 'Go Premium', 'ultimate-social-media-icons' ); ?></a>
                                                </div>
                                                <a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" style="text-decoration: none;color:#414951;font-family: helveticaneue-light;" target='_blank'><?php _e( 'Learn More', 'ultimate-social-media-icons' ); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-none d-lg-flex col-4 col-lg-4 col-xxl-2">
                            <div class='d-table' style='width:100%;height:100%;'>
                                <div class='d-table-row'>
                                    <div class='d-table-cell align-bottom'>
                                        <a href="https://www.ultimatelysocial.com/usm-premium/?playvideo=1&utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" target="_blank"><img alt="" src="<?php echo SFSI_PLUGURL; ?>images/sfsi-video-play.png" style='width:100%'></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5 col-md-3 d-lg-none">
                <div style="position:relative;padding-top:56.25%;">
                    <iframe src="https://video.inchev.com/videos/embed/c952d896-34be-45bc-8142-ba14694c1bd0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                </div>
                <div class="text-center mt-5">
                    <div class='sfsi-premium-btn'>
                        <button class="btn btn-success "><?php _e( 'Go Premium', 'ultimate-social-media-icons' ); ?></button>
                    </div>
                    <span><?php _e( 'Learn more', 'ultimate-social-media-icons' ); ?></span>
                </div>
            </div>
        </div>
        <div class="d-lg-none row">
            <div class="col">
                <p class="sfsi-top-banner-higligted-text"><?php
                    printf(
                        __( 'If you want %1$smore likes & shares%2$s, more placement options, better sharing features (eg: define the text and image that gets shared), optimization for mobile, %3$smore icon design styles,%4$sanimated icons,%5$sthemed icons,%6$s and %7$smuch more%8$s, then %9$sgo premium%10$s.', 'ultimate-social-media-icons' ),
                        '<span class="font-weight-bold font-italic">',
                        '</span>',
                        '<a target="_blank" href="https://www.ultimatelysocial.com/extra-icon-styles/?utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" class="font-italic text-success" style="font-family: helvetica-light;">',
                        '</a> <a target="_blank" href="https://www.ultimatelysocial.com/animated-social-media-icons/?utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" class=" text-success font-italic" style="font-family:helvetica-light">',
                        '</a> <a target="_blank" href="https://www.ultimatelysocial.com/themed-icons-search/?utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" class="text-success font-italic" style="font-family: helvetica-light;">',
                        '</a>',
                        '<a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" target="_blank" class="text-success font-italic" style="font-family: helvetica-light;">',
                        '</a>',
                        '<a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" style="cursor:pointer; color: #12a252 !important;border-bottom: 1px solid #12a252;text-decoration: none;font-weight: bold;" target="_blank">',
                        '</a>'
                    );
                ?></p>
            </div>
        </div>
    </div>
    <!-- END Top content area of plugin -->

    <!-- step 1 end  here -->
    <div id="accordion">

        <h3><span>1</span><?php _e("Which icons do you want to show on your site? ",'ultimate-social-media-icons') ?></h3>
        <!-- step 1 end  here -->
        <?php  include(SFSI_DOCROOT . '/views/sfsi_option_view1.php'); ?>
        <!-- step 1 end here -->

        <!-- step 2 start here -->
        <h3><span>2</span><?php _e("What do you want the icons to do?",'ultimate-social-media-icons') ?> </h3>
        <?php  include(SFSI_DOCROOT . '/views/sfsi_option_view2.php'); ?>
        <!-- step 2 END here -->

        <!-- step 3 start here -->
        <h3><span>3</span><?php _e("Where shall they be displayed? ",'ultimate-social-media-icons') ?></h3>
        <?php  include(SFSI_DOCROOT . '/views/sfsi_question3.php'); ?>
        <!-- step 3 end here -->


    </div>

    <h2 class="optional"><?php _e( 'Optional', 'ultimate-social-media-icons' ); ?></h2>

    <div id="accordion1">



        <!-- step 4 start here -->
        <h3><span>4</span><?php _e("What design  ",'ultimate-social-media-icons') ?>&amp; <?php _e("animation do you want to give your icons?",'ultimate-social-media-icons') ?></h3>
        <?php  include(SFSI_DOCROOT . '/views/sfsi_option_view3.php'); ?>
        <!-- step 4 END here -->


        <!-- step 5 Start here -->
        <h3><span>5</span><?php _e("Do you want to display 'counts' next to your icons? ",'ultimate-social-media-icons') ?></h3>
        <?php  include(SFSI_DOCROOT . '/views/sfsi_option_view4.php'); ?>
        <!-- step 5 END here -->

        <!-- step 6 Start here -->
        <h3 class="sfsi_tifm_module_menu_block"><span>6</span><?php _e("Any other wishes for your main icons?",'ultimate-social-media-icons') ?></h3>
        <?php  include(SFSI_DOCROOT . '/views/sfsi_option_view5.php'); ?>
        <!-- step 6 END here -->

        <!-- step 7 Start here -->
        <h3 id="usm-normalize-h3-7p"><span>7</span><?php _e("Do you want to display a pop-up, asking people to subscribe?",'ultimate-social-media-icons') ?></h3>
        <?php include(SFSI_DOCROOT . '/views/sfsi_option_view7.php'); ?>
        <!-- step 7 END here -->

        <!-- step 8 Start here -->
        <h3><span>8</span><?php _e("Do you want to show a subscription form (",'ultimate-social-media-icons') ?><b><?php _e("increases sign ups",'ultimate-social-media-icons') ?></b>)?</h3>
        <?php  include(SFSI_DOCROOT . '/views/sfsi_option_view8.php'); ?>
        <!-- step 8 END here -->

        <!-- step 9 Start here -->
        <h3>
            <span>9</span>
            <?php _e( 'Get advice for more shares & traffic (FREE!)', 'ultimate-social-media-icons' ) ?></h3>
        <?php  include(SFSI_DOCROOT . '/views/sfsi_option_view9.php'); ?>
        <!-- step 9 END here -->

    </div>

    <div class="tab11">
        <div class="save_export">
            <div class="save_button">
                <img src="<?php echo SFSI_PLUGURL; ?>images/ajax-loader.gif" class="loader-img" alt="error" />
                <a href="javascript:;" id="save_all_settings" title="Save All Settings"><?php _e( 'Save All Settings', 'ultimate-social-media-icons' ); ?></a>
            </div>
            <?php $nonce = wp_create_nonce("sfsi_save_export"); ?>

            <div class="export_selections">
                <div class="export" id="sfsi_save_export" data-nonce="<?php echo $nonce; ?>">
                    <?php _e("Export",'ultimate-social-media-icons') ?>
                </div>

                <div><?php _e("selections",'ultimate-social-media-icons') ?></div>

            </div>
        </div>
        <p class="red_txt errorMsg" style="display:none;font-size:21px"> </p>
        <p class="green_txt sucMsg" style="display:none;font-size:21px"> </p>

        <?php
            // include(SFSI_DOCROOT . '/views/sfsi_affiliate_banner.php');
            include(SFSI_DOCROOT . '/views/sfsi_section_for_premium.php');
        ?>

        <!--<p class="bldtxtmsg">Need top-notch Wordpress development work at a competitive price? Visit us at <a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=footer_credit&utm_medium=banner">ultimatelysocial.com</a></p>-->
    </div>
    <!-- all pops of plugin under sfsi_pop_content.php file -->
    <?php  include(SFSI_DOCROOT . '/views/sfsi_pop_content.php'); ?>

</div> <!-- START Admin view for plugin-->
<?php if (in_array(get_site_url(), array('http://www.managingio.com', 'http://blog-latest.socialshare.com'))) : ?>
    <div style="text-align:center">
        <input type="text" name="domain" id="sfsi_domain_input" style="width:40%;min-height: :40px;text-align:center;margin:0 auto" placeholder="Enter Domian to check its theme" />
        <input type="text" name="sfsi_domain_input_nonce" value="<?php echo wp_create_nonce('bannerOption'); ?>">
        <div class="save_button">
            <img src="<?php echo SFSI_PLUGURL; ?>images/ajax-loader.gif" class="loader-img" alt="error" />
            <a href="javascript:;" id="sfsi_check_theme_of_domain_btn" title="Check"><?php _e("Check the Theme",'ultimate-social-media-icons') ?></a>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('#sfsi_check_theme_of_domain_btn').click(function() {
                    jQuery.ajax({
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        type: "post",
                        data: {
                            'action': 'bannerOption',
                            'domain': $('#sfsi_domain_input').val(),
                            'nonce': $('#sfsi_domain_input_nonce').val(),
                        },
                        success: function(s) {
                            var sfsi_container = $("html,body");
                            var sfsi_scrollTo = $('.sfsi_notificationBannner');
                            $('.sfsi_notificationBannner').attr('tabindex', $('.sfsi_notificationBannner').attr('tabindex') || -1);
                            jQuery(".sfsi_notificationBannner").html(s).focus();
                            sfsi_container.animate({
                                scrollTop: (sfsi_scrollTo.offset().top - sfsi_container.offset().top + sfsi_container.scrollTop()),
                                scrollLeft: 0
                            }, 300);

                        }
                    });
                });
            })
        </script>
    <?php endif; ?>
    <script type="text/javascript">
        var e = {
            action: "bannerOption",
            'nonce': '<?php echo wp_create_nonce('bannerOption'); ?>',

        };
        jQuery.ajax({
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            type: "post",
            data: e,
            success: function(s) {
                jQuery(".sfsi_notificationBannner").html(s);
            }
        });
    </script>
    <?php include(SFSI_DOCROOT . '/views/sfsi_chat_on_admin_pannel.php'); ?>
    <?php
      echo "<br /><br /><br />";
      do_action('ins_global_print_carrousel');
    ?>
