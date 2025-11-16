<?php

$option9 = maybe_unserialize(get_option('sfsi_section9_options', false));
$analyst_cache = (get_option("analyst_cache"));
$sfsi_willshow_analyst_popup = false;
if (!is_null($analyst_cache) && isset($analyst_cache["plugin_to_install"])) {
	$sfsi_willshow_analyst_popup = true;
}
?>

<div class="tab9">

	<ul class="sfsi_icn_listing8">

		<span id="sfsi_analyst_pop" style="display:none" data-status="<?php echo $sfsi_willshow_analyst_popup ? "yes" : "no"; ?>"></span>

		<p class="clear" style="padding-top: 5px;!important"><?php _e("Please select one or multiple placement options:",'ultimate-social-media-icons') ?> </p>

		<!--**********************  Define the location on the page **************************************-->

		<?php @include(SFSI_DOCROOT . '/views/subviews/que3/sfsi_que3_place_via_float.php'); ?>


		<!--**********************  Show them via a widget section **************************************-->

		<?php @include(SFSI_DOCROOT . '/views/subviews/que3/sfsi_que3_place_via_widget.php'); ?>


		<!--**********************  Place via shortcode *******************************************-->



		<?php @include(SFSI_DOCROOT . '/views/subviews/que3/sfsi_que3_place_via_shortcode.php'); ?>





		<!--**********************  Show them after post****************************************-->

		<?php @include(SFSI_DOCROOT . '/views/subviews/que3/sfsi_que3_place_via_after_posts.php'); ?>

		<!--**********************  Place via Sticky bar ****************************************-->
		
		<?php @include(SFSI_DOCROOT . '/views/subviews/que3/sfsi_que3_place_via_sticky_bar.php'); ?>

		<!--**********************  Show pinterest over image hover  post****************************************-->


		<li class="sfsi_show_via_onhover">
			<div class="radio_section extra_sp">
                <label class="sfsi_tooltip_premium d-flex flex-row align-items-center sfsi-max-content clear">
                    <div class="sfsiicnsdvwrp" style="margin-right: 20px; width: auto;">
                        <span class="checkbox" style="background-position:0px 0px!important;"></span>
                    </div>
                    <div class="sfsicnwrp" style="margin-top: 5px;">
                        <?php
                        	_e( 'Show a Pinterest icon over images on mouse-over', 'ultimate-social-media-icons' );
                        	echo sfsi_premium_tooltip_content( 'tp-checkbox-link' );
                        ?>
                    </div>
                </label>
            </div>
		</li>

		<?php if ( class_exists( 'woocommerce' ) ) { ?>
			<li class="sfsi_show_via_onhover disabled_checkbox">
				<div class="radio_section tb_4_ck">
					<span class="checkbox" style="background-position:0px 0px!important;"></span>
				</div>

				<div class="sfsi_right_info sfsi_Woocommerce_disable">
					<p style="display:block">
						<span class="sfsi_toglepstpgspn" style="display:inline-block;"><?php _e("On your Woocommerce product pages ",'ultimate-social-media-icons') ?></span> - <span><a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=woocomerce_placement&utm_medium=link" target="_blank" style="font-weight:800;color:#777">Premium feature</a></span>
					</p>
				</div>
			</li>
		<?php } ?>
	</ul>

	<div class='row sfsi_include_exclude_wrapper'>
		<h1><?php _e( 'Include or exclude pages where icons should show', 'ultimate-social-media-icons' ); ?></h1>
		<div class="sfsi_plus_include_exclude_div">
			<ul class="sfsi_include_exclude_container sfsi_icn_listing8">
				<li class="sfsi_show_via_onhover disabled_checkbox sfsi-max-content clear">
					<div class="d-flex flex-row bd-highlight">
						<div class="sfsiicnsdvwrp">
							<span class="radio" style="background-position:0px -41px!important;width:42px"></span>
						</div>
						<div style="margin: 5px 0 0 5px;">
						<label style="font-size: large">
							<?php _e( 'No restrictions', 'ultimate-social-media-icons' ); ?>
						</label>
						</div>
					</div>
				</li>
				<li class="sfsi_show_via_onhover disabled_checkbox sfsi-max-content clear">
                    <label class="sfsi_tooltip_premium d-flex flex-row">
                        <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                            <span class="radio" style="background-position:0px 0px;"></span>
                        </div>
                        <div class="sfsicnwrp" style="margin-top: 8px;">
                            <?php 
                            	_e( 'Only show icons on certain pages (Inclusion rules)', 'ultimate-social-media-icons' );
                            	echo sfsi_premium_tooltip_content();
                            ?>
                        </div>
                    </label>
                </li>
                <li class="sfsi_show_via_onhover disabled_checkbox sfsi-max-content clear">
                    <label class="sfsi_tooltip_premium d-flex flex-row">
                        <div class="sfsiicnsdvwrp" style="margin-right: 15px; width: auto;">
                            <span class="radio" style="background-position:0px 0px;"></span>
                        </div>
                        <div class="sfsicnwrp" style="margin-top: 8px;">
                            <?php
                            	_e( 'Show icons on all except the following pages (Exclusion rules)', 'ultimate-social-media-icons' );
                            	echo sfsi_premium_tooltip_content();
                            ?>
                        </div>
                    </label>
                </li>
			</ul>
		</div>
	</div>

	<?php sfsi_ask_for_help(9); ?>

	<!-- SAVE BUTTON SECTION   -->

	<div class="save_button">

		<img src="<?php echo SFSI_PLUGURL ?>images/ajax-loader.gif" class="loader-img" alt='error' />

		<?php $nonce2 = wp_create_nonce("update_step6"); ?>

		<?php $nonce = wp_create_nonce("update_step9"); ?>

		<a href="javascript:;" id="sfsi_save9" title="Save" data-nonce="<?php echo $nonce ?>" data-nonce2="<?php echo $nonce2 ?>"><?php _e("Save",'ultimate-social-media-icons') ?></a>

	</div>

	<!-- END SAVE BUTTON SECTION   -->

	<a class="sfsiColbtn closeSec" href="javascript:;"><?php _e("Collapse area",'ultimate-social-media-icons') ?>

	</a>

	<label class="closeSec"></label>

	<!-- ERROR AND SUCCESS MESSAGE AREA-->

	<p class="red_txt errorMsg" style="display:none"> </p>

	<p class="green_txt sucMsg" style="display:none"> </p>

	<div class="clear"></div>
</div>