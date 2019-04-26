<?php 
function marble_setup(){
    register_nav_menu('primary', 'Primary Navigation Menu');
    register_nav_menu('footer', 'Footer Navigation Menu');

    add_theme_support('thumbnail');
}

add_action( 'after_setup_theme', 'marble_setup' );

function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => 'Sidebar Widget area',
        'id' => 'sidebar',
        'description' => 'Widget area for the website sidebar',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
        ) );

        register_sidebar( array(
            'name' => 'Footer Widget area',
            'id' => 'footer',
            'description' => 'Widget area for the website sidebar',
            'before_widget' => '<div id="%1$s" class="col widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
            ) );
    }
    
    add_action( 'widgets_init', 'theme_slug_widgets_init' );

    add_image_size('image-size1', 250, 200, $crop);
    add_image_size('frontpage-thumb', 380, 270, true);



    require(get_template_directory() . '/inc/custom-posts.php');
    
?>