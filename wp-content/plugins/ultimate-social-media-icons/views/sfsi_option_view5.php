<?php
/* unserialize all saved option for  section 5 options */
$icons              = ( $option1['sfsi_custom_files'] ) ? unserialize( $option1['sfsi_custom_files'] ) : array();
$option3            = maybe_unserialize( get_option( 'sfsi_section3_options', false ) );
$option5            = maybe_unserialize( get_option( 'sfsi_section5_options', false ) );
$custom_icons_order = unserialize( $option5['sfsi_CustomIcons_order'] );

$prev_plugin_version  = maybe_unserialize( get_option( 'sfsi_was_installed_before', '0' ) );
$was_installed_before = version_compare( SFSI_PLUGIN_VERSION, $prev_plugin_version ) >= 0;

if ( ! isset( $option5['sfsi_telegramIcon_order'] ) ) {
	$option5['sfsi_telegramIcon_order'] = '11';
}
if ( ! isset( $option5['sfsi_vkIcon_order'] ) ) {
	$option5['sfsi_vkIcon_order'] = '12';
}
if ( ! isset( $option5['sfsi_okIcon_order'] ) ) {
	$option5['sfsi_okIcon_order'] = '13';
}
if ( ! isset( $option5['sfsi_weiboIcon_order'] ) ) {
	$option5['sfsi_weiboIcon_order'] = '14';
}
if ( ! isset( $option5['sfsi_wechatIcon_order'] ) ) {
	$option5['sfsi_wechatIcon_order'] = '15';
}
if ( ! isset( $option5['sfsi_whatsappIcon_order'] ) ) {
	$option5['sfsi_whatsappIcon_order'] = '16';
}
if ( ! isset( $option5['sfsi_snapchatIcon_order'] ) ) {
	$option5['sfsi_snapchatIcon_order'] = '17';
}
if ( ! isset( $option5['sfsi_redditIcon_order'] ) ) {
	$option5['sfsi_redditIcon_order'] = '18';
}
if ( ! isset( $option5['sfsi_fbmessengerIcon_order'] ) ) {
	$option5['sfsi_fbmessengerIcon_order'] = '19';
}
if ( ! isset( $option5['sfsi_riaIcon_order'] ) ) {
	$option5['sfsi_riaIcon_order'] = '25';
}
if ( ! isset( $option5['sfsi_inhaIcon_order'] ) ) {
	$option5['sfsi_inhaIcon_order'] = '26';
}
if ( ! isset( $option5['sfsi_tiktokIcon_order'] ) ) {
	$option5['sfsi_tiktokIcon_order'] = '20';
}
if ( ! isset( $option5['sfsi_copylinkIcon_order'] ) ) {
	$option5['sfsi_copylinkIcon_order'] = '29';
}
if ( ! isset( $option5['sfsi_mastodonIcon_order'] ) ) {
	$option5['sfsi_mastodonIcon_order'] = '21';
}
if ( ! isset( $option5['sfsi_threadsIcon_order'] ) ) {
	$option5['sfsi_threadsIcon_order'] = '30';
}
if ( ! isset( $option5['sfsi_blueskyIcon_order'] ) ) {
	$option5['sfsi_blueskyIcon_order'] = '31';
}

$icons_order = array(
	$option5['sfsi_rssIcon_order']         => 'rss',
	$option5['sfsi_emailIcon_order']       => 'email',
	$option5['sfsi_facebookIcon_order']    => 'facebook',
	$option5['sfsi_twitterIcon_order']     => 'twitter',
	$option5['sfsi_youtubeIcon_order']     => 'youtube',
	$option5['sfsi_pinterestIcon_order']   => 'pinterest',
	$option5['sfsi_linkedinIcon_order']    => 'linkedin',
	$option5['sfsi_instagramIcon_order']   => 'instagram',
	$option5['sfsi_threadsIcon_order']     => 'threads',
	$option5['sfsi_telegramIcon_order']    => 'telegram',
	$option5['sfsi_vkIcon_order']          => 'vk',
	$option5['sfsi_blueskyIcon_order']     => 'bluesky',
	$option5['sfsi_okIcon_order']          => 'ok',
	$option5['sfsi_weiboIcon_order']       => 'weibo',
	$option5['sfsi_wechatIcon_order']      => 'wechat',
	$option5['sfsi_whatsappIcon_order']    => 'whatsapp',
	$option5['sfsi_snapchatIcon_order']    => 'snapchat',
	$option5['sfsi_redditIcon_order']      => 'reddit',
	$option5['sfsi_fbmessengerIcon_order'] => 'fbmessenger',
	$option5['sfsi_riaIcon_order']         => 'ria',
	$option5['sfsi_inhaIcon_order']        => 'inha',
	$option5['sfsi_tiktokIcon_order']      => 'tiktok',
	$option5['sfsi_copylinkIcon_order']    => 'copylink',
	$option5['sfsi_mastodonIcon_order']    => 'mastodon',

);

/*
 * Sanitize, escape and validate values
 */
$option5['sfsi_icons_size']                    = ( isset( $option5['sfsi_icons_size'] ) )
	? intval( $option5['sfsi_icons_size'] )
	: '';
$option5['sfsi_icons_spacing']                 = ( isset( $option5['sfsi_icons_spacing'] ) )
	? intval( $option5['sfsi_icons_spacing'] )
	: '';
$option5['sfsi_icons_Alignment']               = ( isset( $option5['sfsi_icons_Alignment'] ) )
	? sanitize_text_field( $option5['sfsi_icons_Alignment'] )
	: '';
$option5['sfsi_icons_Alignment_via_widget']    = ( isset( $option5['sfsi_icons_Alignment_via_widget'] ) )
	? sanitize_text_field( $option5['sfsi_icons_Alignment_via_widget'] )
	: '';
$option5['sfsi_icons_Alignment_via_shortcode'] = ( isset( $option5['sfsi_icons_Alignment_via_shortcode'] ) )
	? sanitize_text_field( $option5['sfsi_icons_Alignment_via_shortcode'] )
	: '';
$option5['sfsi_icons_perRow']                  = ( isset( $option5['sfsi_icons_perRow'] ) )
	? intval( $option5['sfsi_icons_perRow'] )
	: '';
$option5['sfsi_icons_ClickPageOpen']           = ( isset( $option5['sfsi_icons_ClickPageOpen'] ) )
	? sanitize_text_field( $option5['sfsi_icons_ClickPageOpen'] )
	: '';
$option5['sfsi_icons_AddNoopener']             = ( isset( $option5['sfsi_icons_AddNoopener'] ) )
	? sanitize_text_field( $option5['sfsi_icons_AddNoopener'] )
	: '';
$option5['sfsi_icons_stick']                   = ( isset( $option5['sfsi_icons_stick'] ) )
	? sanitize_text_field( $option5['sfsi_icons_stick'] )
	: '';
$option5['sfsi_rss_MouseOverText']             = ( isset( $option5['sfsi_rss_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_rss_MouseOverText'] )
	: '';
$option5['sfsi_email_MouseOverText']           = ( isset( $option5['sfsi_email_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_email_MouseOverText'] )
	: '';
$option5['sfsi_twitter_MouseOverText']         = ( isset( $option5['sfsi_twitter_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_twitter_MouseOverText'] )
	: '';
$option5['sfsi_facebook_MouseOverText']        = ( isset( $option5['sfsi_facebook_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_facebook_MouseOverText'] )
	: '';
$option5['sfsi_linkedIn_MouseOverText']        = ( isset( $option5['sfsi_linkedIn_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_linkedIn_MouseOverText'] )
	: '';
$option5['sfsi_pinterest_MouseOverText']       = ( isset( $option5['sfsi_pinterest_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_pinterest_MouseOverText'] )
	: '';
$option5['sfsi_youtube_MouseOverText']         = ( isset( $option5['sfsi_youtube_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_youtube_MouseOverText'] )
	: '';
$option5['sfsi_instagram_MouseOverText']       = ( isset( $option5['sfsi_instagram_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_instagram_MouseOverText'] )
	: '';
$option5['sfsi_threads_MouseOverText']         = ( isset( $option5['sfsi_threads_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_threads_MouseOverText'] )
	: '';
$option5['sfsi_bluesky_MouseOverText']         = ( isset( $option5['sfsi_bluesky_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_bluesky_MouseOverText'] )
	: '';
$option5['sfsi_telegram_MouseOverText']        = ( isset( $option5['sfsi_telegram_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_telegram_MouseOverText'] )
	: '';
$option5['sfsi_vk_MouseOverText']              = ( isset( $option5['sfsi_vk_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_vk_MouseOverText'] )
	: '';
$option5['sfsi_ok_MouseOverText']              = ( isset( $option5['sfsi_ok_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_ok_MouseOverText'] )
	: '';
$option5['sfsi_weibo_MouseOverText']           = ( isset( $option5['sfsi_weibo_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_weibo_MouseOverText'] )
	: '';
$option5['sfsi_wechat_MouseOverText']          = ( isset( $option5['sfsi_wechat_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_wechat_MouseOverText'] )
	: '';
$option5['sfsi_whatsapp_MouseOverText']        = ( isset( $option5['sfsi_whatsapp_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_whatsapp_MouseOverText'] )
	: '';

$option5['sfsi_reddit_MouseOverText'] = ( isset( $option5['sfsi_reddit_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_reddit_MouseOverText'] )
	: '';

$option5['sfsi_fbmessenger_MouseOverText'] = ( isset( $option5['sfsi_fbmessenger_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_fbmessenger_MouseOverText'] )
	: '';

$option5['sfsi_ria_MouseOverText'] = ( isset( $option5['sfsi_ria_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_ria_MouseOverText'] )
	: '';

$option5['sfsi_inha_MouseOverText'] = ( isset( $option5['sfsi_inha_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_inha_MouseOverText'] )
	: '';

$option5['sfsi_tiktok_MouseOverText'] = ( isset( $option5['sfsi_tiktok_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_tiktok_MouseOverText'] )
	: '';

$option5['sfsi_copylink_MouseOverText'] = ( isset( $option5['sfsi_copylink_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_copylink_MouseOverText'] )
	: '';

$option5['sfsi_mastodon_MouseOverText'] = ( isset( $option5['sfsi_mastodon_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_mastodon_MouseOverText'] )
	: '';

$option5['sfsi_snapchat_MouseOverText'] = ( isset( $option5['sfsi_snapchat_MouseOverText'] ) )
	? sanitize_text_field( $option5['sfsi_snapchat_MouseOverText'] )
	: '';

$sfsi_icons_suppress_errors          = ( isset( $option5['sfsi_icons_suppress_errors'] ) )
	? sanitize_text_field( $option5['sfsi_icons_suppress_errors'] )
	: 'no';
$sfsi_show_admin_popup               = ( isset( $option5['sfsi_show_admin_popup'] ) )
	? sanitize_text_field( $option5['sfsi_show_admin_popup'] )
	: 'yes';
$sfsi_icons_sharing_and_traffic_tips = ( isset( $option5['sfsi_icons_sharing_and_traffic_tips'] ) )
	? sanitize_text_field( $option5['sfsi_icons_sharing_and_traffic_tips'] )
	: 'yes';

if ( is_array( $custom_icons_order ) ) {
	foreach ( $custom_icons_order as $data ) {
		$icons_order[ $data['order'] ] = $data;
	}
}
ksort( $icons_order );
?>

<!-- Section 5 "Any other wishes for your main icons?" main div Start -->
<div class="tab5">
    <h4><?php _e( 'Order of your icons', 'ultimate-social-media-icons' ); ?></h4>
    <!-- icon drag drop  section start here -->
    <ul class="share_icon_order">
		<?php
		$ctn = 0;
		foreach ( $icons_order as $index => $icn ) :

			switch ( $icn ) :
				case 'rss' :
					?>
                    <li class="rss_section" data-index="<?php echo $index; ?>" id="sfsi_rssIcon_order">
                        <a href="#" title="RSS"><img src="<?php echo SFSI_PLUGURL; ?>images/rss.png" alt="RSS"/></a>
                    </li>
					<?php break; ?><?php
				case 'email' : ?>
                    <li class="email_section " data-index="<?php echo $index; ?>" id="sfsi_emailIcon_order">
                        <a href="#" title="Email"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/<?php echo $email_image; ?>"
                                    alt="Email" class="icon_img"/></a>
                    </li>
					<?php break; ?><?php
				case 'facebook' : ?>
                    <li class="facebook_section " data-index="<?php echo $index; ?>" id="sfsi_facebookIcon_order">
                        <a href="#" title="Facebook"><img src="<?php echo SFSI_PLUGURL; ?>images/facebook.png"
                                                          alt="Facebook"/></a>
                    </li>
					<?php break; ?><?php
				case 'twitter' : ?>
                    <li class="twitter_section " data-index="<?php echo $index; ?>" id="sfsi_twitterIcon_order">
                        <a href="#" title="X/Twitter"><img src="<?php echo SFSI_PLUGURL; ?>images/twitter.png"
                                                           alt="Twitter"/></a>
                    </li>
					<?php break; ?><?php
				case 'youtube' : ?>
                    <li class="youtube_section " data-index="<?php echo $index; ?>" id="sfsi_youtubeIcon_order">
                        <a href="#" title="YouTube"><img src="<?php echo SFSI_PLUGURL; ?>images/youtube.png"
                                                         alt="YouTube"/></a>
                    </li>
					<?php break; ?><?php
				case 'pinterest' : ?>
                    <li class="pinterest_section " data-index="<?php echo $index; ?>" id="sfsi_pinterestIcon_order">
                        <a href="#" title="Pinterest"><img src="<?php echo SFSI_PLUGURL; ?>images/pinterest.png"
                                                           alt="Pinterest"/></a>
                    </li>
					<?php break; ?><?php
				case 'linkedin' : ?>
                    <li class="linkedin_section " data-index="<?php echo $index; ?>" id="sfsi_linkedinIcon_order">
                        <a href="#" title="Linked In"><img src="<?php echo SFSI_PLUGURL; ?>images/linked_in.png"
                                                           alt="Linked In"/></a>
                    </li>
					<?php break; ?><?php
				case 'instagram' : ?>
                    <li class="instagram_section " data-index="<?php echo $index; ?>" id="sfsi_instagramIcon_order">
                        <a href="#" title="Instagram"><img src="<?php echo SFSI_PLUGURL; ?>images/instagram.png"
                                                           alt="Instagram"/></a>
                    </li>
					<?php break; ?><?php
				case 'threads' : ?>
                    <li class="threads_section " data-index="<?php echo $index; ?>" id="sfsi_threadsIcon_order">
                        <a href="#" title="Threads"><img src="<?php echo SFSI_PLUGURL; ?>images/threads.png"
                                                         alt="Threads" height="54px;"/></a>
                    </li>
					<?php break; ?><?php
				case 'telegram' : ?>
                    <li class="telegram_section " data-index="<?php echo $index; ?>" id="sfsi_telegramIcon_order">
                        <a href="#" title="telegram"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/icons_theme/default/default_telegram.png"
                                    height="54px;" alt="telegram"/></a>
                    </li>
					<?php break; ?><?php
				case 'vk' : ?>
                    <li class="vk_section " data-index="<?php echo $index; ?>" id="sfsi_vkIcon_order">
                        <a href="#" title="vk"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/icons_theme/default/default_vk.png"
                                    height="54px;" alt="vk"/></a>
                    </li>
					<?php break; ?><?php
				case 'bluesky' : ?>
                    <li class="bluesky_section " data-index="<?php echo $index; ?>" id="sfsi_blueskyIcon_order">
                        <a href="#" title="Bluesky"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/bluesky.png"
                                    height="54px;" alt="Bluesky"/></a>
                    </li>
					<?php break; ?><?php
				case 'ok' : ?>
                    <li class="ok_section " data-index="<?php echo $index; ?>" id="sfsi_okIcon_order">
                        <a href="#" title="ok"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/icons_theme/default/default_ok.png"
                                    height="54px;" alt="ok"/></a>
                    </li>
					<?php break; ?><?php
				case 'weibo' : ?>
                    <li class="weibo_section " data-index="<?php echo $index; ?>" id="sfsi_weiboIcon_order">
                        <a href="#" title="weibo"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/icons_theme/default/default_weibo.png"
                                    height="54px;" alt="weibo"/></a>
                    </li>
					<?php break; ?><?php
				case 'wechat' : ?>
                    <li class="wechat_section " data-index="<?php echo $index; ?>" id="sfsi_wechatIcon_order">
                        <a href="#" title="wechat"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/icons_theme/default/default_wechat.png"
                                    height="54px;" alt="wechat"/></a>
                    </li>
					<?php break; ?><?php
				case 'whatsapp' : ?>
                    <li class="whatsapp_section " data-index="<?php echo $index; ?>" id="sfsi_whatsappIcon_order">
                        <a href="#" title="whatsapp"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/icons_theme/default/default_whatsapp.png"
                                    height="54px;" alt="whatsapp"/></a>
                    </li>
					<?php break; ?><?php
				case 'snapchat' : ?>
                    <li class="snapchat_section " data-index="<?php echo $index; ?>" id="sfsi_snapchatIcon_order">
                        <a href="#" title="snapchat"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/icons_theme/default/default_snapchat.png"
                                    height="54px;" alt="snapchat"/></a>
                    </li>
					<?php break; ?><?php
				case 'reddit' : ?>
                    <li class="reddit_section " data-index="<?php echo $index; ?>" id="sfsi_redditIcon_order">
                        <a href="#" title="reddit"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/icons_theme/default/default_reddit.png"
                                    height="54px;" alt="reddit"/></a>
                    </li>
					<?php break; ?><?php
				case 'fbmessenger' : ?>
                    <li class="fbmessenger_section " data-index="<?php echo $index; ?>" id="sfsi_fbmessengerIcon_order">
                        <a href="#" title="fbmessenger"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/icons_theme/default/default_fbmessenger.png"
                                    height="54px;" alt="fbmessenger"/></a>
                    </li>
					<?php break; ?><?php
				case 'ria' : ?>
                    <li class="ria_section " data-index="<?php echo $index; ?>" id="sfsi_riaIcon_order">
                        <a href="#" title="RateItAll"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/icons_theme/default/default_ria.png"
                                    height="54px;" alt="RateItAll"/></a>
                    </li>
					<?php break; ?><?php
				case 'inha' : ?>
                    <li class="inha_section " data-index="<?php echo $index; ?>" id="sfsi_inhaIcon_order">
                        <a href="#" title="IncreasingHappiness"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/icons_theme/default/default_inha.png"
                                    height="54px;" alt="IncreasingHappiness"/></a>
                    </li>
					<?php break; ?><?php
				case 'tiktok' : ?>
                    <li class="tiktok_section " data-index="<?php echo $index; ?>" id="sfsi_tiktokIcon_order">
                        <a href="#" title="tiktok"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/icons_theme/default/default_tiktok.png"
                                    height="54px;" alt="tiktok"/></a>
                    </li>
					<?php break; ?><?php
				case 'mastodon' : ?>
                    <li class="mastodon_section " data-index="<?php echo $index; ?>" id="sfsi_mastodonIcon_order">
                        <a href="#" title="mastodon"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/icons_theme/default/default_mastodon.png"
                                    height="54px;" alt="mastodon"/></a>
                    </li>
					<?php break; ?><?php
				case 'copylink' : ?>
                    <li class="copylink_section " data-index="<?php echo $index; ?>" id="sfsi_copylinkIcon_order">
                        <a href="#" title="copylink"><img
                                    src="<?php echo SFSI_PLUGURL; ?>images/icons_theme/default/default_copylink.png"
                                    height="54px;" alt="copylink"/></a>
                    </li>
					<?php break; ?><?php
				default: ?>
					<?php
					var_dump( $icons );
					var_dump( $icn );
					if ( ! empty( $icons[ $icn['ele'] ] ) && filter_var( $icons[ $icn['ele'] ], FILTER_VALIDATE_URL ) ): ?>
                        <li class="custom_iconOrder sfsiICON_<?php echo $icn['ele']; ?>"
                            data-index="<?php echo $index; ?>"
                            element-id="<?php echo $icn['ele']; ?>">
                            <a href="#" title="Custom Icon"><img src="<?php echo $icons[ $icn['ele'] ]; ?>"
                                                                 alt="Linked In"
                                                                 class="sfcm"/></a>
                        </li>
					<?php endif; ?><?php break; ?><?php
			endswitch; ?><?php
		endforeach; ?>

    </ul> <!-- END icon drag drop section start here -->

    <span class="drag_drp">
		<?php _e( '(Drag &amp; Drop)', 'ultimate-social-media-icons' ); ?>
	</span>

    <!-- icon's size and spacing section start here -->
    <div class="row">
        <h4><?php _e( 'Size &amp; spacing of your icons', 'ultimate-social-media-icons' ); ?></h4>
        <div class="icons_size d-flex align-items-center">
            <span><?php _e( "Size:", 'ultimate-social-media-icons' ) ?></span><input name="sfsi_icons_size"
                                                                                     value="<?php echo ( $option5['sfsi_icons_size'] != '' ) ? esc_attr( $option5['sfsi_icons_size'] ) : ''; ?>"
                                                                                     type="text"/>
            <ins><?php _e( "pixels wide ", 'ultimate-social-media-icons' ) ?>
                &amp; <?php _e( " tall", 'ultimate-social-media-icons' ) ?></ins>
            <span class="last"><?php _e( "Spacing between icons:", 'ultimate-social-media-icons' ) ?></span><input
                    name="sfsi_icons_spacing" type="text"
                    value="<?php echo ( $option5['sfsi_icons_spacing'] != '' ) ? esc_attr( $option5['sfsi_icons_spacing'] ) : ''; ?>"/>
            <ins><?php _e( 'Pixels', 'ultimate-social-media-icons' ) ?></ins>
        </div>

        <div class="icons_prem_disc">
            <p class="sfsi_prem_plu_desc"><?php
				printf(
					__( '%1$sNew:%2$s The Premium Plugin also allows you to define the vertical distance between the icons (and set this differently for mobile vs. desktop): %3$sGo premium now%4$s or learn more.%5$s', 'ultimate-social-media-icons' ),
					'<b>',
					'</b>',
					'<a class="pop-up sfisi_font_bold" data-id="sfsi_quickpay-overlay" onclick="sfsi_open_quick_checkout(event)" style="cursor:pointer;border-bottom: 1px solid #12a252;color: #12a252 !important;font-weight:bold" target="_blank">',
					'</a><a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=more_spacings&utm_medium=banner" class="sfsi_font_inherit" style="color: #12a252 !important" target="_blank">',
					'</a>'
				);
				?></p>
        </div>
    </div>

    <div class="row" style="font-size: 17px;">
        <h4><?php _e( 'Alignments', 'ultimate-social-media-icons' ); ?></h4>
        <div class="icons_size" style="width: max-content;display:flow-root">
            <span style="font-size: 17px;"><?php _e( 'Icons per row:', 'ultimate-social-media-icons' ); ?></span>
            <input name="sfsi_icons_perRow" type="text"
                   value="<?php echo ( $option5['sfsi_icons_perRow'] != '' ) ? esc_attr( $option5['sfsi_icons_perRow'] ) : ''; ?>"/>
            <ins class="leave_empty"
                 style="margin-bottom: 34px;font-size: 17px;"><?php _e( 'Leave empty if you don\'t want to', 'ultimate-social-media-icons' ) ?>
                <br/><?php _e( 'define this', 'ultimate-social-media-icons' ) ?> </ins>
        </div>
        <div class="icons_size" style="width: max-content;">
            <div style="width: 232px;float: left;position: relative;">
                <span style="line-height: 26px;margin-bottom: 22px;font-size: 17px;"><?php _e( 'Alignment of icons within a widget:', 'ultimate-social-media-icons' ); ?></span>

            </div>
            <div class="field">
                <select name="sfsi_icons_Alignment_via_widget" id="sfsi_icons_Alignment_via_widget" class="styled">
                    <option value="center" <?php echo ( $option5['sfsi_icons_Alignment_via_widget'] == 'center' ) ? 'selected="selected"' : ''; ?>><?php _e( 'Centered', 'ultimate-social-media-icons' ) ?></option>
                    <option value="right" <?php echo ( $option5['sfsi_icons_Alignment_via_widget'] == 'right' ) ? 'selected="selected"' : ''; ?>><?php _e( 'Right', 'ultimate-social-media-icons' ) ?></option>
                    <option value="left" <?php echo ( $option5['sfsi_icons_Alignment_via_widget'] == 'left' ) ? 'selected="selected"' : ''; ?>><?php _e( 'Left', 'ultimate-social-media-icons' ) ?></option>
                </select>
            </div>
        </div>
        <div class="icons_size" style="width: max-content;">
            <div style="width: 232px;float: left;position: relative;">
                <span style="line-height: 26px;margin-bottom: 22px;font-size: 17px;"><?php _e( 'Alignment of icons if placed via shortcode:', 'ultimate-social-media-icons' ) ?></span>
            </div>
            <div class="field">
                <select name="sfsi_icons_Alignment_via_shortcode" id="sfsi_icons_Alignment_via_shortcode"
                        class="styled">
                    <option value="center" <?php echo ( $option5['sfsi_icons_Alignment_via_shortcode'] == 'center' ) ? 'selected="selected"' : ''; ?>><?php _e( 'Centered', 'ultimate-social-media-icons' ) ?></option>
                    <option value="right" <?php echo ( $option5['sfsi_icons_Alignment_via_shortcode'] == 'right' ) ? 'selected="selected"' : ''; ?>><?php _e( 'Right', 'ultimate-social-media-icons' ) ?></option>
                    <option value="left" <?php echo ( $option5['sfsi_icons_Alignment_via_shortcode'] == 'left' ) ? 'selected="selected"' : ''; ?>><?php _e( 'Left', 'ultimate-social-media-icons' ) ?></option>
                </select>
            </div>
        </div>
        <div class="icons_size" style="width: max-content;">
            <div style="width: 232px;float: left;position: relative;">
                <span style="line-height: 26px;margin-bottom: 10px;font-size: 17px;"><?php _e( 'Alignment of icons In the second row:', 'ultimate-social-media-icons' ) ?></span>
                <ins class="sfsi_icons_other_allign"
                     style="bottom: -22px;left: 0;width: 200px;color: rgb(128,136,145);">
					<?php _e( '(with respect to icons in the first row; only relevant if your icons show in two or more rows)', 'ultimate-social-media-icons' ) ?>
                </ins>
            </div>
            <div class="field">
                <select name="sfsi_icons_Alignment" id="sfsi_icons_Alignment" class="styled">
                    <option value="center" <?php echo ( $option5['sfsi_icons_Alignment'] == 'center' ) ? 'selected="selected"' : ''; ?>><?php _e( 'Centered', 'ultimate-social-media-icons' ) ?></option>
                    <option value="right" <?php echo ( $option5['sfsi_icons_Alignment'] == 'right' ) ? 'selected="selected"' : ''; ?>><?php _e( 'Right', 'ultimate-social-media-icons' ) ?></option>
                    <option value="left" <?php echo ( $option5['sfsi_icons_Alignment'] == 'left' ) ? 'selected="selected"' : ''; ?>><?php _e( 'Left', 'ultimate-social-media-icons' ) ?></option>
                </select>
            </div>
        </div>
    </div>
    <div class="row mobilesettingq6" style="font-size: 17px; border:0">
        <!-- Need diff mobile  section start -->
        <div class="sfsi_tab_3_icns" style="width: max-content;">
            <h4 style="color: #5a6570 !important;font-family: 'helveticaneue-light';"><?php _e( 'Need different selection for mobile ?', 'ultimate-social-media-icons' ); ?></h4>
            <ul class="sfsi_make_icons sfsi_plus_mobile_float">
                <li>
                    <div class="d-flex flex-row bd-highlight">
                        <div>
                            <input checked name="sfsi_mobile_icon_setting" type="radio" value="no" checked="true"
                                   class="styled"/>
                        </div>
                        <div style="margin: 0 0 0 10px;">
                            <label style="font-size: large;"><?php _e( 'No', 'ultimate-social-media-icons' ); ?></label>
                        </div>
                    </div>
                </li>
                <li class="sfsi_show_via_onhover disabled_checkbox">
                    <label class="sfsi_tooltip_premium sfsi_tooltip_premium_small d-flex flex-row align-items-center">
                        <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                            <span class="radio" style="background-position:0px 0px!important;"></span>
                        </div>
                        <div class="sfsicnwrp mt-0">
							<?php
							_e( 'Yes', 'ultimate-social-media-icons' );
							echo sfsi_premium_tooltip_content( 'sfsi_tooltip_text_premium_small' );
							?>
                        </div>
                    </label>
                </li>
            </ul>
        </div>
    </div>
	<?php

	$visit_iconsUrl = SFSI_PLUGURL . "images/visit_icons/";

	function sfsi_selectoption( $name, $follow, $visitme ) {

		$option5 = maybe_unserialize( get_option( 'sfsi_section5_options', false ) );

		$visit_iconsUrl = SFSI_PLUGURL . "images/visit_icons/";
		if ( $name == "sfsi_follow_icons_language" ) {
			$visit_icon = $visit_iconsUrl . "Follow";

			if ( ! isset( $option5[ $name ] ) ) {
				$option5[ $name ] = 'Follow_en_US';
			}
		} elseif ( $name == "sfsi_facebook_icons_language" ) {
			$visit_icon = $visit_iconsUrl . "Visit_us_fb";
			if ( ! isset( $option5[ $name ] ) ) {
				$option5[ $name ] = 'Visit_us_en_US';
			}
		} elseif ( $name == "sfsi_twitter_icons_language" ) {
			$visit_icon = $visit_iconsUrl . "Visit_us_twitter";
			if ( ! isset( $option5[ $name ] ) ) {
				$option5[ $name ] = 'Visit_us_en_US';
			}
		} elseif ( $name == "sfsi_youtube_icons_language" ) {
			$visit_icon = $visit_iconsUrl . "Visit_us_youtube";
			if ( ! isset( $option5[ $name ] ) ) {
				$option5[ $name ] = 'Visit_us_en_US';
			}
		}

		?>
        <input type="hidden" name="sfsi_lanOnchange_nonce" value="<?php echo wp_create_nonce( 'getIconPreview' ); ?>"/>
        <select name="<?php echo $name; ?>" id="<?php echo $name; ?>" data-iconUrl="<?php echo $visit_icon; ?>"
                class="<?php echo $name; ?>-preview lanOnchange">

			<?php
			if ( function_exists( 'icl_object_id' ) && has_filter( 'wpml_current_language' ) ) :
				?>
                <option value="automatic_visit_us" <?php echo ( $option5[ $name ] == 'automatic_visit_us' ) ? 'selected="selected"' : ''; ?>>
					<?php _e( "Automatic (<< Visit us >>)", 'ultimate-social-media-icons' ); ?>
                </option>

                <option value="automatic_visit_me" <?php echo ( $option5[ $name ] == 'automatic_visit_me' ) ? 'selected="selected"' : ''; ?>>
					<?php _e( "Automatic (<< Visit me >>)", 'ultimate-social-media-icons' ); ?>
                </option>
			<?php endif; ?>

            <option value="<?php echo $follow; ?>_ar" <?php echo ( $option5[ $name ] == $follow . '_ar' ) ? 'selected="selected"' : ''; ?>>
                العربية<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_ar" <?php echo ( $option5[ $name ] == $visitme . '_ar' ) ? 'selected="selected"' : ''; ?>>
                العربية<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_bg_BG" <?php echo ( $option5[ $name ] == $follow . '_bg_BG' ) ? 'selected="selected"' : ''; ?>>
                Български<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_bg_BG" <?php echo ( $option5[ $name ] == $visitme . '_bg_BG' ) ? 'selected="selected"' : ''; ?>>
                Български<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_zh_CN" <?php echo ( $option5[ $name ] == $follow . '_zh_CN' ) ? 'selected="selected"' : ''; ?>>
                简体中文<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_zh_CN" <?php echo ( $option5[ $name ] == $visitme . '_zh_CN' ) ? 'selected="selected"' : ''; ?>>
                简体中文<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_cs_CZ" <?php echo ( $option5[ $name ] == $follow . '_cs_CZ' ) ? 'selected="selected"' : ''; ?>>
                Čeština‎<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_cs_CZ" <?php echo ( $option5[ $name ] == $visitme . '_cs_CZ' ) ? 'selected="selected"' : ''; ?>>
                Čeština‎<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_da_DK" <?php echo ( $option5[ $name ] == $follow . '_da_DK' ) ? 'selected="selected"' : ''; ?>>
                Dansk<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_da_DK" <?php echo ( $option5[ $name ] == $visitme . '_da_DK' ) ? 'selected="selected"' : ''; ?>>
                Dansk<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_nl_NL" <?php echo ( $option5[ $name ] == $follow . '_nl_NL' ) ? 'selected="selected"' : ''; ?>>
                Nederlands<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_nl_NL" <?php echo ( $option5[ $name ] == $visitme . '_nl_NL' ) ? 'selected="selected"' : ''; ?>>
                Nederlands<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_fi" <?php echo ( $option5[ $name ] == $follow . '_fi' ) ? 'selected="selected"' : ''; ?>>
                Suomi<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_fi" <?php echo ( $option5[ $name ] == $visitme . '_fi' ) ? 'selected="selected"' : ''; ?>>
                Suomi<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_fr_FR" <?php echo ( $option5[ $name ] == $follow . '_fr_FR' ) ? 'selected="selected"' : ''; ?>>
                Français<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_fr_FR" <?php echo ( $option5[ $name ] == $visitme . '_fr_FR' ) ? 'selected="selected"' : ''; ?>>
                Français<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_de_DE" <?php echo ( $option5[ $name ] == $follow . '_de_DE' ) ? 'selected="selected"' : ''; ?>>
                Deutsch<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_de_DE" <?php echo ( $option5[ $name ] == $visitme . '_de_DE' ) ? 'selected="selected"' : ''; ?>>
                Deutsch<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_en_US" <?php echo ( $option5[ $name ] == $follow . '_en_US' ) ? 'selected="selected"' : ''; ?>>
                English<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_en_US" <?php echo ( $option5[ $name ] == $visitme . '_en_US' ) ? 'selected="selected"' : ''; ?>>
                English<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_el" <?php echo ( $option5[ $name ] == $follow . '_el' ) ? 'selected="selected"' : ''; ?>>
                Ελληνικά<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_el" <?php echo ( $option5[ $name ] == $visitme . '_el' ) ? 'selected="selected"' : ''; ?>>
                Ελληνικά<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_hu_HU" <?php echo ( $option5[ $name ] == $follow . '_hu_HU' ) ? 'selected="selected"' : ''; ?>>
                Magyar<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_hu_HU" <?php echo ( $option5[ $name ] == $visitme . '_hu_HU' ) ? 'selected="selected"' : ''; ?>>
                Magyar<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_id_ID" <?php echo ( $option5[ $name ] == $follow . '_id_ID' ) ? 'selected="selected"' : ''; ?>>
                Bahasa Indonesia<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_id_ID" <?php echo ( $option5[ $name ] == $visitme . '_id_ID' ) ? 'selected="selected"' : ''; ?>>
                Bahasa Indonesia<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_it_IT" <?php echo ( $option5[ $name ] == $follow . '_it_IT' ) ? 'selected="selected"' : ''; ?>>
                Italiano<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_it_IT" <?php echo ( $option5[ $name ] == $visitme . '_it_IT' ) ? 'selected="selected"' : ''; ?>>
                Italiano<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_ja" <?php echo ( $option5[ $name ] == $follow . '_ja' ) ? 'selected="selected"' : ''; ?>>
                日本語<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_ja" <?php echo ( $option5[ $name ] == $visitme . '_ja' ) ? 'selected="selected"' : ''; ?>>
                日本語<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_ko_KR" <?php echo ( $option5[ $name ] == $follow . '_ko_KR' ) ? 'selected="selected"' : ''; ?>>
                한국어<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_ko_KR" <?php echo ( $option5[ $name ] == $visitme . '_ko_KR' ) ? 'selected="selected"' : ''; ?>>
                한국어<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_nb_NO" <?php echo ( $option5[ $name ] == $follow . '_nb_NO' ) ? 'selected="selected"' : ''; ?>>
                Norsk bokmål<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_nb_NO" <?php echo ( $option5[ $name ] == $visitme . '_nb_NO' ) ? 'selected="selected"' : ''; ?>>
                Norsk bokmål<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_fa_IR" <?php echo ( $option5[ $name ] == $follow . '_fa_IR' ) ? 'selected="selected"' : ''; ?>>
                فارسی<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_fa_IR" <?php echo ( $option5[ $name ] == $visitme . '_fa_IR' ) ? 'selected="selected"' : ''; ?>>
                فارسی<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_pl_PL" <?php echo ( $option5[ $name ] == $follow . '_pl_PL' ) ? 'selected="selected"' : ''; ?>>
                Polski<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_pl_PL" <?php echo ( $option5[ $name ] == $visitme . '_pl_PL' ) ? 'selected="selected"' : ''; ?>>
                Polski<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_pt_PT" <?php echo ( $option5[ $name ] == $follow . '_pt_PT' ) ? 'selected="selected"' : ''; ?>>
                Português<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_pt_PT" <?php echo ( $option5[ $name ] == $visitme . '_pt_PT' ) ? 'selected="selected"' : ''; ?>>
                Português<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_ro_RO" <?php echo ( $option5[ $name ] == $follow . '_ro_RO' ) ? 'selected="selected"' : ''; ?>>
                Română<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_ro_RO" <?php echo ( $option5[ $name ] == $visitme . '_ro_RO' ) ? 'selected="selected"' : ''; ?>>
                Română<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_ru_RU" <?php echo ( $option5[ $name ] == $follow . '_ru_RU' ) ? 'selected="selected"' : ''; ?>>
                Русский<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_ru_RU" <?php echo ( $option5[ $name ] == $visitme . '_ru_RU' ) ? 'selected="selected"' : ''; ?>>
                Русский<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_sk_SK" <?php echo ( $option5[ $name ] == $follow . '_sk_SK' ) ? 'selected="selected"' : ''; ?>>
                Slovenčina<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_sk_SK" <?php echo ( $option5[ $name ] == $visitme . '_sk_SK' ) ? 'selected="selected"' : ''; ?>>
                Slovenčina<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_es_ES" <?php echo ( $option5[ $name ] == $follow . '_es_ES' ) ? 'selected="selected"' : ''; ?>>
                Español<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_es_ES" <?php echo ( $option5[ $name ] == $visitme . '_es_ES' ) ? 'selected="selected"' : ''; ?>>
                Español<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_sv_SE" <?php echo ( $option5[ $name ] == $follow . '_sv_SE' ) ? 'selected="selected"' : ''; ?>>
                Svenska<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_sv_SE" <?php echo ( $option5[ $name ] == $visitme . '_sv_SE' ) ? 'selected="selected"' : ''; ?>>
                Svenska<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_th" <?php echo ( $option5[ $name ] == $follow . '_th' ) ? 'selected="selected"' : ''; ?>>
                ไทย<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_th" <?php echo ( $option5[ $name ] == $visitme . '_th' ) ? 'selected="selected"' : ''; ?>>
                ไทย<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_tr_TR" <?php echo ( $option5[ $name ] == $follow . '_tr_TR' ) ? 'selected="selected"' : ''; ?>>
                Türkçe<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_tr_TR" <?php echo ( $option5[ $name ] == $visitme . '_tr_TR' ) ? 'selected="selected"' : ''; ?>>
                Türkçe<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>

            <option value="<?php echo $follow; ?>_vi" <?php echo ( $option5[ $name ] == $follow . '_vi' ) ? 'selected="selected"' : ''; ?>>
                Tiếng Việt<span> - << </span> <span><?php echo $follow ?></span><span> >> </span>
            </option>
            <option value="<?php echo $visitme; ?>_vi" <?php echo ( $option5[ $name ] == $visitme . '_vi' ) ? 'selected="selected"' : ''; ?>>
                Tiếng Việt<span> - << </span> <span><?php echo $visitme ?></span><span> >> </span>
            </option>
        </select>
	<?php } ?>

    <!-- icon's select language optins start here -->
    <div class="row sfsi_icons_language_main">
        <h4><?php _e( 'Language & Button-text', 'ultimate-social-media-icons' ); ?></h4>
        <!-- Follow button start here -->
        <div class="icons_size">
            <div class="follows-btn">
                <span><?php _e( 'Follow-button:', 'ultimate-social-media-icons' ); ?></span>
            </div>
            <div class="field language-field">
				<?php sfsi_selectoption( "sfsi_follow_icons_language", "Follow", "Subscribe" ); ?>
            </div>
            <div class="preview-btn">
                <span><?php _e( 'Preview:', 'ultimate-social-media-icons' ); ?></span>
            </div>
			<?php
			$follow_icons = isset( $option5['sfsi_follow_icons_language'] ) ? $option5['sfsi_follow_icons_language'] : 'Follow_en_US';
			$visit_icon   = SFSI_PLUGURL . "images/visit_icons/Follow/icon_" . $follow_icons . ".png";
			if ( isset( $follow_icons ) && ! empty( $follow_icons ) ) {
				?>
                <div class="social-img-link"><img src="<?php echo $visit_icon; ?>"
                                                  alt="<?php _e( 'Follow', 'ultimate-social-media-icons' ); ?>"/></div>
			<?php } ?>
        </div>

        <!-- Facebook «Visit»-icon start here -->
        <div class="icons_size">
            <div class="follows-btn">
                <span><?php _e( 'Facebook «Visit»-icon:', 'ultimate-social-media-icons' ); ?></span>
            </div>
            <div class="field language-field">
				<?php sfsi_selectoption( "sfsi_facebook_icons_language", "Visit_us", "Visit_me" ); ?>
            </div>
            <div class="preview-btn">
                <span><?php _e( 'Preview:', 'ultimate-social-media-icons' ); ?></span>
            </div>
			<?php
			$facebook_icons_lang = isset( $option5['sfsi_facebook_icons_language'] ) ? $option5['sfsi_facebook_icons_language'] : 'Visit_us_en_US';
			$visit_icon          = $visit_iconsUrl . "Visit_us_fb/icon_" . $facebook_icons_lang . ".png";

			if ( isset( $facebook_icons_lang ) && ! empty( $facebook_icons_lang ) ) {
				?>
                <div class="social-img-link"><img src="<?php echo $visit_icon; ?>"
                                                  alt="<?php _e( 'Facebook', 'ultimate-social-media-icons' ); ?>"/>
                </div>
			<?php } ?>
        </div>

		<?php
		if ( ! isset( $option5['sfsi_youtube_icons_language'] ) ) {
			$option5['sfsi_youtube_icons_language'] = "Visit_us_en_US";
		}

		$visit_icon = $visit_iconsUrl . "Visit_us_youtube";
		?>

        <!-- Youtube «Visit»-icon start here -->
        <div class="icons_size">
            <div class="follows-btn">
                <span><?php _e( 'Youtube «Visit»-icon:', 'ultimate-social-media-icons' ); ?></span>
            </div>
            <div class="field language-field">
                <select name="sfsi_youtube_icons_language" id="sfsi_youtube_icons_language"
                        class="sfsi_youtube_icons_language-preview lanOnchange"
                        data-iconUrl="<?php echo $visit_icon; ?>">

					<?php
					if ( function_exists( 'icl_object_id' ) && has_filter( 'wpml_current_language' ) ) :
						?>
                        <option value="automatic_visit_us" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'automatic_visit_us' ) ? 'selected="selected"' : ''; ?>>
							<?php _e( 'Automatic (<< Visit us >>)', 'ultimate-social-media-icons' ); ?>
                        </option>
                        <option value="automatic_visit_me" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'automatic_visit_me' ) ? 'selected="selected"' : ''; ?>>
							<?php _e( 'Automatic (<< Visit me >>)', 'ultimate-social-media-icons' ); ?>
                        </option>
					<?php endif; ?>
                    <option value="Visit_us_ar" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_us_ar' ) ? 'selected="selected"' : ''; ?>>
                        العربية <span> - << </span> <span>Visit us</span><span> >> </span>
                    </option>
                    <option value="Visit_me_ar" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_me_ar' ) ? 'selected="selected"' : ''; ?>>
                        العربية<span> - << </span> <span>Visit me</span><span> >> </span>
                    </option>

                    <option value="Visit_us_zh_CN" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_us_zh_CN' ) ? 'selected="selected"' : ''; ?>>
                        中文<span> - << </span> <span>Visit us</span><span> >> </span>
                    </option>

                    <option value="Visit_me_zh_CN" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_me_zh_CN' ) ? 'selected="selected"' : ''; ?>>
                        中文<span> - << </span> <span>Visit me</span><span> >> </span>
                    </option>

					<?php /* ?><option value="cs_CZ" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'cs_CZ' ) ? 'selected="selected"' : ''; ?>>
						Čeština‎<span> - << </span><span>Visit me</span><span> >> </span>
					</option><?php */ ?>

                    <option value="Visit_us_fr_FR" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_us_fr_FR' ) ? 'selected="selected"' : ''; ?>>
                        Français<span> - << </span> <span>Visit us</span><span> >> </span>
                    </option>

                    <option value="Visit_me_fr_FR" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_me_fr_FR' ) ? 'selected="selected"' : ''; ?>>
                        Français<span> - << </span> <span>Visit me</span><span> >> </span>
                    </option>

                    <option value="Visit_us_en_US" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_us_en_US' ) ? 'selected="selected"' : ''; ?>>
                        English<span> - << </span> <span>Visit us</span><span> >> </span>
                    </option>

                    <option value="Visit_me_en_US" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_me_en_US' ) ? 'selected="selected"' : ''; ?>>
                        English<span> - << </span> <span>Visit me</span><span> >> </span>
                    </option>

					<?php /* ?><option value="Visit_us_hu_HU" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_us_hu_HU' ) ? 'selected="selected"' : ''; ?>>
						Magyar<span> - << </span><span>Visit us</span><span> >> </span>
					</option>

					<option value="Visit_me_hu_HU" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_me_hu_HU' ) ? 'selected="selected"' : ''; ?>>
						Magyar<span> - << </span><span>Visit me</span><span> >> </span>
					</option><?php */ ?>

                    <option value="Visit_us_hi_IN" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_us_hi_IN' ) ? 'selected="selected"' : ''; ?>>
                        हिंदी<span> - << </span> <span>Visit us</span><span> >> </span>
                    </option>

                    <option value="Visit_me_hi_IN" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_me_hi_IN' ) ? 'selected="selected"' : ''; ?>>
                        हिंदी<span> - << </span> <span>Visit me</span><span> >> </span>
                    </option>

                    <option value="Visit_us_it_IT" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_us_it_IT' ) ? 'selected="selected"' : ''; ?>>
                        Italiano<span> - << </span> <span>Visit us</span><span> >> </span>
                    </option>

                    <option value="Visit_me_it_IT" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_me_it_IT' ) ? 'selected="selected"' : ''; ?>>
                        Italiano<span> - << </span> <span>Visit me</span><span> >> </span>
                    </option>

                    <option value="Visit_me_ja" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_me_ja' ) ? 'selected="selected"' : ''; ?>>
                        日本語<span> - << </span> <span>Visit us</span><span> >> </span>
                    </option>

                    <option value="Visit_us_ja" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'Visit_us_ja' ) ? 'selected="selected"' : ''; ?>>
                        日本語<span> - << </span> <span>Visit me</span><span> >> </span>
                    </option>

					<?php /* ?><option value="fa_IR" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'fa_IR' ) ? 'selected="selected"' : ''; ?>>
						فارسی<span> - << </span><span>Visit me</span><span> >> </span>
					</option><?php */ ?>

                    <option value="visit_us_pl_PL" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_us_pl_PL' ) ? 'selected="selected"' : ''; ?>>
                        Polski<span> - << </span> <span>Visit us</span><span> >> </span>
                    </option>

                    <option value="visit_me_pl_PL" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_me_pl_PL' ) ? 'selected="selected"' : ''; ?>>
                        Polski<span> - << </span> <span>Visit me</span><span> >> </span>
                    </option>

                    <option value="visit_us_pt_PT" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_us_pt_PT' ) ? 'selected="selected"' : ''; ?>>
                        Português<span> - << </span> <span>Visit us</span><span> >> </span>
                    </option>

                    <option value="visit_me_pt_PT" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_me_pt_PT' ) ? 'selected="selected"' : ''; ?>>
                        Português<span> - << </span> <span>Visit me</span><span> >> </span>
                    </option>

                    <option value="visit_us_pt_BR" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_us_pt_BR' ) ? 'selected="selected"' : ''; ?>>
                        Português (Brasil)<span> - << </span> <span>Visit us</span><span> >> </span>
                    </option>

                    <option value="visit_me_pt_BR" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_me_pt_BR' ) ? 'selected="selected"' : ''; ?>>
                        Português (Brasil)<span> - << </span> <span>Visit me</span><span> >> </span>
                    </option>

                    <option value="visit_us_ru_RU" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_us_ru_RU' ) ? 'selected="selected"' : ''; ?>>
                        Русский<span> - << </span> <span>Visit us</span><span> >> </span>
                    </option>

                    <option value="visit_me_ru_RU" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_me_ru_RU' ) ? 'selected="selected"' : ''; ?>>
                        Русский<span> - << </span> <span>Visit me</span><span> >> </span>
                    </option>

                    <option value="visit_us_es_ES" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_us_es_ES' ) ? 'selected="selected"' : ''; ?>>
                        Español<span> - << </span> <span>Visit us</span><span> >> </span>
                    </option>

                    <option value="visit_me_es_ES" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_me_es_ES' ) ? 'selected="selected"' : ''; ?>>
                        Español<span> - << </span> <span>Visit me</span><span> >> </span>
                    </option>

                    <option value="visit_us_tr_TR" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_us_tr_TR' ) ? 'selected="selected"' : ''; ?>>
                        Türkçe<span> - << </span> <span>Visit us</span><span> >> </span>
                    </option>

                    <option value="visit_me_tr_TR" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_me_tr_TR' ) ? 'selected="selected"' : ''; ?>>
                        Türkçe<span> - << </span> <span>Visit me</span><span> >> </span>
                    </option>

                    <option value="visit_us_vi" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_us_vi' ) ? 'selected="selected"' : ''; ?>>
                        Tiếng Việt<span> - << </span> <span>Visit us</span><span> >> </span>
                    </option>
                    <option value="visit_me_vi" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_me_vi' ) ? 'selected="selected"' : ''; ?>>
                        Tiếng Việt<span> - << </span> <span>Visit me</span><span> >> </span>
                    </option>

                    <option value="visit_us_se" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_us_se' ) ? 'selected="selected"' : ''; ?>>
                        Swedish<span> - << </span> <span>Visit us</span><span> >> </span>
                    </option>
                    <option value="visit_me_se" <?php echo ( $option5['sfsi_youtube_icons_language'] == 'visit_me_se' ) ? 'selected="selected"' : ''; ?>>
                        Swedish<span> - << </span> <span>Visit me</span><span> >> </span>
                    </option>
                </select>
            </div>
            <div class="preview-btn">
                <span><?php _e( 'Preview:', 'ultimate-social-media-icons' ); ?></span>
            </div>
			<?php
			$youtube_icons_lang = isset( $option5['sfsi_youtube_icons_language'] ) ? $option5['sfsi_youtube_icons_language'] : 'Visit_us_en_US';
			$visit_icon         = $visit_iconsUrl . "Visit_us_youtube/icon_" . $youtube_icons_lang . ".svg";

			if ( isset( $youtube_icons_lang ) && ! empty( $youtube_icons_lang ) ) {
				?>
                <div class="social-img-link"><img src="<?php echo $visit_icon; ?>"
                                                  alt="<?php _e( 'Youtube', 'ultimate-social-media-icons' ); ?>"/></div>
			<?php } ?>
        </div>

        <!-- Twitter «Visit»-icon start here -->
        <div class="icons_size">
            <div class="follows-btn">
                <span><?php _e( 'X (Twitter) «Visit»-icon:', 'ultimate-social-media-icons' ); ?></span>
            </div>
            <div class="field language-field">
				<?php sfsi_selectoption( "sfsi_twitter_icons_language", "Visit_us", "Visit_me" ); ?>
            </div>
            <div class="preview-btn">
                <span><?php _e( 'Preview:', 'ultimate-social-media-icons' ); ?></span>
            </div>
			<?php
			$twitter_icons_lang = isset( $option5['sfsi_twitter_icons_language'] ) ? $option5['sfsi_twitter_icons_language'] : 'Visit_us_en_US';
			$visit_icon         = $visit_iconsUrl . "Visit_us_twitter/icon_" . $twitter_icons_lang . ".png";
			if ( isset( $twitter_icons_lang ) && ! empty( $twitter_icons_lang ) ) {
				?>
                <div class="social-img-link"><img src="<?php echo $visit_icon; ?>"
                                                  alt="<?php _e( 'Twitter', 'ultimate-social-media-icons' ); ?>"/></div>
			<?php } ?>
        </div>

        <!-- Linkedin «Visit»-icon start here -->
		<?php
		if ( ! isset( $option5['sfsi_linkedin_icons_language'] ) ) {
			$option5['sfsi_linkedin_icons_language'] = "en_US";
		}
		$linkedin_icons_lang = isset( $option5['sfsi_linkedin_icons_language'] ) ? $option5['sfsi_linkedin_icons_language'] : 'en_US';
		$visit_icon          = $visit_iconsUrl . "Visit_us_linkedin";
		?>
        <div class="icons_size">
            <div class="follows-btn">
                <span><?php _e( 'Linkedin «Visit»-icon:', 'ultimate-social-media-icons' ); ?></span>
            </div>
            <div class="field language-field">
                <select name="sfsi_linkedin_icons_language" id="sfsi_linkedin_icons_language"
                        class="sfsi_linkedin_icons_language-preview lanOnchange"
                        data-iconUrl="<?php echo $visit_icon; ?>">
					<?php
					if ( function_exists( 'icl_object_id' ) && has_filter( 'wpml_current_language' ) ) :
						?>
                        <option value="automatic_visit_us" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'automatic_visit_us' ) ? 'selected="selected"' : ''; ?>>
							<?php _e( 'Automatic (<< Visit us >>)', 'ultimate-social-media-icons' ); ?>
                        </option>

                        <option value="automatic_visit_me" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'automatic_visit_me' ) ? 'selected="selected"' : ''; ?>>
							<?php _e( 'Automatic (<< Visit me >>)', 'ultimate-social-media-icons' ); ?>
                        </option>

					<?php endif; ?>
                    <option value="ar" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'ar' ) ? 'selected="selected"' : ''; ?>>
                        العربية<span> - << </span>
                        <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="Visit_us_ar" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'Visit_us_ar' ) ? 'selected="selected"' : ''; ?>>
                        العربية<span> - << </span>
                        <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="zh_CN" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'zh_CN' ) ? 'selected="selected"' : ''; ?>>
                        中文<span> - << </span>
                        <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="Visit_us_zh_CN" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'Visit_us_zh_CN' ) ? 'selected="selected"' : ''; ?>>
                        中文<span> - << </span>
                        <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <!-- <option value="cs_CZ" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'cs_CZ' ) ? 'selected="selected"' : ''; ?>>
						Čeština‎<span> - << </span><span>Visit me</span><span> >> </span>
					</option> -->

                    <option value="fr_FR" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'fr_FR' ) ? 'selected="selected"' : ''; ?>>
                        Français<span> - << </span>
                        <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="Visit_us_fr_FR" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'Visit_us_fr_FR' ) ? 'selected="selected"' : ''; ?>>
                        Français<span> - << </span>
                        <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="en_US" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'en_US' ) ? 'selected="selected"' : ''; ?>>
                        English<span> - << </span>
                        <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="Visit_us_en_US" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'Visit_us_en_US' ) ? 'selected="selected"' : ''; ?>>
                        English<span> - << </span>
                        <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="hu_HU" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'hu_HU' ) ? 'selected="selected"' : ''; ?>>
                        Magyar<span> - << </span> <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="Visit_us_hu_HU" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'Visit_us_hu_HU' ) ? 'selected="selected"' : ''; ?>>
                        Magyar<span> - << </span> <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="hi_IN" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'hi_IN' ) ? 'selected="selected"' : ''; ?>>
                        हिंदी<span> - << </span>
                        <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="Visit_us_hi_IN" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'Visit_us_hi_IN' ) ? 'selected="selected"' : ''; ?>>
                        हिंदी<span> - << </span>
                        <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="it_IT" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'it_IT' ) ? 'selected="selected"' : ''; ?>>
                        Italiano<span> - << </span>
                        <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="Visit_us_it_IT" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'Visit_us_it_IT' ) ? 'selected="selected"' : ''; ?>>
                        Italiano<span> - << </span>
                        <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="ja" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'ja' ) ? 'selected="selected"' : ''; ?>>
                        日本語<span> - << </span> <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="Visit_us_ja" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'Visit_us_ja' ) ? 'selected="selected"' : ''; ?>>
                        日本語<span> - << </span> <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <!-- <option value="fa_IR" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'fa_IR' ) ? 'selected="selected"' : ''; ?>>
						فارسی<span> - << </span><span>Visit me</span><span> >> </span>
					</option> -->

                    <option value="pl_PL" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'pl_PL' ) ? 'selected="selected"' : ''; ?>>
                        Polski<span> - << </span> <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="Visit_us_pl_PL" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'Visit_us_pl_PL' ) ? 'selected="selected"' : ''; ?>>
                        Polski<span> - << </span> <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="pt_PT" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'pt_PT' ) ? 'selected="selected"' : ''; ?>>
                        Português<span> - << </span>
                        <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="Visit_us_pt_PT" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'Visit_us_pt_PT' ) ? 'selected="selected"' : ''; ?>>
                        Português<span> - << </span>
                        <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="pt_BR" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'pt_BR' ) ? 'selected="selected"' : ''; ?>>
                        Português (Brasil)<span> - << </span>
                        <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="Visit_pt_BR" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'Visit_pt_BR' ) ? 'selected="selected"' : ''; ?>>
                        Português (Brasil)<span> - << </span>
                        <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="ru_RU" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'ru_RU' ) ? 'selected="selected"' : ''; ?>>
                        Русский<span> - << </span>
                        <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="Visit_us_ru_RU" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'Visit_us_ru_RU' ) ? 'selected="selected"' : ''; ?>>
                        Русский<span> - << </span>
                        <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="es_ES" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'es_ES' ) ? 'selected="selected"' : ''; ?>>
                        Español<span> - << </span>
                        <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="Visit_us_es_ES" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'Visit_us_es_ES' ) ? 'selected="selected"' : ''; ?>>
                        Español<span> - << </span>
                        <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="tr_TR" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'tr_TR' ) ? 'selected="selected"' : ''; ?>>
                        Türkçe<span> - << </span> <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="Visit_us_tr_TR" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'Visit_us_tr_TR' ) ? 'selected="selected"' : ''; ?>>
                        Türkçe<span> - << </span> <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="vi" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'vi' ) ? 'selected="selected"' : ''; ?>>
                        Tiếng Việt<span> - << </span>
                        <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="Visit_us_vi" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'Visit_us_vi' ) ? 'selected="selected"' : ''; ?>>
                        Tiếng Việt<span> - << </span>
                        <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="me_se_SE" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'me_se_SE' ) ? 'selected="selected"' : ''; ?>>
                        Swedish<span> - << </span>
                        <span><?php _e( 'Visit me', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>

                    <option value="us_se_SE" <?php echo ( $option5['sfsi_linkedin_icons_language'] == 'us_se_SE' ) ? 'selected="selected"' : ''; ?>>
                        Swedish<span> - << </span>
                        <span><?php _e( 'Visit us', 'ultimate-social-media-icons' ); ?></span><span> >> </span>
                    </option>
                </select>

            </div>
            <div class="preview-btn">
                <span><?php _e( 'Preview:', 'ultimate-social-media-icons' ); ?></span>
            </div>
			<?php
			$linkedin_icons_lang = isset( $option5['sfsi_linkedin_icons_language'] ) ? $option5['sfsi_linkedin_icons_language'] : 'en_US';
			$visit_icon          = $visit_iconsUrl . "Visit_us_linkedin/icon_" . $linkedin_icons_lang . ".svg";
			if ( isset( $linkedin_icons_lang ) && ! empty( $linkedin_icons_lang ) ) {
				?>
                <div class="social-img-link"><img src="<?php echo $visit_icon; ?>"
                                                  alt="<?php _e( 'Linkedin', 'ultimate-social-media-icons' ); ?>"/>
                </div>
			<?php } ?>
        </div>

        <!-- Like & Share buttons (Facebook, Twitter, Youtube) start here -->
        <div class="icons_size">
			<span>
				<?php _e( 'Language for Like, Share and Subscribe buttons (Facebook, X (Twitter), Youtube):', 'ultimate-social-media-icons' ); ?>
			</span>
            <div class="language_field">
                <select name="sfsi_icons_language" id="sfsi_icons_language" class="language">
					<?php
					if ( ! isset( $option5['sfsi_icons_language'] ) ) {
						$option5['sfsi_icons_language'] = "en_US";
					}

					if ( function_exists( 'icl_object_id' ) && has_filter( 'wpml_current_language' ) ) :
						?>
                        <option value="automatic" <?php echo ( $option5['sfsi_icons_language'] == 'automatic' ) ? 'selected="selected"' : ''; ?>>
							<?php _e( 'Automatic (Using WPML)', 'ultimate-social-media-icons' ); ?>
                        </option>
					<?php endif; ?>
                    <option value="ar" <?php echo ( $option5['sfsi_icons_language'] == 'ar' || $option5['sfsi_icons_language'] == 'ar_AR' ) ? 'selected="selected"' : ''; ?>>
                        العربية
                    </option>
					<?php /* ?><option value="az_AZ" <?php echo ( $option5['sfsi_icons_language'] == 'az_AZ' ) ? 'selected="selected"' : ''; ?>>
						Azərbaycan dili
					</option>
					<option value="af_ZA" <?php echo ( $option5['sfsi_icons_language'] == 'af_ZA' ) ? 'selected="selected"' : ''; ?>>
						Afrikaans
					</option><?php */ ?>
                    <option value="bg_BG" <?php echo ( $option5['sfsi_icons_language'] == 'bg_BG' ) ? 'selected="selected"' : ''; ?>>
                        Български
                    </option>
					<?php /* ?><option value="ms_MY" <?php echo ( $option5['sfsi_icons_language'] == 'ms_MY' ) ? 'selected="selected"' : ''; ?>>
						Bahasa Melayu‎
					</option>
					<option value="bn_IN" <?php echo ( $option5['sfsi_icons_language'] == 'bn_IN' ) ? 'selected="selected"' : ''; ?>>
						বাংলা
					</option>
					<option value="bs_BA" <?php echo ( $option5['sfsi_icons_language'] == 'bs_BA' ) ? 'selected="selected"' : ''; ?>>
						Bosanski
					</option>
					<option value="ca_ES" <?php echo ( $option5['sfsi_icons_language'] == 'ca_ES' ) ? 'selected="selected"' : ''; ?>>
						Català
					</option>
					<option value="cy_GB" <?php echo ( $option5['sfsi_icons_language'] == 'cy_GB' ) ? 'selected="selected"' : ''; ?>>
						Cymraeg
					</option><?php */ ?>
                    <option value="da_DK" <?php echo ( $option5['sfsi_icons_language'] == 'da_DK' ) ? 'selected="selected"' : ''; ?>>
                        Dansk
                    </option>
                    -->
                    <option value="de_DE" <?php echo ( $option5['sfsi_icons_language'] == 'de_DE' ) ? 'selected="selected"' : ''; ?>>
                        Deutsch
                    </option>
                    <option value="en_US" <?php echo ( $option5['sfsi_icons_language'] == 'en_US' ) ? 'selected="selected"' : ''; ?>>
                        English (United States)
                    </option>
                    <option value="el" <?php echo ( $option5['sfsi_icons_language'] == 'el_GR' || $option5['sfsi_icons_language'] == 'el' ) ? 'selected="selected"' : ''; ?>>
                        Ελληνικά
                    </option>
					<?php /* ?><option value="eo_EO" <?php echo ( $option5['sfsi_icons_language'] == 'eo_EO' ) ? 'selected="selected"' : ''; ?>>
						Esperanto
					</option><?php */ ?>
                    <option value="es_ES" <?php echo ( $option5['sfsi_icons_language'] == 'es_ES' ) ? 'selected="selected"' : ''; ?>>
                        Español
                    </option>
					<?php /* ?><option value="et_EE" <?php echo ( $option5['sfsi_icons_language'] == 'et_EE' ) ? 'selected="selected"' : ''; ?>>
						Eesti
					</option>
					<option value="eu_ES" <?php echo ( $option5['sfsi_icons_language'] == 'eu_ES' ) ? 'selected="selected"' : ''; ?>>
						Euskara
					</option><?php */ ?>
                    <option value="fa_IR" <?php echo ( $option5['sfsi_icons_language'] == 'fa_IR' ) ? 'selected="selected"' : ''; ?>>
                        فارسی
                    </option>
                    <option value="fi_FI" <?php echo ( $option5['sfsi_icons_language'] == 'fi_FI' || $option5['sfsi_icons_language'] == 'fi' ) ? 'selected="selected"' : ''; ?>>
                        Suomi
                    </option>
                    -->
                    <option value="fr_FR" <?php echo ( $option5['sfsi_icons_language'] == 'fr_FR' ) ? 'selected="selected"' : ''; ?>>
                        Français
                    </option>
                    <!-- <option value="gl_ES" <?php echo ( $option5['sfsi_icons_language'] == 'gl_ES' ) ? 'selected="selected"' : ''; ?>>
						Galego
					</option> -->
                    <option value="he_IL" <?php echo ( $option5['sfsi_icons_language'] == 'he_IL' ) ? 'selected="selected"' : ''; ?>>
                        עִבְרִית
                    </option>
                    <option value="hi_IN" <?php echo ( $option5['sfsi_icons_language'] == 'hi_IN' ) ? 'selected="selected"' : ''; ?>>
                        हिन्दी
                    </option>
                    <!-- <option value="hr_HR" <?php echo ( $option5['sfsi_icons_language'] == 'hr_HR' ) ? 'selected="selected"' : ''; ?>>
						Hrvatski
					</option>
					-->
                    <option value="hu_HU" <?php echo ( $option5['sfsi_icons_language'] == 'hu_HU' ) ? 'selected="selected"' : ''; ?>>
                        Magyar
                    </option>
					<?php /* ?><option value="hy_AM" <?php echo ( $option5['sfsi_icons_language'] == 'hy_AM' ) ? 'selected="selected"' : ''; ?>>
						Հայերեն
					</option><?php */ ?>
                    <option value="id_ID" <?php echo ( $option5['sfsi_icons_language'] == 'id_ID' ) ? 'selected="selected"' : ''; ?>>
                        Bahasa Indonesia
                    </option>
					<?php /* ?><option value="is_IS" <?php echo ( $option5['sfsi_icons_language'] == 'is_IS' ) ? 'selected="selected"' : ''; ?>>
						Íslenska
					</option><?php */ ?>
                    <option value="it_IT" <?php echo ( $option5['sfsi_icons_language'] == 'it_IT' ) ? 'selected="selected"' : ''; ?>>
                        Italiano
                    </option>
                    <option value="ja" <?php echo ( $option5['sfsi_icons_language'] == 'ja_JP' || $option5['sfsi_icons_language'] == 'ja' ) ? 'selected="selected"' : ''; ?>>
                        日本語
                    </option>
                    <option value="ko_KR" <?php echo ( $option5['sfsi_icons_language'] == 'ko_KR' ) ? 'selected="selected"' : ''; ?>>
                        한국어
                    </option>
					<?php /* ?><option value="lt_LT" <?php echo ( $option5['sfsi_icons_language'] == 'lt_LT' ) ? 'selected="selected"' : ''; ?>>
						Lietuvių kalba
					</option>
					<option value="my_MM" <?php echo ( $option5['sfsi_icons_language'] == 'my_MM' ) ? 'selected="selected"' : ''; ?>>
						ဗမာစာ
					</option>
					<?php */ ?>
                    <option value="nl_NL" <?php echo ( $option5['sfsi_icons_language'] == 'nl_NL' ) ? 'selected="selected"' : ''; ?>>
                        Nederlands
                    </option>
					<?php /* ?><option value="nn_NO" <?php echo ( $option5['sfsi_icons_language'] == 'nn_NO' ) ? 'selected="selected"' : ''; ?>>
						Norsk nynorsk
					</option><?php */ ?>
                    <option value="pl_PL" <?php echo ( $option5['sfsi_icons_language'] == 'pl_PL' ) ? 'selected="selected"' : ''; ?>>
                        Polski
                    </option>
					<?php /* ?><option value="ps_AF" <?php echo ( $option5['sfsi_icons_language'] == 'ps_AF' ) ? 'selected="selected"' : ''; ?>>
						پښتو
					</option><?php */ ?>
                    <option value="pt_PT" <?php echo ( $option5['sfsi_icons_language'] == 'pt_BR' || $option5['sfsi_icons_language'] == 'pt_PT' ) ? 'selected="selected"' : ''; ?>>
                        Português do Brasil
                    </option>
					<?php /* ?><option value="ro_RO" <?php echo ( $option5['sfsi_icons_language'] == 'ro_RO' ) ? 'selected="selected"' : ''; ?>>
						Română
					</option><?php */ ?>
                    <option value="ru_RU" <?php echo ( $option5['sfsi_icons_language'] == 'ru_RU' ) ? 'selected="selected"' : ''; ?>>
                        Русский
                    </option>
					<?php /* ?><option value="sk_SK" <?php echo ( $option5['sfsi_icons_language'] == 'sk_SK' ) ? 'selected="selected"' : ''; ?>>
						Slovenčina
					</option>
					<option value="sl_SI" <?php echo ( $option5['sfsi_icons_language'] == 'sl_SI' ) ? 'selected="selected"' : ''; ?>>
						Slovenščina
					</option>
					<option value="sq_AL" <?php echo ( $option5['sfsi_icons_language'] == 'sq_AL' ) ? 'selected="selected"' : ''; ?>>
						Shqip
					</option>
					<option value="sr_RS" <?php echo ( $option5['sfsi_icons_language'] == 'sr_RS' ) ? 'selected="selected"' : ''; ?>>
						Српски језик
					</option><?php */ ?>
                    <option value="sv_SE" <?php echo ( $option5['sfsi_icons_language'] == 'sv_SE' ) ? 'selected="selected"' : ''; ?>>
                        Svenska
                    </option>
                    <option value="th" <?php echo ( $option5['sfsi_icons_language'] == 'th_TH' || $option5['sfsi_icons_language'] == 'th' ) ? 'selected="selected"' : ''; ?>>
                        ไทย
                    </option>
					<?php /* ?><option value="tl_PH" <?php echo ( $option5['sfsi_icons_language'] == 'tl_PH' ) ? 'selected="selected"' : ''; ?>>
						Tagalog
					</option><?php */ ?>
                    <option value="tr_TR" <?php echo ( $option5['sfsi_icons_language'] == 'tr_TR' ) ? 'selected="selected"' : ''; ?>>
                        Türkçe
                    </option>
					<?php /* ?><option value="ug_CN" <?php echo ( $option5['sfsi_icons_language'] == 'ug_CN' ) ? 'selected="selected"' : ''; ?>>
						Uyƣurqə
					</option>
					<option value="uk_UA" <?php echo ( $option5['sfsi_icons_language'] == 'uk_UA' ) ? 'selected="selected"' : ''; ?>>
						Українська
					</option><?php */ ?>
                    <option value="vi" <?php echo ( $option5['sfsi_icons_language'] == 'vi_VN' || $option5['sfsi_icons_language'] == 'vi' ) ? 'selected="selected"' : ''; ?>>
                        Tiếng Việt
                    </option>
                    <option value="zh_CN" <?php echo ( $option5['sfsi_icons_language'] == 'zh_CN' ) ? 'selected="selected"' : ''; ?>>
                        简体中文
                    </option>
					<?php /* ?><option value="cs_CZ" <?php echo ( $option5['sfsi_icons_language'] == 'cs_CZ' ) ? 'selected="selected"' : ''; ?>>
						Čeština
					</option>
					<option value="ur_PK" <?php echo ( $option5['sfsi_icons_language'] == 'ur_PK' ) ? 'selected="selected"' : ''; ?>>
						اردو‎
					</option><?php */ ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row new_wind">
        <h4><?php _e( 'New window', 'ultimate-social-media-icons' ) ?></h4>
        <div class="row_onl">
            <p><?php _e( 'If a user clicks on your icons, do you want to open the page in a new window?', 'ultimate-social-media-icons' ) ?>
            </p>
            <ul class="enough_waffling">
                <li>
                    <input name="sfsi_icons_ClickPageOpen" <?php echo ( $option5['sfsi_icons_ClickPageOpen'] == 'yes' ) ? 'checked="true"' : ''; ?>
                           type="radio" value="yes" class="styled"/>
                    <label><?php _e( 'Yes', 'ultimate-social-media-icons' ) ?></label>
                </li>
                <li>
                    <input name="sfsi_icons_ClickPageOpen" <?php echo ( $option5['sfsi_icons_ClickPageOpen'] == 'no' ) ? 'checked="true"' : ''; ?>
                           type="radio" value="no" class="styled"/>
                    <label><?php _e( 'No', 'ultimate-social-media-icons' ) ?></label>
                </li>
            </ul>
        </div>
    </div>

    <div class="row new_wind usmi-noopener" <?php if ( ! $was_installed_before || $option5['sfsi_icons_ClickPageOpen'] == 'no' ) {
		echo 'style="display: none;"';
	} ?> >
        <h4><?php _e( 'Add noopener to external links?', 'ultimate-social-media-icons' ) ?></h4>
        <div class="row_onl"><p><?php _e( 'Increases your site security.', 'ultimate-social-media-icons' ) ?>
            </p>
            <ul class="enough_waffling">
                <li>
                    <input name="sfsi_icons_AddNoopener" <?php echo ( $option5['sfsi_icons_ClickPageOpen'] == 'yes' && $option5['sfsi_icons_AddNoopener'] == 'yes' ) ? 'checked="true"' : ''; ?>
                           type="radio" value="yes" class="styled"/>
                    <label><?php _e( 'Yes', 'ultimate-social-media-icons' ) ?></label>
                </li>
                <li>
                    <input name="sfsi_icons_AddNoopener" <?php echo ( ! ( $option5['sfsi_icons_ClickPageOpen'] == 'yes' && $option5['sfsi_icons_AddNoopener'] == 'yes' ) ) ? 'checked="true"' : ''; ?>
                           type="radio" value="no" class="styled"/>
                    <label><?php _e( 'No', 'ultimate-social-media-icons' ) ?></label>
                </li>
            </ul>
        </div>
    </div>

    <!-- icon's floating and stick section start here -->
    <div class="row sticking">

        <h4><?php _e( 'Sticky icons', 'ultimate-social-media-icons' ) ?></h4>

        <div class="clear float_options" <?php if ( $option5['sfsi_icons_stick'] == 'yes' ) : ?> style="display:none" <?php endif; ?>>
        </div>

        <div class="space">

            <p class="list"><?php _e( 'Make icons stick?', 'ultimate-social-media-icons' ) ?></p>

            <ul class="enough_waffling">

                <li>
                    <input name="sfsi_icons_stick" <?php echo ( $option5['sfsi_icons_stick'] == 'yes' ) ? 'checked="true"' : ''; ?>
                           type="radio" value="yes" class="styled"/>
                    <label><?php _e( 'Yes', 'ultimate-social-media-icons' ) ?></label>
                </li>

                <li>
                    <input name="sfsi_icons_stick" <?php echo ( $option5['sfsi_icons_stick'] == 'no' ) ? 'checked="true"' : ''; ?>
                           type="radio" value="no" class="styled"/>
                    <label><?php _e( 'No', 'ultimate-social-media-icons' ) ?></label>
                </li>

            </ul>


            <p><?php
				printf(
					__( 'If you select «Yes» here, then the icons which you placed via %1$swidget%2$s or %3$sshortcode%4$s will still be visible on the screen as user scrolls down your page, i.e. they will stick at the top.', 'ultimate-social-media-icons' ),
					'<span style="text-decoration: underline;"><b>',
					'</b></span>',
					'<span style="text-decoration: underline;"><b>',
					'</b></span>'
				);
				?></p>

            <p><?php
				printf(
					__( 'This is not to be confused with making the icons permanently placed in the same position, which is possible in the %1$s Premium Plugin.%2$s', 'ultimate-social-media-icons' ),
					'<a target="_blank" href="https://www.ultimatelysocial.com/usm-premium"><b>',
					'</b></a>'
				);
				?></p>

        </div>

    </div><!-- END icon's floating and stick section -->

    <!--*************  Sharing texts & pictures section STARTS *****************************-->

    <div class="row sfsi_custom_social_data_setting" id="custom_social_data_setting">

        <h4><?php _e( 'Sharing texts & pictures?', 'ultimate-social-media-icons' ) ?></h4>
        <p><?php _e( 'On the pages where you edit your posts/pages, you’ll see a (new) section where you can define which pictures & text should be shared. This extra section is displayed on the following:', 'ultimate-social-media-icons' ) ?></p>

		<?php
		$checkedS   = ( isset( $option5['sfsi_custom_social_hide'] ) && $option5['sfsi_custom_social_hide'] == "yes" ) ? 'checked="checked"' : '';
		$checked    = ( isset( $option5['sfsi_custom_social_hide'] ) && $option5['sfsi_custom_social_hide'] == "yes" ) ? '' : 'checked="checked"';
		$checkedVal = isset( $option5['sfsi_custom_social_hide'] ) ? $option5['sfsi_custom_social_hide'] : 'no';
		?>
        <div class="social_data_post_types">
            <ul class="socialPostTypesUl">
                <li class="sfsi_show_via_onhover disabled_checkbox sfsi-max-content" style="margin-right:20px;">
                    <label class="sfsi_tooltip_premium sfsi_tooltip_premium_small d-flex flex-row align-items-center">
                        <div class="sfsiicnsdvwrp" style="width: auto;">
                            <span class="checkbox" style="background-position:0px -36px!important;"></span>
                        </div>
                        <div class="sfsicnwrp" style="font-family: helveticaneue-light;">
							<?php
							_e( 'Page', 'ultimate-social-media-icons' );
							echo sfsi_premium_tooltip_content( 'sfsi_tooltip_text_premium_small' );
							?>
                        </div>
                    </label>
                </li>
                <li class="sfsi_show_via_onhover disabled_checkbox sfsi-max-content">
                    <label class="sfsi_tooltip_premium sfsi_tooltip_premium_small d-flex flex-row align-items-center">
                        <div class="sfsiicnsdvwrp" style="width: auto;">
                            <span class="checkbox" style="background-position:0px -36px!important;"></span>
                        </div>
                        <div class="sfsicnwrp" style="font-family: helveticaneue-light;">
							<?php
							_e( 'Post', 'ultimate-social-media-icons' );
							echo sfsi_premium_tooltip_content( 'sfsi_tooltip_text_premium_small' );
							?>
                        </div>
                    </label>
                </li>
            </ul>

            <ul class="sfsi_show_hide_section">
                <li>
                    <div class="radio_section tb_4_ck">
                        <input name="sfsi_custom_social_hide" type="checkbox" <?php echo $checkedS; ?>
                               value="<?php echo $checkedVal; ?>" class="styled"/>
                        <label class="cstmdsplsub"><?php _e( "Hide section for all", 'ultimate-social-media-icons' ) ?></label>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!--********************  Sharing texts & pictures section CLOSES ************************************************-->

    <!-- mouse over text section start here -->
    <div class="row mouse_txt">
        <h4><?php _e( "Mouseover text", 'ultimate-social-media-icons' ) ?></h4>
        <p>
			<?php _e( "If you’ve given your icon only one function (i.e. no pop-up where user can perform different actions) then you can define here what text will be displayed if a user moves his mouse over the icon:", 'ultimate-social-media-icons' ) ?>
        </p>
        <div class="space">
            <div class="clear"></div>
            <div class="mouseover_field rss_section">
                <label><?php _e( "RSS:", 'ultimate-social-media-icons' ) ?></label><input name="sfsi_rss_MouseOverText"
                                                                                          value="<?php echo ( $option5['sfsi_rss_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_rss_MouseOverText'] ) : ''; ?>"
                                                                                          type="text"/>
            </div>
            <div class="mouseover_field email_section">
                <label><?php _e( "Email:", 'ultimate-social-media-icons' ) ?></label><input
                        name="sfsi_email_MouseOverText"
                        value="<?php echo ( $option5['sfsi_email_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_email_MouseOverText'] ) : ''; ?>"
                        type="text"/>
            </div>

            <div class="clear">
                <div class="mouseover_field twitter_section">
                    <label><?php _e( "X (Twitter):", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_twitter_MouseOverText"
                           value="<?php echo ( $option5['sfsi_twitter_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_twitter_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
                <div class="mouseover_field facebook_section">
                    <label><?php _e( "Facebook:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_facebook_MouseOverText"
                           value="<?php echo ( $option5['sfsi_facebook_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_facebook_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
            </div>
            <div class="clear">
                <div class="mouseover_field linkedin_section">
                    <label><?php _e( "LinkedIn:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_linkedIn_MouseOverText"
                           value="<?php echo ( $option5['sfsi_linkedIn_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_linkedIn_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
                <div class="mouseover_field wechat_section">
                    <label><?php _e( "WeChat:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_wechat_MouseOverText"
                           value="<?php echo ( $option5['sfsi_wechat_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_wechat_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
            </div>
            <div class="clear">
                <div class="mouseover_field whatsapp_section">
                    <label><?php _e( "WhatsApp:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_whatsapp_MouseOverText"
                           value="<?php echo ( $option5['sfsi_whatsapp_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_whatsapp_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
                <div class="mouseover_field weibo_section">
                    <label><?php _e( "Weibo:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_weibo_MouseOverText"
                           value="<?php echo ( $option5['sfsi_weibo_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_weibo_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
            </div>

            <div class="clear">
                <div class="mouseover_field pinterest_section">
                    <label><?php _e( "Pinterest:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_pinterest_MouseOverText"
                           value="<?php echo ( $option5['sfsi_pinterest_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_pinterest_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
                <div class="mouseover_field youtube_section">
                    <label><?php _e( "Youtube:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_youtube_MouseOverText"
                           value="<?php echo ( $option5['sfsi_youtube_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_youtube_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
            </div>
            <div class="clear">
                <div class="mouseover_field instagram_section">
                    <label><?php _e( "Instagram:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_instagram_MouseOverText"
                           value="<?php echo ( $option5['sfsi_instagram_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_instagram_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
                <div class="mouseover_field telegram_section">
                    <label><?php _e( "Telegram:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_telegram_MouseOverText"
                           value="<?php echo ( $option5['sfsi_telegram_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_telegram_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
            </div>
            <div class="clear">
                <div class="mouseover_field threads_section">
                    <label><?php _e( "Threads:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_threads_MouseOverText"
                           value="<?php echo ( $option5['sfsi_threads_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_threads_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
                <div class="mouseover_field bluesky_section">
                    <label><?php _e( "Bluesky:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_bluesky_MouseOverText"
                           value="<?php echo ( $option5['sfsi_bluesky_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_bluesky_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
            </div>
            <div class="clear">
                <div class="mouseover_field vk_section">
                    <label><?php _e( "VK:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_vk_MouseOverText"
                           value="<?php echo ( $option5['sfsi_vk_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_vk_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
                <div class="mouseover_field ok_section">
                    <label><?php _e( "Ok:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_ok_MouseOverText"
                           value="<?php echo ( $option5['sfsi_ok_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_ok_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
            </div>

            <div class="clear">
                <div class="mouseover_field reddit_section">
                    <label><?php _e( "Reddit:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_reddit_MouseOverText"
                           value="<?php echo ( $option5['sfsi_reddit_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_reddit_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
                <div class="mouseover_field fbmessenger_section">
                    <label><?php _e( "Fb Messenger:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_fbmessenger_MouseOverText"
                           value="<?php echo ( $option5['sfsi_fbmessenger_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_fbmessenger_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
            </div>

            <div class="clear">
                <div class="mouseover_field ria_section">
                    <label><?php _e( "RateItAll:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_ria_MouseOverText"
                           value="<?php echo ( $option5['sfsi_ria_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_ria_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
            </div>
            <div class="clear">
                <div class="mouseover_field inha_section">
                    <label><?php _e( "IncreasingHappiness:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_inha_MouseOverText"
                           value="<?php echo ( $option5['sfsi_inha_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_inha_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
            </div>


            <div class="clear">
                <div class="mouseover_field viber_section">
                    <label><?php _e( "Tiktok:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_tiktok_MouseOverText"
                           value="<?php echo ( $option5['sfsi_tiktok_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_tiktok_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
                <div class="mouseover_field xing_section">
                    <label><?php _e( "Snapchat:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_snapchat_MouseOverText"
                           value="<?php echo ( $option5['sfsi_snapchat_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_snapchat_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
            </div>

            <div class="clear">
                <div class="mouseover_field sfsiplus_copylink_section">
                    <label>
						<?php _e( 'Copy link:', 'ultimate-social-media-icons' ); ?>
                    </label>
                    <input name="sfsi_copylink_MouseOverText"
                           value="<?php echo isset( $option5['sfsi_copylink_MouseOverText'] ) && ! empty( $option5['sfsi_copylink_MouseOverText'] ) ? esc_attr( $option5['sfsi_copylink_MouseOverText'] ) : 'Copy link'; ?>"
                           type="text"/>
                </div>
            </div>

            <div class="clear">
                <div class="mouseover_field mastodon_section">
                    <label><?php _e( "Mastodon:", 'ultimate-social-media-icons' ) ?></label>
                    <input name="sfsi_mastodon_MouseOverText"
                           value="<?php echo ( $option5['sfsi_mastodon_MouseOverText'] != '' ) ? esc_attr( $option5['sfsi_mastodon_MouseOverText'] ) : ''; ?>"
                           type="text"/>
                </div>
            </div>

            <div class="custom_m">
				<?php
				$sfsiMouseOverTexts = unserialize( $option5['sfsi_custom_MouseOverTexts'] );
				$count              = 1;
				for ( $i = $first_key; $i <= $endkey; $i ++ ) :
					?><?php if ( ! empty( $icons[ $i ] ) ) : ?>

					<?php if ( $count === 1 || $count - 1 % 2 == 0 ): ?>
                        <div class="clear">
					<?php endif; ?>

                    <div class="mouseover_field custom_section sfsiICON_<?php echo $i; ?>">
                        <label><?php _e( "Custom", 'ultimate-social-media-icons' ) ?> <?php echo $count; ?>:</label>
                        <input name="sfsi_custom_MouseOverTexts[]"
                               value="<?php echo ( isset( $sfsiMouseOverTexts[ $i ] ) && $sfsiMouseOverTexts[ $i ] != '' ) ? sanitize_text_field( $sfsiMouseOverTexts[ $i ] ) : ''; ?>"
                               type="text" file-id="<?php echo $i; ?>"/>
                    </div>

					<?php if ( $count % 2 == 0 ): ?>
                        </div>
					<?php endif; ?>

					<?php $count ++; endif; endfor; ?>
            </div>
        </div>

    </div>
    <!-- END mouse over text section -->
    <div class="row new_wind">
        <h4><?php _e( 'Error reporting', 'ultimate-social-media-icons' ); ?></h4>
        <div class="row_onl"><p><?php _e( 'Suppress error messages?', 'ultimate-social-media-icons' ); ?></p>
            <ul class="enough_waffling">
                <li>
                    <input name="sfsi_icons_suppress_errors" <?php echo ( $sfsi_icons_suppress_errors == 'yes' ) ? 'checked="true"' : ''; ?>
                           type="radio" value="yes" class="styled"/>
                    <label><?php _e( 'Yes', 'ultimate-social-media-icons' ); ?></label>
                </li>
                <li>
                    <input name="sfsi_icons_suppress_errors" <?php echo ( $sfsi_icons_suppress_errors == 'no' ) ? 'checked="true"' : ''; ?>
                           type="radio" value="no" class="styled"/>
                    <label><?php _e( 'No', 'ultimate-social-media-icons' ) ?></label>
                </li>
            </ul>
        </div>
    </div>

    <div class="row new_wind">
        <h4><?php _e( 'Support widget', 'ultimate-social-media-icons' ); ?></h4>
        <div class="row_onl">
            <p><?php _e( 'Show the USM support widget on the front-end?', 'ultimate-social-media-icons' ) ?></p>
            <ul class="enough_waffling">
                <li>
                    <input name="sfsi_show_admin_popup" <?php echo ( $sfsi_show_admin_popup == 'yes' ) ? 'checked="true"' : ''; ?>
                           type="radio" value="yes" class="styled"/>
                    <label><?php _e( 'Yes', 'ultimate-social-media-icons' ); ?></label>
                </li>
                <li>
                    <input name="sfsi_show_admin_popup" <?php echo ( $sfsi_show_admin_popup == 'no' ) ? 'checked="true"' : ''; ?>
                           type="radio" value="no" class="styled"/>
                    <label><?php _e( 'No', 'ultimate-social-media-icons' ); ?></label>
                </li>
            </ul>
        </div>
    </div>

    <div class="row new_wind">
        <h4><?php _e( 'Tips', 'ultimate-social-media-icons' ); ?></h4>
        <div class="row_onl">
            <p><?php _e( 'Show more useful tips for more sharing & traffic?', 'ultimate-social-media-icons' ) ?></p>
            <ul class="enough_waffling">
                <li>
                    <input name="sfsi_icons_sharing_and_traffic_tips" <?php echo ( $sfsi_icons_sharing_and_traffic_tips == 'yes' ) ? 'checked="true"' : ''; ?>
                           type="radio" value="yes" class="styled"/>
                    <label><?php _e( 'Yes', 'ultimate-social-media-icons' ); ?></label>
                </li>
                <li>
                    <input name="sfsi_icons_sharing_and_traffic_tips" <?php echo ( $sfsi_icons_sharing_and_traffic_tips == 'no' ) ? 'checked="true"' : ''; ?>
                           type="radio" value="no" class="styled"/>
                    <label><?php _e( 'No', 'ultimate-social-media-icons' ); ?></label>
                </li>
            </ul>
        </div>
    </div>

    <div class="row new_wind">
		<?php include( SFSI_DOCROOT . '/views/sfsi_option_view_tifm.php' ); ?>
    </div>

    <!-- <div class="row new_wind">
		<h4>Tips</h4>
		<div class="row_onl"><p>Show useful tips for more sharing & traffic?</p>
			<ul class="enough_waffling">
				<li>
					<input name="sfsi_icons_hide_banners" checked="true"  type="radio" value="yes" class="styled" />
					<label>Yes</label>
				</li>
				<li>
					<input name="sfsi_icons_hide_banners" type="radio" value="no" class="styled" />
					<label>No</label>
				</li>
			  </ul>
		  </div>
	</div> -->

	<?php sfsi_ask_for_help( 5 ); ?>
    <!-- SAVE BUTTON SECTION   -->
    <div class="save_button">
        <img src="<?php echo SFSI_PLUGURL ?>images/ajax-loader.gif" alt="error" class="loader-img"/>
		<?php $nonce = wp_create_nonce( "update_step5" ); ?>
        <a href="javascript:;" id="sfsi_save5" title="Save"
           data-nonce="<?php echo $nonce; ?>"><?php _e( "Save", 'ultimate-social-media-icons' ) ?></a>
    </div>
    <!-- END SAVE BUTTON SECTION   -->

    <a class="sfsiColbtn closeSec" href="javascript:;"><?php _e( "Collapse area", 'ultimate-social-media-icons' ) ?></a>
    <label class="closeSec"></label>

    <!-- ERROR AND SUCCESS MESSAGE AREA-->
    <p class="red_txt errorMsg" style="display:none"></p>
    <p class="green_txt sucMsg" style="display:none"></p>
    <div class="clear"></div>

</div>
<!-- END Section 5 "Any other wishes for your main icons?"-->
