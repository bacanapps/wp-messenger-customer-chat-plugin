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

	<p>Facebook recently made available in open beta their <a href="https://developers.facebook.com/docs/messenger-platform/discovery/customer-chat-plugin" target="_blank">Messenger Customer Chat Plugin</a> which allows you to integrate your Messenger experience directly into your website. Get yours today!</p>

	<?php
        $active_tab = isset($_GET[ 'tab' ]) ? $_GET[ 'tab' ] : 'required';
    ?>
     
    <h2 class="nav-tab-wrapper">
        <a href="?page=wpmccp&tab=required" class="nav-tab <?php echo $active_tab == 'required' ? 'nav-tab-active' : ''; ?>">Required</a>
        <a href="?page=wpmccp&tab=options" class="nav-tab <?php echo $active_tab == 'options' ? 'nav-tab-active' : ''; ?>">Options</a>
        <a href="?page=wpmccp&tab=misc" class="nav-tab <?php echo $active_tab == 'misc' ? 'nav-tab-active' : ''; ?>">Misc</a>
    </h2>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<?php
				if ( ! isset($active_tab) || $active_tab === 'required' ) {
					require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/tabs/wpmccp-required_tab.php';
				} elseif ( ! isset($active_tab) || $active_tab === 'options' ) {
					require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/tabs/wpmccp-options_tab.php';
				} else {
					require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/tabs/wpmccp-misc_tab.php';
				}
			?>

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<?php require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/sidebar/wpmccp-right_sidebar.php'; ?>

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->