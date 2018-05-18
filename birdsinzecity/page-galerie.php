<?php
get_header();
?>
<main role="main" style="margin-top: 25px;">
	<div class="container" style="min-height: 550px; margin-top: 0px; color: #697891;">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="padding-top: 0;">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
	
			<div class="entry-content">
				
				<?php //the_content(); ?>

		  <div class="row" style="margin-top: 0px;">
			  <?php
			  	$args = array(
					'post_status' => 'any',
					'post_type'   => 'attachment',
					'post_parent' => 0,
					//'numberposts' => 18,
					'posts_per_page' => -1,
					'orderby' => 'date',
    				'order'=> 'DESC'
				);
				$pics_query = new WP_Query( $args );
				foreach( $pics_query->posts as $pic ){
				?>
			  <div class="col-lg-4" style="margin-bottom: 20px;">
				  <div class="galbt">
					  <span><img src="/wp-content/themes/birdsinzecity/img/btlike.png" width="25px"/></span>
					  <span><img src="/wp-content/themes/birdsinzecity/img/btshare.png" width="25px"/></span>
				  </div>
				  <img src="<?php echo $pic->guid; ?>" width="100%"/>
			  </div>
			  	<?php
				}
			  ?>
			  
		  </div>
				
				
				
			</div>	
			
			<footer class="entry-footer">
			</footer>
			
		</article>
		
		<?php
		// End the loop.
		endwhile;
		?>

		
		
	</div>
</main>

<?php get_footer() ?>