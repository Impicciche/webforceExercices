<?php get_header();

$paged = (get_query_var('paged'))?get_query_var('paged'):1;


$args = array(
    'posts_per_page' => 2,
    'order' => 'DESC',
    'orderby' => 'name',
    'paged' => $paged

);

query_posts($args);
?>
		<section id="section-latest-work" class="wrapper">
			<div class="container">
				<article class="col">

			        <h3>Hello</h3>
					<?php get_template_part("./template_parts/content");?>
				</article>
			</div>
		</section>

    <?php 
    wp_reset_postdata();


    the_posts_pagination(array(
        'mid_size' => 2,
        'prev_text' =>  'Back',
        'next_text' => 'Onward'
    ));
    get_footer();?>