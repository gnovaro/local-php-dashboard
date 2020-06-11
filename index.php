<?php
	$today = new DateTime;
	require_once('app'.DIRECTORY_SEPARATOR.'config.php');
	require_once('app'.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'dilbert.php');
	require_once('app'.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'openweathermap.php');
	require_once('app'.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'ToDo.php');
	require_once('app'.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'feed.php');

	$menus = require_once('app'.DIRECTORY_SEPARATOR.'menu_links.php');

	$todo = new ToDo();
	try {
		$tasks = $todo->getAllPendingTasks();
	} catch(\Throwable $t) {
  		// PHP 7
		var_dump($t);
	}

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
		<?php
		if(!empty($menus))
		foreach($menus as $menu):
		?>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $menu['name'];?></a>
			<?php
			if(!empty($menu['links'])):
			?>
			<div class="dropdown-menu" aria-labelledby="dropdown01">
			<?php
			foreach($menu['links'] as $link):
				if(!empty($link['url'])):
			?>
				<a class="dropdown-item" href="<?php echo $link['url'];?>" target="_blank"><?php echo $link['name'];?></a>
			<?php
				else:
			?>
				<div class="dropdown-divider"></div>
			<?php
				endif;
			endforeach;
			?>
			</div>
			<?php
			endif;
			?>
		</li>
		<?php
		endforeach;
		?>
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
				<h1 class="display-4">Hola, <?php echo $name;?>!</h1>
			</div>
			<div class="col text-right">
				<?php
				$weather = get_current_weather($OPEN_WEATHER_API_CALL_URL);
				?>
				<?php if(!empty($weather)):?>
					<span class="" data-toggle="tooltip" data-placement="bottom" title="<?php echo $weather->weather[0]->description;?>">
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
        <h2>News</h2>
		<?php
		$feeds = get_rss_feed($RSS_URL,$RSS2JSON_API_KEY);
		if($feeds):
			if($feeds['status'] == 'ok'):
				$f = 0;
		        foreach ($feeds['items'] as $item):
		?>
        <p>
			<a href="<?php echo $item['link'];?>" target="_blank"><?php echo $item['title'];?></a>
		</p>
		<?php
					if($f < $RSS_FEED_LIMIT) {
						$f++;
					} else {
						break;
					}
				endforeach;

			endif;
		endif;
		?>
        <!--<p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>-->
      </div>
      <div class="col-md-4">
        <h2>TO DO List</h2>
        <form method="post" action="/" class="form-inline">
			<div class="input-group">
				<input type="text" name="task" placeholder="Tarea" required class="form-control">
				<div class="input-group-append">
					<button type="submit" class="btn btn-outline-primary btn-xs">+</button>
				</div>
			</div>
		</form>

		<table class="table table-bordered table-striped table-sm mt-2">
		<thead>
		<tr>
			<th width="90%">Task</th>
			<th>Done</th>
		</tr>
		</thead>
		<tbody>
			<?php
			if(!empty($tasks)):
				foreach ($tasks as $task):
			?>
			<tr>
				<td>
					<?php echo $task->description;?>
				</td>
				<td>
					<input type="checkbox" value="<?php echo $task->id;?>">
				</td>
			</tr>
			<?php
				endforeach;
			else:
			?>
			<tr>
				<td colspan="2">No pending tasks.</td>
			</tr>
			<?php
			endif;
			?>
		</tbody>
		</table>
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
