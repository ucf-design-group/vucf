<?php

function comcon_meta_setup() {

	add_action('add_meta_boxes','comcon_meta_add');
	add_action('save_post','comcon_meta_save');
}
add_action('load-post.php','comcon_meta_setup');
add_action('load-post-new.php','comcon_meta_setup');

function comcon_meta_add() {
 
	add_meta_box (
	'comcon_meta',
	'Leader Information',
	'comcon_meta',
	'comcon',
	'normal',
	'default');
}

function comcon_meta() {

	global $post;
	wp_nonce_field(basename( __FILE__ ), 'comcon-form-nonce' );

	$position = get_post_meta($post->ID, 'comcon-form-position', true) ? get_post_meta($post->ID, 'comcon-form-position', true) : '';
	$major = get_post_meta($post->ID, 'comcon-form-major', true) ? get_post_meta($post->ID, 'comcon-form-major', true) : '';
	$email = get_post_meta($post->ID, 'comcon-form-email', true) ? get_post_meta($post->ID, 'comcon-form-email', true) : '';
	$order = get_post_meta($post->ID, 'comcon-form-order', true) ? get_post_meta($post->ID, 'comcon-form-order', true) : '';

	?>
	<style type="text/css">#comcon-form-position{width: 200px;}#comcon-form-email{width: 200px;}#comcon-form-order{width: 50px;}#comcon-form div{display:inline-block; padding:0 5px;}</style>
	<div id="comcon-form">
		<div>
			<label for="comcon-form-position">Class:</label>
			<input type="text" name="comcon-form-position" id="comcon-form-position" value="<?php echo $position; ?>" />
			<label for="comcon-form-major">Major:</label>
			<input type="text" name="comcon-form-major" id="comcon-form-major" value="<?php echo $major; ?>" />
		</div>
	</div>
	<?php
}


function comcon_meta_save() {

	global $post;
	$post_id = $post->ID;

	if (!isset($_POST['comcon-form-nonce']) || !wp_verify_nonce($_POST['comcon-form-nonce'], basename( __FILE__ ))) {
		return $post->ID;
	}

	$post_type = get_post_type_object($post->post_type);

	if (!current_user_can($post_type->cap->edit_post, $post_id)) {
		return $post->ID;
	}

	$input = array();

	$input['position'] = (isset($_POST['comcon-form-position']) ? $_POST['comcon-form-position'] : '');

	$input['major'] = (isset($_POST['comcon-form-major']) ? $_POST['comcon-form-major'] : '');


	$input['order'] = str_pad($input['order'], 3, "0", STR_PAD_LEFT);

	foreach ($input as $field => $value) {

		$old = get_post_meta($post_id, 'comcon-form-' . $field, true);

		if ($value && '' == $old)
			add_post_meta($post_id, 'comcon-form-' . $field, $value, true );
		else if ($value && $value != $old)
			update_post_meta($post_id, 'comcon-form-' . $field, $value);
		else if ('' == $value && $old)
			delete_post_meta($post_id, 'comcon-form-' . $field, $old);
	}
}

?>