<?php
    $sfsi_sticky_icons_default = array(
        "default_icons" => array(
            "facebook" => array( "active" => "yes", "url" => "" ),
            "Twitter" => array( "active" => "yes", "url" => "" ),
            "Follow" => array( "active" => "yes",  "url" => "" ),
            "Pinterest" => array( "active" => "yes", "url" => "" ),
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

    $sfsi_sticky_custom_default = array(
        "LinkedIn",
        "Whatsapp",
        "vk",
        "Ok",
        "Telegram",
        "Weibo",
        "QQ2",
        "xing",
    );

    $sfsi_premium_sticky_icons = isset( $option9["sfsi_sticky_icons"] ) ? $option9["sfsi_sticky_icons"] : $sfsi_sticky_icons_default;

    $sfsi_sticky_bar = "no";
    if ( isset( $option9['sfsi_sticky_bar'] ) && !empty( $option9['sfsi_sticky_bar'] ) ) {
        $sfsi_sticky_bar = $option9['sfsi_sticky_bar'];
    }
    $label_style = 'style="display:none;"';
    $checked     = "";
    if( $sfsi_sticky_bar == 'yes' ) {
        $label_style = 'style="display:block;"';
        $checked     = 'checked="true"';
    }
?>

<li class="sfsi_sticky_bar">

    <div class="radio_section tb_4_ck" onclick="checkforinfoslction_checkbox(this);">
        <input name="sfsi_sticky_bar" <?php echo ( $option9['sfsi_sticky_bar'] == 'yes' ) ? 'checked="true"' : ''; ?> id="sfsi_sticky_bar" type="checkbox" value="yes" class="styled" /></div>

    <div class="sfsi_right_info">
        <p>
            <span class="sfsi_toglepstpgspn" style="display: inline-flex; align-items: center;"><?php _e( 'Sticky bar', 'ultimate-social-media-icons' ); ?><img src="<?php echo SFSI_PLUGURL; ?>images/new.gif" alt="new" style="padding-left: 5px;"></span><br>
            <label class="sfsi_sub-subtitle kckslctn" <?php echo $label_style; ?>>
                <?php _e( 'This is independent from the icons selected elsewhere in the plugin.', 'ultimate-social-media-icons' ); ?>
            </label>
        </p>

        <div class="kckslctn" <?php echo $label_style; ?>>
            <div class="row sfsi_sticky_bar">
                <h4 style="padding-top: 0; font-family: 'helveticaneue-light'; font-size: 18px;"><?php _e( 'Select icons:', 'ultimate-social-media-icons' ); ?></h4>
                <div class="icons_size sfsi_sticky_bar_icons_size" style="margin-left: 23px;">
                    <ul class="sfsi_new_alignment_option">
                        <li>
                            <div class="sfsi_sticky_bar_wrapper">
                                <ul>
                                    <?php foreach ($sfsi_premium_sticky_icons['default_icons'] as $icon => $icon_config) : ?>
                                        <li class="sfsi_premium_sticky_default_icon_container" style="width: 44%;">
                                            <div class="radio_section tb_4_ck">
                                                <input name="sfsi_premium_sticky_<?php echo esc_attr($icon); ?>_display" <?php echo ($icon_config['active'] == 'yes') ? 'checked="true"' : ''; ?> id="sfsi_premium_sticky_<?php echo esc_attr($icon); ?>_display" type="checkbox" value="yes" class="styled" data-icon="<?php echo esc_attr($icon); ?>" />
                                            </div>
                                            <span class="sfsi_premium_icon_container">
                                                <div class="sfsi_premium_sticky_icon_item_container sfsi_responsive_icon_<?php echo strtolower($icon); ?>_container" style="word-break:break-all;padding-left:0">
                                                    <div style="display: inline-block;height: 40px;width: 40px;text-align: center;vertical-align: middle!important;float: left;display:flex;justify-content:center">
                                                        <img style="float:none" src="<?php echo SFSI_PLUGURL; ?>images/responsive-icon/<?php echo esc_attr($icon); ?><?php echo 'Follow' === $icon ? '.png' : '.svg'; ?>"></div>
                                                </div>
                                            </span>
                                            <a href="#" class="sfsi_premium_sticky_default_url_toggler" style=""><?php _e('Define url*', 'ultimate-social-media-icons' ); ?></a>
                                            <input style="display:none" class="sfsi_premium_sticky_url_input" type="text" placeholder="Enter url" name="sfsi_premium_sticky_<?php echo esc_attr($icon) ?>_url_input" value="<?php echo esc_attr($icon_config["url"]); ?>" />
                                            <a href="#" class="sfsi_premium_sticky_default_url_hide" style="display:none"><span class="sfsi_premium_cancel_text"><?php _e('Cancel', 'ultimate-social-media-icons' ); ?></span></a>
                                        </li>
                                    <?php endforeach; ?>
                                    <?php foreach ( $sfsi_sticky_custom_default as $icon ) : ?>
                                        <li class="sfsi_premium_sticky_default_icon_container sfsi_tooltip_premium" style="width: 44% !important; display: flex;">
                                            <div class="radio_section tb_4_ck">
                                                <span class="checkbox" style="background-position:0px 0px!important;" id="sfsi_premium_sticky_<?php echo $icon; ?>_display"></span>
                                            </div>
                                            <span class="sfsi_premium_icon_container">
                                                <div class="sfsi_premium_sticky_icon_item_container sfsi_responsive_icon_<?php echo strtolower($icon); ?>_container" style="word-break:break-all;padding-left:0">
                                                    <div style="display: inline-block;height: 40px;width: 40px;text-align: center;vertical-align: middle!important;float: left;display:flex;justify-content:center">
                                                        <img style="float:none" src="<?php echo SFSI_PLUGURL; ?>images/responsive-icon/<?php echo $icon; ?><?php echo 'Follow' === $icon ? '.png' : '.svg'; ?>"></div>
                                                </div>
                                            </span>
                                            <span class="sfsi_premium_sticky_default_url_toggler sfsi_disable_click" style="font-family: helveticaregular;"><?php _e('Define url*', 'ultimate-social-media-icons' ); ?></span>
                                            <div class="sfsi_tooltip_premium_wrapper">
                                                <?php echo sfsi_premium_tooltip_content( '', 'ml-0' ); ?>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>

                                    <li class="sfsi_premium_sticky_custom_icon_container sfsi_premium_sticky_custom_check_option sfsi_tooltip_premium" style="width: 44% !important; display: flex;">
                                        <div class="radio_section tb_4_ck">
                                            <span class="checkbox" style="background-position:0px 0px!important;" id="sfsi_premium_sticky_custom_new_display"></span>
                                        </div>
                                        <span class="sfsi_premium_icon_container sfsi_custom_icon_wrapper">
                                            <div style="text-align: left; margin-top: 0px;padding-left:0">
                                                <span style="font-weight: 700;"><?php _e( 'Custom', 'ultimate-social-media-icons' ); ?></span>
                                            </div>
                                        </span>
                                        <div class="sfsi_tooltip_premium_wrapper">
                                            <?php echo sfsi_premium_tooltip_content( '', 'ml-0' ); ?>
                                        </div>
                                    </li>

                                </ul>
                                <span class="sfsi_sticky_bar_bottom_notice"><?php _e('*All icons have «sharing» feature enabled by default. If you want to give them a different function (e.g. link to your Facebook page) then please click on «Define URL» next to the icon.', 'ultimate-social-media-icons' ); ?></span>

                            </div>
                        </li>
                    </ul>
                </div>

                <!--- End Select Sticky icons -->

                <h4 style="padding-top: 0; font-family: 'helveticaneue-light'; font-size: 18px;"><?php _e( 'Show the bar on:', 'ultimate-social-media-icons' ); ?></h4>
                <div class="sfsi_premium_sticky_bar section" style="margin-left: 39px;margin-top: 16px;">
                    <!-- Desktop -->
                    <div class="sfsi_premium_desktop">
                        <div style="display: flex; align-items: center;">
                            <div>
                                <input name="sfsi_sticky_bar_desktop" <?php echo (isset($sfsi_premium_sticky_icons['settings']['desktop']) && $sfsi_premium_sticky_icons['settings']['desktop'] == 'yes') ? 'checked="true"' : ''; ?> id="sfsi_sticky_bar_desktop" type="checkbox" value="yes" class="styled">
                            </div>
                            <div style="margin-left: 16px;">
                                <span class="sfsi_toglepstpgspn">
                                    <?php _e( 'Desktop', 'ultimate-social-media-icons' ); ?>
                                </span>
                            </div>
                        </div>
                        <div style="margin-left: 47px;display: flow-root;">
                            <div class="icons_size">
                                <div class="sfsi_post_icons_size_alignments_element" style="width:100%">
                                    <span class="last" style="width: 39%;"><?php _e('Definition of “Desktop”: Screens larger than', 'ultimate-social-media-icons' ); ?></span>
                                    <input name="sfsi_sticky_bar_desktop_width" type="text" value="<?php echo (isset($sfsi_premium_sticky_icons['settings']['desktop_width']) && $sfsi_premium_sticky_icons['settings']['desktop_width'] != '') ? esc_attr($sfsi_premium_sticky_icons['settings']['desktop_width']) : 782; ?>" />
                                    <ins><?php _e('pixels (width)', 'ultimate-social-media-icons' ); ?></ins>
                                </div>
                            </div>

                            <div class="icons_size">
                                <div class="sfsi_post_icons_size_alignments_element" style="width:100%">
                                    <span class="sfsi_new_alignment_span" style="line-height: 45px;width: 39%;"><?php _e( 'Placement of (vertical) sticky bar:', 'ultimate-social-media-icons' ); ?></span>
                                    <div class="field" style="line-height: 38px;">
                                        <select name="sfsi_sticky_bar_desktop_placement" id="sfsi_sticky_bar_desktop_placement">
                                            <option value="left" <?php echo (isset($sfsi_premium_sticky_icons['settings']['desktop_placement']) && $sfsi_premium_sticky_icons['settings']['desktop_placement'] == 'left') ? 'selected="selected"' : ''; ?>>
                                                <?php _e( 'Left', 'ultimate-social-media-icons' ); ?>
                                            </option>
                                            <option value="right" <?php echo (isset($sfsi_premium_sticky_icons['settings']['desktop_placement']) && $sfsi_premium_sticky_icons['settings']['desktop_placement'] == 'right') ? 'selected="selected"' : ''; ?>>
                                                <?php _e( 'Right', 'ultimate-social-media-icons' ); ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="icons_size">

                                <div class="sfsi_post_icons_size_alignments_element" style="margin-right:0;width: 100%;">
                                    <span class="sfsi_new_alignment_span" style="line-height: 44px;width: 39%;display: block;float: left;font-size: 17px;font-weight: 400;line-height: 42px;"><?php _e( 'Adjust positioning: move the bar… ', 'ultimate-social-media-icons' ); ?></span>
                                    <input name="sfsi_sticky_bar_display_position" type="text" value="<?php echo (isset($sfsi_premium_sticky_icons['settings']['display_position']) && $sfsi_premium_sticky_icons['settings']['display_position'] != '') ? esc_attr($sfsi_premium_sticky_icons['settings']['display_position']) : 0; ?>" />
                                    <ins><?php _e( 'pixels', 'ultimate-social-media-icons' ); ?></ins>
                                    <ins style="margin-right: 8px; margin-left: 15px;"><?php _e( 'more', 'ultimate-social-media-icons' ); ?></ins>
                                    <div class="field" style="line-height: normal;">
                                        <select name="sfsi_sticky_bar_desktop_placement_direction" id="sfsi_sticky_bar_desktop_placement_direction">
                                            <option value="up" <?php echo (isset($sfsi_premium_sticky_icons['settings']['desktop_placement_direction']) && $sfsi_premium_sticky_icons['settings']['desktop_placement_direction'] == 'up') ? 'selected="selected"' : ''; ?>>
                                                <?php _e( 'up', 'ultimate-social-media-icons' ); ?>
                                            </option>
                                            <option value="down" <?php echo (isset($sfsi_premium_sticky_icons['settings']['desktop_placement_direction']) && $sfsi_premium_sticky_icons['settings']['desktop_placement_direction'] == 'down') ? 'selected="selected"' : ''; ?>>
                                                <?php _e( 'down', 'ultimate-social-media-icons' ); ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <span style="width: 39%;color:#fff;display: block;float: left;font-size: 17px;font-weight: 400;line-height: 42px;">`</span>
                                    <span class="sfsi_post_icons_size_alignments_element" style="font-size: 16px;width: 54%;line-height: 25px !important;"><?php _e('The sticky bar is always aligned centrally (vertically). If you want to move it higher or lower, please fill the above. ', 'ultimate-social-media-icons' ); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Desktop -->

                    <!-- mobile -->
                    <div class="sfsi_premium_mobile">
                        <div style="display: flex; align-items: center;">
                            <div>
                                <input name="sfsi_sticky_bar_mobile" <?php echo (isset($sfsi_premium_sticky_icons['settings']['mobile']) && $sfsi_premium_sticky_icons['settings']['mobile'] == 'yes') ? 'checked="true"' : ''; ?> id="sfsi_sticky_bar_mobile" type="checkbox" value="yes" class="styled">
                            </div>
                            <div style="margin-left: 16px;">
                                <span class="sfsi_toglepstpgspn">
                                    <?php _e( 'Mobile', 'ultimate-social-media-icons' ); ?>
                                </span>
                            </div>
                        </div>
                        <div style="margin-left: 47px;display: flow-root">
                            <div class="icons_size">
                                <div class="sfsi_post_icons_size_alignments_element" style="width: 100%;">
                                    <span class="last" style="width: 39%;"><?php _e( 'Definition of “Mobile”: Screens smaller than', 'ultimate-social-media-icons' ); ?></span>
                                    <input name="sfsi_sticky_bar_mobile_width" type="text" value="<?php echo (isset($sfsi_premium_sticky_icons['settings']['mobile_width']) && $sfsi_premium_sticky_icons['settings']['mobile_width'] != '') ? esc_attr($sfsi_premium_sticky_icons['settings']['mobile_width']) : 783; ?>" />
                                    <ins><?php _e( 'pixels (width)', 'ultimate-social-media-icons' ); ?></ins>
                                </div>
                            </div>

                            <div class="icons_size">
                                <div class="sfsi_post_icons_size_alignments_element" style="width:100%">
                                    <span class="sfsi_new_alignment_span" style="line-height: 48px;width: 39%;"><?php _e( 'Placement of (horizontal) sticky bar:', 'ultimate-social-media-icons' ); ?></span>
                                    <div class="field">
                                        <select name="sfsi_sticky_bar_mobile_placement" id="sfsi_sticky_bar_mobile_placement">
                                            <option value="top" <?php echo ( isset( $sfsi_premium_sticky_icons['settings']['mobile_placement'] ) && $sfsi_premium_sticky_icons['settings']['mobile_placement'] == 'top' ) ? 'selected="selected"' : ''; ?>>
                                                <?php _e( 'Top', 'ultimate-social-media-icons' ); ?>
                                            </option>
                                            <option value="bottom" <?php echo ( isset( $sfsi_premium_sticky_icons['settings']['mobile_placement'] ) && $sfsi_premium_sticky_icons['settings']['mobile_placement'] == 'bottom' ) ? 'selected="selected"' : ''; ?>>
                                                <?php _e( 'Bottom', 'ultimate-social-media-icons' ); ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End mobile -->
                </div>
            </div>
        </div>
    </div>

</li>
