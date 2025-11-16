<?php 

	$sfsi_show_via_widget = "no";

	if( isset( $option9['sfsi_show_via_widget'] ) && !empty( $option9['sfsi_show_via_widget'] ) ) {
		$sfsi_show_via_widget = $option9['sfsi_show_via_widget'];
	}

	$option9['sfsi_widget_alignment'] = isset( $option9['sfsi_widget_alignment'] ) ? sanitize_text_field( $option9['sfsi_widget_alignment'] ) : 'Horizontal';
	
	$label_style = 'style="display:none;"';
	$checked 	 = '';

	if( $sfsi_show_via_widget == 'yes' ) {
		$label_style = 'style="display:block;"';
		$checked     = 'checked="true"';
	}
?>

<li class="sfsi_show_via_widget_li">
	<div class="radio_section tb_4_ck" onclick="checkforinfoslction_checkbox(this);">
		<input name="sfsi_show_via_widget" <?php echo $checked ;?>  id="sfsi_show_via_widget_li" type="checkbox" value="<?php echo $sfsi_show_via_widget; ?>" class="styled" />
	</div>
	
	<div class="sfsi_right_info">
		<p>
			<span class="sfsi_toglepstpgspn"><?php _e( 'Show them via a widget', 'ultimate-social-media-icons' ); ?></span><br>
		</p>	
		<div class="kckslctn" <?php echo $label_style; ?>>
			<p>
				<label class="sfsiplus_sub-subtitle" style="font-size: 19px;line-height: 45px;">
					<?php _e( 'Go to the widget area and drag & drop it where you want to have it!', 'ultimate-social-media-icons' ); ?>
					<a href="<?php echo admin_url( 'widgets.php' ); ?>">
						<?php _e( 'Click here', 'ultimate-social-media-icons' ); ?>
					</a>
				</label>
			</p>
			<!-- Alignment  section start -->
			<div class="show" style="padding: 10px 0 0 20px;">
				<h4 style="color: #5a6570 !important;font-family: 'helveticaneue-light'; font-size: 19px;"><?php _e( 'Alignments:', 'ultimate-social-media-icons' ); ?></h4>
				<div style="margin-top: 10px;">
					<ul>
						<li style="margin-right: 100px;width:max-content">
							<div class="d-flex flex-row bd-highlight mb-3">
								<div>
								<span  style="line-height: 50px;font-size:large; font-weight:600; color: #5a6570 !important;font-family: 'helveticaneue-light';"><?php _e( 'Show icons', 'ultimate-social-media-icons' ); ?></span>
								</div>
								<div style="margin-left:20px;">
									<select name="sfsi_widget_alignment" style="padding: 15px 25px 15px 15px;">
										<option value="Horizontal" <?php echo ($option9['sfsi_widget_alignment'] == 'Horizontal') ? 'selected="selected"' : '' ;?>><?php _e( 'Horizontally', 'ultimate-social-media-icons' ); ?></option>
										<option value="Vertical" <?php echo ($option9['sfsi_widget_alignment'] == 'Vertical') ? 'selected="selected"' : '' ;?>><?php _e( 'Vertically', 'ultimate-social-media-icons' ); ?></option>
									</select>
								</div> 
							</div>
						</li>
					</ul>
				</div>
			</div>
			<!-- Alignments section End -->

			<!-- Need diff mobile  section start -->
			<div class="sfsi_tab_3_icns" style="padding: 10px 0 0 20px; display: flow-root;">
				<h4 style="color: #5a6570 !important;font-family: 'helveticaneue-light';"><?php _e( 'Need different selection for mobile ?', 'ultimate-social-media-icons' ); ?></h4>
				<ul class="sfsi_make_icons sfsi_plus_mobile_float">
					<li class="sfsi-max-content" style="margin-right: 40px;width:max-content;">
						<div class="d-flex flex-row bd-highlight">
							<div>
								<span class="radio" style="background-position: 0px -41px;"></span>
								<?php /* ?><input checked name="sfsi_float_mobile_selection" type="radio" value="no" checked="true" class="styled"/><?php */ ?>
							</div>
							<div style="margin: 10px 0 0 10px;">
								<label style="font-size: large;color: #5a6570 !important;font-family: 'helveticaneue-light';"><?php _e( 'No', 'ultimate-social-media-icons' ); ?></label>
							</div>
						</div>
					</li>
					<li class="sfsi_show_via_onhover disabled_checkbox sfsi-max-content">
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
			<!-- Need diff mobile  section End-->

			<!-- Need phone desktop  section Start-->
			<div class="sfsi_tab_3_icns" style="padding: 10px 0 0 20px; display: flow-root;">
				<ul class="sfsi_make_icons sfsi_plus_mobile_float" style="display: flex; align-items: center; padding: 15px 0;">
					<li style="margin-right: 40px;width:max-content;padding: 0;">
						<h4 style="color: #5a6570 !important;font-weight: 600;font-family: 'helveticaneue-light';"><?php _e( 'Show on:', 'ultimate-social-media-icons' ); ?></h4>
					</li>
					<li class="sfsi_show_via_onhover disabled_checkbox sfsi-max-content" style="margin-right:40px;">
                        <label class="sfsi_tooltip_premium sfsi_tooltip_premium_small d-flex flex-row align-items-center">
                            <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                                <span class="checkbox" style="background-position:0px -36px!important;"></span>
                            </div>
                            <div class="sfsicnwrp">
                            	<?php
									_e( 'Desktop', 'ultimate-social-media-icons' );
									echo sfsi_premium_tooltip_content( 'sfsi_tooltip_text_premium_small' );
								?>
                            </div>
                        </label>
                    </li>
                    <li class="sfsi_show_via_onhover disabled_checkbox sfsi-max-content">
                        <label class="sfsi_tooltip_premium sfsi_tooltip_premium_small d-flex flex-row align-items-center">
                            <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                                <span class="checkbox" style="background-position:0px -36px!important;"></span>
                            </div>
                            <div class="sfsicnwrp">
                            	<?php
									_e( 'Mobile', 'ultimate-social-media-icons' );
									echo sfsi_premium_tooltip_content( 'sfsi_tooltip_text_premium_small' );
								?>
                            </div>
                        </label>
                    </li>
				</ul>
			</div>
			<!-- Need phone desktop section End-->
		</div>
	</div>
</li>