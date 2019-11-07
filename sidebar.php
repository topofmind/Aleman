<aside class="sidebar-widget">
    <?php  dynamic_sidebar('sidebar_widget'); ?>
    <h2>Otras noticias</h2>

    <?php 

    global $post;
    $args = array( 'posts_per_page' => 9, 'offset'=> 0);

    $myposts = get_posts( $args );
    ?>

    <div class="otherPost">

    <?php
        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            
            <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
            

        <?php endforeach; 
        wp_reset_postdata();
        ?>

    </div>
</aside>