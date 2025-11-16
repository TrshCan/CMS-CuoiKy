<?php
function sfsi_update_plugin()
{
    $sfsi_responsive_icons_default = array(
        "default_icons" => array(
            "facebook" => array("active" => "yes", "text" => "Share on Facebook", "url" => ""),
            "Twitter" => array("active" => "yes", "text" => "Post on X", "url" => ""),
            "Follow" => array("active" => "yes", "text" => "Follow us", "url" => ""),
            "Pinterest" => array("active" => "yes", "text" => "Save", "url" => "")
        ),
        "custom_icons" => array(),
        "settings" => array(
            "icon_size" => "Medium",
            "icon_width_type" => "Fully responsive",
            "icon_width_size" => 240,
            "edge_type" => "Round",
            "edge_radius" => 5,
            "style" => "Gradient",
            "margin" => 10,
            "text_align" => "Centered",
            "show_count" => "no",
            "counter_color" => "#aaaaaa",
            "counter_bg_color" => "#fff",
            "share_count_text" => "SHARES",
            "margin_above" => 10,
            "margin_below" => 10
        )
    );
    if ($feed_id = get_option('sfsi_feed_id')) {
        if (is_numeric($feed_id)) {
            $sfsiId = SFSI_updateFeedUrl();
            update_option('sfsi_feed_id', sanitize_text_field($sfsiId->feed_id));
            update_option('sfsi_redirect_url', esc_url($sfsiId->redirect_url));
        }
        if ("" == $feed_id) {
            $sfsiId = SFSI_getFeedUrl();
            update_option('sfsi_feed_id', sanitize_text_field($sfsiId->feed_id));
            update_option('sfsi_redirect_url', esc_url($sfsiId->redirect_url));
        }
    }
    if (!get_option('sfsi_custom_icons')) {
        update_option("sfsi_custom_icons", "yes");
    }

    //Install version
    update_option("sfsi_pluginVersion", "2.77");
    update_option("sfsi_was_installed_before", SFSI_PLUGIN_VERSION);

    if (!get_option('sfsi_serverphpVersionnotification')) {
        add_option("sfsi_serverphpVersionnotification", "yes");
    }
    if (!get_option('sfsi_footer_sec')) {
        add_option('sfsi_footer_sec', 'no');
    }
    /* show notification premium plugin */
    if (!get_option('show_premium_notification')) {
        add_option("show_premium_notification", "yes");
    }

    if (!get_option('show_premium_cumulative_count_notification')) {
        add_option("show_premium_cumulative_count_notification", "yes");
    }

    /*show notification*/
    if (!get_option('show_notification')) {
        add_option("show_notification", "yes");
    }
    /*show notification*/
    if (!get_option('show_new_notification')) {
        add_option("show_new_notification", "no");
    }

    /* show mobile notification */
    $sfsi_dismiss_sharecount = maybe_unserialize(get_option('sfsi_dismiss_sharecount'));
    if (!isset($sfsi_dismiss_sharecount) || empty($sfsi_dismiss_sharecount)) {
        $sfsi_dismiss_sharecount = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        add_option("sfsi_dismiss_sharecount", serialize($sfsi_dismiss_sharecount));
    }

    $sfsi_dismiss_google_analytic = maybe_unserialize(get_option('sfsi_dismiss_google_analytic'));
    if (!isset($sfsi_dismiss_google_analytic) || empty($sfsi_dismiss_google_analytic)) {
        $sfsi_dismiss_google_analytic = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        add_option("sfsi_dismiss_google_analytic", serialize($sfsi_dismiss_google_analytic));
    }

    $sfsi_dismiss_woocommerce = maybe_unserialize(get_option('sfsi_dismiss_woocommerce'));
    if (!isset($sfsi_dismiss_woocommerce) || empty($sfsi_dismiss_woocommerce)) {
        $sfsi_dismiss_woocommerce = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        add_option("sfsi_dismiss_woocommerce", serialize($sfsi_dismiss_woocommerce));
    }

    $sfsi_dismiss_twitter = maybe_unserialize(get_option('sfsi_dismiss_twitter'));
    if (!isset($sfsi_dismiss_twitter) || empty($sfsi_dismiss_twitter)) {
        $sfsi_dismiss_twitter = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        add_option("sfsi_dismiss_twitter", serialize($sfsi_dismiss_twitter));
    }

    $sfsi_dismiss_copy_delete_post = maybe_unserialize(get_option('sfsi_dismiss_copy_delete_post'));
    if (!isset($sfsi_dismiss_copy_delete_post) || empty($sfsi_dismiss_copy_delete_post)) {
        $sfsi_dismiss_copy_delete_post = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        update_option("sfsi_dismiss_copy_delete_post", serialize($sfsi_dismiss_copy_delete_post));
    }


    $sfsi_banner_global_firsttime_offer = maybe_unserialize(get_option('sfsi_banner_global_firsttime_offer'));
    // var_dump($sfsi_banner_global_firsttime_offer);
    if (!isset($sfsi_banner_global_firsttime_offer) || empty($sfsi_banner_global_firsttime_offer) || !isset($sfsi_banner_global_firsttime_offer["is_active"])) {
        $sfsi_banner_global_firsttime_offer = array(
            'met_criteria'     => "yes",
            'is_active' => "yes",
            'timestamp' => ""
        );
        update_option("sfsi_banner_global_firsttime_offer", serialize($sfsi_banner_global_firsttime_offer));
    }

    $sfsi_dismiss_gdpr = maybe_unserialize(get_option('sfsi_dismiss_gdpr'));
    if (!isset($sfsi_dismiss_gdpr) || empty($sfsi_dismiss_gdpr)) {
        $sfsi_dismiss_gdpr = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        add_option("sfsi_dismiss_gdpr", serialize($sfsi_dismiss_gdpr));
    }

    $sfsi_dismiss_optimization = maybe_unserialize(get_option('sfsi_dismiss_optimization'));
    if (!isset($sfsi_dismiss_optimization) || empty($sfsi_dismiss_optimization)) {
        $sfsi_dismiss_optimization = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        add_option("sfsi_dismiss_optimization", serialize($sfsi_dismiss_optimization));
    }

    $sfsi_dismiss_gallery = maybe_unserialize(get_option('sfsi_dismiss_gallery'));
    if (!isset($sfsi_dismiss_gallery) || empty($sfsi_dismiss_gallery)) {
        $sfsi_dismiss_gallery = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        add_option("sfsi_dismiss_gallery", serialize($sfsi_dismiss_gallery));
    }

    $sfsi_banner_global_upgrade = maybe_unserialize(get_option('sfsi_banner_global_upgrade'));
    if (!isset($sfsi_banner_global_upgrade) || empty($sfsi_banner_global_upgrade) || !isset($sfsi_banner_global_upgrade["is_active"])) {
        $sfsi_banner_global_upgrade = array(
            'met_criteria'     => "no",
            'banner_appeared' => "no",
            'is_active' => "no",
            'timestamp' => ""
        );
        update_option("sfsi_banner_global_upgrade", serialize($sfsi_banner_global_upgrade));
    }

    $sfsi_banner_global_http = maybe_unserialize(get_option('sfsi_banner_global_http'));
    if (!isset($sfsi_banner_global_http) || empty($sfsi_banner_global_http) || !isset($sfsi_banner_global_http["is_active"])) {
        $sfsi_banner_global_http = array(
            'met_criteria'     => "no",
            'banner_appeared' => "no",
            'is_active' => "no",
            'timestamp' => ""
        );
        update_option("sfsi_banner_global_http", serialize($sfsi_banner_global_http));
    }
    $sfsi_banner_global_gdpr = maybe_unserialize(get_option('sfsi_banner_global_gdpr'));
    if (!isset($sfsi_banner_global_gdpr) || empty($sfsi_banner_global_gdpr) || !isset($sfsi_banner_global_gdpr["is_active"])) {
        $sfsi_banner_global_gdpr = array(
            'met_criteria'     => "no",
            'banner_appeared' => "no",
            'is_active' => "no",
            'timestamp' => ""
        );
        update_option("sfsi_banner_global_gdpr", serialize($sfsi_banner_global_gdpr));
    }
    $sfsi_banner_global_shares = maybe_unserialize(get_option('sfsi_banner_global_shares'));
    if (!isset($sfsi_banner_global_shares) || empty($sfsi_banner_global_shares) || !isset($sfsi_banner_global_shares["is_active"])) {
        $sfsi_banner_global_shares = array(
            'met_criteria'     => "no",
            'banner_appeared' => "no",
            'is_active' => "no",
            'timestamp' => ""
        );
        update_option("sfsi_banner_global_shares", serialize($sfsi_banner_global_shares));
    }
    $sfsi_banner_global_load_faster = maybe_unserialize(get_option('sfsi_banner_global_load_faster'));
    if (!isset($sfsi_banner_global_load_faster) || empty($sfsi_banner_global_load_faster) || !isset($sfsi_banner_global_load_faster["is_active"])) {
        $sfsi_banner_global_load_faster = array(
            'met_criteria'     => "no",
            'banner_appeared' => "no",
            'is_active' => "no",
            'timestamp' => ""
        );
        update_option("sfsi_banner_global_load_faster", serialize($sfsi_banner_global_load_faster));
    }
    $sfsi_banner_global_social = maybe_unserialize(get_option('sfsi_banner_global_social'));
    if (!isset($sfsi_banner_global_social) || empty($sfsi_banner_global_social) || !isset($sfsi_banner_global_social["is_active"])) {
        $sfsi_banner_global_social = array(
            'met_criteria'     => "no",
            'banner_appeared' => "no",
            'is_active' => "no",
            'timestamp' => ""
        );
        update_option("sfsi_banner_global_social", serialize($sfsi_banner_global_social));
    }
    $sfsi_banner_global_pinterest = maybe_unserialize(get_option('sfsi_banner_global_pinterest'));
    if (!isset($sfsi_banner_global_pinterest) || empty($sfsi_banner_global_pinterest) || !isset($sfsi_banner_global_pinterest["is_active"])) {
        $sfsi_banner_global_pinterest = array(
            'met_criteria'     => "no",
            'banner_appeared' => "no",
            'is_active' => "no",
            'timestamp' => ""
        );
        update_option("sfsi_banner_global_pinterest", serialize($sfsi_banner_global_pinterest));
    }
    $sfsi_banner_popups =  get_option('sfsi_banner_popups');
    if (!isset($sfsi_banner_popups) || empty($sfsi_banner_popups)) {
        update_option('sfsi_banner_popups', "yes");
    }

    /*Extra important options*/
    if (!get_option('sfsi_instagram_sf_count')) {

        $sfsi_instagram_sf_count = array(
            "date" => strtotime(date("Y-m-d")),
            "sfsi_sf_count" => "",
            "sfsi_instagram_count" => ""
        );
        add_option('sfsi_instagram_sf_count',  serialize($sfsi_instagram_sf_count));
    } else {

        $sfsi_instagram_sf_count_option = get_option('sfsi_instagram_sf_count', false);
        if (!is_array($sfsi_instagram_sf_count_option)) {
            $sfsi_instagram_sf_count = unserialize($sfsi_instagram_sf_count_option);
        } else {
            $sfsi_instagram_sf_count = $sfsi_instagram_sf_count_option;
        }
        $sfsi_instagram_sf_count["date_sf"] = isset($sfsi_instagram_sf_count["date"]) ? $sfsi_instagram_sf_count["date"] : '';
        $sfsi_instagram_sf_count["date_instagram"] = isset($sfsi_instagram_sf_count["date"]) ? $sfsi_instagram_sf_count["date"] : '';
        update_option('sfsi_instagram_sf_count', serialize($sfsi_instagram_sf_count));
    }

    $option4 = maybe_unserialize(get_option('sfsi_section4_options', false));

    if (isset($option4) && !empty($option4)) {
        if (!isset($option4['sfsi_instagram_clientid'])) {
            $option4['sfsi_instagram_clientid'] = '';
            $option4['sfsi_instagram_appurl']   = '';
            $option4['sfsi_instagram_token']    = '';
        }
        if (!isset($option4['sfsi_telegram_countsDisplay'])) {
            $option4['sfsi_telegram_countsDisplay'] = "no";
        }
        if (!isset($option4['sfsi_telegram_countsFrom'])) {
            $option4['sfsi_telegram_countsFrom'] = "manual";
        }
        if (!isset($option4['sfsi_telegram_manualCounts'])) {
            $option4['sfsi_telegram_manualCounts'] = "20";
        }

        if (!isset($option4['sfsi_vk_countsDisplay'])) {
            $option4['sfsi_vk_countsDisplay'] = "no";
        }
        if (!isset($option4['sfsi_vk_countsFrom'])) {
            $option4['sfsi_vk_countsFrom'] = "manual";
        }
        if (!isset($option4['sfsi_vk_manualCounts'])) {
            $option4['sfsi_vk_manualCounts'] = "20";
        }

        if (!isset($option4['sfsi_ok_countsDisplay'])) {
            $option4['sfsi_ok_countsDisplay'] = "no";
        }
        if (!isset($option4['sfsi_ok_countsFrom'])) {
            $option4['sfsi_ok_countsFrom'] = "manual";
        }
        if (!isset($option4['sfsi_ok_manualCounts'])) {
            $option4['sfsi_ok_manualCounts'] = "20";
        }

        if (!isset($option4['sfsi_weibo_countsDisplay'])) {
            $option4['sfsi_weibo_countsDisplay'] = "no";
        }
        if (!isset($option4['sfsi_weibo_countsFrom'])) {
            $option4['sfsi_weibo_countsFrom'] = "manual";
        }
        if (!isset($option4['sfsi_weibo_manualCounts'])) {
            $option4['sfsi_weibo_manualCounts'] = "20";
        }
        if (!isset($option4['sfsi_wechat_countsDisplay'])) {
            $option4['sfsi_wechat_countsDisplay'] = "no";
        }

        if (!isset($option4['sfsi_wechat_countsFrom'])) {
            $option4['sfsi_wechat_countsFrom'] = "manual";
        }
        if (!isset($option4['sfsi_wechat_manualCounts'])) {
            $option4['sfsi_wechat_manualCounts'] = "20";
        }
        /*Youtube Channelid settings*/
        if (!isset($option4['sfsi_youtube_channelId'])) {
            $option4['sfsi_youtube_channelId'] = '';
        }

        if (isset($option4['sfsi_google_countsDisplay'])) {
            unset($option4['sfsi_google_countsDisplay']);
        }
        if (isset($option4['sfsi_google_countsFrom'])) {
            unset($option4['sfsi_google_countsFrom']);
        }
        if (isset($option4['sfsi_google_manualCounts'])) {
            unset($option4['sfsi_google_manualCounts']);
        }
        if (!isset($option4['sfsi_round_counts'])) {
            $option4['sfsi_round_counts'] = "no";
        }
        if (!isset($option4['sfsi_original_counts'])) {
            $option4['sfsi_original_counts'] = "no";
        }
        if (!isset($option4['sfsi_responsive_share_count'])) {
            $option4['sfsi_responsive_share_count'] = "no";
        }
        if (!isset($option4['sfsi_whatsapp_manualCounts'])) {
            $option4['sfsi_whatsapp_manualCounts'] = "20";
        }
        if (!isset($option4['sfsi_whatsapp_countsDisplay'])) {
            $option4['sfsi_whatsapp_countsDisplay'] = "no";
        }
        if (!isset($option4['sfsi_whatsapp_countsFrom'])) {
            $option4['sfsi_whatsapp_countsFrom'] = "manual";
        }

        if (!isset($option4['sfsi_snapchat_manualCounts'])) {
            $option4['sfsi_snapchat_manualCounts'] = "20";
        }
        if (!isset($option4['sfsi_snapchat_countsDisplay'])) {
            $option4['sfsi_snapchat_countsDisplay'] = "no";
        }
        if (!isset($option4['sfsi_snapchat_countsFrom'])) {
            $option4['sfsi_snapchat_countsFrom'] = "manual";
        }

        if (!isset($option4['sfsi_reddit_manualCounts'])) {
            $option4['sfsi_reddit_manualCounts'] = "20";
        }
        if (!isset($option4['sfsi_reddit_countsDisplay'])) {
            $option4['sfsi_reddit_countsDisplay'] = "no";
        }
        if (!isset($option4['sfsi_reddit_countsFrom'])) {
            $option4['sfsi_reddit_countsFrom'] = "manual";
        }

        if (!isset($option4['sfsi_fbmessenger_manualCounts'])) {
            $option4['sfsi_fbmessenger_manualCounts'] = "20";
        }
        if (!isset($option4['sfsi_fbmessenger_countsDisplay'])) {
            $option4['sfsi_fbmessenger_countsDisplay'] = "no";
        }
        if (!isset($option4['sfsi_fbmessenger_countsFrom'])) {
            $option4['sfsi_fbmessenger_countsFrom'] = "manual";
        }

        if (!isset($option4['sfsi_tiktok_manualCounts'])) {
            $option4['sfsi_tiktok_manualCounts'] = "20";
        }
        if (!isset($option4['sfsi_tiktok_countsDisplay'])) {
            $option4['sfsi_tiktok_countsDisplay'] = "no";
        }
        if (!isset($option4['sfsi_tiktok_countsFrom'])) {
            $option4['sfsi_tiktok_countsFrom'] = "manual";
        }

        if (!isset($option4['sfsi_mastodon_manualCounts'])) {
            $option4['sfsi_mastodon_manualCounts'] = "20";
        }
        if (!isset($option4['sfsi_mastodon_countsDisplay'])) {
            $option4['sfsi_mastodon_countsDisplay'] = "no";
        }
        if (!isset($option4['sfsi_mastodon_countsFrom'])) {
            $option4['sfsi_mastodon_countsFrom'] = "manual";
        }
    }

    $option3 = maybe_unserialize( get_option( 'sfsi_section3_options', false ) );

    if ( isset( $option3 ) && !empty( $option3 ) ) {
        if ( !isset( $option3['sfsi_mouseOver_effect_type'] ) ) {
            $option3['sfsi_mouseOver_effect_type'] = 'same_icons';
        }

        if ( !isset( $option3['mouseover_other_icons_transition_effect'] ) ) {
            $option3['mouseover_other_icons_transition_effect'] = 'flip';
        }
    }

    $option2 = maybe_unserialize( get_option( 'sfsi_section2_options', false ) );

    if ( isset( $option2 ) && !empty( $option2 ) ) {
        if ( !isset( $option2['sfsi_youtubeusernameorid'] ) ) {

            $option2['sfsi_youtubeusernameorid'] = '';

            if ( isset( $option4['sfsi_youtubeusernameorid'] ) && !empty( $option4['sfsi_youtubeusernameorid'] ) ) {
                $option2['sfsi_youtubeusernameorid'] = $option4['sfsi_youtubeusernameorid'];
            }
        }

        if (!isset($option2['sfsi_ytube_chnlid'])) {

            $option2['sfsi_ytube_chnlid'] = '';

            if (isset($option4['sfsi_ytube_chnlid']) && !empty($option4['sfsi_ytube_chnlid'])) {
                $option2['sfsi_ytube_chnlid'] = $option4['sfsi_ytube_chnlid'];
            }
        }
        if (!isset($option2['sfsi_wechatShare_option'])) {
            $option2['sfsi_wechatShare_option'] = "yes";
        }

        /* Update default option in 2.6.8 version */
        if ( !isset( $option2['sfsi_wechat_share'] ) ) {
            unset($option2['sfsi_telegram_page']);
            unset($option2['sfsi_weibo_page']);
            unset($option2['sfsi_vk_page']);
            unset($option2['sfsi_ok_page']);
        }
        /* end */

        if (!isset($option2['sfsi_telegram_message'])) {
            $option2['sfsi_telegram_message'] = "";
        }
        if (!isset($option2['sfsi_telegram_messageName'])) {
            $option2['sfsi_telegram_messageName'] = "";
        }
        if (!isset($option2['sfsi_telegram_username'])) {
            $option2['sfsi_telegram_username'] = "";
        }
        if (isset($option2['sfsi_google_page'])) {
            unset($option2['sfsi_google_page']);
        }
        if (isset($option2['sfsi_google_pageURL'])) {
            unset($option2['sfsi_google_pageURL']);
        }
        if (isset($option2['sfsi_googleLike_option'])) {
            unset($option2['sfsi_googleLike_option']);
        }
        if (isset($option2['sfsi_googleShare_option'])) {
            unset($option2['sfsi_googleShare_option']);
        }
    }

    update_option('sfsi_section4_options', serialize($option4));
    update_option('sfsi_section2_options', serialize($option2));
    $option7 = maybe_unserialize(get_option('sfsi_section7_options', false));
    $option7 = isset($option7) && !empty($option7) ? $option7 : array();

    if (!isset($option7['sfsi_show_popup'])) {
        $option7['sfsi_show_popup']                  = 'no';
    }
    if (!isset($option7['sfsi_popup_text'])) {
        $option7['sfsi_popup_text']                  = 'Enjoy this blog? Please spread the word :)';
    }
    if (!isset($option7['sfsi_popup_background_color'])) {
        $option7['sfsi_popup_background_color']      = '#eff7f7';
    }
    if (!isset($option7['sfsi_popup_border_color'])) {
        $option7['sfsi_popup_border_color']          = '#f3faf2';
    }
    if (!isset($option7['sfsi_popup_border_thickness'])) {
        $option7['sfsi_popup_border_thickness']      = '1';
    }
    if (!isset($option7['sfsi_popup_border_shadow'])) {
        $option7['sfsi_popup_border_shadow']         = 'yes';
    }
    if (!isset($option7['sfsi_popup_font'])) {
        $option7['sfsi_popup_font']                  = 'Helvetica,Arial,sans-serif';
    }
    if (!isset($option7['sfsi_popup_fontSize'])) {
        $option7['sfsi_popup_fontSize']              = '30';
    }
    if (!isset($option7['sfsi_popup_fontStyle'])) {
        $option7['sfsi_popup_fontStyle']             = 'normal';
    }
    if (!isset($option7['sfsi_popup_fontColor'])) {
        $option7['sfsi_popup_fontColor']             = '#000000';
    }
    if (!isset($option7['sfsi_Show_popupOn'])) {
        $option7['sfsi_Show_popupOn']                = 'none';
    }
    if (!isset($option7['sfsi_Show_popupOn_somepages_blogpage'])) {
        $option7['sfsi_Show_popupOn_somepages_blogpage'] = '';
    }
    if (!isset($option7['sfsi_Show_popupOn_somepages_selectedpage'])) {
        $option7['sfsi_Show_popupOn_somepages_selectedpage'] = '';
    }
    if (!isset($option7['sfsi_popup_show_on_desktop'])) {
        $option7['sfsi_popup_show_on_desktop']       = 'yes';
    }
    if (!isset($option7['sfsi_popup_show_on_mobile'])) {
        $option7['sfsi_popup_show_on_mobile']        = 'yes';
    }
    if (!isset($option7['sfsi_Show_popupOn_PageIDs'])) {
        $option7['sfsi_Show_popupOn_PageIDs']        = '';
    }
    if (!isset($option7['sfsi_Shown_popupOnceTime'])) {
        $option7['sfsi_Shown_popupOnceTime']         = '';
    }
    if (!isset($option7['sfsi_Shown_popuplimitPerUserTime'])) {
        $option7['sfsi_Shown_popuplimitPerUserTime'] = '';
    }

    update_option('sfsi_section7_options', serialize($option7));

    /* subscription form */
    $option8 = maybe_unserialize(get_option('sfsi_section8_options', false));
    $option8 = isset($option8) && !empty($option8) ? $option8 : array();

    if (!isset($option8['sfsi_form_adjustment'])) {
        $option8['sfsi_form_adjustment']          = 'yes';
    }
    if (!isset($option8['sfsi_form_height'])) {
        $option8['sfsi_form_height']              = '180';
    }
    if (!isset($option8['sfsi_form_width'])) {
        $option8['sfsi_form_width']               = '230';
    }
    if (!isset($option8['sfsi_form_border'])) {
        $option8['sfsi_form_border']              = 'yes';
    }
    if (!isset($option8['sfsi_form_border_thickness'])) {
        $option8['sfsi_form_border_thickness']    = '1';
    }
    if (!isset($option8['sfsi_form_border_color'])) {
        $option8['sfsi_form_border_color']        = '#b5b5b5';
    }
    if (!isset($option8['sfsi_form_background'])) {
        $option8['sfsi_form_background']          = '#ffffff';
    } //
    if (!isset($option8['sfsi_form_heading_text'])) {
        $option8['sfsi_form_heading_text']        = 'Get new posts by email';
    }
    if (!isset($option8['sfsi_form_heading_font'])) {
        $option8['sfsi_form_heading_font']        = 'Helvetica,Arial,sans-serif';
    }
    if (!isset($option8['sfsi_form_heading_fontstyle'])) {
        $option8['sfsi_form_heading_fontstyle']   = 'bold';
    }
    if (!isset($option8['sfsi_form_heading_fontcolor'])) {
        $option8['sfsi_form_heading_fontcolor']   = '#000000';
    }
    if (!isset($option8['sfsi_form_heading_fontsize'])) {
        $option8['sfsi_form_heading_fontsize']    = '16';
    }
    if (!isset($option8['sfsi_form_heading_fontalign'])) {
        $option8['sfsi_form_heading_fontalign']   = 'center';
    }
    if (!isset($option8['sfsi_form_field_text'])) {
        $option8['sfsi_form_field_text']          = 'Enter your email';
    }
    if (!isset($option8['sfsi_form_field_font'])) {
        $option8['sfsi_form_field_font']          = 'Helvetica,Arial,sans-serif';
    }
    if (!isset($option8['sfsi_form_field_fontstyle'])) {
        $option8['sfsi_form_field_fontstyle']     = 'normal';
    }
    if (!isset($option8['sfsi_form_field_fontcolor'])) {
        $option8['sfsi_form_field_fontcolor']     = '#000000';
    }
    if (!isset($option8['sfsi_form_field_fontsize'])) {
        $option8['sfsi_form_field_fontsize']      = '14';
    }
    if (!isset($option8['sfsi_form_field_fontalign'])) {
        $option8['sfsi_form_field_fontalign']     = 'center';
    }
    if (!isset($option8['sfsi_form_button_text'])) {
        $option8['sfsi_form_button_text']         = 'Subscribe';
    }
    if (!isset($option8['sfsi_form_button_font'])) {
        $option8['sfsi_form_button_font']         = 'Helvetica,Arial,sans-serif';
    }
    if (!isset($option8['sfsi_form_button_fontstyle'])) {
        $option8['sfsi_form_button_fontstyle']    = 'bold';
    }
    if (!isset($option8['sfsi_form_button_fontcolor'])) {
        $option8['sfsi_form_button_fontcolor']    = '#000000';
    }
    if (!isset($option8['sfsi_form_button_fontsize'])) {
        $option8['sfsi_form_button_fontsize']     = '16';
    }
    if (!isset($option8['sfsi_form_button_fontalign'])) {
        $option8['sfsi_form_button_fontalign']    = 'center';
    }
    if (!isset($option8['sfsi_form_button_background'])) {
        $option8['sfsi_form_button_background'] =  '#dedede';
    }

    update_option('sfsi_section8_options', serialize($option8));
    /*Float Icon setting*/
    $option5 = maybe_unserialize(get_option('sfsi_section5_options', false));

    $sfsi_show_via_widget           = 'no';
    $sfsi_widget_alignment          = 'Horizontal';

    $sfsi_icons_float               = 'no';
    $sfsi_icons_floatPosition       = 'center-right';
    $sfsi_icons_floatMargin_top     = '';
    $sfsi_icons_floatMargin_bottom  = '';
    $sfsi_icons_floatMargin_left    = '';
    $sfsi_icons_floatMargin_right   = '';
    $sfsi_disable_floaticons        = 'no';
    $sfsi_make_icons                = 'float';
    $sfsi_float_alignment           = 'Horizontal';
    $sfsi_float_mobile_selection    = 'no';

    $sfsi_show_via_shortcode        = 'no';
    $sfsi_shortcode_alignment       = 'Horizontal';
    $sfsi_show_via_afterposts       = 'no';

    $sfsi_responsive_icons_after_post       = 'yes';
    $sfsi_responsive_icons_after_post_on_taxonomy       = 'no';
    $sfsi_responsive_icons_after_pages       = 'no';
    $sfsi_display_after_woocomerce_desc       = 'no';

    if (isset($option5) && !empty($option5)) {

        if ( !isset( $option5['sfsi_follow_icons_language'] ) ) {
            $option5['sfsi_follow_icons_language'] = 'Follow_en_US';
        }

        if ( !isset( $option5['sfsi_facebook_icons_language'] ) ) {
            $option5['sfsi_facebook_icons_language'] = 'Visit_us_en_US';
        }

        if ( !isset( $option5['sfsi_twitter_icons_language'] ) ) {
            $option5['sfsi_twitter_icons_language'] = 'Visit_us_en_US';
        }

        if ( !isset( $option5['sfsi_linkedin_icons_language'] ) ) {
            $option5['sfsi_linkedin_icons_language'] = 'en_US';
        }

        if ( !isset( $option5['sfsi_icons_language'] ) ) {
            $option5['sfsi_icons_language'] = 'en_US';
        }

        if ( isset( $option5['sfsi_icons_language'] ) ) {
            if ( $option5['sfsi_icons_language'] == 'el_GR' ) {
                $option5['sfsi_icons_language'] == 'el';
            }

            if ( $option5['sfsi_icons_language'] == 'fi_FI' ) {
                $option5['sfsi_icons_language'] == 'fi';
            }

            if ( $option5['sfsi_icons_language'] == 'ja_JP' ) {
                $option5['sfsi_icons_language'] == 'ja';
            }
            if ( $option5['sfsi_icons_language'] == 'pt_BR' ) {
                $option5['sfsi_icons_language'] == 'pt_PT';
            }
            if ( $option5['sfsi_icons_language'] == 'th_TH' ) {
                $option5['sfsi_icons_language'] == 'th';
            }
            if ( $option5['sfsi_icons_language'] == 'vi_VN' ) {
                $option5['sfsi_icons_language'] == 'vi';
            }
            if ( in_array( $option5['sfsi_icons_language'], array( 'az_AZ', 'af_ZA', 'ms_MY', 'bn_IN', 'bs_BA', 'ca_ES', 'cy_GB', 'eo_EO', 'et_EE', 'eu_ES', 'gl_ES', 'he_IL', 'hi_IN', 'hr_HR', 'hy_AM', 'is_IS', 'lt_LT', 'my_MM', 'nn_NO', 'ps_AF', 'sl_SI', 'sq_AL', 'sr_RS', 'tl_PH', 'ug_CN', 'uk_UA', 'ur_PK' ) ) ) {
                $option5['sfsi_icons_language'] == 'en_US';
            }
        }

        if (isset($option5['sfsi_icons_float'])) {
            $sfsi_icons_float               = $option5['sfsi_icons_float'];
            unset($option5['sfsi_icons_float']);
        }

        if (isset($option5['sfsi_icons_floatPosition'])) {
            $sfsi_icons_floatPosition       = $option5['sfsi_icons_floatPosition'];
            unset($option5['sfsi_icons_floatPosition']);
        }

        if (isset($option5['sfsi_icons_floatMargin_top'])) {
            $sfsi_icons_floatMargin_top     = $option5['sfsi_icons_floatMargin_top'];
            unset($option5['sfsi_icons_floatMargin_top']);
        }

        if (isset($option5['sfsi_icons_floatMargin_bottom'])) {
            $sfsi_icons_floatMargin_bottom  = $option5['sfsi_icons_floatMargin_bottom'];
            unset($option5['sfsi_icons_floatMargin_bottom']);
        }

        if (isset($option5['sfsi_icons_floatMargin_left'])) {
            $sfsi_icons_floatMargin_left    = $option5['sfsi_icons_floatMargin_left'];
            unset($option5['sfsi_icons_floatMargin_left']);
        }

        if (isset($option5['sfsi_icons_floatMargin_right'])) {
            $sfsi_icons_floatMargin_right   = $option5['sfsi_icons_floatMargin_right'];
            unset($option5['sfsi_icons_floatMargin_right']);
        }

        if (isset($option5['sfsi_disable_floaticons'])) {
            $sfsi_disable_floaticons        = $option5['sfsi_disable_floaticons'];
            unset($option5['sfsi_disable_floaticons']);
        }

        if (isset($option5['sfsi_make_icons'])) {
            $sfsi_make_icons        = $option5['sfsi_make_icons'];
            unset($option5['sfsi_make_icons']);
        }
        if (isset($option5['sfsi_float_alignment'])) {
            $sfsi_float_alignment        = $option5['sfsi_float_alignment'];
            unset($option5['sfsi_float_alignment']);
        }
        if (isset($option5['sfsi_float_mobile_selection'])) {
            $sfsi_float_mobile_selection        = $option5['sfsi_float_mobile_selection'];
            unset($option5['sfsi_float_mobile_selection']);
        }

        if (!isset($option5['sfsi_custom_social_hide'])) {
            $option5['sfsi_custom_social_hide']    = 'no';
        }

        if (!isset($option5['sfsi_telegramIcon_order'])) {
            $option5['sfsi_telegramIcon_order']    = '11';
        }
        if (!isset($option5['sfsi_vkIcon_order'])) {
            $option5['sfsi_vkIcon_order']    = '12';
        }
        if (!isset($option5['sfsi_okIcon_order'])) {
            $option5['sfsi_okIcon_order']    = '13';
        }
        if (!isset($option5['sfsi_weiboIcon_order'])) {
            $option5['sfsi_weiboIcon_order']    = '14';
        }
        if (!isset($option5['sfsi_wechatIcon_order'])) {
            $option5['sfsi_wechatIcon_order']    = '15';
        }
        if (!isset($option5['sfsi_whatsappIcon_order'])) {
            $option5['sfsi_whatsappIcon_order']    = '16';
        }
        if (!isset($option5['sfsi_snapchatIcon_order'])) {
            $option5['sfsi_snapchatIcon_order']    = '17';
        }
        if (!isset($option5['sfsi_redditIcon_order'])) {
            $option5['sfsi_redditIcon_order']    = '18';
        }
        if (!isset($option5['sfsi_fbmessengerIcon_order'])) {
            $option5['sfsi_fbmessengerIcon_order']    = '19';
        }
        if (!isset($option5['sfsi_tiktokIcon_order'])) {
            $option5['sfsi_tiktokIcon_order']    = '20';
        }
        if (isset($options5['sfsi_mastodonIcon_order'])) {
            $option5['sfsi_mastodonIcon_order']    = '21';
        }

        if (!isset($option5['sfsi_telegram_MouseOverText'])) {
            $option5['sfsi_telegram_MouseOverText']    = 'Telegram';
        }
        if (!isset($option5['sfsi_vk_MouseOverText'])) {
            $option5['sfsi_vk_MouseOverText']    = 'VK';
        }
        if (!isset($option5['sfsi_ok_MouseOverText'])) {
            $option5['sfsi_ok_MouseOverText']    = 'OK';
        }
        if (!isset($option5['sfsi_weibo_MouseOverText'])) {
            $option5['sfsi_weibo_MouseOverText']    = 'Weibo';
        }
        if (!isset($option5['sfsi_wechat_MouseOverText'])) {
            $option5['sfsi_wechat_MouseOverText']    = 'WeChat';
        }
        if (!isset($option5['sfsi_whatsapp_MouseOverText']) || $option5['sfsi_whatsapp_MouseOverText'] == 'WhatsaApp') {
            $option5['sfsi_whatsapp_MouseOverText']    = 'WhatsApp';
        }
        if (!isset($option5['sfsi_snapchat_MouseOverText']) || $option5['sfsi_snapchat_MouseOverText'] == 'Snapchat') {
            $option5['sfsi_snapchat_MouseOverText']    = 'Snapchat';
        }
        if (!isset($option5['sfsi_fbmessenger_MouseOverText']) || $option5['sfsi_fbmessenger_MouseOverText'] == 'FbMessenger') {
            $option5['sfsi_fbmessenger_MouseOverText']    = 'FbMessenger';
        }
        if (!isset($option5['sfsi_ria_MouseOverText']) || $option5['sfsi_ria_MouseOverText'] == 'RateItAll') {
            $option5['sfsi_ria_MouseOverText']    = 'RateItAll';
        }
        if (!isset($option5['sfsi_inha_MouseOverText']) || $option5['sfsi_inha_MouseOverText'] == 'IncreasingHappiness') {
            $option5['sfsi_inha_MouseOverText']    = 'IncreasingHappiness';
        }
        if (!isset($option5['sfsi_tiktok_MouseOverText']) || $option5['sfsi_tiktok_MouseOverText'] == 'Tiktok') {
            $option5['sfsi_tiktok_MouseOverText']    = 'Tiktok';
        }
        if (!isset($option5['sfsi_mastodon_MouseOverText']) || $option5['sfsi_mastodon_MouseOverText'] == 'Mastodon') {
            $option5['sfsi_mastodon_MouseOverText']    = 'Mastodon';
        }
        if (!isset($option5['sfsi_reddit_MouseOverText']) || $option5['sfsi_reddit_MouseOverText'] == 'Reddit') {
            $option5['sfsi_reddit_MouseOverText']    = 'Reddit';
        }
        if (isset($option5['sfsi_googleIcon_order'])) {
            unset($option5['sfsi_googleIcon_order']);
        }
        if (isset($option5['sfsi_google_MouseOverText'])) {
            unset($option5['sfsi_google_MouseOverText']);
        }
        if (!isset($option5['sfsi_icons_Alignment_via_widget'])) {
            $option5['sfsi_icons_Alignment_via_widget'] =   'left';
        }
        if (!isset($option5['sfsi_icons_Alignment_via_shortcode'])) {
            $option5['sfsi_icons_Alignment_via_shortcode']  =   'left';
        }
        if (!isset($option5['sfsi_pplus_icons_suppress_errors'])) {

            $sup_errors = "no";
            $sup_errors_banner_dismissed = true;

            if (defined('WP_DEBUG') && false != WP_DEBUG) {
                $sup_errors = 'yes';
                $sup_errors_banner_dismissed = false;
            }

            $option5['sfsi_pplus_icons_suppress_errors'] = $sup_errors;
            update_option('sfsi_pplus_error_reporting_notice_dismissed', $sup_errors_banner_dismissed);
        }

        if (!isset($option5['sfsi_icons_AddNoopener'])) {
            $option5['sfsi_icons_AddNoopener'] = 'no';
        }
    }

    update_option('sfsi_section5_options', serialize($option5));

    $option6 = maybe_unserialize(get_option('sfsi_section6_options', false));

    if (isset($option6) && !empty($option6)) {
        if (!isset($option6['sfsi_rectpinit'])) {
            $option6['sfsi_rectpinit'] = 'no';
        }
        if (!isset($option6['sfsi_rectfbshare'])) {
            $option6['sfsi_rectfbshare'] = 'no';
        }
        if (!isset($option6['sfsi_rectfb'])) {
            $option6['sfsi_rectfb'] = 'yes';
        }
        if (!isset($option6['sfsi_display_button_type'])) {
            $option6["sfsi_display_button_type"] = 'responsive_button';
        }

        if (!isset($option6['sfsi_responsive_icons_end_post'])) {
            $option6["sfsi_responsive_icons_end_post"] = 'no';
        }
        if (!isset($option6['sfsi_responsive_icons'])) {
            $option6["sfsi_responsive_icons"] = $sfsi_responsive_icons_default;
        }
        update_option('sfsi_section6_options', serialize($option6));
    }
    // Setting default values for Question 3
    $option9 = maybe_unserialize(get_option('sfsi_section9_options', false));
    $option9 = isset($option9) && !empty($option9) ? $option9 : array();

    if (!isset($option9['sfsi_show_via_widget'])) {

        if (class_exists('Sfsi_Widget')) {
            $widegtObj            = new Sfsi_Widget();
            $sfsi_show_via_widget = is_active_widget(false, false, $widegtObj->id_base, true) ? "yes" : "no";
        }
        $option9['sfsi_show_via_widget'] = $sfsi_show_via_widget;
    }

    if (!isset($option9['sfsi_widget_alignment'])) {
        $option9['sfsi_widget_alignment']       = $sfsi_widget_alignment;
    }

    if (!isset($option9['sfsi_show_via_shortcode'])) {
        $option9['sfsi_show_via_shortcode']       = $sfsi_show_via_shortcode;
    }
    if (!isset($option9['sfsi_shortcode_alignment'])) {
        $option9['sfsi_shortcode_alignment']       = $sfsi_shortcode_alignment;
    }
    if (!isset($option9['sfsi_show_via_afterposts'])) {
        $option9['sfsi_show_via_afterposts']      = $sfsi_show_via_afterposts;
    }

    if (!isset($option9['sfsi_responsive_icons_after_post'])) {
        $option9['sfsi_responsive_icons_after_post']      = $sfsi_responsive_icons_after_post;
    }
    if (!isset($option9['sfsi_responsive_icons_after_post_on_taxonomy'])) {
        $option9['sfsi_responsive_icons_after_post_on_taxonomy']      = $sfsi_responsive_icons_after_post_on_taxonomy;
    }
    if (!isset($option9['sfsi_responsive_icons_after_pages'])) {
        $option9['sfsi_responsive_icons_after_pages']      = $sfsi_responsive_icons_after_pages;
    }
    if (!isset($option9['sfsi_display_after_woocomerce_desc'])) {
        $option9['sfsi_display_after_woocomerce_desc']      = $sfsi_display_after_woocomerce_desc;
    }

    if (!isset($option9['sfsi_icons_float'])) {
        $option9['sfsi_icons_float']              = $sfsi_icons_float;
    }
    if (!isset($option9['sfsi_icons_floatPosition'])) {
        $option9['sfsi_icons_floatPosition']      = $sfsi_icons_floatPosition;
    }
    if (!isset($option9['sfsi_icons_floatMargin_top'])) {
        $option9['sfsi_icons_floatMargin_top']    = $sfsi_icons_floatMargin_top;
    }
    if (!isset($option9['sfsi_icons_floatMargin_bottom'])) {
        $option9['sfsi_icons_floatMargin_bottom'] = $sfsi_icons_floatMargin_bottom;
    }
    if (!isset($option9['sfsi_icons_floatMargin_left'])) {
        $option9['sfsi_icons_floatMargin_left']   = $sfsi_icons_floatMargin_left;
    }
    if (!isset($option9['sfsi_icons_floatMargin_right'])) {
        $option9['sfsi_icons_floatMargin_right']  = $sfsi_icons_floatMargin_right;
    }
    if (!isset($option9['sfsi_disable_floaticons'])) {
        $option9['sfsi_disable_floaticons']       = $sfsi_disable_floaticons;
    }

    if (!isset($option9['sfsi_make_icons'])) {
        $option9['sfsi_make_icons']       = $sfsi_make_icons;
    }
    if (!isset($option9['sfsi_float_alignment'])) {
        $option9['sfsi_float_alignment']       = $sfsi_float_alignment;
    }
    if (!isset($option9['sfsi_float_mobile_selection'])) {
        $option9['sfsi_float_mobile_selection']       = $sfsi_float_mobile_selection;
    }


    /* For sticky bar */
    if ( !isset( $option9['sfsi_sticky_bar'] ) ) {
        $option9['sfsi_sticky_bar'] = 'no';
    }
    $sfsi_sticky_icons_default = array(
        "default_icons" => array(
            "facebook" => array("active" => "yes", "url" => ""),
            "Twitter" => array("active" => "yes", "url" => ""),
            "Follow" => array("active" => "yes",  "url" => ""),
            "Pinterest" => array("active" => "yes", "url" => ""),
        ),
        "settings" => array(
            "desktop" => "no",
            "desktop_width" => 782,
            "desktop_placement" => "left",
            "display_position" => 0,
            "desktop_placement_direction" => "up",
            "mobile" => "no",
            "mobile_width" => 784,
            "mobile_placement" => "left",
        )
    );
    if ( isset( $option9['sfsi_sticky_icons'] ) ) {
        if ( isset( $option9['sfsi_sticky_icons']['default_icons'] ) ) {
            foreach ( $sfsi_sticky_icons_default['default_icons'] as $index => $data ) {
                if ( !isset( $option9['sfsi_sticky_icons']['default_icons'][$index] ) ) {
                    $option9['sfsi_sticky_icons']['default_icons'][$index] = $data;
                }
            }
            foreach ( $sfsi_sticky_icons_default['settings'] as $index => $data ) {
                if ( !isset( $option9['sfsi_sticky_icons']['settings'][$index] ) ) {
                    $option9['sfsi_sticky_icons']['settings'][$index] = $data;
                }
            }
        } else {
            $option9['sfsi_sticky_icons']['default_icons'] = $sfsi_sticky_icons_default['default_icons'];
        }
    } else {
        $option9['sfsi_sticky_icons'] = $sfsi_sticky_icons_default;
    }

    update_option('sfsi_section9_options', serialize($option9));

    $option1 = maybe_unserialize(get_option('sfsi_section1_options', false));
    if (!isset($option1['sfsi_telegram_display'])) {
        $option1['sfsi_telegram_display'] = "no";
    }
    if (!isset($option1['sfsi_vk_display'])) {
        $option1['sfsi_vk_display'] = "no";
    }
    if (!isset($option1['sfsi_ok_display'])) {
        $option1['sfsi_ok_display'] = "no";
    }
    if (!isset($option1['sfsi_wechat_display'])) {
        $option1['sfsi_wechat_display'] = "no";
    }
    if (!isset($option1['sfsi_weibo_display'])) {
        $option1['sfsi_weibo_display'] = "no";
    }
    if (!isset($option1['sfsi_telegram_display'])) {
        $option1['sfsi_vk_display'] = "no";
    }
    if (isset($option1['sfsi_google_display'])) {
        unset($option1['sfsi_google_display']);
    }
    if (!isset($option1['sfsi_copylink_display'])) {
        $option1['sfsi_copylink_display'] = 'no';
    }
    if (!isset($option1['sfsi_whatsapp_display'])) {
        $option1['sfsi_whatsapp_display'] = "no";
    }
    update_option('sfsi_section1_options', serialize($option1));
    // Add this removed in version 2.0.2, removing values from section 1 & section 6 & setting notice display value
    sfsi_was_displaying_addthis();
    //removing as we moved to wp_remote calls and remote calls can work without curl installed.
    delete_option("sfsi_curlErrorNotices");
    delete_option("sfsi_curlErrorMessage");

    add_option('sfsi_currentDate',  date('Y-m-d h:i:s'));
    add_option('sfsi_showNextBannerDate', '14 day');
    if (get_option('sfsi_showNextBannerDate') == "21 day") {
        update_option('sfsi_showNextBannerDate', '14 day');
    }
       
    add_option('sfsi_cycleDate',  "180 day");
    add_option('sfsi_loyaltyDate',  "180 day");
    if (!get_option('sfsi_fb_count')) {
        add_option("sfsi_fb_count", "");
    }
}

function sfsi_activate_plugin()
{
    $sfsi_responsive_icons_default = array(
        "default_icons" => array(
            "facebook" => array("active" => "yes", "text" => "Share on Facebook", "url" => ""),
            "Twitter" => array("active" => "yes", "text" => "Post on X", "url" => ""),
            "Follow" => array("active" => "yes", "text" => "Follow us", "url" => ""),
            "Pinterest" => array("active" => "yes", "text" => "Save", "url" => ""),
        ),
        "custom_icons" => array(),
        "settings" => array(
            "icon_size" => "Medium",
            "icon_width_type" => "Fully responsive",
            "icon_width_size" => 240,
            "edge_type" => "Round",
            "edge_radius" => 5,
            "style" => "Gradient",
            "margin" => 10,
            "text_align" => "Centered",
            "show_count" => "no",
            "counter_color" => "#aaaaaa",
            "counter_bg_color" => "#fff",
            "share_count_text" => "SHARES",
            "margin_above" => 10,
            "margin_below" => 10
        )
    );

    add_option('sfsi_plugin_do_activation_redirect', true);

    /* check for CURL enable at server */
    // curl_enable_notice();

    if (!get_option('show_new_notification')) {
        add_option("show_new_notification", "yes");
    }

    if (!get_option('show_premium_cumulative_count_notification')) {
        add_option("show_premium_cumulative_count_notification", "yes");
    }
    update_option("sfsi_custom_icons", "no");
    $option1 = maybe_unserialize(get_option('sfsi_section1_options', false));

    if (!isset($option1) || empty($option1)) {

        $options1 = array(
            'sfsi_rss_display' => 'yes',
            'sfsi_email_display' => 'yes',
            'sfsi_facebook_display' => 'yes',
            'sfsi_twitter_display' => 'yes',
            'sfsi_pinterest_display' => 'no',
            'sfsi_telegram_display' => 'no',
            'sfsi_vk_display' => 'no',
            'sfsi_ok_display' => 'no',
            'sfsi_wechat_display' => 'no',
            'sfsi_weibo_display' => 'no',
            'sfsi_instagram_display' => 'no',
            'sfsi_ria_display' => 'no',
            'sfsi_inha_display' => 'no',
            'sfsi_linkedin_display' => 'no',
            'sfsi_youtube_display' => 'no',
            'sfsi_custom_display' => '',
            'sfsi_custom_files' => '',
            'sfsi_whatsapp_display' => 'no',
		    'sfsi_copylink_display'=> 'no',
            'sfsi_mastodon_display' => 'no',
        );
        add_option('sfsi_section1_options',  serialize($options1));
    }

    if (get_option('sfsi_feed_id') && get_option('sfsi_redirect_url')) {
        $sffeeds["feed_id"] = sanitize_text_field(get_option('sfsi_feed_id'));
        $sffeeds["redirect_url"] = esc_url(get_option('sfsi_redirect_url'));
        $sffeeds = (object) $sffeeds;
    } else {
        $sffeeds = SFSI_getFeedUrl();
    }

    $addThisDismissed = get_option('sfsi_addThis_icon_removal_notice_dismissed', false);

    if (!isset($addThisDismissed)) {
        update_option('sfsi_addThis_icon_removal_notice_dismissed', true);
    }

    $option2 = maybe_unserialize(get_option('sfsi_section2_options', false));

    if (!isset($option2) || empty($option2)) {

        /* Links and icons options */
        $options2 = array(
            'sfsi_rss_url' => sfsi_get_bloginfo('rss2_url'),
            'sfsi_rss_icons'             => 'email',
            'sfsi_email_url'             => $sffeeds->redirect_url,
            'sfsi_facebookPage_option'   => 'no',
            'sfsi_facebookPage_url'      => '',
            'sfsi_facebookLike_option'   => 'yes',
            'sfsi_facebookShare_option'  => 'yes',
            'sfsi_twitter_followme'      => 'no',
            'sfsi_twitter_followUserName' => '',
            'sfsi_twitter_aboutPage'     => 'yes',
            'sfsi_twitter_page'          => 'no',
            'sfsi_twitter_pageURL'       => '',
            'sfsi_twitter_aboutPageText' => 'Hey, check out this cool site I found: www.yourname.com #Topic via@my_x_twitter_name',
            'sfsi_youtube_pageUrl'       => '',
            'sfsi_youtube_page'          => 'no',
            'sfsi_youtubeusernameorid'   => '',
            'sfsi_ytube_chnlid'          => '',
            'sfsi_youtube_follow'        => 'no',
            'sfsi_pinterest_page'        => 'no',
            'sfsi_pinterest_pageUrl'     => '',
            'sfsi_pinterest_pingBlog'    => '',
            'sfsi_instagram_page'        => 'no',
            'sfsi_instagram_pageUrl'     => '',
            'sfsi_ria_pageUrl'     => '',
            'sfsi_inha_pageUrl'     => '',
            'sfsi_linkedin_page'         => 'no',
            'sfsi_linkedin_pageURL'      => '',
            'sfsi_linkedin_follow'       => 'no',
            'sfsi_linkedin_followCompany' => '',
            'sfsi_linkedin_SharePage'         => 'yes',
            'sfsi_linkedin_recommendBusines'  => 'no',
            'sfsi_linkedin_recommendCompany'  => '',
            'sfsi_linkedin_recommendProductId' => '',
            'sfsi_CustomIcon_links'           => '',
            'sfsi_telegram_msg_option'   => 'yes',
            'sfsi_telegram_page'       => '',
            'sfsi_telegram_pageURL'       => '',
            'sfsi_telegram_message'    => '',
            'sfsi_telegram_username'    => '',
            'sfsi_telegram_messageName'       => '',
            'sfsi_whatsapp_share' => 'yes',
            'sfsi_whatsapp_msg' => '',
            'sfsi_weibo_page'       => 'yes',
            'sfsi_weibo_pageURL'       => '',
            'sfsi_vk_page'       => 'yes',
            'sfsi_vk_pageURL'    => '',
            'sfsi_vk_share'      => '',
            'sfsi_ok_page'       => 'yes',
            'sfsi_ok_pageURL'       => '',
            'sfsi_wechat_share'       => 'share',
            'sfsi_wechat_follow'       => '',
            'sfsi_snapchat_pageURL'       => '',
            'sfsi_tiktok_page'       => '',
            'sfsi_tiktok_pageURL'       => '',
            'sfsi_fbmessenger_share'    => 'yes',
            'sfsi_fbmessenger_contact' => '',
            'sfsi_reddit_pageShare'    => 'yes',
            'sfsi_reddit_page_visit' => '',
            'sfsi_mastodon_page'       => 'yes',
            'sfsi_mastodon_pageURL'       => '',
        );
        add_option('sfsi_section2_options',  serialize($options2));
    }

    $option3 = maybe_unserialize(get_option('sfsi_section3_options', false));

    if (!isset($option3) || empty($option3)) {

        /* Design and animation option  */
        $options3 = array(

            'sfsi_mouseOver'             => 'no',
            'sfsi_mouseOver_effect'      => 'fade_in',
            'sfsi_mouseOver_effect_type' => 'same_icons',
            'mouseover_other_icons_transition_effect' => 'flip',
            'sfsi_shuffle_icons'         => 'no',
            'sfsi_shuffle_Firstload'     => 'no',
            'sfsi_shuffle_interval'      => 'no',
            'sfsi_shuffle_intervalTime'  => '',
            'sfsi_actvite_theme'         => 'default',
    		'sfsi_copylink_bgColor' => '',

        );
        add_option('sfsi_section3_options',  serialize($options3));
    }

    $option4 = maybe_unserialize(get_option('sfsi_section4_options', false));

    if (!isset($option4) || empty($option4)) {

        /* display counts options */
        $options4 = array(
            'sfsi_display_counts' => 'no',
            'sfsi_email_countsDisplay' => 'no',
            'sfsi_email_countsFrom' => 'source',
            'sfsi_email_manualCounts' => '20',
            'sfsi_rss_countsDisplay' => 'no',
            'sfsi_rss_manualCounts' => '20',
            'sfsi_facebook_PageLink' => '',
            'sfsi_facebook_countsDisplay' => 'no',
            'sfsi_facebook_countsFrom' => 'manual',
            'sfsi_facebook_enableCache' => 'yes',
            'sfsi_facebook_manualCounts' => '20',
            'sfsi_twitter_countsDisplay' => 'no',
            'sfsi_bluesky_countsDisplay' => 'no',
            'sfsi_threads_countsDisplay' => 'no',
            'sfsi_twitter_countsFrom' => 'manual',
            'sfsi_threads_countsFrom' => 'manual',
            'sfsi_bluesky_countsFrom' => 'manual',
            'sfsi_twitter_manualCounts' => '20',
            'sfsi_threads_manualCounts' => '20',
            'sfsi_bluesky_manualCounts' => '20',
            'sfsi_linkedIn_countsDisplay' => 'no',
            'sfsi_linkedIn_countsFrom' => 'manual',
            'sfsi_linkedIn_manualCounts' => '20',

            'sfsi_telegram_countsDisplay' => 'no',
            'sfsi_telegram_countsFrom' => 'manual',
            'sfsi_telegram_manualCounts' => '20',

            'sfsi_vk_countsDisplay' => 'no',
            'sfsi_vk_countsFrom' => 'manual',
            'sfsi_vk_manualCounts' => '20',

            'sfsi_ok_countsDisplay' => 'no',
            'sfsi_ok_countsFrom' => 'manual',
            'sfsi_ok_manualCounts' => '20',

            'sfsi_weibo_countsDisplay' => 'no',
            'sfsi_weibo_countsFrom' => 'manual',
            'sfsi_weibo_manualCounts' => '20',

            'sfsi_round_counts' => 'yes',
            'sfsi_original_counts' => 'yes',
            'sfsi_responsive_share_count' => 'yes',

            'sfsi_wechat_countsDisplay' => 'no',
            'sfsi_wechat_countsFrom' => 'manual',
            'sfsi_wechat_manualCounts' => '20',

            'ln_api_key' => '',
            'ln_secret_key' => '',
            'ln_oAuth_user_token' => '',
            'ln_company' => '',
            'sfsi_youtubeusernameorid' => 'name',
            'sfsi_youtube_user' => '',
            'sfsi_youtube_channelId' => '',
            'sfsi_ytube_chnlid' => '',
            'sfsi_youtube_countsDisplay' => 'no',
            'sfsi_youtube_countsFrom' => 'manual',
            'sfsi_youtube_manualCounts' => '20',
            'sfsi_pinterest_countsDisplay' => 'no',
            'sfsi_pinterest_countsFrom' => 'manual',
            'sfsi_pinterest_manualCounts' => '20',
            'sfsi_pinterest_user' => '',
            'sfsi_pinterest_board' => '',

            'sfsi_instagram_countsFrom' => 'manual',
            'sfsi_instagram_countsDisplay' => 'no',
            'sfsi_instagram_manualCounts' => '20',

            'sfsi_instagram_User' => '',
            'sfsi_whatsapp_countsDisplay' => 'no',
            'sfsi_whatsapp_countsFrom' => 'manual',
            'sfsi_whatsapp_manualCounts' => '20',

            'sfsi_snapchat_countsDisplay' => 'no',
            'sfsi_snapchat_countsFrom' => 'manual',
            'sfsi_snapchat_manualCounts' => '20',

            'sfsi_reddit_countsDisplay' => 'no',
            'sfsi_reddit_countsFrom' => 'manual',
            'sfsi_reddit_manualCounts' => '20',

            'sfsi_fbmessenger_countsDisplay' => 'no',
            'sfsi_fbmessenger_countsFrom' => 'manual',
            'sfsi_fbmessenger_manualCounts' => '20',

            'sfsi_tiktok_countsDisplay' => 'no',
            'sfsi_tiktok_countsFrom' => 'manual',
            'sfsi_tiktok_manualCounts' => '20',

            'sfsi_snapchat_countsDisplay' => 'no',
            'sfsi_snapchat_countsFrom' => 'manual',
            'sfsi_snapchat_manualCounts' => '20',

            'sfsi_reddit_countsDisplay' => 'no',
            'sfsi_reddit_countsFrom' => 'manual',
            'sfsi_reddit_manualCounts' => '20',

            'sfsi_mastodon_countsDisplay' => 'no',
            'sfsi_mastodon_countsFrom' => 'manual',
            'sfsi_mastodon_manualCounts' => '20',

        );
        add_option('sfsi_section4_options',  serialize($options4));
    }

    $option5 = maybe_unserialize(get_option('sfsi_section5_options', false));

    if (!isset($option5) || empty($option5)) {

        $options5 = array(
            'sfsi_icons_size'            => '40',
            'sfsi_icons_spacing'        => '5',
            'sfsi_icons_Alignment'        => 'left',
            'sfsi_icons_Alignment_via_widget'        => 'left',
            'sfsi_icons_Alignment_via_shortcode'        => 'left',
            'sfsi_icons_perRow'            => '5',

            'sfsi_follow_icons_language'   => 'Follow_en_US',
            'sfsi_facebook_icons_language' => 'Visit_us_en_US',
            'sfsi_youtube_icons_language'  => 'Visit_us_en_US',
            'sfsi_twitter_icons_language'  => 'Visit_us_en_US',
            'sfsi_linkedin_icons_language' => 'en_US',
            'sfsi_icons_language'          => 'en_US',

            'sfsi_icons_ClickPageOpen'    => 'yes',
            'sfsi_icons_AddNoopener'    => 'yes',
            'sfsi_icons_suppress_errors' => 'no',
            'sfsi_show_admin_popup' => 'yes',
            'sfsi_icons_sharing_and_traffic_tips' => 'yes',
            'sfsi_icons_float'            => 'no',
            'sfsi_disable_floaticons'    => 'no',
            'sfsi_make_icons' => 'no',
            'sfsi_float_alignment' => 'Horizontal',
            'sfsi_float_mobile_selection'    => 'no',
            'sfsi_icons_floatPosition'    => 'center-right',
            'sfsi_icons_floatMargin_top' => '',
            'sfsi_icons_floatMargin_bottom' => '',
            'sfsi_icons_floatMargin_left' => '',
            'sfsi_icons_floatMargin_right' => '',
            'sfsi_icons_stick'            => 'no',
            'sfsi_rssIcon_order'        => '1',
            'sfsi_emailIcon_order'        => '2',
            'sfsi_facebookIcon_order'    => '3',
            'sfsi_twitterIcon_order'    => '4',
            'sfsi_youtubeIcon_order'    => '5',
            'sfsi_pinterestIcon_order'    => '7',
            'sfsi_linkedinIcon_order'    => '8',
            'sfsi_instagramIcon_order'    => '9',
            'sfsi_telegramIcon_order'    => '11',
            'sfsi_vkIcon_order'    => '12',
            'sfsi_okIcon_order'    => '13',
            'sfsi_weiboIcon_order'    => '14',
            'sfsi_wechatIcon_order'    => '15',
            'sfsi_whatsappIcon_order'    => '16',
            'sfsi_snapchatIcon_order'    => '17',
            'sfsi_redditIcon_order'    => '18',
            'sfsi_fbmessengerIcon_order'    => '19',
            'sfsi_tiktokIcon_order'    => '20',
            'sfsi_CustomIcons_order'    => '',
            'sfsi_rss_MouseOverText'    => 'RSS',
            'sfsi_email_MouseOverText'    => 'Follow by Email',
            'sfsi_twitter_MouseOverText' => 'X (Twitter)',
            'sfsi_facebook_MouseOverText' => 'Facebook',
            'sfsi_linkedIn_MouseOverText' => 'LinkedIn',
            'sfsi_pinterest_MouseOverText' => 'Pinterest',
            'sfsi_instagram_MouseOverText' => 'Instagram',
            'sfsi_youtube_MouseOverText'  => 'YouTube',
            'sfsi_telegram_MouseOverText'  => 'Telegram',
            'sfsi_vk_MouseOverText'  => 'VK',
            'sfsi_ok_MouseOverText'  => 'OK',
            'sfsi_weibo_MouseOverText'  => 'Weibo',
            'sfsi_wechat_MouseOverText'  => 'WeChat',
            'sfsi_whatsapp_MouseOverText'  => 'WhatsApp',
            'sfsi_reddit_MouseOverText'  => 'Reddit',
            'sfsi_snapchat_MouseOverText'  => 'Snapchat',
            'sfsi_fbmessenger_MouseOverText'  => 'FbMessenger',
            'sfsi_ria_MouseOverText'  => 'RateItAll',
            'sfsi_inha_MouseOverText'  => 'IncreasingHappiness',
            'sfsi_tiktok_MouseOverText'  => 'Tiktok',
            'sfsi_mastodon_MouseOverText'  => 'Mastodon',
            'sfsi_custom_MouseOverTexts'  => '',
            'sfsi_custom_social_hide'       => 'no'
        );

        update_option('sfsi_section5_options',  serialize($options5));
    }

    $option6 = maybe_unserialize(get_option('sfsi_section6_options', false));

    if (!isset($option6) || empty($option6)) {

        /* post options */
        $options6 = array(
            'sfsi_show_Onposts' => 'no',
            'sfsi_show_Onbottom' => 'no',
            'sfsi_icons_postPositon' => 'source',
            'sfsi_icons_alignment' => 'center-right',
            'sfsi_rss_countsDisplay' => 'no',
            'sfsi_textBefor_icons' => 'Please follow and like us:',
            'sfsi_rectsub' => 'yes',
            'sfsi_rectfb' => 'yes',
            'sfsi_rectshr' => 'no',
            'sfsi_recttwtr' => 'yes',
            'sfsi_rectpinit' => 'yes',
            'sfsi_rectfbshare' => 'yes',
            'sfsi_display_button_type' => 'responsive_button',
            'sfsi_responsive_icons_end_post' => 'no',
            "sfsi_responsive_icons" => $sfsi_responsive_icons_default
        );
        add_option('sfsi_section6_options',  serialize($options6));
    }

    $option7 = maybe_unserialize(get_option('sfsi_section7_options', false));

    if (!isset($option7) || empty($option7)) {

        /* icons pop options */
        $options7 = array(
            'sfsi_show_popup' => 'no',
            'sfsi_popup_text' => 'Enjoy this blog? Please spread the word :)',
            'sfsi_popup_background_color' => '#eff7f7',
            'sfsi_popup_border_color' => '#f3faf2',
            'sfsi_popup_border_thickness' => '1',
            'sfsi_popup_border_shadow' => 'yes',
            'sfsi_popup_font' => 'Helvetica,Arial,sans-serif',
            'sfsi_popup_fontSize' => '30',
            'sfsi_popup_fontStyle' => 'normal',
            'sfsi_popup_fontColor' => '#000000',
            'sfsi_Show_popupOn' => 'none',
            'sfsi_Show_popupOn_somepages_blogpage' => '',
            'sfsi_Show_popupOn_somepages_selectedpage' => '',
            'sfsi_popup_show_on_desktop' => 'yes',
            'sfsi_popup_show_on_mobile' => 'yes',
            'sfsi_Show_popupOn_PageIDs' => '',
            'sfsi_Shown_pop' => 'ETscroll',
            'sfsi_Shown_popupOnceTime' => '',
            'sfsi_Shown_popuplimitPerUserTime' => '',
        );
        add_option('sfsi_section7_options',  serialize($options7));
    }

    $option8 = maybe_unserialize(get_option('sfsi_section8_options', false));

    if (!isset($option8) || empty($option8)) {

        /* Question 8 */
        $options8 = array(
            'sfsi_form_adjustment'      =>  'yes',
            'sfsi_form_height'          =>  '180',
            'sfsi_form_width'           =>  '230',
            'sfsi_form_border'          =>  'no',
            'sfsi_form_border_thickness' =>  '1',
            'sfsi_form_border_color'    =>  '#b5b5b5',
            'sfsi_form_background'      =>  '#ffffff',

            'sfsi_form_heading_text'    =>  'Get new posts by email',
            'sfsi_form_heading_font'    =>  'Helvetica,Arial,sans-serif',
            'sfsi_form_heading_fontstyle' => 'bold',
            'sfsi_form_heading_fontcolor' => '#000000',
            'sfsi_form_heading_fontsize' =>  '16',
            'sfsi_form_heading_fontalign' => 'center',

            'sfsi_form_field_text'      =>  'Subscribe',
            'sfsi_form_field_font'      =>  'Helvetica,Arial,sans-serif',
            'sfsi_form_field_fontstyle' =>  'normal',
            'sfsi_form_field_fontcolor' =>  '#000000',
            'sfsi_form_field_fontsize'  =>  '14',
            'sfsi_form_field_fontalign' =>  'center',

            'sfsi_form_button_text'     =>  'Subscribe',
            'sfsi_form_button_font'     =>  'Helvetica,Arial,sans-serif',
            'sfsi_form_button_fontstyle' =>  'bold',
            'sfsi_form_button_fontcolor' =>  '#000000',
            'sfsi_form_button_fontsize' =>  '16',
            'sfsi_form_button_fontalign' =>  'center',
            'sfsi_form_button_background' => '#dedede',
        );
        add_option('sfsi_section8_options',  serialize($options8));
    }

    $option9 = maybe_unserialize(get_option('sfsi_section9_options', false));

    if (!isset($option9) || empty($option9)) {

        /* Question 3->Where shall they be displayed?    */
        $options9 = array(

            'sfsi_show_via_widget'          => 'no',
            'sfsi_widget_alignment'         => 'Horizontal',

            'sfsi_icons_float'              => 'no',
            'sfsi_icons_floatPosition'      => 'center-right',
            'sfsi_icons_floatMargin_top'    => '',
            'sfsi_icons_floatMargin_bottom' => '',
            'sfsi_icons_floatMargin_left'   => '',
            'sfsi_icons_floatMargin_right'  => '',
            'sfsi_disable_floaticons'       => 'no',
            'sfsi_make_icons'               => 'float',
            'sfsi_float_mobile_selection'   => 'no',
            'sfsi_float_alignment'          => 'Horizontal',

            'sfsi_show_via_shortcode'       => 'no',
            'sfsi_shortcode_alignment'      => 'Horizontal',
            'sfsi_show_via_afterposts'      => 'no',

            'sfsi_responsive_icons_after_post' => 'yes',
            'sfsi_responsive_icons_after_post_on_taxonomy' => 'no',
            'sfsi_responsive_icons_after_pages' => 'no',
            'sfsi_display_after_woocomerce_desc' => 'no'
        );
        add_option('sfsi_section9_options',  serialize($options9));
    }

    /*Some additional option added*/
    update_option('sfsi_feed_id', sanitize_text_field($sffeeds->feed_id));
    update_option('sfsi_redirect_url', esc_url($sffeeds->redirect_url));
    add_option('sfsi_installDate', date('Y-m-d h:i:s'));
    add_option('sfsi_currentDate',  date('Y-m-d h:i:s'));
    add_option('sfsi_showNextBannerDate', '14 day');
    if (get_option('sfsi_showNextBannerDate') == "21 day") {
        update_option('sfsi_showNextBannerDate', '14 day');
    }
    add_option('sfsi_cycleDate',  "180 day");
    add_option('sfsi_loyaltyDate',  "180 day");

    add_option('sfsi_RatingDiv', 'no');
    add_option('sfsi_footer_sec', 'no');

    update_option('sfsi_activate', 1);

    $sfsi_dismiss_sharecount = maybe_unserialize(get_option('sfsi_dismiss_sharecount'));
    if (!isset($sfsi_dismiss_sharecount) || empty($sfsi_dismiss_sharecount)) {
        $sfsi_dismiss_sharecount = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        add_option("sfsi_dismiss_sharecount", serialize($sfsi_dismiss_sharecount));
    }

    $sfsi_dismiss_google_analytic = maybe_unserialize(get_option('sfsi_dismiss_google_analytic'));
    if (!isset($sfsi_dismiss_google_analytic) || empty($sfsi_dismiss_google_analytic)) {
        $sfsi_dismiss_google_analytic = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        add_option("sfsi_dismiss_google_analytic", serialize($sfsi_dismiss_google_analytic));
    }

    $sfsi_dismiss_woocommerce = maybe_unserialize(get_option('sfsi_dismiss_woocommerce'));
    if (!isset($sfsi_dismiss_woocommerce) || empty($sfsi_dismiss_woocommerce)) {
        $sfsi_dismiss_woocommerce = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        add_option("sfsi_dismiss_woocommerce", serialize($sfsi_dismiss_woocommerce));
    }

    $sfsi_dismiss_twitter = maybe_unserialize(get_option('sfsi_dismiss_twitter'));
    if (!isset($sfsi_dismiss_twitter) || empty($sfsi_dismiss_twitter)) {
        $sfsi_dismiss_twitter = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        add_option("sfsi_dismiss_twitter", serialize($sfsi_dismiss_twitter));
    }

    $sfsi_dismiss_copy_delete_post = maybe_unserialize(get_option('sfsi_dismiss_copy_delete_post'));
    if (!isset($sfsi_dismiss_copy_delete_post) || empty($sfsi_dismiss_copy_delete_post)) {
        $sfsi_dismiss_copy_delete_post = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        update_option("sfsi_dismiss_copy_delete_post", serialize($sfsi_dismiss_copy_delete_post));
    }


    $sfsi_banner_global_firsttime_offer = maybe_unserialize(get_option('sfsi_banner_global_firsttime_offer'));
    if (!isset($sfsi_banner_global_firsttime_offer) || empty($sfsi_banner_global_firsttime_offer) || !isset($sfsi_banner_global_firsttime_offer["is_active"])) {
        $sfsi_banner_global_firsttime_offer = array(
            'met_criteria'     => "yes",
            'is_active' => "yes",
            'timestamp' => ""
        );
        update_option("sfsi_banner_global_firsttime_offer", serialize($sfsi_banner_global_firsttime_offer));
    }

    $sfsi_dismiss_gdpr = maybe_unserialize(get_option('sfsi_dismiss_gdpr'));
    if (!isset($sfsi_dismiss_gdpr) || empty($sfsi_dismiss_gdpr)) {
        $sfsi_dismiss_gdpr = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        add_option("sfsi_dismiss_gdpr", serialize($sfsi_dismiss_gdpr));
    }

    $sfsi_dismiss_optimization = maybe_unserialize(get_option('sfsi_dismiss_optimization'));
    if (!isset($sfsi_dismiss_optimization) || empty($sfsi_dismiss_optimization)) {
        $sfsi_dismiss_optimization = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        add_option("sfsi_dismiss_optimization", serialize($sfsi_dismiss_optimization));
    }

    $sfsi_dismiss_gallery = maybe_unserialize(get_option('sfsi_dismiss_gallery'));
    if (!isset($sfsi_dismiss_gallery) || empty($sfsi_dismiss_gallery)) {
        $sfsi_dismiss_gallery = array(
            'show_banner'     => "yes",
            'timestamp' => ""
        );
        add_option("sfsi_dismiss_gallery", serialize($sfsi_dismiss_gallery));
    }



    $sfsi_banner_global_upgrade = maybe_unserialize(get_option('sfsi_banner_global_upgrade'));
    if (!isset($sfsi_banner_global_upgrade) || empty($sfsi_banner_global_upgrade) || !isset($sfsi_banner_global_upgrade["is_active"])) {
        $sfsi_banner_global_upgrade = array(
            'met_criteria'     => "no",
            'banner_appeared' => "no",
            'is_active' => "no",
            'timestamp' => ""
        );
        add_option("sfsi_banner_global_upgrade", serialize($sfsi_banner_global_upgrade));
    }
    $sfsi_banner_global_http = maybe_unserialize(get_option('sfsi_banner_global_http'));
    if (!isset($sfsi_banner_global_http) || empty($sfsi_banner_global_http) || !isset($sfsi_banner_global_http["is_active"])) {
        $sfsi_banner_global_http = array(
            'met_criteria'     => "no",
            'banner_appeared' => "no",
            'is_active' => "no",
            'timestamp' => ""
        );
        add_option("sfsi_banner_global_http", serialize($sfsi_banner_global_http));
    }
    $sfsi_banner_global_gdpr = maybe_unserialize(get_option('sfsi_banner_global_gdpr'));
    if (!isset($sfsi_banner_global_gdpr) || empty($sfsi_banner_global_gdpr)) {
        $sfsi_banner_global_gdpr = array(
            'met_criteria'     => "no",
            'banner_appeared' => "no",
            'is_active' => "no",
            'timestamp' => ""
        );
        add_option("sfsi_banner_global_gdpr", serialize($sfsi_banner_global_gdpr));
    }
    $sfsi_banner_global_shares = maybe_unserialize(get_option('sfsi_banner_global_shares'));
    if (!isset($sfsi_banner_global_shares) || empty($sfsi_banner_global_shares) || !isset($sfsi_banner_global_shares["is_active"])) {
        $sfsi_banner_global_shares = array(
            'met_criteria'     => "no",
            'banner_appeared' => "no",
            'is_active' => "no",
            'timestamp' => ""
        );
        add_option("sfsi_banner_global_shares", serialize($sfsi_banner_global_shares));
    }
    $sfsi_banner_global_load_faster = maybe_unserialize(get_option('sfsi_banner_global_load_faster'));
    if (!isset($sfsi_banner_global_load_faster) || empty($sfsi_banner_global_load_faster) || !isset($sfsi_banner_global_load_faster["is_active"])) {
        $sfsi_banner_global_load_faster = array(
            'met_criteria'     => "no",
            'banner_appeared' => "no",
            'is_active' => "no",
            'timestamp' => ""
        );
        add_option("sfsi_banner_global_load_faster", serialize($sfsi_banner_global_load_faster));
    }
    $sfsi_banner_global_social = maybe_unserialize(get_option('sfsi_banner_global_social'));
    if (!isset($sfsi_banner_global_social) || empty($sfsi_banner_global_social) || !isset($sfsi_banner_global_load_faster["is_active"])) {
        $sfsi_banner_global_social = array(
            'met_criteria'     => "no",
            'banner_appeared' => "no",
            'is_active' => "no",
            'timestamp' => ""
        );
        add_option("sfsi_banner_global_social", serialize($sfsi_banner_global_social));
    }
    $sfsi_banner_global_pinterest = maybe_unserialize(get_option('sfsi_banner_global_pinterest'));
    if (!isset($sfsi_banner_global_pinterest) || empty($sfsi_banner_global_pinterest) || !isset($sfsi_banner_global_pinterest["is_active"])) {
        $sfsi_banner_global_pinterest = array(
            'met_criteria'     => "no",
            'banner_appeared' => "no",
            'is_active' => "no",
            'timestamp' => ""
        );
        add_option("sfsi_banner_global_pinterest", serialize($sfsi_banner_global_pinterest));
    }
    $sfsi_banner_popups = (get_option('sfsi_banner_popups'));
    if (!isset($sfsi_banner_popups) || empty($sfsi_banner_popups)) {
        add_option('sfsi_banner_popups', "yes");
    }

    /*Changes in option 2*/
    $get_option2 = maybe_unserialize(get_option('sfsi_section2_options', false));

    $get_option2['sfsi_email_url'] = $sffeeds->redirect_url;
    update_option('sfsi_section2_options', serialize($get_option2));

    /*Activation Setup for */
    sfsi_setUpfeeds($sffeeds->feed_id);
    sfsi_updateFeedPing('N', $sffeeds->feed_id);

    /*Extra important options*/
    $sfsi_instagram_sf_count = array(
        "date_sf" => strtotime(date("Y-m-d")),
        "date_instagram" => strtotime(date("Y-m-d")),
        "sfsi_sf_count" => "",
        "sfsi_instagram_count" => ""
    );
    add_option('sfsi_instagram_sf_count',  serialize($sfsi_instagram_sf_count));

    $error_banner = get_option('sfsi_error_reporting_notice_dismissed', false);

    if (!$error_banner) {
        update_option('sfsi_error_reporting_notice_dismissed', true);
    }
    if (!get_option('sfsi_fb_count')) {
        add_option("sfsi_fb_count", "");
    }
}
/* end function  */

/* deactivate plugin */
function sfsi_deactivate_plugin()
{
    global $wpdb;
    sfsi_updateFeedPing('Y', sanitize_text_field(get_option('sfsi_feed_id')));
}
/* end function  */

function sfsi_updateFeedPing($status, $feed_id)
{
    $body = array(
        'feed_id' => $feed_id,
        'status' => $status
    );

    $args = array(
        'body' => $body,
        'timeout' => '30',
        'redirection' => '5',
        'httpversion' => '1.0',
        'blocking' => true,
        'headers' => array(),
        'cookies' => array()
    );

    $resp = wp_remote_post('https://api.follow.it/wordpress/pingfeed', $args);
    return $resp;
}
/* unistall plugin function */
function sfsi_Unistall_plugin()
{
    global $wpdb;
    /* Delete option for which icons to display */
    delete_option('sfsi_section1_options');
    delete_option('sfsi_section2_options');
    delete_option('sfsi_section3_options');
    delete_option('sfsi_section4_options');
    delete_option('sfsi_section5_options');
    delete_option('sfsi_section6_options');
    delete_option('sfsi_section7_options');
    delete_option('sfsi_section8_options');
    delete_option('sfsi_section9_options');
    delete_option('sfsi_feed_id');
    delete_option('sfsi_redirect_url');
    delete_option('sfsi_footer_sec');
    delete_option('sfsi_activate');
    delete_option("sfsi_pluginVersion");
    delete_option('sfsi_verificatiom_code');
    delete_option("sfsi_curlErrorNotices");
    delete_option("sfsi_curlErrorMessage");
    delete_option("sfsi_RatingDiv");
    delete_option("sfsi_languageNotice");
    delete_option("sfsi_instagram_sf_count");
    delete_option("sfsi_installDate");
    delete_option("sfsi_currentDate");
    delete_option("sfsi_showNextBannerDate");
    delete_option("sfsi_cycleDate");
    delete_option("sfsi_loyaltyDate");



    delete_option("adding_tags");
    delete_option("show_notification_plugin");
    delete_option("show_premium_notification");
    delete_option("show_mobile_notification");
    delete_option("show_notification");
    delete_option("show_new_notification");
    delete_option('sfsi_serverphpVersionnotification');
    delete_option("show_premium_cumulative_count_notification");

    delete_option("sfsi_addThis_icon_removal_notice_dismissed");
    delete_option("sfsi_error_reporting_notice_dismissed");
    delete_option('widget_sfsi_widget');
    delete_option('widget_subscriber_widget');

    delete_option("sfsi_dismiss_sharecount");
    delete_option("sfsi_dismiss_google_analytic");
    delete_option("sfsi_dismiss_gdpr");
    delete_option("sfsi_dismiss_optimization");
    delete_option("sfsi_dismiss_gallery");
    delete_option("sfsi_dismiss_woocommerce");
    delete_option("sfsi_dismiss_twitter");
    delete_option("sfsi_banner_global_firsttime_offer");
    delete_option("sfsi_banner_global_social");
    delete_option("sfsi_banner_global_gdpr");
    delete_option("sfsi_banner_global_pinterest");
    delete_option("sfsi_banner_global_load_faster");
    delete_option("sfsi_banner_global_shares");
    delete_option("sfsi_banner_global_http");
    delete_option("sfsi_banner_global_upgrade");
    delete_option("sfsi_fb_count");
    delete_option("sfsi_banner_popups");
    delete_option("sfsi_dismiss_copy_delete_post");
}
/* end function */

/* check CUrl */
function curl_enable_notice() {
    if ( !function_exists( 'curl_init' ) ) {
        echo '<div class="error"><p>';
            echo __( 'Error: It seems that CURL is disabled on your server. Please contact your server administrator to install / enable CURL.', 'ultimate-social-media-icons' );
        echo '</p></div>';
        die;
    }
}

/* add admin menus */
add_action('admin_menu', 'sfsi_admin_menu');
function sfsi_admin_menu() {
    add_menu_page(
        __( 'Ultimate Social Media Icons', 'ultimate-social-media-icons' ),
        __( 'Ultimate Social Media Icons', 'ultimate-social-media-icons' ),
        'manage_options',
        'sfsi-options',
        'sfsi_options_page',
        plugins_url( 'images/logo.png', dirname(__FILE__) )
    );
}

function sfsi_options_page() {
    include SFSI_DOCROOT . '/views/sfsi_options_view.php';
}

function sfsi_about_page() {
    include SFSI_DOCROOT . '/views/sfsi_aboutus.php';
}

/* fetch rss url from follow.it */
function SFSI_getFeedUrl() {

    $body = array(
        'web_url'   => get_bloginfo('url'),
        'feed_url'  => sfsi_get_bloginfo('rss2_url'),
        'email'     => '',
        'subscriber_type' => 'OWP'
    );

    $args = array(
        'body' => $body,
        'blocking' => true,
        'user-agent' => 'sf rss request',
        'header'    => array("Content-Type" => "application/x-www-form-urlencoded"),
        'sslverify' => true,
        'timeout' => 30
    );
    $resp = wp_remote_post('https://api.follow.it/wordpress/plugin_setup', $args);
    if (!is_wp_error($resp)) {
        $resp = json_decode($resp['body']);
    }
    if (isset($resp->redirect_url) && isset($resp->feed_id)) {
        $feed_url = stripslashes_deep($resp->redirect_url);
        return $resp;
    } else {
        return (object) array('redirect_url' => 'https://follow.it/now', 'feed_id' => '');
    }
    exit;
}
/* fetch rss url from follow.it on */
function SFSI_updateFeedUrl()
{
    $body = array(
        'feed_id'   => sanitize_text_field(get_option('sfsi_feed_id')),
        'web_url'   => get_bloginfo('url'),
        'feed_url'  => sfsi_get_bloginfo('rss2_url'),
        'email'     => ''
    );

    $args = array(
        'body' => $body,
        'blocking' => true,
        'user-agent' => 'sf rss request',
        'header'    => array("Content-Type" => "application/x-www-form-urlencoded"),
        'sslverify' => true,
        'timeout'   => 30
    );
    $resp = wp_remote_post('https://api.follow.it/wordpress/updateFeedPlugin', $args);
    if (is_wp_error($resp)) {
        // var_dump($resp);
        // update_option("sfsi_plus_curlErrorNotices", "yes");
        // update_option("sfsi_plus_curlErrorMessage", $resp->get_error_message());
    } else {
        update_option("sfsi_plus_curlErrorNotices", "no");
        update_option("sfsi_plus_curlErrorMessage", "");
        $resp = json_decode($resp['body']);
    }

    $feed_url = stripslashes_deep($resp->redirect_url);
    return $resp;
    exit;
}
/* add sf tags */
function sfsi_setUpfeeds($feed_id)
{
    $args = array(
        'blocking' => true,
        'user-agent' => 'sf rss request',
        'header'    => array("Content-Type" => "application/json"),
        'sslverify' => false,
        'timeout'   => 30
    );
    $resp = wp_remote_get('https://api.follow.it/rssegtcrons/download_rssmorefeed_data_single/' . $feed_id . "/Y", $args);
    if (is_wp_error($resp)) {
        // var_dump($resp);
        // update_option("sfsi_plus_curlErrorNotices", "yes");
        // update_option("sfsi_plus_curlErrorMessage", $resp->get_error_message());
    } else {
        // update_option("sfsi_plus_curlErrorNotices", "no");
        // update_option("sfsi_plus_curlErrorMessage", "");
    }
}
/* admin notice if wp_head is missing in active theme */
function sfsi_check_wp_head()
{

    $template_directory = get_template_directory();
    $header = $template_directory . '/header.php';

    if (is_file($header)) {

        $search_header = "wp_head";
        $file_lines = @file($header);
        $foind_header = 0;
        foreach ($file_lines as $line) {
            $searchCount = substr_count($line, $search_header);
            if ($searchCount > 0) {
                return true;
            }
        }

        $path = pathinfo($_SERVER['REQUEST_URI']);
        if ($path['basename'] == "themes.php" || $path['basename'] == "theme-editor.php" || $path['basename'] == "admin.php?page=sfsi-options") {
            $currentTheme = wp_get_theme();

            if (isset($currentTheme) && !empty($currentTheme) && $currentTheme->get('Name') != "Customizr") {
                echo "<div class=\"error\" >" . "<p> Error : Please fix your theme to make plugins work correctly: Go to the <a href=\"theme-editor.php\">Theme Editor</a> and insert <code>&lt;?php wp_head(); ?&gt;</code> just before the <code>&lt;/head&gt;</code> line of your theme's <code>header.php</code> file." . "</p></div>";
            }
        }
    }
}
/* admin notice if wp_footer is missing in active theme */
function sfsi_check_wp_footer()
{
    $template_directory = get_template_directory();
    $footer = $template_directory . '/footer.php';

    if (is_file($footer)) {
        $search_string = "wp_footer";
        $file_lines = @file($footer);

        foreach ($file_lines as $line) {
            $searchCount = substr_count($line, $search_string);
            if ($searchCount > 0) {
                return true;
            }
        }
        $path = pathinfo($_SERVER['REQUEST_URI']);

        if ($path['basename'] == "themes.php" || $path['basename'] == "theme-editor.php" || $path['basename'] == "admin.php?page=sfsi-options") {
            echo "<div class=\"error\" >" . "<p>Error : Please fix your theme to make plugins work correctly: Go to the <a href=\"theme-editor.php\">Theme Editor</a> and insert <code>&lt;?php wp_footer(); ?&gt;</code> as the first line of your theme's <code>footer.php</code> file. " . "</p></div>";
        }
    }
}

/* admin notice for first time installation */
function sfsi_activation_msg() {

    $path = pathinfo($_SERVER['REQUEST_URI']);
    $sfsi_activate = get_option( 'sfsi_activate', false );
    if ( $sfsi_activate == 1 && $path['basename'] !== "admin.php?page=sfsi-options" ) {
        echo '<div class="updated"><p>';
        echo sprintf(
            __( 'Thank you for installing the %1$sUltimate Social Media Icons%2$s Plugin. Please go to the %3$splugin\'s settings page%4$s to configure it.', 'ultimate-social-media-icons' ),
            '<b>',
            '</b>',
            '<a href="'.admin_url( 'admin.php?page=sfsi-options' ).'">',
            '</a>'
        );
        echo '</p></div>';
    }

    update_option( 'sfsi_activate', 0 );
    
}
/* admin notice for first time installation */
function sfsi_rating_msg() {

    if ( isset( $_GET['page'] ) && 'sfsi-options' === $_GET['page'] ) {
        $install_date = get_option( 'sfsi_installDate' );
        $display_date = date( 'Y-m-d h:i:s' );
        $datetime1 = new DateTime( $install_date );
        $datetime2 = new DateTime( $display_date );
        $diff_inrval = round(($datetime2->format('U') - $datetime1->format('U')) / (60 * 60 * 24));
        
        if ( $diff_inrval >= 40 && "no" == get_option( 'sfsi_RatingDiv' ) ) {
        ?>
        <style type="text/css">
            .plg-rating-dismiss:before {
                background: none;
                color: #72777c;
                content: "\f153";
                display: block;
                font: normal 16px/20px dashicons;
                speak: none;
                height: 20px;
                text-align: center;
                width: 20px;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            .plg-rating-dismiss {
                position: absolute;
                top: 0;
                right: 15px;
                border: none;
                margin: 0;
                padding: 9px;
                background: none;
                color: #72777c;
                cursor: pointer;
            }
        </style>
        <div class="sfwp_fivestar notice notice-success">
            <p><?php _e( 'You\'ve been using the Ultimate Social Media Plugin for more than 40 days. Great! If you\'re happy, could you please do us a BIG favor and let us know ONE thing we can improve in it?', 'ultimate-social-media-icons' ); ?></p>
            <ul>
                <li><a href="https://wordpress.org/support/plugin/ultimate-social-media-icons#new-topic-0" target="new" title="Yes, that's fair, let me give feedback!"><?php _e( 'Yes, let me give feedback!', 'ultimate-social-media-icons' ); ?></a></li>
                <li><a target="new" href="https://wordpress.org/support/plugin/ultimate-social-media-icons/reviews/?filter=5"><?php _e( 'No clue, let me give a 5-star rating instead', 'ultimate-social-media-icons' ); ?></a></li>
                <li><a href="javascript:void(0);" class="sfsiHideRating" title="I already did"><?php _e( 'I already did (don\'t show this again)', 'ultimate-social-media-icons' ); ?></a></li>
            </ul>
            <button type="button" class="plg-rating-dismiss"><span class="screen-reader-text"><?php _e( 'Dismiss this notice.', 'ultimate-social-media-icons' ); ?></span></button>
        </div>
        <script>
            jQuery(document).ready(function($) {

                var sel1 = jQuery( '.sfsiHideRating' );
                var sel2 = jQuery( '.plg-rating-dismiss' );

                function sfsi_hide_rating(element) {

                    element.on("click", function(event) {

                        event.stopImmediatePropagation();

                        var data = {
                            'action': 'sfsi_hideRating',
                            'nonce': '<?php echo wp_create_nonce('sfsi_hideRating'); ?>'
                        };

                        jQuery.ajax({
                            url: "<?php echo admin_url('admin-ajax.php'); ?>",
                            type: "post",
                            data: data,
                            dataType: "json",
                            async: !0,
                            success: function(e) {
                                if (e == "success") {
                                    jQuery('.sfwp_fivestar').slideUp('slow');
                                }
                            }
                        });
                    });
                }
                sfsi_hide_rating( sel1 );
                sfsi_hide_rating( sel2 );
            });
        </script>
<?php
        }
    }
}

add_action( 'wp_ajax_sfsi_hideRating', 'sfsi_HideRatingDiv', 0 );
function sfsi_HideRatingDiv() {
    if ( !wp_verify_nonce( sanitize_text_field($_POST['nonce']), "sfsi_hideRating" ) ) {
        echo json_encode( array( 'res' => "error" ) );
        exit;
    }

    if ( !current_user_can( 'manage_options' ) ) {
        echo json_encode( array( 'res' => 'not allowed' ) );
        die();
    }

    update_option( 'sfsi_RatingDiv', 'yes' );
    echo json_encode( array( "success" ) );
    exit;
}
/* add all admin message */
add_action( 'admin_notices', 'sfsi_activation_msg' );
add_action( 'admin_notices', 'sfsi_rating_msg' );
add_action( 'admin_notices', 'sfsi_check_wp_head' );
add_action( 'admin_notices', 'sfsi_check_wp_footer' );

function sfsi_pingVendor($post_id)
{
    global $wp, $wpdb;
    // If this is just a revision, don't send the email.
    if (wp_is_post_revision($post_id))
        return;
    $post_data = get_post($post_id, ARRAY_A);
    if ($post_data['post_status'] == 'publish' && $post_data['post_type'] == 'post') :
        $feed_id = sanitize_text_field(get_option('sfsi_feed_id'));
        return sfsi_setUpfeeds($feed_id);
    // 		$categories = wp_get_post_categories($post_data['ID']);
    // 		$cats='';
    // 		$total=count($categories);
    // 		$count=1;
    // 		foreach($categories as $c)
    // 		{	
    // 			$cat_data = get_category( $c );
    // 			if($count==$total)
    // 			{
    // 				$cats.= $cat_data->name;
    // 			}
    // 			else
    // 			{
    // 				$cats.= $cat_data->name.',';	
    // 			}
    // 			$count++;	
    // 		}
    // 		$postto_array = array(
    // 			'feed_id'	=> sanitize_text_field(get_option('sfsi_plus_feed_id')),
    // 			'title'		=> $post_data['post_title'],
    // 			'description' => $post_data['post_content'],
    // 			'link'		=> $post_data['guid'],
    // 			'author'	=> get_the_author_meta('user_login', $post_data['post_author']),
    // 			'category' 	=> $cats,
    // 			'pubDate'	=> $post_data['post_modified'],
    // 			'rssurl'	=> sfsi_plus_get_bloginfo('rss2_url')
    // 		);
    // 		$args = array(
    // 		    'body' => $postto_array,
    // 		    'blocking' => true,
    // 		    'user-agent' => 'sf rss request',
    // 		    'header'	=> array("Content-Type"=>"application/x-www-form-urlencoded"),
    // 		    'sslverify' => true
    // 		);
    // 		$data = get_option('sfsi_plus_log',array());
    // 		array_push($data,array("pingVendor"=>"ready to post","post_id"=>$post_id,"post_fields"=>$postto_array));
    // 		update_option('sfsi_plus_log',$data);
    // 		$resp = wp_remote_post();
    // 		if ( !is_wp_error( $resp ) ) {
    // 			$resp = json_decode($resp['body']);
    // 			$data = get_option('sfsi_plus_log',array());
    // 			array_push($data,array("pingVendor"=>"sucess on call","post_id"=>$post_id,"response"=>$resp));
    // 			update_option('sfsi_plus_log',$data);
    // 			return true;
    // 		}else{
    // 			$data = get_option('sfsi_plus_log',array());
    // 			array_push($data,array("pingVendor"=>"error on call","post_id"=>$post_id,"err"=>$resp));
    // 			update_option('sfsi_plus_log',$data);
    // 		}
    endif;
}
add_action('save_post', 'sfsi_pingVendor');

function sfsi_was_displaying_addthis()
{

    $isDismissed   =  true;

    $sfsi_section1 = maybe_unserialize(get_option('sfsi_section1_options', false));
    $sfsi_section6 = maybe_unserialize(get_option('sfsi_section6_options', false));

    $sfsi_addThiswasDisplayed_section1 = isset($sfsi_section1['sfsi_share_display']) && 'yes' == sanitize_text_field($sfsi_section1['sfsi_share_display']);

    $sfsi_addThiswasDisplayed_section6 = isset($sfsi_section6['sfsi_rectshr']) && 'yes' == sanitize_text_field($sfsi_section6['sfsi_rectshr']);

    $isDisplayed = $sfsi_addThiswasDisplayed_section1 || $sfsi_addThiswasDisplayed_section6;

    // If icon was displayed 
    $isDismissed = false != $isDisplayed ? false : true;

    update_option('sfsi_addThis_icon_removal_notice_dismissed', $isDismissed);

    if ($sfsi_addThiswasDisplayed_section1) {
        unset($sfsi_section1['sfsi_share_display']);
        update_option('sfsi_section1_options', serialize($sfsi_section1));
    }

    if ( $sfsi_addThiswasDisplayed_section6 ) {
        unset( $sfsi_section6['sfsi_rectshr'] );
        update_option( 'sfsi_section6_options', serialize( $sfsi_section6 ) );
    }
}

if( !function_exists( 'sfsi_premium_tooltip_content' ) ) {
    function sfsi_premium_tooltip_content( $textclass='', $iconclass='', $iconstyle='' ) {
        $output = '';
        if ( $textclass ) { 
            $textclass = ' '.$textclass;
        }
        if ( $iconclass ) { 
            $iconclass = ' '.$iconclass;
        }
        if ( $iconstyle ) { 
            $iconstyle = ' style="'.$iconstyle.'"';
        }
        $output = '<span class="sfsi_premium_logo_icon'.$iconclass.'"'.$iconstyle.'></span><span class="sfsi_tooltip_text_premium'.$textclass.'">'.__( 'Premium feature', 'ultimate-social-media-icons' ).' - <a href="https://www.ultimatelysocial.com/usm-premium/" target="_blank" style="color: #fff;">'. __( 'learn more', 'ultimate-social-media-icons' ).'</a></span>';
        return $output;
    }
}