<?php

class SWS_Elementor_controller_icons extends \Elementor\Base_Data_Control {
    public function get_type() {
        return "SWS-controller-icons";
    }

	protected function get_default_settings() {
        $Icons = new Super_Web_Share_Icons();
        return [
			'icons' => $Icons->get_icons( 'share' )
		];

    }

	public function get_default_value() {
        return 'share-icon-1';
    }

	public function content_template() {
		$control_uid = $this->get_control_uid();
		?>
		<div class="elementor-control-field sws-elementor-icon-field">

			<# if ( data.label ) { 
				#>
			<label for="<?php echo $control_uid; ?>" class="elementor-control-title">{{{ data.label }}}</label>
			<# } #>

			<div class="elementor-control-input-wrapper ">
                <# _.each( data.icons, function( svg, icon_name ) { #>
				<label class="icon-select" role="button">
                    <input type="radio" name="{{ data.name }}"  {{{ data.controlValue == icon_name ? 'checked' : '' }}} data-setting="{{ data.name }}" value="{{icon_name}}" > {{{svg}}}
                </label>
                <# }); #>
			</div>

		</div>

		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{{ data.description }}}</div>
		<# } #>
		<?php
	}

}