<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php bloginfo("name"); ?> - homepage</title>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/normalize.css" rel="stylesheet">
	
	<!-- polices -->
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed:400,700|Roboto+Slab:400,700" rel="stylesheet">
	
	<!-- mes styles -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/styles.css">
	<?php wp_head();?>

</head>
<body>

	<header class="main-header">
		<div class="wrapper">
			<h1 class="logo"><?php bloginfo('name');?></h1>
			<nav>

				<?php $args= array(
					'theme_location' => "primary",
					'container' => 'nav'
				);
				
				wp_nav_menu($args);?>
				<!--<ul>
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Journal</a></li>
					<li><a href="#">Service</a></li>
					<li><a href="#">Features</a></li>
					<li><a href="#">Contact</a></li>
				</ul>-->
			</nav>
			<!-- ./main navigation -->
		</div>
		<!-- ./wrapper -->
	</header>
	<!-- ./main-header -->
	
	<main>