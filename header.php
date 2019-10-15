<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
  	<meta http-equiv="Last-Modified" content="0">
  	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  	<meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php 
    //bloginfo('name');
    $post = $wp_query->get_queried_object();  
    echo $post->post_name; 
    ?></title>
    <?php  wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<div class="large">
    
<header class="header-site">



<?php if (is_front_page()) { ?>

    <?php get_template_part('/template_part/nav-absolute') ?>

    <div class="contBanner" id="contBanner">
        
        <div class="contSlider no-anim active info" numslide="0">

            <img class="full-width" src="<?php echo get_stylesheet_directory_uri() ?>/img/banner-contador.jpg" alt="Bienvenido al Colegio Alemán" class="imgBanner">

            <img  src="<?php echo get_stylesheet_directory_uri() ?>/img/banner-contador-responsive.jpg" alt="Bienvenido al Colegio Alemán" class="imgBanner banner-responsive">

            <div class="textBanner clock">
                <div class="contTime" id='clock'>
                    <div id="d"></div>
                    <div id="h"></div>
                    <div id="m"></div>
                    <div id="s"></div>
                </div>
            </div>
        </div>

        <div class="contSlider info" numslide="1">

            <img class="full-width" src="<?php echo get_stylesheet_directory_uri() ?>/img/banner-7.jpg" alt="Bienvenido al Colegio Alemán" class="imgBanner">

            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/banner-7-responsive.jpg" alt="Bienvenido al Colegio Alemán" class="imgBanner banner-responsive">
            
            <div class="textBanner">
            </div>
        </div>
        <div class="contSlider " numslide="2">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/banner-6.jpg" alt="Bienvenido al Colegio Alemán" class="imgBanner">
            <div class="textBanner">
                <h2>Formamos ciudadanos para el mundo</h2>
            </div>
        </div>
        
        <div class="contSlider" numslide="3">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/banner-5.jpg" alt="Bienvenido al Colegio Alemán" class="imgBanner">
            <div class="textBanner">
                <h2> Excelencia académica</h2>
            </div>
        </div>
        
        <div class="contSlider" numslide="4">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/banner-4.jpg" alt="Bienvenido al Colegio Alemán" class="imgBanner">
            <div class="textBanner">
                <h2>4 idiomas</h2>
            </div>
        </div>

        <div id="contDots" class="contDots">
			<div class="dot active" numslide="0"></div>
			<div class="dot" numslide="1"></div>
			<div class="dot" numslide="2"></div>
			<div class="dot" numslide="3"></div>
			<div class="dot" numslide="4"></div>
		</div>

    </div>

<?php }else{  ?>

<?php

     get_template_part('/template_part/nav-relative');

    $destacado = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

    $template = get_post_meta( $post->ID, '_wp_page_template', true );
    if($template == 'page.sidebar-1.php' || $template == 'page.sidebar-2.php' || $template == 'single.php' || $template == 'page.php' || $template == 'page.full-width.php' ){  ?>

    <div class="contBanner sidebar1">

        <?php 
        
            if(is_array($destacado)){
                
            $bannerCount = strlen($destacado[0]);
            }
        
        ?>

        <?php if($bannerCount > 0){ ?>
            <img src="<?php echo $destacado[0]; ?>" alt="Bienvenido al Colegio Alemán" class="imgBanner">
        <?php }else{ ?>
            <div class="fill"></div>
    </div>

<?php 
        }

    } 

};
?>
</header>

