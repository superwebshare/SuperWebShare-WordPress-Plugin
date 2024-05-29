<?php

class SWS_Elementor_widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'super_web_share';
    }

	public function get_title() {
        return esc_html__( 'Super Web Share', 'super-web-share' );
    }

	public function get_icon() {
		return 'sws-widget-icon dashicons-before dashicons-share';
	}

	public function get_custom_help_url() {
		return 'https://superwebshare.com/contact';
	}

	public function get_categories() {
		return [  "basic", 'general' ];
	}

	public function get_keywords() {
		return [ "super web share", 'share', "facebook", "twitter", "instagram", "native", "copy" ];
	}

	public function get_script_depends() {
		return [ 'font-awesome' ];
	}

	public function set_style_depends() {
		return [ 'font-awesome' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'sws_appearance',
			[
				'label' => esc_html__( 'Appearance', 'super-web-share' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style',
			[
				'type'		=> \Elementor\Controls_Manager::SELECT,
				'label' 	=> esc_html__( 'Style', 'super-web-share' ),
				'options' 	=> [
					"default" 	=> "Default",
					"curved" 	=> "Curved",
					"square"	=> "Square",
					"circle"	=> "Circle",
				],
				'default' 	=> 'default',
				
			]
		);


		$this->add_control(
			'text',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Button Text', 'super-web-share' ),
				'placeholder' => esc_html__( 'Enter your Button Text', 'super-web-share' ),
				'default' => "Share",
				'condition' => [
					'style' => 'default',
				]
			]
		);
		$this->add_control(
			'color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__( 'Button Color', 'super-web-share' ),
				'default' => "#BD3854",
				'selectors' => [
					'{{WRAPPER}} .superwebshare_tada' => 'background-color: {{VALUE}}!important;',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				],
			]
		);

		$this->add_control(
			'size',
			[
				'type'		=> \Elementor\Controls_Manager::SELECT,
				'label' 	=> esc_html__( 'Size', 'super-web-share' ),
				'options' 	=> [
					"large" 	=> "Large",
					"medium"	=> "Medium",
					"small" 	=> "Small"
				],
				'default' 	=> 'large',
			]
		);
		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Share Icon', 'super-web-share' ),
				'type' => 'SWS-controller-icons',
				'options' => [],
				'default' => 'share-icon-1',
				'toggle' => false,
				
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		


		if( ! empty( $settings[ '__globals__' ] ) &&  ! empty( $settings[ '__globals__' ][ 'color' ] ) ){
			$colorPath = $settings[ '__globals__' ]['color'];
			$colorName = substr($colorPath, 18 );
			$settings[ 'color' ] = "var(--e-global-color-$colorName)";
		}

		$attrStr  = "";
		foreach( $settings as $key => $value ) {
			if( ! is_string( $value) ) continue;
			 $attrStr.= "$key=\"$value\" ";
		}

		echo do_shortcode("[super_web_share $attrStr]");
		
	}

	protected function content_template() {
		?>
		<#
			view.addRenderAttribute(
				'wrapper',
				{
					'role': settings.role,
				}
			);

			const buttonClasses = [
				'superwebshare_tada',
				'superwebshare_prompt',
				'superwebshare-button-default',
				'superwebshare_button_svg',
				'superwebshare-button-' + settings.size,
				'superwebshare-button-' + settings.style
			];

			view.addRenderAttribute(
				'button', {
					class: buttonClasses.join(' '),
					
				},
			);

			let cachedIcons = window.sessionStorage.getItem('sws_icons');

			if (!cachedIcons) {
				jQuery.ajax({
					url: wp?.ajax?.settings?.url || '/wp-admin/admin-ajax.php',
					data: {
						action: 'sws_get_icons',
					},
					success: function (d) {
						window.sessionStorage.setItem('sws_icons', JSON.stringify(d));
						cachedIcons = JSON.stringify(d);
					},
					error: function (err) {
						alert('Oh No, No something went wrong.');
					},
				});
			} 

			cachedIcons = JSON.parse(cachedIcons);
			
		#>

		<div {{{ view.getRenderAttributeString( 'wrapper' ) }}} >
			<span {{{ view.getRenderAttributeString( 'button' )  }}} > 
			{{{cachedIcons && cachedIcons[settings.icon]}}} <span>{{{  settings.style == "default" ?settings.text : "" }}} </span>
		</span></div>
			
			
		<?php	
	}

}