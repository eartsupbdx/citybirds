<?php
get_header();
?>
<main role="main" style="margin-top: 25px;">
	<div class="container" style="min-height: 550px; margin-top: 10px; margin-bottom: 35px; color: #697891;">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
		?>
		
			<a class="list" href="<?php echo get_the_permalink(); ?>" alt="<?php echo get_the_title(); ?>" title="Voir la fiche: <?php echo get_the_title(); ?>">
			<div class="archive-entry">
				
				<?php the_post_thumbnail('birdie', array('class' => 'alignleft')); ?>
				<?php the_title( '<h2 class="">', '</h2>' ); ?>
				<?php the_excerpt(); ?>
				
			</div>	
			</a>
		
		
		<?php
		// End the loop.
		endwhile;
		?>

		
		
	</div>
</main>

<?php get_footer() ?>