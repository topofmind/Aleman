<?php 
    /*
    *   Template Name: page full width
    */

    get_header(); 

?>

    <div class="pages full-width">
        

            <?php 
                //traemos lo escrito en cada pagina creada
                while(have_posts()): the_post();
                    the_content();
                endwhile;
            ?>
            
    </div>

<?php get_footer(); ?>