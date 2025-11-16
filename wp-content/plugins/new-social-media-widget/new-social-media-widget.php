<?php
/**
@package Social Media Widget
Plugin Name: New Social Media Widget
Plugin URI:  http://awplife.com/
Description: The Social Media Widget is a simple sidebar widget that allows users to input their social media website profile URLs and other subscription options to show an icon on the sidebar to that social media site and more that open up in a separate browser window.
Version:     1.2.9
Author:      A WP Life
Text Domain: new-social-media-widget
Author URI:  http://awplife.com/
Domain Path: /languages
License:     GPL2

Social Media is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Social Media is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Social Media. If not, see https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html.
 */


// Load text domain
add_action( 'plugins_loaded', 'NSMW_load_textdomain' );
function NSMW_load_textdomain() {
	load_plugin_textdomain( 'new-social-media-widget', false, basename( dirname( __FILE__ ) ) . '/languages' );
}

if ( ! class_exists( 'New_Social_Media' ) ) {
	class New_Social_Media extends WP_Widget {

		/**
		 * Sets up the widgets name
		 */
		public function __construct() {
			define( 'NSMW_TXTDM', 'new-social-media-widget' );

			$sm_widget_ops = array(
				'classname'   => 'new_social_media_widget',
				'description' => 'Display Social Media Profiles',
			);
			parent::__construct( 'new_social_media_widget', __( 'Social Media Widget', 'new-social-media-widget' ), $sm_widget_ops );

		}

		/**
		 * Widget Output
		 */
		public function widget( $args, $instance ) {
			// load css
			wp_enqueue_style( 'nsmw-font-awesome-all-css', plugin_dir_url( __FILE__ ) . 'css/all.css' );
			wp_enqueue_style( 'nsmw-bootstrap-css', plugin_dir_url( __FILE__ ) . 'css/output-bootstrap.css' );
			wp_enqueue_style( 'nsmw-hover-min-css', plugin_dir_url( __FILE__ ) . 'css/hover-min.css' );

			// load save settings
			$nsmw_widget_id = ! empty( $instance['nsmw_widget_id'] ) ? $instance['nsmw_widget_id'] : '';
			$title          = ! empty( $instance['title'] ) ? $instance['title'] : '';
			$facebook       = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '';
			$twitter        = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
			$linkedin       = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '';
			$instagram      = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '';
			$pinterest      = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : '';
			$flickr         = ! empty( $instance['flickr'] ) ? $instance['flickr'] : '';
			$tumblr         = ! empty( $instance['tumblr'] ) ? $instance['tumblr'] : '';
			$vimeo          = ! empty( $instance['vimeo'] ) ? $instance['vimeo'] : '';
			$youtube        = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '';
			$rss            = ! empty( $instance['rss'] ) ? $instance['rss'] : '';
			$email          = ! empty( $instance['email'] ) ? $instance['email'] : '';
			$whatsapp       = ! empty( $instance['whatsapp'] ) ? $instance['whatsapp'] : '';

			$columns       = ! empty( $instance['columns'] ) ? $instance['columns'] : 'col-md-4 col-sm-4 col-xs-4';
			$icon_size     = ! empty( $instance['icon_size'] ) ? $instance['icon_size'] : '2';
			$padding       = ! empty( $instance['padding'] ) ? $instance['padding'] : '0';
			$background    = ! empty( $instance['background'] ) ? $instance['background'] : '';
			$div_bg_color  = ! empty( $instance['div_bg_color'] ) ? $instance['div_bg_color'] : '';
			$icon_color    = ! empty( $instance['icon_color'] ) ? $instance['icon_color'] : '';
			$css           = ! empty( $instance['css'] ) ? $instance['css'] : '';
			?>
		<style>
			<?php echo $css; ?>
		#nsmw-div-<?php echo esc_attr( $nsmw_widget_id ); ?> {
			padding : <?php echo esc_html( $padding ); ?>px !important ;
		}
		.smw-container-<?php echo esc_attr( $nsmw_widget_id ); ?> {
			clear: none !important;
			background-color:<?php echo esc_html( $div_bg_color ); ?> !important ; 
			list-style-type: none;
			line-height: 60px;
			cursor: pointer;
			width: 100%;
			height: 100%;
		}	
		.social-media-link-<?php echo esc_attr( $nsmw_widget_id ); ?> {
			color: <?php echo esc_html( $icon_color ); ?> !important ;
		}
		</style>		
			<?php
			echo ( $args['before_widget'] );
			// widget title
			if ( ! empty( $instance['title'] ) ) {
				echo ( $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'] );
			}
			?>
			
		<div class="row text-center">	
			<?php if ( $facebook ) { ?>
			<div id="nsmw-div-<?php echo esc_attr( $nsmw_widget_id ); ?>" class="<?php echo esc_attr( $columns ); ?>">
				<div class="smw-container-<?php echo esc_attr( $nsmw_widget_id ); ?>">
					<a href="<?php echo esc_url( $facebook ); ?>" class="social-media-link-<?php echo esc_attr( $nsmw_widget_id ); ?>">
						<i class='fab fa-facebook fa-<?php echo esc_attr( $icon_size ); ?>x' aria-hidden='true'></i>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if ( $twitter ) { ?>
			<div id="nsmw-div-<?php echo esc_attr( $nsmw_widget_id ); ?>" class="<?php echo esc_attr( $columns ); ?>">
				<div class="smw-container-<?php echo esc_attr( $nsmw_widget_id ); ?>">
					<a href="<?php echo esc_url( $twitter ); ?>" class="social-media-link-<?php echo esc_attr( $nsmw_widget_id ); ?>">
						<i class='fab fa-x-twitter fa-<?php echo esc_attr( $icon_size ); ?>x' aria-hidden='true'></i>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if ( $linkedin ) { ?>
			<div id="nsmw-div-<?php echo esc_attr( $nsmw_widget_id ); ?>" class="<?php echo esc_attr( $columns ); ?>">
				<div class="smw-container-<?php echo esc_attr( $nsmw_widget_id ); ?>">
					<a href="<?php echo esc_url( $linkedin ); ?>" class="social-media-link-<?php echo esc_attr( $nsmw_widget_id ); ?>">
						<i class='fab fa-linkedin fa-<?php echo esc_attr( $icon_size ); ?>x' aria-hidden='true'></i>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if ( $instagram ) { ?>
			<div id="nsmw-div-<?php echo esc_attr( $nsmw_widget_id ); ?>" class="<?php echo esc_attr( $columns ); ?>">
				<div class="smw-container-<?php echo esc_attr( $nsmw_widget_id ); ?>">
					<a href="<?php echo esc_url( $instagram ); ?>" class="social-media-link-<?php echo esc_attr( $nsmw_widget_id ); ?>">
						<i class='fab fa-instagram fa-<?php echo esc_attr( $icon_size ); ?>x' aria-hidden='true'></i>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if ( $pinterest ) { ?>
			<div id="nsmw-div-<?php echo esc_attr( $nsmw_widget_id ); ?>" class="<?php echo esc_attr( $columns ); ?>">
				<div class="smw-container-<?php echo esc_attr( $nsmw_widget_id ); ?>">
					<a href="<?php echo esc_url( $pinterest ); ?>" class="social-media-link-<?php echo esc_attr( $nsmw_widget_id ); ?>">
						<i class='fab fa-pinterest fa-<?php echo esc_attr( $icon_size ); ?>x' aria-hidden='true'></i>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if ( $flickr ) { ?>
			<div id="nsmw-div-<?php echo esc_attr( $nsmw_widget_id ); ?>" class="<?php echo esc_attr( $columns ); ?>">
				<div class="smw-container-<?php echo esc_attr( $nsmw_widget_id ); ?>">
					<a href="<?php echo esc_url( $flickr ); ?>" class="social-media-link-<?php echo esc_attr( $nsmw_widget_id ); ?>">
						<i class='fab fa-flickr fa-<?php echo esc_attr( $icon_size ); ?>x' aria-hidden='true'></i>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if ( $tumblr ) { ?>
			<div id="nsmw-div-<?php echo esc_attr( $nsmw_widget_id ); ?>" class="<?php echo esc_attr( $columns ); ?>">
				<div class="smw-container-<?php echo esc_attr( $nsmw_widget_id ); ?>">
					<a href="<?php echo esc_url( $tumblr ); ?>" class="social-media-link-<?php echo esc_attr( $nsmw_widget_id ); ?>">
						<i class='fab fa-tumblr fa-<?php echo esc_attr( $icon_size ); ?>x' aria-hidden='true'></i>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if ( $vimeo ) { ?>
			<div id="nsmw-div-<?php echo esc_attr( $nsmw_widget_id ); ?>" class="<?php echo esc_attr( $columns ); ?>">
				<div class="smw-container-<?php echo esc_attr( $nsmw_widget_id ); ?>">
					<a href="<?php echo esc_url( $vimeo ); ?>" class="social-media-link-<?php echo esc_attr( $nsmw_widget_id ); ?>">
						<i class='fab fa-vimeo fa-<?php echo esc_attr( $icon_size ); ?>x' aria-hidden='true'></i>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if ( $youtube ) { ?>
			<div id="nsmw-div-<?php echo esc_attr( $nsmw_widget_id ); ?>" class="<?php echo esc_attr( $columns ); ?>">
				<div class="smw-container-<?php echo esc_attr( $nsmw_widget_id ); ?>">
					<a href="<?php echo esc_url( $youtube ); ?>" class="social-media-link-<?php echo esc_attr( $nsmw_widget_id ); ?>">
						<i class='fab fa-youtube fa-<?php echo esc_attr( $icon_size ); ?>x' aria-hidden='true'></i>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if ( $rss ) { ?>
			<div id="nsmw-div-<?php echo esc_attr( $nsmw_widget_id ); ?>" class="<?php echo esc_attr( $columns ); ?>">
				<div class="smw-container-<?php echo esc_attr( $nsmw_widget_id ); ?>">
					<a href="<?php echo esc_url( $rss ); ?>" class="social-media-link-<?php echo esc_attr( $nsmw_widget_id ); ?>">
						<i class='fas fa-rss fa-<?php echo esc_attr( $icon_size ); ?>x' aria-hidden='true'></i>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if ( $whatsapp ) { ?>
			<div id="nsmw-div-<?php echo esc_attr( $nsmw_widget_id ); ?>" class="<?php echo esc_attr( $columns ); ?>">
				<div class="smw-container-<?php echo esc_attr( $nsmw_widget_id ); ?>">
					<a href="<?php echo esc_url( $whatsapp ); ?>" class="social-media-link-<?php echo esc_attr( $nsmw_widget_id ); ?>">
						<i class='fab fa-whatsapp fa-<?php echo esc_attr( $icon_size ); ?>x' aria-hidden='true'></i>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if ( $email ) { ?>
			<div id="nsmw-div-<?php echo esc_attr( $nsmw_widget_id ); ?>" class="<?php echo esc_attr( $columns ); ?>">
				<div class="smw-container-<?php echo esc_attr( $nsmw_widget_id ); ?>">
					<a href="mailto:<?php echo esc_html( $email ); ?>" class="social-media-link-<?php echo esc_attr( $nsmw_widget_id ); ?>">
						<i class='far fa-envelope-o fa-<?php echo esc_attr( $icon_size ); ?>x' aria-hidden='true'></i>
					</a>
				</div>
			</div>
			<?php } ?>
			
		</div>
			<?php
			echo ( $args['after_widget'] );
		}

		/**
		 * Widget Administrator From
		 */
		public function form( $instance ) {
			// print_r($instance);
			// css
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'nsmw-font-awesome-all-css', plugin_dir_url( __FILE__ ) . 'css/all.css' );
			// js
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'nsmw-color-picker-js', plugin_dir_url( __FILE__ ) . 'js/nsmw-color-picker.js', array( 'jquery', 'wp-color-picker' ), '', true );
			wp_enqueue_script( 'jquery-ui-sortable' );

			// outputs the options form on admin
			$nsmw_widget_id = ! empty( $instance['nsmw_widget_id'] ) ? $instance['nsmw_widget_id'] : '';
			$title          = ! empty( $instance['title'] ) ? $instance['title'] : '';
			$facebook       = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '';
			$twitter        = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
			$linkedin       = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '';
			$instagram      = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '';
			$pinterest      = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : '';
			$flickr         = ! empty( $instance['flickr'] ) ? $instance['flickr'] : '';
			$tumblr         = ! empty( $instance['tumblr'] ) ? $instance['tumblr'] : '';
			$vimeo          = ! empty( $instance['vimeo'] ) ? $instance['vimeo'] : '';
			$youtube        = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '';
			$rss            = ! empty( $instance['rss'] ) ? $instance['rss'] : '';
			$email          = ! empty( $instance['email'] ) ? $instance['email'] : '';
			$whatsapp       = ! empty( $instance['whatsapp'] ) ? $instance['whatsapp'] : '';

			// widget display setting
			$columns       = ! empty( $instance['columns'] ) ? $instance['columns'] : 'col-md-4 col-sm-4 col-xs-4';
			$icon_size     = ! empty( $instance['icon_size'] ) ? $instance['icon_size'] : '2';
			$padding       = ! empty( $instance['padding'] ) ? $instance['padding'] : '0';
			$background    = ! empty( $instance['background'] ) ? $instance['background'] : '';
			$margin_top    = ! empty( $instance['margin_top'] ) ? $instance['margin_top'] : '';
			$margin_bottom = ! empty( $instance['margin_bottom'] ) ? $instance['margin_bottom'] : '';
			$div_bg_color  = ! empty( $instance['div_bg_color'] ) ? $instance['div_bg_color'] : 'red';
			$icon_color    = ! empty( $instance['icon_color'] ) ? $instance['icon_color'] : 'white';
			$css           = ! empty( $instance['css'] ) ? $instance['css'] : '';
			?>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'nsmw_widget_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'nsmw_widget_id' ) ); ?>" type="hidden" value="<?php echo esc_html( $nsmw_widget_id ); ?>">
		<p>
			<label><?php esc_html_e( 'Widget Title :', 'new-social-media-widget' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>">
		</p>
		
		<p id="smps-<?php echo esc_html( $nsmw_widget_id ); ?>" onclick="return ClickToggle(this.id, 'social-media-urls-<?php echo esc_html( $nsmw_widget_id ); ?>');">
			<a class="button button-primary">
				<i class="fab fa-plus-square" aria-hidden="true"></i>&nbsp;&nbsp;<?php esc_html_e( 'Social Media Profile Settings', 'new-social-media-widget' ); ?> 
			</a>
		</p>
		
			<?php $pos = 1; ?>
		<div id="social-media-urls-<?php echo esc_attr( $nsmw_widget_id ); ?>">
			<hr>
			<p>
				<label><?php esc_html_e( 'Facebook :', 'new-social-media-widget' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_html( $facebook ); ?>">
				<input id="pos[]" name="pos[]" type="hidden" value="<?php echo esc_attr( $pos++ ); ?>">
			</p>
			<p>
				<label><?php esc_html_e( 'Twitter :', 'new-social-media-widget' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_html( $twitter ); ?>">
				<input id="pos[]" name="pos[]" type="hidden" value="<?php echo esc_attr( $pos++ ); ?>">
			</p>
			<p>
				<label><?php esc_html_e( 'Linkedin :', 'new-social-media-widget' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text" value="<?php echo esc_html( $linkedin ); ?>">
				<input id="pos[]" name="pos[]" type="hidden" value="<?php echo esc_attr( $pos++ ); ?>">
			</p>
			<p>
				<label><?php esc_html_e( 'Instagram :', 'new-social-media-widget' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text" value="<?php echo esc_html( $instagram ); ?>">
				<input id="pos[]" name="pos[]" type="hidden" value="<?php echo esc_attr( $pos++ ); ?>">
			</p>
			<p>
				<label><?php esc_html_e( 'Pinterest :', 'new-social-media-widget' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" type="text" value="<?php echo esc_html( $pinterest ); ?>">
				<input id="pos[]" name="pos[]" type="hidden" value="<?php echo esc_attr( $pos++ ); ?>">
			</p>
			<p>
				<label><?php esc_html_e( 'Flickr :', 'new-social-media-widget' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'flickr' ) ); ?>" type="text" value="<?php echo esc_html( $flickr ); ?>">
				<input id="pos[]" name="pos[]" type="hidden" value="<?php echo esc_attr( $pos++ ); ?>">
			</p>
			<p>
				<label><?php esc_html_e( 'Tumblr :', 'new-social-media-widget' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tumblr' ) ); ?>" type="text" value="<?php echo esc_html( $tumblr ); ?>">
				<input id="pos[]" name="pos[]" type="hidden" value="<?php echo esc_attr( $pos++ ); ?>">
			</p>
			<p>
				<label><?php esc_html_e( 'Vimeo :', 'new-social-media-widget' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vimeo' ) ); ?>" type="text" value="<?php echo esc_html( $vimeo ); ?>">
				<input id="pos[]" name="pos[]" type="hidden" value="<?php echo esc_attr( $pos++ ); ?>">
			</p>	
			<p>
				<label><?php esc_html_e( 'Youtube :', 'new-social-media-widget' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text" value="<?php echo esc_html( $youtube ); ?>">
				<input id="pos[]" name="pos[]" type="hidden" value="<?php echo esc_attr( $pos++ ); ?>">
			</p>	
			<p>
				<label><?php esc_html_e( 'Rss Feed:', 'new-social-media-widget' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'rss' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'rss' ) ); ?>" type="text" value="<?php echo esc_html( $rss ); ?>">
				<input id="pos[]" name="pos[]" type="hidden" value="<?php echo esc_attr( $pos++ ); ?>">
			</p>
			<p>
				<label><?php esc_html_e( 'Whatsapp:', 'new-social-media-widget' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'whatsapp' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'whatsapp' ) ); ?>" type="text" value="<?php echo esc_html( $whatsapp ); ?>">
				<input id="pos[]" name="pos[]" type="hidden" value="<?php echo esc_attr( $pos++ ); ?>">
			</p>
			<p>
				<label><?php esc_html_e( 'Email :', 'new-social-media-widget' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_html( $email ); ?>">
				<input id="pos[]" name="pos[]" type="hidden" value="<?php echo esc_attr( $pos++ ); ?>">
			</p>
		</div>
	
		<p id="wcs-<?php echo esc_html( $nsmw_widget_id ); ?>" onclick="return ClickToggle(this.id, 'display-settings-<?php echo esc_html( $nsmw_widget_id ); ?>');">
			<a class="button button-primary">
				<i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;&nbsp;<?php esc_html_e( 'Widget Customization Settings', 'new-social-media-widget' ); ?>
			</a>
		</p>
		
		<!-- widget display setting -->
		<div id="display-settings-<?php echo esc_attr( $nsmw_widget_id ); ?>" >	
			<hr>
			<p>
				<label><?php esc_html_e( 'How Many Icon Into Per Row:', 'new-social-media-widget' ); ?></label> 
				<select id="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'columns' ) ); ?>">
					<option value="col-md-6 col-sm-6 col-xs-6" 
					<?php
					if ( $columns == 'col-md-6 col-sm-6 col-xs-6' ) {
						echo 'selected=selected';}
					?>
					>2 Icon</option>
					<option value="col-md-4 col-sm-4 col-xs-4" 
					<?php
					if ( $columns == 'col-md-4 col-sm-4 col-xs-4' ) {
						echo 'selected=selected';}
					?>
					>3 Icon</option>
					<option value="col-md-3 col-sm-3 col-xs-3" 
					<?php
					if ( $columns == 'col-md-3 col-sm-3 col-xs-3' ) {
						echo 'selected=selected';}
					?>
					>4 Icon</option>
					<option value="col-md-2 col-sm-2 col-xs-2" 
					<?php
					if ( $columns == 'col-md-2 col-sm-2 col-xs-2' ) {
						echo 'selected=selected';}
					?>
					>6 Icon</option>
					<option value="col-md-1 col-sm-1 col-xs-1" 
					<?php
					if ( $columns == 'col-md-1 col-sm-1 col-xs-1' ) {
						echo 'selected=selected';}
					?>
					>12 Icon</option>
				</select>
			</p>
			
			<p>
				<label><?php esc_html_e( 'Icon Size:', 'new-social-media-widget' ); ?></label> 
				<select id="<?php echo esc_attr( $this->get_field_id( 'icon_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_size' ) ); ?>">
					<option value="lg" 
					<?php
					if ( $icon_size == 'lg' ) {
						echo 'selected=selected';}
					?>
					>1x</option>
					<option value="2" 
					<?php
					if ( $icon_size == 2 ) {
						echo 'selected=selected';}
					?>
					>2x</option>
					<option value="3" 
					<?php
					if ( $icon_size == 3 ) {
						echo 'selected=selected';}
					?>
					>3x</option>
					<option value="4" 
					<?php
					if ( $icon_size == 4 ) {
						echo 'selected=selected';}
					?>
					>4x</option>
					<option value="5" 
					<?php
					if ( $icon_size == 5 ) {
						echo 'selected=selected';}
					?>
					>5x</option>
				</select>
			</p>
			
			<p>
				<label><?php esc_html_e( 'Padding:', 'new-social-media-widget' ); ?></label> 
				<select id="<?php echo esc_attr( $this->get_field_id( 'padding' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'padding' ) ); ?>">
				
					<option value="0" 
					<?php
					if ( $padding == '0' ) {
						echo 'selected=selected';}
					?> 
					>None</option>
					<option value="1" 
					<?php
					if ( $padding == 1 ) {
						echo 'selected=selected';}
					?>
					>1px</option>
					<option value="2" 
					<?php
					if ( $padding == 2 ) {
						echo 'selected=selected';}
					?>
					>2px</option>
					<option value="3" 
					<?php
					if ( $padding == 3 ) {
						echo 'selected=selected';}
					?>
					>3px</option>
					<option value="4" 
					<?php
					if ( $padding == 4 ) {
						echo 'selected=selected';}
					?>
					>4px</option>
					<option value="5" 
					<?php
					if ( $padding == 5 ) {
						echo 'selected=selected';}
					?>
					>5px</option>
					<option value="6" 
					<?php
					if ( $padding == 6 ) {
						echo 'selected=selected';}
					?>
					>6px</option>
					<option value="7" 
					<?php
					if ( $padding == 7 ) {
						echo 'selected=selected';}
					?>
					>7px</option>
					<option value="8" 
					<?php
					if ( $padding == 8 ) {
						echo 'selected=selected';}
					?>
					>8px</option>
					<option value="9" 
					<?php
					if ( $padding == 9 ) {
						echo 'selected=selected';}
					?>
					>9px</option>
					<option value="10" 
					<?php
					if ( $padding == 10 ) {
						echo 'selected=selected';}
					?>
					>10px</option>
				</select>
			</p>	
			
			<p>
				<label><?php esc_html_e( 'Effect Type :', 'new-social-media-widget' ); ?></label> <a href="https://awplife.com/wordpress-plugins/social-media-widget-premium/"> Upgrade To Pro For This Setting  </a>
				 <p> Transform Effect : <a href="https://awplife.com/wordpress-plugins/social-media-widget-premium/"> Upgrade To Pro For This Setting  </a> </p>
				 <p> Hover Effect : <a href="https://awplife.com/wordpress-plugins/social-media-widget-premium/"> Upgrade To Pro For This Setting  </a> </p>
				 <p> 30+ Social Media Icons : <a href="http://awplife.com/wordpress-plugins/social-media-widget-premium/"> Upgrade To Pro For More Icons  </a> </p>
			</p>	
			
			<p>
				<label><?php esc_html_e( 'Div Background Color:', 'new-social-media-widget' ); ?></label><br>
				<select id="<?php echo esc_attr( $this->get_field_id( 'div_bg_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'div_bg_color' ) ); ?>">
					<option value="0" 
					<?php
					if ( $div_bg_color == 0 ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'None', 'new-social-media-widget' ); ?></option>
					<option value="red" 
					<?php
					if ( $div_bg_color == 'red' ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'Red', 'new-social-media-widget' ); ?></option>
					<option value="blue" 
					<?php
					if ( $div_bg_color == 'blue' ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'Blue', 'new-social-media-widget' ); ?></option>
					<option value="black" 
					<?php
					if ( $div_bg_color == 'black' ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'Black', 'new-social-media-widget' ); ?></option>
					<option value="white" 
					<?php
					if ( $div_bg_color == 'white' ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'White', 'new-social-media-widget' ); ?></option>
					<option value="green" 
					<?php
					if ( $div_bg_color == 'green' ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'Green', 'new-social-media-widget' ); ?></option>
					<option value="gold" 
					<?php
					if ( $div_bg_color == 'gold' ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'Gold', 'new-social-media-widget' ); ?></option>
					<option value="gray" 
					<?php
					if ( $div_bg_color == 'gray' ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'Gray', 'new-social-media-widget' ); ?></option>
				</select>	
			</p>
			<p>
				<label><?php esc_html_e( 'Icon Color:', 'new-social-media-widget' ); ?></label><br>
				<select id="<?php echo esc_attr( $this->get_field_id( 'icon_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_color' ) ); ?>">
					<option value="0" 
					<?php
					if ( $icon_color == 0 ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'None', 'new-social-media-widget' ); ?></option>
					<option value="red" 
					<?php
					if ( $icon_color == 'red' ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'Red', 'new-social-media-widget' ); ?></option>
					<option value="blue" 
					<?php
					if ( $icon_color == 'blue' ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'Blue', 'new-social-media-widget' ); ?></option>
					<option value="black" 
					<?php
					if ( $icon_color == 'black' ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'Black', 'new-social-media-widget' ); ?></option>
					<option value="white" 
					<?php
					if ( $icon_color == 'white' ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'White', 'new-social-media-widget' ); ?></option>
					<option value="green" 
					<?php
					if ( $icon_color == 'green' ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'Green', 'new-social-media-widget' ); ?></option>
					<option value="gold" 
					<?php
					if ( $icon_color == 'gold' ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'Gold', 'new-social-media-widget' ); ?></option>
					<option value="gray" 
					<?php
					if ( $icon_color == 'gray' ) {
						echo 'selected=selected';}
					?>
					><?php esc_html_e( 'Gray', 'new-social-media-widget' ); ?></option>
				</select>	
			</p>
			<p>
				<label><?php esc_html_e( 'Custom CSS:', 'new-social-media-widget' ); ?></label><br>
				<textarea class="css" id="<?php echo esc_attr( $this->get_field_id( 'css' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'css' ) ); ?>" style=" width: 100%;"  ><?php echo $css; ?></textarea>
			</p>			
		</div>
		
		<p>
			<a href="https://awplife.com/account/signup/social-media-widget-premium" target="_blank" class="button button-primary">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;<?php esc_html_e( 'Buy Premium Version', 'new-social-media-widget' ); ?> 
			</a>
		</p>
		
		<script>
			// toggle div settings open close
				function ClickToggle(id, divid) {
					jQuery( "div#" + divid ).slideToggle( "slow" );
					jQuery("#"+id+" i").toggleClass("fa-plus-square fa-minus-square");
				}

				jQuery( document ).ready(function() {
					jQuery( "div#social-media-urls" ).sortable({
						revert: true
					});
					jQuery( "#sortable" ).sortable({
						revert: true
					});
				});		
		</script>
			<?php
		}

		/**
		 * Widget Save Settings
		 */
		public function update( $new_instance, $old_instance ) {
			// processes widget options to be saved
			$instance = array();

			if ( empty( $new_instance['nsmw_widget_id'] ) ) {
				$new_instance['nsmw_widget_id'] = mt_rand( 10, 100000 );
			}
			$instance['nsmw_widget_id'] = ( ! empty( $new_instance['nsmw_widget_id'] ) ) ? strip_tags( $new_instance['nsmw_widget_id'] ) : 'Follow Us';
			$instance['title']          = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : 'Follow Us';
			$instance['facebook']       = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
			$instance['twitter']        = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
			$instance['linkedin']       = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
			$instance['instagram']      = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
			$instance['pinterest']      = ( ! empty( $new_instance['pinterest'] ) ) ? strip_tags( $new_instance['pinterest'] ) : '';
			$instance['flickr']         = ( ! empty( $new_instance['flickr'] ) ) ? strip_tags( $new_instance['flickr'] ) : '';
			$instance['tumblr']         = ( ! empty( $new_instance['tumblr'] ) ) ? strip_tags( $new_instance['tumblr'] ) : '';
			$instance['dribble']        = ( ! empty( $new_instance['dribble'] ) ) ? strip_tags( $new_instance['dribble'] ) : '';
			$instance['vine']           = ( ! empty( $new_instance['vine'] ) ) ? strip_tags( $new_instance['vine'] ) : '';
			$instance['yahoo']          = ( ! empty( $new_instance['yahoo'] ) ) ? strip_tags( $new_instance['yahoo'] ) : '';
			$instance['qq']             = ( ! empty( $new_instance['qq'] ) ) ? strip_tags( $new_instance['qq'] ) : '';
			$instance['reddit']         = ( ! empty( $new_instance['reddit'] ) ) ? strip_tags( $new_instance['reddit'] ) : '';
			$instance['vk']             = ( ! empty( $new_instance['vk'] ) ) ? strip_tags( $new_instance['vk'] ) : '';
			$instance['wordpress']      = ( ! empty( $new_instance['wordpress'] ) ) ? strip_tags( $new_instance['wordpress'] ) : '';
			$instance['overflow']       = ( ! empty( $new_instance['overflow'] ) ) ? strip_tags( $new_instance['overflow'] ) : '';
			$instance['stumbleupon']    = ( ! empty( $new_instance['stumbleupon'] ) ) ? strip_tags( $new_instance['stumbleupon'] ) : '';
			$instance['lastfm']         = ( ! empty( $new_instance['lastfm'] ) ) ? strip_tags( $new_instance['lastfm'] ) : '';
			$instance['xing']           = ( ! empty( $new_instance['xing'] ) ) ? strip_tags( $new_instance['xing'] ) : '';
			$instance['youtube']        = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';
			$instance['digg']           = ( ! empty( $new_instance['digg'] ) ) ? strip_tags( $new_instance['digg'] ) : '';
			$instance['git']            = ( ! empty( $new_instance['git'] ) ) ? strip_tags( $new_instance['git'] ) : '';
			$instance['share_alt']      = ( ! empty( $new_instance['share_alt'] ) ) ? strip_tags( $new_instance['share_alt'] ) : '';
			$instance['snapchat']       = ( ! empty( $new_instance['snapchat'] ) ) ? strip_tags( $new_instance['snapchat'] ) : '';
			$instance['vimeo']          = ( ! empty( $new_instance['vimeo'] ) ) ? strip_tags( $new_instance['vimeo'] ) : '';
			$instance['we_chat']        = ( ! empty( $new_instance['we_chat'] ) ) ? strip_tags( $new_instance['we_chat'] ) : '';
			$instance['wikipedia_w']    = ( ! empty( $new_instance['wikipedia_w'] ) ) ? strip_tags( $new_instance['wikipedia_w'] ) : '';
			$instance['yelp']           = ( ! empty( $new_instance['yelp'] ) ) ? strip_tags( $new_instance['yelp'] ) : '';
			$instance['skype']          = ( ! empty( $new_instance['skype'] ) ) ? strip_tags( $new_instance['skype'] ) : '';
			$instance['rss']            = ( ! empty( $new_instance['rss'] ) ) ? strip_tags( $new_instance['rss'] ) : '';
			$instance['email']          = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
			$instance['whatsapp']       = ( ! empty( $new_instance['whatsapp'] ) ) ? strip_tags( $new_instance['whatsapp'] ) : '';

			// widget display setting
			$instance['columns']       = ( ! empty( $new_instance['columns'] ) ) ? strip_tags( $new_instance['columns'] ) : 'col-md-4 col-sm-4 col-xs-4';
			$instance['icon_size']     = ( ! empty( $new_instance['icon_size'] ) ) ? strip_tags( $new_instance['icon_size'] ) : '2';
			$instance['padding']       = ( ! empty( $new_instance['padding'] ) ) ? strip_tags( $new_instance['padding'] ) : '0';
			$instance['background']    = ( ! empty( $new_instance['background'] ) ) ? strip_tags( $new_instance['background'] ) : '';
			$instance['div_bg_color']  = ( ! empty( $new_instance['div_bg_color'] ) ) ? strip_tags( $new_instance['div_bg_color'] ) : '';
			$instance['icon_color']    = ( ! empty( $new_instance['icon_color'] ) ) ? strip_tags( $new_instance['icon_color'] ) : '';

			$instance['css'] = ( ! empty( $new_instance['css'] ) ) ? strip_tags( $new_instance['css'] ) : '';
			update_option( 'social_media_icon_pos', sanitize_text_field( $_POST['pos'] ) );
			return $instance;
		}
	}
} // end of class exist
add_action(
	'widgets_init',
	function() {
		register_widget( 'New_Social_Media' );
	}
);
?>
