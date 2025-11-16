<?php
if(!function_exists('sfsi_get_displayed_std_desktop_icons')){

    function sfsi_get_displayed_std_desktop_icons($option1=false){

        $option1 =  false !== $option1 && is_array($option1) ? $option1 : maybe_unserialize(get_option('sfsi_section1_options',false));

        $arrDisplay = array();

        if(false !== $option1 && is_array($option1) ){

            foreach ($option1 as $key => $value) {

                if(strpos($key, '_display') !== false){

                    $arrDisplay[$key] = isset($option1[$key]) ? sanitize_text_field($option1[$key]) : '';

                }       
            }
        }
        
        return $arrDisplay;

    }
}

if(!function_exists('sfsi_get_displayed_custom_desktop_icons')){

    function sfsi_get_displayed_custom_desktop_icons($option1=false){
        
        $option1 = false != $option1 && is_array($option1) ? $option1 : maybe_unserialize(get_option('sfsi_section1_options',false));

        $arrDisplay = array();

        if(!empty($option1) && is_array($option1) && isset($option1['sfsi_custom_files']) 
            && !empty($option1['sfsi_custom_files']) ) :
            
            $arrdbDisplay = unserialize($option1['sfsi_custom_files']);
            
            if(is_array($arrdbDisplay)):

                $arrDisplay = $arrdbDisplay;

            endif;

        endif;

        return $arrDisplay;
    }

}

if(!function_exists('sfsi_icon_get_icon_image')){
    function sfsi_icon_get_icon_image($icon_name,$iconImgName=false){

        $icon = false;

        $option3 = maybe_unserialize(get_option('sfsi_section3_options',false));

        if(isset($option3['sfsi_actvite_theme']) && !empty($option3['sfsi_actvite_theme'])){

            $active_theme = $option3['sfsi_actvite_theme'];

            $icons_baseUrl  = SFSI_PLUGURL."images/icons_theme/".$active_theme."/";
            $visit_iconsUrl = SFSI_PLUGURL."images/visit_icons/";  

            if(isset($icon_name) && !empty($icon_name)):

                if($active_theme == 'custom_support')
                {
                    switch (strtolower($icon_name)) {

                        case 'facebook':
                            $custom_icon_name = "fb";
                            break;

                        case 'pinterest':
                            $custom_icon_name = "pintrest";
                            break;
                        
                        default:
                            $custom_icon_name = $icon_name;
                            break;
                    }

                    $key = $custom_icon_name."_skin"; 

                    $skin = get_option($key,false);

                    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";

                    if($skin)
                    {
                        $skin_url = parse_url($skin);
                        if($skin_url['scheme']==='http' && $scheme==='https'){
                            $icon = str_replace('http','https',$skin);
                        }else if($skin_url['scheme']==='https' && $scheme==='http'){
                            $icon = str_replace('https','http',$skin);
                        }else{
                            $icon = $skin;
                        }
                    }
                    else
                    {
                        $active_theme = 'default';
                        $icons_baseUrl = SFSI_PLUGURL."images/icons_theme/default/";

                        $iconImgName = false != $iconImgName ? $iconImgName: $icon_name; 
                        $icon = $icons_baseUrl.$active_theme."_".$iconImgName.".png";
                    }
                }
                else
                {
                    $iconImgName = false != $iconImgName ? $iconImgName: $icon_name;

                    /* Replace PNG to GIF for Animated style */
                    if( $active_theme == 'animated_icons' ) {
                        $icon = $icons_baseUrl.$active_theme."_".$iconImgName.".gif";
                    } else {
                        $icon = $icons_baseUrl.$active_theme."_".$iconImgName.".png";
                    }
                }

            endif;      

        }

        return $icon;
    }
}

if(!function_exists('sfsi_icon_generate_other_icon_effect_admin_html')){

    function sfsi_icon_generate_other_icon_effect_admin_html($iconName,$arrActiveDesktopIcons,$customIconIndex=-1,$customIconImgUrl=null,$customIconSrNo=null){ 

        $iconImgVal         = false;
        $activeIconImgUrl   = false;
     
        $classForRevertLink = 'hide';
        $defaultIconImgUrl  = false;

        $displayIconClass   = "hide";

        $arruploadDir   = wp_upload_dir();
        $sfsi_flat_icon_color = '';
        $sfsi_flat_theme_flag = false;
        $option3 = maybe_unserialize( get_option( 'sfsi_section3_options', false ) );
        $active_theme = ( isset( $option3['sfsi_actvite_theme'] ) && !empty( $option3['sfsi_actvite_theme'] ) ) ? $option3['sfsi_actvite_theme'] : '' ;

        if( isset($iconName) && !empty($iconName)){ 

            if("custom" == $iconName && $customIconIndex >-1){

                if(null !== $customIconImgUrl){

                    $activeIconImgUrl  = $customIconImgUrl;                
                    $defaultIconImgUrl = $customIconImgUrl;

                    // Check if icon is selected under Question 1
                    if(in_array($customIconImgUrl, $arrActiveDesktopIcons)){
                        $displayIconClass = "show";
                    }

                    $iconNameStr = $iconName.$customIconSrNo;

                }

            }else{

                $dbKey = "sfsi_".$iconName."_display";

                if(isset($arrActiveDesktopIcons[$dbKey]) && !empty($arrActiveDesktopIcons[$dbKey]) 
                    && "yes" == $arrActiveDesktopIcons[$dbKey]){
                    $displayIconClass = "show";
                }

                $activeIconImgUrl   = sfsi_icon_get_icon_image($iconName); 

                $iconNameStr = $iconName;

                /* Flat icon */
                
                if( $active_theme == 'flat' ) {
                    $sfsi_flat_theme_flag = true;
                    $sfsi_flat_icon_color = sfsi_flat_icon_color( $iconName, $option3 );
                }
            }
            if(false != $iconImgVal && !filter_var($iconImgVal, FILTER_VALIDATE_URL)){

                $iconImgVal = SFSI_UPLOAD_DIR_BASEURL.$iconImgVal;
            } 

            $attrCustomIconSrNo  = null !== $customIconSrNo ? 'data-customiconsrno="'.$customIconSrNo.'"': null;
            $attrCustomIconIndex = -1 != $customIconIndex ? 'data-customiconindex="'.$customIconIndex.'"': null;

            $attrIconName = 'data-iconname="'.$iconName.'"';

            ?>
            <div <?php echo $attrCustomIconIndex;?><?php echo $attrIconName; ?> class="col-md-3 bottommargin20 <?php echo $displayIconClass.' '.$active_theme; ?>">

                <label <?php echo $attrCustomIconSrNo; ?> class="mouseover_other_icon_label"><?php if ($iconNameStr == 'twitter') echo 'X (Twitter)'; else echo  ucfirst($iconNameStr); ?> </label>

                <?php if ( $sfsi_flat_theme_flag ) { ?>
                    <span class="sfsi_icon_img_wrapper mouseover_sfsi_<?php echo esc_attr( $iconName ); ?>_bgColor" <?php echo esc_html( $sfsi_flat_icon_color ); ?>>
                        <img data-defaultImg="<?php echo $defaultIconImgUrl; ?>" class="mouseover_other_icon_img" src="<?php echo $activeIconImgUrl; ?>" alt="" />
                    </span>
                <?php } else { ?>
                    <img data-defaultImg="<?php echo $defaultIconImgUrl; ?>" class="mouseover_other_icon_img" src="<?php echo $activeIconImgUrl; ?>" alt="" />
                <?php } ?>

                <input <?php echo $attrCustomIconIndex; ?><?php echo $attrIconName; ?> type="hidden" value="<?php echo $iconImgVal; ?>" name="mouseover_other_icon_<?php echo $iconName; ?>">

                <a <?php echo $attrCustomIconIndex; ?><?php echo $attrIconName; ?> id="btn_mouseover_other_icon_<?php echo $iconName; ?>" class="mouseover_other_icon_change_link mouseover_other_icon" href="javascript:void(0)" >Change</a>

                <a <?php echo $attrCustomIconIndex; ?><?php echo $attrIconName; ?> class="<?php echo $classForRevertLink; ?> mouseover_other_icon_revert_link mouseover_other_icon" href="javascript:void(0)">Revert</a>

            </div>

            <?php 
        
        }

    } 
}

function sfsi_flat_icon_color( $iconName, $option3 ) {

    $sfsi_icon_bgColor = $sfsi_icon_bgColor_style = '';
    if ( $iconName ) {

        switch ( $iconName ) {
            case "rss":
                if ( isset( $option3['sfsi_rss_bgColor'] ) && $option3['sfsi_rss_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_rss_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#f2721f';
                }
            break;

            case "email":
                if ( isset( $option3['sfsi_email_bgColor'] ) && $option3['sfsi_email_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_email_bgColor'];
                } else {
                    $option2 = maybe_unserialize( get_option( 'sfsi_section2_options', false ) );
                    if ($option2['sfsi_rss_icons'] == "sfsi") {
                        $sfsi_icon_bgColor = '#05B04E';
                    } elseif ($option2['sfsi_rss_icons'] == "email") {
                        $sfsi_icon_bgColor = '#343D44';
                    } else {
                        $sfsi_icon_bgColor = '#16CB30';
                    }
                }
            break;

            case "facebook":
                if ( isset( $option3['sfsi_facebook_bgColor'] ) && $option3['sfsi_facebook_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_facebook_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#336699';
                }
            break;

            case "twitter":
                if ( isset( $option3['sfsi_twitter_bgColor'] ) && $option3['sfsi_twitter_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_twitter_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#000000';
                }
            break;

            case "youtube":
                if ( isset( $option3['sfsi_youtube_bgColor'] ) && $option3['sfsi_youtube_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_youtube_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#c33';
                }
            break;

            case "pinterest":
                if ( isset( $option3['sfsi_pinterest_bgColor'] ) && $option3['sfsi_pinterest_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_pinterest_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#CC3333';
                }
            break;

            case "linkedin":
                if ( isset( $option3['sfsi_linkedin_bgColor'] ) && $option3['sfsi_linkedin_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_linkedin_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#0877B5';
                }
            break;

            case "instagram":
                if ( isset( $option3['sfsi_instagram_bgColor'] ) && $option3['sfsi_instagram_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_instagram_bgColor'];
                } else {
                    $sfsi_icon_bgColor = 'radial-gradient(circle farthest-corner at 35% 90%, #fec564, rgba(0, 0, 0, 0) 50%), radial-gradient(circle farthest-corner at 0 140%, #fec564, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, rgba(0, 0, 0, 0) 50%), radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, rgba(0, 0, 0, 0)), linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%)';
                }
            break;

            case "ria":
                if ( isset( $option3['sfsi_ria_bgColor'] ) && $option3['sfsi_ria_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_ria_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#10A9A0';
                }
                break;

            case "inha":
                if ( isset( $option3['sfsi_inha_bgColor'] ) && $option3['sfsi_inha_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_inha_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#348cbc';
                }
                break;

            case "snapchat":
                if ( isset( $option3['sfsi_snapchat_bgColor'] ) && $option3['sfsi_snapchat_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_snapchat_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#EDEC1F';
                }
            break;

            case "whatsapp":
                if ( isset( $option3['sfsi_whatsapp_bgColor'] ) && $option3['sfsi_whatsapp_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_whatsapp_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#3ED946';
                }
            break;

            case "reddit":
                if ( isset( $option3['sfsi_reddit_bgColor'] ) && $option3['sfsi_reddit_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_reddit_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#FF642C';
                }
            break;

            case "fbmessenger":
                if ( isset( $option3['sfsi_fbmessenger_bgColor'] ) && $option3['sfsi_fbmessenger_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_fbmessenger_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#447BBF';
                }
            break;

            case "ok":
                if ( isset( $option3['sfsi_ok_bgColor'] ) && $option3['sfsi_ok_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_ok_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#F58220';
                }
            break;

            case "telegram":
                if ( isset( $option3['sfsi_telegram_bgColor'] ) && $option3['sfsi_telegram_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_telegram_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#33A1D1';
                }
            break;

            case "vk":
                if ( isset( $option3['sfsi_vk_bgColor'] ) && $option3['sfsi_vk_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_vk_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#4E77A2';
                }
            break;

            case "weibo":
                if ( isset( $option3['sfsi_weibo_bgColor'] ) && $option3['sfsi_weibo_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_weibo_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#E6162D';
                }
            break;

            case "wechat":
                if ( isset( $option3['sfsi_wechat_bgColor'] ) && $option3['sfsi_wechat_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_wechat_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#4BAD33';
                }
            break;

            case "copylink":
                if ( isset( $option3['sfsi_copylink_bgColor'] ) && $option3['sfsi_copylink_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_copylink_bgColor'];
                } else {
                    $sfsi_icon_bgColor = 'linear-gradient(180deg, #C295FF 0%, #4273F7 100%)';
                }
            break;

            case "mastodon":
                if ( isset( $option3['sfsi_mastodon_bgColor'] ) && $option3['sfsi_mastodon_bgColor'] != '' ) {
                    $sfsi_icon_bgColor = $option3['sfsi_mastodon_bgColor'];
                } else {
                    $sfsi_icon_bgColor = '#583ED1';
                }
            break;
        }

        if ( $sfsi_icon_bgColor ) {
            $sfsi_icon_bgColor_style = "style=background:" . $sfsi_icon_bgColor . ";";
        }
    }

    return $sfsi_icon_bgColor_style;
}