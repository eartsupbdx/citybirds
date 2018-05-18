<?php
add_theme_support( 'post-thumbnails' );
add_image_size( 'birdie', 220, 180, true ); // 220 pixels wide by 180 pixels tall, hard crop mode
add_image_size( 'caroussel', 1200, 900, true );

// générer l'api KEY quand le user s'inscrit
add_action( 'user_register', 'generate_api_key', 10, 1 );
function generate_api_key( $user_id ) {
	$api_key = '';
    $seed1 = rand(0, 9999);
	$seed2 = rand(0, 9999);
	$api_key = str_replace(' ', $seed1, microtime());
	$api_key = str_replace('.', $seed2, $api_key);
	update_user_meta( $user_id, 'api_key', $api_key);
}

// connecter le user après inscription et le rediriger vers son profil
function auto_login_new_user( $user_id ) {
        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id);
        wp_redirect( '/profil' );
        exit;
}
add_action( 'user_register', 'auto_login_new_user' );

// empecher les abonnés de voir le back office
function redirect_admin(){
    if ( ! defined('DOING_AJAX') && ! current_user_can('edit_posts') ) {
        wp_redirect( site_url() );
        exit;      
    }
}
add_action( 'admin_init', 'redirect_admin' );

// back office : afficher les champs custom dans les profils
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
    <table class="form-table">
    <tr>
        <th><label for="api_key">API KEY</label></th>
        <td>
            <input type="text" name="api_key" id="api_key" value="<?php echo esc_attr( get_the_author_meta( 'api_key', $user->ID ) ); ?>" class="regular-text" />
        </td>
    </tr>
    </table>
<?php }

// back office : sauvegarder les champs custom dans les profils
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'api_key', $_POST['api_key'] );
}

// custom post types
function custom_post_types() {
	$labels = array(
		'name'                => 'Oiseaux',
		'singular_name'       => 'Oiseau',
		'menu_name'           => 'Oiseaux',
		'all_items'           => 'Tous les oiseaux',
		'view_item'           => 'Voir les oiseaux',
		'add_new_item'        => 'Ajouter un oiseau',
		'add_new'             => 'Ajouter',
		'edit_item'           => 'Editer l\'oiseau',
		'update_item'         => 'Mettre à jour l\'oiseau',
		'search_items'        => 'Rechercher un oiseau',
		'not_found'           => 'Non trouvé',
		'not_found_in_trash'  => 'Non trouvé dans la corbeille',
	);
	$args = array(
		'label'               => 'Oiseaux des villes',
		'description'         => 'Fiches oiseaux des villes',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'oiseaux-des-villes'),

	);
	register_post_type( 'oiseaux', $args );
}
add_action( 'init', 'custom_post_types', 0 );

// AJAX supprimer image from front
add_action( 'wp_ajax_delete_pic_from_front', 'delete_pic_from_front' );
add_action( 'wp_ajax_nopriv_delete_pic_from_front', 'delete_pic_from_front' );

function delete_pic_from_front() {
	$user_id = wp_get_current_user()->ID;
	$pic_id = wp_strip_all_tags( $_POST['pic_id'] );
	wp_delete_attachment( $pic_id );
	echo 'image supprimée : ' . $pic_id;
	die();
}

// AJAX update image title from front
add_action( 'wp_ajax_update_pic_title_from_front', 'update_pic_title_from_front' );
add_action( 'wp_ajax_nopriv_update_pic_title_from_front', 'update_pic_title_from_front' );

function update_pic_title_from_front() {
	$user_id = wp_get_current_user()->ID;
	$pic_id = wp_strip_all_tags( $_POST['pic_id'] );
	$pic_title = wp_strip_all_tags( $_POST['pic_title'] );
	//wp_delete_attachment( $pic_id );
	//wp_update_attachment_metadata( $pic_id, $data );
	$attachment = array(
	  'ID' => $pic_id,
	  'post_title' => $pic_title
	);
	wp_update_post( $attachment );
	echo 'image mise à jour : ' . $pic_id;
	die();
}


// custom loginpage
function modify_logo() {
    $logo_style = '<style type="text/css">';
    $logo_style .= 'h1 a {background-image: url(' . get_template_directory_uri() . '/logo_Citybirds.png) !important;}';
    $logo_style .= '</style>';
    echo $logo_style;
}
add_action('login_head', 'modify_logo');
function custom_login_css() {
    wp_enqueue_style('login-styles', get_template_directory_uri() . '/login.css');
}
add_action('login_enqueue_scripts', 'custom_login_css');

function wpse127636_register_url($link){
    return str_replace(site_url('wp-login.php?action=register', 'login'),site_url('register', 'login'),$link);
}
add_filter('register','wpse127636_register_url');

?>