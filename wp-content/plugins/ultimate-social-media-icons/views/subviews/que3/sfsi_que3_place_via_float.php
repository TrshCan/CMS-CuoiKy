<?php

$option9['sfsi_icons_float']              = (isset($option9['sfsi_icons_float']))               ? sanitize_text_field($option9['sfsi_icons_float']): 'no';

$option9['sfsi_icons_floatPosition']      = (isset($option9['sfsi_icons_floatPosition']))       ? sanitize_text_field($option9['sfsi_icons_floatPosition']) :'center-right';

$option9['sfsi_icons_floatMargin_top']    = (isset($option9['sfsi_icons_floatMargin_top']))     ? intval($option9['sfsi_icons_floatMargin_top']) : '';

$option9['sfsi_icons_floatMargin_bottom'] = (isset($option9['sfsi_icons_floatMargin_bottom']))  ? intval($option9['sfsi_icons_floatMargin_bottom']) : '';

$option9['sfsi_icons_floatMargin_left']   = (isset($option9['sfsi_icons_floatMargin_left']))    ? intval($option9['sfsi_icons_floatMargin_left']) : '';

$option9['sfsi_icons_floatMargin_right']  = (isset($option9['sfsi_icons_floatMargin_right']))   ? intval($option9['sfsi_icons_floatMargin_right']) : '';

$option9['sfsi_disable_floaticons']       = (isset($option9['sfsi_disable_floaticons']))        ? sanitize_text_field($option9['sfsi_disable_floaticons']): 'no';

$style                                    =  ($option9['sfsi_icons_float'] == "yes")            ? 'display: block;' : "display: none;";

/* */
$option9['sfsi_make_icons']                 = ( isset( $option9['sfsi_make_icons'] ) ) ? sanitize_text_field( $option9['sfsi_make_icons'] ) : 'float';
$option9['sfsi_float_alignment']            = ( isset( $option9['sfsi_float_alignment'] ) ) ? sanitize_text_field( $option9['sfsi_float_alignment'] ) : 'Horizontal';
$option9['sfsi_float_mobile_selection']     = ( isset( $option9['sfsi_float_mobile_selection'] ) ) ? sanitize_text_field( $option9['sfsi_float_mobile_selection'] ) : 'no';

?>
	<li class="sfsiLocationli">
        <div class="radio_section tb_4_ck cstmfltonpgstck" onclick="sfsi_toggleflotpage_que3(this);">
            <input name="sfsi_icons_float" <?php echo ( $option9['sfsi_icons_float'] == 'yes' ) ? 'checked="true"' : ''; ?> type="checkbox" value="yes" class="styled" />
            <p><span class="sfsi_toglepstpgspn"><?php _e( 'Floating over your website\'s pages', 'ultimate-social-media-icons' ); ?></span></p>
        </div>
		<div class="sfsi_right_info" <?php echo 'style="'.$style.'"';?>>
        <p><span style="margin-left: 31px;"><?php _e( 'Define the location:', 'ultimate-social-media-icons' ); ?></span></p>
            <div class="sfsi_tab_3_icns">
                <ul class="sfsi_tab_3_icns flthmonpg">
                    <div class="sfsi_position_divider">
                        <li>
                            <input name="sfsi_icons_floatPosition" <?php echo ( $option9['sfsi_icons_floatPosition'] == 'top-left' ) ? 'checked="true"' : ''; ?> type="radio" value="top-left" class="styled" />
                            <span class="sfsi_flicnsoptn3 sfsioptntl"><?php _e( 'Top left', 'ultimate-social-media-icons' ); ?></span>
                            <label><img src="<?php echo SFSI_PLUGURL;?>images/top_left.png" alt="" /></label>
                        </li>
                        <li>
                            <input name="sfsi_icons_floatPosition" <?php echo ( $option9['sfsi_icons_floatPosition'] == 'center-top' ) ? 'checked="true"' : ''; ?> type="radio" value="center-top" class="styled" />
                            <span class="sfsi_flicnsoptn3 sfsioptncl"><?php _e( 'Center top', 'ultimate-social-media-icons' ); ?></span>
                            <label class="sfsi_float_position_icon_label"><img src="<?php echo SFSI_PLUGURL;?>images/float_position_icon.png" alt="" /></label>
                        </li>
                        <li>
                            <input name="sfsi_icons_floatPosition" <?php echo ( $option9['sfsi_icons_floatPosition'] == 'top-right' ) ? 'checked="true"' : ''; ?> type="radio" value="top-right" class="styled" />
                            <span class="sfsi_flicnsoptn3 sfsioptntr"><?php _e( 'Top right', 'ultimate-social-media-icons' ); ?></span>
                            <label><img src="<?php echo SFSI_PLUGURL;?>images/top_right.png" alt="" /></label>
                        </li>
                    </div>
                    <div class="sfsi_position_divider">
                        <li>
                            <input name="sfsi_icons_floatPosition" <?php echo ( $option9['sfsi_icons_floatPosition'] == 'center-left' ) ? 'checked="true"' : ''; ?> type="radio" value="center-left" class="styled" />
                            <span class="sfsi_flicnsoptn3 sfsioptncl"><?php _e( 'Center left', 'ultimate-social-media-icons' ); ?></span>
                            <label><img src="<?php echo SFSI_PLUGURL;?>images/center_left.png" alt="" /></label>
                        </li>
                        <li></li>
                        <li>
                            <input name="sfsi_icons_floatPosition" <?php echo ( $option9['sfsi_icons_floatPosition'] == 'center-right' ) ? 'checked="true"' : ''; ?> type="radio" value="center-right" class="styled" />
                            <span class="sfsi_flicnsoptn3 sfsioptncr"><?php _e( 'Center right', 'ultimate-social-media-icons' ); ?></span>
                            <label><img src="<?php echo SFSI_PLUGURL;?>images/center_right.png" alt="" /></label>
                        </li>
                    </div>
                    <div class="sfsi_position_divider">
                        <li>
                            <input name="sfsi_icons_floatPosition" <?php echo ( $option9['sfsi_icons_floatPosition'] == 'bottom-left' ) ? 'checked="true"' : ''; ?> type="radio" value="bottom-left" class="styled" />
                            <span class="sfsi_flicnsoptn3 sfsioptnbl"><?php _e( 'Bottom left', 'ultimate-social-media-icons' ); ?></span>
                            <label><img src="<?php echo SFSI_PLUGURL;?>images/bottom_left.png" alt="" /></label>
                        </li>
                        <li>
                            <input name="sfsi_icons_floatPosition" <?php echo ( $option9['sfsi_icons_floatPosition'] == 'center-bottom') ? 'checked="true"' : ''; ?> type="radio" value="center-bottom" class="styled" />
                            <span class="sfsi_flicnsoptn3 sfsioptncr"><?php _e( 'Center bottom', 'ultimate-social-media-icons' ); ?></span>
                            <label class="sfsi_float_position_icon_label sfsi_center_botttom"><img class="sfsi_img_center_bottom" src="<?php echo SFSI_PLUGURL;?>images/float_position_icon.png" alt="" /></label>
                        </li>
                        <li>
                            <input name="sfsi_icons_floatPosition" <?php echo ( $option9['sfsi_icons_floatPosition'] == 'bottom-right' ) ? 'checked="true"' : ''; ?> type="radio" value="bottom-right" class="styled" />
                            <span class="sfsi_flicnsoptn3 sfsioptnbr"><?php _e( 'Bottom right', 'ultimate-social-media-icons' ); ?></span>
                            <label><img src="<?php echo SFSI_PLUGURL;?>images/bottom_right.png" alt="" /></label>
                        </li>
                    </div>
                </ul>

                <div style="width: 88%; float: left; margin:25px 0 0 25px">
                    <h4 style="color: #5a6570 !important;font-family: 'helveticaneue-light';"><?php _e( 'Margin From:', 'ultimate-social-media-icons' ); ?> </h4>

                    <ul class="sfsi_floaticon_margin_sec">
                        <li class="d-flex align-items-center">
                            <label class="mt-0"><?php _e( 'Top:', 'ultimate-social-media-icons' ); ?></label>
                            <input name="sfsi_icons_floatMargin_top" type="text" value="<?php echo ( $option9['sfsi_icons_floatMargin_top'] != '' ) ? esc_attr($option9['sfsi_icons_floatMargin_top']) : ''; ?>" />
                            <ins class="mt-0"><?php _e( 'Pixels', 'ultimate-social-media-icons' ); ?></ins>
                        </li>
                        <li class="d-flex align-items-center">
                            <label class="mt-0"><?php _e( 'Bottom:', 'ultimate-social-media-icons' ); ?></label>
                            <input name="sfsi_icons_floatMargin_bottom" type="text" value="<?php echo ( $option9['sfsi_icons_floatMargin_bottom'] != '' ) ? esc_attr($option9['sfsi_icons_floatMargin_bottom']) : ''; ?>" />
                            <ins class="mt-0"><?php _e( 'Pixels', 'ultimate-social-media-icons' ); ?></ins>
                        </li>
                        <li class="d-flex align-items-center">
                            <label class="mt-0"><?php _e( 'Left:', 'ultimate-social-media-icons' ); ?></label>
                            <input name="sfsi_icons_floatMargin_left" type="text" value="<?php echo ( $option9['sfsi_icons_floatMargin_left'] != '' ) ? esc_attr($option9['sfsi_icons_floatMargin_left']) : ''; ?>" />
                            <ins class="mt-0"><?php _e( 'Pixels', 'ultimate-social-media-icons' ); ?></ins>
                        </li>
                        <li class="d-flex align-items-center">
                            <label class="mt-0"><?php _e( 'Right:', 'ultimate-social-media-icons' ); ?></label>
                            <input name="sfsi_icons_floatMargin_right" type="text" value="<?php echo ( $option9['sfsi_icons_floatMargin_right'] != '' ) ? esc_attr($option9['sfsi_icons_floatMargin_right']) : ''; ?>" />
                            <ins class="mt-0"><?php _e( 'Pixels', 'ultimate-social-media-icons' ); ?></ins>
                        </li>
                    </ul>
                </div>

                <div style="width: 100%; float: left; margin:25px 0 0 25px;">
                    <h4 style="color: #5a6570 !important; font-family: 'helveticaneue-light';">
                        <?php _e( 'Make icons…', 'ultimate-social-media-icons' ); ?>
                    </h4>
                    <ul class="sfsi_make_icons sfsi_premium_makeIcons_container" style="font-family: 'helveticaneue-light';">
                        <li>
                            <input name="sfsi_make_icon" checked="true" type="radio" value="float" class="styled" />
                            <div style="font-size: large;margin: 10px 0 0 15px;display: inline-block; color: #5a6570 !important;font-family: 'helveticaneue-light';"><?php _e( 'Float', 'ultimate-social-media-icons' ); ?></div>
                        </li>
                        <li class="sfsi_show_via_onhover disabled_checkbox">
                            <label class="sfsi_tooltip_premium d-flex flex-row">
                                <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                                    <span class="radio" style="background-position:0px 0px!important;"></span>
                                </div>
                                <div class="sfsicnwrp">
                                    <?php _e( 'Stay at the same place A', 'ultimate-social-media-icons' ); ?><span class="sfsi_premium_logo_icon"></span>
                                    <h5><?php _e( '(not visible if a user scrolls down)', 'ultimate-social-media-icons' ); ?></h5>
                                    <span class="sfsi_tooltip_text_premium"><?php _e( 'Premium feature', 'ultimate-social-media-icons' ); ?> - <a href="https://www.ultimatelysocial.com/usm-premium/" target="_blank" style="color: #fff;"><?php _e( 'learn more', 'ultimate-social-media-icons' ); ?></a></span>
                                </div>
                            </label>
                        </li>
                        <li class="sfsi_show_via_onhover disabled_checkbox">
                            <label class="sfsi_tooltip_premium d-flex flex-row">
                                <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                                    <span class="radio" style="background-position:0px 0px!important;"></span>
                                </div>
                                <div class="sfsicnwrp">
                                    <?php _e( 'Stay at the same place B', 'ultimate-social-media-icons' ); ?><span class="sfsi_premium_logo_icon"></span>
                                    <h5><?php _e( '(still visible if a user scrolls down)', 'ultimate-social-media-icons' ); ?></h5>
                                    <span class="sfsi_tooltip_text_premium"><?php _e( 'Premium feature', 'ultimate-social-media-icons' ); ?> - <a href="https://www.ultimatelysocial.com/usm-premium/" target="_blank" style="color: #fff;"><?php _e( 'learn more', 'ultimate-social-media-icons' ); ?></a></span>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>

                <div class="row sfsi_float_icons_alignment" style="width: 100%; float: left; margin:25px 0 0 25px">
                    <h4 style="padding-top: 0; color: #5a6570 !important;font-family: 'helveticaneue-light';">
                        <?php _e( 'Alignments:', 'ultimate-social-media-icons' ); ?>
                    </h4>
                    <div class="icons_size">
                        <ul class="sfsi_new_alignment_option">
                            <li>
                                <div class="d-flex flex-row bd-highlight mb-3">
                                <span class="sfsi_new_alignment_span" style="line-height: 48px; font-size: large; font-weight: 600; padding-right:20px; color: #5a6570 !important;font-family: 'helveticaneue-light';">
                                    <?php _e( 'Show icons', 'ultimate-social-media-icons' ); ?>
                                </span>
                                <div class="field">
                                     <select name="sfsi_float_alignment" id="sfsi_float_alignment">
                                        <option value="Horizontal" <?php echo ($option9['sfsi_float_alignment']=='Horizontal') ? 'selected="selected"' : '' ;?>>
                                            <?php _e( 'Horizontally', 'ultimate-social-media-icons' ); ?>
                                        </option>
                                        <option value="Vertical" <?php echo ($option9['sfsi_float_alignment']=='Vertical') ? 'selected="selected"' : '' ;?>>
                                            <?php _e( 'Vertically', 'ultimate-social-media-icons' ); ?>
                                        </option>
                                    </select>
                                </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sfsi_premium_sm_margin_form_m" style="width: 88%; float: left; margin:25px 0 0 25px">
                    <h4 style="color: #5a6570 !important;font-family: 'helveticaneue-light';">
                        <?php _e( 'Need different selections for mobile?', 'ultimate-social-media-icons' ); ?>
                    </h4>
                    <ul class="sfsi_make_icons sfsi_plus_mobile_float">
                        <li>
                            <div class="d-flex flex-row bd-highlight">
                                <div>
                                    <span class="radio" style="background-position: 0px -41px;"></span>
                                </div>
                                <div style="margin: 10px 0 0 10px;">
                                    <label style="font-size: large; color: #5a6570 !important;font-family: 'helveticaneue-light';"><?php _e( 'No', 'ultimate-social-media-icons' ); ?></label>
                                </div>
                            </div>
                        </li>
                        <li class="sfsi_show_via_onhover disabled_checkbox">
                            <label class="sfsi_tooltip_premium sfsi_tooltip_premium_small d-flex flex-row">
                                <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                                    <span class="radio" style="background-position:0px 0px!important;"></span>
                                </div>
                                <div class="sfsicnwrp">
                                    <?php
                                        _e( 'Yes', 'ultimate-social-media-icons' );
                                        echo sfsi_premium_tooltip_content( 'sfsi_tooltip_text_premium_small' );
                                    ?>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="sfsi_disable_floatingicons_mobile">
                    <h4><?php _e( 'Want to disable the floating icons on mobile?', 'ultimate-social-media-icons' ); ?></h4>
                    <ul class="sfsi_make_icons sfsi_plus_mobile_float">
                        <li>
                            <div class="d-flex flex-row bd-highlight mb-3">
                                <div>
                                    <input name="sfsi_disable_floaticons" <?php echo ( $option9['sfsi_disable_floaticons'] == 'yes' ) ? 'checked="true"' : ''; ?> type="radio" value="yes" class="styled" />
                                </div>
                                <div style="margin: 10px 0 0 10px;">
                                    <label style="font-size: large;"><?php _e( 'Yes', 'ultimate-social-media-icons' ); ?></label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex flex-row bd-highlight mb-3">
                                <div>
                                    <input name="sfsi_disable_floaticons" <?php echo ( $option9['sfsi_disable_floaticons'] == 'no' ) ? 'checked="true"' : ''; ?> type="radio" value="no" class="styled" />
                                </div>
                                <div style="margin: 10px 0 0 10px;">
                                    <label style="font-size: large;"><?php _e( 'No', 'ultimate-social-media-icons' ); ?></label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
		</div>
	</li>
