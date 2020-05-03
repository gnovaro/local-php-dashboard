<?php
	$today = new DateTime;
	require_once('app'.DIRECTORY_SEPARATOR.'config.php');
	require_once('app'.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'dilbert.php');
	require_once('app'.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'openweathermap.php');
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Gustavo Novaro">
    <title>Dashoard · localhost</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
	<link href="/asset/vendor/bootstrap/4.4//css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
	<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
	<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
	<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
	<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#563d7c">

    <style>
	  .dropdown-item:hover {
		background: #ddd;
	  }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">roskus (local)</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

	<div class="collapse navbar-collapse" id="navbarsExampleDefault">
    	<ul class="navbar-nav mr-auto">
		<li class="nav-item active">
    		<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
  		</li>
  		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Web Develop</a>
        	<div class="dropdown-menu" aria-labelledby="dropdown01">
				<a class="dropdown-item" href="https://github.com/" target="_blank">GitHub</a>
				<a class="dropdown-item" href="https://getbootstrap.com/" target="_blank">Bootstrap</a>
				<a class="dropdown-item" href="https://www.php.net/" target="_blank">php.net</a>
				<a class="dropdown-item" href="https://laravel.com/" target="_blank">Laravel</a>
				<a class="dropdown-item" href="https://developers.google.com/web" target="_blank">Google Web Developers</a>
				<a class="dropdown-item" href="https://caniuse.com/" target="_blank">Can I use</a>
        	</div>
      	</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mobile Develop</a>
			<div class="dropdown-menu" aria-labelledby="dropdown02">
				<a class="dropdown-item" href="https://amp.dev/" target="_blank">Amp</a>
				<a class="dropdown-item" href="https://developers.google.com/gmail/ampemail?hl=en" target="_blank">Amp email</a>
				<a class="dropdown-item" href="http://mobilehtml5.org/" target="_blank">Mobile HTML</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SEO / Analytics</a>
			<div class="dropdown-menu" aria-labelledby="dropdown03">
				<a class="dropdown-item" href="" target="_blank">Google Analytics</a>
				<a class="dropdown-item" href="https://www.google.es/webmasters" target="_blank">Google Webmasters</a>
				<a class="dropdown-item" href="https://www.bing.com/toolbox/webmaster/" target="_blank">Bing Webmasters</a>
				<a class="dropdown-item" href="https://schema.org/docs/schemas.html" target="_blank">schema.org</a>
				<a class="dropdown-item" href="https://yslow.es/" target="_blank">Yslow</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Utils</a>
			<div class="dropdown-menu" aria-labelledby="dropdown04">
				<a class="dropdown-item" href="https://squoosh.app/" target="_blank">squoosh (Compress images)</a>
				<a class="dropdown-item" href="https://excalidraw.com/" target="_blank">excalidraw (Sketching / Diagrams)</a>
				<a class="dropdown-item" href="https://carbon.now.sh" target="_blank">Carbon App (Share code)</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Design</a>
			<div class="dropdown-menu" aria-labelledby="dropdown05">
				<a class="dropdown-item" href="https://fonts.google.com/" target="_blank"><strong>Google</strong> fonts</a>
				<a class="dropdown-item" href="https://fonts.adobe.com/fonts" target="_blank"><strong>Adobe</strong> fonts</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="https://material.io/resources/icons/?style=baseline" target="_blank">Material icons</a>
				<a class="dropdown-item" href="https://fontawesome.com/" target="_blank">Font Awesome</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="https://material.io/resources/color/#!/?view.left=0&view.right=0" target="_blank">Material Color</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="https://pixabay.com/es/"  target="_blank">Pixabay (Free images)</a>
				<a class="dropdown-item" href="https://undraw.co/illustrations"  target="_blank">Undraw (Free illustrations)</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="https://startbootstrap.com/themes/" target="_blank">Start Bootrap Themes</a>
			</div>
		</li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    	<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
    	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
</nav>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
		<div class="row">
			<div class="col">
				<h1 class="display-3">Hola, <?php echo $name;?>!</h1>
			</div>
			<div class="col text-right">
				<?php
				$weather = get_current_weather($OPEN_WEATHER_API_CALL_URL);
				?>
				<?php if(!empty($weather)):?>
					<span class="">
						<?php echo $weather->main->temp;?> ºC
						<img src="https://openweathermap.org/img/wn/<?php echo $weather->weather[0]->icon;?>@2x.png" width="32" alt="<?php echo $weather->weather[0]->description;?>">
					</span> |
					<span class=""><?php echo $weather->main->temp_min;?> / <?php echo $weather->main->temp_max;?></span>
				<?php endif;?>
			</div>
		</div>

      	<p><i>Hoy es:</i> <strong><?php echo $today->format('l d F Y');?></strong></p>
		<p>Son las
			<?php
					$ba_time = new DateTimeZone('America/Buenos_Aires');
					$datetime = new DateTime();
					$datetime->setTimezone($ba_time);
					echo $datetime->format('H:i');
			?> en Buenos Aires
			</p>
      	<picture>
			<img src="<?php echo get_dilbert_comic();?>" alt="Dilbert Comic">
		</picture>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
        <h2>Server information</h2>
        <p>
			<i>PHP version: <?php echo phpversion(); ?></i>
		</p>
		<p><a href="/info.php" target="_blank"><img src="/asset/img/php.png" alt="php" width="20"> PHP info</a></p>
		<p><a href="/pma" target="_blank"><img src="/asset/img/pma.png" alt="pma" width="20"> phpMyAdmin</a></p>
        <!--<p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>-->
      </div>
      <div class="col-md-4">
        <h2>Heading</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <!--<p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>-->
      </div>
      <div class="col-md-4">
        <h2>Heading</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <!--<p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>-->
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

</main>

<footer class="container">
  <p>&copy; roskus - <?php echo date('Y'); ?> </p>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/asset/vendor/jquery/3.4.1/jquery.slim.min.js"><\/script>')</script>
<script src="/asset/vendor/bootstrap/4.4/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
</body>
</html>
