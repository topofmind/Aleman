<?php get_header(); ?>


    <?php 

        //traemos el contenido de lo que escribimos en el editor de wordpress

        while(have_posts()): the_post();
        the_content();
        endwhile;

        
    ?>


<?php get_footer(); ?>