<?php
/*
Template Name: profil Page
*/

the_post();
get_header();

if ( is_user_logged_in() ) {
	$current_user = wp_get_current_user();
    ?>
<main role="main" style="margin-top: 25px; margin-bottom: 50px;color: #697891!important;">
	<div class="container" style="margin-top: 10px;">
			<header class="entry-header" style="padding:0;">
				<h3 class="entry-title">Mes informations</h3>
			</header>

		<?php
	
	echo 'Pseudo: ' . $current_user->user_login . '<br />';
    echo 'Email: ' . $current_user->user_email . '<br />';
    echo 'Prénom: ' . $current_user->user_firstname . '<br />';
    echo 'Nom: ' . $current_user->user_lastname . '<br />';
    //echo 'User display name: ' . $current_user->display_name . '<br />';
    //echo 'User ID: ' . $current_user->ID . '<br />';
	
	$user_api_key = get_user_meta( $current_user->ID, 'api_key', true ); 
	echo 'Clé API: ' . $user_api_key;
		?>
	</div>
	
	<div class="container" style="margin-top: 20px;">
		<header class="entry-header" style="padding:0;">
				<h3 class="entry-title">Mes images</h3>
			</header>
		<div class="picsmosaic">
	<?php
	$args = array(
	   'author'      => $current_user->ID,
	   'post_status' => 'any',
	   'post_type'   => 'attachment',
		'post_parent' => 0,
		'posts_per_page' => -1
	);
	$pics_query = new WP_Query( $args );
	//print_r( $pics_query );
	foreach( $pics_query->posts as $pic ){
		/*
		[ID] => 39 [post_author] => 1 [post_date] => 2018-05-05 11:19:27 [post_date_gmt] => 2018-05-05 09:19:27 [post_content] => [post_title] => image [post_excerpt] => [post_status] => inherit [comment_status] => open [ping_status] => closed [post_password] => [post_name] => image-3 [to_ping] => [pinged] => [post_modified] => 2018-05-05 11:19:27 [post_modified_gmt] => 2018-05-05 09:19:27 [post_content_filtered] => [post_parent] => 0 [guid] => http://www.citybirds.info/wp-content/uploads/2018/05/image-2.jpg [menu_order] => 0 [post_type] => attachment [post_mime_type] => image/jpeg [comment_count] => 0 [filter] => raw
		*/
		?>
			<div class="pic">
				<img title="Suprimer l'image" class="bt_del_pic" onClick="delete_pic_from_front(<?php echo $pic->ID; ?>);" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icon_del.png"/>
				<img src="<?php echo $pic->guid; ?>"/>
				<p class="pic_titre">
					<input type="text" value="<?php echo $pic->post_title; ?>" onChange="update_pic_title_from_front(<?php echo $pic->ID; ?>, this.value);" /> 
					<br/>
					<small><?php echo $pic->post_date; ?></small>
				</p>
			</div>
		<?php
	}
	?>
		</div>
	
	</div>
	
</main>

<?php
} else {

}
?>

<?php get_footer() ?>