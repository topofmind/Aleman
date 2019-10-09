<?php 

/*
*   Template Name: page sidebar 1
*/
    $postID = get_the_ID();
    if($postID == 134 ){
        header('Location: http://localhost/wordpress/index.php/admisiones/proceso-de-admisiones/');
        echo "redirect ...";
    }else{
?>
<?php get_header(); ?>

    <div class="pages page1">
    
        

        <?php 
            //traemos lo escrito en cada pagina creada
            while(have_posts()): the_post();
                the_content();
            endwhile;
        ?>
    </div>

    <!-- <div> -->
    <?php
        // global $wp_query;
        // if( empty($wp_query->post->post_parent) ) {
        // $parent = $wp_query->post->ID;
        // } else {
        // $parent = $wp_query->post->post_parent;
        // } ?>
        <?php //if(wp_list_pages("title_li=&child_of=$parent&echo=0" )): ?>
        <!-- <div> -->
        <!-- <ul> -->
        <?php //wp_list_pages("title_li=&child_of=$parent" ); ?>
        <!-- </ul> -->
        <!-- </div> -->
    <?php //endif; ?>
    <!-- </div> -->

<?php get_footer(); 
    }
?>
