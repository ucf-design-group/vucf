<?php

function features_meta_setup() {

	add_action('add_meta_boxes','comcon_meta_add');
	add_action('save_post','comcon_meta_save');
}
add_action('load-post.php','comcon_meta_setup');
add_action('load-post-new.php','comcon_meta_setup');

function features_meta_add() {
 
	add_meta_box (
	'features_meta',
	'Leader Information',
	'features_meta',
	'features',
	'normal',
	'default');
}

function features_meta() {

	global $post;
	wp_nonce_field(basename( __FILE__ ), 'features-form-nonce' );

	$position = get_post_meta($post->ID, 'features-form-position', true) ? get_post_meta($post->ID, 'features-form-position', true) : '';
	?>
	<style type="text/css">#features-form-position{width: 200px;}#features-form-email{width: 200px;}#features-form-order{width: 50px;}#features-form div{display:inline-block; padding:0 5px;}</style>
	<div id="features-form">
		<div>
			<label for="features-form-position">Position:</label>
			<input type="text" name="features-form-position" id="features-form-position" value="<?php echo $position; ?>" />
		</div>
	</div>
	<?php
}


function features_meta_save() {

	global $post;
	$post_id = $post->ID;

	if (!isset($_POST['features-form-nonce']) || !wp_verify_nonce($_POST['features-form-nonce'], basename( __FILE__ ))) {
		return $post->ID;
	}

	$post_type = get_post_type_object($post->post_type);

	if (!current_user_can($post_type->cap->edit_post, $post_id)) {
		return $post->ID;
	}

	$input = array();

	$input['position'] = (isset($_POST['features-form-position']) ? $_POST['features-form-position'] : '');


	$input['order'] = str_pad($input['order'], 3, "0", STR_PAD_LEFT);

	foreach ($input as $field => $value) {

		$old = get_post_meta($post_id, 'features-form-' . $field, true);

		if ($value && '' == $old)
			add_post_meta($post_id, 'features-form-' . $field, $value, true );
		else if ($value && $value != $old)
			update_post_meta($post_id, 'features-form-' . $field, $value);
		else if ('' == $value && $old)
			delete_post_meta($post_id, 'features-form-' . $field, $old);
	}
}

?>