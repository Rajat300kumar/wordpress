<?php
/**
 * Team custom post type
 * This file is the basic custom post type for use any where in theme.
 */
?>
<?php
// Register Portfolio Post Type
function rs_portfolio_register_post_type() {
	$labels = array(
		'name'               => esc_html__( 'Projects', 'neuron_addon'),
		'singular_name'      => esc_html__( 'Portfolio', 'neuron_addon'),
		'add_new'            => esc_html_x( 'Add New Project', 'rsconstruction', 'neuron_addon'),
		'add_new_item'       => esc_html__( 'Add New Project', 'neuron_addon'),
		'edit_item'          => esc_html__( 'Edit Project', 'neuron_addon'),
		'new_item'           => esc_html__( 'New Project', 'neuron_addon'),
		'all_items'          => esc_html__( 'All Projects', 'neuron_addon'),
		'view_item'          => esc_html__( 'View Project', 'neuron_addon'),
		'search_items'       => esc_html__( 'Search Projects', 'neuron_addon'),
		'not_found'          => esc_html__( 'No Projects found', 'neuron_addon'),
		'not_found_in_trash' => esc_html__( 'No Projects found in Trash', 'neuron_addon'),
		'parent_item_colon'  => esc_html__( 'Parent Project:', 'neuron_addon'),
		'menu_name'          => esc_html__( 'Projects', 'neuron_addon'),
	);
	global $neuron_option;
	$portfolio_slug = (!empty($neuron_option['portfolio_slug']))? $neuron_option['portfolio_slug'] :'project';
	$args = array(
		'labels'             => $labels,
		'public'             => true,	
		'show_in_menu'       => true,
		'show_in_admin_bar'  => true,
		'can_export'         => true,
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'rewrite' => 		 array('slug' => $portfolio_slug,'with_front' => false),
		'menu_icon'          =>  plugins_url( 'img/icon.png', __FILE__ ),
		'supports'           => array( 'title', 'thumbnail','editor' ),		
	);
	register_post_type( 'portfolios', $args );
}
add_action( 'init', 'rs_portfolio_register_post_type' );
function tr_create_portfolio() {
	global $neuron_option;
	$portfolio_slug_cat = (!empty($neuron_option['portfolio_slug']))? $neuron_option['portfolio_slug'].'-category' :'portfolio-category';
	register_taxonomy(
		'portfolio-category',
		'portfolios',
		array(
			'label' => __( 'Categories','neuron_addon'),
			'rewrite' => array( 'slug' => $portfolio_slug_cat ),
			'hierarchical' => true,
			'show_admin_column' => true,
		)
	);
}
add_action( 'init', 'tr_create_portfolio' );

// Meta Box

/*--------------------------------------------------------------
*			Portfolio info
*-------------------------------------------------------------*/
function rs_portfolio_meta_box() {
	add_meta_box( 'member_info_meta', esc_html__( 'Portfolio Info', 'neuron_addon'), 'rs_portfolio_member_info_meta_callback', 'portfolios', 'advanced', 'high', 2 );
}
add_action( 'add_meta_boxes', 'rs_portfolio_meta_box');

// member info callback
function rs_portfolio_member_info_meta_callback( $portfolio_info ) {
	wp_nonce_field( 'portfolio_metabox', 'portfolio_metabox' ); ?>
	<div style="margin: 10px 0;">
		<label for="client" style="width:150px; display:inline-block;">
			<?php esc_html_e( 'Client: ', 'neuron_addon') ?>
		</label>
		<?php $client = get_post_meta( $portfolio_info->ID, 'client', true ); ?>
		<input type="text" name="client" id="client" class="client" value="<?php echo esc_html($client); ?>" style="width:300px; "/>
	</div>

	<div style="margin: 10px 0;">
		<label for="location" style="width:150px; display:inline-block;">
			<?php esc_html_e( 'Location: ', 'neuron_addon') ?>
		</label>
		<?php $location = get_post_meta( $portfolio_info->ID, 'location', true ); ?>
		<input type="text" name="location" id="location" class="location" value="<?php echo esc_html($location); ?>" style="width:300px; "/>
	</div>
	<div style="margin: 10px 0;">
		<label for="project_value" style="width:150px; display:inline-block;">
			<?php esc_html_e( 'Project Value: ', 'neuron_addon') ?>
		</label>
		<?php $project_value = get_post_meta( $portfolio_info->ID, 'project_value', true ); ?>
		<input type="text" name="project_value" id="project_value" class="project_value" value="<?php echo esc_html($project_value); ?>" style="width:300px;" />
	</div>

	<div style="margin: 10px 0;">
		<label for="date" style="width:150px; display:inline-block;">
			<?php esc_html_e( 'Year Completed: ', 'neuron_addon') ?>
		</label>
		<?php $date = get_post_meta( $portfolio_info->ID, 'date', true ); ?>
		<input type="text" name="date" id="date" class="date" value="<?php echo esc_html($date); ?>" style="width:300px;" />
	</div>

		<div style="margin: 10px 0;">
		<label for="url" style="width:150px; display:inline-block;">
			<?php esc_html_e( 'Project Demo: ', 'neuron_addon') ?>
		</label>
		<?php $url = get_post_meta( $portfolio_info->ID, 'url', true ); ?>
		<input type="text" name="url" id="url" class="url" value="<?php echo esc_html($url); ?>" style="width:300px;" />
	</div>

	
<?php }
/*--------------------------------------------------------------
 *			Save meta
*-------------------------------------------------------------*/
function save_rs_portfolio_social_meta( $post_id ) {
	if ( ! isset( $_POST['portfolio_metabox'] ) ) {
		return $post_id;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	if ( 'portfolios' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
	}
	$mymeta = array( 'tagline','url','date','location','client','project_value' );
	foreach ( $mymeta as $keys ) {

		if ( is_array( $_POST[ $keys ] ) ) {
			$data = array();

			foreach ( $_POST[ $keys ] as $key => $value ) {
				$data[] = $value;
			}
		} else {
			$data = sanitize_text_field( $_POST[ $keys ] );
		}		
		update_post_meta( $post_id, $keys, $data );
	}
}
add_action( 'save_post', 'save_rs_portfolio_social_meta' );

function rs_service_add_taxonomy_filters() {
	global $typenow;
 
	// an array of all the taxonomyies you want to display. Use the taxonomy name or slug
	$taxonomies = array('portfolio-category');
 
	// must set this to the post type you want the filter(s) displayed on
	if( $typenow == 'portfolios' ){
 
		foreach ($taxonomies as $tax_slug) {
			$tax_obj = get_taxonomy($tax_slug);
			$tax_name = $tax_obj->labels->name;
			$terms = get_terms($tax_slug);
			if(count($terms) > 0) {
				echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
				echo "<option value=''>Show All $tax_name</option>";
				foreach ($terms as $term) { 
					echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 
				}
				echo "</select>";
			}
		}
	}
}
add_action( 'restrict_manage_posts', 'rs_service_add_taxonomy_filters' );