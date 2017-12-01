<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.paypal.me/dorelljames
 * @since      1.0.0
 *
 * @package    WPMCCP
 * @subpackage WPMCCP/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h1><?php echo esc_html(get_admin_page_title()); ?></h1>

	<p>Facebook recently made available in open beta their <a href="https://developers.facebook.com/docs/messenger-platform/discovery/customer-chat-plugin" target="_blank">Messenger Customer Chat Plugin</a> which allows you to integrate your Messenger experience directly into your website.</p>

	<p>Don't be left out about the cool stuff. Just follow the instructions below... :)</p>

	<?php
        $active_tab = isset($_GET[ 'tab' ]) ? $_GET[ 'tab' ] : 'general';
    ?>
     
    <h2 class="nav-tab-wrapper">
        <a href="?page=wpmccp&tab=general" class="nav-tab <?php echo $active_tab == 'general' ? 'nav-tab-active' : ''; ?>">General</a>
        <a href="?page=wpmccp&tab=ref_options" class="nav-tab <?php echo $active_tab == 'ref_options' ? 'nav-tab-active' : ''; ?>">Ref Options</a>
    </h2>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<?php if ( ! isset($active_tab) || $active_tab === 'general' ) : ?>
				
				<!-- main content -->
				<div id="post-body-content">
					<form method="post" action="options.php">
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

								<h2><span><?php esc_attr_e( 'Facebok Page (Messenger Platform Whitelisted Domains)', 'WpAdminStyle' ); ?></span></h2>

								<div class="inside">

									<p>Add your website's domain to <strong>Whitelisted Domains</strong> on your Facebook Page. Go to your <strong>Facebook Page</strong> &gt; <strong>Settings</strong> &gt; <strong>Messenger Platform</strong> then scroll below and find <strong>Whitelisted Domains</strong>.</p>

									<p>Example: <strong>https://dorelljames.com</strong></p>

									<img src="https://dorelljames.com/wordpress/wp-content/uploads/2017/11/messenger-whitelist-domain.png" alt="" class="alignnone size-full wp-image-1845" />
									<br/>
								</div>
								<!-- .inside -->

							</div>
							<!-- .postbox -->

						</div>
						
						<div class="meta-box-sortables ui-sortable">

							<div class="postbox">

								<h2><span><?php esc_attr_e( 'Facebok Page ID', 'WpAdminStyle' ); ?></span></h2>

								<div class="inside">

									<p>Let's look up your <strong>Facebook Page ID</strong> which we need to set this up. For this, let's use a free service at <a href="https://findmyfbid.in/" target="_blank" rel="noopener">Find Your Facebook ID</a> and paste your Facebook Page URL.</p>

									<p>Example: <strong>https://www.facebook.com/iamDJBot</strong></p>

									<p><strong>IMPORTANT: Take note of the number.</strong></p>

									<img class="alignnone size-full wp-image-1825" src="https://dorelljames.com/wordpress/wp-content/uploads/2017/11/findfbid.jpg" alt="" />

									<p>Alternatively, you can go to your <strong>Facebook Page</strong> &gt; <strong>About</strong> and scroll down bottom until you see <strong>Page ID</strong>.</p>

									<img class="alignone size-full wp-image-1826" src="https://dorelljames.com/wordpress/wp-content/uploads/2017/11/Screen-Shot-2017-11-30-at-11.26.41-AM.png" alt="" width="1051" height="607" />

									<br/>

									<p>Now, enter your <strong>Facebook Page ID</strong> below and that's it. Congratulations!</p>

			                        <input type="number" class="regular-text" id="<?php echo $this->plugin_name; ?>-facebook_page_id" name="<?php echo $this->plugin_name; ?>[facebook_page_id]" value="<?php if(!empty($facebook_page_id)) echo $facebook_page_id; ?>"/>
			                        <span class="description"><?php esc_attr_e( 'Enter Facebook Page ID.', 'WpAdminStyle' ); ?></span><br>

							        <?php submit_button('Save changes', 'primary','submit', TRUE); ?>
								</div>
								<!-- .inside -->

							</div>
							<!-- .postbox -->

						</div>
						<!-- .meta-box-sortables .ui-sortable -->

						

					</form>
				</div>
				<!-- post-body-content -->

			<?php else: ?>

				<div id="post-body-content">
					<form method="post" action="options.php">
						<div class="meta-box-sortables ui-sortable">

							<div class="postbox">

								<h2><span><?php esc_attr_e( 'Ref Parameters', 'WpAdminStyle' ); ?></span></h2>

								<div class="inside">

									<p>The plugin automatically sets the <strong>"ref"</strong> parameter to the current slug of the page, post or custom post type. However, you can customize them if you like to below.</p>

									<?php
						        		//Grab all options
						        		$options = get_option($this->plugin_name);
						        		var_dump($options);
						        		var_dump(isset($options["ref"]));
					        		?>

									 <?php 
										$pages = get_pages(); 

										foreach ( $pages as $page ) {
											// var_dump($page);
											$option = '<p><a href="'. get_page_link( $page->ID ) . '" target="_blank">';
											$option .= $page->post_title;
											$option .= '</a>';
											$var = isset($options["ref"]) ? $options["ref"][$page->ID] : "";
											$option .= '<input type="text" class="regular-text" id="' . $this->plugin_name . '-ref-' . $page->ID . '" name="' . $this->plugin_name . '[ref][' . $page->ID . ']" value="' .  $var . '"/>';
					
											$option .= '</p>';
											echo $option;
										}
									?>

									<?php submit_button('Save changes', 'primary','submit', TRUE); ?>

								</div>
								<!-- .inside -->

							</div>
							<!-- .postbox -->

						</div>
					</form>
				</div>

			<?php endif ?>

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">

						<h2><span><?php esc_attr_e(
									'Development Roadmap', 'WpAdminStyle'
								); ?></span></h2>

						<div class="inside">
							<p>Plugin is basically just a starter. I am still planning to add more features to it.</p>
							<a href="https://trello.com/b/XWcfMnfp" target="_blank">View Roadmap</a>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>

				<div class="meta-box-sortables">

					<div class="postbox">

						<h2><span><?php esc_attr_e(
									'Donation', 'WpAdminStyle'
								); ?></span></h2>

						<div class="inside">
							<p>Buy me coffee, beer or tea. Any amount will help to continue improving this plugin.</p>
							<a href="https://paypal.me/dorelljames" target="_blank">paypal.me/dorelljames</a>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>

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