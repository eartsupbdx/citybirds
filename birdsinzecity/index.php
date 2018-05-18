<?php get_header(); ?>

    <main role="main">


      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row" style="border-bottom: #eee 1px solid;">
        <div class="col-lg-12" style="padding:0; margin-bottom:25px;">
        <img width="100%" src="http://www.citybirds.info/wp-content/uploads/2018/05/32831293_1274120609388699_44113587622379520_n.jpg" />
        </div>
        	
          <div class="col-lg-6 bgbloc">
            <h2 style="margin-top: 30px; margin-bottom: 30px;">Pas encore inscrit ?</h2>
            <p>Nous recensons les oiseaux, nous collectons et nous partageons les données. Rejoignez-dès aujourd'hui notre communauté !</p>
            <p><a class="btn btn-secondary" href="/register" role="button">Inscription</a></p>
          </div><!-- /.col-lg-4 -->
          
          <div class="col-lg-6 bgbloc2">
			  <img src="/wp-content/themes/birdsinzecity/logo_Citybirds.png" width="100px">
			  <h2 style="margin-top: 30px; margin-bottom: 30px;">Qu'est-ce que c'est ?</h2>
              <?php
			  	$post = get_post( 105 );
				$output =  wp_trim_words( $post->post_content, 25, null ); //wp_trim_excerpt( $post->post_content );
			  ?>
			  <p><?php echo $output; ?></p>
              <p><a class="btn btn-secondary" href="/a-propos" role="button">En savoir plus</a></p>
          </div><!-- /.col-lg-4 -->
          
        </div><!-- /.row -->
		
		
		  <div class="row" style="margin-top: 70px;">
			  <?php
			  	$args = array(
					'post_status' => 'any',
					'post_type'   => 'attachment',
					'post_parent' => 0,
					'numberposts' => 6,
					'posts_per_page' => 6,
					'orderby' => 'rand',
    				'order'=> 'ASC'
				);
				$pics_query = new WP_Query( $args );
				foreach( $pics_query->posts as $pic ){
				?>
			  <div class="col-lg-4">
				  <div class="galbt">
					  <span data-network="facebook" class="st-custom-button"><img src="/wp-content/themes/birdsinzecity/img/btlike.png" width="25px"/></span>
					  <span data-network="sharethis" class="st-custom-button"><img src="/wp-content/themes/birdsinzecity/img/btshare.png" width="25px"/></span>
				  </div>
				  <img src="<?php echo $pic->guid; ?>" width="100%"/>
				  
			  </div>
			  	<?php
				}
			  ?>
			  
			  <div style=" text-align: center; width: 100%; margin-top: 40px; margin-bottom: 40px;">
				  <a class="btn btn-secondary" href="/galerie" role="button">Voir la galerie</a>
			  </div>
		  </div>
		  
		  <div class="row" style="background-color: #e3e8ec;">
			  <div class="col-lg-6 bgbloc3">
				  <h3><br/>Les oiseaux disparaissent<br/>des campagnes françaises<br/>à une vitesse vertigineuse</h3>
			  </div>
			  <div class="col-lg-6 bgbloc3">
				  <p>Le printemps risque fort d’être silencieux. Le Muséum national d’histoire naturelle (MNHN) et le Centre national de la recherche scientifique (CNRS) annoncent, mardi 20 mars, les résultats principaux de deux réseaux de suivi des oiseaux sur le territoire français et évoquent un phénomène de « disparition massive » ...</p>
				  <p><a target="_blank" class="btn btn-secondary" href="http://www.lemonde.fr/biodiversite/article/2018/03/20/les-oiseaux-disparaissent-des-campagnes-francaises-a-une-vitesse-vertigineuse_5273420_1652692.html" role="button">Lire l'article</a></p>
			  </div>
		  </div>

       

      </div><!-- /.container -->


<?php get_footer(); ?>