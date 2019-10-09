<?php get_header(); ?>

    <div class="container single">
        <h2 class='title-page2 blue single'>Noticias</h2>

        <div class="row flex single">
            
            <?php 
                while(have_posts()): the_post();

                $destacado = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
            ?>

                <div class="cont-post-page">

                    <div class="contImageDest">
                        <img src="<?php echo $destacado[0] ?> " alt="">
                        <?php the_content(); ?>
                    </div>

                </div>
            
                <?php endwhile; ?>

                <div class="cont-sidebar">
                    <?php get_sidebar() ?>
                </div>

        </div>
    </div>

<?php get_footer(); ?>