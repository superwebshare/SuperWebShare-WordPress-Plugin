<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class SWS_Elementor{
    function __construct(  ){
        
        add_action( 'elementor/controls/register', [ $this, 'register_new_controls' ] );

        add_action( 'elementor/widgets/register', [ $this, 'register_new_widgets' ] );

        add_action( 'elementor/editor/before_enqueue_styles', [  $this, 'enqueue_styles_for_widgets'] );

    }

    function register_new_controls( $controls_manager ) {

        require_once( __DIR__ . '/controls/controller-icons.php' );
    
        $controls_manager->register( new \SWS_Elementor_controller_icons() );
    
    }

    function register_new_widgets( $widgets_manager ){
  
        require_once __DIR__ . "/widget.php";
       
        $widgets_manager->register( new \SWS_Elementor_widget() );
    }

    function enqueue_styles_for_widgets(){

        wp_enqueue_style( "superwebshare-elementor-editor", plugin_dir_url( __FILE__ ) . '/editor.css', array(), SUPERWEBSHARE_VERSION , 'all' );
    }

}
new SWS_Elementor();



