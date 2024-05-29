<?php
/**
 * Main Admin UI.
 *
 * @since 1.0.0
 * @package Super_Web_Share
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Description for Inline Share buttton.
 *
 * @since 1.3
 */
function superwebshare_inline_description_cb() {
	$settings = superwebshare_get_settings_inline();
	?>
		<tr valign="top">
			<p>Settings to show native share button on Inline posts/pages</p>
			<p><b>Please Note:</b> Super Web Share button can be seen on browsers like <code>Chrome for Android</code>, <code>Edge for Android</code>, <code>Opera for Android</code>, <code>Samsung Internet for Android</code>, <code>Safari for iOS,</code> and <code>Brave for Android</code>. Those are the browsers that currently support native web share. Please test out the pages on these browsers and devices once after activation.</p>
		</tr>
	<?php
}

/**
 * Inline share button : Enable/Disable share button (Inline) : Above and Below Post/Page Content
 *
 * @since 1.3
 */
function superwebshare_inline_enable_cb() {
	$settings = superwebshare_get_settings_inline();
	superwebshare_input_toggle( 'superwebshare_inline_settings[superwebshare_inline_enable]', 'enable', $settings['superwebshare_inline_enable'] ?? '' );
}

/**
 * Inline : Display settings of Share Button (Inline) on page or archive pages or home
 *
 * @since 1.3
 */
function superwebshare_inline_display_cb() {
	$settings = superwebshare_get_settings_inline();
	superwebshare_display_settings( 'superwebshare_inline_settings', 'inline_display_pages', $settings );
}

/**
 * Inline share button position
 *
 * @since 1.3
 */
function superwebshare_inline_button_position_cb() {
	$settings = superwebshare_get_settings_inline();
	?>
		<p><label><input type="radio" name="superwebshare_inline_settings[inline_position]" value="before" <?php checked( 'before', $settings['inline_position'] ); ?> /> <?php esc_html_e( 'Before the content of your post', 'super-web-share' ); ?></label></p>
		<p><label><input type="radio" name="superwebshare_inline_settings[inline_position]" value="after" <?php checked( 'after', $settings['inline_position'] ); ?> /> <?php esc_html_e( 'After the content of your post', 'super-web-share' ); ?></label></p>
		<p><label><input type="radio" name="superwebshare_inline_settings[inline_position]" value="both" <?php checked( 'both', $settings['inline_position'] ); ?> /> <?php esc_html_e( 'Before AND After the content of your post', 'super-web-share' ); ?></label></p>
	<?php
}

/**
 * Inline share button text for the botton
 *
 * @since 1.3
 */
function superwebshare_inline_button_text_cb() {
	$settings = superwebshare_get_settings_inline();
	?>
		<p><label><input type="text" id="superwebsharebuttontext" name="superwebshare_inline_settings[inline_button_share_text]" title="Share" value="<?php echo esc_html( $settings['inline_button_share_text'] ); ?>" /></label></p>
		<p class="description">
			<?php esc_html_e( 'This text will be displayed within the button', 'super-web-share' ); ?>
		</p>
	<?php
}

/**
 * Inline share button color
 *
 * @since 1.3
 */
function superwebshare_inline_button_color_cb() {
	$settings = superwebshare_get_settings_inline();
	?>
	<input type="text" name="superwebshare_inline_settings[inline_button_share_color]" id="superwebshare_inline_settings[inline_button_share_color]" class="superwebshare-colorpicker" value="<?php echo isset( $settings['inline_button_share_color'] ) ? esc_html( $settings['inline_button_share_color'] ) : '#D5E0EB'; ?>" data-default-color="#D5E0EB">
	<?php
}

/**
 * Inline share button (Inline) on AMP Pages
 *
 * @since 1.4.4
 */
function inline_amp_enable_cb() {
	$settings                      = superwebshare_get_settings_inline();
	$settings['inline_amp_enable'] = isset( $settings['inline_amp_enable'] ) ? esc_attr( $settings['inline_amp_enable'] ) : 'disabled';
	superwebshare_input_toggle( 'superwebshare_inline_settings[inline_amp_enable]', 'enable', $settings['inline_amp_enable'] );
	?>
	<p class="description">
		<?php esc_html_e( 'Right now, we are only supporting the official AMP plugin. We are extending the AMP support to more AMP plugins on the coming version.', 'super-web-share' ); ?>
	</p>
	<?php
}


// Floating Button.
/**
 * Description for floating Share buttton
 *
 * @since 1.3
 */
function superwebshare_floating_description_cb() {
	?>
		<tr valign="top">
			<p>Settings to show floating share button on pages/posts.</p>
			<p><b>Please Note: </b>Super Web Share button can be seen on browsers like <code>Chrome for Android</code>, <code>Edge for Android</code>, <code>Opera for Android</code>, <code>Samsung Internet for Android</code>, <code>Safari for iOS</code> and <code>Brave for Android</code> as those are browsers which currently supports native web share. Please test out over these browsers + devices once after activation.</p>
		</tr>
	<?php
}

/**
 * Text for floating share buttton
 *
 * @since 2.1
 */
function superwebshare_floating_button_text_cb() {
	$settings_floating = superwebshare_get_settings_floating();
	?>
		<input type="text" name="superwebshare_floating_settings[floating_button_text]" id="superwebshare_floating_settings[floating_button_text]" value="<?php echo isset( $settings_floating['floating_button_text'] ) ? esc_html( $settings_floating['floating_button_text'] ) : 'Share'; ?>" >
		<p class="description">
			<?php esc_html_e( 'This text will be displayed within the floating button. Default value: "Share" ', 'super-web-share' ); ?>
		</p>
	<?php
}

/**
 * Enable / Disable the Share Button (floating)
 *
 * @since 1.3
 */
function superwebshare_floating_enable_cb() {
	$settings_floating = superwebshare_get_settings_floating();
	superwebshare_input_toggle( 'superwebshare_floating_settings[superwebshare_floating_enable]', 'enable', $settings_floating['superwebshare_floating_enable'] ?? '' );
}

/**
 * Floating Button color
 *
 * @since 1.3
 */
function superwebshare_floating_color_cb() {
	$settings_floating = superwebshare_get_settings_floating();
	?>
		<input type="text" name="superwebshare_floating_settings[floating_share_color]" id="superwebshare_floating_settings[floating_share_color]" class="superwebshare-colorpicker" value="<?php echo isset( $settings_floating['floating_share_color'] ) ? esc_html( $settings_floating['floating_share_color'] ) : '#D5E0EB'; ?>" data-default-color="#D5E0EB">
			<p class="description">
				<?php esc_html_e( 'Select the color that you would like to add to the floating share button.', 'super-web-share' ); ?>
			</p>
	<?php
}

/**
 * Floating Display Render
 *
 * @since 1.3
 */
function superwebshare_floating_display_cb() {
	$settings = superwebshare_get_settings_floating();

	superwebshare_display_settings( 'superwebshare_floating_settings', 'floating_display_pages', $settings );
}

/**
 * Position of Floating Button
 *
 * @since 1.3
 */
function superwebshare_floating_position_cb() {
	$settings_floating = superwebshare_get_settings_floating();
	?>
		from <label for="superwebshare_floating_settings[floating_position]">
					<select id="superwebshare_floating_settings[floating_position]" name="superwebshare_floating_settings[floating_position]" style="width:150px" >
						<option value="right" 
						<?php
						if ( 'right' === $settings_floating['floating_position'] ) {
							?>
							selected<?php } ?> ><?php esc_html_e( 'Bottom - Right', 'super-web-share' ); ?></option>
						<option value="left" 
						<?php
						if ( 'left' === $settings_floating['floating_position'] ) {
							?>
							selected<?php } ?> ><?php esc_html_e( 'Bottom - Left', 'super-web-share' ); ?></option>
					</select>
			</label> with 

				<input type="number" min="0" step="any" style="width:50px" name="superwebshare_floating_settings[floating_position_leftright]" id="superwebshare_floating_settings[floating_position_leftright]" value="<?php echo isset( $settings_floating['floating_position_leftright'] ) ? esc_html( $settings_floating['floating_position_leftright'] ) : '30'; ?>">px from left/right,
		<input type="number" min="0" step="any" style="width:50px" name="superwebshare_floating_settings[floating_position_bottom]" id="superwebshare_floating_settings[floating_position_bottom]" value="<?php echo isset( $settings_floating['floating_position_bottom'] ) ? esc_html( $settings_floating['floating_position_bottom'] ) : '30'; ?>">px from bottom<p>
	<?php
}

/**
 * Position from Bottom
 *
 * @since 1.3
 */
function superwebshare_floating_position_bottom_cb() {
	return ''; // moved this field to superwebshare_floating_position_cb function since 2.4.
}

/**
 * Enable/Disable share button for Floating Button on AMP Pages
 *
 * @since 1.4.4
 */
function floating_amp_enable_cb() {
	$settings_floating = superwebshare_get_settings_floating();
	if ( isset( $settings_floating['floating_amp_enable'] ) === '' ) {
		$settings_floating['floating_amp_enable'] = isset( $settings_floating['floating_amp_enable'] ) ? esc_attr( $settings_floating['floating_amp_enable'] ) : 'enable';
	}

	superwebshare_input_toggle( 'superwebshare_floating_settings[floating_amp_enable]', 'enable', $settings_floating['floating_amp_enable'] );
	?>
	<p class="description">
		<?php esc_html_e( 'Right now, we are only supporting the official AMP plugin. We are extending the AMP support to more AMP plugins on the coming version.', 'super-web-share' ); ?>
	</p>
	<?php
}


/**
 * Enable/Disable the Fallback
 *
 * @since 2.0
 */
function superwebshare_fallback_enable_cb() {
	$settings_fallback = superwebshare_get_settings_fallback();
	if ( ! isset( $settings_fallback['superwebshare_fallback_enable'] ) && is_string( $settings_fallback ) && strlen( $settings_fallback ) <= 0 ) {
		$saved = 'disabled';
	} elseif ( empty( $settings_fallback ) ) {
		$saved = 'disable';
	} else {
		$saved = $settings_fallback['superwebshare_fallback_enable'];
	}

	superwebshare_input_toggle( 'superwebshare_fallback_settings[superwebshare_fallback_enable]', 'enable', $saved );
}

/**
 * Option to change the title of Fallback Pop-up
 *
 * @since 2.4
 */
function superwebshare_fallback_title_cb() {
	$settings_fallback = superwebshare_get_settings_fallback();
	$value             = isset( $settings_fallback['fallback_title'] ) ? esc_html( $settings_fallback['fallback_title'] ) : 'Share';
	?>
	<input type="text" name="superwebshare_fallback_settings[fallback_title]" id="superwebshare_floating_settings[fallback_title]" placeholder="Enter the title for fallback dialog box" value="<?php echo esc_attr( $value ); ?>" >
	<?php
}

/**
 * Fallback background color
 *
 * @since 2.1
 */
function superwebshare_fallback_modal_background_color_cb() {
	$settings_fallback = superwebshare_get_settings_fallback();
	?>
		<input type="text" name="superwebshare_fallback_settings[fallback_modal_background]" id="superwebshare_fallback_settings[fallback_modal_background]" class="superwebshare-colorpicker" value="<?php echo isset( $settings_fallback['fallback_modal_background'] ) ? esc_html( $settings_fallback['fallback_modal_background'] ) : '#BD3854'; ?>" data-default-color="#BD3854">
			<p class="description">
				<?php esc_html_e( 'Select the background color that you would like to add for the fallback modal.</br>If you are selecting Layout - 3 (below), kindly please select white color #ffffff for better visibility', 'super-web-share' ); ?>
			</p>
	<?php
}

/**
 * Fallback layout selector
 *
 * @since 2.1
 */
function superwebshare_fallback_modal_layout_cb() {
	$settings_fallback = superwebshare_get_settings_fallback();
	$layouts           = 3; // set how many layouts.
	$layout            = 1;
	$selected          = isset( $settings_fallback['fallback_layout'] ) ? esc_html( $settings_fallback['fallback_layout'] ) : 1;
	?>
		<select class="sws-input-select"  name="superwebshare_fallback_settings[fallback_layout]" id="superwebshare_fallback_settings[fallback_layout]">
			<?php
			while ( $layout <= $layouts ) {
				$value = (int) $selected === (int) $layout ? 'selected' : '';
				echo "<option value='$layout' $value  >Layout-$layout</option> "; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				++$layout;
			}
			?>
		</select>
		<p class="description">
			<?php esc_html_e( 'Select the layout you prefer for fallback', 'super-web-share' ); ?>
		</p>
	<?php
}

/**
 * Fallback Text Color
 *
 * @since 2.4
 */
function superwebshare_fallback_text_color_cb() {
	$settings_fallback = superwebshare_get_settings_fallback();
	?>
	<input type="text" name="superwebshare_fallback_settings[fallback_text_color]" class="button-text-color" id="superwebshare_fallback_settings[fallback_text_color]"  value="<?php echo isset( $settings_fallback['fallback_text_color'] ) ? esc_html( $settings_fallback['fallback_text_color'] ) : '#ffffff'; ?>" data-default-color="#ffffff">
	<p class="description">
			<?php esc_html_e( 'Select the color for text and icon for fallback', 'super-web-share' ); ?>
	</p>
	<?php
}

/**
 *  Disable native share on desktop to forcefully show the fallback
 *
 * @since 2.4
 */
function superwebshare_fallback_show_fallback_cb() {
	$settings_fallback = superwebshare_get_settings_fallback();
	$saved             = isset( $settings_fallback['superwebshare_fallback_show_fallback_on_desktop'] ) ? esc_html( $settings_fallback['superwebshare_fallback_show_fallback_on_desktop'] ) : 'disable';
	superwebshare_input_toggle( 'superwebshare_fallback_settings[superwebshare_fallback_show_fallback_on_desktop]', 'enable', $saved );
	?>
		<p class="description">
			<?php esc_html_e( 'Microsoft Edge desktop browser is now supporting Web Share API, and they show custom share buttons. However, you can toggle off this setting if you don’t want to show the fallback share button provided by Super Web Share on desktop browsers that don’t support API.', 'super-web-share' ); ?>
		</p>
	<?php
}

/**
 * Fallback twitter Via parameter value field
 *
 * @since 2.3
 */
function fallback_twitter_via_cb() {
	$settings_fallback = superwebshare_get_settings_fallback();
	$value             = isset( $settings_fallback['fallback_twitter_via'] ) ? esc_html( $settings_fallback['fallback_twitter_via'] ) : '';
	?>
	<input type="text" name="superwebshare_fallback_settings[fallback_twitter_via]" id="superwebshare_floating_settings[fallback_twitter_via]" placeholder="Twitter	 Username" pattern='[0-9a-zA-Z_]+' value="<?php echo esc_attr( $value ); ?>" >
		<p class="description">
			<?php esc_html_e( 'Enter your X (Twitter) username. This will be outputted when the users click the Twitter share on the fallback modal. Eg: IamJoseVarghese', 'super-web-share' ); ?>
		</p>
	<?php
}


/**
 * Fallback description
 *
 * @since 2.0
 */
function superwebshare_fallback_description_cb() {
	?>
	<tr valign="top">
		<p><b>Fallback option</b> will help to show the the social icons when the native share is not supported on the browser from which your users visit the website.</p>
	</tr>
	<?php
}

/**
 * Social platforms choose callback
 *
 * @since 2.4
 */
function superwebshare_fallback_social_networks_cb() {
	$networks            = sws_get_social_networks();
	$icons               = new Super_Web_Share_Icons();
	$settings_appearance = superwebshare_get_settings_fallback();
	?>
		<div class="sws-social-networks-container">
			<div class="sws-social-networks-wrap _hidden" >
				<div class="sws-social-networks " >
					<?php
					foreach ( $networks as $key => $network ) :

						$check_box_attributes = array(
							'checked'    => in_array( $key, $settings_appearance['fallback_social_networks'] ) ? 'checked' : '',
							'type'       => 'checkbox',
							'class'      => '!_hidden input-network',
							'name'       => 'network[]',
							'data-name'  => $network['name'],
							'data-icon'  => $icons->get_icon( $network['icon'] ),
							'data-index' => array_search( $key, $settings_appearance['fallback_social_networks'], true ),
							'data-color' => $network['color'],
							'data-key'   => $key,
							'value'      => $key,
						)
						?>
						<label class="sws-social-network sws-icon-<?php echo esc_html( $key ); ?>" style="background-color:<?php echo esc_html( $network['color'] ); ?>">
							
							<div class="_flex _items-center">
								<span class="sws-icon-wrap">
									<?php echo $icons->get_icon( $network['icon'] );  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> 
								</span>
								<span>
									<?php echo esc_html( $network['name'] ); ?>
								</span>
							</div>
							<input <?php echo array_to_attributes( $check_box_attributes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> >
							<span class="dashicons-yes-alt dashicons-before _hidden"></span>
						</label>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="_text-end _mb-4">
				<a href="#" class="button button-primary social-networks-choose-toggle" data-close-text="<?php esc_html_e( 'Apply Selection', 'super-web-share' ); ?>"><?php esc_html_e( 'Add Networks', 'super-web-share' ); ?></a>
			</div>
			<div class="sws-selected-social-networks _relative ">
				<!-- Drag icons -->
			</div>
		</div>
		
	<?php
}


/**
 * Appearance description
 *
 * @since 2.4
 */
function superwebshare_appearance_description_cb() {
	?>
	<tr valign="top">
		<p><b>Appearance settings is to change the Icon, style, size and also to select a color for the icon and text of the Share button you would like to show on the pages</p>
	</tr>
	<?php
}

/**
 * Appearance Icon
 *
 * @since 2.3
 */
function superwebshare_appearance_icon_cb() {

	$settings_appearance = superwebshare_get_settings_appearance();

	$key = 'superwebshare_appearance_settings';

	$class_icon = new Super_Web_Share_Icons();
	$icons      = $class_icon->get_icons( 'share' );

	?>
		<div class='sws-appearance-checkbox sws-appearance-icons'>
			<ul>
				<?php
				foreach ( $icons as $icon_name => $svg ) {
					$rand    = wp_rand( 0, 9999999 );
					$checked = ! empty( $settings_appearance['superwebshare_appearance_button_icon'] ) && $icon_name === $settings_appearance['superwebshare_appearance_button_icon'] ? 'checked' : '';
					?>
							<li>
								<input type="radio" class='sws-input-radio' id='sws-input-radio-<?php echo esc_attr( $rand ); ?>' <?php echo esc_attr( $checked ); ?>  name="<?php echo esc_attr( $key ); ?>[superwebshare_appearance_button_icon]" value="<?php echo esc_attr( $icon_name ); ?>">
								<label  for="sws-input-radio-<?php echo esc_attr( $rand ); ?>">
								<?php
									echo $svg;  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								?>
								</label>
								
							</li>
						<?php
				}
				?>
			</ul>
		</div>
	<?php
}
/**
 * Appearance Button style
 *
 * @since 2.3
 */
function superwebshare_appearance_button_style_cb() {

	$settings_appearance = superwebshare_get_settings_appearance();
	$settings_floating   = superwebshare_get_settings_floating();
	$settings_inline     = superwebshare_get_settings_inline();

	$color      = isset( $settings_appearance['superwebshare_appearance_button_text_color'] ) ? esc_html( $settings_appearance['superwebshare_appearance_button_text_color'] ) : '#ffffff';
	$class_icon = new Super_Web_Share_Icons();
	$icon       = $class_icon->get_icon();

	$button_color = 'enable' === $settings_floating['superwebshare_floating_enable'] ? $settings_floating['floating_share_color'] : $settings_inline['inline_button_share_color'];

	$key    = 'superwebshare_appearance_settings';
	$values = array( 'default', 'curved', 'square', 'circle' );
	?>
		<div class='sws-appearance-checkbox sws-appearance-style'>
			<ul>
				<?php
				foreach ( $values as $button_name ) {
					$rand    = wp_rand( 0, 9999999 );
					$checked = ! empty( $settings_appearance['superwebshare_appearance_button_style'] ) && $button_name === $settings_appearance['superwebshare_appearance_button_style'] ? 'checked' : '';
					?>
						<li>
							<input type="radio" class='sws-input-radio' id='sws-input-radio-<?php echo esc_attr( $rand ); ?>' <?php echo esc_attr( $checked ); ?>  name="<?php echo esc_attr( $key ); ?>[superwebshare_appearance_button_style]" value="<?php echo esc_attr( $button_name ); ?>">
							<label  for="sws-input-radio-<?php echo esc_attr( $rand ); ?>">
								<span class="superwebshare_tada superwebshare_button superwebshare_button_svg superwebshare_prompt superwebshare-button-<?php echo esc_attr( $button_name ); ?>" style="background-color: <?php echo esc_attr( $button_color ); ?>; right:5px; bottom:5px;color: <?php echo esc_attr( $color ); ?> ">
								<?php
									echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								?>
								<span> <?php echo esc_html__( 'Share', 'super-web-share' ); ?> </span></span>
							</label>
							
						</li>
					<?php
				}
				?>
			</ul>
		</div>
	<?php
}

/**
 * Color for Appearance Button style to be used for the fallback and inline share button text and icon
 *
 * @since 2.4
 */
function superwebshare_appearance_button_text_color_cb() {
	$settings_appearance = superwebshare_get_settings_appearance();
	?>
	<input type="text" name="superwebshare_appearance_settings[superwebshare_appearance_button_text_color]" class="button-text-color" id="superwebshare_appearance_settings[superwebshare_appearance_button_text_color]"  value="<?php echo isset( $settings_appearance['superwebshare_appearance_button_text_color'] ) ? esc_html( $settings_appearance['superwebshare_appearance_button_text_color'] ) : '#ffffff'; ?>" data-default-color="#ffffff">
	<p class="description">
		<?php esc_html_e( 'Select the color for icon and text for the Share button', 'super-web-share' ); ?>
	</p>
	<?php
}

/**
 * Appearance Button Size
 *
 * @since 2.3
 */
function superwebshare_appearance_button_size_cb() {

	$settings_appearance = superwebshare_get_settings_appearance();

	$key    = 'superwebshare_appearance_settings';
	$values = array(
		'large'  => 'large',
		'medium' => 'medium',
		'small'  => 'small',
	);
	?>
		<select class=""  name="<?php echo esc_attr( $key ); ?>[superwebshare_appearance_button_size]">
			<?php
			foreach ( $values as $button_size => $name ) {
				$selected = ! empty( $settings_appearance['superwebshare_appearance_button_size'] ) && $button_size === $settings_appearance['superwebshare_appearance_button_size'] ? 'selected' : '';
				?>
					<option <?php echo esc_attr( $selected ); ?> value="<?php echo esc_attr( $button_size ); ?>"><?php echo esc_html( ucfirst( $name ) ); ?></option>
				<?php } ?>
		</select>
	<?php
}


/**
 * Admin interface renderer
 *
 * @since 1.0
 */
function superwebshare_admin_interface_render() {

	// Check persmission.
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$active_tab = isset( $_GET['page'] ) ? wp_unslash( $_GET['page'] ) : 'superwebshare'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended,WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

	$tabs = array(
		'Floating'       => 'superwebshare',
		'Inline Content' => 'superwebshare-inline',
		'Fallback'       => 'superwebshare-fallback',
		'Appearance'     => 'superwebshare-appearance',
		'Support'        => 'superwebshare-support',
	);
	if ( isset( $_GET['settings-updated'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		if ( 'superwebshare-inline' === $active_tab ) {
			// Add settings.
			add_settings_error( 'superwebshare_settings_inline_group', 'superwebshare_settings_saved_message', __( 'Inline Content Settings saved.', 'super-web-share' ), 'updated' );

			// Show Settings Saved Message.
			settings_errors( 'superwebshare_settings_inline_group' );

		} elseif ( 'superwebshare' === $active_tab ) {
			// Add settings floating.
			add_settings_error( 'superwebshare_settings_floating_group', 'superwebshare_settings_saved_message', __( 'Floating Settings saved.', 'super-web-share' ), 'updated' );

			// Show Settings Saved Message.
			settings_errors( 'superwebshare_settings_floating_group' );

		} elseif ( 'superwebshare-fallback' === $active_tab ) {
			// Add settings fallback.
			add_settings_error( 'superwebshare_settings_fallback_group', 'superwebshare_settings_saved_message', __( 'Fallback Settings saved.', 'super-web-share' ), 'updated' );

			// Show Settings Saved Message.
			settings_errors( 'superwebshare_settings_fallback_group' );

		} elseif ( 'superwebshare-appearance' === $active_tab ) {
			// Add settings fallback.
			add_settings_error( 'superwebshare_settings_appearance_group', 'superwebshare_settings_saved_message', __( 'Appearance Settings saved.', 'super-web-share' ), 'updated' );

			// Show Settings Saved Message.
			settings_errors( 'superwebshare_settings_appearance_group' );

		}
	}

	?>
	<div class="wrap">	
		<h1>Super Web Share <sup><?php echo esc_html( SUPERWEBSHARE_VERSION ); ?></sup></h1>

			<h2 class="nav-tab-wrapper">
				<?php
				foreach ( $tabs as $name => $page ) {
					?>
							<a href="?page=<?php echo esc_attr( $page ); ?>" class="nav-tab <?php echo $active_tab === $page ? 'nav-tab-active' : ''; ?>"><?php echo esc_attr( $name ); ?></a>
					<?php
				}
				?>
			</h2>
			<form action="options.php" method="post" enctype="multipart/form-data">		
		<?php

		if ( 'superwebshare' === $active_tab ) {

			settings_fields( 'superwebshare_settings_floating_group' );
			do_settings_sections( 'superwebshare_floating_settings_section' );  // Floating Button slug.
			submit_button( __( 'Save Settings', 'super-web-share' ) );

		} elseif ( 'superwebshare-fallback' === $active_tab ) {

			// Above & Below Settings
			// Output nonce, action, and option_page fields for a settings page.
			settings_fields( 'superwebshare_settings_fallback_group' );
			do_settings_sections( 'superwebshare_fallback_settings_section' );  // Fallback Button slug.
			submit_button( __( 'Save Settings', 'super-web-share' ) );

		} elseif ( 'superwebshare-inline' === $active_tab ) {

			settings_fields( 'superwebshare_settings_inline_group' );
			do_settings_sections( 'superwebshare_inline_settings_section' );    // Inline Button settings slug.
			submit_button( __( 'Save Settings', 'super-web-share' ) );

		} elseif ( 'superwebshare-support' === $active_tab ) {
			?>
			<br>
			<h2>Need any help or facing any issues?</h2>
				<ul style="list-style-type: disc;margin-left:16px">
					<li><p>We're happy to help you! Just <a href="https://wordpress.org/support/plugin/super-web-share/#new-topic-0" target="_blank">open a new topic on WordPress.org support</a>, we will try our best to reply asap to sort out the issues or doubts. </li>
					<br>
				</ul>

			<h2>Active on Social medias?</h2>
			<p>Connect with us on our social media. You can also share your suggestions and feedback with us to improve our small plugin:</p>
				<ul style="list-style-type: disc;margin-left:16px">
					<li><a href="https://www.facebook.com/SuperWebShare/" target="_blank">Facebook</a></li>
					<li><a href="https://x.com/superwebshare" target="_blank">X (Twitter)</a></li>
					<li><a href="https://www.instagram.com/superwebshare/" target="_blank">Instagram</a></li>
					<li>Our email: <b>support@superwebshare.com</b></li>
				</ul>
			<?php
		} elseif ( 'superwebshare-appearance' === $active_tab ) {

			settings_fields( 'superwebshare_settings_appearance_group' );
			do_settings_sections( 'superwebshare_appearance_settings_section' );    // Appearance Button settings slug.
			submit_button( __( 'Save Settings', 'super-web-share' ) );
		}
		?>
		</form>
	</div>
	<?php
}

/**
 * Admin interface display list post types.
 *
 * @since 2.1
 * @param  string $key The key of settings.
 * @param  string $name Name of controller.
 * @param  array  $settings The settings of WordPress options.
 * @return void
 */
function superwebshare_display_settings( $key, $name, $settings ) {

	$post_types = superwebshare_get_pages();
	foreach ( $post_types as $post_name => $label ) {
		$checked = '';

		if ( ( isset( $settings[ $name ] ) && is_array( $settings[ $name ] ) && in_array( $post_name, $settings[ $name ] ) ) || ! get_option( $key ) ) {
			$checked = 'checked';
		}

		$text = 'Display the share button on ' . ucfirst( $label );
		?>
		<p>
			<label>
			<input type="checkbox" name="<?php echo esc_attr( $key ); ?>[<?php echo esc_attr( $name ); ?>][]" value="<?php echo esc_attr( $post_name ); ?>" <?php echo esc_attr( $checked ); ?>> 
			<?php
				esc_html_e( $text, 'super-web-share' );  // phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText
			?>
			</label>
		</p>
		<?php
	}
}

/**
 * Admin interface toggle render.
 *
 * @since 2.1
 * @param  string $name Name of the toggle.
 * @param  string $value Value of input.
 * @param  string $saved Saved value.
 * @return void
 */
function superwebshare_input_toggle( $name, $value, $saved ) {
	$rand = wp_rand( 10000, 100000 );
	?>
		<p>
			<input  class="sws-input sws-input-toggle"  id="sws-input-<?php echo esc_attr( $rand ); ?>" type="checkbox" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_html( $value ); ?>" <?php checked( $value, $saved ); ?> />
			<label data-text-is-on='<?php echo esc_html_e( 'ON', 'super-web-share' ); ?>' data-text-is-off='<?php echo esc_html_e( 'OFF', 'super-web-share' ); ?>'  for="sws-input-<?php echo esc_attr( $rand ); ?>" ></label>
		</p>
	<?php
}
