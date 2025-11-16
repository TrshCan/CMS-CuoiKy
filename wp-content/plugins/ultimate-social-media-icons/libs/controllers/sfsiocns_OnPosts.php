<?php
/* add fb like add this end of every post */

function sfsi_social_buttons_below( $content ) {
	global $post;
	$sfsi_section4 = maybe_unserialize(get_option('sfsi_section4_options', false));
	$sfsi_section6 = maybe_unserialize(get_option('sfsi_section6_options', false));
	$sfsi_section9 = maybe_unserialize(get_option('sfsi_section9_options', false));

	/* return for product page */
	if ( class_exists( 'WooCommerce' ) ) {
		if ( is_product() ) {
			return $content;
		}
	}

	if ( ( isset( $sfsi_section9["sfsi_show_via_afterposts"] ) && $sfsi_section9["sfsi_show_via_afterposts"] == "yes" ) && isset( $sfsi_section6["sfsi_display_button_type"] ) && ( $sfsi_section6["sfsi_display_button_type"] == "responsive_button" ) ) {

		if ( is_single() ) {

			/* Remove if hide from Admin panel */
			if( !isset( $sfsi_section9["sfsi_responsive_icons_after_post"] ) ) {
				$content = $content . sfsi_social_responsive_buttons(null, $sfsi_section6);
			}

			if( isset( $sfsi_section9["sfsi_responsive_icons_after_post"] ) && $sfsi_section9["sfsi_responsive_icons_after_post"] == "yes" ) {
				$content = $content . sfsi_social_responsive_buttons(null, $sfsi_section6);
			}

		}

		if ( is_home() ) {

			/* Remove if hide from Admin panel */
			if( isset( $sfsi_section9["sfsi_responsive_icons_after_post_on_taxonomy"] ) && $sfsi_section9["sfsi_responsive_icons_after_post_on_taxonomy"] == "yes" ) {
				$content = $content . sfsi_social_responsive_buttons( null, $sfsi_section6 );
			}

		}

		if ( is_page() ) {
			/* Remove if hide from Admin panel */
			if( isset( $sfsi_section9["sfsi_responsive_icons_after_pages"] ) && $sfsi_section9["sfsi_responsive_icons_after_pages"] == "yes" ) {
				$content = $content . sfsi_social_responsive_buttons( null, $sfsi_section6 );
			}
		}

	} else {
		if ( is_single() ) {
			//checking for standard icons
			if (!isset($sfsi_section6['sfsi_rectsub'])) {
				$sfsi_section6['sfsi_rectsub'] = 'no';
			}
			if (!isset($sfsi_section6['sfsi_rectfb'])) {
				$sfsi_section6['sfsi_rectfb'] = 'yes';
			}
			if (!isset($sfsi_section6['sfsi_rectshr'])) {
				$sfsi_section6['sfsi_rectshr'] = 'yes';
			}
			if (!isset($sfsi_section6['sfsi_recttwtr'])) {
				$sfsi_section6['sfsi_recttwtr'] = 'no';
			}
			if (!isset($sfsi_section6['sfsi_rectpinit'])) {
				$sfsi_section6['sfsi_rectpinit'] = 'no';
			}
			if (!isset($sfsi_section6['sfsi_rectfbshare'])) {
				$sfsi_section6['sfsi_rectfbshare'] = 'no';
			}
			//checking for standard icons
			/* check if option activated in admin or not */
			if ( $sfsi_section9["sfsi_show_via_afterposts"] == "yes" && $sfsi_section6["sfsi_display_button_type"] == "standard_buttons" ) {
				$permalink = add_query_arg( $_GET ? $_GET : array(), get_permalink( $post->ID ) );
				$permalink = esc_url( $permalink );

				$title = get_the_title();
				$sfsiLikeWith = "45px;";
				/* check for counter display */
				if ($sfsi_section4['sfsi_display_counts'] == "yes" && $sfsi_section4['sfsi_original_counts'] == "yes") {
					$show_count = 1;
					$sfsiLikeWith = "125px;";
				} else {
					$show_count = 0;
				}
				$txt = isset( $sfsi_section6['sfsi_textBefor_icons'] ) ? $sfsi_section6['sfsi_textBefor_icons'] : "Please follow and like us:";
				$float = $sfsi_section6['sfsi_icons_alignment'];

				$icons = '';
				if ( $sfsi_section6['sfsi_rectsub'] == 'yes' || $sfsi_section6['sfsi_rectfb'] == 'yes' || $sfsi_section6['sfsi_rectshr'] == 'yes' || $sfsi_section6['sfsi_recttwtr'] == 'yes' || $sfsi_section6['sfsi_rectpinit'] == 'yes' || $sfsi_section6['sfsi_rectfbshare'] == 'yes' ) {

					$option3 = maybe_unserialize( get_option( 'sfsi_section3_options', false ) );
					/* Add mouseOve effect */
					$mouse_hover_effect = '';
					if ( isset( $option3['sfsi_mouseOver'] ) && 'yes' === $option3['sfsi_mouseOver'] ) {
						$mouse_hover_effect .= ' sfsi-mouseOver-effect sfsi-mouseOver-effect-';
						$mouse_hover_effect .= isset( $option3["sfsi_mouseOver_effect"] ) ? $option3["sfsi_mouseOver_effect"] : 'fade_in';
					}
					$icons .= "<div class='sfsi_Sicons sfsi_Sicons_position_".$float. esc_attr( $mouse_hover_effect )."' style='float: $float; vertical-align: middle; text-align:" . $float . "'><div style='margin:0px 8px 0px 0px; line-height: 24px'><span>" . $txt . "</span></div>";

					//adding wrapper div
					$icons .= "<div class='sfsi_socialwpr'>";
					if ($sfsi_section6['sfsi_rectsub'] == 'yes') {

						$icons .= "<div class='sf_subscrbe sf_icon' style='text-align:left;vertical-align: middle;float:left;width:auto'>" . sfsi_Subscribelike($permalink, $show_count) . "</div>";
					}
					if ($sfsi_section6['sfsi_rectfb'] == 'yes') {

						$icons .= "<div class='sf_fb sf_icon' style='text-align:left;vertical-align: middle;'>" . sfsi_FBlike($permalink, $show_count) . "</div>";
					}
					if ($sfsi_section6['sfsi_rectfbshare'] == 'yes') {

						$socialObj = new sfsi_SocialHelper();
						$count_html = "";
						if ($show_count > 0) {
							if ($sfsi_section4['sfsi_facebook_countsDisplay'] == "yes" && $sfsi_section4['sfsi_display_counts'] == "yes") {

								if ($sfsi_section4['sfsi_facebook_countsFrom'] == "manual") {
									$counts = $sfsi_section4['sfsi_facebook_manualCounts'];
								} else if ($sfsi_section4['sfsi_facebook_countsFrom'] == "likes") {
									$counts = $socialObj->sfsi_get_fb($permalink,true);
                                    $counts = isset($counts->share_count) ? $counts->share_count : 0 ;
								} else if ($sfsi_section4['sfsi_facebook_countsFrom'] == "followers") {
									$counts = $socialObj->sfsi_get_fb($permalink, true);
                                    $counts = isset($counts->share_count) ? $counts->share_count : 0;
								} else if ($sfsi_section4['sfsi_facebook_countsFrom'] == "mypage") {
									$current_url = $sfsi_section4['sfsi_facebook_mypageCounts'];
									$counts      = $socialObj->sfsi_get_fb_pagelike(urlencode($current_url));
								}
								$count_html = '<span class="bot_no">' . $counts . '</span>';
							}
						}
						$icons .= "<div class='sf_fb_share sf_icon' style='text-align:left;vertical-align: middle;'>" . sfsiFB_Share_Custom($permalink, $show_count) . $count_html . "</div>";
					}
					if (($sfsi_section6['sfsi_recttwtr'] == "yes")) {
						/* get twitter counts */
						/*if ($show_count ) {
							if ($sfsi_section4['sfsi_twitter_countsFrom'] == "source") {
								$option2	= maybe_unserialize(get_option('sfsi_section2_options', false));

								$twitter_user = $option2['sfsi_twitter_followUserName'];
								$tw_settings = array(
									'tw_consumer_key' => $sfsi_section4['tw_consumer_key'],
									'tw_consumer_secret' => $sfsi_section4['tw_consumer_secret'],
									'tw_oauth_access_token' => $sfsi_section4['tw_oauth_access_token'],
									'tw_oauth_access_token_secret' => $sfsi_section4['tw_oauth_access_token_secret']
								);

								$followers = $socialObj->sfsi_get_tweets($twitter_user, $tw_settings);
								$counts = $socialObj->format_num($followers);
							} else {
								$counts = $socialObj->format_num($sfsi_section4['sfsi_twitter_manualCounts']);

							}
							if($counts>0){
								$count_html = '<span class="bot_no">'.$counts.'</span>';
							}
						}*/
						$icons .= sfsi_twitterlike($permalink, $show_count, true);
						/*$icons .= "<div class='sf_twiter' style='text-align:left;float:left;vertical-align: middle;width:auto'>" . . "</div>";*/
					}

					if ($sfsi_section6['sfsi_rectpinit'] == 'yes') {
						$count_html = "";
						if ($show_count) {
							/* get Pinterest counts */
							if ($sfsi_section4['sfsi_pinterest_countsFrom'] == "pins") {
								$pins = $socialObj->sfsi_get_pinterest( get_permalink() );
								$counts = $socialObj->format_num($pins);
							} else {
								$counts = $sfsi_section4['sfsi_pinterest_manualCounts'];
							}
							if ($counts > 0) {
								$count_html = '<span class="bot_no">' . $counts . '</span>';
							}
						}
						$icons .= "<div class='sf_pinit sf_icon' style='text-align:left;vertical-align: middle;float:left;line-height: 33px;width:auto;margin: 0 -2px;'>" . sfsi_pinterest_Customs($permalink, $show_count) . $count_html . "</div>";
					}
					$icons .= "</div>";
					//closing wrapper div
					$icons .= "</div>";

					if (!is_feed() && !is_home() && !is_page()) {
						$content = $content . $icons;
					}
				}
			}
		}
	}
	return $content;
}

/*subscribe like*/
function sfsi_Subscribelike($permalink, $show_count)
{
	global $socialObj;
	$socialObj = new sfsi_SocialHelper();

	$sfsi_section2_options = maybe_unserialize( get_option( 'sfsi_section2_options', false ) );
	$sfsi_section4_options = maybe_unserialize( get_option( 'sfsi_section4_options', false ) );
	$sfsi_section5_options = maybe_unserialize( get_option( 'sfsi_section5_options', false ) );

	$url = isset( $sfsi_section2_options['sfsi_email_url'] ) ? $sfsi_section2_options['sfsi_email_url'] : 'https://follow.it/now';

	if ( $sfsi_section4_options['sfsi_email_countsFrom'] == "source" ) {
		$feed_id = sanitize_text_field( get_option( 'sfsi_feed_id', false ) );
		$feed_data = $socialObj->SFSI_getFeedSubscriber( $feed_id );
		$counts = $socialObj->format_num( $feed_data );
		if ( empty( $counts ) ) {
			$counts = (string) "0";
		}
	} else {
		$counts = $sfsi_section4_options['sfsi_email_manualCounts'];
	}

	$follow_icons = isset( $sfsi_section5_options['sfsi_follow_icons_language'] ) ? $sfsi_section5_options['sfsi_follow_icons_language'] : 'Follow_en_US';
	$visit_icon = SFSI_PLUGURL . "images/visit_icons/Follow/icon_" . $follow_icons . ".png";

	$icon = '<a href="' . $url . '" target="_blank"><img src="' . $visit_icon . '" alt="error" /></a>';

	if ($show_count) {
		$icon .= '<span class="bot_no">' . $counts . '</span>';
	}

	return $icon;
}
/*subscribe like*/

/*twitter like*/
function sfsi_twitterlike($permalink, $show_count, $rectangular_icon = false)
{
	// $twitter_text = '';
	// if (!empty($permalink)) {
	// 	$postid = url_to_postid($permalink);
	// }
	// if (!empty($postid)) {
	// 	$twitter_text = get_the_title($postid);
	// }
	// $socialObj = new sfsi_SocialHelper();

	// if($show_count>0){
	// 	$count_html = '<span class="bot_no">'.$show_count.'</span>';
	// }

	// $tweet_icon = SFSI_PLUGURL . 'images/share_icons/Twitter_Tweet/en_US_Tweet.svg';
	// $icons = "<div class='sf_twiter' style='display: inline-block;vertical-align: middle;width: auto;'>
	// 				<a href='https://x.com/intent/post?text=" . urlencode($twitter_text).' '.$permalink. "'style='display:inline-block' >
	// 					<img data-pin-nopin= true class='sfsi_premium_wicon' src='" . $tweet_icon . "' alt='Tweet' title='Tweet' >
	// 				</a>
	// 				<span class='bot_no'>".$count_html."</span>
	// 			</div>";
	// 			return $icons;
	global $socialObj;
	$socialObj = new sfsi_SocialHelper();
	$twitter_text = '';
	if (!empty($permalink)) {
		$postid = url_to_postid($permalink);
	}
	if (!empty($postid)) {
		$twitter_text = get_the_title($postid);
	}
	return $socialObj->sfsi_twitterSharewithcount($permalink, $twitter_text, $show_count, $rectangular_icon);
}

/*twitter like*/
/* create pinit button */
// function sfsi_pinterest($permalink, $show_count)
// {
// 	$pinit_html = '<a href="https://www.pinterest.com/pin/create/button/?url=&media=&description=" data-pin-do="buttonPin" data-pin-save="true"';
// 	if ($show_count) {
// 		$pinit_html .= 'data-pin-count="beside"';
// 	} else {
// 		$pinit_html .= 'data-pin-count="none"';
// 	}
// 	$pinit_html .= '></a>';

// 	return $pinit_html;8
// }

function sfsi_pinterest_Customs($permalink = '', $show_count = false)
{
	if ("" === $permalink) {
		$permalink = trailingslashit(get_permalink());
	}

	$description = get_the_title();

	// $pinit_url = 'https://www.pinterest.com/pin/create/button/?url='.$url.'&media='.$media.'&description='.$description;
	// $pinit_url = 'https://www.pinterest.com/pin/create/button/?url='.$url.'&media='..'&description='.;

	/* Check icon language */
	$sfsi_section5 = maybe_unserialize(get_option('sfsi_section5_options', false));
	$icons_language = isset( $option5["sfsi_icons_language"] ) ? $option5["sfsi_icons_language"] : 'en_US';

	if ($icons_language == 'ar') {
		$icons_language = 'ar_AR';
	}
	if ( $icons_language == "ja" ) {
		$icons_language = "ja_JP";
	}
	if ( $icons_language == "el" ) {
		$icons_language = "el_GR";
	}
	if ( $icons_language == "fi" ) {
		$icons_language = "fi_FI";
	}
	if ( $icons_language == "th" ) {
		$icons_language = "th_TH";
	}
	if ( $icons_language == "vi" ) {
		$icons_language = "vi_VN";
	}

	if ( "automatic" == $icons_language ) {
		if (function_exists('icl_object_id') && has_filter('wpml_current_language')) {
			$icons_language = apply_filters('wpml_current_language', NULL);
			if (!empty($icons_language)) {
				$icons_language = sfsi_premium_wordpress_locale_from_locale_code($icons_language);
			}
		} else {
			$icons_language = get_locale();
		}
	}

	$pinit_html = "<a href='#' onclick='sfsi_pinterest_modal_images(event,\"" . $permalink . "\",\"" . $description . "\")' style='display:inline-block;'  > <img class='sfsi_wicon'  data-pin-nopin='true' alt='fb-share-icon' title='Pin Share' src='" . SFSI_PLUGURL . "images/share_icons/Pinterest_Save/".$icons_language."_save.svg" . "' /></a>";
	return $pinit_html;
}

/* create fb like button */
function sfsi_FBlike($permalink, $show_count)
{
	$send = 'false';
	$fb_like_html = '';

	$option6 = maybe_unserialize(get_option('sfsi_section6_options', false));
    /* Check Show count on */
    $className = 'margin-disable-count';
    if ($show_count){
        $className = 'margin-enable-count';
    }
	$fb_like_html .= '<div class="fb-like '. $className .'" data-href="' . $permalink . '"  data-send="' . $send . '" ';

	if ($show_count == 1) {
		$fb_like_html .= 'data-layout="button_count"';
	} else {
		$fb_like_html .= 'data-layout="button"';
	}
	$fb_like_html .= ' ></div>';
	return $fb_like_html;
}

function sfsiFB_Share_Custom($permalink, $show_count = false)
{
	$shareurl = "https://www.facebook.com/sharer/sharer.php?u=";
	$shareurl = $shareurl . $permalink;

	$option5 = maybe_unserialize( get_option( 'sfsi_section5_options', false ) );

    $language = isset( $option5["sfsi_icons_language"] ) ? $option5["sfsi_icons_language"] : 'en_US';

    if ( $language == "ar" ) {
      $language = "ar_Ar";
    }
    if ( $language == "ja" ) {
      $language = "ja_JP";
    }
    if ( $language == "el" ) {
      $language = "el_GR";
    }
    if ( $language == "fi" ) {
      $language = "fi_FI";
    }
    if ( $language == "th" ) {
      $language = "th_TH";
    }
    if ( $language == "vi" ) {
      $language = "vi_VN";
    }

    if ( "automatic" == $language ) {
    	if ( function_exists( 'icl_object_id' ) && has_filter( 'wpml_current_language' ) ) {
        	$language = apply_filters( 'wpml_current_language', NULL );

        	if ( !empty( $language ) ) {
        		$language = sfsi_wordpress_locale_from_locale_code( $language );
        	}
        } else {
      		$language = get_locale();
		}
    }

	$fb_share_html = "<a  ".sfsi_checkNewWindow()." href='" . $shareurl . "' style='display:inline-block;'><img class='sfsi_wicon'  data-pin-nopin='true' alt='fb-share-icon' title='Facebook Share' src='" . SFSI_PLUGURL . "images/share_icons/fb_icons/" . $language . ".svg' /></a>";
	return $fb_share_html;
}

/* add all external javascript to wp_footer */
function sfsi_footer_script() {
    $sfsi_section1 = maybe_unserialize(get_option('sfsi_section1_options', false));
    if (!is_array($sfsi_section1)){
        $sfsi_section1 = [];
    }

    $sfsi_section6 = maybe_unserialize(get_option('sfsi_section6_options', false));
    if (!is_array($sfsi_section6)){
        $sfsi_section6 = [];
    }

    $sfsi_section9 = maybe_unserialize(get_option('sfsi_section9_options', false));
    if (!is_array($sfsi_section9)){
        $sfsi_section9 = [];
    }

    $sfsi_section2 = maybe_unserialize(get_option('sfsi_section2_options', false));
    if (!is_array($sfsi_section2)){
        $sfsi_section2 = [];
    }

	if (!isset($sfsi_section6['sfsi_rectsub'])) {
		$sfsi_section6['sfsi_rectsub'] = 'no';
	}
	if (!isset($sfsi_section6['sfsi_rectfb'])) {
		$sfsi_section6['sfsi_rectfb'] = 'yes';
	}
	if (!isset($sfsi_section6['sfsi_rectshr'])) {
		$sfsi_section6['sfsi_rectshr'] = 'yes';
	}
	if (!isset($sfsi_section6['sfsi_recttwtr'])) {
		$sfsi_section6['sfsi_recttwtr'] = 'no';
	}
	if (!isset($sfsi_section6['sfsi_rectpinit'])) {
		$sfsi_section6['sfsi_rectpinit'] = 'no';
	}
	if (!isset($sfsi_section6['sfsi_rectfbshare'])) {
		$sfsi_section6['sfsi_rectfbshare'] = 'no';
	}

    $sisi_common_options_check = false;
    if (isset($sfsi_section9['sfsi_show_via_widget'], $sfsi_section9['sfsi_icons_float'],$sfsi_section9['sfsi_show_via_shortcode'])){
        $sisi_common_options_check = (($sfsi_section9['sfsi_show_via_widget'] == "yes") || ($sfsi_section9['sfsi_icons_float'] == "yes") && (isset($sfsi_section9['sfsi_icons_floatPosition'])) || ($sfsi_section9['sfsi_show_via_shortcode'] == "yes"));
    }

    $flagIconAfterPost =false;
    if (isset($sfsi_section9['sfsi_show_via_afterposts'])){
        $flagIconAfterPost = $sfsi_section9['sfsi_show_via_afterposts'] === 'yes';
    }

    $flagEnableLikeAndShare =false;
    if (isset($sfsi_section6['sfsi_rectfb'],$sfsi_section6['sfsi_rectfbshare'])){
        $flagEnableLikeAndShare = ($sfsi_section6['sfsi_rectfb'] == "yes" || $sfsi_section6['sfsi_rectfbshare'] == "yes");
    }

    if ($sfsi_section1['sfsi_facebook_display'] == "yes" || ($flagIconAfterPost && $flagEnableLikeAndShare) ) {
        if (isset($sfsi_section6['sfsi_rectfb'])){
            if ((($sfsi_section6['sfsi_rectfb'] == "yes")) || $sisi_common_options_check && ($sfsi_section2['sfsi_facebookLike_option'] == "yes")) {

                $sfsi_section5 = maybe_unserialize(get_option('sfsi_section5_options', false));
                if ( isset( $sfsi_section5['sfsi_icons_language'] ) && !empty( $sfsi_section5['sfsi_icons_language'] ) ) {
                    $icons_language = $sfsi_section5['sfsi_icons_language'];

                    if ($icons_language == 'ar') {
                        $icons_language = 'ar_AR';
                    }
                    if ( $icons_language == "ja" ) {
                        $icons_language = "ja_JP";
                    }
                    if ( $icons_language == "el" ) {
                        $icons_language = "el_GR";
                    }
                    if ( $icons_language == "fi" ) {
                        $icons_language = "fi_FI";
                    }
                    if ( $icons_language == "th" ) {
                        $icons_language = "th_TH";
                    }
                    if ( $icons_language == "vi" ) {
                        $icons_language = "vi_VN";
                    }

                    if ( "automatic" == $icons_language ) {
                        if (function_exists('icl_object_id') && has_filter('wpml_current_language')) {
                            $icons_language = apply_filters('wpml_current_language', NULL);
                            if (!empty($icons_language)) {
                                $icons_language = sfsi_wordpress_locale_from_locale_code_global($icons_language);
                            }
                        } else {
                            $icons_language = get_locale();
                        }
                    }
                } else {
                    $icons_language = "en_US";
                }

                ?>
                <!--facebook like and share js -->
                <div id="fb-root"></div>
                <script>
                    (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "https://connect.facebook.net/<?php echo $icons_language; ?>/sdk.js#xfbml=1&version=v3.2";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>
                <?php
            }
        }
	}

	$isYoutubeFollowFeatureActive = (isset($sfsi_section2['sfsi_youtube_follow']) && "yes" == $sfsi_section2['sfsi_youtube_follow']) && (isset($sfsi_section2['sfsi_youtubeusernameorid']) &&
		!empty($sfsi_section2['sfsi_youtubeusernameorid'])) && (
		("name" == $sfsi_section2['sfsi_youtubeusernameorid'] &&
			isset($sfsi_section2['sfsi_ytube_user']) &&
			!empty($sfsi_section2['sfsi_ytube_user'])) || ("id" == $sfsi_section2['sfsi_youtubeusernameorid'] &&
			isset($sfsi_section2['sfsi_ytube_chnlid']) &&
			!empty($sfsi_section2['sfsi_ytube_chnlid'])));
		
    if(isset($sfsi_section1['sfsi_youtube_display'])){
        if ($sfsi_section1['sfsi_youtube_display'] == "yes" && $sisi_common_options_check && $isYoutubeFollowFeatureActive) {
            ?>
			<script src="https://apis.google.com/js/platform.js"></script>
            <?php
        }
    }

	$isLinkedInFollowFeatureActive = (isset($sfsi_section2['sfsi_linkedin_follow']) && !empty($sfsi_section2['sfsi_linkedin_follow']) && ("yes" == $sfsi_section2['sfsi_linkedin_follow']) && isset($sfsi_section2['sfsi_linkedin_followCompany']) && !empty($sfsi_section2['sfsi_linkedin_followCompany']));

	$isLinkedInRecommnedFeatureActive = (isset($sfsi_section2['sfsi_linkedin_recommendBusines']) && !empty($sfsi_section2['sfsi_linkedin_recommendBusines']) && ("yes" == $sfsi_section2['sfsi_linkedin_recommendBusines'])
		&& isset($sfsi_section2['sfsi_linkedin_recommendProductId']) && !empty($sfsi_section2['sfsi_linkedin_recommendProductId'])
		&& isset($sfsi_section2['sfsi_linkedin_recommendCompany']) && !empty($sfsi_section2['sfsi_linkedin_recommendCompany']));

	if(isset($sfsi_section1['sfsi_linkedin_display'])){
		if ($sfsi_section1['sfsi_linkedin_display'] == "yes" && ($isLinkedInFollowFeatureActive || $isLinkedInRecommnedFeatureActive) && $sisi_common_options_check) {
			?>
			<script src="//platform.linkedin.com/in.js" type="text/javascript">
				lang: en_US
			</script>
			<?php
		}
	}

	/* activate footer credit link */
	if (get_option('sfsi_footer_sec') == "yes") {
		if (!is_admin()) {
			//$footer_link='<div class="sfsiplus_footerLnk" style="margin: 0 auto;z-index:1000; absolute; text-align: center;">Social media & sharing icons powered by  <a href="https://wordpress.org/plugins/ultimate-social-media-icons/" target="new">UltimatelySocial</a> ';

			$sfsi_themecheck = new sfsi_ThemeCheck();
			$domain 	= $sfsi_themecheck->sfsi_plus_getdomain(get_site_url());
			$firstCharacter = substr($domain, 0, 1);
			if (in_array($firstCharacter, array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm'))) {
				$footer_link = '<div class="sfsiplus_footerLnk" style="margin: 0 auto;z-index:1000; text-align: center;">Social media & sharing icons  powered by <a href="https://www.ultimatelysocial.com/?utm_source=usmplus_settings_page&utm_campaign=credit_link_to_homepage&utm_medium=banner" target="new">UltimatelySocial </a>';
				$footer_link .= "</div>";
				echo $footer_link;
			} else if (in_array($firstCharacter, array('n', 'o', 'p', 'q', 'r', 's'))) {
				$footer_link = '<div class="sfsiplus_footerLnk" style="margin: 0 auto;z-index:1000; text-align: center;"><a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=footer_credit_new&utm_medium=banner" target="new">Wordpress Social Share Plugin </a> powered by Ultimatelysocial';
				$footer_link .= "</div>";
				echo $footer_link;
			} else {
				$footer_link = '<div class="sfsiplus_footerLnk" style="margin: 0 auto;z-index:1000;text-align: center;"><a href="https://www.ultimatelysocial.com/?utm_source=usmplus_settings_page&utm_campaign=credit_link_to_homepage&utm_medium=banner" target="new">Social Share Buttons and Icons</a> powered by Ultimatelysocial';
				$footer_link .= "</div>";
				echo $footer_link;
			}
		}
	}
}

/* filter the content of post */
add_filter('the_content', 'sfsi_social_buttons_below');

/* Filter for Home Archive pages */
add_filter( 'the_excerpt', 'sfsi_content_beforeafterblogposts' );
function sfsi_content_beforeafterblogposts( $content ) {

	if ( !is_home() ) {
		return $content;
	}

	$sfsi_section6 = maybe_unserialize( get_option( 'sfsi_section6_options', false ) );
	$sfsi_section9 = maybe_unserialize( get_option( 'sfsi_section9_options', false ) );

	/* Remove if hide from Admin panel */
	if ( isset( $sfsi_section9["sfsi_responsive_icons_after_post_on_taxonomy"] ) && $sfsi_section9["sfsi_responsive_icons_after_post_on_taxonomy"] != "yes" ) {
		return $content;
	}

	$content = $content . sfsi_social_responsive_buttons(null, $sfsi_section6);

	return $content;
}

/* update footer for frontend and admin both */
add_action( 'in_admin_footer', 'sfsi_footer_script' );
add_action( 'wp_footer', 'sfsi_footer_script' );

add_action( 'wp_footer', 'sfsi_check_PopUp' );
add_action( 'wp_footer', 'sfsi_frontFloter' );
add_action( 'wp_footer', 'sfsi_sticky_bar_front' );

/* Frontend Popup for Administrator user */
add_action( 'wp_footer', 'sfsi_forum_notification_popup' );

/* ping to vendor site on updation of new post */

//<---------------------* Responsive icons *----------------->
function sfsi_social_responsive_buttons($content, $option6, $server_side = false)
{
	global $wp;
	$count = 60;

	if (((isset($option6["sfsi_display_button_type"]) && $option6["sfsi_display_button_type"] == "responsive_button")) || $server_side) :
		$option2 = maybe_unserialize(get_option('sfsi_section2_options', false));
		$option3 = maybe_unserialize(get_option('sfsi_section3_options', false));
		$option4 = maybe_unserialize(get_option('sfsi_section4_options', false));
		$icons = "";
		$sfsi_responsive_icons = (isset($option6["sfsi_responsive_icons"]) ? $option6["sfsi_responsive_icons"] : null);
		$current_url = in_the_loop() ? add_query_arg($_GET ? $_GET : array(), get_permalink()) : add_query_arg($wp->query_vars, home_url($wp->request));
		if (is_null($sfsi_responsive_icons)) {
			if ($server_side) {
				$sfsi_responsive_icons = array(
					"default_icons" => array(
						"facebook" => array( "active" => "yes", "text" => "Share on Facebook", "url" => "" ),
						"Twitter" => array( "active" => "yes", "text" => "Post on X", "url" => "" ),
						"Follow" => array( "active" => "yes", "text" => "Follow us", "url" => "" ),
						"Pinterest" => array( "active" => "yes", "text" => "Save", "url" => "" ),
					),
					"custom_icons" => array(),
					"settings" => array(
						"icon_size" => "Medium",
						"icon_width_type" => "Fully responsive",
						"icon_width_size" => 240,
						"edge_type" => "Round",
						"edge_radius" => 5,
						"style" => "Gradient",
						"margin" => 10,
						"text_align" => "Centered",
						"show_count" => "no",
						"counter_color" => "#aaaaaa",
						"counter_bg_color" => "#fff",
						"share_count_text" => "SHARES",
						"margin_above" => 10,
						"margin_below" => 10,

					)
				);
			} else {
				return ""; // dont return anything if options not set;
			}
		}

		$twitter_text = isset($option2['sfsi_twitter_aboutPageText']) && !empty($option2['sfsi_twitter_aboutPageText']) ? $option2['sfsi_twitter_aboutPageText'] : false;

		$icon_width_type = $sfsi_responsive_icons["settings"]["icon_width_type"];
		$margin_above = $sfsi_responsive_icons["settings"]["margin_above"];
		$margin_below = $sfsi_responsive_icons["settings"]["margin_below"];

		$show_count = $sfsi_responsive_icons["settings"]["show_count"];

		$couter_display = "none";
		if ( $option4['sfsi_display_counts'] == 'yes' && $option4['sfsi_responsive_share_count'] == 'yes' && $show_count == 'yes' ) {
			$counter_class = "sfsi_responsive_with_counter_icons";
			$couter_display = "inline-block";
			$counts = sfsi_getCounts(true);
			$count = 0;
			if (isset($counts['email_count'])) {
				$count = (int) ($counts['email_count']) + $count;
			}
			if (isset($counts['fb_count'])) {
				$count = (int) ($counts['fb_count']) + $count;
			}
			if (isset($counts['twitter_count'])) {
				$count = (int) ($counts['twitter_count']) + $count;
			}

		} else {
			$counter_class = "sfsi_responsive_without_counter_icons";
		}

		/* Add mouseOve effect */
		$mouse_hover_effect = '';
		if ( isset( $option3['sfsi_mouseOver'] ) && 'yes' === $option3['sfsi_mouseOver'] && !is_admin() ) {
			$mouse_hover_effect .= ' sfsi-mouseOver-effect sfsi-mouseOver-effect-';
			$mouse_hover_effect .= isset( $option3["sfsi_mouseOver_effect"] ) ? $option3["sfsi_mouseOver_effect"] : 'fade_in';
		}

		$icons .= "<div class='sfsiaftrpstwpr'><div class='sfsi_responsive_icons". esc_attr( $mouse_hover_effect )."' style='display:block;margin-top:" . $margin_above . "px; margin-bottom: " . $margin_below . "px; " . ($icon_width_type == "Fully Responsive" ? "width:100%;display:flex; " : 'width:100%') . "' data-icon-width-type='" . $icon_width_type . "' data-icon-width-size='" . $sfsi_responsive_icons["settings"]['icon_width_size'] . "' data-edge-type='" . $sfsi_responsive_icons["settings"]['edge_type'] . "' data-edge-radius='" . $sfsi_responsive_icons["settings"]['edge_radius'] . "'  >";
		$sfsi_anchor_div_style = "";
		if ($sfsi_responsive_icons["settings"]["edge_type"] === "Round") {
			$sfsi_anchor_div_style .= " border-radius:";
			if ($sfsi_responsive_icons["settings"]["edge_radius"] !== "") {
				$sfsi_anchor_div_style .= $sfsi_responsive_icons["settings"]["edge_radius"] . 'px; ';
			} else {
				$sfsi_anchor_div_style .= '0px; ';
			}
		}

		ob_start();

		if ($couter_display != "none") { ?>
		<div class="sfsi_responsive_icons_count sfsi_<?php echo ($icon_width_type == "Fully responsive" ? 'responsive' : 'fixed'); ?>_count_container sfsi_<?php echo strtolower($sfsi_responsive_icons['settings']['icon_size']); ?>_button" style='display:<?php echo $couter_display; ?>;text-align:center; background-color:<?php echo $sfsi_responsive_icons['settings']['counter_bg_color']; ?>;color:<?php echo $sfsi_responsive_icons['settings']['counter_color']; ?>; <?php echo $sfsi_anchor_div_style; ?>;'>
			<h3 style="color:<?php echo $sfsi_responsive_icons['settings']['counter_color']; ?>;"><?php echo $count; ?></h3>
			<h6 style="color:<?php echo $sfsi_responsive_icons['settings']['counter_color']; ?>;"><?php echo $sfsi_responsive_icons['settings']["share_count_text"]; ?></h6>
		</div>
	<?php }
		$icons .= ob_get_contents();
		ob_end_clean();
		$icons .= "<div class='sfsi_icons_container " . $counter_class . " sfsi_" . strtolower($sfsi_responsive_icons['settings']['icon_size']) . "_button_container sfsi_icons_container_box_" . ($icon_width_type !== "Fixed icon width" ? "fully" : 'fixed') . "_container ' style='" . ($icon_width_type !== "Fixed icon width" ? "width:100%;display:flex" : 'width:auto') . "; text-align:center;' >";
		$socialObj = new sfsi_SocialHelper();
		//styles
		$sfsi_anchor_style = "";
		if ($sfsi_responsive_icons["settings"]["text_align"] == "Centered") {
			$sfsi_anchor_style .= 'text-align:center;';
		}
		if ($sfsi_responsive_icons["settings"]["margin"] !== "") {
			$sfsi_anchor_style .= 'margin-left:' . $sfsi_responsive_icons["settings"]["margin"] . "px; ";
			// $sfsi_anchor_style.='margin-bottom:'.$sfsi_responsive_icons["settings"]["margin"]."px; ";
		}
		//styles

		if ($sfsi_responsive_icons['settings']['icon_width_type'] === "Fixed icon width") {
			$sfsi_anchor_div_style .= 'width:' . $sfsi_responsive_icons['settings']['icon_width_size'] . 'px;';
		} else {
			$sfsi_anchor_style .= " flex-basis:100%;";

			// If the current URL has param 'page=sfsi-options' then set the width to 100% else set it to auto.
			if ( isset( $_GET['page'] ) && 'sfsi-options' === strtolower($_GET['page']) ) {
				$sfsi_anchor_div_style .= 'width:100%;';
			} else {
				$sfsi_anchor_div_style .= 'width:auto;';
			}
		}

		foreach ($sfsi_responsive_icons['default_icons'] as $icon => $icon_config) {

			if ( $icon_config['active'] == 'yes' || is_admin() ) {

				switch ($icon) {
					case "facebook":
						$share_url = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($current_url);
						break;
					case "Twitter":
						$twitter_text = $share_url = "https://x.com/intent/post?text=" . urlencode($twitter_text) . "&url=" . urlencode($current_url);
						break;
					case "Follow":
						$share_url = (isset($option2['sfsi_email_url']))
							? $option2['sfsi_email_url']
							: 'https://follow.it/now';
						break;
					case "Pinterest":
							$share_url = 'https://www.pinterest.com/pin/create/link/?url=' . urlencode($current_url);
						break;
				}
				$icons .= "<a " . sfsi_checkNewWindow() . " href='" . ($icon_config['url'] == "" ? $share_url : $icon_config['url']) . "' style='" . ($icon_config['active'] == 'yes' ? ($sfsi_responsive_icons['settings']['icon_width_type'] === "Fixed icon width" ? 'display:inline-flex' : 'display:block') : 'display:none') . ";" . $sfsi_anchor_style . "' class=" . ($sfsi_responsive_icons['settings']['icon_width_type'] === "Fixed icon width" ? 'sfsi_responsive_fixed_width' : 'sfsi_responsive_fluid') . " >";
					$icons .= "<div class='sfsi_responsive_icon_item_container sfsi_responsive_icon_" . strtolower($icon) . "_container sfsi_" . strtolower($sfsi_responsive_icons['settings']['icon_size']) . "_button " . ($sfsi_responsive_icons['settings']['style'] == "Gradient" ? 'sfsi_responsive_icon_gradient' : '') . (" sfsi_" . (strtolower($sfsi_responsive_icons['settings']['text_align']) == "centered" ? 'centered' : 'left-align') . "_icon") . "' style='" . $sfsi_anchor_div_style . " ' >";
						$icons .= "<img style='max-height: 25px;display:unset;margin:0' class='sfsi_wicon' alt='" . $icon . "' src='" . SFSI_PLUGURL . "images/responsive-icon/" . $icon . ('Follow' === $icon ? '.png' : '.svg') . "'>";
						$icons .= "<span style='color:#fff'>" . ($icon_config["text"]) . "</span>";
					$icons .= "</div>";
				$icons .= "</a>";
			}
		}
		$icons .= "</div></div></div><!--end responsive_icons-->";
		return $icons;
	endif;
}
