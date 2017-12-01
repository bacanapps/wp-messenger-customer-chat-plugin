<!-- main content -->
<div id="post-body-content">
	<form method="post" action="options.php">

		<?php
	        //Grab all options
	        $options = get_option($this->plugin_name);
	    ?>

	    <?php
	        settings_fields($this->plugin_name);
	        do_settings_sections($this->plugin_name);
	    ?>

	    <div class="notice notice-info inline">
	    	<p>Miscellaneous settings.</p>
	    </div>

	    <div class="meta-box-sortables ui-sortable">

			<div class="postbox">

				<h2><span><?php esc_attr_e( 'Ref Attribute', 'WpAdminStyle' ); ?></span></h2>

				<div class="inside">

					<h4>What's This For?</h4>
					<div class="notice notice-info inline">
				    	<p>Prefix all your custom <code>ref</code> attributes. As an example you could put your domain to create full pledged URL together with the <code>refs</code> set or generated automatically by this plugin.</p>
					</div>

				    <input type="text" placeholder="https://example.com or MY_CUSTOM_PREFIX_" class="regular-text" id="<?php echo $this->plugin_name; ?>-ref_prefix" name="<?php echo $this->plugin_name; ?>[ref_prefix]" value="<?php if(!empty($options['ref_prefix'])) echo $options['ref_prefix']; ?>"/>
                    <span class="description"><?php esc_attr_e( 'Enter PREFIX to use on all ref parameters.', 'WpAdminStyle' ); ?></span><br>
					
				</div>
				<!-- .inside -->

			</div>
			<!-- .postbox -->

		</div>


		<div class="meta-box-sortables ui-sortable">

			<div class="postbox">

				<h2><span><?php esc_attr_e( 'Custom App ID For Facebook SDK', 'WpAdminStyle' ); ?></span></h2>

				<div class="inside">

					<h4>What's This For?</h4>
					<div class="notice notice-info inline">
				    	<p>You may want to use your own Facebook APP ID when initializing FB SDK.</p>
					</div>

					<h4>What This Plugin Does</h4>
					<div class="notice notice-info inline">
				    	<p>This plugin uses <code>1678638095724206</code> by default with all needed configuration to set this messenger customer chat plugin to work.</p>
					</div>

				    <input type="number" placeholder="1678638095724206" class="regular-text" id="<?php echo $this->plugin_name; ?>-custom_fb_sdk_app_id" name="<?php echo $this->plugin_name; ?>[custom_fb_sdk_app_id]" value="<?php if(!empty($options['custom_fb_sdk_app_id'])) echo $options['custom_fb_sdk_app_id']; ?>"/>
                    <span class="description"><?php esc_attr_e( 'Enter Facebook APP ID to use.', 'WpAdminStyle' ); ?></span><br>
					
				</div>
				<!-- .inside -->

			</div>
			<!-- .postbox -->

		</div>

		<?php submit_button('Save changes', 'primary','submit', TRUE); ?>

	</form>
</div>