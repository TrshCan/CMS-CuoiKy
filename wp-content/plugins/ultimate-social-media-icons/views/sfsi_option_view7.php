<?php

/* unserialize all saved option for  section 7 options */

$option7 = maybe_unserialize( get_option( 'sfsi_section7_options', false ) );
while ( is_string( $option7 ) ) {
	$option7 = @unserialize( $option7 );
	if ( false == $option7 ) {
		$option7 = array();
	}
}

/*

 * Sanitize, escape and validate values

 */

$option7['sfsi_popup_text'] = ( isset( $option7['sfsi_popup_text'] ) ) ? sanitize_text_field( $option7['sfsi_popup_text'] ) : '';

$option7['sfsi_popup_background_color'] = ( isset( $option7['sfsi_popup_background_color'] ) ) ? sfsi_sanitize_hex_color( $option7['sfsi_popup_background_color'] ) : '';

$option7['sfsi_popup_border_color'] = ( isset( $option7['sfsi_popup_border_color'] ) ) ? sfsi_sanitize_hex_color( $option7['sfsi_popup_border_color'] ) : '';

$option7['sfsi_popup_border_thickness'] = ( isset( $option7['sfsi_popup_border_thickness'] ) ) ? intval( $option7['sfsi_popup_border_thickness'] ) : '';

$option7['sfsi_popup_border_shadow'] = ( isset( $option7['sfsi_popup_border_shadow'] ) ) ? sanitize_text_field( $option7['sfsi_popup_border_shadow'] ) : '';

$option7['sfsi_popup_font'] = ( isset( $option7['sfsi_popup_font'] ) ) ? sanitize_text_field( $option7['sfsi_popup_font'] ) : '';

$option7['sfsi_popup_fontSize'] = ( isset( $option7['sfsi_popup_fontSize'] ) ) ? intval( $option7['sfsi_popup_fontSize'] ) : '';

$option7['sfsi_popup_fontStyle'] = ( isset( $option7['sfsi_popup_fontStyle'] ) ) ? sanitize_text_field( $option7['sfsi_popup_fontStyle'] ) : '';

$option7['sfsi_popup_fontColor'] = ( isset( $option7['sfsi_popup_fontColor'] ) ) ? sfsi_sanitize_hex_color( $option7['sfsi_popup_fontColor'] ) : '';

$option7['sfsi_Show_popupOn'] = ( isset( $option7['sfsi_Show_popupOn'] ) ) ? sanitize_text_field( $option7['sfsi_Show_popupOn'] ) : '';

$option7['sfsi_Shown_pop'] = ( isset( $option7['sfsi_Shown_pop'] ) ) ? sanitize_text_field( $option7['sfsi_Shown_pop'] ) : '';
?>

<!-- Section 7 "Do you want to display a pop-up, asking people to subscribe?" main div Start -->

<div class="tab7">
	<?php
	$sfsi_banner_popups = sanitize_text_field( get_option( 'sfsi_banner_popups', false ) );
	if ( $sfsi_banner_popups == "yes" ) {
		?>
        <div id="sfsi_firsttime_offer" class="sfsi_new_prmium_follw  sfsi_banner_body">
            <div>
                <p>
					<?php
					printf(
						__( 'Update: if you want many more features for your pop-ups, have a look at %1s MyPopUps. %2s', 'ultimate-social-media-icons' ),
						'<a target="_blank" href="https://sellcodes.com/s/3NmlIE" style="color:#1a1d20 !important;font-weight: bold;border-bottom: 1px solid #1a1d20;">',
						'</a>'
					);
					?>
                </p>
            </div>
            <div style="text-align:right;">
                <form method="post" class="sfsi_premiumNoticeDismiss" style="padding-bottom:8px;">
                    <input type="hidden" name="sfsi-banner-popups" value="true">
                    <input type="submit" name="dismiss"
                           value="<?php _e( 'Dismiss', 'ultimate-social-media-icons' ) ?>"/>

                </form>
            </div>
        </div>
		<?php
	}
	?>
    <p><?php _e( "You can increase the chances that people share or follow you by displaying a pop-up asking them to. You can define the design and layout below:", 'ultimate-social-media-icons' ) ?></p>

    <!-- icons preview section -->

    <div class="like_pop_box">

        <div class="sfsi_Popinner">

            <h2><?php _e( "Enjoy this site? Please follow and like us!", 'ultimate-social-media-icons' ) ?></h2>

            <ul class="like_icon sfsi_sample_icons">

                <li class="rss_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/rss.png" alt="RSS"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_rss_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="email_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/<?php echo $email_image; ?>" alt="Email"
                             class="icon_img"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_email_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="facebook_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/facebook.png" alt="Facebook"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_facebook_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="twitter_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/twitter.png" alt="Twitter"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_twitter_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="youtube_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/youtube.png" alt="YouTube"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_youtube_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="pinterest_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/pinterest.png" alt="Pinterest"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_pinterest_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="linkedin_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/linked_in.png" alt="Linked In"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_linkedIn_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="instagram_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/instagram.png" alt="Instagram"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_instagram_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="threads_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/threads.png" height="50px" alt="Threads"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_threads_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="ria_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/ria.png" alt="RateItAll"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_ria_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="inha_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/inha.png" alt="IncreasingHappiness"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_inha_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>


                <li class="telegram_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_telegram.png"
                             height="50px" alt="telegram"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_telegram_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="vk_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_vk.png" height="50px"
                             alt="vk"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_vk_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="bluesky_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/bluesky.png" height="50px"
                             alt="Bluesky"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_bluesky_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="ok_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_ok.png" height="50px"
                             alt="ok"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_ok_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="weibo_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_weibo.png" height="50px"
                             alt="weibo"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_weibo_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="wechat_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_wechat.png" height="50px"
                             alt="wechat"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_wechat_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="whatsapp_section">

                    <div>

                        <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_whatsapp.png"
                             height="50px" alt="whatsapp"/>

                        <span class="sfsi_Cdisplay"
                              id="sfsi_whatsapp_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>

                    </div>

                </li>

                <li class="snapchat_section">
                    <div>
                        <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_snapchat.png"
                             height="50px" alt="snapchat"/>
                        <span class="sfsi_Cdisplay"
                              id="sfsi_snapchat_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>
                    </div>
                </li>

                <li class="reddit_section">
                    <div>
                        <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_reddit.png" height="50px"
                             alt="reddit"/>
                        <span class="sfsi_Cdisplay"
                              id="sfsi_reddit_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>
                    </div>
                </li>

                <li class="fbmessenger_section">
                    <div>
                        <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_fbmessenger.png"
                             height="50px" alt="fbmessenger"/>
                        <span class="sfsi_Cdisplay"
                              id="sfsi_fbmessenger_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>
                    </div>
                </li>

                <li class="tiktok_section">
                    <div>
                        <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_tiktok.png" height="50px"
                             alt="tiktok"/>
                        <span class="sfsi_Cdisplay"
                              id="sfsi_tiktok_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>
                    </div>

                </li>

                <li class="mastodon_section">
                    <div>
                        <img src="<?php echo SFSI_PLUGURL ?>images/icons_theme/default/default_mastodon.png"
                             height="50px" alt="mastodon"/>
                        <span class="sfsi_Cdisplay"
                              id="sfsi_mastodon_countsDisplay"><?php _e( "12k", 'ultimate-social-media-icons' ) ?></span>
                    </div>
                </li>

				<?php

				if ( isset( $icons ) && ! empty( $icons ) ) {

					foreach ( $icons as $icn => $img ) {

						echo '<li class="custom_section sfsiICON_' . $icn . '"  element-id="' . $icn . '" ><div><img src="' . esc_url( $img ) . '" alt="Custom Icon" class="sfcm" /><span class="sfsi_Cdisplay">12k</span></div></li>';
					}
				}

				?>

            </ul>

        </div>

    </div><!-- END icons preview section -->

    <!-- icons controllers section -->

    <div class="space">

        <h4><?php _e( "Text ", 'ultimate-social-media-icons' ) ?>
            &amp; <?php _e( " Design", 'ultimate-social-media-icons' ) ?></h4>

        <div class="text_options">

            <h3><?php _e( "Text Options", 'ultimate-social-media-icons' ) ?></h3>

            <div class="row_tab">

                <label><?php _e( "Text:", 'ultimate-social-media-icons' ) ?></label>

                <input class="mkPop" name="sfsi_popup_text" type="text"
                       value="<?php echo ( $option7['sfsi_popup_text'] != '' ) ? esc_attr( $option7['sfsi_popup_text'] ) : ''; ?>"/>

            </div>

            <div class="row_tab">

                <label><?php _e( "Font:", 'ultimate-social-media-icons' ) ?></label>

                <div class="field">

                    <select name="sfsi_popup_font" id="sfsi_popup_font" class="styled">

                        <option value="Arial, Helvetica, sans-serif" <?php echo ( $option7['sfsi_popup_font'] == 'Arial, Arial, Helvetica, sans-serif' ) ? 'selected="true"' : ''; ?>><?php _e( "Arial", 'ultimate-social-media-icons' ) ?></option>

                        <option value="Arial Black, Gadget, sans-serif" <?php echo ( $option7['sfsi_popup_font'] == 'Arial Black, Gadget, sans-serif' ) ? 'selected="true"' : ''; ?>><?php _e( "Arial Black", 'ultimate-social-media-icons' ) ?></option>

                        <option value="Calibri" <?php echo ( $option7['sfsi_popup_font'] == 'Calibri' ) ? 'selected="true"' : ''; ?>><?php _e( "Calibri", 'ultimate-social-media-icons' ) ?></option>

                        <option value="Comic Sans MS" <?php echo ( $option7['sfsi_popup_font'] == 'Comic Sans MS' ) ? 'selected="true"' : ''; ?>><?php _e( "Comic Sans MS", 'ultimate-social-media-icons' ) ?></option>

                        <option value="Courier New" <?php echo ( $option7['sfsi_popup_font'] == 'Courier New' ) ? 'selected="true"' : ''; ?>><?php _e( "Courier New", 'ultimate-social-media-icons' ) ?></option>

                        <option value="Georgia" <?php echo ( $option7['sfsi_popup_font'] == 'Georgia' ) ? 'selected="true"' : ''; ?>><?php _e( "Georgia", 'ultimate-social-media-icons' ) ?></option>

                        <option value="Helvetica,Arial,sans-serif" <?php echo ( $option7['sfsi_popup_font'] == 'Helvetica,Arial,sans-serif' ) ? 'selected="true"' : ''; ?>><?php _e( "Helvetica", 'ultimate-social-media-icons' ) ?></option>

                        <option value="Impact" <?php echo ( $option7['sfsi_popup_font'] == 'Impact' ) ? 'selected="true"' : ''; ?>><?php _e( "Impact", 'ultimate-social-media-icons' ) ?></option>

                        <option value="Lucida Console" <?php echo ( $option7['sfsi_popup_font'] == 'Lucida Console' ) ? 'selected="true"' : ''; ?>><?php _e( "Lucida Console", 'ultimate-social-media-icons' ) ?></option>

                        <option value="Tahoma,Geneva" <?php echo ( $option7['sfsi_popup_font'] == 'Tahoma,Geneva' ) ? 'selected="true"' : ''; ?>><?php _e( "Tahoma", 'ultimate-social-media-icons' ) ?></option>

                        <option value="Times New Roman" <?php echo ( $option7['sfsi_popup_font'] == 'Times New Roman' ) ? 'selected="true"' : ''; ?>><?php _e( "Times New Roman", 'ultimate-social-media-icons' ) ?></option>

                        <option value="Trebuchet MS" <?php echo ( $option7['sfsi_popup_font'] == 'Trebuchet MS' ) ? 'selected="true"' : ''; ?>><?php _e( "Trebuchet MS", 'ultimate-social-media-icons' ) ?></option>

                        <option value="Verdana" <?php echo ( $option7['sfsi_popup_font'] == 'Verdana' ) ? 'selected="true"' : ''; ?>><?php _e( "Verdana", 'ultimate-social-media-icons' ) ?></option>

                    </select>

                </div>

            </div>

            <div class="row_tab">

                <label><?php _e( "Font style:", 'ultimate-social-media-icons' ) ?></label>

                <div class="field">

                    <select name="sfsi_popup_fontStyle" id="sfsi_popup_fontStyle" class="styled">

                        <option value="normal" <?php echo ( $option7['sfsi_popup_fontStyle'] == 'normal' ) ? 'selected="true"' : ''; ?>><?php _e( "Normal", 'ultimate-social-media-icons' ) ?></option>

                        <option value="inherit" <?php echo ( $option7['sfsi_popup_fontStyle'] == 'inherit' ) ? 'selected="true"' : ''; ?>><?php _e( "Inherit", 'ultimate-social-media-icons' ) ?></option>

                        <option value="oblique" <?php echo ( $option7['sfsi_popup_fontStyle'] == 'oblique' ) ? 'selected="true"' : ''; ?>><?php _e( "Oblique", 'ultimate-social-media-icons' ) ?></option>

                        <option value="italic" <?php echo ( $option7['sfsi_popup_fontStyle'] == 'italic' ) ? 'selected="true"' : ''; ?>><?php _e( "Italic", 'ultimate-social-media-icons' ) ?></option>

                    </select>

                </div>

            </div>

            <div class="row_tab">

                <label><?php _e( "Font color:", 'ultimate-social-media-icons' ) ?></label>
                <div class="" style="padding-top:10px;">
                    <input name="sfsi_popup_fontColor" data-default-color="#b5b5b5" id="sfsi_popup_fontColor"
                           type="text"
                           value="<?php echo ( $option7['sfsi_popup_fontColor'] != '' ) ? esc_attr( $option7['sfsi_popup_fontColor'] ) : ''; ?>"/>
                </div>
            </div>

            <div class="row_tab">

                <label><?php _e( "Font size:", 'ultimate-social-media-icons' ) ?></label>

                <input name="sfsi_popup_fontSize" type="text"
                       value="<?php echo ( $option7['sfsi_popup_fontSize'] != '' ) ? esc_attr( $option7['sfsi_popup_fontSize'] ) : ''; ?>"
                       class="small"/>

            </div>

        </div>

        <div class="text_options layout">

            <h3><?php _e( "Icon Box Layout", 'ultimate-social-media-icons' ) ?></h3>

            <div class="row_tab">

                <label><?php _e( "Background", 'ultimate-social-media-icons' ) ?>
                    <br/><?php _e( "Color:", 'ultimate-social-media-icons' ) ?></label>
                <div class="" style="padding-top:5px;">
                    <input name="sfsi_popup_background_color" data-default-color="#b5b5b5"
                           id="sfsi_popup_background_color" type="text"
                           value="<?php echo ( $option7['sfsi_popup_background_color'] != '' ) ? esc_attr( $option7['sfsi_popup_background_color'] ) : ''; ?>"/>
                </div>

            </div>

            <div class="row_tab">

                <label class="border"><?php _e( "Border Color:", 'ultimate-social-media-icons' ) ?></label>
                <div class="" style="padding-top:10px;">
                    <input name="sfsi_popup_border_color" data-default-color="#b5b5b5" id="sfsi_popup_border_color"
                           type="text"
                           value="<?php echo ( $option7['sfsi_popup_border_color'] != '' ) ? esc_attr( $option7['sfsi_popup_border_color'] ) : ''; ?>"/>
                </div>

            </div>

            <div class="row_tab">

                <label><?php _e( "Border", 'ultimate-social-media-icons' ) ?>
                    <br/><?php _e( "Thickness:", 'ultimate-social-media-icons' ) ?></label>

                <div class="field" style="margin-top:0px;">

                    <input name="sfsi_popup_border_thickness" type="text"
                           value="<?php echo ( $option7['sfsi_popup_border_thickness'] != '' ) ? esc_attr( $option7['sfsi_popup_border_thickness'] ) : ''; ?>"
                           class="small"/>

                </div>

            </div>

            <div class="row_tab">

                <label><?php _e( "Border", 'ultimate-social-media-icons' ) ?>
                    <br/><?php _e( "Shadow:", 'ultimate-social-media-icons' ) ?></label>

                <ul class="border_shadow">

                    <li>
                        <input name="sfsi_popup_border_shadow" <?php echo ( $option7['sfsi_popup_border_shadow'] == 'yes' ) ? 'checked="true"' : ''; ?>
                               type="radio" value="yes"
                               class="styled"/><label> <?php _e( "On", 'ultimate-social-media-icons' ) ?></label></li>

                    <li>
                        <input name="sfsi_popup_border_shadow" <?php echo ( $option7['sfsi_popup_border_shadow'] == 'no' ) ? 'checked="true"' : ''; ?>
                               type="radio" value="no"
                               class="styled"/><label><?php _e( "Off", 'ultimate-social-media-icons' ) ?></label></li>

                </ul>

            </div>

        </div>
        <!-- By developer - 28-5-2019  -->
        <div class="row_tab">
            <p>
                <b><?php _e( "New:", 'ultimate-social-media-icons' ) ?></b> <?php _e( "In the Premium Plugin you can choose to display the text on the pop-up in a font already present in your theme", 'ultimate-social-media-icons' ) ?></b>
                .
                <a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=more_placement_options&utm_medium=banner"
                   target="_blank"
                   style="color:#00a0d2 !important; text-decoration: none !important;"><?php _e( "Check it out.", 'ultimate-social-media-icons' ) ?></a>
            </p>
        </div>
        <!-- End -->

    </div>

    <div class="row">

        <h4><?php _e( 'Where shall the pop-up be shown?', 'ultimate-social-media-icons' ) ?></a></h4>

        <div class="pop_up_show">

            <input name="sfsi_Show_popupOn" <?php echo ( $option7['sfsi_Show_popupOn'] == 'none' ) ? 'checked="true"' : ''; ?>
                   type="radio" value="none"
                   class="styled"/><label><?php _e( "Nowhere", 'ultimate-social-media-icons' ) ?></label>

        </div>

        <div class="pop_up_show">

            <input name="sfsi_Show_popupOn" <?php echo ( $option7['sfsi_Show_popupOn'] == 'everypage' ) ? 'checked="true"' : ''; ?>
                   type="radio" value="everypage" class="styled"/>
            <label><?php _e( "On all pages", 'ultimate-social-media-icons' ) ?></label>

        </div>

        <div class="pop_up_show">
            <div class="popup_somepages">
                <input name="sfsi_Show_popupOn" <?php echo ( isset( $option7['sfsi_Show_popupOn'] ) && ( $option7['sfsi_Show_popupOn'] == 'somepages' || $option7['sfsi_Show_popupOn'] == 'selectedpage' || $option7['sfsi_Show_popupOn'] == 'blogpage' ) ) ? 'checked="true"' : ''; ?>
                       type="radio" value="somepages" class="styled"/>
                <label><?php _e( 'On some pages', 'ultimate-social-media-icons' ); ?></label>
            </div>
            <div class="popup_containter"
                 style="<?php echo ( isset( $option7['sfsi_Show_popupOn'] ) && ( $option7['sfsi_Show_popupOn'] == 'somepages' || $option7['sfsi_Show_popupOn'] == 'selectedpage' || $option7['sfsi_Show_popupOn'] == 'blogpage' ) ) ? 'display:block;' : 'display:none;'; ?>">
                <div class="pop_up_show">
                    <input name="sfsi_Show_popupOn_somepages_blogpage" <?php echo ( ( isset( $option7['sfsi_Show_popupOn_somepages_blogpage'] ) && $option7['sfsi_Show_popupOn_somepages_blogpage'] == 'blogpage' ) || ( isset( $option7['sfsi_Show_popupOn'] ) && $option7['sfsi_Show_popupOn'] == 'blogpage' ) ) ? 'checked="true"' : ''; ?>
                           type="checkbox" value="blogpage" class="styled"/>
                    <label><?php _e( 'All blog posts', 'ultimate-social-media-icons' ); ?></label>
                </div>
                <div class="pop_up_show">
                    <input name="sfsi_Show_popupOn_somepages_selectedpage" <?php echo ( ( isset( $option7['sfsi_Show_popupOn_somepages_selectedpage'] ) && $option7['sfsi_Show_popupOn_somepages_selectedpage'] == 'selectedpage' ) || ( isset( $option7['sfsi_Show_popupOn'] ) && $option7['sfsi_Show_popupOn'] == 'selectedpage' ) ) ? 'checked="true"' : ''; ?>
                           type="checkbox" value="selectedpage"
                           class="styled"/><label><?php _e( 'Selected pages', 'ultimate-social-media-icons' ) ?></label>

                    <div class="field" style="width:50%">

                        <select multiple="multiple" name="sfsi_Show_popupOn_PageIDs" id="sfsi_Show_popupOn_PageIDs"
                                style="width:60%;min-height: 150px;">
							<?php
							$select = isset( $option7['sfsi_Show_popupOn_PageIDs'] ) ? unserialize( $option7['sfsi_Show_popupOn_PageIDs'] ) : array();

							$get_pages = get_pages( array(
								'offset'         => 1,
								'hierarchical'   => 1,
								'sort_order'     => 'DESC',
								'sort_column'    => 'post_date',
								'posts_per_page' => 200,
								'post_status'    => 'publish'
							) );

							if ( $get_pages ) {
								foreach ( $get_pages as $page ) {
									$attr = is_array( $select ) && in_array( $page->ID, $select ) ? 'selected="selected" class="sel-active"' : '';

									printf(
										'<option value="%s"  %s style="margin-bottom:3px;">%s</option>',
										$page->ID,
										$attr,
										$page->post_title
									);
								}
							}
							?>
                        </select><br/>
						<?php _e( 'Please hold the CTRL key to select multiple pages.', 'ultimate-social-media-icons' ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="pop_up_show">

			<?php $popupDesktopMobile = ( $option7['sfsi_Show_popupOn'] != 'none' ) ? 'display:block' : ''; ?>

            <div class="sfsi_show_desktop_mobile_setting_li popupDesktopMobileLi"
                 style="<?php echo esc_attr( $popupDesktopMobile ); ?>">

                <ul class="sfsi_icn_listing8 sfsi_closerli popupDesktopMobileUl">
                    <li>
                        <div class="sfsidesktopmbilelabel">
                            <h4 class="sfsi_toglepstpgspn"
                                style="color: #5a6570 !important;font-family: 'helveticaneue-light';"><?php _e( 'Show on:', 'ultimate-social-media-icons' ); ?></h4>
                        </div>
                    </li>
                    <li>
                        <div class="radio_section tb_4_ck">
                            <input name="sfsi_popup_show_on_desktop" type="checkbox" value="yes"
                                   class="styled" <?php echo ( ! isset( $option7['sfsi_popup_show_on_desktop'] ) || ( isset( $option7['sfsi_popup_show_on_desktop'] ) || $option7['sfsi_popup_show_on_desktop'] == 'yes' ) ) ? 'checked="true"' : ''; ?>>
                        </div>
                        <label>
							<?php _e( 'Desktop', 'ultimate-social-media-icons' ); ?>
                        </label>
                    </li>
                    <li>
                        <div class="radio_section tb_4_ck">
                            <input name="sfsi_popup_show_on_mobile" type="checkbox" value="yes"
                                   class="styled" <?php echo ( ! isset( $option7['sfsi_popup_show_on_mobile'] ) || ( isset( $option7['sfsi_popup_show_on_mobile'] ) && $option7['sfsi_popup_show_on_mobile'] == 'yes' ) ) ? 'checked="true"' : ''; ?>>
                        </div>
                        <label><?php _e( 'Mobile', 'ultimate-social-media-icons' ); ?></label>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    <div class="row">

        <h4><?php _e( "When shall the pop-up be shown?", 'ultimate-social-media-icons' ) ?></h4>

        <div class="pop_up_show">
            <input name="sfsi_Shown_pop" <?php echo ( $option7['sfsi_Shown_pop'] == 'once' ) ? 'checked="true"' : ''; ?>
                   type="checkbox" value="once"
                   class="styled"/><label><?php _e( "Once", 'ultimate-social-media-icons' ) ?> <input
                        name="sfsi_Shown_popupOnceTime" type="text"
                        value="<?php echo ( $option7['sfsi_Shown_popupOnceTime'] != '' ) ? esc_attr( $option7['sfsi_Shown_popupOnceTime'] ) : ''; ?>"
                        class="seconds"/> <?php _e( "seconds after the user arrived on the site", 'ultimate-social-media-icons' ) ?>
            </label>
        </div>
        <div class="pop_up_show">
            <input name="sfsi_Shown_pop" <?php echo ( $option7['sfsi_Shown_pop'] == 'ETscroll' ) ? 'checked="true"' : ''; ?>
                   type="checkbox" value="ETscroll"
                   class="styled"/><label><?php _e( "Every time user scrolls to the end of the page", 'ultimate-social-media-icons' ) ?></label>
        </div>
        <div class="pop_up_show pop_up_show_q7 sfsi-max-content clear">
            <label class="sfsi_tooltip_premium d-flex flex-row align-items-center pl-0">
                <div class="sfsiicnsdvwrp" style="margin-right: 20px; width: auto;">
                    <span class="checkbox" style="background-position:0px 0px!important;"></span>
                </div>
                <div class="sfsicnwrp">
					<?php
					_e( 'When the user leaves the page (i.e. moves over the top part in their browser)', 'ultimate-social-media-icons' );
					echo sfsi_premium_tooltip_content( 'tp-checkbox-link' );
					?>
                </div>
            </label>
        </div>
        <!-- <div class="sfsi_prem_show">
			<p class=sfsi_prem_plu_desc><b>New :</b> The Premium Plugin also allows you to show the pop-up when a user tries to <b>leave your page</b>. Also, you can <b>limit how often the pop-up is shown </b>to the same user (e.g. only once per day) <a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=more_popup_options&utm_medium=banner" target="_blank">Check it out</a></p>
		</div> -->
    </div>

    <div class="row popupq8 checkboxpopupq8">
        <h4><?php _e( 'After showing the pop-up, when shall it disappear again?', 'ultimate-social-media-icons' ); ?></h4>
        <div class="pop_up_show pop_up_show_q7 sfsi-max-content clear">
            <label class="sfsi_tooltip_premium d-flex flex-row align-items-center pl-0">
                <div class="sfsiicnsdvwrp" style="margin-right: 20px; width: auto;">
                    <span class="checkbox" style="background-position:0px 0px!important;"></span>
                </div>
                <div class="sfsicnwrp">
					<?php
					_e( 'When user scrolls', 'ultimate-social-media-icons' );
					echo sfsi_premium_tooltip_content( 'tp-checkbox-link' );
					?>
                </div>
            </label>
        </div>
        <div class="pop_up_show pop_up_show_q7 sfsi-max-content clear">
            <label class="sfsi_tooltip_premium d-flex flex-row align-items-center pl-0">
                <div class="sfsiicnsdvwrp" style="margin-right: 20px; width: auto;">
                    <span class="checkbox" style="background-position:0px 0px!important;"></span>
                </div>
                <div class="sfsicnwrp">
					<?php
					_e( 'When the user clicks outside of the pop-up area', 'ultimate-social-media-icons' );
					echo sfsi_premium_tooltip_content( 'tp-checkbox-link' );
					?>
                </div>
            </label>
        </div>
    </div>

    <div class="row popupq8">
        <h4><?php _e( 'Do you want to set a limit on how often the pop-up is shown?', 'ultimate-social-media-icons' ); ?></h4>
        <div class="pop_up_show sfsi_plus_popup_timelimit_radioCheck">
            <span class="radio" style="background-position:0px -41px!important;"></span>
			<?php /* ?><input checked name="sfsi_plus_popup_limit" type="radio" value="no" checked="true" class="styled"/><?php */ ?>
            <label><?php _e( 'No', 'ultimate-social-media-icons' ); ?></label>
        </div>
        <div class="pop_up_show sfsi_plus_popup_timelimit_radioCheck">
            <label class="sfsi_tooltip_premium sfsi_tooltip_premium_small d-flex flex-row align-items-center pl-0">
                <div class="sfsiicnsdvwrp" style="margin-right: 20px; width: auto;">
                    <span class="radio" style="background-position:0px 0px!important;"></span>
                </div>
                <div class="sfsicnwrp mt-0">
					<?php
					_e( 'Yes', 'ultimate-social-media-icons' );
					echo sfsi_premium_tooltip_content( 'sfsi_tooltip_text_premium_small' );
					?>
                </div>
            </label>
        </div>
    </div>

	<?php sfsi_ask_for_help( 7 ); ?>

    <!-- SAVE BUTTON SECTION   -->

    <div class="save_button">

        <img src="<?php echo SFSI_PLUGURL ?>images/ajax-loader.gif" alt="error" class="loader-img"/>

		<?php $nonce = wp_create_nonce( "update_step7" ); ?>

        <a href="javascript:;" id="sfsi_save7" title="Save"
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

<!-- END Section 7 "Do you want to display a pop-up, asking people to subscribe?" main div Start -->
