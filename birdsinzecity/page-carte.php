<?php
get_header();
?>
<main role="main" style="margin-top: 25px;">
	<div class="container" style="min-height: 550px; margin-top: 0px; color: #697891;">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="padding-top: 0!important;">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
	
			<div class="entry-content">
				<style>
                 #map {
					height: 500px;
				 }
                </style>
				<div id="map"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: new google.maps.LatLng(44.8637065,-0.6561808),
          mapTypeId: 'terrain'
        });

        var script = document.createElement('script');
        script.src = '<?php echo esc_url( get_template_directory_uri() ); ?>/oizo_GeoJSONP.js';
        document.getElementsByTagName('head')[0].appendChild(script);
      }

      window.eqfeed_callback = function(results) {
        for (var i = 0; i < results.features.length; i++) {
          var coords = results.features[i].geometry.coordinates;
          var latLng = new google.maps.LatLng(coords[0],coords[1]);
          var marker = new google.maps.Marker({
            position: latLng,
            map: map,
			icon:'<?php echo esc_url( get_template_directory_uri() ); ?>/img/map-marker-icon.png'
          });
        }
      }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMAOrzpAsIHNWob5H1wQLMjrQqLgkJkxU&callback=initMap"></script>
				
				
				
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