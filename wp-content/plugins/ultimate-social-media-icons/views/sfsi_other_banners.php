<!--Banners on other plugins’ settings pages -->

<!--- recovering sharedcount Check sharecount plugins is active -->
<?php
	$option5 = maybe_unserialize(get_option('sfsi_section5_options',false));
    $sfsi_icons_sharing_and_traffic_tips =  (isset($option5['sfsi_icons_sharing_and_traffic_tips']) &&  ($option5['sfsi_icons_sharing_and_traffic_tips']) == "yes");
   if (!is_plugin_active('Ultimate-Premium-Plugin/usm_premium_icons.php') && $sfsi_icons_sharing_and_traffic_tips) {
        $current_site_url = 0 . $_SERVER['REQUEST_URI'];
        $sfsi_dismiss_sharecount = maybe_unserialize(get_option('sfsi_dismiss_sharecount', false));
        $sfsi_dismiss_gallery = maybe_unserialize(get_option('sfsi_dismiss_gallery', false));
        $sfsi_dismiss_optimization = maybe_unserialize(get_option('sfsi_dismiss_optimization', false));
        $sfsi_dismiss_gdpr = maybe_unserialize(get_option('sfsi_dismiss_gdpr', false));
        $sfsi_dismiss_google_analytic = maybe_unserialize(get_option('sfsi_dismiss_google_analytic', false));
        $sfsi_dismiss_woocommerce = maybe_unserialize(get_option('sfsi_dismiss_woocommerce', false));
        $sfsi_dismiss_twitter = maybe_unserialize(get_option('sfsi_dismiss_twitter', false));

        /*var_dump($sfsi_dismiss_sharecount,$sfsi_dismiss_gallery,$sfsi_dismiss_optimization,$sfsi_dismiss_gdpr,$sfsi_dismiss_google_analytic);
        foreach ($gallery_plugins as $key => $gallery_plugin) {
            $sfsi_show_gallery_banner = sfsi_check_on_plugin_page($gallery_plugin['dir_slug'], $gallery_plugin['option_name'], $current_site_url);
            if ($gallery_plugin['option_name'] == 'robo-gallery-settings') {
                // var_dump(($sfsi_show_gallery_banner),'lfjgdjkf');
            }
            // var_dump($sfsi_show_gallery_banner,$gallery_plugin['option_name'] );

        }*/
        $socialObj = new sfsi_SocialHelper();
        $current_url = site_url();
        $fb_data = $socialObj->sfsi_banner_get_fb(urlencode($current_url));
        $check_fb_count_more_than_one = $fb_data > 0 || $socialObj->sfsi_get_pinterest(urlencode($current_url)) > 0;
        $sfsi_fb_count =  get_option('sfsi_fb_count', false);
        $sfsi_fb_count_check_for_shares =  $sfsi_fb_count > 0;
        ?>
       <?php
            if (is_ssl() && $sfsi_fb_count_check_for_shares && ($sfsi_dismiss_sharecount['show_banner'] == "yes" || false == $sfsi_dismiss_sharecount)) {
                // also check if there is likes on http page
                foreach ($google_analytics as $key => $sharecount_plugin) {
                    $sfsi_show_sharecount_banner = sfsi_check_on_plugin_page($sharecount_plugin['dir_slug'], $sharecount_plugin['option_name'], $current_site_url);
                    if ($sfsi_show_sharecount_banner) {
                        ?>
                    <div class="sfsi_new_premium_banner_body premium_banner_style1 premium_banner_unique_style4">
                      <div class="premium_banner_wrapper">
                          <div class="banner-img">
                            <img src="<?php echo SFSI_PLUGURL . 'images/banner/premium_banner_4.png'; ?>" alt="" />
                          </div>
                          <p><?php
                              printf(
                                __( '%1$sYou’re on https,%2$s that’s great! However: we noticed that you still have share & like counts (from social media) on your old (http://) urls. If you don’t want to lose them, check out this plugin which has a share count recovery feature.', 'ultimate-social-media-icons' ),
                                '<span>',
                                '</span>'
                              );
                          ?></p>
                      </div>
                      <div class="offer-btn">
                          <span><a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=RECOVERSHARECOUNT&utm_source=usmi_other_plugins_settings_page&utm_campaign=sharedcount_recovery_banner&utm_medium=banner" target="_blank"><?php _e( 'Get it now at 20% discount', 'ultimate-social-media-icons'); ?></a></span><img src="<?php echo SFSI_PLUGURL . 'images/banner/big_arrow.png'; ?>" alt="" />
                      </div>
                      <div class="dismiss-btn">
                          <form method="post" class="sfsi_premiumNoticeDismiss">
                            <input type="hidden" name="sfsi-dismiss-sharecount" value="true">
                            <input type="submit" name="dismiss" value="<?php _e( 'Dismiss', 'ultimate-social-media-icons' ); ?>" />
                          </form>
                      </div>
                    </div>
       <?php
                    }
                    if ($sfsi_show_sharecount_banner) {
                        break;
                    }
                }
            }
            ?>
       <!---End check optimization plugins is active-->

       <!---Pinterest on mouse-over Check gallery plugins is active -->
       <?php
            if ((is_array($sfsi_dismiss_gallery) && isset($sfsi_dismiss_gallery['show_banner']) &&  $sfsi_dismiss_gallery['show_banner'] == "yes") || false == $sfsi_dismiss_gallery) {
                foreach ($gallery_plugins as $key => $gallery_plugin) {
                    $sfsi_show_gallery_banner = sfsi_check_on_plugin_page($gallery_plugin['dir_slug'], $gallery_plugin['option_name'], $current_site_url);

                    if ($sfsi_show_gallery_banner) {
                        if (function_exists("sfsi_get_plugin")) {
                            $plugin = sfsi_get_plugin($gallery_plugin['dir_slug']);
                        } else {
                            $plugin = array();
                        }
                        ?>
                        <div class="sfsi_new_premium_banner_body premium_banner_style1 premium_banner_unique_style7">
                          <div class="premium_banner_wrapper">
                          <div class="banner-img">
                            <img src="<?php echo SFSI_PLUGURL . 'images/banner/premium_banner_7.png'; ?>" alt="" />
                          </div>
                          <p><?php
                              printf(
                                  __( '%1$sGet more traffic from your pictures –%2$s the %3$sUltimate Social Media Premium Plugin%4$s works excellently in conjunction with the %5$s plugin and allows to show a %6$sPinterest save-icon%7$s after users move over your pictures. This increases sharing activity significantly.', 'ultimate-social-media-icons' ),
                                  '<span>',
                                  '</span>',
                                  '<a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=PINTERESTDISCOUNT&utm_source=usmi_other_plugins_settings_page&utm_campaign=pinterest_mouse_over&utm_medium=banner" target="_blank">',
                                  '</a>',
                                  $plugin["Name"],
                                  '<span class="font-700">',
                                  '</span>'
                              );
                          ?></p>
                          </div>
                          <div class="offer-btn">
                          <span><a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=PINTERESTDISCOUNT&utm_source=usmi_other_plugins_settings_page&utm_campaign=pinterest_mouse_over&utm_medium=banner" target="_blank"><?php _e( 'Get it now at 20% discount', 'ultimate-social-media-icons'); ?></a></span><img src="<?php echo SFSI_PLUGURL . 'images/banner/big_arrow.png'; ?>" alt="" />
                          </div>
                          <div class="dismiss-btn">
                             <form method="post" class="sfsi_premiumNoticeDismiss">
                                 <input type="hidden" name="sfsi-dismiss-gallery" value="true">
                                 <input type="submit" name="dismiss" value="Dismiss" />
                             </form>
                          </div>
                        </div>
       <?php
                    }
                    if ($sfsi_show_gallery_banner) {
                        break;
                    }
                }
            }
            ?>
       <!---End check gallery plugins is active -->


       <!---Website speed Check optimization plugins is active -->
       <?php
            if ($sfsi_dismiss_optimization['show_banner'] == "yes" || false == $sfsi_dismiss_optimization) {
                foreach ($optimization_plugins as $key => $optimization_plugin) {
                    $sfsi_show_optimization_banner = sfsi_check_on_plugin_page($optimization_plugin['dir_slug'], $optimization_plugin['option_name']);
                    if ($sfsi_show_optimization_banner) {
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
                                  '<a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=MORESPEEED&utm_source=usmi_other_plugins_settings_page&utm_campaign=website_load_faster&utm_medium=banner" target="_blank">',
                                  '</a>'
                                );
                            ?></p>
                        </div>
                        <div class="offer-btn">
                            <span><a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=MORESPEEED&utm_source=usmi_other_plugins_settings_page&utm_campaign=website_load_faster&utm_medium=banner" target="_blank"><?php _e( 'Get it now at 20% discount', 'ultimate-social-media-icons'); ?></a></span><img src="<?php echo SFSI_PLUGURL . 'images/banner/big_arrow.png'; ?>" alt="" />
                        </div>
                        <div class="dismiss-btn">
                            <form method="post" class="sfsi_premiumNoticeDismiss">
                               <input type="hidden" name="sfsi-dismiss-optimization" value="true">
                                <input type="submit" name="dismiss" value="<?php _e( 'Dismiss', 'ultimate-social-media-icons' ); ?>" />
                            </form>
                        </div>
                   </div>
       <?php
                    }
                    if ($sfsi_show_optimization_banner) {
                        break;
                    }
                }
            }
            ?>
       <!---End check optimization plugins is active-->


       <!---GDPR compliance Check GDPR plugins is active-->
       <?php
            if ($sfsi_dismiss_gdpr['show_banner'] == "yes" || false == $sfsi_dismiss_gdpr) {

                foreach ($gdpr_plugins as $key => $gdpr_plugin) {
                    $sfsi_show_gdpr_banner = sfsi_check_on_plugin_page($gdpr_plugin['dir_slug'], $gdpr_plugin['option_name'], $current_site_url);
                    if ($sfsi_show_gdpr_banner) {
                        ?>
                      <div class="sfsi_new_premium_banner_body premium_banner_style1 premium_banner_unique_style5">
                        <div class="premium_banner_wrapper">
                          <div class="banner-img">
                            <img src="<?php echo SFSI_PLUGURL . 'images/banner/premium_banner_5.png'; ?>" alt="" />
                          </div>
                           <p><?php
                                printf(
                                    __( '%1$sMake sure your site is GDPR compliant.%2$s As part of the Ultimate Social Media Premium Plugin you can request a review (at no extra charge) to check if your sharing icons are GDPR compliant.', 'ultimate-social-media-icons' ),
                                    '<span>',
                                    '</span>'
                                );
                            ?></p>
                        </div>
                        <div class="offer-btn">
                          <span><a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=GDPRCOMPLIANT&utm_source=usmi_other_plugins_settings_page&utm_campaign=gdpr_compliance&utm_medium=banner" target="_blank"><?php _e( 'Get it now at 20% discount', 'ultimate-social-media-icons'); ?></a></span><img src="<?php echo SFSI_PLUGURL . 'images/banner/big_arrow.png'; ?>" alt="" />
                        </div>
                         <div class="dismiss-btn">
                             <form method="post" class="sfsi_premiumNoticeDismiss">
                                 <input type="hidden" name="sfsi-dismiss-gdpr" value="true">
                                 <input type="submit" name="dismiss" value="Dismiss" />
                             </form>
                         </div>
                      </div>
       <?php
                    }
                    if ($sfsi_show_gdpr_banner) {
                        break;
                    }
                }
            }
            ?>
       <!---End check GDPR plugins is active-->


       <!---More traffic Check Google analytics plugin is active-->
       <?php
            if ($sfsi_dismiss_google_analytic['show_banner'] == "yes" || false == $sfsi_dismiss_google_analytic) {
                foreach ($sharecount_plugins as $key => $google_analytic) {
                    $sfsi_show_google_analytic_banner = sfsi_check_on_plugin_page($google_analytic['dir_slug'], $google_analytic['option_name'], $current_site_url);
                    if ($sfsi_show_google_analytic_banner) {
                        ?>
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
                                    '<a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=MORETRAFFIC&utm_source=usmi_other_plugins_settings_page&utm_campaign=more_traffic&utm_medium=banner" class="font-700" target="_blank">',
                                    '</a>',
                                    '<span class="font-600">',
                                    '</span>'
                                  );
                              ?></p>
                          </div>
                          <div class="offer-btn">
                              <span><a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=MORETRAFFIC&utm_source=usmi_other_plugins_settings_page&utm_campaign=more_traffic&utm_medium=banner" target="_blank"><?php _e( 'Get it now at 20% discount', 'ultimate-social-media-icons'); ?></a></span><img src="<?php echo SFSI_PLUGURL . 'images/banner/big_arrow.png'; ?>" alt="" />
                          </div>
                          <div class="dismiss-btn">
                              <form method="post" class="sfsi_premiumNoticeDismiss">
                                 <input type="hidden" name="sfsi-dismiss-google-analytic" value="true">
                                  <input type="submit" name="dismiss" value="<?php _e( 'Dismiss', 'ultimate-social-media-icons' ); ?>" />
                              </form>
                          </div>
                      </div>
       <?php
                    }
                    if ($sfsi_show_google_analytic_banner) {
                        break;
                    }
                }
            }

            ?>
       <!---End Check Google analytics plugin is active-->

       <!---Check Woocommerce plugin is active-->
       <?php
            if ($sfsi_dismiss_woocommerce['show_banner'] == "yes" || false == $sfsi_dismiss_woocommerce) {
                foreach ($woocommerce_plugins as $key => $woocommerce_plugin) {
                    $sfsi_show_woocommerce_banner = sfsi_check_on_plugin_page($woocommerce_plugin['dir_slug'], $woocommerce_plugin['option_name']);
                    if ($sfsi_show_woocommerce_banner) {
                        ?>
                    <div class="sfsi_new_premium_banner_body premium_banner_style1 premium_banner_unique_style3" style="margin-top: 90px;">
                      <div class="premium_banner_wrapper">
                          <div class="banner-img">
                            <img src="<?php echo SFSI_PLUGURL . 'images/banner/premium_banner_3.png'; ?>" alt="" />
                          </div>
                          <p><?php
                              printf(
                                __( '%1$sGet more sales%2$s with the Ultimate Social Media %3$sPremium Plugin%4$s by adding social share icons to your product pages. More shares equals more publicity, and more publicity means more new customers.', 'ultimate-social-media-icons' ),
                                '<span>',
                                '</span>',
                                '<a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_other_plugins_settings_page&utm_campaign=woocommerce&utm_medium=banner" target="_blank">',
                                '</a>'
                              );
                          ?></p>
                      </div>
                      <div class="offer-btn">
                          <span><a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=WOOCOMMERCE&utm_source=usmi_other_plugins_settings_page&utm_campaign=woocommerce&utm_medium=banner" target="_blank"><?php _e( 'Get it now at 20% discount', 'ultimate-social-media-icons'); ?></a></span><img src="<?php echo SFSI_PLUGURL . 'images/banner/big_arrow.png'; ?>" alt="" />
                      </div>
                      <div class="dismiss-btn">
                          <form method="post" class="sfsi_premiumNoticeDismiss">
                            <input type="hidden" name="sfsi-dismiss-woocommerce" value="true">
                            <input type="submit" name="dismiss" value="<?php _e( 'Dismiss', 'ultimate-social-media-icons' ); ?>" />
                          </form>
                      </div>
                     </div>
          <?php
                    }
                    if ($sfsi_show_woocommerce_banner) {
                        break;
                    }
                }
            }
            ?>
       <!---End Woocommerce plugin is active-->

       <!---Check Twitter plugin's is active-->
       <?php
            if ($sfsi_dismiss_twitter['show_banner'] == "yes" || false == $sfsi_dismiss_twitter) {
                foreach ($twitter_plugins as $key => $twitter_plugin) {
                    $sfsi_show_twitter_banner = sfsi_check_on_plugin_page($twitter_plugin['dir_slug'], $twitter_plugin['option_name']);
                    if ($sfsi_show_twitter_banner) {
                        ?>
                   <div class="sfsi_new_premium_banner_body premium_banner_style1 premium_banner_unique_style1">
                      <div class="premium_banner_wrapper">
                        <div class="banner-img">
                          <img src="<?php echo SFSI_PLUGURL . 'images/banner/premium_banner_1.png'; ?>" alt="" />
                        </div>
                         <p><?php
                              printf(
                                  __( '%1$sGet more visibility on Twitter%2$s by displaying more information than a standard Tweet. Attach images and automatically pull the titles & links of the posts to make them much more attractive and visual with the Ultimate Social Media %3$sPremium Plugin.%4$s', 'ultimate-social-media-icons' ),
                                  '<span>',
                                  '</span>',
                                  '<a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_other_plugins_settings_page&utm_campaign=twitter&utm_medium=banner" target="_blank">',
                                  '</a>'
                              );
                          ?></p>
                      </div>
                      <div class="offer-btn">
                        <span><a href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&discount=TWITTER&utm_source=usmi_other_plugins_settings_page&utm_campaign=twitter&utm_medium=banner" target="_blank"><?php _e( 'Get it now at 20% discount', 'ultimate-social-media-icons'); ?></a></span><img src="<?php echo SFSI_PLUGURL . 'images/banner/big_arrow.png'; ?>" alt="" />
                      </div>
                       <div class="dismiss-btn">
                           <form method="post" class="sfsi_premiumNoticeDismiss">
                               <input type="hidden" name="sfsi-dismiss-twitter" value="true">
                               <input type="submit" name="dismiss" value="Dismiss" />
                           </form>
                       </div>
                   </div>
   <?php
                }
                if ($sfsi_show_twitter_banner) {
                    break;
                }
            }
        }
    }
    ?>
   <!---End Twitter plugin's is active-->

   <!---End Banners on other plugins’ settings pages -->
