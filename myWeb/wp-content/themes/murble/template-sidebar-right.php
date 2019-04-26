<?php 
/* Template Name: Right sidebar template */
get_header();
?>
		<section id="section-latest-work" class="wrapper">
			<h3>Page/Post/Archive Title</h3>
			<div class="container">
				<article class="col">
                    <?php get_template_part("./template_parts/content");?>
                </article>
                <?php get_sidebar(); ?>
			</div>
		</section>

	<?php get_footer();?>