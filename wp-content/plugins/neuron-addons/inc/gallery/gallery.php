<?php
/**
 * Team custom post type
 * This file is the basic custom post type for use any where in theme.
 * @link http://www.rstheme.com
 */
?>
<?php
// Register Gallery Post Type
function sponsor_client_register_post_type() {
	$labels = array(
		'name'               => esc_html__( 'Gallery', 'neuron_addon' ),
		'singular_name'      => esc_html__( 'Gallery', 'neuron_addon' ),
		'add_new'            => esc_html_x( 'Add New Gallery', 'neuron_addon' ),
		'add_new_item'       => esc_html__( 'Add New Gallery', 'neuron_addon' ),
		'edit_item'          => esc_html__( 'Edit Gallery', 'neuron_addon' ),
		'new_item'           => esc_html__( 'New Gallery', 'neuron_addon' ),
		'all_items'          => esc_html__( 'All Gallery', 'neuron_addon' ),
		'view_item'          => esc_html__( 'View Gallery', 'neuron_addon' ),
		'search_items'       => esc_html__( 'Search Gallery', 'neuron_addon' ),
		'not_found'          => esc_html__( 'No Gallery found', 'neuron_addon' ),
		'not_found_in_trash' => esc_html__( 'No Gallery found in Trash', 'neuron_addon' ),
		'parent_item_colon'  => esc_html__( 'Parent Gallery:', 'neuron_addon' ),
		'menu_name'          => esc_html__( 'Gallery', 'neuron_addon' ),
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => false,
		'show_in_menu'       => true,
		'show_in_admin_bar'  => true,
		'can_export'         => true,
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'          =>  plugins_url( 'img/icon.png', __FILE__ ),
		'supports'           => array( 'title' ),		
	);
	register_post_type( 'gallery', $args );
}
add_action( 'init', 'sponsor_client_register_post_type' );