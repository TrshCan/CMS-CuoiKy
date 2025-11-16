<?php
/* unserialize all saved option for  section 4 options */
$option6 = maybe_unserialize(get_option('sfsi_section6_options', false));
$option4 = maybe_unserialize(get_option('sfsi_section4_options', false));
$option2 = maybe_unserialize(get_option('sfsi_section2_options', false));
if (!isset($option4['sfsi_facebook_mypageCounts'])) {
    $option4['sfsi_facebook_mypageCounts'] = '';
}

/*
 * Sanitize, escape and validate values
 */
$option4['sfsi_display_counts']        = (isset($option4['sfsi_display_counts'])) ? sanitize_text_field($option4['sfsi_display_counts']) : '';
$option4['sfsi_email_countsFrom']      = (isset($option4['sfsi_email_countsFrom'])) ? sanitize_text_field($option4['sfsi_email_countsFrom']) : '';
$option4['sfsi_email_manualCounts']    = (isset($option4['sfsi_email_manualCounts'])) ? intval($option4['sfsi_email_manualCounts']) : '';
$option4['sfsi_rss_countsDisplay']     = (isset($option4['sfsi_rss_countsDisplay'])) ? sanitize_text_field($option4['sfsi_rss_countsDisplay']) : '';
$option4['sfsi_rss_manualCounts']      = (isset($option4['sfsi_rss_manualCounts'])) ? intval($option4['sfsi_rss_manualCounts']) : '';
$option4['sfsi_email_countsDisplay']   = (isset($option4['sfsi_email_countsDisplay'])) ? sanitize_text_field($option4['sfsi_email_countsDisplay']) : '';

$option4['sfsi_facebook_countsDisplay'] = (isset($option4['sfsi_facebook_countsDisplay']))
    ? sanitize_text_field($option4['sfsi_facebook_countsDisplay'])
    : '';
$option4['sfsi_facebook_countsFrom']     = (isset($option4['sfsi_facebook_countsFrom']))
    ? sanitize_text_field($option4['sfsi_facebook_countsFrom'])
    : '';
$option4['sfsi_facebook_mypageCounts']     = (isset($option4['sfsi_facebook_mypageCounts']))
    ? sfsi_sanitize_field($option4['sfsi_facebook_mypageCounts'])
    : '';
$option4['sfsi_facebook_manualCounts']     = (isset($option4['sfsi_facebook_manualCounts']))
    ? intval($option4['sfsi_facebook_manualCounts'])
    : '';
$option4['sfsi_twitter_countsDisplay']     = (isset($option4['sfsi_twitter_countsDisplay']))
    ? sanitize_text_field($option4['sfsi_twitter_countsDisplay'])
    : '';
$option4['sfsi_threads_countsDisplay']     = (isset($option4['sfsi_threads_countsDisplay']))
    ? sanitize_text_field($option4['sfsi_threads_countsDisplay'])
    : '';
$option4['sfsi_bluesky_countsDisplay']     = (isset($option4['sfsi_bluesky_countsDisplay']))
    ? sanitize_text_field($option4['sfsi_bluesky_countsDisplay'])
    : '';
$option4['sfsi_twitter_countsFrom']     = (isset($option4['sfsi_twitter_countsFrom']))
    ? sanitize_text_field($option4['sfsi_twitter_countsFrom'])
    : '';
$option4['sfsi_bluesky_countsFrom']     = (isset($option4['sfsi_bluesky_countsFrom']))
    ? sanitize_text_field($option4['sfsi_bluesky_countsFrom'])
    : '';
$option4['sfsi_threads_countsFrom']     = (isset($option4['sfsi_threads_countsFrom']))
    ? sanitize_text_field($option4['sfsi_threads_countsFrom'])
    : '';
$option4['sfsi_twitter_manualCounts']     = (isset($option4['sfsi_twitter_manualCounts']))
    ? intval($option4['sfsi_twitter_manualCounts'])
    : '';
$option4['sfsi_threads_manualCounts']     = (isset($option4['sfsi_threads_manualCounts']))
    ? intval($option4['sfsi_threads_manualCounts'])
    : '';
$option4['sfsi_bluesky_manualCounts']     = (isset($option4['sfsi_bluesky_manualCounts']))
    ? intval($option4['sfsi_bluesky_manualCounts'])
    : '';
$option4['tw_consumer_key']             = (isset($option4['tw_consumer_key']))
    ? sfsi_sanitize_field($option4['tw_consumer_key'])
    : '';
$option4['tw_consumer_secret']             = (isset($option4['tw_consumer_secret']))
    ? sfsi_sanitize_field($option4['tw_consumer_secret'])
    : '';
$option4['tw_oauth_access_token']         = (isset($option4['tw_oauth_access_token']))
    ? sfsi_sanitize_field($option4['tw_oauth_access_token'])
    : '';
$option4['tw_oauth_access_token_secret'] = (isset($option4['tw_oauth_access_token_secret']))
    ? sfsi_sanitize_field($option4['tw_oauth_access_token_secret'])
    : '';
$option4['sfsi_youtube_countsDisplay']     = (isset($option4['sfsi_youtube_countsDisplay']))
    ? sanitize_text_field($option4['sfsi_youtube_countsDisplay'])
    : '';
$option4['sfsi_youtube_countsFrom']     = (isset($option4['sfsi_youtube_countsFrom']))
    ? sanitize_text_field($option4['sfsi_youtube_countsFrom'])
    : '';
// $option4['sfsi_youtubeusernameorid'] 	= 	(isset($option4['sfsi_youtubeusernameorid']))
// 												? sanitize_text_field($option4['sfsi_youtubeusernameorid'])
// 												: '';
$option4['sfsi_youtube_manualCounts']     = (isset($option4['sfsi_youtube_manualCounts']))
    ? intval($option4['sfsi_youtube_manualCounts'])
    : '';

$option4['sfsi_instagram_manualCounts'] = (isset($option4['sfsi_instagram_manualCounts']))
    ? intval($option4['sfsi_instagram_manualCounts'])
    : '';
$option4['sfsi_instagram_User']         = (isset($option4['sfsi_instagram_User']))
    ? sfsi_sanitize_field($option4['sfsi_instagram_User'])
    : '';
$option4['sfsi_instagram_clientid']     = (isset($option4['sfsi_instagram_clientid']))
    ? sfsi_sanitize_field($option4['sfsi_instagram_clientid'])
    : '';
$option4['sfsi_instagram_appurl']       = (isset($option4['sfsi_instagram_appurl']))
    ? sfsi_sanitize_field($option4['sfsi_instagram_appurl'])
    : '';
$option4['sfsi_instagram_token']        = (isset($option4['sfsi_instagram_token']))
    ? sfsi_sanitize_field($option4['sfsi_instagram_token'])
    : '';
$option4['sfsi_instagram_countsFrom']     = (isset($option4['sfsi_instagram_countsFrom']))
    ? sanitize_text_field($option4['sfsi_instagram_countsFrom'])
    : '';
$option4['sfsi_instagram_countsDisplay'] = (isset($option4['sfsi_instagram_countsDisplay']))
    ? sanitize_text_field($option4['sfsi_instagram_countsDisplay'])
    : '';
$option4['sfsi_pinterest_manualCounts'] = (isset($option4['sfsi_pinterest_manualCounts']))
    ? intval($option4['sfsi_pinterest_manualCounts'])
    : '';
$option4['sfsi_linkedIn_manualCounts']     = (isset($option4['sfsi_linkedIn_manualCounts']))
    ? intval($option4['sfsi_linkedIn_manualCounts'])
    : '';

$option4['sfsi_telegram_countsDisplay']         = (isset($option4['sfsi_telegram_countsDisplay'])) ? sanitize_text_field($option4['sfsi_telegram_countsDisplay']) : '';
$option4['sfsi_telegram_manualCounts']         = (isset($option4['sfsi_telegram_manualCounts'])) ? intval($option4['sfsi_telegram_manualCounts']) : '';

$option4['sfsi_vk_countsDisplay']         = (isset($option4['sfsi_vk_countsDisplay'])) ? sanitize_text_field($option4['sfsi_vk_countsDisplay']) : '';
$option4['sfsi_vk_manualCounts']         = (isset($option4['sfsi_vk_manualCounts'])) ? intval($option4['sfsi_vk_manualCounts']) : '';

$option4['sfsi_ok_countsDisplay']         = (isset($option4['sfsi_ok_countsDisplay'])) ? sanitize_text_field($option4['sfsi_ok_countsDisplay']) : '';
$option4['sfsi_ok_manualCounts']         = (isset($option4['sfsi_ok_manualCounts'])) ? intval($option4['sfsi_ok_manualCounts']) : '';

$option4['sfsi_weibo_countsDisplay']         = (isset($option4['sfsi_weibo_countsDisplay'])) ? sanitize_text_field($option4['sfsi_weibo_countsDisplay']) : '';
$option4['sfsi_weibo_manualCounts']         = (isset($option4['sfsi_weibo_manualCounts'])) ? intval($option4['sfsi_weibo_manualCounts']) : '';


$option4['sfsi_wechat_countsDisplay']         = (isset($option4['sfsi_wechat_countsDisplay'])) ? sanitize_text_field($option4['sfsi_wechat_countsDisplay']) : '';
$option4['sfsi_wechat_manualCounts']         = (isset($option4['sfsi_wechat_manualCounts'])) ? intval($option4['sfsi_wechat_manualCounts']) : '';

$option4['sfsi_snapchat_countsDisplay']         = (isset($option4['sfsi_snapchat_countsDisplay'])) ? sanitize_text_field($option4['sfsi_snapchat_countsDisplay']) : '';
$option4['sfsi_snapchat_manualCounts']         = (isset($option4['sfsi_snapchat_manualCounts'])) ? intval($option4['sfsi_snapchat_manualCounts']) : '20';

$option4['sfsi_reddit_countsDisplay']         = (isset($option4['sfsi_reddit_countsDisplay'])) ? sanitize_text_field($option4['sfsi_reddit_countsDisplay']) : '';
$option4['sfsi_reddit_manualCounts']         = (isset($option4['sfsi_reddit_manualCounts'])) ? intval($option4['sfsi_reddit_manualCounts']) : '20';

$option4['sfsi_fbmessenger_countsDisplay']         = (isset($option4['sfsi_fbmessenger_countsDisplay'])) ? sanitize_text_field($option4['sfsi_fbmessenger_countsDisplay']) : '';
$option4['sfsi_fbmessenger_manualCounts']         = (isset($option4['sfsi_fbmessenger_manualCounts'])) ? intval($option4['sfsi_fbmessenger_manualCounts']) : '20';

$option4['sfsi_tiktok_countsDisplay']         = (isset($option4['sfsi_tiktok_countsDisplay'])) ? sanitize_text_field($option4['sfsi_tiktok_countsDisplay']) : '';
$option4['sfsi_tiktok_manualCounts']         = (isset($option4['sfsi_tiktok_manualCounts'])) ? intval($option4['sfsi_tiktok_manualCounts']) : '20';

$option4['sfsi_ria_countsDisplay']         = (isset($option4['sfsi_ria_countsDisplay'])) ? sanitize_text_field($option4['sfsi_ria_countsDisplay']) : '';
$option4['sfsi_ria_manualCounts']         = (isset($option4['sfsi_ria_manualCounts'])) ? intval($option4['sfsi_ria_manualCounts']) : '20';

$option4['sfsi_inha_countsDisplay']         = (isset($option4['sfsi_inha_countsDisplay'])) ? sanitize_text_field($option4['sfsi_inha_countsDisplay']) : '';
$option4['sfsi_inha_manualCounts']         = (isset($option4['sfsi_inha_manualCounts'])) ? intval($option4['sfsi_inha_manualCounts']) : '20';

$option4['sfsi_mastodon_countsDisplay']         = (isset($option4['sfsi_mastodon_countsDisplay'])) ? sanitize_text_field($option4['sfsi_mastodon_countsDisplay']) : '';
$option4['sfsi_mastodon_manualCounts']         = (isset($option4['sfsi_mastodon_manualCounts'])) ? intval($option4['sfsi_mastodon_manualCounts']) : '20';

$option4['sfsi_whatsapp_countsDisplay']         = (isset($option4['sfsi_whatsapp_countsDisplay'])) ? sanitize_text_field($option4['sfsi_whatsapp_countsDisplay']) : '';
$option4['sfsi_whatsapp_manualCounts']         = (isset($option4['sfsi_whatsapp_manualCounts'])) ? intval($option4['sfsi_whatsapp_manualCounts']) : '';

$option4['sfsi_round_counts']         = (isset($option4['sfsi_round_counts'])) ? sanitize_text_field($option4['sfsi_round_counts']) : '';
$option4['sfsi_original_counts']         = (isset($option4['sfsi_original_counts'])) ? sanitize_text_field($option4['sfsi_original_counts']) : '';
$option4['sfsi_responsive_share_count']         = (isset($option4['sfsi_responsive_share_count'])) ? sanitize_text_field($option4['sfsi_responsive_share_count']) : '';

if (isset($option4['sfsi_youtube_user']) && !empty($option4['sfsi_youtube_user'])) {
    $option4['sfsi_youtube_user']       = sfsi_sanitize_field($option4['sfsi_youtube_user']);
} else {
    if (isset($option2['sfsi_youtubeusernameorid']) && "name" == $option2['sfsi_youtubeusernameorid']  && !empty($option2['sfsi_youtubeusernameorid'])) {
        $option4['sfsi_youtube_user']   = isset($option2['sfsi_ytube_user']) && !empty($option2['sfsi_ytube_user']) ? $option2['sfsi_ytube_user'] : '';
    }
}

if (isset($option4['sfsi_youtube_channelId']) && !empty($option4['sfsi_youtube_channelId'])) {
    $option4['sfsi_youtube_channelId']       = sfsi_sanitize_field($option4['sfsi_youtube_channelId']);
} else {
    if ("id" == $option2['sfsi_youtubeusernameorid'] && isset($option2['sfsi_youtubeusernameorid']) && !empty($option2['sfsi_youtubeusernameorid'])) {
        $option4['sfsi_youtube_channelId']   = isset($option2['sfsi_ytube_chnlid']) && !empty($option2['sfsi_ytube_chnlid']) ? $option2['sfsi_ytube_chnlid'] : '';
    }
}

/* fetch counts for admin sections */
$counts = sfsi_getCounts();

/* check for email icon display */
$email_image = "email.png";

if (isset($option2['sfsi_rss_icons']) && !empty($option2['sfsi_rss_icons']) && $option2['sfsi_rss_icons'] == "sfsi") {
    $email_image = "sf_arow_icn.png";
}
$hide = "display:none;";

?>

<!-- Section 4 "Do you want to display "counts" next to your icons?" main div Start -->
<div class="tab4">
    <p>
            <?php
                printf(
                    __( 'It’s a psychological fact that people like to follow other people (as explained well in Robert Cialdini’s book “%1sInfluence%2s”), so when they see that your site has already a good number of Facebook likes, it’s more likely that they will subscribe/like/share your site than if it had 0.','ultimate-social-media-icons' ),
                    '<a href="http://www.amazon.com/Influence-Psychology-Persuasion-Revised-Edition/dp/006124189X" target="_blank" class="lit_txt">',
                    '</a>'
                );
            ?>
    </p>
    <p><?php _e('Therefore, you can select to display the count next to your main icons, which will look like this (example for round icons):','ultimate-social-media-icons') ?></p>

    <!-- sample icons -->
    <ul class="like_icon">
        <li class="rss_section">
            <a href="#" title="RSS">
                <img src="<?php echo SFSI_PLUGURL ?>images/rss.png" alt="RSS" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="email_section">
            <a href="#" title="Email">
                <img src="<?php echo SFSI_PLUGURL ?>images/<?php echo $email_image; ?>" alt="Email" class="icon_img" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="facebook_section">
            <a href="#" title="Facebook">
                <img src="<?php echo SFSI_PLUGURL ?>images/facebook.png" alt="Facebook" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="twitter_section">
            <a href="#" title="X/Twitter">
                <img src="<?php echo SFSI_PLUGURL ?>images/twitter.png" alt="Twitter" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="threads_section">
            <a href="#" title="Threads">
                <img src="<?php echo SFSI_PLUGURL ?>images/threads.png" alt="Threads" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="bluesky_section">
            <a href="#" title="Bluesky">
                <img src="<?php echo SFSI_PLUGURL ?>images/bluesky.png" alt="Bluesky" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <!--         <li class="share_section">
            <a href="#" title="Share">
                <img src="<?php //echo SFSI_PLUGURL
                            ?>images/share.png" alt="Share" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li> -->
        <li class="youtube_section">
            <a href="#" title="YouTube">
                <img src="<?php echo SFSI_PLUGURL ?>images/youtube.png" alt="YouTube" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="pinterest_section">
            <a href="#" title="Pinterest">
                <img src="<?php echo SFSI_PLUGURL ?>images/pinterest.png" alt="Pinterest" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="linkedin_section">
            <a href="#" title="Linked In">
                <img src="<?php echo SFSI_PLUGURL ?>images/linked_in.png" alt="Linked In" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="instagram_section">
            <a href="#" title="Instagram">
                <img src="<?php echo SFSI_PLUGURL ?>images/instagram.png" alt="instagram" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="ria_section">
            <a href="#" title="RateItAll">
                <img src="<?php echo SFSI_PLUGURL ?>images/ria.png" alt="RateItAll" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="inha_section">
            <a href="#" title="IncreasingHappiness">
                <img src="<?php echo SFSI_PLUGURL ?>images/inha.png" alt="IncreasingHappiness" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="telegram_section">
            <a href="#" title="telegram">
                <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_telegram.png" height="50px" alt="telegram" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="vk_section">
            <a href="#" title="vk">
                <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_vk.png" height="50px" alt="vk" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="ok_section">
            <a href="#" title="ok">
                <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_ok.png" height="50px" alt="ok" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="whatsapp_section">
            <a href="#" title="whatsapp">
                <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_whatsapp.png" height="50px" alt="whatsapp" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="weibo_section">
            <a href="#" title="weibo">
                <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_weibo.png" height="50px" alt="weibo" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="wechat_section">
            <a href="#" title="wechat">
                <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_wechat.png" height="50px" alt="wechat" />
            </a>
            <span><?php _e('12k','ultimate-social-media-icons') ?></span>
        </li>
        <li class="snapchat_section">
            <a href="#" title="snapchat">
                <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_snapchat.png" height="50px" alt="snapchat" />
            </a>
            <span>12k</span>
        </li>
        <li class="reddit_section">
            <a href="#" title="reddit">
                <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_reddit.png" height="50px" alt="reddit" />
            </a>
            <span>12k</span>
        </li>
        <li class="fbmessenger_section">
            <a href="#" title="fbmessenger">
                <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_fbmessenger.png" height="50px" alt="fbmessenger" />
            </a>
            <span>12k</span>
        </li>
        <li class="tiktok_section">
            <a href="#" title="tiktok">
                <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_tiktok.png" height="50px" alt="tiktok" />
            </a>
            <span>12k</span>
        </li>
        <li class="mastodon_section">
            <a href="#" title="mastodon">
                <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_mastodon.png" height="50px" alt="mastodon" />
            </a>
            <span>12k</span>
        </li>
    </ul>
    <!-- END sample icons -->

    <p><?php
        printf(
            __( 'Of course, if you start at 0, you shoot yourself in the foot with that. So we suggest that you only turn this feature on once you have a good number of followers/likes/shares (min. of 20 – no worries if it’s not too many, it should just not be 0). %1sNew:%2s In the Premium Plugin you can define a threshold (min. number of counts) when it will automatically switch to showing the counts. %3sGo Premium%4s','ultimate-social-media-icons' ),
            '<b>',
            '</b>',
            '<a style="cursor:pointer" class="pop-up" href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" class="sfisi_font_bold" target="_blank">',
            '</a>'
        ); ?></p>
    <h4><?php _e('Enough waffling. So do you want to display counts?','ultimate-social-media-icons') ?></h4>

    <!-- show/hide counts for icons section  START -->
    <ul class="enough_waffling">
        <li>
            <input name="sfsi_display_counts" <?php echo ($option4['sfsi_display_counts'] == 'yes') ?  'checked="true"' : ''; ?> type="radio" value="yes" class="styled" /><label><?php _e('Yes','ultimate-social-media-icons') ?></label>
        </li>
        <li>
            <input name="sfsi_display_counts" <?php echo ($option4['sfsi_display_counts'] == 'no') ?  'checked="true"' : ''; ?> type="radio" value="no" class="styled" /><label><?php _e('No','ultimate-social-media-icons') ?></label>
        </li>
    </ul>
    <!-- END  show/hide counts for icons section -->

    <!-- show/hide counts for all icons section  START -->

    <div class="count_sections" style="display:none;">
        <?php
        $socialObj = new sfsi_SocialHelper();
        $current_url = site_url();
        $sfsi_fb_count =  get_option('sfsi_fb_count', false);
        $fb_data = $socialObj->sfsi_banner_get_fb(urlencode($current_url));

        $check_fb_count_more_than_one = $fb_data > 0 || $socialObj->sfsi_get_pinterest(urlencode($current_url)) > 0;
        if ($check_fb_count_more_than_one > $sfsi_fb_count || $sfsi_fb_count == "") {
            update_option('sfsi_fb_count', ($check_fb_count_more_than_one));
        }
        $sfsi_fb_count_check_for_shares =  $sfsi_fb_count > 0;

        if (is_ssl() && ($sfsi_fb_count_check_for_shares ||  $check_fb_count_more_than_one)) {
            ?>
            <div class="sfsi_new_prmium_follw sfsi_banner_body sfsi_warning_banner">
            <div>
                    <?php
                        printf(
                            __( '%1sImportant:%2sYour website used to be on http (before you enabled an SSL certificate to switch to https). We found share counts for your URLs on http which usually get lost
                            after switch to https (because Facebook etc. provide the counts per url, and an url on https is a different url then one on http).%3s We found a solution for that%4s so that your share counts on http and https will
                            be aggregated and your full number of share counts is restored. It is implemented in the Premium Plugin - %5sGet it now.%6s','ultimate-social-media-icons' ),
                            '<p style="margin-bottom: 12px !important;"><b>',
                            '</b>',
                            '<b>',
                            '</b>',
                            '<a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=share_count_recovery_notification&utm_medium=link" style="cursor:pointer; color: #12a252 !important;border-bottom: 1px solid #222222;text-decoration: none;font-weight: bold;font-family: unset;" data-id="sfsi_quickpay-overlay" target="_blank"><b>',
                            '</b></a></p>'
                        );
                    ?>
                </div>
                <small class="sfsi_banner_dismiss"><?php _e('Dismiss','ultimate-social-media-icons') ?></small>
            </div>
        <?php
        }
        ?>
        <h4 style="display: inline-block;"><?php _e('Please specify which counts should be shown:','ultimate-social-media-icons') ?></h4>

        <!-- RSS ICON COUNT SECTION-->
        <div class="specify_counts rss_section">
            <div class="radio_section">
                <input name="sfsi_rss_countsDisplay" <?php echo ($option4['sfsi_rss_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="RSS">
                            <img src="<?php echo SFSI_PLUGURL ?>images/rss.png" alt="RSS" />
                            <span><?php echo $counts['rss_count']; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
            <ul>
                    <li><?php _e('We cannot track this. So enter the figure here:','ultimate-social-media-icons') ?> <input name="sfsi_rss_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_rss_manualCounts'] != '') ? esc_attr($option4['sfsi_rss_manualCounts']) : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END RSS ICON COUNT SECTION-->

        <!-- EMAIL ICON COUNT SECTION-->
        <div class="specify_counts email_section">
            <div class="radio_section">
                <input name="sfsi_email_countsDisplay" <?php echo ($option4['sfsi_email_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="Email">
                            <img src="<?php echo SFSI_PLUGURL ?>images/<?php echo $email_image; ?>" alt="Email" />
                            <span><?php echo $counts['email_count']; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li><input name="sfsi_email_countsFrom" <?php echo ($option4['sfsi_email_countsFrom'] == 'source') ?  'checked="true"' : ''; ?> type="radio" value="source" class="styled" /><?php _e('Retrieve the number of subscribers automatically','ultimate-social-media-icons') ?></li>
                    <li><input name="sfsi_email_countsFrom" <?php echo ($option4['sfsi_email_countsFrom'] == 'manual') ?  'checked="true"' : ''; ?> type="radio" value="manual" class="styled" /><?php _e('Enter the figure manually:','ultimate-social-media-icons') ?><input name="sfsi_email_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_email_manualCounts'] != '') ? esc_attr($option4['sfsi_email_manualCounts']) : ''; ?>" style="<?php echo ($option4['sfsi_email_countsFrom'] == 'source') ?  'display:none;' : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!--END  EMAIL  ICON COUNT SECTION-->

        <!-- FACEBOOK ICON COUNT SECTION-->
        <div class="specify_counts facebook_section">
            <div class="radio_section">
                <input name="sfsi_facebook_countsDisplay" <?php echo ($option4['sfsi_facebook_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li><a title="Facebook"><img src="<?php echo SFSI_PLUGURL ?>images/facebook.png" alt="Facebook" /><span><?php echo $counts['fb_count']; ?></span></a></li>
                </ul>
            </div>
            <div class="listing">
                <ul class="sfsi_fb_popup_contain">
                    <li>
                    <input name="sfsi_facebook_countsFrom" <?php echo ($option4['sfsi_facebook_countsFrom'] == 'likes') ?  'checked="true"' : ''; ?> type="radio" value="likes" class="styled" /><?php _e('Retrieve the number of likes ','ultimate-social-media-icons') ?><strong><?php _e('of your blog','ultimate-social-media-icons') ?></strong>
                        <div class="sfsi_prem_fbpgiddesc">
                            <div class="sfsi_prem_fbpgidwpr" style="<?php echo ($option4['sfsi_facebook_countsFrom'] == 'likes' || $option4['sfsi_facebook_countsFrom'] == 'followers' || $option4['sfsi_facebook_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>"></div>

                        </div>
                    </li>
                    <li>
                        <input name="sfsi_facebook_countsFrom" <?php echo ($option4['sfsi_facebook_countsFrom'] == 'mypage') ?  'checked="true"' : ''; ?> type="radio" value="mypage" class="styled" />
                        <?php _e('Retrieve the number of likes ','ultimate-social-media-icons') ?><strong><?php _e('of your Facebook page ','ultimate-social-media-icons') ?></strong><br>
                        <div class="sfsi_fbpgiddesc sfsi_fbpaget">
                            <div class="sfsi_fbpgidwpr sfsi_count" style="<?php echo ($option4['sfsi_facebook_countsFrom'] == 'likes' || $option4['sfsi_facebook_countsFrom'] == 'followers' || $option4['sfsi_facebook_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>">
                                Facebook page ID:
                            </div>
                            <input name="sfsi_facebook_mypageCounts" type="text" class="input mypginpt" value="<?php echo ($option4['sfsi_facebook_mypageCounts'] != '') ? esc_attr($option4['sfsi_facebook_mypageCounts']) : ''; ?>" style="<?php echo ($option4['sfsi_facebook_countsFrom'] == 'likes' || $option4['sfsi_facebook_countsFrom'] == 'followers' || $option4['sfsi_facebook_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>" />
                            <div class="sfsi_fbpgidwpr sfsi_fbpgiddesc sfsi_facebook_count" style="<?php echo ($option4['sfsi_facebook_countsFrom'] == 'likes' || $option4['sfsi_facebook_countsFrom'] == 'followers' || $option4['sfsi_facebook_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>"><?php _e("(You'll find it at the bottom of the ",'ultimate-social-media-icons') ?><code>
                                    <<</code><?php _e("About",'ultimate-social-media-icons') ?> <code>>>
                                </code><?php _e("-tab on your facebook page)",'ultimate-social-media-icons') ?></div>
                        </div>
                    </li>
                    <li>
                        <input name="sfsi_facebook_countsFrom" <?php echo ($option4['sfsi_facebook_countsFrom'] == 'manual') ?  'checked="true"' : ''; ?> type="radio" value="manual" class="styled" />Enter the figure manually:<input name="sfsi_facebook_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_facebook_manualCounts'] != '') ? esc_attr($option4['sfsi_facebook_manualCounts']) : ''; ?>" style="<?php echo ($option4['sfsi_facebook_countsFrom'] == 'likes' || $option4['sfsi_facebook_countsFrom'] == 'followers' || $option4['sfsi_facebook_countsFrom'] == 'mypage') ?  'display:none;' : ''; ?>" />
                    </li>

                    <li style="margin-left: 7px">
                        <input name="sfsi_facebook_enableCache" <?php echo (isset($option4['sfsi_facebook_enableCache']) && $option4['sfsi_facebook_enableCache'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" class="styled" />Enable cache for 24 hours
                    </li>
                </ul>
                <div class="sfsi_facebook_pagedeasc" style="<?php echo (isset($option4['sfsi_facebook_countsFrom']) && $option4['sfsi_facebook_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>">

                    <?php
                        printf(
                            __( '%1$sNote:%2$s This plugin uses %3$sone%4$s API shared by all users of this plugin. There is a limit (set by Facebook) how often this API can get the counts per day, <b style="color:red;">so it may happen that it returns “0 counts” later in the day.</b>%5$sTherefore we implemented a solution as part of our Premium Plugin where you can %6$seasily%7$s set up your own API in a few steps, which will fix this problem.%8$s or learn more.%9$s','ultimate-social-media-icons' ),
                            '<p class="sfsi_shared_premium"><b>',
                            '</b>',
                            '<u>',
                            '</u>',
                            '<br><br>',
                            '<b>',
                            '</b>',
                            '<br><br><a style="cursor:pointer;border-bottom: 1px solid #12a252;color: #12a252 !important" class="pop-up" href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link" style="border-bottom: 1px solid #12a252;color: #12a252 !important" class="sfisi_font_bold" target="_blank">Go premium now<a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=facebook_counts&utm_medium=banner" class="sfsi_font_inherit" style="color: #12a252 !important" target="_blank">',
                            '</a>'
                        );
                    ?> 
                    </p>
                </div>

            </div>
        </div>
        <!-- END FACEBOOK ICON COUNT SECTION-->

        <!-- TWITTER ICON COUNT SECTION-->
        <div class="specify_counts twitter_section">
            <div class="radio_section">
                <input name="sfsi_twitter_countsDisplay" <?php echo ($option4['sfsi_twitter_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="X/Twitter">
                            <img src="<?php echo SFSI_PLUGURL ?>images/twitter.png" alt="Twitter" />
                            <span><?php echo $counts['twitter_count']; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li>
                        <input name="sfsi_twitter_countsFrom" <?php echo ($option4['sfsi_twitter_countsFrom'] == 'source') ?  'checked="true"' : ''; ?> type="radio" value="source" class="styled" />Retrieve the number of X (Twitter) followers
                    </li>

                    <li class="SFSI_tglli">
                    <ul class="SFSI_lsngfrm">
                            <li class="tw_follow_options" style="<?php echo ($option4['sfsi_twitter_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>">
                                <label><?php _e("Enter Consumer Key:",'ultimate-social-media-icons') ?></label>
                                <input name="tw_consumer_key" class="input_facebook" type="text" value="<?php echo (isset($option4['tw_consumer_key']) && $option4['tw_consumer_key'] != '') ? esc_attr($option4['tw_consumer_key']) : ''; ?>" />
                            </li>
                            <li class="tw_follow_options" style="<?php echo ($option4['sfsi_twitter_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>">
                                <label><?php _e("Enter Consumer Secret:",'ultimate-social-media-icons') ?></label>
                                <input name="tw_consumer_secret" class="input_facebook" type="text" value="<?php echo (isset($option4['tw_consumer_secret']) && $option4['tw_consumer_secret'] != '') ? esc_attr($option4['tw_consumer_secret']) : ''; ?>" />
                            </li>
                            <li class="tw_follow_options" style="<?php echo ($option4['sfsi_twitter_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>">
                                <label><?php _e("Enter Access Token:",'ultimate-social-media-icons') ?></label>
                                <input name="tw_oauth_access_token" class="input_facebook" type="text" value="<?php echo (isset($option4['tw_oauth_access_token']) && $option4['tw_oauth_access_token'] != '') ? esc_attr($option4['tw_oauth_access_token']) : ''; ?>" />
                            </li>
                            <li class="tw_follow_options" style="<?php echo ($option4['sfsi_twitter_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>">
                                <label><?php _e("Enter Access Token Secret:",'ultimate-social-media-icons') ?></label>
                                <input name="tw_oauth_access_token_secret" class="input_facebook" type="text" value="<?php echo (isset($option4['tw_oauth_access_token_secret']) && $option4['tw_oauth_access_token_secret'] != '') ? esc_attr($option4['tw_oauth_access_token_secret']) : ''; ?>" />
                            </li>
                        </ul>
                        <ul class="SFSI_instructions">
                            <li class="tw_follow_options" style="<?php echo ($option4['sfsi_twitter_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>"><?php _e(" Please make sure you have entered the",'ultimate-social-media-icons') ?> <b><?php _e("Username",'ultimate-social-media-icons') ?> </b> <?php _e("for",'ultimate-social-media-icons') ?> <b><?php _e('"Follow me on X (Twitter):"','ultimate-social-media-icons') ?></b><?php _e(" in X (Twitter) settings under question number 2.",'ultimate-social-media-icons') ?> </li>
                            <li class="tw_follow_options" style="<?php echo ($option4['sfsi_twitter_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>">
                                <!-- <h3> --><b><?php _e("To get this information:",'ultimate-social-media-icons') ?> </b><!-- </h3> -->
                            </li>
                            <li class="tw_follow_options" style="<?php echo ($option4['sfsi_twitter_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>"><?php _e("1: Go to",'ultimate-social-media-icons') ?> <a href="http://apps.twitter.com" target="_blank">apps.twitter.com</a></li>
                            <li class="tw_follow_options" style="<?php echo ($option4['sfsi_twitter_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>"><?php _e('2: Click on "Create new app"','ultimate-social-media-icons') ?></li>
                            <li class="tw_follow_options" style="<?php echo ($option4['sfsi_twitter_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>"><?php _e('3: Enter a random Name , Descriptions and Website URL ','ultimate-social-media-icons') ?>(including the "http://", e.g. http://dummysitename.com)</li>
                            <li class="tw_follow_options" style="<?php echo ($option4['sfsi_twitter_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>"><?php _e('4: Go to "Keys and Access Tokens" tab and click on "Generate Token" in the "Token actions" section at the bottom','ultimate-social-media-icons') ?></li>
                            <li class="tw_follow_options" style="<?php echo ($option4['sfsi_twitter_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>"><?php _e('5: Then click on "Test OAuth" at the top right and you will see the 4 token key','ultimate-social-media-icons') ?></li>
                        </ul>
                    </li>
                    <li>
                    <input name="sfsi_twitter_countsFrom" <?php echo ($option4['sfsi_twitter_countsFrom'] == 'manual') ?  'checked="true"' : ''; ?> type="radio" value="manual" class="styled" /><?php _e("Enter the figure manually:",'ultimate-social-media-icons') ?><input name="sfsi_twitter_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_twitter_manualCounts'] != '') ? esc_attr($option4['sfsi_twitter_manualCounts']) : ''; ?>" style="<?php echo ($option4['sfsi_twitter_countsFrom'] == 'source') ?  'display:none;' : ''; ?>" />
                    </li>
                </ul>
            </div>
        </div>
        <!--END TWITTER ICON COUNT SECTION-->

        <!-- THREADS ICON COUNT SECTION-->
        <div class="specify_counts threads_section">
            <div class="radio_section">
                <input name="sfsi_threads_countsDisplay" <?php echo ( $option4['sfsi_threads_countsDisplay'] == 'yes' ) ? 'checked="true"' : ''; ?>
                       type="checkbox" value="yes" class="styled"/>
            </div>

            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="Threads">
                            <img src="<?php echo SFSI_PLUGURL ?>images/threads.png" alt="Threads"/>
                            <span><?php echo $counts['threads_count']; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li>
                        <input name="sfsi_threads_countsFrom" <?php echo ( $option4['sfsi_threads_countsFrom'] == 'manual' || $option4['sfsi_threads_countsFrom'] == 'follower' ) ? 'checked="true"' : ''; ?>
                               type="radio" value="manual"
                               class="styled"/><?php _e( "Enter the figure manually:", 'ultimate-social-media-icons' ) ?>
                        <input name="sfsi_threads_manualCounts" type="text" class="input"
                               value="<?php echo ( $option4['sfsi_threads_manualCounts'] != '' ) ? esc_attr( $option4['sfsi_threads_manualCounts'] ) : ''; ?>"
                               style="<?php echo ( $option4['sfsi_threads_countsFrom'] == 'follower' ) ? 'display:none;' : ''; ?>"/>
                    </li>
                </ul>
            </div>
        </div>
        <!--END THREADS ICON COUNT SECTION-->

        <!-- BLUESKY ICON COUNT SECTION-->
        <div class="specify_counts bluesky_section">
            <div class="radio_section">
                <input name="sfsi_bluesky_countsDisplay" <?php echo ( $option4['sfsi_bluesky_countsDisplay'] == 'yes' ) ? 'checked="true"' : ''; ?>
                       type="checkbox" value="yes" class="styled"/>
            </div>

            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="Bluesky">
                            <img src="<?php echo SFSI_PLUGURL ?>images/bluesky.png" alt="Bluesky"/>
                            <span><?php echo $counts['bluesky_count']; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li>
                        <input name="sfsi_bluesky_countsFrom" <?php echo ( $option4['sfsi_bluesky_countsFrom'] == 'manual' || $option4['sfsi_bluesky_countsFrom'] == 'follower' ) ? 'checked="true"' : ''; ?>
                               type="radio" value="manual" class="styled"/>
					    <?php _e( "Enter the figure manually:", 'ultimate-social-media-icons' ) ?>
                        <input name="sfsi_bluesky_manualCounts" type="text" class="input"
                               value="<?php echo ( $option4['sfsi_bluesky_manualCounts'] != '' ) ? esc_attr( $option4['sfsi_bluesky_manualCounts'] ) : ''; ?>"
                               style="<?php echo ( $option4['sfsi_threads_countsFrom'] == 'follower' ) ? 'display:none;' : ''; ?>"/>
                    </li>
                </ul>
            </div>
        </div>
        <!--END BLUESKY ICON COUNT SECTION-->

        <!-- LINKEDIN ICON COUNT SECTION-->
        <div class="specify_counts linkedin_section">
            <div class="radio_section"><input name="sfsi_linkedIn_countsDisplay" <?php echo ($option4['sfsi_linkedIn_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" /></div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="Linked in">
                            <img src="<?php echo SFSI_PLUGURL ?>images/linked_in.png" alt="Linked in" />
                            <span><?php echo $counts['linkedIn_count']; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>

                    <?php /*?><li><input name="sfsi_linkedIn_countsFrom" <?php echo ($option4['sfsi_linkedIn_countsFrom']=='follower') ?  'checked="true"' : '' ;?>  type="radio" value="follower" class="styled" />Retrieve the number of Linkedin followers</li>
            <li class="SFSI_tglli">
                <ul class="SFSI_lsngfrm">

                    <li class="linkedIn_options" style="<?php echo ($option4['sfsi_linkedIn_countsFrom']=='manual') ?  'display:none;' : '' ;?>"><label>Enter Company Name </label><input name="ln_company" class="input_facebook" type="text" value="<?php echo (isset($option4['ln_company']) && $option4['ln_company']!='') ? $option4['ln_company'] : '' ;?>" /> </li>
                    <li  class="linkedIn_options" style="<?php echo ($option4['sfsi_linkedIn_countsFrom']=='manual') ?  'display:none;' : '' ;?>"><label>Enter API Key </label><input name="ln_api_key" class="input_facebook" type="text" value="<?php echo (isset($option4['ln_api_key']) && $option4['ln_api_key']!='') ? $option4['ln_api_key'] : '' ;?>" /> </li>
                    <li  class="linkedIn_options" style="<?php echo ($option4['sfsi_linkedIn_countsFrom']=='manual') ?  'display:none;' : '' ;?>"><label>Enter Secret Key </label><input name="ln_secret_key" class="input_facebook" type="text" value="<?php echo (isset($option4['ln_secret_key']) && $option4['ln_secret_key']!='') ? $option4['ln_secret_key'] : '' ;?>" /> </li>
                    <li  class="linkedIn_options" style="<?php echo ($option4['sfsi_linkedIn_countsFrom']=='manual') ?  'display:none;' : '' ;?>" ><label>Enter OAuth User Token</label> <input name="ln_oAuth_user_token" class="input_facebook" type="text" value="<?php echo (isset($option4['ln_oAuth_user_token']) && $option4['ln_oAuth_user_token']!='') ? $option4['ln_oAuth_user_token'] : '' ;?>" /> </li>
                </ul>
                <ul class="SFSI_instructions">
                    <li class="linkedIn_options" style="<?php echo ($option4['sfsi_linkedIn_countsFrom']=='manual') ?  'display:none;' : '' ;?>"><h3>To get the API key for LinkedIn:</h3></li>
                    <li class="linkedIn_options" style="<?php echo ($option4['sfsi_linkedIn_countsFrom']=='manual') ?  'display:none;' : '' ;?>">1: Go to <a href="https://developer.linkedin.com/" target="_blank">www.developer.linkedin.com</a>, mouse over “Support” and select “API keys”</li>
                    <li class="linkedIn_options" style="<?php echo ($option4['sfsi_linkedIn_countsFrom']=='manual') ?  'display:none;' : '' ;?>">2: Then login with your Linkedin account and create a new application</li>
                    <li class="linkedIn_options" style="<?php echo ($option4['sfsi_linkedIn_countsFrom']=='manual') ?  'display:none;' : '' ;?>">3: Fill the required boxes in the form with random data, accept the Terms and add the application</li>
                    <li class="linkedIn_options" style="<?php echo ($option4['sfsi_linkedIn_countsFrom']=='manual') ?  'display:none;' : '' ;?>">4: In the next step you will see the required API information</li>
                    <li class="linkedIn_options" style="<?php echo ($option4['sfsi_linkedIn_countsFrom']=='manual') ?  'display:none;' : '' ;?>">When you enter this key into the plugin for the first time, it may take some time until the correct follower count is displayed on your website.</li>
                </ul>
             </li><?php */ ?>


                <li><input name="sfsi_linkedIn_countsFrom" <?php echo ($option4['sfsi_linkedIn_countsFrom'] == 'manual' || $option4['sfsi_linkedIn_countsFrom'] == 'follower') ?  'checked="true"' : ''; ?> type="radio" value="manual" class="styled" /><?php _e("Enter the figure manually:",'ultimate-social-media-icons') ?><input name="sfsi_linkedIn_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_linkedIn_manualCounts'] != '') ? esc_attr($option4['sfsi_linkedIn_manualCounts']) : ''; ?>" style="<?php echo ($option4['sfsi_linkedIn_countsFrom'] == 'follower') ?  'display:none;' : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END LINKEDIN ICON COUNT SECTION-->

        <!-- YOUTUBE ICON COUNT SECTION-->
        <div class="specify_counts youtube_section">
            <div class="radio_section"><input name="sfsi_youtube_countsDisplay" <?php echo ($option4['sfsi_youtube_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" /></div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li><a title="YouTube"><img src="<?php echo SFSI_PLUGURL ?>images/youtube.png" alt="YouTube" /><span><?php echo $counts['youtube_count']; ?></span></a></li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li><input name="sfsi_youtube_countsFrom" type="radio" value="subscriber" <?php echo ($option4['sfsi_youtube_countsFrom'] == 'subscriber') ?  'checked="true"' : ''; ?> class="styled" /><?php _e("Retrieve the number of Subscribers",'ultimate-social-media-icons') ?></li>
                    <li class="youtube_options" style="<?php echo (!isset($option4['sfsi_youtube_countsFrom']) || empty($option4['sfsi_youtube_countsFrom']) || $option4['sfsi_youtube_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>">
                        <div style="display: none!important;">
                            <label><?php _e("Enter Youtube User name:",'ultimate-social-media-icons') ?></label>
                            <input name="sfsi_youtube_user" class="input_facebook" type="text" value="<?php echo (isset($option4['sfsi_youtube_user']) && $option4['sfsi_youtube_user'] != '') ? esc_attr($option4['sfsi_youtube_user']) : ''; ?>" />
                        </div>
                    </li>
                    <li class="youtube_options" style="<?php echo (!isset($option4['sfsi_youtube_countsFrom']) || empty($option4['sfsi_youtube_countsFrom']) || $option4['sfsi_youtube_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>">
                        <div>
                            <label><?php _e("Enter Youtube Channel Id:",'ultimate-social-media-icons') ?></label>
                            <input name="sfsi_youtube_channelId" class="input_facebook" type="text" value="<?php echo (isset($option4['sfsi_youtube_channelId']) && $option4['sfsi_youtube_channelId'] != '') ? esc_attr($option4['sfsi_youtube_channelId']) : ''; ?>" />
                        </div>

                    </li>
                    <li>
                        <input name="sfsi_youtube_countsFrom" type="radio" value="manual" <?php echo ($option4['sfsi_youtube_countsFrom'] == 'manual') ?  'checked="true"' : ''; ?> class="styled" /><?php _e("Enter the figure manually:",'ultimate-social-media-icons') ?><input name="sfsi_youtube_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_youtube_manualCounts'] != '') ? esc_attr($option4['sfsi_youtube_manualCounts']) : ''; ?>" style="<?php echo ($option4['sfsi_youtube_countsFrom'] == 'subscriber') ?  'display:none;' : ''; ?>" />
                    </li>
                </ul>
            </div>
        </div>
        <!-- END YOUTUBE ICON COUNT SECTION-->

        <!-- PINIT ICON COUNT SECTION-->
        <div class="specify_counts pinterest_section">
            <div class="radio_section"><input name="sfsi_pinterest_countsDisplay" <?php echo ($option4['sfsi_pinterest_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" /></div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li><a title="Pinterest"><img src="<?php echo SFSI_PLUGURL ?>images/pinterest.png" alt="Pinterest" /><span><?php echo $counts['pin_count']; ?></span></a></li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li class="sfsi_show_via_onhover disabled_checkbox d-flex sfsi-max-content clear">
                        <label class="sfsi_tooltip_premium d-flex flex-row">
                            <div class="sfsiicnsdvwrp">
                                <span class="radio" style="background-position:0px 0px!important;"></span>
                            </div>
                            <div class="sfsicnwrp-no-margin">
                                <?php
                                    _e( 'Retrieve the number of Pinterest (+1) (on your blog)', 'ultimate-social-media-icons' );
                                    echo sfsi_premium_tooltip_content();
                                ?>
                            </div>
                        </label>
                    </li>
                    <li class="sfsi_show_via_onhover disabled_checkbox d-flex sfsi-max-content clear">
                        <label class="sfsi_tooltip_premium d-flex flex-row">
                            <div class="sfsiicnsdvwrp">
                                <span class="radio" style="background-position:0px 0px!important;"></span>
                            </div>
                            <div class="sfsicnwrp-no-margin">
                                <?php
                                    _e( 'Retrieve the number of pins of board from your pinterest account', 'ultimate-social-media-icons' );
                                    echo sfsi_premium_tooltip_content();
                                ?>
                            </div>
                        </label>
                    </li>
                    <li class="sfsi_show_via_onhover disabled_checkbox d-flex sfsi-max-content clear">
                        <label class="sfsi_tooltip_premium d-flex flex-row">
                            <div class="sfsiicnsdvwrp">
                                <span class="radio" style="background-position:0px 0px!important;"></span>
                            </div>
                            <div class="sfsicnwrp-no-margin">
                                <?php
                                    _e( 'Retrieve the number of pinterest followers', 'ultimate-social-media-icons' );
                                    echo sfsi_premium_tooltip_content();
                                ?>
                            </div>
                        </label>
                    </li>
                    <li><input name="sfsi_pinterest_countsFrom" <?php echo ($option4['sfsi_pinterest_countsFrom'] == 'pins') ?  'checked="true"' : ''; ?> type="radio" value="pins" class="styled" /><?php _e("Retrieve the number of Pins",'ultimate-social-media-icons') ?></li>
                    <li><input name="sfsi_pinterest_countsFrom" <?php echo ($option4['sfsi_pinterest_countsFrom'] == 'manual') ?  'checked="true"' : ''; ?> type="radio" value="manual" class="styled" /><label class="high_prb"><?php _e("Enter the figure manually:",'ultimate-social-media-icons') ?></label><input name="sfsi_pinterest_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_pinterest_manualCounts'] != '') ? esc_attr($option4['sfsi_pinterest_manualCounts']) : ''; ?>" style="<?php echo ($option4['sfsi_pinterest_countsFrom'] == 'pins') ?  'display:none;' : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END PINIT ICON COUNT SECTION-->

        <!-- INSTAGRAM ICON COUNT SECTION-->
        <div class="specify_counts instagram_section">
            <div class="radio_section"><input name="sfsi_instagram_countsDisplay" <?php echo ($option4['sfsi_instagram_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" /></div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li><a title="Instagram"><img src="<?php echo SFSI_PLUGURL ?>images/instagram.png" alt="instagram" /><span><?php echo $counts['instagram_count']; ?></span></a></li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li>
                        <input name="sfsi_instagram_countsFrom" <?php echo ($option4['sfsi_instagram_countsFrom'] == 'followers') ?  'checked="true"' : ''; ?> type="radio" value="followers" class="styled" /><?php _e("Retrieve the number of Instagram followers",'ultimate-social-media-icons') ?>
                    </li>
                    <li class="instagram_userLi" style="<?php echo ($option4['sfsi_instagram_countsFrom'] == 'manual') ?  'display:none;' : ''; ?>">
                        <div class="sfsi_instagramFields">
                            <div>
                                <label><?php _e("Enter Instagram User name:",'ultimate-social-media-icons') ?></label>
                                <input name="sfsi_instagram_User" class="input_facebook" type="text" value="<?php echo (isset($option4['sfsi_instagram_User']) && $option4['sfsi_instagram_User'] != '') ? esc_attr($option4['sfsi_instagram_User']) : ''; ?>" />
                            </div>
                            <div style="display:none">
                                <label><?php _e("Enter Instagram Client Id:",'ultimate-social-media-icons') ?></label>
                                <input name="sfsi_instagram_clientid" class="input_facebook" type="text" value="<?php echo (isset($option4['sfsi_instagram_clientid']) && $option4['sfsi_instagram_clientid'] != '') ? esc_attr($option4['sfsi_instagram_clientid']) : ''; ?>" />
                            </div>
                            <div style="display:none">
                                <label><?php _e("Enter Instagram Redirect Url:",'ultimate-social-media-icons') ?></label>
                                <input name="sfsi_instagram_appurl" class="input_facebook" type="text" value="<?php echo (isset($option4['sfsi_instagram_appurl']) && $option4['sfsi_instagram_appurl'] != '') ? esc_attr($option4['sfsi_instagram_appurl']) : ''; ?>" />
                            </div>
                            <div class="sfsi_tokenGenerateButton" style="display:none">
                                <p>
                                <?php
                                    printf(
                                        __( 'For generate your app token you need to enter your "Client Id" and "Redirect Url".%1sGenerate Token%2s','ultimate-social-media-icons' ),
                                        '</p><a href="javascript:">',
                                        '</a>'
                                    );
                                ?>
                            </div>
                            <div style="display:none">
                                <label><?php _e("Enter Instagram Token:",'ultimate-social-media-icons') ?></label>
                                <input name="sfsi_instagram_token" class="input_facebook" type="text" value="<?php echo (isset($option4['sfsi_instagram_token']) && $option4['sfsi_instagram_token'] != '') ? esc_attr($option4['sfsi_instagram_token']) : ''; ?>" />
                            </div>
                        </div>
                        <div class="sfsi_instagramInstruction" style="display:none">
                            <p><?php _e("To complete the process please follow these steps:",'ultimate-social-media-icons') ?></p>
                            <ol>
                                <li><?php _e("Go to ",'ultimate-social-media-icons') ?><a href="https://www.instagram.com/developer" target="_blank">https://www.instagram.com/developer</a></li>
                                <li><?php _e("Login and then click on “Register Your Application” to get to the “Manage Clients” section. On there click on the “Register a new client” button ",'ultimate-social-media-icons') ?></li>
                                <li><?php _e("Fill out the form and make sure that the “Redirect url” is valid and uncheck the “Disable Implicit oAuth” under the security tab.",'ultimate-social-media-icons') ?></li>
                                <li><?php _e("Then click on “Register” button.",'ultimate-social-media-icons') ?></li>
                                <li><?php _e("Copy the “Client id” and “Redirect url” you entered into the plugin. Also enter your Instagram User name. After that click on the “Generate token” button.",'ultimate-social-media-icons') ?></li>
                                <li><?php _e("Authorize your app to access your account info by clicking the “Authorize” button'.",'ultimate-social-media-icons') ?></li>
                                <li><?php _e("Now you will be redirected to the redirect url (which you entered during app creation) and find your access token at the end of this url(For example: http://your-website.com/#access_token=< your access token>)",'ultimate-social-media-icons') ?></li>
                                <li><?php _e("Copy the access token, paste it into the plugin and click on “Save”.",'ultimate-social-media-icons') ?></li>
                            </ol>
                        </div>
                    </li>
                    <li>
                        <input name="sfsi_instagram_countsFrom" <?php echo ($option4['sfsi_instagram_countsFrom'] == 'manual') ?  'checked="true"' : ''; ?> type="radio" value="manual" class="styled" /><label class="high_prb"><?php _e("Enter the figure manually:",'ultimate-social-media-icons') ?></label><input name="sfsi_instagram_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_instagram_manualCounts'] != '') ? esc_attr($option4['sfsi_instagram_manualCounts']) : ''; ?>" style="<?php echo ($option4['sfsi_instagram_countsFrom'] == 'followers') ?  'display:none;' : ''; ?>" />
                    </li>

                </ul>
            </div>
        </div>
        <!-- END INSTAGRAM ICON COUNT SECTION-->

        <!-- telegram ICON COUNT SECTION-->
        <div class="specify_counts telegram_section">
            <div class="radio_section">
                <input name="sfsi_telegram_countsDisplay" <?php echo ($option4['sfsi_telegram_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="telegram">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_telegram.png" height="50px" alt="telegram" />
                            <span><?php echo $counts['telegram_count']; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li><?php _e("We cannot track this. So enter the figure here:",'ultimate-social-media-icons') ?> <input name="sfsi_telegram_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_telegram_manualCounts'] != '') ? esc_attr($option4['sfsi_telegram_manualCounts']) : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END telegram ICON COUNT SECTION-->

        <!-- vk ICON COUNT SECTION-->
        <div class="specify_counts vk_section">
            <div class="radio_section">
                <input name="sfsi_vk_countsDisplay" <?php echo ($option4['sfsi_vk_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="vk">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_vk.png" height="50px" alt="vk" />
                            <span><?php echo $counts['vk_count']; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li><?php _e("We cannot track this. So enter the figure here:",'ultimate-social-media-icons') ?> <input name="sfsi_vk_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_vk_manualCounts'] != '') ? esc_attr($option4['sfsi_vk_manualCounts']) : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END vk ICON COUNT SECTION-->

        <!-- ok ICON COUNT SECTION-->
        <div class="specify_counts ok_section">
            <div class="radio_section">
                <input name="sfsi_ok_countsDisplay" <?php echo ($option4['sfsi_ok_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="ok">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_ok.png" height="50px" alt="ok" />
                            <span><?php echo $counts['ok_count']; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li><?php _e(" We cannot track this. So enter the figure here: ",'ultimate-social-media-icons') ?><input name="sfsi_ok_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_ok_manualCounts'] != '') ? esc_attr($option4['sfsi_ok_manualCounts']) : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END ok ICON COUNT SECTION-->

        <!-- WhatsApp ICON COUNT SECTION-->
        <div class="specify_counts whatsapp_section">
            <div class="radio_section">
                <input name="sfsi_whatsapp_countsDisplay" <?php echo (isset($option4['sfsi_whatsapp_countsDisplay']) && $option4['sfsi_whatsapp_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="whatsapp">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_whatsapp.png" height="50px" alt="whatsapp" />
                            <span><?php echo $counts['whatsapp_count']; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li><?php _e("We cannot track this. So enter the figure here:",'ultimate-social-media-icons') ?> <input name="sfsi_whatsapp_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_whatsapp_manualCounts'] != '') ? esc_attr($option4['sfsi_whatsapp_manualCounts']) : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END WhatsApp ICON COUNT SECTION-->

        <!-- weibo ICON COUNT SECTION-->
        <div class="specify_counts weibo_section">
            <div class="radio_section">
                <input name="sfsi_weibo_countsDisplay" <?php echo ($option4['sfsi_weibo_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="weibo">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_weibo.png" height="50px" alt="weibo" />
                            <span><?php echo $counts['weibo_count']; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li><?php _e("We cannot track this. So enter the figure here:",'ultimate-social-media-icons') ?> <input name="sfsi_weibo_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_weibo_manualCounts'] != '') ? esc_attr($option4['sfsi_weibo_manualCounts']) : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END weibo ICON COUNT SECTION-->

        <!-- wechat ICON COUNT SECTION-->
        <div class="specify_counts wechat_section">
            <div class="radio_section">
                <input name="sfsi_wechat_countsDisplay" <?php echo ($option4['sfsi_wechat_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="wechat">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_wechat.png" height="50px" alt="wechat" />
                            <span><?php echo $counts['wechat_count']; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li><?php _e("We cannot track this. So enter the figure here:",'ultimate-social-media-icons') ?>  <input name="sfsi_wechat_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_wechat_manualCounts'] != '') ? esc_attr($option4['sfsi_wechat_manualCounts']) : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END wechat ICON COUNT SECTION-->

        <!-- Snapchat ICON COUNT SECTION-->
        <div class="specify_counts snapchat_section">
            <div class="radio_section">
                <input name="sfsi_snapchat_countsDisplay" <?php echo ( isset( $option4['sfsi_snapchat_countsDisplay'] ) && $option4['sfsi_snapchat_countsDisplay'] == 'yes' ) ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="snapchat">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_snapchat.png" height="50px" alt="snapchat" />
                            <span><?php echo ( isset( $counts['snapchat_count'] ) ) ? $counts['snapchat_count'] : '20'; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li><?php _e("We cannot track this. So enter the figure here:",'ultimate-social-media-icons') ?> <input name="sfsi_snapchat_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_snapchat_manualCounts'] != '') ? esc_attr($option4['sfsi_snapchat_manualCounts']) : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END ICON COUNT SECTION-->

        <!-- Reddit ICON COUNT SECTION-->
        <div class="specify_counts reddit_section">
            <div class="radio_section">
                <input name="sfsi_reddit_countsDisplay" <?php echo (isset($option4['sfsi_reddit_countsDisplay']) && $option4['sfsi_reddit_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="reddit">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_reddit.png" height="50px" alt="reddit" />
                            <span><?php echo ( isset( $counts['reddit_count'] ) ) ? $counts['reddit_count'] : '20'; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li><?php _e( 'We cannot track this. So enter the figure here:', 'ultimate-social-media-icons' ); ?> <input name="sfsi_reddit_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_reddit_manualCounts'] != '') ? esc_attr($option4['sfsi_reddit_manualCounts']) : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END ICON COUNT SECTION-->

        <!-- FB Messenger ICON COUNT SECTION-->
        <div class="specify_counts fbmessenger_section">
            <div class="radio_section">
                <input name="sfsi_fbmessenger_countsDisplay" <?php echo (isset($option4['sfsi_fbmessenger_countsDisplay']) && $option4['sfsi_fbmessenger_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="fbmessenger">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_fbmessenger.png" height="50px" alt="fbmessenger" />
                            <span><?php echo ( isset( $counts['fbmessenger_count'] ) ) ? $counts['fbmessenger_count'] : '20'; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li><?php _e( 'We cannot track this. So enter the figure here:', 'ultimate-social-media-icons' ); ?> <input name="sfsi_fbmessenger_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_fbmessenger_manualCounts'] != '') ? esc_attr($option4['sfsi_fbmessenger_manualCounts']) : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END ICON COUNT SECTION-->

        <!-- TIKTOK ICON COUNT SECTION-->
        <div class="specify_counts tiktok_section">
            <div class="radio_section">
                <input name="sfsi_tiktok_countsDisplay" <?php echo (isset($option4['sfsi_tiktok_countsDisplay']) && $option4['sfsi_tiktok_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="tiktok">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_tiktok.png" height="50px" alt="tiktok" />
                            <span><?php echo ( isset( $counts['tiktok_count'] ) ) ? $counts['tiktok_count'] : '20'; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li><?php _e( 'We cannot track this. So enter the figure here:', 'ultimate-social-media-icons' ); ?> <input name="sfsi_tiktok_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_tiktok_manualCounts'] != '') ? esc_attr($option4['sfsi_tiktok_manualCounts']) : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END ICON COUNT SECTION-->

        <!-- RIA ICON COUNT SECTION-->
        <div class="specify_counts ria_section">
            <div class="radio_section">
                <input name="sfsi_ria_countsDisplay" <?php echo (isset($option4['sfsi_ria_countsDisplay']) && $option4['sfsi_ria_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="RateItAll">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_ria.png" height="50px" alt="RateitAll" />
                            <span><?php echo ( isset( $counts['ria_count'] ) ) ? $counts['ria_count'] : '20'; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li><?php _e( 'We cannot track this. So enter the figure here:', 'ultimate-social-media-icons' ); ?> <input name="sfsi_ria_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_ria_manualCounts'] != '') ? esc_attr($option4['sfsi_ria_manualCounts']) : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END ICON COUNT SECTION-->

        <!-- INHA ICON COUNT SECTION-->
        <div class="specify_counts inha_section">
            <div class="radio_section">
                <input name="sfsi_inha_countsDisplay" <?php echo (isset($option4['sfsi_inha_countsDisplay']) && $option4['sfsi_inha_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="inha">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_inha.png" height="50px" alt="inha" />
                            <span><?php echo ( isset( $counts['inha_count'] ) ) ? $counts['inha_count'] : '20'; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li><?php _e( 'We cannot track this. So enter the figure here:', 'ultimate-social-media-icons' ); ?> <input name="sfsi_inha_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_inha_manualCounts'] != '') ? esc_attr($option4['sfsi_inha_manualCounts']) : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END ICON COUNT SECTION-->

        <!-- FB Mastodon ICON COUNT SECTION-->
        <div class="specify_counts mastodon_section">
            <div class="radio_section">
                <input name="sfsi_mastodon_countsDisplay" <?php echo (isset($option4['sfsi_mastodon_countsDisplay']) && $option4['sfsi_mastodon_countsDisplay'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="social_icon_like">
                <ul class="like_icon">
                    <li>
                        <a title="mastodon">
                            <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_mastodon.png" height="50px" alt="tiktok" />
                            <span><?php echo ( isset( $counts['mastodon_count'] ) ) ? $counts['mastodon_count'] : '20'; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="listing">
                <ul>
                    <li><?php _e( 'We cannot track this. So enter the figure here:', 'ultimate-social-media-icons' ); ?> <input name="sfsi_mastodon_manualCounts" type="text" class="input" value="<?php echo ($option4['sfsi_mastodon_manualCounts'] != '') ? esc_attr($option4['sfsi_mastodon_manualCounts']) : ''; ?>" /></li>
                </ul>
            </div>
        </div>
        <!-- END ICON COUNT SECTION-->

        <h4 style="clear: both;"><?php _e("For which icons do you want to show the counts?",'ultimate-social-media-icons') ?></h4>
        <!-- wechat ICON COUNT SECTION-->
        <div class="specify_counts" style="border-top: 0px solid #eaebee;padding-top: 0px;">
            <div class="radio_section">
                <input name="sfsi_round_counts" <?php echo ($option4['sfsi_round_counts'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="listing">
                <ul>
                <li><?php _e("Round icons",'ultimate-social-media-icons') ?></li>
                </ul>
            </div>
        </div>
        <div class="specify_counts" style="border-top: 0px solid #eaebee;padding-top: 0px;">
            <div class="radio_section">
                <input name="sfsi_original_counts" <?php echo ($option4['sfsi_original_counts'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="listing">
                <ul>
                <li><?php _e("Original icons",'ultimate-social-media-icons') ?></li>
                </ul>
            </div>
        </div>
        <div class="specify_counts" style="border-top: 0px solid #eaebee;padding-top: 0px;">
            <div class="radio_section">
                <input name="sfsi_responsive_share_count" <?php echo ($option4['sfsi_responsive_share_count'] == 'yes') ?  'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            </div>
            <div class="listing">
                <ul>
                <li><?php _e("Responsive icons",'ultimate-social-media-icons') ?></li>
                </ul>
            </div>
        </div>
        <!-- END wechat ICON COUNT SECTION-->

    </div>
    <!-- END show/hide counts for all icons section -->



    <?php sfsi_ask_for_help(4); ?>
    <!-- SAVE BUTTON SECTION   -->
    <div class="save_button">
        <img src="<?php echo SFSI_PLUGURL ?>images/ajax-loader.gif" alt="error" class="loader-img" />
        <?php $nonce = wp_create_nonce("update_step4"); ?>
        <a href="javascript:;" id="sfsi_save4" title="Save" data-nonce="<?php echo $nonce; ?>"><?php _e("Save",'ultimate-social-media-icons') ?></a>
    </div>
    <!-- END SAVE BUTTON SECTION   -->

    <a class="sfsiColbtn closeSec" href="javascript:;"><?php _e("Collapse area",'ultimate-social-media-icons') ?></a>
    <label class="closeSec"></label>

    <!-- ERROR AND SUCCESS MESSAGE AREA-->
    <p class="red_txt errorMsg" style="display:none"> </p>
    <p class="green_txt sucMsg" style="display:none"> </p>
    <div class="clear"></div>
</div>
<!-- END Section 4 "Do you want to display "counts" next to your icons?"  -->
