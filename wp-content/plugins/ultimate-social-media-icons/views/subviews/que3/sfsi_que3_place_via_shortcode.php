<?php

	$sfsi_show_via_shortcode  = isset($option9['sfsi_show_via_shortcode']) && !empty($option9['sfsi_show_via_shortcode']) ? $option9['sfsi_show_via_shortcode'] : "no";
	$option9['sfsi_shortcode_alignment']  = (isset($option9['sfsi_shortcode_alignment'])) ? sanitize_text_field($option9['sfsi_shortcode_alignment']): 'Horizontal';

	$checked 	 = '';
	$label_style = 'style="display:none;"';

	if ("yes" == $sfsi_show_via_shortcode) {
		$checked 	 = 'checked="true"';
		$label_style = 'style="display:block;"';
	}
?>

	<li class="sfsi_show_via_shortcode">

		<div class="radio_section tb_4_ck" onclick="checkforinfoslction_checkbox(this);">
			<input name="sfsi_show_via_shortcode" <?php echo $checked; ?> type="checkbox" value="<?php echo $sfsi_show_via_shortcode; ?>" class="styled" />
		</div>

		<div class="sfsi_right_info">

			<p>
				<span class="sfsi_toglepstpgspn"><?php _e( 'Place via shortcode', 'ultimate-social-media-icons' ); ?></span><br>

				<div class="kckslctn" <?php echo $label_style; ?>>

					<p><?php _e( 'Please use the shortcode', 'ultimate-social-media-icons' ); ?> <b>[DISPLAY_ULTIMATE_SOCIAL_ICONS]</b><?php _e( ' to place the icons anywhere you want.', 'ultimate-social-media-icons' ); ?></p>

					<p><?php _e( 'Or, place the icons directly into our (theme) codes by using', 'ultimate-social-media-icons' ); ?> <b>&lt;?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?&gt;</b></p>

					<!-- Alignment  section start -->
					<div class="show" style="padding: 10px 0 0 20px;">
						<h4 style="color: #5a6570 !important;font-family: 'helveticaneue-light'; font-size: 19px !important;"><?php _e( 'Alignments:', 'ultimate-social-media-icons' ); ?></h4>
						<div style="margin-top: 10px;">
							<ul>
								<li style="margin-right: 100px;width:max-content">
									<div class="d-flex flex-row bd-highlight">
										<div>
											<span style="line-height: 50px;font-size:large; font-weight: 600;color: #5a6570 !important;font-family: 'helveticaneue-light';"><?php _e( 'Show icons', 'ultimate-social-media-icons' ); ?></span>
										</div>
										<div style="margin-left:20px;">
											<select name="sfsi_shortcode_alignment" style="padding: 15px 25px 15px 15px;">
												<option value="Horizontal" <?php echo ($option9['sfsi_shortcode_alignment'] == 'Horizontal') ? 'selected="selected"' : '' ;?>><?php _e( 'Horizontally', 'ultimate-social-media-icons' ); ?></option>
												<option value="Vertical" <?php echo ($option9['sfsi_shortcode_alignment'] == 'Vertical') ? 'selected="selected"' : '' ;?>><?php _e( 'Vertically', 'ultimate-social-media-icons' ); ?></option>
											</select>
										</div> 
									</div>
								</li>
							</ul>
						</div>
					</div>
					<!-- Alignments section End -->

					<!-- Need diff mobile  section start -->
					<div class="sfsi_tab_3_icns" style="padding-left: 20px;display: flow-root;">
						<h4 style="color: #5a6570 !important;font-family: 'helveticaneue-light';"><?php _e( 'Need different selection for mobile ?', 'ultimate-social-media-icons' ); ?></h4>
						<ul class="sfsi_make_icons sfsi_plus_mobile_float">
							<li>
								<div class="d-flex flex-row bd-highlight">
									<div>
										<span class="radio" style="background-position: 0px -41px;"></span>
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
					<div class="sfsi_tab_3_icns" style="padding: 10px 0 0 20px; display: flow-root;">
						<ul class="sfsi_make_icons sfsi_plus_mobile_float" style="display: flex; align-items: center; padding: 15px 0;">
							<li style="margin-right: 40px;width:max-content;padding: 0;">
								<h4 style="color: #5a6570 !important;font-family: 'helveticaneue-light'; font-weight: 600; padding-top: 0 !important;"><?php _e( 'Show on:', 'ultimate-social-media-icons' ); ?></h4>
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
				</div>
			</p>
		</div>
	</li>
	<li class="sfsi_show_via_onhover">
		<div class="radio_section tb_4_ck" onclick="checkforinfoslction_checkbox(this)" ;>
			<!-- <span class="checkbox" style="background-position:0px 0px!important;width:31px"></span> -->
			<input name="sfsi_show_theme_heade" type="checkbox" value="yes" class="styled" />
		</div>
		<div class="sfsi_right_info">
			<p style="display: inline-flex;">
				<span class="sfsi_toglepstpgspn" style="display:inline-block;float:left;"><?php _e( 'In your theme\'s header', 'ultimate-social-media-icons' ); ?> </span>
			</p>
			<div class="kckslctn" style="display: none;">
				<p>
					<?php _e( 'Placing icons in your theme\'s header can be tricky / technical as CSS & PHP know-how is required (as every theme is different, no "automatic" placement is possible).', 'ultimate-social-media-icons' ); ?>
				</p>
				<p>
					<?php _e( 'You can try via shortcode (see above), however if you don\'t want any hassle, check out our', 'ultimate-social-media-icons' ); ?> <a class="pop-up" href="https://www.ultimatelysocial.com/usm-premium/?withqp=1&utm_source=usmi_settings_page&utm_campaign=top_banner&utm_medium=link"><span style="text-decoration: underline;cursor: pointer;color:#5A6570"><?php _e( 'Premium plugin', 'ultimate-social-media-icons' ); ?></span></a>
					<?php _e( ' where - as part of our service - we can place the icons for you, making theme adjustments
					where needed. This ensures the perfect appearance (on all devices) for your icons.', 'ultimate-social-media-icons' ); ?> <a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=theme_header_placement&utm_medium=link" style="cursor:pointer; color: #1a1d20 !important;border-bottom: 1px solid #12a252;text-decoration: none;font-weight: bold;" target="_blank">
						<b><?php _e( 'Get it now', 'ultimate-social-media-icons' ); ?></b></a>
				</p>
			</div>
		</div>
	</li>