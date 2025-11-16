<?php

/* unserialize all saved option for second section options */

$option3 = maybe_unserialize( get_option( 'sfsi_section3_options', false ) );
$option1 = maybe_unserialize( get_option( 'sfsi_section1_options', false ) );
$option2 = maybe_unserialize( get_option( 'sfsi_section2_options', false ) );
$sfsi_custom_icons = get_option( 'sfsi_custom_icons' );

/*
 * Sanitize, escape and validate values
 */

$option3['sfsi_actvite_theme']         = (isset($option3['sfsi_actvite_theme'])) ? sanitize_text_field($option3['sfsi_actvite_theme']) : '';
$option3['sfsi_mouseOver']             = (isset($option3['sfsi_mouseOver'])) ? sanitize_text_field($option3['sfsi_mouseOver']) : '';
$option3['sfsi_mouseOver_effect']      = (isset($option3['sfsi_mouseOver_effect'])) ? sanitize_text_field($option3['sfsi_mouseOver_effect']) : '';
$option3['sfsi_shuffle_icons']         = (isset($option3['sfsi_shuffle_icons'])) ? sanitize_text_field($option3['sfsi_shuffle_icons']) : '';
$option3['sfsi_shuffle_Firstload']     = (isset($option3['sfsi_shuffle_Firstload'])) ? sanitize_text_field($option3['sfsi_shuffle_Firstload']) : '';
$option3['sfsi_shuffle_interval']      = (isset($option3['sfsi_shuffle_interval'])) ? sanitize_text_field($option3['sfsi_shuffle_interval']) : '';
$option3['sfsi_shuffle_intervalTime']  = (isset($option3['sfsi_shuffle_intervalTime'])) ? intval($option3['sfsi_shuffle_intervalTime']) : '';
$option3['sfsi_mouseOver_effect_type'] = (isset($option3['sfsi_mouseOver_effect_type'])) ? sanitize_text_field($option3['sfsi_mouseOver_effect_type']) : 'same_icons';
?>

<!-- Section 3 "What design & animation do you want to give your icons?" main div Start -->

<div class="tab3">
    <p>
        <?php _e( 'A good & well-fitting design is not only nice to look at, but it increases chances that people will subscribe and/or share your site with friends:','ultimate-social-media-icons') ?>
    </p>
    <ul class="tab_3_list">
        <li><?php _e('It comes across as','ultimate-social-media-icons') ?> <span><?php _e('more professional','ultimate-social-media-icons') ?></span> <?php _e('and gives your site','ultimate-social-media-icons') ?>  <span><?php _e('more “credit”','ultimate-social-media-icons') ?></span></li>
        <li><?php _e('A smart automatic animation can','ultimate-social-media-icons') ?> <span><?php _e('make your visitors aware of your icons','ultimate-social-media-icons') ?></span><?php ' '._e(' in an unintrusive manner','ultimate-social-media-icons') ?> </li>
    </ul>

    <p style="padding:0px;">
    <?php 
        printf(
            __( 'The icons have been compressed by %1sShortpixel.com%2s for faster loading of your site. Thank you Shortpixel!','ultimate-social-media-icons' ),
            '<a href="https://goo.gl/IV5Q3z" target="_blank">',
            '</a>'
        );
    ?>
    </p>

    <div class="row">

        <!--<h3>Theme options</h3>-->
        <h4><?php _e( 'Theme options', 'ultimate-social-media-icons' ); ?></h4>
        <!--icon themes section start -->

        <ul class="tab_3_icns tab_3_icns_width">

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'default') ? 'checked="true"' : ''; ?> type="radio" value="default" class="styled" /><label><?php _e('Default','ultimate-social-media-icons') ?></label>
                <div class="icns_tab_3">
                    <span class="row_1_1 rss_section"></span>
                    <span class="row_1_2 email_section"></span>
                    <span class="row_1_3 facebook_section"></span>
                    <span class="row_1_5 twitter_section"></span>
                    <span class="row_1_7 youtube_section"></span>
                    <span class="row_1_8 pinterest_section"></span>
                    <span class="row_1_9 linkedin_section"></span>
                    <span class="row_1_10 instagram_section"></span>
                    <span class="row_1_30 threads_section"></span>
                    <span class="row_1_14 telegram_section"></span>
                    <span class="row_1_25 inha_section"></span>
                    <span class="row_1_26 ria_section"></span>
                    <span class="row_1_15 vk_section"></span>
                    <span class="row_1_31 bluesky_section"></span>
                    <span class="row_1_16 ok_section"></span>
                    <span class="row_1_19 whatsapp_section"></span>
                    <span class="row_1_17 weibo_section"></span>
                    <span class="row_1_18 wechat_section"></span>
                    <span class="row_1_20 snapchat_section"></span>
                    <span class="row_1_21 reddit_section"></span>
                    <span class="row_1_22 fbmessenger_section"></span>
                    <span class="row_1_23 tiktok_section"></span>
                    <span class="row_1_29 copylink_section"></span>
                    <span class="row_1_24 mastodon_section"></span>
                    <!--<span class="row_1_11 sf_section"></span>-->
                </div>
            </li>


            <li class="sfsi_webtheme" style='display:none;'>
            <a href="#" target="_blank">
                <span class="radio" style="opacity: 0.5;"></span>    
                <label class="sfsi_premium_ad_lable" style="text-transform: capitalize;"><?php _e( 'Default', 'ultimate-social-media-icons'); ?></label>
                <div class="icns_tab_3 sfsi_premium_ad">
                    <span class="premium_col_1 rss_section"></span>
                    <span class="premium_col_2 email_section"></span>
                    <span class="premium_col_3 facebook_section"></span>
                    <span class="premium_col_4 twitter_section"></span>
                    <div class="sfis_premium_ad_name"><?php _e('(Premium)','ultimate-social-media-icons') ?></div>
                    <!--<span class="row_1_11 sf_section"></span>-->
                </div>
                </a>
            </li>
            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'animated_icons') ? 'checked="true"' : ''; ?> type="radio" value="animated_icons" class="styled" />
            <label class="sfsi_tooltip_premium sfsi_tooltip_premium_small sfsi-max-content">
            <?php _e( 'Animated Icons', 'ultimate-social-media-icons' ); ?><span class="sfsi_premium_logo_icon"></span>
            <span class="sfsi_tooltip_text_premium sfsi_tooltip_text_premium_small"><?php _e( 'May increase the website\'s loading time slightly', 'ultimate-social-media-icons' ); ?></a></span>
            </label>
                <div class="icns_tab_3">
                    <span class="row_20_1 rss_section"></span>
                    <span class="row_20_2 email_section"></span>
                    <span class="row_20_3 facebook_section"></span>
                    <span class="row_20_5 twitter_section"></span>
                    <span class="row_20_7 youtube_section"></span>
                    <span class="row_20_8 pinterest_section"></span>
                    <span class="row_20_9 linkedin_section"></span>
                    <span class="row_20_10 instagram_section"></span>
                    <span class="row_20_30 threads_section"></span>
                    <span class="row_20_25 ria_section"></span>
                    <span class="row_20_26 inha_section"></span>
                    <span class="row_20_14 telegram_section"></span>
                    <span class="row_20_15 vk_section"></span>
                    <span class="row_20_31 bluesky_section"></span>
                    <span class="row_20_16 ok_section"></span>
                    <span class="row_20_19 whatsapp_section"></span>
                    <span class="row_20_17 weibo_section"></span>
                    <span class="row_20_18 wechat_section"></span>
                    <span class="row_20_20 snapchat_section"></span>
                    <span class="row_20_21 reddit_section"></span>
                    <span class="row_20_22 fbmessenger_section"></span>
                    <span class="row_20_23 tiktok_section"></span>
                    <span class="row_20_29 copylink_section"></span>
                    <span class="row_20_24 mastodon_section"></span>
                    <!--<span class="row_20_11 sf_section"></span>-->
                </div>
            </li>

            <li>   
                <input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'flat') ? 'checked="true"' : ''; ?> type="radio" value="flat" class="styled" />
                <label><?php _e( 'Flat', 'ultimate-social-media-icons' ); ?></label>
	            <?php
	            $sfsi_rss_bgColor = $sfsi_rss_bgColor_style = $sfsi_email_bgColor = $sfsi_email_bgColor_style = $sfsi_facebook_bgColor = $sfsi_facebook_bgColor_style = $sfsi_twitter_bgColor = $sfsi_twitter_bgColor_style = $sfsi_youtube_bgColor = $sfsi_youtube_bgColor_style = $sfsi_pinterest_bgColor = $sfsi_pinterest_bgColor_style = $sfsi_linkedin_bgColor = $sfsi_linkedin_bgColor_style = $sfsi_instagram_bgColor = $sfsi_instagram_bgColor_style = $sfsi_ria_bgColor = $sfsi_ria_bgColor_style = $sfsi_inha_bgColor = $sfsi_inha_bgColor_style = $sfsi_snapchat_bgColor = $sfsi_snapchat_bgColor_style = $sfsi_whatsapp_bgColor = $sfsi_whatsapp_bgColor_style = $sfsi_reddit_bgColor = $sfsi_reddit_bgColor_style = $sfsi_fbmessenger_bgColor = $sfsi_fbmessenger_bgColor_style = $sfsi_ok_bgColor = $sfsi_ok_bgColor_style = $sfsi_telegram_bgColor = $sfsi_telegram_bgColor_style = $sfsi_vk_bgColor = $sfsi_vk_bgColor_style = $sfsi_wechat_bgColor = $sfsi_wechat_bgColor_style = $sfsi_weibo_bgColor = $sfsi_weibo_bgColor_style = $sfsi_tiktok_bgColor = $sfsi_tiktok_bgColor_style = $sfsi_copylink_bgColor = $sfsi_copylink_bgColor_style = $sfsi_mastodon_bgColor = $sfsi_mastodon_bgColor_style = $sfsi_threads_bgColor = $sfsi_threads_bgColor_style = $sfsi_bluesky_bgColor = $sfsi_bluesky_bgColor_style = '';

	            if ( isset( $option3['sfsi_rss_bgColor'] ) && $option3['sfsi_rss_bgColor'] != '' ) {
		            $sfsi_rss_bgColor       = $option3['sfsi_rss_bgColor'];
		            $sfsi_rss_bgColor_style = 'background: ' . $sfsi_rss_bgColor;
	            } else {
		            $sfsi_rss_bgColor_style = 'background: #f2721f';
	            }

	            if ( isset( $option3['sfsi_email_bgColor'] ) && $option3['sfsi_email_bgColor'] != '' ) {
		            $sfsi_email_bgColor       = $option3['sfsi_email_bgColor'];
		            $sfsi_email_bgColor_style = 'background: ' . $sfsi_email_bgColor;
	            } else {
		            if ( $option2['sfsi_rss_icons'] == "sfsi" ) {
			            $sfsi_email_bgColor_style = 'background: #05B04E';
		            } elseif ( $option2['sfsi_rss_icons'] == "email" ) {
			            $sfsi_email_bgColor_style = 'background: #343D44';
		            } else {
			            $sfsi_email_bgColor_style = 'background: #a2a2a2';
		            }
	            }

	            $sfsi_email_default = '';
	            if ( $option2['sfsi_rss_icons'] == "sfsi" ) {
		            $sfsi_email_default = '#05B04E';
	            } elseif ( $option2['sfsi_rss_icons'] == "email" ) {
		            $sfsi_email_default = '#343D44';
	            } else {
		            $sfsi_email_default = '#a2a2a2';
	            }

	            if ( isset( $option3['sfsi_facebook_bgColor'] ) && $option3['sfsi_facebook_bgColor'] != '' ) {
		            $sfsi_facebook_bgColor       = $option3['sfsi_facebook_bgColor'];
		            $sfsi_facebook_bgColor_style = 'background: ' . $sfsi_facebook_bgColor;
	            } else {
		            $sfsi_facebook_bgColor_style = 'background: #336699';
	            }

	            if ( isset( $option3['sfsi_threads_bgColor'] ) && $option3['sfsi_threads_bgColor'] != '' ) {
		            $sfsi_threads_bgColor       = $option3['sfsi_threads_bgColor'];
		            $sfsi_threads_bgColor_style = 'background: ' . $sfsi_threads_bgColor;
	            } else {
		            $sfsi_threads_bgColor_style = 'background: #252525';
	            }

	            if ( isset( $option3['sfsi_bluesky_bgColor'] ) && $option3['sfsi_bluesky_bgColor'] != '' ) {
		            $sfsi_bluesky_bgColor       = $option3['sfsi_bluesky_bgColor'];
		            $sfsi_bluesky_bgColor_style = 'background: ' . $sfsi_bluesky_bgColor;
	            } else {
		            $sfsi_bluesky_bgColor_style = 'background: #1185fe';
	            }

	            if ( isset( $option3['sfsi_twitter_bgColor'] ) && $option3['sfsi_twitter_bgColor'] != '' ) {
		            $sfsi_twitter_bgColor       = $option3['sfsi_twitter_bgColor'];
		            $sfsi_twitter_bgColor_style = 'background: ' . $sfsi_twitter_bgColor;
	            } else {
		            $sfsi_twitter_bgColor_style = 'background: #020202';
	            }

	            if ( isset( $option3['sfsi_youtube_bgColor'] ) && $option3['sfsi_youtube_bgColor'] != '' ) {
		            $sfsi_youtube_bgColor       = $option3['sfsi_youtube_bgColor'];
		            $sfsi_youtube_bgColor_style = 'background: ' . $sfsi_youtube_bgColor;
	            } else {
		            $sfsi_youtube_bgColor_style = 'background: #c33';
	            }

	            if ( isset( $option3['sfsi_pinterest_bgColor'] ) && $option3['sfsi_pinterest_bgColor'] != '' ) {
		            $sfsi_pinterest_bgColor       = $option3['sfsi_pinterest_bgColor'];
		            $sfsi_pinterest_bgColor_style = 'background: ' . $sfsi_pinterest_bgColor;
	            } else {
		            $sfsi_pinterest_bgColor_style = 'background: #CC3333';
	            }

	            if ( isset( $option3['sfsi_linkedin_bgColor'] ) && $option3['sfsi_linkedin_bgColor'] != '' ) {
		            $sfsi_linkedin_bgColor       = $option3['sfsi_linkedin_bgColor'];
		            $sfsi_linkedin_bgColor_style = 'background: ' . $sfsi_linkedin_bgColor;
	            } else {
		            $sfsi_linkedin_bgColor_style = 'background: #0877B5';
	            }

	            if ( isset( $option3['sfsi_instagram_bgColor'] ) && $option3['sfsi_instagram_bgColor'] != '' ) {
		            $sfsi_instagram_bgColor       = $option3['sfsi_instagram_bgColor'];
		            $sfsi_instagram_bgColor_style = 'background: ' . $sfsi_instagram_bgColor;
	            } else {
		            $sfsi_instagram_bgColor_style = 'background: radial-gradient(circle farthest-corner at 35% 90%, #fec564, rgba(0, 0, 0, 0) 50%), radial-gradient(circle farthest-corner at 0 140%, #fec564, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, rgba(0, 0, 0, 0)), linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%);';
	            }

	            if ( isset( $option3['sfsi_ria_bgColor'] ) && $option3['sfsi_ria_bgColor'] != '' ) {
		            $sfsi_ria_bgColor       = $option3['sfsi_ria_bgColor'];
		            $sfsi_ria_bgColor_style = 'background: ' . $sfsi_ria_bgColor;
	            } else {
		            $sfsi_ria_bgColor_style = 'background: #10A9A0 ';
	            }

	            if ( isset( $option3['sfsi_inha_bgColor'] ) && $option3['sfsi_inha_bgColor'] != '' ) {
		            $sfsi_inha_bgColor       = $option3['sfsi_inha_bgColor'];
		            $sfsi_inha_bgColor_style = 'background: ' . $sfsi_inha_bgColor;
	            } else {
		            $sfsi_inha_bgColor_style = 'background: #348CBC ';
	            }

	            if ( isset( $option3['sfsi_telegram_bgColor'] ) && $option3['sfsi_telegram_bgColor'] != '' ) {
		            $sfsi_telegram_bgColor       = $option3['sfsi_telegram_bgColor'];
		            $sfsi_telegram_bgColor_style = 'background: ' . $sfsi_telegram_bgColor;
	            } else {
		            $sfsi_telegram_bgColor_style = 'background: #33A1D1';
	            }

	            if ( isset( $option3['sfsi_vk_bgColor'] ) && $option3['sfsi_vk_bgColor'] != '' ) {
		            $sfsi_vk_bgColor       = $option3['sfsi_vk_bgColor'];
		            $sfsi_vk_bgColor_style = 'background: ' . $sfsi_vk_bgColor;
	            } else {
		            $sfsi_vk_bgColor_style = 'background: #4E77A2';
	            }

	            if ( isset( $option3['sfsi_ok_bgColor'] ) && $option3['sfsi_ok_bgColor'] != '' ) {
		            $sfsi_ok_bgColor       = $option3['sfsi_ok_bgColor'];
		            $sfsi_ok_bgColor_style = 'background: ' . $sfsi_ok_bgColor;
	            } else {
		            $sfsi_ok_bgColor_style = 'background: #F58220';
	            }

	            if ( isset( $option3['sfsi_whatsapp_bgColor'] ) && $option3['sfsi_whatsapp_bgColor'] != '' ) {
		            $sfsi_whatsapp_bgColor       = $option3['sfsi_whatsapp_bgColor'];
		            $sfsi_whatsapp_bgColor_style = 'background: ' . $sfsi_whatsapp_bgColor;
	            } else {
		            $sfsi_whatsapp_bgColor_style = 'background: #3ED946';
	            }

	            if ( isset( $option3['sfsi_weibo_bgColor'] ) && $option3['sfsi_weibo_bgColor'] != '' ) {
		            $sfsi_weibo_bgColor       = $option3['sfsi_weibo_bgColor'];
		            $sfsi_weibo_bgColor_style = 'background: ' . $sfsi_weibo_bgColor;
	            } else {
		            $sfsi_weibo_bgColor_style = 'background: #E6162D';
	            }

	            if ( isset( $option3['sfsi_wechat_bgColor'] ) && $option3['sfsi_wechat_bgColor'] != '' ) {
		            $sfsi_wechat_bgColor       = $option3['sfsi_wechat_bgColor'];
		            $sfsi_wechat_bgColor_style = 'background: ' . $sfsi_wechat_bgColor;
	            } else {
		            $sfsi_wechat_bgColor_style = 'background: #4BAD33';
	            }

	            if ( isset( $option3['sfsi_snapchat_bgColor'] ) && $option3['sfsi_snapchat_bgColor'] != '' ) {
		            $sfsi_snapchat_bgColor       = $option3['sfsi_snapchat_bgColor'];
		            $sfsi_snapchat_bgColor_style = 'background: ' . $sfsi_snapchat_bgColor;
	            } else {
		            $sfsi_snapchat_bgColor_style = 'background: #EDEC1F';
	            }

	            if ( isset( $option3['sfsi_reddit_bgColor'] ) && $option3['sfsi_reddit_bgColor'] != '' ) {
		            $sfsi_reddit_bgColor       = $option3['sfsi_reddit_bgColor'];
		            $sfsi_reddit_bgColor_style = 'background: ' . $sfsi_reddit_bgColor;
	            } else {
		            $sfsi_reddit_bgColor_style = 'background: #FF642C';
	            }

	            if ( isset( $option3['sfsi_fbmessenger_bgColor'] ) && $option3['sfsi_fbmessenger_bgColor'] != '' ) {
		            $sfsi_fbmessenger_bgColor       = $option3['sfsi_fbmessenger_bgColor'];
		            $sfsi_fbmessenger_bgColor_style = 'background: ' . $sfsi_fbmessenger_bgColor;
	            } else {
		            $sfsi_fbmessenger_bgColor_style = 'background: #447BBF';
	            }

	            if ( isset( $option3['sfsi_tiktok_bgColor'] ) && $option3['sfsi_tiktok_bgColor'] != '' ) {
		            $sfsi_tiktok_bgColor       = $option3['sfsi_tiktok_bgColor'];
		            $sfsi_tiktok_bgColor_style = 'background: ' . $sfsi_tiktok_bgColor;
	            } else {
		            $sfsi_tiktok_bgColor_style = 'background: #000000';
	            }

	            if ( isset( $option3['sfsi_copylink_bgColor'] ) && $option3['sfsi_copylink_bgColor'] != '' ) {
		            $sfsi_copylink_bgColor       = $option3['sfsi_copylink_bgColor'];
		            $sfsi_copylink_bgColor_style = 'background: ' . $sfsi_copylink_bgColor;
	            } else {
		            $sfsi_copylink_bgColor_style = 'background: linear-gradient(180deg, #C295FF 0%, #4273F7 100%)';
	            }

	            if ( isset( $option3['sfsi_mastodon_bgColor'] ) && $option3['sfsi_mastodon_bgColor'] != '' ) {
		            $sfsi_mastodon_bgColor       = $option3['sfsi_mastodon_bgColor'];
		            $sfsi_mastodon_bgColor_style = 'background: ' . $sfsi_mastodon_bgColor;
	            } else {
		            $sfsi_mastodon_bgColor_style = 'background: #583ED1';
	            }
	            ?>
                <div class="sfsi_icns_tab_3 icns_tab_3">
                    <span class="row_2_1 sfsi_icon_bgcolor rss_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_rss_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_rss.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_rss_bgColor" data-default-color="#f2721f" id="sfsi_rss_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_rss_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_2 sfsi_icon_bgcolor email_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_email_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_email.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_email_bgColor" data-default-color="<?php echo esc_attr( $sfsi_email_default ); ?>" id="sfsi_email_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_email_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_3 sfsi_icon_bgcolor facebook_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_facebook_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_facebook.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_facebook_bgColor" data-default-color="#336699" id="sfsi_facebook_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_facebook_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_5 sfsi_icon_bgcolor twitter_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_twitter_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_twitter.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_twitter_bgColor" data-default-color="#000000" id="sfsi_twitter_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_twitter_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_7 sfsi_icon_bgcolor youtube_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_youtube_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_youtube.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_youtube_bgColor" data-default-color="#c33" id="sfsi_youtube_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_youtube_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_8 sfsi_icon_bgcolor pinterest_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_pinterest_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_pinterest.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_pinterest_bgColor" data-default-color="#CC3333" id="sfsi_pinterest_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_pinterest_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_9 sfsi_icon_bgcolor linkedin_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_linkedin_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_linkedin.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_linkedin_bgColor" data-default-color="#0877B5" id="sfsi_linkedin_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_linkedin_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_10 sfsi_icon_bgcolor instagram_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_instagram_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_instagram.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_instagram_bgColor" data-default-color-custom="radial-gradient(circle farthest-corner at 35% 90%, #fec564, rgba(0, 0, 0, 0) 50%), radial-gradient(circle farthest-corner at 0 140%, #fec564, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, rgba(0, 0, 0, 0)), linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%)" id="sfsi_instagram_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_instagram_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_10 sfsi_icon_bgcolor threads_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_threads_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_threads.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_threads_bgColor" data-default-color-custom="#252525" id="sfsi_threads_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_threads_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_25 sfsi_icon_bgcolor ria_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_ria_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_ria.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_ria_bgColor" data-default-color="#10A9A0" id="sfsi_ria_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_ria_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_26 sfsi_icon_bgcolor inha_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_inha_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_inha.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_inha_bgColor" data-default-color="#348cbc" id="sfsi_inha_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_inha_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_14 sfsi_icon_bgcolor telegram_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_telegram_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_telegram.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_telegram_bgColor" data-default-color="#33A1D1" id="sfsi_telegram_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_telegram_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_15 sfsi_icon_bgcolor vk_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_vk_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_vk.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_vk_bgColor" data-default-color="#4E77A2" id="sfsi_vk_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_vk_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_15 sfsi_icon_bgcolor bluesky_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_bluesky_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_bluesky.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_bluesky_bgColor" data-default-color="#1185fe" id="sfsi_bluesky_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_bluesky_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_16 sfsi_icon_bgcolor ok_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_ok_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_ok.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_ok_bgColor" data-default-color="#F58220" id="sfsi_ok_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_ok_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_19 sfsi_icon_bgcolor whatsapp_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_whatsapp_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_whatsapp.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_whatsapp_bgColor" data-default-color="#3ED946" id="sfsi_whatsapp_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_whatsapp_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_17 sfsi_icon_bgcolor weibo_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_weibo_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_weibo.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_weibo_bgColor" data-default-color="#e6162d" id="sfsi_weibo_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_weibo_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_18 sfsi_icon_bgcolor wechat_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_wechat_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_wechat.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_wechat_bgColor" data-default-color="#4BAD33" id="sfsi_wechat_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_wechat_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_20 sfsi_icon_bgcolor snapchat_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_snapchat_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_snapchat.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_snapchat_bgColor" data-default-color="#EDEC1F" id="sfsi_snapchat_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_snapchat_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_21 sfsi_icon_bgcolor reddit_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_reddit_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_reddit.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_reddit_bgColor" data-default-color="#FF642C" id="sfsi_reddit_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_reddit_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_22 sfsi_icon_bgcolor fbmessenger_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_fbmessenger_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_fbmessenger.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_fbmessenger_bgColor" data-default-color="#447BBF" id="sfsi_fbmessenger_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_fbmessenger_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_23 sfsi_icon_bgcolor tiktok_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_tiktok_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_tiktok.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_tiktok_bgColor" data-default-color="#000000" id="sfsi_tiktok_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_tiktok_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_29 sfsi_icon_bgcolor copylink_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_copylink_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_copylink.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                            <input name="sfsi_copylink_bgColor" data-default-color-custom="linear-gradient(180deg, #C295FF 0%, #4273F7 100%)" id="sfsi_copylink_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_copylink_bgColor ); ?>" />
                        </span>
                    </span>
                    <span class="row_2_24 sfsi_icon_bgcolor mastodon_section">
                        <span class="sfsi_icon_img_wrapper" style="<?php echo esc_attr( $sfsi_mastodon_bgColor_style ); ?>">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/flat/flat_mastodon.png" alt="" />
                        </span>
                        <span class="sfsi_icon_color_picker">
                        <input name="sfsi_mastodon_bgColor" data-default-color="#583ED1" id="sfsi_mastodon_bgColor" class="sfsi_input_bgColor" type="text" value="<?php echo esc_attr( $sfsi_mastodon_bgColor ); ?>" />
                        </span>
                    </span>
                    <!--<span class="row_2_11 sf_section"></span>-->
                </div>
            </li>

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'flat_square') ? 'checked="true"' : ''; ?> type="radio" value="flat_square" class="styled" /><label><?php _e( 'Flat Square', 'ultimate-social-media-icons' ); ?></label>
                <div class="icns_tab_3"><span class="row_17_1 rss_section"></span>
                    <span class="row_17_2 email_section"></span>
                    <span class="row_17_3 facebook_section"></span>
                    <span class="row_17_5 twitter_section"></span>
                    <span class="row_17_7 youtube_section"></span>
                    <span class="row_17_8 pinterest_section"></span>
                    <span class="row_17_9 linkedin_section"></span>
                    <span class="row_17_10 instagram_section"></span>
                    <span class="row_17_30 threads_section"></span>
                    <span class="row_17_25 ria_section"></span>
                    <span class="row_17_26 inha_section"></span>
                    <span class="row_17_14 telegram_section"></span>
                    <span class="row_17_15 vk_section"></span>
                    <span class="row_17_31 bluesky_section"></span>
                    <span class="row_17_16 ok_section"></span>
                    <span class="row_17_19 whatsapp_section"></span>
                    <span class="row_17_17 weibo_section"></span>
                    <span class="row_17_18 wechat_section"></span>
                    <span class="row_17_20 snapchat_section"></span>
                    <span class="row_17_21 reddit_section"></span>
                    <span class="row_17_22 fbmessenger_section"></span>
                    <span class="row_17_23 tiktok_section"></span>
                    <span class="row_17_29 copylink_section"></span>
                    <span class="row_17_24 mastodon_section"></span>
                    <!--<span class="row_17_11 sf_section"></span>-->
                </div>
            </li>

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'flat_squared') ? 'checked="true"' : ''; ?> type="radio" value="flat_squared" class="styled" /><label><?php _e( 'Flat Squared', 'ultimate-social-media-icons' ); ?></label>
                <div class="icns_tab_3">
                    <span class="row_18_1 rss_section"></span>
                    <span class="row_18_2 email_section"></span>
                    <span class="row_18_3 facebook_section"></span>
                    <span class="row_18_5 twitter_section"></span>
                    <span class="row_18_7 youtube_section"></span>
                    <span class="row_18_8 pinterest_section"></span>
                    <span class="row_18_9 linkedin_section"></span>
                    <span class="row_18_10 instagram_section"></span>
                    <span class="row_18_30 threads_section"></span>
                    <span class="row_18_25 ria_section"></span>
                    <span class="row_18_26 inha_section"></span>
                    <span class="row_18_14 telegram_section"></span>
                    <span class="row_18_15 vk_section"></span>
                    <span class="row_18_31 bluesky_section"></span>
                    <span class="row_18_16 ok_section"></span>
                    <span class="row_18_19 whatsapp_section"></span>
                    <span class="row_18_17 weibo_section"></span>
                    <span class="row_18_18 wechat_section"></span>
                    <span class="row_18_20 snapchat_section"></span>
                    <span class="row_18_21 reddit_section"></span>
                    <span class="row_18_22 fbmessenger_section"></span>
                    <span class="row_18_23 tiktok_section"></span>
                    <span class="row_18_29 copylink_section"></span>
                    <span class="row_18_24 mastodon_section"></span>
                    <!--<span class="row_18_11 sf_section"></span>-->
                </div>
            </li>

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'thin') ? 'checked="true"' : ''; ?> type="radio" value="thin" class="styled" /><label><?php _e('Thin','ultimate-social-media-icons') ?></label>
                <div class="icns_tab_3">
                    <span class="row_3_1 rss_section"></span>
                    <span class="row_3_2 email_section"></span>
                    <span class="row_3_3 facebook_section"></span>
                    <span class="row_3_5 twitter_section"></span>
                    <span class="row_3_7 youtube_section"></span>
                    <span class="row_3_8 pinterest_section"></span>
                    <span class="row_3_9 linkedin_section"></span>
                    <span class="row_3_10 instagram_section"></span>
                    <span class="row_3_30 threads_section"></span>
                    <span class="row_3_25 ria_section"></span>
                    <span class="row_3_26 inha_section"></span>
                    <span class="row_3_14 telegram_section"></span>
                    <span class="row_3_15 vk_section"></span>
                    <span class="row_3_31 bluesky_section"></span>
                    <span class="row_3_16 ok_section"></span>
                    <span class="row_3_19 whatsapp_section"></span>
                    <span class="row_3_17 weibo_section"></span>
                    <span class="row_3_18 wechat_section"></span>
                    <span class="row_3_20 snapchat_section"></span>
                    <span class="row_3_21 reddit_section"></span>
                    <span class="row_3_22 fbmessenger_section"></span>
                    <span class="row_3_23 tiktok_section"></span>
                    <span class="row_3_29 copylink_section"></span>
                    <span class="row_3_24 mastodon_section"></span>
                    <!--<span class="row_3_11 sf_section"></span>-->
                </div>
            </li>

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'cute') ? 'checked="true"' : ''; ?> type="radio" value="cute" class="styled" /><label><?php _e('Cute','ultimate-social-media-icons') ?></label>
                <div class="icns_tab_3">
                    <span class="row_4_1 rss_section"></span>
                    <span class="row_4_2 email_section"></span>
                    <span class="row_4_3 facebook_section"></span>
                    <span class="row_4_5  twitter_section"></span>
                    <span class="row_4_7 youtube_section"></span>
                    <span class="row_4_8 pinterest_section"></span>
                    <span class="row_4_9 linkedin_section"></span>
                    <span class="row_4_10 instagram_section"></span>
                    <span class="row_4_30 threads_section"></span>
                    <span class="row_4_25 ria_section"></span>
                    <span class="row_4_26 inha_section"></span>
                    <span class="row_4_14 telegram_section"></span>
                    <span class="row_4_15 vk_section"></span>
                    <span class="row_4_31 bluesky_section"></span>
                    <span class="row_4_16 ok_section"></span>
                    <span class="row_4_19 whatsapp_section"></span>
                    <span class="row_4_17 weibo_section"></span>
                    <span class="row_4_18 wechat_section"></span>
                    <span class="row_4_20 snapchat_section"></span>
                    <span class="row_4_21 reddit_section"></span>
                    <span class="row_4_22 fbmessenger_section"></span>
                    <span class="row_4_23 tiktok_section"></span>
                    <span class="row_4_29 copylink_section"></span>
                    <span class="row_4_24 mastodon_section"></span>
                    <!--<span class="row_4_11 sf_section"></span>-->
                </div>
            </li>

            <!--start next four-->

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'cubes') ? 'checked="true"' : ''; ?> type="radio" value="cubes" class="styled" /><label><?php _e('Cubes','ultimate-social-media-icons') ?></label>
                <div class="icns_tab_3">
                    <span class="row_5_1 rss_section"></span>
                    <span class="row_5_2 email_section"></span>
                    <span class="row_5_3 facebook_section"></span>
                    <span class="row_5_5 twitter_section"></span>
                    <span class="row_5_7 youtube_section"></span>
                    <span class="row_5_8 pinterest_section"></span>
                    <span class="row_5_9 linkedin_section"></span>
                    <span class="row_5_10 instagram_section"></span>
                    <span class="row_5_30 threads_section"></span>
                    <span class="row_5_25 ria_section"></span>
                    <span class="row_5_26 inha_section"></span>
                    <span class="row_5_14 telegram_section"></span>
                    <span class="row_5_15 vk_section"></span>
                    <span class="row_5_31 bluesky_section"></span>
                    <span class="row_5_16 ok_section"></span>
                    <span class="row_5_19 whatsapp_section"></span>
                    <span class="row_5_17 weibo_section"></span>
                    <span class="row_5_18 wechat_section"></span>
                    <span class="row_5_20 snapchat_section"></span>
                    <span class="row_5_21 reddit_section"></span>
                    <span class="row_5_22 fbmessenger_section"></span>
                    <span class="row_5_23 tiktok_section"></span>
                    <span class="row_5_29 copylink_section"></span>
                    <span class="row_5_24 mastodon_section"></span>
                    <!--<span class="row_5_11 sf_section"></span>-->
                </div>
            </li>

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'chrome_blue') ? 'checked="true"' : ''; ?> type="radio" value="chrome_blue" class="styled" /><label><?php _e('Chrome Blue','ultimate-social-media-icons') ?></label>
                <div class="icns_tab_3">
                    <span class="row_6_1 rss_section"></span>
                    <span class="row_6_2 email_section"></span>
                    <span class="row_6_3 facebook_section"></span>
                    <span class="row_6_5 twitter_section"></span>
                    <span class="row_6_7 youtube_section"></span>
                    <span class="row_6_8 pinterest_section"></span>
                    <span class="row_6_9 linkedin_section"></span>
                    <span class="row_6_10 instagram_section"></span>
                    <span class="row_6_30 threads_section"></span>
                    <span class="row_6_25 ria_section"></span>
                    <span class="row_6_26 inha_section"></span>
                    <span class="row_6_14 telegram_section"></span>
                    <span class="row_6_15 vk_section"></span>
                    <span class="row_6_31 bluesky_section"></span>
                    <span class="row_6_16 ok_section"></span>
                    <span class="row_6_19 whatsapp_section"></span>
                    <span class="row_6_17 weibo_section"></span>
                    <span class="row_6_18 wechat_section"></span>
                    <span class="row_6_20 snapchat_section"></span>
                    <span class="row_6_21 reddit_section"></span>
                    <span class="row_6_22 fbmessenger_section"></span>
                    <span class="row_6_23 tiktok_section"></span>
                    <span class="row_6_29 copylink_section"></span>
                    <span class="row_6_24 mastodon_section"></span>
                    <!--<span class="row_6_11 sf_section"></span>-->
                </div>
            </li>

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'chrome_grey') ? 'checked="true"' : ''; ?> type="radio" value="chrome_grey" class="styled" /><label><?php _e('Chrome Grey','ultimate-social-media-icons') ?></label>
                <div class="icns_tab_3">
                    <span class="row_7_1 rss_section"></span>
                    <span class="row_7_2 email_section"></span>
                    <span class="row_7_3 facebook_section"></span>
                    <span class="row_7_5 twitter_section"></span>
                    <span class="row_7_7 youtube_section"></span>
                    <span class="row_7_8 pinterest_section"></span>
                    <span class="row_7_9 linkedin_section"></span>
                    <span class="row_7_10 instagram_section"></span>
                    <span class="row_7_30 threads_section"></span>
                    <span class="row_7_25 ria_section"></span>
                    <span class="row_7_26 inha_section"></span>
                    <span class="row_7_14 telegram_section"></span>
                    <span class="row_7_15 vk_section"></span>
                    <span class="row_7_31 bluesky_section"></span>
                    <span class="row_7_16 ok_section"></span>
                    <span class="row_7_19 whatsapp_section"></span>
                    <span class="row_7_17 weibo_section"></span>
                    <span class="row_7_18 wechat_section"></span>
                    <span class="row_7_20 snapchat_section"></span>
                    <span class="row_7_21 reddit_section"></span>
                    <span class="row_7_22 fbmessenger_section"></span>
                    <span class="row_7_23 tiktok_section"></span>
                    <span class="row_7_29 copylink_section"></span>
                    <span class="row_7_24 mastodon_section"></span>

                    <!--<span class="row_7_11 sf_section"></span>-->
                </div>
            </li>

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'splash') ? 'checked="true"' : ''; ?> type="radio" value="splash" class="styled" /><label><?php _e('Splash','ultimate-social-media-icons') ?></label>
                <div class="icns_tab_3"><span class="row_8_1 rss_section"></span>
                    <span class="row_8_2 email_section"></span>
                    <span class="row_8_3 facebook_section"></span>
                    <span class="row_8_5  twitter_section"></span>
                    <span class="row_8_7 youtube_section"></span>
                    <span class="row_8_8 pinterest_section"></span>
                    <span class="row_8_9 linkedin_section"></span>
                    <span class="row_8_10 instagram_section"></span>
                    <span class="row_8_30 threads_section"></span>
                    <span class="row_8_25 ria_section"></span>
                    <span class="row_8_26 inha_section"></span>
                    <span class="row_8_14 telegram_section"></span>
                    <span class="row_8_15 vk_section"></span>
                    <span class="row_8_31 bluesky_section"></span>
                    <span class="row_8_16 ok_section"></span>
                    <span class="row_8_19 whatsapp_section"></span>
                    <span class="row_8_17 weibo_section"></span>
                    <span class="row_8_18 wechat_section"></span>
                    <span class="row_8_20 snapchat_section"></span>
                    <span class="row_8_21 reddit_section"></span>
                    <span class="row_8_22 fbmessenger_section"></span>
                    <span class="row_8_23 tiktok_section"></span>
                    <span class="row_8_29 copylink_section"></span>
                    <span class="row_8_24 mastodon_section"></span>

                    <!--<span class="row_8_11 sf_section"></span>-->
                </div>
            </li>

            <!--start second four-->

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'orange') ? 'checked="true"' : ''; ?> type="radio" value="orange" class="styled" /><label><?php _e('Orange','ultimate-social-media-icons') ?></label>
                <div class="icns_tab_3"><span class="row_9_1 rss_section"></span>
                    <span class="row_9_2 email_section"></span>
                    <span class="row_9_3 facebook_section"></span>
                    <span class="row_9_5 twitter_section"></span>
                    <span class="row_9_7 youtube_section"></span>
                    <span class="row_9_8 pinterest_section"></span>
                    <span class="row_9_9 linkedin_section"></span>
                    <span class="row_9_10 instagram_section"></span>
                    <span class="row_9_30 threads_section"></span>
                    <span class="row_9_25 ria_section"></span>
                    <span class="row_9_26 inha_section"></span>
                    <span class="row_9_14 telegram_section"></span>
                    <span class="row_9_15 vk_section"></span>
                    <span class="row_9_31 bluesky_section"></span>
                    <span class="row_9_16 ok_section"></span>
                    <span class="row_9_19 whatsapp_section"></span>
                    <span class="row_9_17 weibo_section"></span>
                    <span class="row_9_18 wechat_section"></span>
                    <span class="row_9_20 snapchat_section"></span>
                    <span class="row_9_21 reddit_section"></span>
                    <span class="row_9_22 fbmessenger_section"></span>
                    <span class="row_9_23 tiktok_section"></span>
                    <span class="row_9_29 copylink_section"></span>
                    <span class="row_9_24 mastodon_section"></span>

                    <!--<span class="row_9_11 sf_section"></span>
                    -->
                </div>
            </li>

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'crystal') ? 'checked="true"' : ''; ?> type="radio" value="crystal" class="styled" /><label><?php _e('Crystal','ultimate-social-media-icons') ?></label>
                <div class="icns_tab_3"><span class="row_10_1 rss_section"></span>
                    <span class="row_10_2 email_section"></span>
                    <span class="row_10_3 facebook_section"></span>
                    <span class="row_10_5 twitter_section"></span>
                    <span class="row_10_7 youtube_section"></span>
                    <span class="row_10_8 pinterest_section"></span>
                    <span class="row_10_9 linkedin_section"></span>
                    <span class="row_10_10 instagram_section"></span>
                    <span class="row_10_30 threads_section"></span>
                    <span class="row_10_25 ria_section"></span>
                    <span class="row_10_26 inha_section"></span>
                    <span class="row_10_14 telegram_section"></span>
                    <span class="row_10_15 vk_section"></span>
                    <span class="row_10_31 bluesky_section"></span>
                    <span class="row_10_16 ok_section"></span>
                    <span class="row_10_19 whatsapp_section"></span>
                    <span class="row_10_17 weibo_section"></span>
                    <span class="row_10_18 wechat_section"></span>
                    <span class="row_10_20 snapchat_section"></span>
                    <span class="row_10_21 reddit_section"></span>
                    <span class="row_10_22 fbmessenger_section"></span>
                    <span class="row_10_23 tiktok_section"></span>
                    <span class="row_10_29 copylink_section"></span>
                    <span class="row_10_24 mastodon_section"></span>

                    <!--<span class="row_10_11 sf_section"></span>
                    -->
                </div>
            </li>

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'glossy') ? 'checked="true"' : ''; ?> type="radio" value="glossy" class="styled" /><label><?php _e('Glossy','ultimate-social-media-icons') ?></label>
                <div class="icns_tab_3"><span class="row_11_1 rss_section"></span>
                    <span class="row_11_2 email_section"></span>
                    <span class="row_11_3 facebook_section"></span>
                    <span class="row_11_5 twitter_section"></span>
                    <span class="row_11_7 youtube_section"></span>
                    <span class="row_11_8 pinterest_section"></span>
                    <span class="row_11_9 linkedin_section"></span>
                    <span class="row_11_10 instagram_section"></span>
                    <span class="row_11_30 threads_section"></span>
                    <span class="row_11_25 ria_section"></span>
                    <span class="row_11_26 inha_section"></span>
                    <span class="row_11_14 telegram_section"></span>
                    <span class="row_11_15 vk_section"></span>
                    <span class="row_11_31 bluesky_section"></span>
                    <span class="row_11_16 ok_section"></span>
                    <span class="row_11_19 whatsapp_section"></span>
                    <span class="row_11_17 weibo_section"></span>
                    <span class="row_11_18 wechat_section"></span>
                    <span class="row_11_20 snapchat_section"></span>
                    <span class="row_11_21 reddit_section"></span>
                    <span class="row_11_22 fbmessenger_section"></span>
                    <span class="row_11_23 tiktok_section"></span>
                    <span class="row_11_29 copylink_section"></span>
                    <span class="row_11_24 mastodon_section"></span>

                    <!--<span class="row_11_11 sf_section"></span>
                    -->
                </div>
            </li>

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'black') ? 'checked="true"' : ''; ?> type="radio" value="black" class="styled" /><label><?php _e('Black','ultimate-social-media-icons') ?></label>
                <div class="icns_tab_3"><span class="row_12_1 rss_section"></span>
                    <span class="row_12_2 email_section"></span>
                    <span class="row_12_3 facebook_section"></span>
                    <span class="row_12_5  twitter_section"></span>
                    <span class="row_12_7 youtube_section"></span>
                    <span class="row_12_8 pinterest_section"></span>
                    <span class="row_12_9 linkedin_section"></span>
                    <span class="row_12_10 instagram_section"></span>
                    <span class="row_12_30 threads_section"></span>
                    <span class="row_12_25 ria_section"></span>
                    <span class="row_12_26 inha_section"></span>
                    <span class="row_12_14 telegram_section"></span>
                    <span class="row_12_15 vk_section"></span>
                    <span class="row_12_31 bluesky_section"></span>
                    <span class="row_12_16 ok_section"></span>
                    <span class="row_12_19 whatsapp_section"></span>
                    <span class="row_12_17 weibo_section"></span>
                    <span class="row_12_18 wechat_section"></span>
                    <span class="row_12_20 snapchat_section"></span>
                    <span class="row_12_21 reddit_section"></span>
                    <span class="row_12_22 fbmessenger_section"></span>
                    <span class="row_12_23 tiktok_section"></span>
                    <span class="row_12_29 copylink_section"></span>
                    <span class="row_12_24 mastodon_section"></span>

                    <!--<span class="row_12_11 sf_section"></span>
                    -->
                </div>
            </li>

            <!--start last four-->

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'silver') ? 'checked="true"' : ''; ?> type="radio" value="silver" class="styled" /><label><?php _e('Silver','ultimate-social-media-icons') ?></label>
                <div class="icns_tab_3"><span class="row_13_1 rss_section"></span>
                    <span class="row_13_2 email_section"></span>
                    <span class="row_13_3 facebook_section"></span>
                    <span class="row_13_5 twitter_section"></span>
                    <span class="row_13_7 youtube_section"></span>
                    <span class="row_13_8 pinterest_section"></span>
                    <span class="row_13_9 linkedin_section"></span>
                    <span class="row_13_10 instagram_section"></span>
                    <span class="row_13_30 silver_section"></span>
                    <span class="row_13_25 ria_section"></span>
                    <span class="row_13_26 inha_section"></span>
                    <span class="row_13_14 telegram_section"></span>
                    <span class="row_13_15 vk_section"></span>
                    <span class="row_13_31 bluesky_section"></span>
                    <span class="row_13_16 ok_section"></span>
                    <span class="row_13_19 whatsapp_section"></span>
                    <span class="row_13_17 weibo_section"></span>
                    <span class="row_13_18 wechat_section"></span>
                    <span class="row_13_20 snapchat_section"></span>
                    <span class="row_13_21 reddit_section"></span>
                    <span class="row_13_22 fbmessenger_section"></span>
                    <span class="row_13_23 tiktok_section"></span>
                    <span class="row_13_29 copylink_section"></span>
                    <span class="row_13_24 mastodon_section"></span>

                    <!--<span class="row_13_11 sf_section"></span>
                    -->
                </div>
            </li>

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'shaded_dark') ? 'checked="true"' : ''; ?> type="radio" value="shaded_dark" class="styled" /><label><?php _e('Shaded Dark','ultimate-social-media-icons') ?></label>
                <div class="icns_tab_3"><span class="row_14_1 rss_section"></span>
                    <span class="row_14_2 email_section"></span>
                    <span class="row_14_3 facebook_section"></span>
                    <span class="row_14_5 twitter_section"></span>
                    <span class="row_14_7 youtube_section"></span>
                    <span class="row_14_8 pinterest_section"></span>
                    <span class="row_14_9 linkedin_section"></span>
                    <span class="row_14_10 instagram_section"></span>
                    <span class="row_14_30 threads_section"></span>
                    <span class="row_14_25 ria_section"></span>
                    <span class="row_14_26 inha_section"></span>
                    <span class="row_14_14 telegram_section"></span>
                    <span class="row_14_15 vk_section"></span>
                    <span class="row_14_31 bluesky_section"></span>
                    <span class="row_14_16 ok_section"></span>
                    <span class="row_14_19 whatsapp_section"></span>
                    <span class="row_14_17 weibo_section"></span>
                    <span class="row_14_18 wechat_section"></span>
                    <span class="row_14_20 snapchat_section"></span>
                    <span class="row_14_21 reddit_section"></span>
                    <span class="row_14_22 fbmessenger_section"></span>
                    <span class="row_14_23 tiktok_section"></span>
                    <span class="row_14_29 copylink_section"></span>
                    <span class="row_14_24 mastodon_section"></span>

                    <!--<span class="row_14_11 sf_section"></span>
                    -->
                </div>
            </li>

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'shaded_light') ? 'checked="true"' : ''; ?> type="radio" value="shaded_light" class="styled" /><label><?php _e('Shaded Light','ultimate-social-media-icons') ?></label>
                <div class="icns_tab_3"><span class="row_15_1 rss_section"></span>
                    <span class="row_15_2 email_section"></span>
                    <span class="row_15_3 facebook_section"></span>
                    <span class="row_15_5 twitter_section"></span>
                    <span class="row_15_7 youtube_section"></span>
                    <span class="row_15_8 pinterest_section"></span>
                    <span class="row_15_9 linkedin_section"></span>
                    <span class="row_15_10 instagram_section"></span>
                    <span class="row_15_30 threads_section"></span>
                    <span class="row_15_25 ria_section"></span>
                    <span class="row_15_26 inha_section"></span>
                    <span class="row_15_14 telegram_section"></span>
                    <span class="row_15_15 vk_section"></span>
                    <span class="row_15_31 bluesky_section"></span>
                    <span class="row_15_16 ok_section"></span>
                    <span class="row_15_19 whatsapp_section"></span>
                    <span class="row_15_17 weibo_section"></span>
                    <span class="row_15_18 wechat_section"></span>
                    <span class="row_15_20 snapchat_section"></span>
                    <span class="row_15_21 reddit_section"></span>
                    <span class="row_15_22 fbmessenger_section"></span>
                    <span class="row_15_23 tiktok_section"></span>
                    <span class="row_15_29 copylink_section"></span>
                    <span class="row_15_24 mastodon_section"></span>

                    <!--<span class="row_15_11 sf_section"></span>
                    -->
                </div>
            </li>

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'icons_only') ? 'checked="true"' : ''; ?> type="radio" value="icons_only" class="styled" /><label><?php _e( 'Icons Only', 'ultimate-social-media-icons' ); ?></label>
                <div class="icns_tab_3"><span class="row_19_1 rss_section"></span>
                    <span class="row_19_2 email_section"></span>
                    <span class="row_19_3 facebook_section"></span>
                    <span class="row_19_5  twitter_section"></span>
                    <span class="row_19_7 youtube_section"></span>
                    <span class="row_19_8 pinterest_section"></span>
                    <span class="row_19_9 linkedin_section"></span>
                    <span class="row_19_10 instagram_section"></span>
                    <span class="row_19_30 threads_section"></span>
                    <span class="row_19_25 ria_section"></span>
                    <span class="row_19_26 inha_section"></span>
                    <span class="row_19_14 telegram_section"></span>
                    <span class="row_19_15 vk_section"></span>
                    <span class="row_19_31 bluesky_section"></span>
                    <span class="row_19_16 ok_section"></span>
                    <span class="row_19_19 whatsapp_section"></span>
                    <span class="row_19_17 weibo_section"></span>
                    <span class="row_19_18 wechat_section"></span>
                    <span class="row_19_20 snapchat_section"></span>
                    <span class="row_19_21 reddit_section"></span>
                    <span class="row_19_22 fbmessenger_section"></span>
                    <span class="row_19_23 tiktok_section"></span>
                    <span class="row_19_29 copylink_section"></span>
                    <span class="row_19_24 mastodon_section"></span>

                    <!--<span class="row_19_11 sf_section"></span>-->
                </div>
            </li>

            <li><input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'transparent') ? 'checked="true"' : ''; ?> type="radio" value="transparent" class="styled" /><label style="line-height:20px !important;margin-top:15px;  "><?php _e('Transparent','ultimate-social-media-icons') ?> <br /><span style="font-size: 9px;"><?php _e('(for dark backgrounds)','ultimate-social-media-icons') ?></span></label>
                <div class="icns_tab_3 trans_bg"><span class="row_16_1 rss_section"></span>
                    <span class="row_16_2 email_section"></span>
                    <span class="row_16_3 facebook_section"></span>
                    <span class="row_16_5  twitter_section"></span>
                    <span class="row_16_7 youtube_section"></span>
                    <span class="row_16_8 pinterest_section"></span>
                    <span class="row_16_9 linkedin_section"></span>
                    <span class="row_16_10 instagram_section"></span>
                    <span class="row_16_30 threads_section"></span>
                    <span class="row_16_25 ria_section"></span>
                    <span class="row_16_26 inha_section"></span>
                    <span class="row_16_14 telegram_section"></span>
                    <span class="row_16_15 vk_section"></span>
                    <span class="row_16_31 bluesky_section"></span>
                    <span class="row_16_16 ok_section"></span>
                    <span class="row_16_19 whatsapp_section"></span>
                    <span class="row_16_17 weibo_section"></span>
                    <span class="row_16_18 wechat_section"></span>
                    <span class="row_16_20 snapchat_section"></span>
                    <span class="row_16_21 reddit_section"></span>
                    <span class="row_16_22 fbmessenger_section"></span>
                    <span class="row_16_23 tiktok_section"></span>
                    <span class="row_16_29 copylink_section"></span>
                    <span class="row_16_24 mastodon_section"></span>

                    <!--<span class="row_16_11 sf_section"></span>
                    -->
                </div>
            </li>

            <!--Custom Icon Support {Monad}-->
            <?php if ( $sfsi_custom_icons == 'yes' ) { ?>

                <li class="cstomskins_upload">

                    <input name="sfsi_actvite_theme" <?php echo ($option3['sfsi_actvite_theme'] == 'custom_support') ? 'checked="true"' : ''; ?> type="radio" value="custom_support" class="styled" />

                    <label style="line-height:20px !important;margin-top:15px;"><?php _e('Custom Icons ','ultimate-social-media-icons') ?> <br /></label>

                    <div class="icns_tab_3" style="padding-left: 6px;">

                        <?php

                            if (get_option("rss_skin")) {

                                $icon = get_option("rss_skin");

                                echo '<span class="row_17_1 rss_section sfsi-bgimage" style="background: url(' . $icon . ') no-repeat;"></span>';
                            } else {

                                echo '<span class="row_17_1 rss_section" style="background-position:-1px 0;"></span>';
                            }

                            if (get_option("email_skin")) {

                                $icon = get_option("email_skin");

                                echo '<span class="row_17_2 email_section sfsi-bgimage" style="background: url(' . $icon . ') no-repeat;"></span>';
                            } else {

                                echo '<span class="row_17_2 email_section" style="background-position:-58px 0;"></span>';
                            }

                            if (get_option("facebook_skin")) {

                                $icon = get_option("facebook_skin");

                                echo '<span class="row_17_3 facebook_section sfsi-bgimage" style="background: url(' . $icon . ') no-repeat;"></span>';
                            } else {

                                echo '<span class="row_17_3 facebook_section" style="background-position:-118px 0;"></span>';
                            }
                            if (get_option("twitter_skin")) {

                                $icon = get_option("twitter_skin");

                                echo '<span class="row_17_5 twitter_section sfsi-bgimage" style="background: url(' . $icon . ') no-repeat;"></span>';
                            } else {

                                echo '<span class="row_17_5 twitter_section" style="background-position:-235px 0;"></span>';
                            }

                            if (get_option("youtube_skin")) {

                                $icon = get_option("youtube_skin");

                                echo '<span class="row_17_7 youtube_section sfsi-bgimage" style="background: url(' . $icon . ') no-repeat;"></span>';
                            } else {

                                echo '<span class="row_17_7 youtube_section" style="background-position:-350px 0;"></span>';
                            }

                            if (get_option("pintrest_skin")) {

                                $icon = get_option("pintrest_skin");

                                echo '<span class="row_17_8 pinterest_section sfsi-bgimage" style="background: url(' . $icon . ') no-repeat;"></span>';
                            } else {

                                echo '<span class="row_17_8 pinterest_section" style="background-position:-409px 0;"></span>';
                            }

                            if (get_option("linkedin_skin")) {

                                $icon = get_option("linkedin_skin");

                                echo '<span class="row_17_9 linkedin_section sfsi-bgimage" style="background: url(' . $icon . ') no-repeat;"></span>';
                            } else {

                                echo '<span class="row_17_9 linkedin_section" style="background-position:-467px 0;"></span>';
                            }

                            if (get_option("instagram_skin")) {

                                $icon = get_option("instagram_skin");

                                echo '<span class="row_17_10 instagram_section sfsi-bgimage" style="background: url(' . $icon . ') no-repeat;"></span>';
                            } else {

                                echo '<span class="row_17_10 instagram_section" style="background-position:-526px 0;"></span>';
                            }

                            if (get_option("telegram_skin")) {

                                $icon = get_option("telegram_skin");

                                echo '<span class="row_17_10 telegram_section sfsi-bgimage" style="background: url(' . $icon . ') no-repeat;"></span>';
                            } else {

                                echo '<span class="row_17_10 telegram_section" style="background-position:-773px 0;"></span>';
                            }

                            if (get_option("vk_skin")) {

                                $icon = get_option("vk_skin");

                                echo '<span class="row_17_10 vk_section sfsi-bgimage" style="background: url(' . $icon . ') no-repeat;"></span>';
                            } else {

                                echo '<span class="row_17_10 vk_section" style="background-position:-838px 0;"></span>';
                            }

                            if (get_option("ok_skin")) {

                                $icon = get_option("ok_skin");

                                echo '<span class="row_17_10 ok_section sfsi-bgimage" style="background: url(' . $icon . ') no-repeat;"></span>';
                            } else {

                                echo '<span class="row_17_10 ok_section" style="background-position:-909px 0;"></span>';
                            }


                            if (get_option("whatsapp_skin")) {

                                $icon = get_option("whatsapp_skin");

                                echo '<span class="row_17_19 whatsapp_section sfsi-bgimage" style="background: url(' . $icon . ') no-repeat;"></span>';
                            } else {

                                echo '<span class="row_17_19 whatsapp_section" style="background-position:-977px 0;"></span>';
                            }

                            if (get_option("weibo_skin")) {

                                $icon = get_option("weibo_skin");

                                echo '<span class="row_17_10 weibo_section sfsi-bgimage" style="background: url(' . $icon . ') no-repeat;"></span>';
                            } else {

                                echo '<span class="row_17_10 weibo_section" style="background-position:-977px 0;"></span>';
                            }

                            if (get_option("wechat_skin")) {

                                $icon = get_option("wechat_skin");

                                echo '<span class="row_17_10 wechat_section sfsi-bgimage" style="background: url(' . $icon . ') no-repeat;"></span>';
                            } else {

                                echo '<span class="row_1_18  wechat_section"></span>';
                            }
                            ?>

                    </div>
                </li>
                <?php
                }
                
                if ( $sfsi_custom_icons == 'no') { ?>

                <li class="sfsi_custom_icons_q4">
                    <div style="float: left;">
                        <a class="pop-up" data-id="sfsi_quickpay-overlay" onclick="sfsi_open_quick_checkout(event)" target="_blank" style="display: flex;">

                            <input type="radio" class="styled" />

                            <label style="line-height:20px !important;margin-top:15px;opacity:0.5;min-width: 125px;"><?php _e('Custom Icons -','ultimate-social-media-icons') ?></label>
                        </a>
                    </div>
                    <div>
                        <p style="margin-top: 3px;">
                            <a style="color: #12a252 !important;font-weight: bold; border-bottom:none;text-decoration: none;">
                                <?php _e('Premium Feature:','ultimate-social-media-icons') ?>
                            </a>
                            <span><?php _e('Upload any icons you want.','ultimate-social-media-icons') ?> <a class="pop-up" style="cursor:pointer; color: #12a252 !important;border-bottom: 1px solid #12a252;text-decoration: none;font-weight: bold;" data-id="sfsi_quickpay-overlay" onclick="sfsi_open_quick_checkout(event)" target="_blank">
                                <?php _e('Get it now.','ultimate-social-media-icons') ?></a>
                            <!-- </a>&nbsp;  Custom design for the social media platforms implemented in the plugin under question number 1 - </span> -->
                            <!-- <a class="pop-up" style="cursor:pointer; color: #12a252 !important;border-bottom: 1px solid #12a252;text-decoration: none;font-weight: bold;" href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" target="_blank">
                                Get it now.
                            </a> -->
                        </p>
                    </div>
                </li>
                <li class="sfsi_custom_icons_q4">
                    <div style="float: left;">
                        <a class="pop-up" data-id="sfsi_quickpay-overlay" onclick="sfsi_open_quick_checkout(event)" target="_blank" style="display: flex;">

                            <input type="radio" class="styled" />

                            <label style="line-height:20px !important;margin-top:15px;opacity: 0.5;min-width: 79px;"><?php _e(' Tailored -','ultimate-social-media-icons') ?></label>
                        </a>
                    </div>
                    <div>
                        <p style="margin-top: 3px;">
                            
                            <?php 
                                printf(
                                    __( '%1$sLet us create icons matching your site perfectly (both in terms of colors and shape). %2$sLearn more.%3$s','ultimate-social-media-icons' ),
                                    '<span>',
                                    '</span><a href="https://sellcodes.com/0AL0J23f" style="cursor:pointer; color: #12a252 !important;border-bottom: 1px solid #12a252;text-decoration: none;font-weight: bold;" target="_blank">',
                                    '</a>'
                                );
                            ?>
                        </p>
                    </div>
                </li>
            <?php
            }
            ?>
            <li>

                <?php include_once(SFSI_DOCROOT . '/views/subviews/que4/banner.php'); ?>

            </li>

            <li>

                <p style="font-weight: bold; margin: 12px 0 0;">
                    <?php 
                        printf(
                            __( 'Need icons for another theme? Let us know in the %1$sSupport Forum%2$s.', 'ultimate-social-media-icons' ),
                            '<a target="_blank" href="https://wordpress.org/support/plugin/ultimate-social-media-icons/#new-topic-0" style="color:#8E81BD; text-decoration:underline;">',
                            '</a>'
                        );
                    ?>
                </p>

            </li>

        </ul>

        <!--icon themes section start -->

        <?php include_once(SFSI_DOCROOT . '/views/subviews/que4/animatethem.php'); ?>

    </div>

    <?php sfsi_ask_for_help(3); ?>

    <!-- SAVE BUTTON SECTION   -->

    <div class="save_button tab_3_sav">

        <img src="<?php echo SFSI_PLUGURL ?>images/ajax-loader.gif" class="loader-img" alt="error" />

        <?php $nonce = wp_create_nonce("update_step3"); ?>

        <a href="javascript:;" id="sfsi_save3" title="Save" data-nonce="<?php echo $nonce; ?>"><?php _e('Save','ultimate-social-media-icons') ?></a>

    </div>

    <!-- END SAVE BUTTON SECTION   -->

    <a class="sfsiColbtn closeSec" href="javascript:;"><?php _e('Collapse area','ultimate-social-media-icons') ?></a>

    <label class="closeSec"></label>

    <!-- ERROR AND SUCCESS MESSAGE AREA-->

    <p class="red_txt errorMsg" style="display:none"> </p>

    <p class="green_txt sucMsg" style="display:none"> </p>

</div>

<!-- END Section 3 "What design & animation do you want to give your icons?" main div  -->