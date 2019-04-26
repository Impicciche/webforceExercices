<?php 



if(have_posts()){
    while(have_posts()){
        the_post();
        ?>
        <div class="postContainer">
            <h1><?php if(is_singular()){
                the_title();
            }
            else{
                
                echo '<a href="' . get_the_permalink(get_the_ID()) . '">' . get_the_title() . '</a>';
            } ?></h1>
            <p class="thumbnailBox"><?php 
                if(is_singular())
                {
                    the_content();
                }
                else
                    {
                
                    if(has_post_thumbnail())
                        echo '<img src="' . get_the_post_thumbnail_url(null,'image-size1') . '"/>';
                    else
                        echo '<img src="' . get_template_directory_uri() . '/img/default.png"/>';

                    echo '<p class="descPost">' . the_excerpt() . '</p>';
                }
            ?>
            </p>
        </div>
        <?php
    }
}
else{
    echo "<p>Nothing to display</p>";
}





?>
