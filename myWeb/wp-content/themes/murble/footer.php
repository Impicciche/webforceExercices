</main>
	<!-- ./main -->

	<section id="section-testimony">
		<blockquote class="wrapper">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque voluptatum, quibusdam temporibus voluptas repudiandae hic maiores eligendi repellendus, accusamus nobis laboriosam</p>
		</blockquote>
	</section>
	<!-- ./testimony -->

	<footer class="main-footer">
		<div class="wrapper">
			<div class="container">
				<?php if(is_dynamic_sidebar('footer')){
					?> <div class="footerContainer">
				<?php dynamic_sidebar('footer'); ?>
				</div>
				<?php } ?>
				<!-- ./col1 -->

				
				<!-- ./col2 -->

				
				<!-- ./col3 -->

				
				<!-- ./col4 -->

			</div>
			<!-- ./container -->

			<hr />
			<div class="footerContainer">
				<p class="copyrights">
					&copy; 2016 Murble. All rights reserved. Theme by elemis.
				</p>
					<?php 
					$argfooter = array(
						'theme_location' => 'footer',
						'container_class' => 'copyrights',
						'menu_class' => 'menuClass'
					);

					wp_nav_menu($argfooter);
					?>

			</div>
			<!-- ./copyrights -->
		</div>
	</footer>
	<!-- ./main-footer -->
	<?php wp_footer();?>
</body>
</html>