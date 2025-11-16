<?php
	/* make icons float icons even widget is not active */
	function sfsi_frontFloter() {
		
		$sfsi_section9 = maybe_unserialize( get_option( 'sfsi_section9_options', false ) );
	  
        if( isset( $sfsi_section9['sfsi_icons_float'] ) && $sfsi_section9['sfsi_icons_float'] == "yes" ) :
        	$output = '';
            ob_start();
            /* call the all icons function under sfsi_widget.php file */
            echo sfsi_check_visiblity( 1, 'floter' );
            $output = ob_get_contents();
			ob_end_clean();
            echo $output;
		endif;
	}