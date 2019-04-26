<?php get_header();?>

		<section class="jumbotron">
			<div class="wrapper">
				<h2>We are digital &amp; branding agency based in London.</h2>
				<h3>We love to turn great ideas into beautiful products.</h3>
				<a href="#" class="button">See portfolio</a>
			</div>
		</section>
		<!-- ./jumbotron -->

		
		<section id="section-icons" class="wrapper">
			<div class="container">
				<div class="col">
					<i class="icon lamp"></i>
					<h4>Pellentesque</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div>
				<!-- ./col1 -->
				<div class="col">
					<i class="icon clock"></i>
					<h4>Consectetur</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div>
				<!-- ./col2 -->
				<div class="col">
					<i class="icon flask"></i>
					<h4>Tristiquet</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div>
				<!-- ./col3 -->
				<div class="col">
					<i class="icon ticket"></i>
					<h4>Fermentum</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, quasi facere, animi maxime natus cupiditate</p>
				</div>
				<!-- ./col4 -->
			</div>

			<hr />

		</section>
		
		<section id="section-latest-work" class="wrapper">
			<h3>Our latest works</h3>
			<div class="container">

			<?php 
			$args = array(
				'post_type' => 'project',
				'orderby' => 'DESC',
				'post_per_page' => 3,
				'post_status' => 'publish'

			);

			$query = new WP_Query($args);

			if($query->have_posts()){
				while($query->have_posts()){
					$query->the_post();
					?>
						<article class="col">
							<?php the_post_thumbnail('frontpage-thumb'); ?>
							<h4><a href="<?php the_permalink(get_the_ID()); ?>"><?php the_title(); ?></a></h4>
							<h5><?php the_terms(get_the_ID(), "type", '' , ' - ' , '');?></h5>
							<p><?php the_content(); ?></p>
							<p>Date creation: <?php get_post_meta(get_the_ID(), 'date_creation', true); ?></p>
							<p>Client: <?php the_field('client'); ?></p>
							<p>Date Start: <?php the_field('date_start'); ?></p>
							<p>Date End: <?php the_field('date_end'); ?></p>
						</article>

				<?php
				}
			} ?>

				
			</div>
		</section>

		<section id="section-latest-news" class="wrapper">
			<h3>Our latest news</h3>
			<div class="container">
			<?php 
				$args = array(
					'posts_per_page' => 3,
					'order' => 'DESC',
					'post_type' => 'post',
					'post_status' => 'publish'
				);

				$query = new WP_Query($args);

				if($query->have_posts()){
					while($query->have_posts()){
						$query->the_post();
						?>

							<article class="col">
							<?php if(has_post_thumbnail()){
								the_post_thumbnail('frontpage-thumb');
							}else{
								echo '<img src="' . get_stylesheet_directory_uri() . '/img/default.png" alt="Default image" style="width:380px;height:270px;"/>';
							}?>
								<h4><?php the_title(); ?></h4>
								<h5><?php the_category(); ?><?php the_author(); ?> - <?= get_the_date(); ?></h5>
								<p><?php the_excerpt(); ?></p>
							</article>

						<?php
					}
				}
				else{
						echo "No post to show.";
				}
			?>
			<!--
				-->
				
			</div>
		</section>

	<?php 
	wp_reset_postdata();
	get_footer();?>