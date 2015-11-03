<?php

/* Allow Post Thumbnails to be used */

function setup_thumbnails() {

	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'setup_thumbnails');

/* Remove menus from the admin dashboard */


function remove_menus() {

	/* Pages removed for all users, including administrators. */

	remove_menu_page('edit.php');
		remove_submenu_page('edit.php', 'post-new.php');
		remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
		remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
	remove_menu_page('upload.php');
		remove_submenu_page('upload.php', 'media-new.php');
	remove_menu_page('link-manager.php');
		remove_submenu_page('link-manager.php', 'link-add.php');
		remove_submenu_page('link-manager.php', 'edit-tags.php?taxonomy=link_category');
	remove_menu_page('edit-comments.php');

	$user = wp_get_current_user();
	if ($user->wp_capabilities['administrator'] != 1) {

			remove_submenu_page('index.php', 'update-core.php');
		//remove_menu_page('edit.php?post_type=page');
			//remove_submenu_page('edit.php', 'post-new.php?post_type=page');
		remove_menu_page('themes.php');
			remove_submenu_page('themes.php', 'widgets.php');
			remove_submenu_page('themes.php', 'nav-menus.php');
			remove_submenu_page('themes.php', 'theme-editor.php');
		remove_menu_page('plugins.php');
			remove_submenu_page('plugins.php', 'plugin-install.php');
			remove_submenu_page('plugins.php', 'plugin-editor.php');
		//remove_menu_page('users.php');
			remove_submenu_page('users.php', 'user-new.php');
			//remove_submenu_page('users.php', 'profile.php');
		remove_menu_page('tools.php');
			remove_submenu_page('tools.php', 'import.php');
			remove_submenu_page('tools.php', 'export.php');
		// remove_menu_page('options-general.php');
		// 	remove_submenu_page( 'options-general.php', 'options-writing.php' );
		// 	remove_submenu_page( 'options-general.php', 'options-reading.php' );
		// 	remove_submenu_page( 'options-general.php', 'options-discussion.php' );
		// 	remove_submenu_page( 'options-general.php', 'options-media.php' );
		// 	remove_submenu_page( 'options-general.php', 'options-permalink.php' );
	}
};
add_action('admin_menu', 'remove_menus');


/* Custom Post Types */

function custom_post_types() {

	register_post_type('interests', array(
		'labels' => array(
			'name' => 'Social Interests',
			'singular_name' => 'Interest'),
		'public' => true,
		'hierarchical' => false,
		'supports' => array('title', 'editor'),
		'has_archive' => false,
		));

	register_post_type('leadership', array(
		'labels' => array(
			'name' => 'Leadership',
			'singular_name' => 'Leader'),
		'public' => true,
		'hierarchical' => false,
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array('category'),
		'has_archive' => false,
		));

	register_post_type('updates', array(
		'labels' => array(
			'name' => 'Updates',
			'singular_name' => 'Update'),
		'public' => true,
		'hierarchical' => false,
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'taxonomies' => array(),
		'has_archive' => false,
		));
}
add_action('init', 'custom_post_types');


/* Change dashboard icons for the custom post types. */

function cpt_icons() {

	?>
	<style type="text/css" media="screen">
		#menu-posts-interests .wp-menu-image {
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/resources/cpt-interests.png) no-repeat 6px -17px !important;
		}
		#menu-posts-leadership .wp-menu-image {
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/resources/cpt-leadership.png) no-repeat 6px -17px !important;
		}
		#menu-posts-updates .wp-menu-image {
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/resources/cpt-updates.png) no-repeat 6px -17px !important;
		}
		#menu-posts-interests:hover .wp-menu-image, #menu-posts-interests.wp-has-current-submenu .wp-menu-image,
		#menu-posts-leadership:hover .wp-menu-image, #menu-posts-leadership.wp-has-current-submenu .wp-menu-image,
		#menu-posts-updates:hover .wp-menu-image, #menu-posts-updates.wp-has-current-submenu .wp-menu-image {
			background-position: 6px 7px!important;
		}
	</style>
	<?php
}
add_action('admin_head', 'cpt_icons');


include_once("functions/functions-leadership.php");
include_once("functions/functions-nav.php");
include_once("functions/functions-updates.php");

?>