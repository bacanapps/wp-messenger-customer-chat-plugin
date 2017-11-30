<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.paypal.me/dorelljames
 * @since      1.0.0
 *
 * @package    Wp_Messenger_Customer_Chat_Plugin
 * @subpackage Wp_Messenger_Customer_Chat_Plugin/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
	<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h1><?php echo esc_html(get_admin_page_title()); ?></h1>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">
				<form method="post" name="cleanup_options" action="options.php">
					<?php
				        //Grab all options
				        $options = get_option($this->plugin_name);

				        // Cleanup
				        $facebook_page_id = $options['facebook_page_id'];
				    ?>

				    <?php
				        settings_fields($this->plugin_name);
				        do_settings_sections($this->plugin_name);
				    ?>
					
					<div class="meta-box-sortables ui-sortable">

						<div class="postbox">

							<h2><span><?php esc_attr_e( 'Facebok Page ID', 'WpAdminStyle' ); ?></span></h2>

							<div class="inside">

								<p><?php esc_attr_e(
										'Facebook Messenger Chatbots are tied up with Facebook Pages. In order for this plugin to work, you need to provide your Facebook Page ID below.',
										'WpAdminStyle'
									); ?></p>

				                    <fieldset>
				                        <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
				                        <input type="number" class="regular-text" id="<?php echo $this->plugin_name; ?>-facebook_page_id" name="<?php echo $this->plugin_name; ?>[facebook_page_id]" value="<?php if(!empty($facebook_page_id)) echo $facebook_page_id; ?>"/>
				                    </fieldset>
						        </fieldset>

						        <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>
							</div>
							<!-- .inside -->

						</div>
						<!-- .postbox -->

					</div>
					<!-- .meta-box-sortables .ui-sortable -->
				</form>
			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">

						<h2><span><?php esc_attr_e(
									'Useful Links', 'WpAdminStyle'
								); ?></span></h2>

						<div class="inside">
							<a href="https://blog.messengerdevelopers.com/messenger-customer-chat-open-beta-16b11879637" target="_blank">
								<?php esc_attr_e(
									'Get Started With Customer Chat (Now in open beta)',
									'WpAdminStyle'
								); ?>
							</a>
							<br /><br />
							<a href="https://developers.facebook.com/docs/messenger-platform/discovery/customer-chat-plugin" target="_blank">
								<?php esc_attr_e(
									'Facebook Developers - Customer Chat Plugin (beta)',
									'WpAdminStyle'
								); ?>
							</a>
							<br /><br />
							<a href="https://dorelljames.com/web-development/adding-messenger-customer-chat-plugin-wordpress-site/" target="_blank">
								<?php esc_attr_e(
									'Adding Messenger Customer Chat Plugin To Your WordPress Site',
									'WpAdminStyle'
								); ?>
							</a>

						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->