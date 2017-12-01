<div id="post-body-content">
	<form method="post" action="options.php">
		<div class="meta-box-sortables ui-sortable">

			<div class="postbox">

				<h2><span><?php esc_attr_e( 'Ref Attribute', 'WpAdminStyle' ); ?></span></h2>

				<div class="inside">

					<h4>What's This For?</h4>
					<div class="notice notice-info inline">
						<p><?php printf( esc_attr__( 'If the %s attribute is set in the include for the customer chat plugin, messenger will be will include the string in the postback event such as clicking the Get Started button or upon continued conversation on the plugin. %s', 'WpAdminStyle' ), '<code>ref</code>', '<a href="https://developers.facebook.com/docs/messenger-platform/discovery/customer-chat-plugin#step3" target="_blank">Click here to learn more</a>.' ); ?></p>
					</div>
					<div class="notice notice-info inline">
						<p><?php printf( esc_attr__( 'The %s can be any string and can be used for a variety of purposes. For example, you could use it to keep track of which customers have engaged with your business via the plugin.', 'WpAdminStyle' ), '<code>ref</code>' ); ?></p>
					</div>

					<h4>What The Plugin Does</h4>
					<div class="notice notice-info inline">
						<p>The plugin automatically sets the <code>ref</code> parameter to the <code>current slug</code> of the <strong>page</strong>, <strong>post</strong> or any supported <strong>custom post type</strong> in your Wordpress site. However, you can customize them below.</p>
					</div>
					<br />

					<?php
		        		// Grab all options
		        		$options = get_option($this->plugin_name);
	        		?>

					<?php
				        settings_fields($this->plugin_name);
				        do_settings_sections($this->plugin_name);
				    ?>

				    <h4>Go and set them below.</h4>
				    <hr />

					<h3>Pages</h3>
					<?php 
						$pages = get_pages(); 

						foreach ( $pages as $page ) {

							$current_placeholder = isset($options['ref_prefix']) && ! empty($options['ref_prefix']) ? $options['ref_prefix'] . $page->post_name : $page->post_name;

							// var_dump($page);
							$option = '<p><a href="'. get_page_link( $page->ID ) . '" target="_blank">';
							$option .= $page->post_title;
							$option .= '</a>';
							$option .= ' (ID: ' . $page->ID . ')';
							$var = isset($options["ref"]) ? $options["ref"][$page->ID] : "";
							$option .= ' <input type="text" placeholder="' . $current_placeholder  . '" class="all-options" id="' . $this->plugin_name . '-ref-' . $page->ID . '" name="' . $this->plugin_name . '[ref][' . $page->ID . ']" value="' .  $var . '"/>';
	
							$option .= '</p>';
							echo $option;
						}
					?>

					<br>
					<hr>

					<h3>Posts</h3>
					<?php 
						$posts = get_posts(); 

						foreach ( $posts as $post ) {

							$current_placeholder = isset($options['ref_prefix']) && ! empty($options['ref_prefix']) ? $options['ref_prefix'] . $post->post_name : $post->post_name;

							$option = '<p><a href="'. get_page_link( $post->ID ) . '" target="_blank">';
							$option .= $post->post_title;
							$option .= '</a>';
							$option .= ' (ID: ' . $post->ID . ')';
							$var = isset($options["ref"]) ? $options["ref"][$post->ID] : "";
							$option .= ' <input type="text" placeholder="' . $current_placeholder . '" class="all-options" id="' . $this->plugin_name . '-ref-' . $post->ID . '" name="' . $this->plugin_name . '[ref][' . $post->ID . ']" value="' .  $var . '"/>';
	
							$option .= '</p>';
							echo $option;
						}
					?>

					<br>
					<hr>

					<h3>Other Custom Post Types</h3>
					<?php $post_types = get_post_types(); ?>

					<?php
						$found_custom_post_type = false;
						foreach ( get_post_types( '', 'names' ) as $post_type ) {
							if ( ! in_array($post_type, ['page', 'post', 'attachment', 'revision', 'nav_menu_item', 'custom_css', 'customize_changeset', 'oembed_cache']) ) {
								$found_custom_post_type = true;
						   		echo '<p>' . $post_type . '</p>';
							}	
						}

						// No custom post type, so nothing to do
						if ( ! $found_custom_post_type ) {
							echo '<p>No custom post type found.</p>';
						}
					?>

					<?php submit_button('Save changes', 'primary','submit', TRUE); ?>
				</div>
				<!-- .inside -->

			</div>
			<!-- .postbox -->

		</div>

		<div class="meta-box-sortables ui-sortable">

			<div class="postbox">

				<h2><span><?php esc_attr_e( 'Minimized Attribute', 'WpAdminStyle' ); ?></span></h2>

				<div class="inside">

					<h4>What's This For?</h4>
					<div class="notice notice-info inline">
						<p><?php printf( esc_attr__( 'The %s attribute: specifies whether the plugin greeting text should be minimized or shown. Defaults to %s on desktop and %s on mobile browsers.', 'WpAdminStyle' ), '<code>minimized</code>', '<code>false</code>', '<code>true</code>' ); ?></p>
					</div>

					<h4>What The Plugin Does</h4>
					<div class="notice notice-info inline">
						<p>The plugin automatically defaults this attribute to <strong>false</strong>. Select appropriately below if you'd like to change it.</p>
					</div>
					<br />

					<select id="<?php echo $this->plugin_name; ?>-is_minimized" name="<?php echo $this->plugin_name; ?>[is_minimized]">
						<option <?php echo isset($options["is_minimized"]) && ! $options["is_minimized"] ? 'selected="selected"' : '' ?> value="FALSE">False - Show only the Messenger Logo</option>
						<option <?php echo isset($options["is_minimized"]) && $options["is_minimized"] ? 'selected="selected"' : '' ?>  value="TRUE">True - Show the Messenger logo and a “Need Help” greeting bubble</option>
					</select>
                    <span class="description"><?php esc_attr_e( 'Default is false.', 'WpAdminStyle' ); ?></span><br>

			        <?php submit_button('Save changes', 'primary','submit', TRUE); ?>
				</div>
				<!-- .inside -->

			</div>
			<!-- .postbox -->

		</div>

	</form>
</div>