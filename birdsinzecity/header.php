<!DOCTYPE html>
<html <?php language_attributes(); ?>><head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Citybirds.info // contribuez à recenser les oiseaux | <?php echo get_the_title(); ?></title>

    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/carousel.css" rel="stylesheet">
    
    
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/citybirds.css" >
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/allf.css">
    <style type="text/css">
      .fab{
        margin-left: 15px;
        margin-right: 15px;
      }
	  @font-face {
	font-family: Font Awesome\ 5 Brands;
	font-style: normal;
	font-weight: 400;
	src: url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-brands-400.eot);
	src: url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-brands-400.eot?#iefix) format("embedded-opentype"), url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-brands-400.woff2) format("woff2"), url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-brands-400.woff) format("woff"), url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-brands-400.ttf) format("truetype"), url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-brands-400.svg#fontawesome) format("svg")
}
.fab {
	font-family: Font Awesome\ 5 Brands
}
@font-face {
	font-family: Font Awesome\ 5 Free;
	font-style: normal;
	font-weight: 400;
	src: url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-regular-400.eot);
	src: url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-regular-400.eot?#iefix) format("embedded-opentype"), url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-regular-400.woff2) format("woff2"), url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-regular-400.woff) format("woff"), url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-regular-400.ttf) format("truetype"), url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-regular-400.svg#fontawesome) format("svg")
}
.far {
	font-weight: 400
}
@font-face {
	font-family: Font Awesome\ 5 Free;
	font-style: normal;
	font-weight: 900;
	src: url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-solid-900.eot);
	src: url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-solid-900.eot?#iefix) format("embedded-opentype"), url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-solid-900.woff2) format("woff2"), url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-solid-900.woff) format("woff"), url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-solid-900.ttf) format("truetype"), url(<?php echo esc_url( get_template_directory_uri() ); ?>/webfonts/fa-solid-900.svg#fontawesome) format("svg")
}
.fa, .far, .fas {
	font-family: Font Awesome\ 5 Free
}
.fa, .fas {
	font-weight: 900
}

	  
	  
    </style>
 <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5afec29e4919d9001117848d&product=inline-share-buttons' async='async'></script>   
 <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5afec29e4919d9001117848d&product=custom-share-buttons"></script>
  </head>
  <body>

    <header>
				<?php
				if ( is_user_logged_in() ) {
					//echo '<span class="nav-item"><a class="nav-link" href="/profil">Mon profil</a></span>';
					?>
        <ul class="nav justify-content-end ">
          <li class="nav-item"><a class="nav-link log-txt" href="/profil">Mon profil</a></li>
        </ul>            
                    <?php
				} else {
					//echo '<span class="nav-item"><a class="nav-link" href="#">Connexion</a></span>';
					//echo '<span class="nav-item"><a class="nav-link" href="/register">Créer un compte</a></span>';
					?>
        <ul class="nav justify-content-end ">
          <li class="nav-item"><a class="nav-link log-txt" href="/register">Inscription</a></li>
          <li class="nav-item"><a class="nav-link log-txt" href="/wp-login.php">Connexion</a></li>
        </ul>
                    <?php
				}
				?>

 
      <a href="/"><img class="img-responsive align-middle" id="logo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/logo_Citybirds.png" ></a>
      <ul class="nav justify-content-center hdr-txt">
          <li class="nav-item">
            <a class="nav-link liens" href="/a-propos/"><p>A PROPOS</p></a>
          </li>
          <li class="nav-item">
            <a class="nav-link liens" href="/contribuer/"><p>CONTRIBUER</p></a>
          </li>
          <li class="nav-item">
            <a class="nav-link liens" href="/galerie/"><p>GALERIE</p></a>
          </li>
          <li class="nav-item">
            <a class="nav-link liens" href="/carte/"><p>CARTE</p></a>
          </li>
          <li class="nav-item">
            <a class="nav-link liens" href="/oiseaux-des-villes/"><p>OISEAUX DES VILLES</p></a>
          </li>
      </ul>

    </header>

