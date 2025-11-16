<?php
/* unserialize all saved option for second section options */
$option4 = maybe_unserialize( get_option( 'sfsi_section4_options', false ) );
$option2 = maybe_unserialize( get_option( 'sfsi_section2_options', false ) );

/*
 * Sanitize, escape and validate values
 */
$option2['sfsi_rss_url'] = isset( $option2['sfsi_rss_url'] ) ? esc_url( $option2['sfsi_rss_url'] ) : '';
$option2['sfsi_rss_icons'] = isset( $option2['sfsi_rss_icons'] ) ? sanitize_text_field( $option2['sfsi_rss_icons'] ) : '';
$option2['sfsi_facebookPage_option'] = isset( $option2['sfsi_facebookPage_option'] ) ? sanitize_text_field( $option2['sfsi_facebookPage_option'] ) : '';
$option2['sfsi_facebookPage_url'] = isset( $option2['sfsi_facebookPage_url'] ) ? esc_url( $option2['sfsi_facebookPage_url'] ) : '';
$option2['sfsi_facebookLike_option'] = isset( $option2['sfsi_facebookLike_option'] ) ? sanitize_text_field( $option2['sfsi_facebookLike_option'] ) : '';
$option2['sfsi_facebookShare_option'] = isset( $option2['sfsi_facebookShare_option'] ) ? sanitize_text_field( $option2['sfsi_facebookShare_option'] ) : '';
$option2['sfsi_threadsShare_option'] = isset( $option2['sfsi_threadsShare_option'] ) ? sanitize_text_field( $option2['sfsi_threadsShare_option'] ) : '';
$option2['sfsi_blueskyShare_option'] = isset( $option2['sfsi_blueskyShare_option'] ) ? sanitize_text_field( $option2['sfsi_blueskyShare_option'] ) : '';
$option2['sfsi_twitter_followme'] = isset( $option2['sfsi_twitter_followme'] ) ? sanitize_text_field( $option2['sfsi_twitter_followme'])
    : '';
$option2['sfsi_twitter_followUserName'] = (isset($option2['sfsi_twitter_followUserName']))
    ? sanitize_text_field($option2['sfsi_twitter_followUserName'])
    : '';
$option2['sfsi_twitter_aboutPage']         = (isset($option2['sfsi_twitter_aboutPage']))
    ? sanitize_text_field($option2['sfsi_twitter_aboutPage'])
    : '';
$option2['sfsi_twitter_page']             = (isset($option2['sfsi_twitter_page']))
    ? sanitize_text_field($option2['sfsi_twitter_page'])
    : '';
$option2['sfsi_twitter_pageURL']         = (isset($option2['sfsi_twitter_pageURL']))
    ? esc_url($option2['sfsi_twitter_pageURL'])
    : '';
$option2['sfsi_twitter_aboutPageText']     = (isset($option2['sfsi_twitter_aboutPageText']))
    ? sanitize_text_field($option2['sfsi_twitter_aboutPageText'])
    : '';

$option2['sfsi_youtube_pageUrl']         = (isset($option2['sfsi_youtube_pageUrl']))
    ? esc_url($option2['sfsi_youtube_pageUrl'])
    : '';
$option2['sfsi_youtube_page']             = (isset($option2['sfsi_youtube_page']))
    ? sanitize_text_field($option2['sfsi_youtube_page'])
    : '';
$option2['sfsi_youtube_follow']         = (isset($option2['sfsi_youtube_follow']))
    ? sanitize_text_field($option2['sfsi_youtube_follow'])
    : '';

$option2['sfsi_pinterest_page']         = (isset($option2['sfsi_pinterest_page']))
    ? sanitize_text_field($option2['sfsi_pinterest_page'])
    : '';
$option2['sfsi_pinterest_pageUrl']        = (isset($option2['sfsi_pinterest_pageUrl']))
    ? esc_url($option2['sfsi_pinterest_pageUrl'])
    : '';
$option2['sfsi_pinterest_pingBlog']     = (isset($option2['sfsi_pinterest_pingBlog']))
    ? sanitize_text_field($option2['sfsi_pinterest_pingBlog'])
    : '';
$option2['sfsi_instagram_pageUrl']        = (isset($option2['sfsi_instagram_pageUrl']))
    ? esc_url($option2['sfsi_instagram_pageUrl'])
    : '';

$option2['sfsi_ria_pageUrl']        = (isset($option2['sfsi_ria_pageUrl']))
    ? esc_url($option2['sfsi_ria_pageUrl'])
    : '';

$option2['sfsi_inha_pageUrl']        = (isset($option2['sfsi_inha_pageUrl']))
    ? esc_url($option2['sfsi_inha_pageUrl'])
    : '';

$option2['sfsi_linkedin_page']             = (isset($option2['sfsi_linkedin_page']))
    ? sanitize_text_field($option2['sfsi_linkedin_page'])
    : '';
$option2['sfsi_linkedin_pageURL']         = (isset($option2['sfsi_linkedin_pageURL']))
    ? esc_url($option2['sfsi_linkedin_pageURL'])
    : '';
$option2['sfsi_linkedin_follow']         = (isset($option2['sfsi_linkedin_follow']))
    ? sanitize_text_field($option2['sfsi_linkedin_follow'])
    : '';
$option2['sfsi_linkedin_followCompany']    = (isset($option2['sfsi_linkedin_followCompany']))
    ? intval($option2['sfsi_linkedin_followCompany'])
    : '';
$option2['sfsi_linkedin_SharePage']     = (isset($option2['sfsi_linkedin_SharePage']))
    ? sanitize_text_field($option2['sfsi_linkedin_SharePage'])
    : '';

$option2['sfsi_linkedin_recommendBusines'] = (isset($option2['sfsi_linkedin_recommendBusines']))
    ? sanitize_text_field($option2['sfsi_linkedin_recommendBusines'])
    : '';
$option2['sfsi_linkedin_recommendCompany'] = (isset($option2['sfsi_linkedin_recommendCompany']))
    ? sanitize_text_field($option2['sfsi_linkedin_recommendCompany'])
    : '';
$option2['sfsi_linkedin_recommendProductId'] = (isset($option2['sfsi_linkedin_recommendProductId']))
    ? intval($option2['sfsi_linkedin_recommendProductId'])
    : '';
$option2['sfsi_telegram_message']                 = (isset($option2['sfsi_telegram_message']))
    ? sanitize_text_field($option2['sfsi_telegram_message'])
    : '';
$option2['sfsi_telegram_username']             = (isset($option2['sfsi_telegram_username']))
    ? sanitize_text_field($option2['sfsi_telegram_username'])
    : '';

if (isset($option2['sfsi_youtubeusernameorid']) && "name" == $option2['sfsi_youtubeusernameorid'] && !empty($option2['sfsi_youtubeusernameorid'])) {

    if (isset($option2['sfsi_ytube_user']) && !empty($option2['sfsi_ytube_user'])) {
        $option2['sfsi_ytube_user']   = sfsi_sanitize_field($option2['sfsi_ytube_user']);
    } else {
        $option2['sfsi_ytube_user']   = isset($option4['sfsi_youtube_user']) && !empty($option4['sfsi_youtube_user']) ?  $option4['sfsi_youtube_user'] : "";
    }
}

if (isset($option2['sfsi_youtubeusernameorid']) && "id" == $option2['sfsi_youtubeusernameorid']  && !empty($option2['sfsi_youtubeusernameorid'])) {

    if (isset($option2['sfsi_ytube_chnlid']) && !empty($option2['sfsi_ytube_chnlid'])) {
        $option2['sfsi_ytube_chnlid']   = sfsi_sanitize_field($option2['sfsi_ytube_chnlid']);
    } else {
        $option2['sfsi_ytube_chnlid']   = isset($option4['sfsi_youtube_channelId']) && !empty($option4['sfsi_youtube_channelId']) ?  $option4['sfsi_youtube_channelId'] : "";
    }
}
?>

<!-- Section 2 "What do you want the icons to do?" main div Start -->
<div class="tab2">
    <!-- RSS ICON -->
    <div class="row bdr_top rss_section">
        <h2 class="sfsicls_rs_s"><?php _e( 'RSS', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont">
            <p><?php _e( 'When clicked on, users can subscribe via RSS', 'ultimate-social-media-icons' ) ?></p>
            <div class="rss_url_row">
                <h4><?php _e( 'RSS URL:', 'ultimate-social-media-icons' ); ?></h4>
                <input name="sfsi_rss_url" id="sfsi_rss_url" class="add" type="url" value="<?php echo ($option2['sfsi_rss_url'] != '') ?  $option2['sfsi_rss_url'] : ''; ?>" placeholder="E.g http://www.yoursite.com/feed" />
                <span class="sfrsTxt"><?php _e( 'For most blogs it’s', 'ultimate-social-media-icons' ); ?> <strong>http://blogname.com/feed</strong></span>
            </div>
        </div>
    </div>
    <!-- END RSS ICON -->

    <!-- EMAIL ICON -->
    <?php
    $feedId        = sanitize_text_field(get_option('sfsi_feed_id', false));
    $connectToFeed = "http://api.follow.it/?" . base64_encode("userprofile=wordpress&feed_id=" . $feedId);
    ?>
    <div class="row email_section">
        <h2 class="sfsicls_email"><?php _e( 'Email', 'ultimate-social-media-icons' ); ?></h2>

        <div class="inr_cont">

            <p><?php _e( 'Which action should the email icon perform?', 'ultimate-social-media-icons' ); ?></p>

            <ul class="sfsi_email_functions_container">
                <li>
                    <div class="sfsiicnsdvwrp">
                        <input name="sfsi_email_icons_functions" checked="true" type="radio" value="sf" class="styled" />
                    </div>
                    <p style="padding-left: 15px;">
                        <b><?php _e( 'Automatic updates for subscribers: ', 'ultimate-social-media-icons' ); ?></b>
                        <?php _e( 'If people subscribe they will receive your new posts automatically by email. The service is FREE and you get full access to your subscriber’s emails and interesting statistics: ', 'ultimate-social-media-icons' ); ?>
                        <a class="pop-up" href="javascript:" data-id="sfsi_feedClaimingOverlay"><?php _e( 'Get full access now.', 'ultimate-social-media-icons' ); ?></a>
                        <?php _e( 'It also makes sense if you already offer an email newsletter.', 'ultimate-social-media-icons' ); ?>

                        <a href="https://follow.it/docs/publishers/introduction/what-is-follow-it-and-what-shall-i-use-it-for" target="_new"><?php _e( 'Learn more.', 'ultimate-social-media-icons' ); ?></a>
                    </p>
                </li>
                <li class="sfsi_show_via_onhover disabled_checkbox">
                    <label class="sfsi_tooltip_premium d-flex flex-row">
                        <div class="sfsiicnsdvwrp" style="margin-right: 15px;">
                            <span class="radio" style="background-position:0px 0px!important;"></span>
                        </div>
                        <div class="sfsicnwrp">
                            <b><?php _e( 'Contact me: ', 'ultimate-social-media-icons' ); ?></b>
                            <?php
                                _e( 'If people click on the icon an email will open with your email address already entered. This makes sense to use if you don’t offer a contact option anywhere else.', 'ultimate-social-media-icons' );
                                echo sfsi_premium_tooltip_content();
                            ?>
                        </div>
                    </label>
                </li>
                <li class="sfsi_show_via_onhover disabled_checkbox sfsi-max-content clear">
                    <label class="sfsi_tooltip_premium d-flex flex-row">
                        <div class="sfsiicnsdvwrp" style="margin-right: 15px;">
                            <span class="radio" style="background-position:0px 0px!important;"></span>
                        </div>
                        <div class="sfsicnwrp">
                            <b><?php _e( 'Link it to a certain page ', 'ultimate-social-media-icons' ) ; ?></b>
                            <?php
                                _e( '(e.g. contact us or subscription page)', 'ultimate-social-media-icons' );
                                echo sfsi_premium_tooltip_content();
                            ?>
                        </div>
                    </label>
                </li>
                <li class="sfsi_show_via_onhover disabled_checkbox sfsi-max-content clear">
                    <label class="sfsi_tooltip_premium d-flex flex-row">
                        <div class="sfsiicnsdvwrp" style="margin-right: 15px;">
                            <span class="radio" style="background-position:0px 0px!important;"></span>
                        </div>
                        <div class="sfsicnwrp">
                            <b><?php _e( 'Share by email', 'ultimate-social-media-icons' ); ?></b><?php echo sfsi_premium_tooltip_content(); ?>
                        </div>
                    </label>
                </li>
            </ul>
            <p><?php _e( 'Pick which icon you want to use:', 'ultimate-social-media-icons' ); ?></p>
            <ul class="tab_2_email_sec">
                <li>
                    <div class="sfsiicnsdvwrp">
                        <input name="sfsi_rss_icons" <?php echo ($option2['sfsi_rss_icons'] == 'email') ? 'checked="true"' : ''; ?> type="radio" value="email" class="styled" /><span class="email_icn"></span>
                    </div>
                    <label><?php _e( 'Email icon', 'ultimate-social-media-icons' ); ?></label>
                </li>
                <li>
                    <div class="sfsiicnsdvwrp">
                        <input name="sfsi_rss_icons" <?php echo ($option2['sfsi_rss_icons'] == 'subscribe') ? 'checked="true"' : ''; ?> type="radio" value="subscribe" class="styled" /><span class="subscribe_icn"></span>
                    </div>
                    <label><?php _e( 'Email + Follow text', 'ultimate-social-media-icons' ); ?><span class="sficndesc"> </span></label>
                </li>
                <li>
                    <div class="sfsiicnsdvwrp">
                        <input name="sfsi_rss_icons" <?php echo ($option2['sfsi_rss_icons'] == 'sfsi') ? 'checked="true"' : ''; ?> type="radio" value="sfsi" class="styled" /><span class="sf_arow"></span>
                    </div>
                    <label><?php _e( 'follow.it icon', 'ultimate-social-media-icons' ); ?><span class="sfplsdesc"><?php _e( '(provider of the service)', 'ultimate-social-media-icons' ); ?> </span></label>
                </li>
            </ul>
            <p><?php _e( 'The service offers many (more) advantages:', 'ultimate-social-media-icons' ); ?> </p>
            <div class='sfsi_service_row'>
                <div class='sfsi_service_column'>
                    <ul>
                        <li><span><?php _e( 'More people come back', 'ultimate-social-media-icons' ); ?></span> <?php _e( 'to your site', 'ultimate-social-media-icons' ); ?> </li>
                        <li><?php _e( 'See your', 'ultimate-social-media-icons' ); ?><span> <?php _e( 'subscribers’ emails', 'ultimate-social-media-icons' ); ?> </span> & <span><?php _e( 'interesting statistics', 'ultimate-social-media-icons' ); ?></span></li>
                        <li><?php _e( 'Automatically post on', 'ultimate-social-media-icons' ); ?><span> <?php _e( 'Facebook & X (Twitter)', 'ultimate-social-media-icons' ); ?></span></li>
                    </ul>
                </div>
                <div class='sfsi_service_column'>
                    <ul>
                        <li><span><?php _e( 'Get more traffic', 'ultimate-social-media-icons' ); ?></span> <?php _e( 'by being listed in the follow.it directory', 'ultimate-social-media-icons' ); ?> </li>
                        <li><span><?php _e( 'Get alerts', 'ultimate-social-media-icons' ); ?></span> <?php _e( 'when people subscribe or unsubscribe', 'ultimate-social-media-icons' ); ?> </li>
                        <li><span><?php _e( 'Tailor the sender name & subject line', 'ultimate-social-media-icons' ); ?></span> <?php _e( 'of the emails', 'ultimate-social-media-icons' ); ?> </li>
                    </ul>
                </div>
            </div>

            <form id="calimingOptimizationForm" method="get" action="https://api.follow.it/wpclaimfeeds/getFullAccess" target="_blank">
                <div class="sfsi_inputbtn">
                    <input type="hidden" name="feed_id" value="<?php echo sanitize_text_field( get_option( 'sfsi_feed_id', false ) ); ?>" />
                    <input type="email" name="email" value="<?php echo bloginfo( 'admin_email' ); ?>" />
                </div>
                <div class='sfsi_more_services_link'>
                    <a href="javascript:;" id="sfsi_getMeFullAccess" class="sfsi_getMeFullAccess_class" title="Give me access" data-nonce-fetch-feed-id="<?php echo wp_create_nonce('sfsi_get_feed_id'); ?>">
                        <?php _e( 'Click here to benefit from all advantages >', 'ultimate-social-media-icons' ); ?>
                    </a>
                </div>
            </form>

            <p class='sfsi_email_last_paragraph'>
                <?php _e( 'This will create your FREE account on follow.it, using above email.', 'ultimate-social-media-icons' ); ?> <br>
                <?php
                    printf(
                        __( 'All data will be treated highly confidentially, see the %1s Privacy Policy %2s', 'ultimate-social-media-icons' ),
                        '<a href="https://follow.it/info/privacy" target="new">',
                        '</a>'
                    );
                ?>
            </p>
        </div>
    </div>
    <!-- END EMAIL ICON -->

    <!-- FACEBOOK ICON -->
    <div class="row facebook_section">
        <h2 class="sfsicls_facebook"><span><?php _e( 'Facebook', 'ultimate-social-media-icons' ); ?></span></h2>
        <div class="inr_cont">
            <p><?php
                printf(
                    __( 'The Facebook icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do %1s (see an example) %2s ', 'ultimate-social-media-icons' ),
                    '<a class="rit_link pop-up" href="javascript:;" data-id="fbex-s2">',
                    '</a>'
                );
            ?></p>
            <p><?php _e( 'The Facebook icon should allow users to...', 'ultimate-social-media-icons' ); ?></p>

            <p class="radio_section fb_url" style="display:flow-root">
                <input name="sfsi_facebookPage_option" <?php echo ($option2['sfsi_facebookPage_option'] == 'yes') ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
                <label><?php _e( 'Visit my Facebook page at:', 'ultimate-social-media-icons' ); ?></label>
                <input class="add" name="sfsi_facebookPage_url" type="url" value="<?php echo ($option2['sfsi_facebookPage_url'] != '') ? $option2['sfsi_facebookPage_url'] : ''; ?>" placeholder="E.g https://www.facebook.com/your_page_name" />
            </p>

            <p class="radio_section fb_url extra_sp" style="display:flow-root;margin: 16px 0 23px;"><input name="sfsi_facebookLike_option" <?php echo ($option2['sfsi_facebookLike_option'] == 'yes') ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" /><label><?php _e( 'Like my blog on Facebook (+1)', 'ultimate-social-media-icons' ); ?></label></p>

            <p class="radio_section fb_url extra_sp" style="display:flow-root; margin: 16px 0 23px;"><input name="sfsi_facebookShare_option" <?php echo ($option2['sfsi_facebookShare_option'] == 'yes') ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" /><label><?php _e( 'Share my blog with friends (on Facebook)', 'ultimate-social-media-icons' ); ?></label></p>
            <div class="radio_section extra_sp sfsi-max-content clear" style="display:flow-root; margin: 16px 0 23px; padding-top: 7px;">
                <label class="sfsi_tooltip_premium d-flex flex-row">
                    <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                        <span class="checkbox" style="background-position:0px 0px!important;width:31px"></span>
                    </div>
                    <div class="sfsicnwrp" style="margin-top: 5px;"><?php
                        _e( 'Follow me on Facebook', 'ultimate-social-media-icons' );
                        echo sfsi_premium_tooltip_content( 'tp-checkbox-link' );
                    ?></div>
                </label>
            </div>
        </div>
    </div>
    <!-- END FACEBOOK ICON -->

    <!-- TWITTER ICON -->
    <div class="row twitter_section">
        <h2 class="sfsicls_twt"><?php _e( 'X (Twitter)', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont twt_tab_2">
            <p>
                <?php
                    printf(
                        __( 'The X (Twitter) icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do %1s (see an example) %2s ', 'ultimate-social-media-icons' ),
                        '<a class="rit_link pop-up" href="javascript:;" data-id="twex-s2">',
                        '</a>'
                    );
                ?>
            </p>
            <p><?php _e( 'The X (Twitter) icon should allow users to...', 'ultimate-social-media-icons' ); ?></p>

            <p class="radio_section fb_url" style="display:flow-root"><input name="sfsi_twitter_page" <?php echo ($option2['sfsi_twitter_page'] == 'yes') ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" /><label><?php _e( 'Visit me on X (Twitter):', 'ultimate-social-media-icons' ); ?></label><input name="sfsi_twitter_pageURL" type="url" placeholder="http://" value="<?php echo ($option2['sfsi_twitter_pageURL'] != '') ?  $option2['sfsi_twitter_pageURL'] : ''; ?>" class="add" /></p>

            <div class="radio_section fb_url twt_fld"><input name="sfsi_twitter_followme" <?php echo ($option2['sfsi_twitter_followme'] == 'yes') ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" /><label><?php _e( 'Follow me on X (Twitter):', 'ultimate-social-media-icons' ); ?></label><input name="sfsi_twitter_followUserName" type="text" value="<?php echo ($option2['sfsi_twitter_followUserName'] != '') ? esc_attr($option2['sfsi_twitter_followUserName']) : ''; ?>" placeholder="my_x_twitter_name" class="add" /></div>
            <?php
            $twitter_text = isset($option2['sfsi_twitter_aboutPageText']) && !empty($option2['sfsi_twitter_aboutPageText']) ? $option2['sfsi_twitter_aboutPageText'] : '';
            ?>
            <div class="radio_section fb_url twt_fld_2"><input name="sfsi_twitter_aboutPage" <?php echo ($option2['sfsi_twitter_aboutPage'] == 'yes') ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" /><label>X Post about my page:</label><textarea name="sfsi_twitter_aboutPageText" id="sfsi_twitter_aboutPageText" class="add_txt" placeholder="Hey, check out this cool site I found: www.yourname.com #Topic via@my_x_twitter_name"><?php echo $twitter_text; ?></textarea><?php /*echo ($option2['sfsi_twitter_aboutPageText']!='') ?  stripslashes($option2['sfsi_twitter_aboutPageText']) : '' ;*/ ?></div>

            <div class="radio_section twt_fld_23 sfsi-max-content clear">
                <label class="sfsi_tooltip_premium sfsi_tooltip_premium_small d-flex flex-row">
                    <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                        <span class="checkbox" style="background-position:0px 0px!important;width:31px"></span>
                    </div>
                    <div class="sfsicnwrp" style="margin-top: 5px;">
                        <?php _e( 'X (Twitter) cards', 'ultimate-social-media-icons' ); ?><span class="sfsi_premium_logo_icon"></span>
                        <span class="sfsi_tooltip_text_premium sfsi_tooltip_text_premium_small tp-checkbox-link tp-checkbox-twitter-link" style="width: 500px;"><?php _e( "X Posting becomes really fun in the Premium Plugin – you can insert tags to automatically pull the title of the story & link to the story, attach pictures & snippets to the X Posts ('X (Twitter) cards') and user Url-shorteners, all leading to more X Posts and traffic for your site", 'ultimate-social-media-icons' ); ?> - <a href="https://www.ultimatelysocial.com/usm-premium/" target="_blank" style="color: #fff;"><?php _e( 'learn more', 'ultimate-social-media-icons' ); ?></a></span>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <!-- END TWITTER ICON -->

    <!-- YOUTUBE ICON -->
    <div class="row youtube_section">
        <h2 class="sfsicls_utube"><?php _e( 'Youtube', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont utube_inn">
            <p>
                <?php
                        printf(
                            __( 'The Youtube icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do %1s (see an example) %2s ', 'ultimate-social-media-icons' ),
                            '<a class="rit_link pop-up" href="javascript:;" data-id="ytex-s2">',
                            '</a>'
                        );
                ?>
            </p>

            <p><?php _e( 'The Youtube icon should allow users to... ', 'ultimate-social-media-icons' ); ?></p>

            <p class="radio_section fb_url">
                <input name="sfsi_youtube_page" <?php echo ($option2['sfsi_youtube_page'] == 'yes') ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
                <label><?php _e( 'Visit my Youtube page at:', 'ultimate-social-media-icons' ); ?></label>
                <input name="sfsi_youtube_pageUrl" type="url" placeholder="http://" value="<?php echo ($option2['sfsi_youtube_pageUrl'] != '') ?  $option2['sfsi_youtube_pageUrl'] : ''; ?>" class="add" />
            </p>
            <p class="radio_section fb_url">
            <input name="sfsi_youtube_follow" <?php echo ($option2['sfsi_youtube_follow'] == 'yes') ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
                <label><?php _e( 'Subscribe to me on Youtube', 'ultimate-social-media-icons' ); ?> 
                    <span><?php _e( '(allows people to subscribe to you directly, without leaving your blog)', 'ultimate-social-media-icons' ); ?></span>
                </label>
            </p>

            <!--Adding Code for Channel Id and Channel Name-->
            <div class="cstmutbewpr">
                <div class="cstmutbtxtwpr">
                    <div class="cstmutbchnlidwpr" style="display: block;">
                        <p class="extra_pp"><label><?php _e( 'ChannelId:', 'ultimate-social-media-icons' ); ?></label><input name="sfsi_ytube_chnlid" type="url" value="<?php echo (isset($option2['sfsi_ytube_chnlid']) && $option2['sfsi_ytube_chnlid'] != '') ? esc_attr($option2['sfsi_ytube_chnlid']) : ''; ?>" placeholder="youtube channel id" class="add" style="margin-left: 125px;" /></p>
                        <div class="utbe_instruction">
                            <?php _e( 'To find your Channel ID, login to your YouTube account, click the user icon at the top right corner and select "Settings" , then click "Advanced settings". Your Channel ID will be displayed there.', 'ultimate-social-media-icons' ); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- END YOUTUBE ICON -->

    <!-- PINTEREST ICON -->
    <div class="row pinterest_section">
        <h2 class="sfsicls_pinterest"><?php _e( 'Pinterest', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont">
            <p>
                <?php
                        printf(
                            __( ' The Pinterest icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do %1s (see an example) %2s ', 'ultimate-social-media-icons' ),
                            '<a class="rit_link pop-up" href="javascript:;" data-id="pinex-s2">',
                            '</a>'
                        );
                ?>
            </p>
            <p><?php _e( 'The Pinterest icon should allow users to...', 'ultimate-social-media-icons' ); ?> </p>
            <p class="radio_section fb_url"><input name="sfsi_pinterest_page" <?php echo ($option2['sfsi_pinterest_page'] == 'yes') ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" /><label><?php _e( 'Visit my Pinterest page at:', 'ultimate-social-media-icons' ); ?></label><input name="sfsi_pinterest_pageUrl" type="url" placeholder="http://" value="<?php echo ($option2['sfsi_pinterest_pageUrl'] != '') ?  $option2['sfsi_pinterest_pageUrl'] : ''; ?>" class="add" /></p>
            <p class="radio_section fb_url"><input name="sfsi_pinterest_pingBlog" <?php echo ($option2['sfsi_pinterest_pingBlog'] == 'yes') ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" /><label><?php _e( 'Pin my blog on Pinterest (+1)', 'ultimate-social-media-icons' ); ?></label></p>
        </div>
    </div>
    <!-- END PINTEREST ICON -->

    <!-- INSTAGRAM ICON -->
    <div class="row instagram_section">
        <h2 class="sfsicls_instagram"><?php _e( 'Instagram', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont">
            <p><?php _e( 'When clicked on, users will get directed to your Instagram page.', 'ultimate-social-media-icons' ); ?></p>
            <p class="radio_section fb_url  cus_link instagram_space"><label><?php _e( 'URL:', 'ultimate-social-media-icons' ); ?></label><input name="sfsi_instagram_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_instagram_pageUrl']) && $option2['sfsi_instagram_pageUrl'] != '') ?  esc_attr($option2['sfsi_instagram_pageUrl']) : ''; ?>" placeholder="http://" class="add" /></p>
        </div>
    </div>
    <!-- END INSTAGRAM ICON -->

    <!-- THREADS ICON -->
    <div class="row threads_section">
        <h2 class="sfsicls_threads"><span><?php _e( 'Threads', 'ultimate-social-media-icons' ); ?></span></h2>
        <div class="inr_cont">
            <p><?php _e( 'When clicked on, users can share your content on their Threads.', 'ultimate-social-media-icons' ); ?></p>
            <p class="radio_section fb_url extra_sp" style="display:flow-root; margin: 16px 0 23px;">
                <input name="sfsi_threadsShare_option"
					<?php echo ( $option2['sfsi_threadsShare_option'] == 'yes' ) ? 'checked="true"' : ''; ?>
                       type="checkbox" value="yes" class="styled"/>
                <label><?php _e( 'Share my blog with friends (on Threads)', 'ultimate-social-media-icons' ); ?></label>
            </p>
        </div>
    </div>
    <!-- END THREADS ICON -->


    <!-- RIA ICON -->
    <div class="row ria_section">
        <h2 class="sfsicls_ria"><?php _e( 'RateItAll', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont">
            <p><?php _e('When clicked on it, users will get directed to your page on ', 'ultimate-social-media-icons');
                echo '<a target="_blank" href="https://rateitall.com/">RateItAll.</a>' ?>
            </p>
            <p class="radio_section fb_url  cus_link instagram_space"><label><?php _e( 'URL:', 'ultimate-social-media-icons' ); ?></label><input name="sfsi_ria_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_ria_pageUrl']) && $option2['sfsi_ria_pageUrl'] != '') ?  esc_attr($option2['sfsi_ria_pageUrl']) : ''; ?>" placeholder="http://" class="add" /></p>
        </div>
    </div>
    <!-- END RIA ICON -->

    <!-- INHA ICON -->
    <div class="row inha_section">
        <h2 class="sfsicls_inha"><?php _e( 'IncreasingHappiness', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont">
            <p><?php _e('When clicked on it, users get taken to your profile page on ', 'ultimate-social-media-icons');
                echo '<a target="_blank" href="https://increasinghappiness.org/">IncreasingHappiness.org.</a>' ?>
            </p>
            <p class="radio_section fb_url  cus_link instagram_space"><label><?php _e( 'URL:', 'ultimate-social-media-icons' ); ?></label><input name="sfsi_inha_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_inha_pageUrl']) && $option2['sfsi_inha_pageUrl'] != '') ?  esc_attr($option2['sfsi_inha_pageUrl']) : ''; ?>" placeholder="http://" class="add" /></p>
        </div>
    </div>
    <!-- END INHA ICON -->

    <!-- LINKEDIN ICON -->
    <div class="row linkedin_section">
        <h2 class="sfsicls_linkdin"><?php _e( 'LinkedIn', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont linked_tab_2 link_in">
            <p>
                <?php
                        printf(
                            __( ' The LinkedIn icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do %1s (see an example) %2s ', 'ultimate-social-media-icons' ),
                            '<a class="rit_link pop-up" href="javascript:;" data-id="linkex-s2">',
                            '</a>'
                        );
                ?>
            </p>
            <p>
                <?php
                        printf(
                            __( ' You find your ID in the link of your profile page, e.g. https://www.linkedin.com/profile/view?id=%1s8539887%2s&trk=nav_responsive_tab_profile_pic', 'ultimate-social-media-icons' ),
                            '<b>',
                            '</b>'
                        );
                ?>
            </p>
            <p style="margin-bottom:20px;"><?php _e( 'The LinkedIn icon should allow users to... ', 'ultimate-social-media-icons' ); ?></p>
            <div class="radio_section fb_url link_1" style="margin: 18px 0 23px;"><input name="sfsi_linkedin_page" <?php echo ($option2['sfsi_linkedin_page'] == 'yes') ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" /><label><?php _e( 'Visit my Linkedin page at:', 'ultimate-social-media-icons' ); ?></label><input name="sfsi_linkedin_pageURL" type="text" placeholder="http://" value="<?php echo ($option2['sfsi_linkedin_pageURL'] != '') ?  esc_attr($option2['sfsi_linkedin_pageURL']) : ''; ?>" class="add" /></div>
            <div class="radio_section fb_url link_2" style="margin: 0px 0 23px;"><input name="sfsi_linkedin_follow" <?php echo ($option2['sfsi_linkedin_follow'] == 'yes') ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" /><label><?php _e( 'Follow me on Linkedin:', 'ultimate-social-media-icons' ); ?> </label><input name="sfsi_linkedin_followCompany" type="text" value="<?php echo ($option2['sfsi_linkedin_followCompany'] != '') ? esc_attr($option2['sfsi_linkedin_followCompany']) : ''; ?>" class="add" placeholder="Enter company ID, e.g. 123456" /></div>

            <div class="radio_section fb_url link_3" style="margin: 0px 0 23px;"><input name="sfsi_linkedin_SharePage" <?php echo ($option2['sfsi_linkedin_SharePage'] == 'yes') ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" /><label><?php _e( 'Share my page on LinkedIn', 'ultimate-social-media-icons' ); ?></label></div>

            <div class="radio_section fb_url link_4" style="margin: 10px 0 0px;"><input name="sfsi_linkedin_recommendBusines" <?php echo ($option2['sfsi_linkedin_recommendBusines'] == 'yes') ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" /><label class="anthr_labl"><?php _e( 'Recommend my business or product on Linkedin:', 'ultimate-social-media-icons' ); ?></label><input name="sfsi_linkedin_recommendProductId" type="text" value="<?php echo ($option2['sfsi_linkedin_recommendProductId'] != '') ? esc_attr($option2['sfsi_linkedin_recommendProductId']) : ''; ?>" class="add link_dbl" placeholder="Enter Product ID, e.g. 1441" /> <input name="sfsi_linkedin_recommendCompany" type="text" value="<?php echo ($option2['sfsi_linkedin_recommendCompany'] != '') ?  esc_attr($option2['sfsi_linkedin_recommendCompany']) : ''; ?>" class="add" placeholder="Enter company name, e.g. Google”" /></div>

            <div class="lnkdin_instruction">
                <?php _e( 'To find your Product or Company ID, you can use their ID lookup tool at', 'ultimate-social-media-icons' ); ?> <a target="_blank" href="https://developer.linkedin.com/apply-getting-started#company-lookup">https://developer.linkedin.com/apply-getting-started#company-lookup</a>. <?php _e( 'You need to be logged in to Linkedin to be able to use it.', 'ultimate-social-media-icons' ); ?>
            </div>
        </div>
    </div>

    <!-- TELEGRAM ICON -->
    <div class="row telegram_section">
        <h2 class="sfsicls_telegram"><?php _e( 'Telegram', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont telegram_tab_2">
            <p><?php _e( 'The Telegram icon can perform the following actions:', 'ultimate-social-media-icons' ); ?></p>

            <div class="radio_section fb_url" style="display:flow-root; margin: 16px 0 17px;">
                <input name="sfsi_telegram_msg_option" <?php echo ( !isset( $option2['sfsi_telegram_msg_option'] ) || ( isset( $option2['sfsi_telegram_msg_option'] ) && $option2['sfsi_telegram_msg_option'] ) == 'yes' ) ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
                <label><?php _e( 'Message me on Telegram:', 'ultimate-social-media-icons' ); ?></label>
                <ul style="margin-left: 10px;">
                    <li style="margin-left: 20px;" >
                        <p class="radio_section fb_url no_check ">
                            <label><?php _e( 'Pre-filled message', 'ultimate-social-media-icons' ); ?></label>
                            <input name="sfsi_telegram_message" type="text" value="<?php echo ($option2['sfsi_telegram_message'] != '') ? esc_attr($option2['sfsi_telegram_message']) : ''; ?>" placeholder="message" class="add" />
                        </p>
                    </li>
                    <li style="margin-left: 20px;">
                        <p class="radio_section fb_url no_check">
                            <label><?php _e( 'My Telegram username', 'ultimate-social-media-icons' ); ?></label>
                            <input name="sfsi_telegram_username" type="url" placeholder="username" value="<?php echo ($option2['sfsi_telegram_username'] != '') ? $option2['sfsi_telegram_username'] : ''; ?>" class="add" />
                        </p>
                    </li>
                </ul>
            </div>
            <div class="radio_section extra_sp" style="display:flow-root;">
                <label class="sfsi_tooltip_premium d-flex flex-row sfsi-max-content clear">
                    <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                        <span class="checkbox" style="background-position:0px 0px!important;width:31px"></span>
                    </div>
                    <div class="sfsicnwrp" style="margin-top: 5px;">
                        <?php
                            _e( 'Share my blog on Telegram', 'ultimate-social-media-icons' );
                            echo sfsi_premium_tooltip_content( 'tp-checkbox-link' );
                        ?>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <!-- END TELEGRAM ICON -->

    <!-- WECHAT ICON -->
    <div class="row wechat_section">
        <h2 class="sfsicls_wechat"><?php _e( 'WeChat', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont wechat_tab_2">
            <p><?php _e( 'The WeChat icon can perform the following actions:', 'ultimate-social-media-icons' ); ?></p>

            <p class="radio_section fb_url" style="display:flow-root; margin-bottom: 0;">
                <input name="sfsi_wechat_share" <?php echo ( !isset( $option2['sfsi_wechat_share'] ) || ( isset( $option2['sfsi_wechat_share'] ) && $option2['sfsi_wechat_share'] == 'share' ) ) ? 'checked="true"' : ''; ?> type="checkbox" value="share" class="styled" />
                <label><?php _e( 'Share my page on WeChat', 'ultimate-social-media-icons' ); ?></label>
            </p>
            <div class="radio_section extra_sp sfsi-max-content clear" style="display:flow-root;padding-top: 23px;">
                <label class="sfsi_tooltip_premium d-flex flex-row">
                    <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                        <span class="checkbox" style="background-position:0px 0px!important;width:31px"></span>
                    </div>
                    <div class="sfsicnwrp" style="margin-top: 5px;">
                        <?php
                            _e( 'Follow me on WeChat', 'ultimate-social-media-icons' );
                            echo sfsi_premium_tooltip_content( 'tp-checkbox-link' );
                        ?>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <!-- END WECHAT ICON -->

    <!-- WHATSAPP ICON -->
    <div class="row whatsapp_section">
        <h2 class="sfsicls_whatsapp"><?php _e( 'WhatsApp', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont whatsapp_tab_2">
            <p><?php _e( 'Here you have two options:', 'ultimate-social-media-icons' ); ?></p>
            <ul>
                <li>
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div>
                            <input checked class="styled" type="radio" value="yes" name="sfsi_whatsapp_share"<?php echo ( !isset( $option2['sfsi_whatsapp_share'] ) || ( isset( $option2['sfsi_whatsapp_share'] ) && $option2['sfsi_whatsapp_share'] == 'yes' ) ) ? ' checked="true"' : ''; ?>>
                        </div>
                        <div style="margin: 10px 0 0 15px;">
                            <label style="font-size: larger;"><?php _e( 'Allow users to share the page via Whatsapp', 'ultimate-social-media-icons' ); ?></label>
                        </div>
                    </div>
                </li>
                <li class="sfsi_show_via_onhover disabled_checkbox sfsi-max-content clear" style="margin-top: 23px;">
                    <label class="sfsi_tooltip_premium d-flex flex-row">
                        <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                            <span class="radio" style="background-position:0px 0px!important;"></span>
                        </div>
                        <div class="sfsicnwrp">
                            <?php
                                _e( 'Allow users to send me a Whatsapp message', 'ultimate-social-media-icons' );
                                echo sfsi_premium_tooltip_content();
                            ?>
                        </div>
                    </label>
                </li>
            </ul>

        </div>
    </div>
    <!-- END WHATSAPP ICON -->

    <!-- WEIBO ICON -->
    <div class="row weibo_section">
        <h2 class="sfsicls_weibo"><?php _e( 'Weibo', 'ultimate-social-media-icons'); ?></h2>
        <div class="inr_cont weibo_tab_2">
            <p><?php _e( 'The Weibo icon can perform several actions:', 'ultimate-social-media-icons' ); ?></p>

            <p class="radio_section fb_url" style="display:flow-root; margin-bottom: 0;">
                <input name="sfsi_weibo_page" <?php echo ( !isset( $option2['sfsi_weibo_page'] ) || ( isset( $option2['sfsi_weibo_page'] ) && $option2['sfsi_weibo_page'] == 'yes' ) ) ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
                <label><?php _e( 'Visit my Sina Weibo page at:', 'ultimate-social-media-icons' ); ?></label>
                <input name="sfsi_weibo_pageURL" type="url" placeholder="http://" value="<?php echo ( isset( $option2['sfsi_weibo_pageURL'] ) && $option2['sfsi_weibo_pageURL'] != '' ) ? esc_url( $option2['sfsi_weibo_pageURL'] ) : ''; ?>" class="add" />
            </p>
            <div class="radio_section extra_sp sfsi-max-content clear" style="display:flow-root;padding-top: 23px;margin-top: 6px;">
                <label class="sfsi_tooltip_premium d-flex flex-row">
                    <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                        <span class="checkbox" style="background-position:0px 0px!important;width:31px"></span>
                    </div>
                    <div class="sfsicnwrp" style="margin-top: 5px;">
                        <?php
                            _e( 'Share my blog on Sina Weibo', 'ultimate-social-media-icons' );
                            echo sfsi_premium_tooltip_content( 'tp-checkbox-link' );
                        ?>
                    </div>
                </label>
            </div>
            <div class="radio_section extra_sp sfsi-max-content clear" style="display:flow-root;padding-top: 23px;margin-top: 6px;">
                <label class="sfsi_tooltip_premium d-flex flex-row">
                    <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                        <span class="checkbox" style="background-position:0px 0px!important;width:31px"></span>
                    </div>
                    <div class="sfsicnwrp" style="margin-top: 5px;">
                        <?php
                            _e( 'Like my page with Sina Weibo', 'ultimate-social-media-icons' );
                            echo sfsi_premium_tooltip_content( 'tp-checkbox-link' );
                        ?>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <!-- END WEIBO ICON -->

    <!-- VK ICON -->
    <div class="row vk_section">
        <h2 class="sfsicls_vk"><?php _e( 'VK', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont vk_tab_2">
            <p><?php _e( 'When clicked on, users will get directed to your VK page.', 'ultimate-social-media-icons' ); ?></p>

            <p class="radio_section fb_url" style="display:flow-root">
                <input name="sfsi_vk_page" <?php echo ( !isset( $option2['sfsi_vk_page'] ) || ( isset( $option2['sfsi_vk_page'] ) && $option2['sfsi_vk_page'] == 'yes' ) ) ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
                <label><?php _e( 'Visit my VK page at:', 'ultimate-social-media-icons' ); ?></label>
                <input name="sfsi_vk_pageURL" type="url" placeholder="http://" value="<?php echo ( isset( $option2['sfsi_vk_pageURL'] ) && $option2['sfsi_vk_pageURL'] != '' ) ? esc_url( $option2['sfsi_vk_pageURL'] ) : ''; ?>" class="add" />
            </p>

            <p class="radio_section fb_url" style="display:flow-root">
                <input name="sfsi_vk_share" <?php echo ( isset( $option2['sfsi_vk_share'] ) && $option2['sfsi_vk_share'] == 'yes' ) ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
                <label><?php _e( 'Share my blog with friends (on VK)', 'ultimate-social-media-icons' ); ?></label>
            </p>
        </div>
    </div>
    <!-- END VK ICON -->

    <!-- THREADS ICON -->
    <div class="row bluesky_section">
        <h2 class="sfsicls_bluesky"><span><?php _e( 'Bluesky', 'ultimate-social-media-icons' ); ?></span></h2>
        <div class="inr_cont">
            <p><?php _e( 'When clicked on, users can share your content on their Bluesky.', 'ultimate-social-media-icons' ); ?></p>
            <p class="radio_section fb_url extra_sp" style="display:flow-root; margin: 16px 0 23px;">
                <input name="sfsi_blueskyShare_option"
					<?php echo ( $option2['sfsi_blueskyShare_option'] == 'yes' ) ? 'checked="true"' : ''; ?>
                       type="checkbox" value="yes" class="styled"/>
                <label><?php _e( 'Share my blog with friends (on Bluesky)', 'ultimate-social-media-icons' ); ?></label>
            </p>
        </div>
    </div>
    <!-- END THREADS ICON -->

    <!-- OK ICON -->
    <div class="row ok_section">
        <h2 class="sfsicls_ok"><?php _e( 'OK', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont ok_tab_2">
            <p><?php _e( 'When clicked on, users will get directed to your OK page.', 'ultimate-social-media-icons' ); ?></p>

            <p class="radio_section fb_url" style="display:flow-root">
                <input name="sfsi_ok_page" <?php echo ( !isset( $option2['sfsi_ok_page'] ) || ( isset( $option2['sfsi_ok_page'] ) && $option2['sfsi_ok_page'] == 'yes' ) ) ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
                <label>
                    <?php _e( 'Visit me on OK:', 'ultimate-social-media-icons' ); ?>
                </label>
                <input name="sfsi_ok_pageURL" type="url" placeholder="http://" value="<?php echo ( isset( $option2['sfsi_ok_pageURL'] ) && $option2['sfsi_ok_pageURL'] != '' ) ? esc_url( $option2['sfsi_ok_pageURL'] ) : ''; ?>" class="add" />
            </p>
            <div class="radio_section extra_sp sfsi-max-content clear" style="display:flow-root;padding-top: 23px;margin-top: 6px;">
                <label class="sfsi_tooltip_premium d-flex flex-row">
                    <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                        <span class="checkbox" style="background-position:0px 0px!important;width:31px"></span>
                    </div>
                    <div class="sfsicnwrp" style="margin-top: 5px;">
                        <?php
                            _e( 'Like my site (on OK)', 'ultimate-social-media-icons' );
                            echo sfsi_premium_tooltip_content( 'tp-checkbox-link' );
                        ?>
                    </div>
                </label>
            </div>
            <div class="radio_section extra_sp sfsi-max-content clear" style="display:flow-root;padding-top: 23px;margin-top: 6px;">
                <label class="sfsi_tooltip_premium d-flex flex-row">
                    <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                        <span class="checkbox" style="background-position:0px 0px!important;width:31px"></span>
                    </div>
                    <div class="sfsicnwrp" style="margin-top: 5px;">
                        <?php
                            _e( 'Subscribe to me (on OK)', 'ultimate-social-media-icons' );
                            echo sfsi_premium_tooltip_content( 'tp-checkbox-link' );
                        ?>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <!-- END OK ICON -->

    <!-- SNAPCHAT ICON -->
    <div class="row snapchat_section">
        <h2 class="sfsicls_snapchat"><?php _e( 'Snapchat', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont">
            <p>
                <?php _e( 'When clicked on, users will get directed to your Snapchat page.', 'ultimate-social-media-icons' ); ?>
            </p>
            <p class="radio_section fb_url  cus_link instagram_space sfsi_align">
                <label style="margin-left:0px"  class="sfsi_premium_label_width"><?php _e( 'URL:', 'ultimate-social-media-icons' ); ?></label>
                <input name="sfsi_snapchat_pageURL" type="text"
                    value="<?php echo ( isset( $option2['sfsi_snapchat_pageURL'] ) && $option2['sfsi_snapchat_pageURL'] != '' ) ? esc_url( $option2['sfsi_snapchat_pageURL'] ) : ''; ?>"
                    placeholder="http://" class="add" />
            </p>
        </div>
    </div>
    <!-- SNAPCHAT ICON -->

    <!-- Reddit ICON -->
    <div class="row reddit_section">
        <h2 class="sfsicls_reddit"><?php _e( 'Reddit', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont">
            <p><?php _e( 'Here you have two options:', 'ultimate-social-media-icons' ); ?></p>
            <ul>
                <li>
                    <div class="d-flex flex-row bd-highlight">
                        <div>
                        <input class="styled" type="radio" value="yes" name="sfsi_reddit_pageShare"
                                    <?php echo ( !isset( $option2['sfsi_reddit_pageShare'] ) || ( isset( $option2['sfsi_reddit_pageShare'] ) && $option2['sfsi_reddit_pageShare'] == 'yes' ) ) ? 'checked="true"' : '' ;?>>
                        </div>
                        <div style="margin: 5px 0 0 15px;">
                            <label style="font-size: larger"><?php _e( 'Allow users to share the page via Reddit', 'ultimate-social-media-icons' ); ?></label>
                        </div>
                    </div>
                </li>
                <li class="sfsi_show_via_onhover disabled_checkbox sfsi-max-content clear" style="margin-top: 23px;">
                    <label class="sfsi_tooltip_premium d-flex flex-row">
                        <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                            <span class="radio" style="background-position:0px 0px!important;"></span>
                        </div>
                        <div class="sfsicnwrp">
                            <?php
                                _e( 'Allow users to visit my Reddit Page', 'ultimate-social-media-icons' );
                                echo sfsi_premium_tooltip_content();
                            ?>
                        </div>
                    </label>
                </li>
            </ul>
        </div>
    </div>
    <!-- Reddit ICON -->

    <!-- FB MESSENGER ICON -->
    <div class="row fbmessenger_section">
        <h2 class="sfsicls_fbmessenger"><?php _e( 'Facebook Messenger', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont">

            <p><?php _e( 'The Facebook Messenger icon can perform the following actions:', 'ultimate-social-media-icons' ); ?></p>

            <p class="radio_section fb_url extra_sp" style="display:flow-root; margin-bottom: 0;">
                <input name="sfsi_fbmessenger_share" <?php echo ( !isset( $option2['sfsi_fbmessenger_share'] ) || ( isset( $option2['sfsi_fbmessenger_share'] ) && $option2['sfsi_fbmessenger_share'] == 'yes' ) ) ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
                <label><?php _e( 'Share my site with friends (on FB Messenger)', 'ultimate-social-media-icons' ); ?></label>
            </p>
            <div class="radio_section extra_sp sfsi-max-content clear" style="display:flow-root;padding-top: 23px;margin-top: 6px;">
                <label class="sfsi_tooltip_premium d-flex flex-row">
                    <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                        <span class="checkbox" style="background-position:0px 0px!important;width:31px"></span>
                    </div>
                    <div class="sfsicnwrp" style="margin-top: 5px;">
                        <?php
                            _e( 'Contact us (on FB Messenger)', 'ultimate-social-media-icons' );
                            echo sfsi_premium_tooltip_content( 'tp-checkbox-link' );
                        ?>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <!-- END FB MESSENGER ICON -->

    <!-- TIKTOK ICON -->
    <div class="row tiktok_section">
        <h2 class="sfsicls_tiktok"><?php _e( 'TikTok', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont tiktok_tab_2">
            <p><?php _e( 'When clicked on, users will get directed to your TikTok page.', 'ultimate-social-media-icons' ); ?></p>

            <p class="radio_section fb_url no_check">
                <label style="margin-left: 0;"><?php _e( 'Visit me on Tiktok:', 'ultimate-social-media-icons' ); ?></label>
                <input name="sfsi_tiktok_pageURL" type="url" placeholder="http://" value="<?php echo ( isset( $option2['sfsi_tiktok_pageURL'] ) && $option2['sfsi_tiktok_pageURL'] != '' ) ? esc_url( $option2['sfsi_tiktok_pageURL'] ) : ''; ?>" class="add" />
            </p>
        </div>
    </div>
    <!-- END TKTOK ICON -->

    <!-- MASTODON ICON -->
    <div class="row mastodon_section">
        <h2 class="sfsicls_mastodon"><?php _e( 'Mastodon', 'ultimate-social-media-icons' ); ?></h2>
        <div class="inr_cont mastodon_tab_2">
            <p><?php _e( 'The Mastodon icon can perform two actions. Pick below which actions it should perform', 'ultimate-social-media-icons' ); ?></p>

            <p class="radio_section mastdon_url fb_url" style="display:flow-root;">
                <input name="sfsi_mastodon_page" <?php echo ( !isset( $option2['sfsi_mastodon_page'] ) || ( isset( $option2['sfsi_mastodon_page'] ) && $option2['sfsi_mastodon_page'] == 'yes' ) ) ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
                <label><?php _e( 'Visit my Mastodon profile at:', 'ultimate-social-media-icons' ); ?></label>
                <input class="add" name="sfsi_mastodon_pageURL" type="url" placeholder="http://" value="<?php echo ( isset( $option2['sfsi_mastodon_pageURL'] ) && $option2['sfsi_mastodon_pageURL'] != '' ) ? esc_url( $option2['sfsi_mastodon_pageURL'] ) : ''; ?>" />
            </p>

            <div class="radio_section extra_sp sfsi-max-content clear" style="display:flow-root;padding-top: 23px;margin-top: 6px;">
                <label class="sfsi_tooltip_premium d-flex flex-row">
                    <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                        <span class="checkbox" style="background-position:0px 0px!important;width:31px"></span>
                    </div>
                    <div class="sfsicnwrp" style="margin: auto;">
                        <?php
                            _e( 'Share my blog on Mastodon', 'ultimate-social-media-icons' );
                            echo sfsi_premium_tooltip_content( 'tp-checkbox-link' );
                        ?>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <!-- END MASTODON ICON -->

    <!-- COPY LINK ICON -->
    <div class="row copylink_section">
        <h2 class="sfsicls_copylink"><?php _e('Copy link', 'ultimate-social-media-icons'); ?></h2>
        <div class="inr_cont mastodon_tab_2">
           <p><?php _e('Copies the link of the webpage to clipboard.', 'ultimate-social-media-icons'); ?></p>
        </div>

    </div>
    <!-- COPY LINK ICON -->

    <!-- Custom icon section start here -->
    <div class="custom-links custom_section">
        <?php
        $costom_links    =    unserialize($option2['sfsi_CustomIcon_links']);
        $count        =    1;
        $bannerDisplay =   "display:none;";
        for ($i = $first_key; $i <= $endkey; $i++) :
            ?>

            <?php if (!empty($icons[$i])) :
                    $bannerDisplay =   "display:block;";
                    ?>
                <div class="row  sfsiICON_<?php echo $i; ?> cm_lnk">
                    <h2 class="custom">
                        <span class="customstep2-img">
                            <img src="<?php echo (!empty($icons[$i])) ? esc_url($icons[$i]) : SFSI_PLUGURL . 'images/custom.png'; ?>" id="CImg_<?php echo $new_element; ?>" style="border-radius:48%" alt="error" />
                        </span>
                        <span class="sfsiCtxt"><?php _e( 'Custom', 'ultimate-social-media-icons' ); ?> <?php echo $count; ?></span>
                    </h2>
                    <div class="inr_cont ">
                        <p><?php _e( 'Where do you want this icon to link to?', 'ultimate-social-media-icons' ); ?></p>
                        <p class="radio_section fb_url custom_section cus_link ">
                            <label><?php _e( 'Link :', 'ultimate-social-media-icons' ); ?></label>
                            <input name="sfsi_CustomIcon_links[]" type="text" value="<?php echo (isset($costom_links[$i]) && $costom_links[$i] != '') ? esc_url( $costom_links[$i] ) : ''; ?>" placeholder="http://" class="add" file-id="<?php echo $i; ?>" />
                        </p>
                    </div>
                </div>
        <?php $count++;
            endif;
        endfor; ?>

        <div class="notice_custom_icons_premium sfsi_new_prmium_follw" style="<?php echo $bannerDisplay; ?>">
            <p>
                <?php
                        printf(
                            __( '%1$sNew:%2$s In the Premium Plugin you can also give custom icons the feature that when people click on it, they can call you, or send you an SMS. %3$sGo premium now%4$s or learn more.%5$s', 'ultimate-social-media-icons' ),
                            '<b>',
                            '</b>',
                            '<a style="cursor:pointer" class="pop-up sfisi_font_bold" data-id="sfsi_quickpay-overlay" onclick="sfsi_open_quick_checkout(event)" target="_blank">',
                            '</a><a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=call_or_sms_feature_custom_icons&utm_medium=banner" class="sfsi_font_inherit" target="_blank">',
                            '</a>'
                        );
                ?>
            </p>
        </div>
    </div>
    <!-- END Custom icon section here -->

    <?php sfsi_ask_for_help(2); ?>
    <!-- SAVE BUTTON SECTION   -->
    <div class="save_button tab_2_sav">
        <img src="<?php echo SFSI_PLUGURL; ?>images/ajax-loader.gif" class="loader-img" alt="error" />
        <?php $nonce = wp_create_nonce("update_step2"); ?>
        <a href="javascript:;" id="sfsi_save2" title="Save" data-nonce="<?php echo $nonce; ?>"><?php _e( 'Save', 'ultimate-social-media-icons' ); ?></a>
    </div>
    <!-- END SAVE BUTTON SECTION   -->

    <a class="sfsiColbtn closeSec" href="javascript:;"><?php _e( 'Collapse area', 'ultimate-social-media-icons' ); ?></a>
    <label class="closeSec"></label>

    <!-- ERROR AND SUCCESS MESSAGE AREA-->
    <p class="red_txt errorMsg" style="display:none"> </p>
    <p class="green_txt sucMsg" style="display:none"> </p>

</div><!-- END Section 2 "What do you want the icons to do?" main div -->
