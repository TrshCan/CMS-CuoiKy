<?php

/* social helper class include all function which are used to intract with  */

class sfsi_SocialHelper
{
    private $url, $timeout = 10;

    /* get twitter followers */
    function sfsi_get_tweets($username, $tw_settings)
    {
        require_once(SFSI_DOCROOT . '/helpers/twitteroauth/twiiterCount.php');
        return sfsi_twitter_followers();
    }

    /* get linkedIn counts */
    function sfsi_get_linkedin($url)
    {
        $json_string = $this->file_get_contents_curl("https://www.linkedin.com/countserv/count/share?url=" . urlencode($url) . "&format=json");
        $json = json_decode($json_string, true);
        return isset($json['count']) ? intval($json['count']) : 0;
    }

    /* get linkedIn follower */
    function sfsi_getlinkedin_follower($ln_company, $APIsettings)
    {

        require_once(SFSI_DOCROOT . '/helpers/linkedin-api/linkedin-api.php');

        // $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
        // $url=$scheme.'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

        $url = sfsi_get_current_page_url();

        $linkedin = new LinkedIn(
            $APIsettings['ln_api_key'],
            $APIsettings['ln_secret_key'],
            $APIsettings['ln_oAuth_user_token'],
            $url
        );

        $followers = $linkedin->getCompanyFollowersByName($ln_company);

        if (strpos($followers, '404') === false) {
            return strip_tags($followers);
        } else {
            return 0;
        }
    }

    /* get facebook likes */
    // function sfsi_get_fb($url)
    // {
    // 	$count 		 = 0;
    // 	$json_string = $this->file_get_contents_curl('https://graph.facebook.com/?id='.$url);
    // 	$json 		 = json_decode($json_string);

    // 	if(isset($json) && isset($json->share) && isset($json->share->share_count)){
    // 		$count  = $json->share->share_count;
    // 	}
    // 	return $count;
    // }
    function sfsi_get_fb($url, $return_json = false)
    {
        $count = 0;
        $appid = '1400199447602334';
        $appsecret = '0efd3fb7877b13d4b1346b5c47a2620e';

        //get last update
        $lastUpdate = get_option('sfsi_last_update_facebook');
        $countInfo = get_option('sfsi_facebok_url_count_' . $url);
        $option4 = maybe_unserialize(get_option('sfsi_section4_options', false));
        if (!$lastUpdate || !$countInfo ||
            !isset($option4['sfsi_facebook_enableCache']) ||
            ($option4['sfsi_facebook_enableCache'] == 'no')) {

            $json_string = $this->file_get_contents_curl('https://graph.facebook.com/v12.0/?id=' . $url . "&fields=engagement&access_token=" . $appid . '|' . $appsecret, true);
            $json = json_decode($json_string);
            if (isset($json) && isset($json->engagement)) {
                if ($return_json) {
                    $count = $json->engagement;
                    update_option('sfsi_facebok_url_count_json_' . $url, serialize($count));

                } else {
                    $count = $json->engagement->share_count + $json->engagement->reaction_count + $json->engagement->comment_count + $json->engagement->comment_plugin_count;

                    //update option
                    update_option('sfsi_facebok_url_count_' . $url, $count);
                }

                //update date last update
                update_option('sfsi_last_update_facebook', time());
            }

        } else {
            $dif = time() - $lastUpdate;
            if ($dif > 86400) {
                $json_string = $this->file_get_contents_curl('https://graph.facebook.com/v12.0/?id=' . $url . "&fields=engagement&access_token=" . $appid . '|' . $appsecret, true);

                $json = json_decode($json_string);
                if (isset($json) && isset($json->engagement)) {
                    if ($return_json) {
                        $count = $json->engagement;

                        //update option
                        update_option('sfsi_facebok_url_count_json_' . $url, serialize($count));
                    } else {
                        $count = $json->engagement->share_count + $json->engagement->reaction_count + $json->engagement->comment_count + $json->engagement->comment_plugin_count;

                        //update option
                        update_option('sfsi_facebok_url_count_' . $url, $count);
                    }
                    //update date last update
                    update_option('sfsi_last_update_facebook', time());

                }

            } else {
                if ($return_json) {
                    $count = unserialize(get_option('sfsi_facebok_url_count_json_' . $url));
                } else {
                    $count = get_option('sfsi_facebok_url_count_' . $url);
                }
            }
        }

        return $count;
    }

    function sfsi_banner_get_fb($url)
    {
        $count = 0;
        $appid = '1400199447602334';
        $appsecret = '0efd3fb7877b13d4b1346b5c47a2620e';

        //get last update
        $lastUpdate = get_option('sfsi_last_update_facebook');
        $option4 = maybe_unserialize(get_option('sfsi_section4_options', false));
        if (!$lastUpdate || (isset($option4['sfsi_facebook_enableCache']) && $option4['sfsi_facebook_enableCache'] == 'no')) {
            $json_string = $this->file_get_contents_curl('https://graph.facebook.com/v12.0/?id=' . $url . "&fields=engagement&access_token=" . $appid . '|' . $appsecret, true);
            $json = json_decode($json_string);
            if (isset($json) && isset($json->engagement)) {
                $count = $json->engagement->share_count + $json->engagement->reaction_count + $json->engagement->comment_count + $json->engagement->comment_plugin_count;

                //update option
                update_option('sfsi_facebok_url_count_' . $url, $count);

                //update date last update
                update_option('sfsi_last_update_facebook', time());
            }
        } else {
            $dif = time() - $lastUpdate;

            if ($dif > 86400) {
                $json_string = $this->file_get_contents_curl('https://graph.facebook.com/v12.0/?id=' . $url . "&fields=engagement&access_token=" . $appid . '|' . $appsecret, true);
                $json = json_decode($json_string);
                if (isset($json) && isset($json->engagement)) {
                    $count = $json->engagement->share_count + $json->engagement->reaction_count + $json->engagement->comment_count + $json->engagement->comment_plugin_count;

                    //update option
                    update_option('sfsi_facebok_url_count_' . $url, $count);

                    //update date last update
                    update_option('sfsi_last_update_facebook', time());

                }

            } else {
                $count = get_option('sfsi_facebok_url_count_' . $url);
            }
        }

        return $count;
    }

    /* get facebook page likes */
    function sfsi_get_fb_pagelike($url)
    {

        $count = 0;

        $appid = '1158609188420319';
        $appsecret = '191de9759fc4109320cdfc4b46279ff7';
        $lastUpdate = get_option('sfsi_last_update_facebook_page');

        $option4 = maybe_unserialize(get_option('sfsi_section4_options', false));
        if (!$lastUpdate || !isset($option4['sfsi_facebook_enableCache']) || $option4['sfsi_facebook_enableCache'] == 'no') {
            $json_url = 'https://graph.facebook.com/' . $url . '?fields=fan_count&access_token=' . $appid . '|' . $appsecret;
            $json_string = $this->file_get_contents_curl($json_url, true);
            $json = json_decode($json_string, true);

            if (isset($json) && isset($json['fan_count'])) {
                $count = $json['fan_count'];

                //update option
                update_option('sfsi_facebok_url_count_' . $url, $count);

                //update date last update
                update_option('sfsi_last_update_facebook_page', time());

            }
        } else {
            $dif = time() - $lastUpdate;

            if ($dif > 86400) {
                $json_url = 'https://graph.facebook.com/' . $url . '?fields=fan_count&access_token=' . $appid . '|' . $appsecret;
                $json_string = $this->file_get_contents_curl($json_url, true);
                $json = json_decode($json_string, true);

                if (isset($json) && isset($json['fan_count'])) {
                    $count = $json['fan_count'];

                    //update option
                    update_option('sfsi_facebok_url_count_' . $url, $count);

                    //update date last update
                    update_option('sfsi_last_update_facebook_page', time());

                }

            } else {
                $count = get_option('sfsi_facebok_url_count_' . $url);
            }
        }

        return $count;
    }

    /* get youtube subscribers  */
    function sfsi_get_youtube($user)
    {
        $sfsi_section4_options = maybe_unserialize(get_option('sfsi_section4_options', false));

        $user = (isset($sfsi_section4_options['sfsi_youtube_channelId']) && !empty($sfsi_section4_options['sfsi_youtube_channelId'])) ? $sfsi_section4_options['sfsi_youtube_channelId'] : 'UCYQyWnJPrY4XY3Avc7BU9aA';

        $xmlData = $this->file_get_contents_curl('https://www.googleapis.com/youtube/v3/channels?part=statistics&id=' . $user . '&key=' . SFSI_YOUTUBE_API_KEY);

        if ($xmlData) {
            $xmlData = json_decode($xmlData);
            if (
                isset($xmlData->items) &&
                !empty($xmlData->items)
            ) {
                $subs = $xmlData->items[0]->statistics->subscriberCount;
                $subs = $this->format_num($subs);
            } else {
                $subs = 0;
            }
        } else {
            $subs = 0;
        }
        return $subs;
    }

    /**
     * Get pinit counts for a given URL
     *
     * @param string $url The URL to retrieve the pinit count for
     * @return int The number of pinit counts for the given URL
     */
    function sfsi_get_pinterest($url)
    {
        if (is_admin()) {
            return 0;
        }

        $api_url = 'https://api.pinterest.com/v1/urls/count.json?callback=receiveCount&url=' . urlencode($url);

        $response = wp_remote_get($api_url, array(
            'timeout' => 15,
        ));

        if (is_wp_error($response)) {
            return 0;
        }

        $body = wp_remote_retrieve_body($response);

        // Remove the callback function name from the response
        $json_string = preg_replace('/^receiveCount\((.*)\)$/', "\\1", $body);

        $json = json_decode($json_string, true);

        return isset($json['count']) ? intval($json['count']) : 0;
    }

    /* get pinit counts for a user  */
    function get_UsersPins($user_name, $board)
    {
        $query = $user_name . '/' . $board;
        $url_respon = $this->sfsi_get_http_response_code('https://api.pinterest.com/v3/pidgets/boards/' . $query . '/pins/');
        if ($url_respon != 404) {
            $return_data = $this->file_get_contents_curl('https://api.pinterest.com/v3/pidgets/boards/' . $query . '/pins/');
            $json_string = preg_replace('/^receiveCount\((.*)\)$/', "\\1", $return_data);
            $json = json_decode($json_string, true);
        } else {
            $json['data']['user']['pin_count'] = 0;
        }

        return isset($json['data']['user']['pin_count']) ? intval($json['data']['user']['pin_count']) : 0;
    }

    /* send curl request   */
    private function file_get_contents_curl($url, $curl = false)
    {
        $user_Agent = (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';

        // if(_is_curl_installed()){

        // 	$ch = curl_init();
        // 	curl_setopt($ch, CURLOPT_URL, $url);
        // 	curl_setopt($ch, CURLOPT_USERAGENT, $user_Agent);
        // 	curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        // 	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        // 	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        // 	curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        // 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // 	$cont = curl_exec($ch);
        // 	if(curl_error($ch))
        // 	{
        // 		//die(curl_error($ch));
        // 	}
        // 	return $cont;
        // }

        if (_is_curl_installed() && $curl) {
            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_ENCODING => "",
                CURLOPT_USERAGENT => $user_Agent,
                CURLOPT_AUTOREFERER => true,
                CURLOPT_CONNECTTIMEOUT => $this->timeout,
                CURLOPT_TIMEOUT => $this->timeout,
            );

            $ch = curl_init($url);
            curl_setopt_array($ch, $options);

            $content = curl_exec($ch);
            if (curl_errno($ch)) {
                return false;
            } else {
                return $content;
            }
            curl_close($ch);

        } else {
            $cont = wp_remote_get($url, array(
                'timeout' => $this->timeout,
                'redirection' => 0,
                'user-agent' => $user_Agent,
                'blocking' => true,
                'sslverify' => false
            ));
            if (is_array($cont)) {
                return $cont['body'];
            } else {
                return false;
            }
            // else{
            // 	return false;
            // }
        }
    }

    private function get_content_curl($url)
    {
        $user_Agent = (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
        // if(_is_curl_installed()){
        // 	$curl = curl_init();
        // 	curl_setopt($curl, CURLOPT_HEADER, false);
        // 	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // 	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // 	curl_setopt($curl, CURLOPT_HTTPGET, 1);
        // 	curl_setopt($curl, CURLOPT_URL, $url );
        // 	curl_setopt($curl, CURLOPT_DNS_USE_GLOBAL_CACHE, false );
        // 	curl_setopt($curl, CURLOPT_DNS_CACHE_TIMEOUT, 2 );
        // 	$cont = curl_exec($curl);

        // 	if(curl_error($curl))
        // 	{
        // 		//die(curl_error($ch));
        // 	}
        // 	return $cont;
        // }
        // else{
        // 	return false;
        // }
        $cont = wp_remote_get($url, array(
            'timeout' => $this->timeout,
            'redirection' => 0,
            'httpversion' => '1.0',
            'user-agent' => $user_Agent,
            'blocking' => true,
            'sslverify' => false
        ));
        if (is_array($cont)) {
            return $cont['body'];
        } else {
            return false;
        }
    }

    /* convert no. to 2K,3M format   */
    function format_num($num, $precision = 2)
    {
        $num = (float)$num;
        if ($num >= 1000 && $num < 1000000) {
            $n_format = number_format($num / 1000, $precision) . 'k';
        } elseif ($num >= 1000000 && $num < 1000000000) {
            $n_format = number_format($num / 1000000, $precision) . 'm';
        } elseif ($num >= 1000000000) {
            $n_format = number_format($num / 1000000000, $precision) . 'b';
        } else {
            $n_format = $num;
        }
        return $n_format;
    }

    /* convert no. to 2K,3M format */
    function format_num_back($n)
    {
        if (intval($n) != $n) {
            $check = preg_match_all("/(\d+\.?\d+)\s*(\w)/", $n, $matches);
            if ($check) {
                $n = $matches[1][0];
                $suffix = strtolower($matches[2][0]);
                switch ($suffix) {
                    case "k":
                        $n = $n * 1000;
                        break;
                    case "m":
                        $n = $n * 1000000;
                        break;
                    case "b":
                        $n = $n * 1000000000;
                        break;
                    case "t":
                        $n = $n * 1000000000000;
                        break;
                }
            } else {
                $n = intval($n);
            }
        }
        return $n;
    }

    /* create on page facebook links option */
    public function sfsi_FBlike($permalink, $showCount)
    {
        $send = 'false';
        $width = 180;
        $permalink = esc_url($permalink); /*Vulnerability*/

        /*$fb_like_html = '<fb:like href="'.$permalink.'" width="'.$width.'" send="'.$send.'" showfaces="false" ';
        if($show_count) {
                $fb_like_html .= 'layout="button"';
        } else {
                $fb_like_html .= 'layout="button"';
        }
        $fb_like_html .= ' action="like"></fb:like>';*/
        $fb_like_html = '';

        $fb_like_html .= '<div class="fb-like" width="200" data-href="' . $permalink . '"  data-send="' . $send . '" ';

        // Conditionally set the layout attribute based on $showCount
        if ($showCount) {
            $fb_like_html .= 'data-layout="button_count" ';
        } else {
            $fb_like_html .= 'data-layout="button" ';
        }

        $fb_like_html .= 'data-action="like"></div>';
        return $fb_like_html;
    }

    /*twitter like*/
    // function sfsi_twitterlike($permalink, $show_count)
    // {
    // 	$twitter_text = '';
    // 	return sfsi_twitterShare($permalink,$twitter_text);
    // }

    /* create on page facebook share option */
    public function sfsiFB_Share($permalink)
    {
        /*$fb_share_html = '<fb:share-button href="'.$permalink.'" width="140" ';
        $fb_share_html .= 'type="button"';
        $fb_share_html .= '></fb:share-button>';*/
        $fb_share_html = '';
        // $fb_share_html .= '<div class="fb-share-button" data-href="'.$permalink.'" data-layout="button"></div>';
        // return $fb_share_html;
        $shareurl = "https://www.facebook.com/sharer/sharer.php?u=";
        $shareurl = $shareurl . esc_attr($permalink);

        $option5 = maybe_unserialize(get_option('sfsi_section5_options', false));

        $language = isset($option5["sfsi_icons_language"]) ? $option5["sfsi_icons_language"] : 'en_US';

        if ($language == "ar") {
            $language = "ar_Ar";
        }
        if ($language == "ja") {
            $language = "ja_JP";
        }
        if ($language == "el") {
            $language = "el_GR";
        }
        if ($language == "fi") {
            $language = "fi_FI";
        }
        if ($language == "th") {
            $language = "th_TH";
        }
        if ($language == "vi") {
            $language = "vi_VN";
        }

        if ("automatic" == $language) {
            if (function_exists('icl_object_id') && has_filter('wpml_current_language')) {
                $language = apply_filters('wpml_current_language', NULL);

                if (!empty($language)) {
                    $language = sfsi_wordpress_locale_from_locale_code($language);
                }
            } else {
                $language = get_locale();
            }
        }
        $fb_share_html = "<a " . sfsi_checkNewWindow() . " href='" . $shareurl . "' style='display:inline-block;'  > <img class='sfsi_wicon'  data-pin-nopin='true' alt='fb-share-icon' title='Facebook Share' src='" . SFSI_PLUGURL . "images/share_icons/fb_icons/" . $language . ".svg' /></a>";
        return $fb_share_html;
    }

    /* create on page twitter follow option */
    public function sfsi_twitterFollow($tw_username, $icon)
    {
        $twitter_html = '<a target="_blank" href="https://twitter.com/intent/user?screen_name=' . trim($tw_username) . '">
			<img data-pin-nopin= true src="' . $icon . '" class="sfsi_wicon" alt="Follow Me" title="Follow Me" style="opacity: 1;" />
			</a>';

        // $twitter_html = '<a href="https://twitter.com/'.trim($tw_username).'" class="twitter-follow-button"  data-show-count="false" data-show-screen-name="false">Follow </a>';
        return $twitter_html;
    }

    /* create on page twitter share icon */
    public function sfsi_twitterShare($permalink, $tweettext, $icon)
    {
        $permalink = rawurlencode(esc_url(rawurldecode($permalink))); /*Vulnerability*/

        $twitter_html = "<div class='sf_twiter' style='display: inline-block;vertical-align: middle;width: auto;'>
						<a " . sfsi_checkNewWindow() . " href='https://x.com/intent/post?text=" . urlencode($tweettext) . '+' . $permalink . "' style='display:inline-block' >
							<img data-pin-nopin= true class='sfsi_wicon' src='" . $icon . "' alt='Post on X' title='Post on X' >
						</a>
					</div>";
        return $twitter_html;
    }

    /* create on page twitter share icon with count */
    public function sfsi_twitterSharewithcount($permalink, $tweettext, $show_count, $rectangular_icon = false)
    {
        $permalink = rawurlencode(esc_url(rawurldecode($permalink))); /*Vulnerability*/

        $sfsi_section4 = maybe_unserialize(get_option('sfsi_section4_options', false));
        $socialObj = new sfsi_SocialHelper();
        $count_html = "";
        if ($show_count) {
            /* get twitter counts */
            if ($sfsi_section4['sfsi_twitter_countsFrom'] == "source") {
                $option2 = maybe_unserialize(get_option('sfsi_section2_options', false));

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

            if ($counts > 0) {
                $count_html = '<span class="bot_no">' . $counts . '</span>';
            }
        }

        $option5 = maybe_unserialize(get_option('sfsi_section5_options', false));

        $icons_language = isset($option5["sfsi_icons_language"]) ? $option5["sfsi_icons_language"] : 'en_US';

        if ($icons_language == "ar") {
            $icons_language = "ar_Ar";
        }
        if ($icons_language == "ja") {
            $icons_language = "ja_JP";
        }
        if ($icons_language == "el") {
            $icons_language = "el_GR";
        }
        if ($icons_language == "fi") {
            $icons_language = "fi_FI";
        }
        if ($icons_language == "th") {
            $icons_language = "th_TH";
        }
        if ($icons_language == "vi") {
            $icons_language = "vi_VN";
        }

        if ("automatic" == $icons_language) {
            if (function_exists('icl_object_id') && has_filter('wpml_current_language')) {
                $icons_language = apply_filters('wpml_current_language', NULL);

                if (!empty($icons_language)) {
                    $language = sfsi_wordpress_locale_from_locale_code($language);
                }
            } else {
                $icons_language = get_locale();
            }
        }

        $tweet_icon = SFSI_PLUGURL . 'images/share_icons/Twitter_Tweet/' . $icons_language . '_Tweet.svg';

        $twitter_html = "<div class='sf_twiter " . ($rectangular_icon ? 'sf_icon' : '') . "' style='display: inline-block;vertical-align: middle;width: auto;margin-left: 7px;'>
						<a " . sfsi_checkNewWindow() . " href='https://x.com/intent/post?text=" . urlencode($tweettext) . '+' . $permalink . "'style='display:inline-block' >
							<img data-pin-nopin= true class='sfsi_wicon' src='" . $tweet_icon . "' alt='Tweet' title='Tweet' >
						</a>" . $count_html . "
					</div>";
        // $twitter_html = '<a href="http://twitter.com/share" data-count="none" class="sr-twitter-button twitter-share-button" lang="en" data-url="'.$permalink.'" data-text="'.$tweettext.'" ></a>';
        return $twitter_html;
    }

    /* create on page youtube subscribe icon */
    public function sfsi_YouTubeSub($yuser)
    {
        $option2 = maybe_unserialize(get_option('sfsi_section2_options', false));
        $sfsi_ytube_chnlid = empty($option2['sfsi_ytube_chnlid']) ? '' : $option2['sfsi_ytube_chnlid'];
        $sfsi_ytube_user = empty($option2['sfsi_plus_ytube_user']) ? '' : $option2['sfsi_plus_ytube_user'];

        if (empty($sfsi_ytube_user) && empty($sfsi_ytube_chnlid)) {
            return '<div>Set Youtube Channel ID</div>';
        }

        if (!empty($sfsi_ytube_chnlid)) {
            return '<div class="g-ytsubscribe" data-channelid="' . $sfsi_ytube_chnlid . '" data-layout="default" data-count="hidden"></div>';
        }

        return '<div class="g-ytsubscribe" data-channel="' . $sfsi_ytube_user . '" data-layout="default" data-count="hidden"></div>';
    }

    /* create on page pinit button icon */
    public function sfsi_PinIt($url = '', $icon = 0)
    {
        if ("" == $url) {
            $url = trailingslashit(get_permalink());
        }

        $description = get_the_title();

        // $pinit_url = 'https://www.pinterest.com/pin/create/button/?url='.$url.'&media='.$media.'&description='.$description;
        // $pinit_url = 'https://www.pinterest.com/pin/create/button/?url='.$url.'&media='..'&description='.;

        $pinit_html = "<a href='#' onclick='sfsi_pinterest_modal_images(event)' class='sfsi_pinterest_sm_click' style='display:inline-block;'><img class='sfsi_wicon' data-pin-nopin='true' alt='fb-share-icon' title='Pin Share' src='" . $icon . "' /></a>";
        return $pinit_html;
        // $pin_it_html = '<a data-pin-do="buttonPin" data-pin-save="true" href="https://www.pinterest.com/pin/create/button/?url=&media=&description="></a>';
        // return $pin_it_html;
    }

    /* get instragram followers */
    public function sfsi_get_instagramFollowers($user_name)
    {

        $sfsi_instagram_sf_count = maybe_unserialize(get_option('sfsi_instagram_sf_count', false));
        $sfsi_current_date = date("Y-m-d");

        /*if( is_array( $sfsi_instagram_sf_count_option ) ) {
            $sfsi_instagram_sf_count = $sfsi_instagram_sf_count_option;
        } else {
            $sfsi_instagram_sf_count = unserialize( $sfsi_instagram_sf_count_option );
        }

        if( !is_array( $sfsi_instagram_sf_count ) ) {
            $sfsi_instagram_sf_count = strstr( $sfsi_instagram_sf_count, "{" );
            $sfsi_instagram_sf_count = str_replace( $sfsi_instagram_sf_count, "{", '' );
            $sfsi_instagram_sf_count = strstr( $sfsi_instagram_sf_count,'}', true );
        }

        if( !isset( $sfsi_instagram_sf_count["date_instagram"] )|| empty( $sfsi_instagram_sf_count["date_instagram"] ) ) {*/

        $sfsi_instagram_sf_count["date_instagram"] = strtotime($sfsi_current_date);
        $counts = $this->sfsi_get_instagramFollowersCount($user_name);
        $sfsi_instagram_sf_count["sfsi_instagram_count"] = $counts;
        update_option('sfsi_instagram_sf_count', serialize($sfsi_instagram_sf_count));

        /*} else {
            $phpVersion = phpVersion();
            if( $phpVersion >= '5.3' ) {
                $diff = date_diff(
                     date_create(
                        date("Y-m-d", $sfsi_instagram_sf_count["date_instagram"])
                    ),
                    date_create(
                        $sfsi_current_date
                    )
                );
            }

            if( isset( $diff ) && $diff->format("%a") > 1 )	{
                $sfsi_instagram_sf_count["date_instagram"] = strtotime( $sfsi_current_date );
                $counts = $this->sfsi_get_instagramFollowersCount( $user_name );
                $sfsi_instagram_sf_count["sfsi_instagram_count"] = $counts;
                update_option( 'sfsi_instagram_sf_count', serialize( $sfsi_instagram_sf_count ) );
            } else {
                $counts = $sfsi_instagram_sf_count["sfsi_instagram_count"];
            }
        }*/
        return $counts;
    }

    /* get instragram followers Count*/
    public function sfsi_get_instagramFollowersCount($user_name)
    {

        $count = 0;
        if ($user_name) {
            $return_data = $this->get_content_curl('https://www.instagram.com/' . $user_name . '/channel/?__a=1');

            $objData = json_decode($return_data, true);
            if (isset($objData) && isset($objData['graphql']) && isset($objData['graphql']['user']) && isset($objData['graphql']['user']['edge_followed_by']) && isset($objData['graphql']['user']['edge_followed_by']['count'])) {
                $count = $objData['graphql']['user']['edge_followed_by']['count'];
                $count = $this->format_num_back($count);
            }
        }

        /* get instagram user id */
        /*$option4 	= maybe_unserialize(get_option('sfsi_section4_options',false));
        $token 		= $option4['sfsi_instagram_token'];

        if(isset($token) && !empty($token)){
            $return_data = $this->get_content_curl('https://api.instagram.com/v1/users/self/?access_token='.$token);
            $objData 	 = json_decode($return_data);

            if(isset($objData) && $objData->data && $objData->data->counts && $objData->data->counts->followed_by){
                $count 	 = $objData->data->counts->followed_by;
            }
        }*/

        return $this->format_num($count, 0);
    }

    /* create linkedIn  follow button */
    public function sfsi_LinkedInFollow($company_id)
    {
        return $ifollow = '<script type="IN/FollowCompany" data-id="' . $company_id . '" ></script>';
    }

    /* create linkedIn  recommend button */
    public function sfsi_LinkedInRecommend($company_name, $product_id)
    {
        return $ifollow = '<script type="IN/RecommendProduct" data-company="' . $company_name . '" data-product="' . $product_id . '"></script>';
    }

    /* create linkedIn  share button */
    public function sfsi_LinkedInShare($url = '', $icon = 0)
    {
        $url = (isset($url) && '' !== $url) ? $url : home_url();
        return '<a ' . sfsi_checkNewWindow() . ' href="https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode($url) . '"><img class="sfsi_wicon" data-pin-nopin= true alt="Share" title="Share" src="' . $icon . '" /></a>';
        // return  $ifollow='<script type="IN/Share" data-url="'.$url.'"></script>';
    }

    /* get no of subscribers from follow.it for current blog */
    public function SFSI_getFeedSubscriber($feedid)
    {
        $sfsi_instagram_sf_count_option = get_option('sfsi_instagram_sf_count', false);
        if (is_array($sfsi_instagram_sf_count_option)) {
            $sfsi_instagram_sf_count = $sfsi_instagram_sf_count_option;
        } else {
            $sfsi_instagram_sf_count = unserialize($sfsi_instagram_sf_count_option);
        }

        /*if date is empty (for decrease request count)*/
        if (isset($sfsi_instagram_sf_count["date_sf"]) && empty($sfsi_instagram_sf_count["date_sf"])) {
            $sfsi_instagram_sf_count["date_sf"] = strtotime(date("Y-m-d"));
            $counts = $this->SFSI_getFeedSubscriberCount($feedid);
            $sfsi_instagram_sf_count["sfsi_sf_count"] = $counts;
            update_option('sfsi_instagram_sf_count', serialize($sfsi_instagram_sf_count));
        } else {
            $phpVersion = phpVersion();
            if ($phpVersion >= '5.3') {
                $diff = date_diff(
                    date_create(
                        date("Y-m-d", $sfsi_instagram_sf_count["date_sf"])
                    ),
                    date_create(
                        date("Y-m-d")
                    )
                );
            }
            if ((isset($diff) && $diff->format("%a") >= 1) || $sfsi_instagram_sf_count["sfsi_sf_count"] == "") {
                $sfsi_instagram_sf_count["date_sf"] = strtotime(date("Y-m-d"));
                $counts = $this->SFSI_getFeedSubscriberCount($feedid);
                $sfsi_instagram_sf_count["sfsi_sf_count"] = $counts;
                update_option('sfsi_instagram_sf_count', serialize($sfsi_instagram_sf_count));
            } else {
                $counts = $sfsi_instagram_sf_count["sfsi_sf_count"];
            }
        }

        if (empty($counts) || $counts == "O") {
            $counts = 0;
        }

        return $counts;
    }

    /* get no of subscribers from follow.it for current blog count */
    public function SFSI_getFeedSubscriberCount($feedid)
    {

        /* Return if feed_id not set */
        if (empty($feedid)) {
            return;
        }

        $postto_array = array(
            'feed_id' => $feedid,
            'v' => 'newplugincount'
        );

        $args = array(
            'body' => $postto_array,
            'blocking' => true,
            'timeout' => 30,
            'user-agent' => 'sf rss request',
            'header' => array("Content-Type" => "application/x-www-form-urlencoded"),
            'sslverify' => false
        );

        try {
            $resp = wp_remote_post('https://api.follow.it/wordpress/wpCountSubscriber', $args);
        } catch (\Exception $e) {
            // var_dump($e);
        }
        $httpcode = wp_remote_retrieve_response_code($resp);

        if ($httpcode == 200) {

            if (!empty($resp["body"])) {
                $resp = json_decode($resp["body"]);
                $feeddata = stripslashes_deep($resp->subscriber_count);
            } else {
                $sfsi_premium_instagram_sf_count = maybe_unserialize(get_option('sfsi_instagram_sf_count', false));
                $feeddata = $sfsi_premium_instagram_sf_count["sfsi_sf_count"];
            }
        } else {
            $sfsi_premium_instagram_sf_count = maybe_unserialize(get_option('sfsi_instagram_sf_count', false));
            $feeddata = $sfsi_premium_instagram_sf_count["sfsi_sf_count"];
        }
        return $this->format_num($feeddata);
        exit;
    }

    /* check response from a url */
    private function sfsi_get_http_response_code($url)
    {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    public function SFSI_getFeedSubscriberFetch($feedid)
    {

        $sfsi_instagram_sf_count = maybe_unserialize(get_option('sfsi_instagram_sf_count', false));

        /*if date is empty (for decrease request count)*/


        // if(empty($sfsi_instagram_sf_count["date_sf"]))
        // {
        $sfsi_instagram_sf_count["date_instagram"] = strtotime(date("Y-m-d"));
        $counts = $this->sfsi_getFeedSubscriberCount($feedid);
        $sfsi_instagram_sf_count["sfsi_instagram_count"] = $counts;

        update_option('sfsi_instagram_sf_count', serialize($sfsi_instagram_sf_count));
        // }
        // else
        // {
        // $phpVersion = phpVersion();
        // if($phpVersion >= '5.3')
        // {
        // $diff = date_diff(
        // date_create(
        // date("Y-m-d", $sfsi_instagram_sf_count["date_sf"])
        // ),
        // date_create(
        // date("Y-m-d")
        // ));
        // }
        // var_dump($sfsi_instagram_sf_count,isset($diff),$sfsi_instagram_sf_count["date_sf"],date("Y-m-d", $sfsi_instagram_sf_count["date_sf"]),date('Y-m-d'),$diff , $diff->format("%a"));die();
        // if((isset($diff) && $diff->format("%a") >= 1)||$sfsi_instagram_sf_count["sfsi_plus_sf_count"]=="")
        // {
        // 	$sfsi_instagram_sf_count["date_sf"] = strtotime(date("Y-m-d"));
        // 	$counts = $this->sfsi_plus_getFeedSubscriberCount($feedid);
        // 	$sfsi_instagram_sf_count["sfsi_plus_sf_count"] = $counts;
        // 	update_option('sfsi_instagram_sf_count',  serialize($sfsi_instagram_sf_count));
        // }
        // else
        // {
        // $counts = $sfsi_instagram_sf_count["sfsi_plus_sf_count"];
        // }

        // }

        if (empty($counts) || $counts == "O") {
            $counts = 0;
        }

        return $counts;
    }


    /*
      This function returns 0 if post id not found
    */
    public function sfsi_get_the_ID()
    {

        $post_id = false;

        try {
            if (in_the_loop()) {
                $post_id = (get_the_ID()) ? get_the_ID() : sfsi_premium_url_to_postid(urldecode(sfsi_plus_current_url()));
            } else {
                /** @var $wp_query wp_query */
                global $wp_query;

                if (isset($wp_query) && !empty($wp_query) && is_object($wp_query)) {

                    $post_id = $wp_query->get_queried_object_id();
                }
            }
        } //catch exception
        catch (Exception $e) {
            return false;
        }
        return $post_id;
    }

    public function sfsi_get_the_title()
    {

        $title = get_bloginfo('name');
        $title = (isset($title) && strlen($title) > 0) ? $title : get_bloginfo('url');
        $post_id = $this->sfsi_get_the_ID();

        if ($post_id) {
            $post_title = (is_archive()) ? get_queried_object()->name : get_the_title($post_id);
            $title = (isset($post_title) && strlen(trim($post_title)) > 0) ? $post_title : $title;
        }

        return wp_kses_post($title);
    }

}
/* end of class */
