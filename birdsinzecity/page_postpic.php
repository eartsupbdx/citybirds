<?php
/*
Template Name: post pic page
*/

// si données POST
if(!empty($_POST)){
	// si API KEY passée
	if( $_POST["api_key"] ){
		// user avec cette api key
		$users = new WP_User_Query( array( 'meta_key' => 'api_key', 'meta_value' => htmlspecialchars($_POST["api_key"]) ) );
		$user = $users->results[0]->data;
		$user_ID = $user->ID;
		
		// gérer l'upload de l'image et la mettre dans la bibliotheque media
		if ( $_FILES['exampleFileUpload']['name'] != "" ) {
			require_once( ABSPATH . 'wp-admin/includes/image.php' );
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			require_once( ABSPATH . 'wp-admin/includes/media.php' );
			$attachment_id = media_handle_upload( 'exampleFileUpload', 0 );
			if ( is_wp_error( $attachment_id ) ) {
				echo "erreur upload";
			} else {
				// mettre le user comme proprietaire de l'image
				$my_post = array(
				  'ID' => $attachment_id,
				  'post_author' => $user_ID
				);
				wp_update_post( $my_post );
				echo "image ok";
			}
		} else {
			echo "erreur image";
		}
	} else {
		echo "wrong api key";
	}
} else {
	echo "erreur";
}

?>