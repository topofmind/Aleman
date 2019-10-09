<nav class="navMenu">
        <div class="iconMenu" id="btn-menu">
            <i class="fas fa-bars"></i>
        </div>
        <a href="<?php echo get_home_url(); ?>" class="logoMenu">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/img/logo.png" alt="Logo Colegio Aleman">
        </a>
        <div class="menusContainer" id="menuCont">
            <div class="contWidgetHeader">
            <?php  

                wp_nav_menu( array(
                    'theme_location' => 'menu_segundario',
                    'container_class' => 'widget menuHeader',
                    'container_id'    => 'contMenuSecond',
                    'menu_class' => '',
                                
                ));
            
            
            ?>

                <a href="https://alemanedu.sharepoint.com/sites/PortalPrincipal" class="intranet" target="_blank">Acceso Intranet</a>
                
                <a href="http://www.aleman.edu.co" class="intranet ci" target="_blank">Correo Institucional</a>

            </div>

            <?php  
                wp_nav_menu( array(
                    'theme_location' => 'menu_principal',
                    'container_class' => 'contMenu',
                    'container_id'    => 'contMenu',
                    'menu_class' => '',
                                
                ));
            ?>

        </div>
        <div class="bg-menu" id="bg-menu"></div>
    </nav>