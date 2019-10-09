<?php 

/*
*   Template Name: page sidebar 2
*/

    $postID = get_the_ID();
    if($postID == 156 ){
        header('Location: http://localhost/wordpress/index.php/admisiones/proposito/');
        echo "redirect ...";
    }else{

?>
        <?php get_header(); ?>

        <?php get_header(); ?>

            <div class="pages page2">

            <?php  
                
            
            ?>
                
                <?php 
                    //traemos lo escrito en cada pagina creada
                    while(have_posts()): the_post();
                        the_content();
                    endwhile;
                ?>
            </div>

        <?php get_footer(); ?>

    <?php } ?>