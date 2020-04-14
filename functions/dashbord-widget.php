<?php
	
// Add a widget to the dashboard.

function winston_add_dashboard_widgets() {

	wp_add_dashboard_widget(
                'template_notes', // Widget slug.
                __( 'Website Notes', 'winston' ), // Title.
                'display_notes_widget' // Display function.
        );
}
add_action( 'wp_dashboard_setup', 'winston_add_dashboard_widgets' );

// Create the function to output the contents of our Dashboard Widget.

function display_notes_widget() {
	
	echo "<ul>";
	
	
	if(!is_plugin_active('meta-box/meta-box.php')){
		
		echo "<li><p style='color:red;font-weight:600;'>⚠️ URGENT: The plugin <a href='/wp-admin/plugin-install.php?tab=plugin-information&plugin=meta-box&TB_iframe=true&width=600&height=550' target='' style='text-decoration:underline;color:inherit'>Meta Box</a> needs to be installed for this theme to work properly.</p></li>";
	}
	if(!is_plugin_active('mb-settings-page/mb-settings-page.php')){
		
		echo "<li><p style='color:red;font-weight:600;'>⚠️ The plugin <a href='/wp-admin/plugins.php?action=activate&plugin=mb-settings-page%2Fmb-settings-page.php&plugin_status=all&paged=1&s&_wpnonce=1813e64dcd' target='' style='text-decoration:underline;color:inherit'>Meta Box Settings Page</a> needs to be re-installed for this theme to work properly.</p></li>";
	}
	if(!is_plugin_active('mb-admin-columns/mb-admin-columns.php')){
		
		echo "<li><p style='color:red;font-weight:600;'>⚠️ The plugin <a href='/wp-admin/plugins.php?action=activate&plugin=mb-admin-columns%2Fmb-admin-columns.php&plugin_status=all&paged=1&s&_wpnonce=b0a944a699' target='' style='text-decoration:underline;color:inherit'>Meta Box Admin Columns</a> needs to be installed for this theme to work properly.</p></li>";
	}if(!is_plugin_active('instagram-feed/instagram-feed.php')){
		
		echo "<li><p style='color:red;font-weight:600;'>⚠️ The plugin <a href='/wp-admin/plugin-install.php?tab=plugin-information&plugin=instagram-feed&TB_iframe=true&width=772&height=838' target='' style='text-decoration:underline;color:inherit'>Instagram Feed</a> needs to be installed for this theme to work properly.</p></li>";
	}
	if(is_plugin_active('meta-box/meta-box.php') || is_plugin_active('mb-settings-page/mb-settings-page.php') || is_plugin_active('mb-admin-columns/mb-admin-columns.php') || is_plugin_active('instagram-feed/instagram-feed.php')) { echo "All good!";} 
	
	echo "</ul>";
	do_action('dashboard_widget');
	
}

	
	
function general_admin_notice(){
	if(!is_plugin_active('meta-box/meta-box.php') || !is_plugin_active('mb-settings-page/mb-settings-page.php') || !is_plugin_active('mb-admin-columns/mb-admin-columns.php') || !is_plugin_active('instagram-feed/instagram-feed.php')) {
		 echo '<div class="notice notice-warning is-dismissible">
			 <p>One or more must-use plugins are not installed. The website will not work without these plugins installed.</p>
		 </div>';
	}
}
add_action('admin_notices', 'general_admin_notice');
    