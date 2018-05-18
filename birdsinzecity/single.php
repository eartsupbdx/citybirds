<?php
get_header();
?>
<main role="main" style="margin-top: 25px;">
	<div class="container" style="min-height: 550px; margin-top: 10px;">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
	
			<div class="entry-content">
				
				<?php the_post_thumbnail('large', array('class' => 'alignleft')); ?>
				<?php the_content(); ?>
				
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