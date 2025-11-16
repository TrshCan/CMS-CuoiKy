<!-- Global Banners -->
<?php
// sfsi_has_gdpr_plugin_activated($gdpr_plugins);
$option5 = maybe_unserialize(get_option('sfsi_section5_options', false));
$sfsi_icons_sharing_and_traffic_tips = (isset($option5['sfsi_icons_sharing_and_traffic_tips']) && ($option5['sfsi_icons_sharing_and_traffic_tips']) == "yes");
if (!is_plugin_active('Ultimate-Premium-Plugin/usm_premium_icons.php') && $sfsi_icons_sharing_and_traffic_tips) {
    $sfsi_banner_global_firsttime_offer = maybe_unserialize(get_option('sfsi_banner_global_firsttime_offer', false));
    $sfsi_banner_global_pinterest = maybe_unserialize(get_option('sfsi_banner_global_pinterest', false));
    $sfsi_banner_global_social = maybe_unserialize(get_option('sfsi_banner_global_social', false));
    $sfsi_banner_global_load_faster = maybe_unserialize(get_option('sfsi_banner_global_load_faster', false));
    $sfsi_banner_global_shares = maybe_unserialize(get_option('sfsi_banner_global_shares', false));
    $sfsi_banner_global_gdpr = maybe_unserialize(get_option('sfsi_banner_global_gdpr', false));
    $sfsi_banner_global_http = maybe_unserialize(get_option('sfsi_banner_global_http', false));
    $sfsi_banner_global_upgrade = maybe_unserialize(get_option('sfsi_banner_global_upgrade', false));
    $sfsi_dismiss_copy_delete_post = maybe_unserialize(get_option('sfsi_dismiss_copy_delete_post', false));
    $sfsi_current_date_demo = get_option('sfsi_current_date_demo', false);


    $sfsi_install_time = strtotime(get_option('sfsi_installDate'));
    $sfsi_max_show_time = $sfsi_install_time + (120 * 60);
    $sfsi_install_day_plus_three_days = $sfsi_install_time + (4320 * 60);
    $sfsi_current_time = (date('Y-m-d h:i:s'));

    $sfsi_loyalty = get_option("sfsi_loyaltyDate");

    $sfsi_min_loyalty_time = date('Y-m-d H:i:s', strtotime($sfsi_loyalty . get_option('sfsi_installDate')));

    if (
        $sfsi_banner_global_firsttime_offer['is_active'] == "yes"
    ) {
        if ($sfsi_max_show_time >= strtotime(date('Y-m-d h:i:s')) && (!sfsi_check_not_show_other_plugin_settings_page($gallery_plugins, $optimization_plugins, $sharecount_plugins, $google_analytics, $gdpr_plugins, $woocommerce_plugins, $twitter_plugins))) :
            ?>
            <!---New installs discount-->
            <!-- <div id="sfsi_firsttime_offer" class="sfsi_new_prmium_follw  sfsi_banner_body">
                <div>
                    <p style="margin-bottom: 12px !important;">You seem to have installed the Ultimate Social media plugin for the first time – Thank you & Welcome!</p>
                    <p style="font-size:18px !important">
                        For newbies we have a special offer: get the Premium Plugin within the <span style="text-decoration: underline;">next </span><span class='sfsi_new_premium_counter' style="text-decoration: underline;"><?php echo ceil(($sfsi_max_show_time - strtotime(date('Y-m-d h:i:s'))) / 60) ?></span><span style="text-decoration: underline;"> minutes</span> and benefit from a discount of 30%! <a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=NEWINSTALL&utm_source=usmi_global&utm_campaign=new_installs&utm_medium=banner" class="sfsi_font_inherit" target="_blank" style="color:#1a1d20 !important;font-weight: bold;"><span>&#10151;</span> <span style="text-decoration: underline;">Get it now</span></a>
                    </p>
                </div>
                <div style="text-align:right;">

                    <form method="post" class="sfsi_premiumNoticeDismiss" style="padding-bottom:8px;">

                        <input type="hidden" name="sfsi-banner-global-firsttime-offer" value="true">
                        <input type="submit" name="dismiss" value="Dismiss" />

                    </form>
                </div>
            </div>
            <script>
                window.sfsi_firsttime_timerstart = <?php echo ceil(($sfsi_max_show_time - strtotime(date('Y-m-d h:i:s'))) / 60) ?>;
                window.sfsi_firsttime_timerId = window.setInterval(function() {
                    if (window.sfsi_firsttime_timerstart <= 0) {
                        var sfsi_firsttime_offer_banners = document.getElementsByClassName("sfsi_firsttime_offer");
                        if (sfsi_firsttime_offer_banners.length > 0) {
                            sfsi_firsttime_offer_banners[0].style.display = "none";
                            window.clearInterval(window.sfsi_firsttime_timerstart);
                        }
                    } else {
                        var counters = document.getElementsByClassName("sfsi_new_premium_counter");
                        if (counters.length > 0) {
                            var counter = counters[0];
                            window.sfsi_firsttime_timerstart = window.sfsi_firsttime_timerstart - 1;
                            counter.innerText = window.sfsi_firsttime_timerstart;
                        }
                    }
                }, 60 * 1000);
            </script> -->
            <!---End New installs discount-->
    <?php endif;
        }
        ?>

    <!--- Show Pinterest on mouse-over-->
    <?php
        if (sfsi_check_banner_criteria($sfsi_banner_global_pinterest, $gallery_plugins, $optimization_plugins, $sharecount_plugins, $google_analytics, $gdpr_plugins, $woocommerce_plugins, $twitter_plugins, $sfsi_current_time)) { ?>

        <div class="sfsi_new_premium_banner_body premium_banner_style1 premium_banner_unique_style6">
            <div class="premium_banner_wrapper">
            <div class="banner-img">
              <img src="<?php echo SFSI_PLUGURL . 'images/banner/premium_banner_6.png'; ?>" alt="" />
            </div>
            <p><?php
                printf(
                    __( '%1$sGet more traffic from your pictures%2$s – the Ultimate Social Media Premium Plugin allows to show a Pinterest save-icon after users move over your pictures. This increases sharing activity significantly.', 'ultimate-social-media-icons' ),
                    '<span>',
                    '</span>'
                );
            ?></p>
            </div>
            <div class="offer-btn">
            <span><a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=PINTERESTICON&utm_source=usmi_global&utm_campaign=pinterest_on_mouse_over&utm_medium=banner" target="_blank"><?php _e( 'Get it now at 20% discount', 'ultimate-social-media-icons'); ?></a></span><img src="<?php echo SFSI_PLUGURL . 'images/banner/big_arrow.png'; ?>" alt="" />
            </div>
            <div class="dismiss-btn">
               <form method="post" class="sfsi_premiumNoticeDismiss">
                   <input type="hidden" name="sfsi-banner-global-pinterest" value="true">
                   <input type="submit" name="dismiss" value="Dismiss" />
               </form>
            </div>
        </div>
    <?php
        }
        ?>
    <!---End  Show Pinterest on mouse-over-->

    <!--- Show Icons don’t show on mobile-->
    <?php
        if (sfsi_check_banner_criteria($sfsi_banner_global_social, $gallery_plugins, $optimization_plugins, $sharecount_plugins, $google_analytics, $gdpr_plugins, $woocommerce_plugins, $twitter_plugins, $sfsi_current_time)) { ?>
        <div class="sfsi_new_premium_banner_body premium_banner_style1 premium_banner_unique_style10">
            <div class="premium_banner_wrapper">
                <div class="banner-img">
                  <img src="<?php echo SFSI_PLUGURL . 'images/banner/premium_banner_10.png'; ?>" alt="" />
                </div>
                <p><?php
                    printf(
                      __( 'Your social media & sharing icons %1$sdon’t seem to show on mobile.%2$s If you want to increase sharing & traffic to your site it is very important that they do (>50% of traffic is from mobile).<br><br> Please go to the %3$sUltimate Social Media plugin%4$s page and ensure you made the right selections. If they still don’t show it could be an issue with your theme. Our premium plugin allows to place the icons separately for mobile, which always fixes this issue.', 'ultimate-social-media-icons' ),
                      '<span>',
                      '</span>',
                      '<a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=MOBILEICONS&utm_source=usmi_global&utm_campaign=mobile_icons_banner&utm_medium=banner" target="_blank">',
                      '</a>'
                    );
                ?></p>
            </div>
            <div class="offer-btn">
                <span><a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=MOBILEICONS&utm_source=usmi_global&utm_campaign=mobile_icons_banner&utm_medium=banner" target="_blank"><?php _e( 'Get it now at 20% discount', 'ultimate-social-media-icons'); ?></a></span><img src="<?php echo SFSI_PLUGURL . 'images/banner/big_arrow.png'; ?>" alt="" />
            </div>
            <div class="dismiss-btn">
                <form method="post" class="sfsi_premiumNoticeDismiss">
                    <input type="hidden" name="sfsi-banner-global-social" value="true">
                    <input type="submit" name="dismiss" value="<?php _e( 'Dismiss', 'ultimate-social-media-icons' ); ?>" />
                </form>
            </div>
        </div>
    <?php
        }
        ?>
    <!---End  Show Icons don’t show on mobile-->

    <!--- Improve your website speed-->
    <?php
        if (sfsi_check_banner_criteria($sfsi_banner_global_load_faster, $gallery_plugins, $optimization_plugins, $sharecount_plugins, $google_analytics, $gdpr_plugins, $woocommerce_plugins, $twitter_plugins, $sfsi_current_time)) {
    ?>
        <div class="sfsi_new_premium_banner_body premium_banner_style1 premium_banner_unique_style8">
            <div class="premium_banner_wrapper">
                <div class="banner-img">
                  <img src="<?php echo SFSI_PLUGURL . 'images/banner/premium_banner_8.png'; ?>" alt="" />
                </div>
                <p><?php
                    printf(
                      __( '%1$sMake your website load faster –%2$s the Ultimate Social Media %3$sPremium Plugin%4$s is the most optimized sharing plugin for speed. It also includes support to help you optimize it for minimizing loading time', 'ultimate-social-media-icons' ),
                      '<span>',
                      '</span>',
                      '<a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=IMPROVESPEED&utm_source=usmi_global&utm_campaign=improve_website_speed&utm_medium=banner" target="_blank">',
                      '</a>'
                    );
                ?></p>
            </div>
            <div class="offer-btn">
                <span><a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=IMPROVESPEED&utm_source=usmi_global&utm_campaign=improve_website_speed&utm_medium=banner" target="_blank"><?php _e( 'Get it now at 20% discount', 'ultimate-social-media-icons'); ?></a></span><img src="<?php echo SFSI_PLUGURL . 'images/banner/big_arrow.png'; ?>" alt="" />
            </div>
            <div class="dismiss-btn">
                <form method="post" class="sfsi_premiumNoticeDismiss">
                    <input type="hidden" name="sfsi-banner-global-load_faster" value="true">
                    <input type="submit" name="dismiss" value="<?php _e( 'Dismiss', 'ultimate-social-media-icons' ); ?>" />
                </form>
            </div>
        </div>
    <?php
       }
    ?>
    <!---End Improve your website speed-->

    <!--- Get more traffic-->
    <?php
        if (sfsi_check_banner_criteria($sfsi_banner_global_shares, $gallery_plugins, $optimization_plugins, $sharecount_plugins, $google_analytics, $gdpr_plugins, $woocommerce_plugins, $twitter_plugins, $sfsi_current_time)) { ?>
        <div class="sfsi_new_premium_banner_body premium_banner_style1 premium_banner_unique_style9">
            <div class="premium_banner_wrapper">
                <div class="banner-img">
                  <img src="<?php echo SFSI_PLUGURL . 'images/banner/premium_banner_9.png'; ?>" alt="" />
                </div>
                <p><?php
                    printf(
                      __( '%1$smore traffic%2$s from more likes & shares with the %3$sUltimatelysocial Premium Plugin.%4$s Or get a %5$srefund%6$s within 20 days.', 'ultimate-social-media-icons' ),
                      '<span>',
                      '</span>',
                      '<a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=MORESPEEED&utm_source=usmi_other_plugins_settings_page&utm_campaign=website_load_faster&utm_medium=banner" class="font-700" target="_blank">',
                      '</a>',
                      '<span class="font-600">',
                      '</span>'
                    );
                ?></p>
            </div>
            <div class="offer-btn">
                <span><a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=MORETRAFFIC2&utm_source=usmi_global&utm_campaign=more_traffic&utm_medium=banner" target="_blank"><?php _e( 'Get it now at 20% discount', 'ultimate-social-media-icons'); ?></a></span><img src="<?php echo SFSI_PLUGURL . 'images/banner/big_arrow.png'; ?>" alt="" />
            </div>
            <div class="dismiss-btn">
                <form method="post" class="sfsi_premiumNoticeDismiss">
                   <input type="hidden" name="sfsi-banner-global-shares" value="true">
                    <input type="submit" name="dismiss" value="<?php _e( 'Dismiss', 'ultimate-social-media-icons' ); ?>" />
                </form>
            </div>
        </div>
    <?php
        }
    ?>
    <!---End Get more traffic-->

    <!--- GDPR compliance-->
    <?php
        if (sfsi_check_banner_criteria($sfsi_banner_global_gdpr, $gallery_plugins, $optimization_plugins, $sharecount_plugins, $google_analytics, $gdpr_plugins, $woocommerce_plugins, $twitter_plugins, $sfsi_current_time)) { ?>
        <div class="sfsi_new_premium_banner_body premium_banner_style1 premium_banner_unique_style5">
            <div class="premium_banner_wrapper">
                <div class="banner-img">
                    <img src="<?php echo SFSI_PLUGURL . 'images/banner/premium_banner_5.png'; ?>" alt="" />
                </div>
                <p><?php
                    printf(
                        __( '%1$sMake sure your social media icons are GDPR compliant.%2$s You are using the %3$sUltimate Social Media Plugin%4$s – see more information about GDPR %5$shere.%6$s<br><br> If you don’t want to check GDPR compliance yourself: As part of the Ultimate Social Media Premium Plugin a GDPR review is done for you (at no extra charge)', 'ultimate-social-media-icons' ),
                        '<span>',
                        '</span>',
                        '<a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_global&discount=GDPRCOMPLIANCE2&utm_campaign=gdpr&utm_medium=banner" target="_blank">',
                        '</a>',
                        '<a href="http://ultimatelysocial.com/gdpr/?utm_source=usmi_global&utm_campaign=gdpr_page&utm_medium=banner" class="normal_font_style" target="_blank">',
                        '</a>'
                    );
                ?></p>
            </div>
            <div class="offer-btn">
                <span><a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=GDPRCOMPLIANCE2&utm_source=usmi_global&utm_campaign=gdpr&utm_medium=banner" target="_blank"><?php _e( 'Get it now at 20% discount', 'ultimate-social-media-icons'); ?></a></span><img src="<?php echo SFSI_PLUGURL . 'images/banner/big_arrow.png'; ?>" alt="" />
            </div>
            <div class="dismiss-btn">
                <form method="post" class="sfsi_premiumNoticeDismiss">
                    <input type="hidden" name="sfsi-banner-global-gdpr" value="true">
                    <input type="submit" name="dismiss" value="<?php _e( 'Dismiss', 'ultimate-social-media-icons' ); ?>" />
                </form>
            </div>
        </div>
    <?php
        }
    ?>
    <!---End GDPR compliance-->

    <!--- Share counts-->

    <?php
        if (sfsi_check_banner_criteria($sfsi_banner_global_http, $gallery_plugins, $optimization_plugins, $sharecount_plugins, $google_analytics, $gdpr_plugins, $woocommerce_plugins, $twitter_plugins, $sfsi_current_time)) {  ?>
        <div class="sfsi_new_premium_banner_body premium_banner_style1 premium_banner_unique_style11">
            <div class="premium_banner_wrapper">
                <div class="banner-img">
                  <img src="<?php echo SFSI_PLUGURL . 'images/banner/premium_banner_11.png'; ?>" alt="" />
                </div>
                <p><?php
                    printf(
                      __( '%1$sImportant:%2$s Your website used to be on http (before you enabled an SSL certificate to switch to https). We found share counts for your URLs on http which usually get lost after switch to https (because Facebook etc. provide the counts per url, and an url on https is a different url then one on http).<br><br> %3$sWe found a solution for that so that%4$s your share counts on http and https will be aggregated and your full number of share counts is restored. It is implemented in the Premium Plugin', 'ultimate-social-media-icons' ),
                      '<span class="big_font_style">',
                      '</span>',
                      '<span>',
                      '</span>'
                    );
                ?></p>
            </div>
            <div class="offer-btn">
                <span><a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=SHARECOUNTS&utm_source=usmi_global&utm_campaign=share_counts_banner&utm_medium=banner" target="_blank"><?php _e( 'Get it now', 'ultimate-social-media-icons'); ?></a></span><img src="<?php echo SFSI_PLUGURL . 'images/banner/big_arrow.png'; ?>" alt="" />
            </div>
            <div class="dismiss-btn">
                <form method="post" class="sfsi_premiumNoticeDismiss">
                   <input type="hidden" name="sfsi-banner-global-http" value="true">
                    <input type="submit" name="dismiss" value="<?php _e( 'Dismiss', 'ultimate-social-media-icons' ); ?>" />
                </form>
            </div>
        </div>
    <?php
        }
    ?>
    <!---End Share counts-->

    <!--- Loyalty discount-->
    <?php
        if (sfsi_check_banner_criteria($sfsi_banner_global_upgrade, $gallery_plugins, $optimization_plugins, $sharecount_plugins, $google_analytics, $gdpr_plugins, $woocommerce_plugins, $twitter_plugins, $sfsi_current_time) &&  $sfsi_current_time >= $sfsi_min_loyalty_time) {
    ?>
        <div class="sfsi_new_premium_banner_body premium_banner_style1 premium_banner_unique_style2">
            <div class="premium_banner_wrapper">
                <div class="banner-img">
                  <img src="<?php echo SFSI_PLUGURL . 'images/banner/premium_banner_2.png'; ?>" alt="" />
                </div>
                <p><?php
                    printf(
                      __( 'You’ve been using the %1$sUltimate Social media plugin%2$s for %3$sover half a year.%4$s That’s a long time!<br> Why not give yourself a treat and upgrade to premium? It has tons of benefits. As a %5$sTHANK YOU%6$s for your loyalty we’re happy to give you a %7$s20&#37; discount.%8$s', 'ultimate-social-media-icons' ),
                      '<a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=LOYALTYDISCOUNT&utm_source=usmi_global&utm_campaign=loyalty_banner&utm_medium=banner" target="_blank">',
                      '</a>',
                      '<span>',
                      '</span>',
                      '<span class="italic">',
                      '</span>',
                      '<span class="color-style">',
                      '</span>'
                    );
                ?></p>
            </div>
            <div class="offer-btn">
                <span><a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=LOYALTYDISCOUNT&utm_source=usmi_global&utm_campaign=loyalty_banner&utm_medium=banner" target="_blank"><?php _e( 'Apply it now', 'ultimate-social-media-icons'); ?></a></span><img src="<?php echo SFSI_PLUGURL . 'images/banner/big_arrow.png'; ?>" alt="" />
            </div>
            <div class="dismiss-btn">
                <form method="post" class="sfsi_premiumNoticeDismiss">
                   <input type="hidden" name="sfsi-banner-global-upgrade" value="true">
                    <input type="submit" name="dismiss" value="<?php _e( 'Dismiss', 'ultimate-social-media-icons' ); ?>" />
                </form>
            </div>
       </div>
<?php
    }
}
?>
<!---End Loyalty discount-->

<!---End Global Banners -->
