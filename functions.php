<?php

    function aleman_styles(){
        
        wp_enqueue_style('style', get_stylesheet_uri().'?version=1.5');

        wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js?version=1.7', true);

        //wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
        
        wp_enqueue_style('Open Sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,800&display=swap' );
        
        wp_enqueue_style('Quicksand', 'https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap' );
        
        //wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), '4.3.1', true);

        wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css?version=1.5');
    }

    add_action('wp_enqueue_scripts', 'aleman_styles');

    add_theme_support('post-thumbnails');

    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

    define('WP_CACHE', false); //Added by WP-Cache Manager  
    define('DISABLE_CACHE', true);


    //active al menu actual
    function special_nav_class ($classes, $item) {
      if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
      }
      return $classes;
    }

    //remover saltos de linea automaticos
    function remove_content_auto_line_breaks() {
      // Remove the auto-paragraph and auto-line-break from the content
      remove_filter( 'the_content', 'wpautop' );
  
      // Remove the auto-paragraph and auto-line-break from the excerpt
      remove_filter( 'the_excerpt', 'wpautop' );
  }
    remove_content_auto_line_breaks();

    /** Activar Menù de Navvegación **/
    
    register_nav_menus(
		array(
			'menu_principal' => __( 'Menu Principal', 'aleman' ),
      'menu_sociales' => __( 'Menu Redes Sociales', 'aleman' ),
      'menu_segundario' => __( 'Menu Segundario', 'aleman' ),
		)
    );
    
    /*agregando tamaños fijos a imagenes*/
   add_image_size('entradas', 750, 490, true);




    /*agregamos un widget para el footer*/
   function aleman_widgets(){
     
    register_sidebar(array(
       'name' => __('Footer Widget'),
       'id' => 'footer_widget',
       'description' => 'Widget para el footer de la página',
       'before_widget' => '<div id="%1$s" class="widget col %2$s">',
       'after_widget' => '</div>',
       'before_title' => '<h3 class="widget-title">',
       'after_title' => '</h3>'
     ));

   }
   
   add_action('widgets_init', 'aleman_widgets');

//------------- CODIGO SHORTCODES ------------------ //


//SHORTCODES COLUMNAS

function maxWidth_medium_flex_shortcode($atts, $content = null){
  extract(shortcode_atts(array(
    'bottom' => '',
    'clase' => ''
) , $atts));

    $content = apply_filters('the_content', $content);
    return "<div class='medium flex ".$bottom." ".$clase."'> ". do_shortcode($content)."</div>";
}

add_shortcode('medium_flex','maxWidth_medium_flex_shortcode');

function otros_enlaces_shortcode($atts, $content = null){
  $content = apply_filters('the_content', $content);
  return "<div class='otros-enlaces'> ". do_shortcode($content)."</div>";
}

add_shortcode('otros_enlaces','otros_enlaces_shortcode');

function comunidad_shortcode($atts, $content = null){
  $content = apply_filters('the_content', $content);
  return "<div class='comunidad'> ".do_shortcode($content)."</div>";
}

add_shortcode('comunidad','comunidad_shortcode');

function comunidad_img_shortcode($atts, $content = null){

  extract(shortcode_atts(array(
    'class' => ''
) , $atts));
  $content = apply_filters('the_content', $content);
  return "<div class='cont-comunidad ".$class."'> ".do_shortcode($content)."</div>";
}

add_shortcode('comunidad_img','comunidad_img_shortcode');

function certificados_img_shortcode($atts, $content = null){
  $content = apply_filters('the_content', $content);
  return "<div class='cont-certificados'> ".do_shortcode($content)."</div>";
}

add_shortcode('certificados_img','certificados_img_shortcode');



function page1_template_shortcode($atts, $content = null){
  $content = apply_filters('the_content', $content);
  return "<div class='contPage1'> ".do_shortcode($content)."</div>";
}

add_shortcode('page1_template','page1_template_shortcode');

function pageSidebar1_template_shortcode($atts, $content = null){

  extract(shortcode_atts(array(
    'class' => ''
  ) , $atts));

  $content = apply_filters('the_content', $content);

  return "<div class=' sidebarP sidebarPage1 ".$class."'> 
          ".do_shortcode($content).
          "</div>";
}

add_shortcode('page_sidebar1_template','pageSidebar1_template_shortcode');


function cont_submenus_shortcode($atts, $content = null){
  $content = apply_filters('the_content', $content);

  return "<div id='contSubmenus' class='cont-submenus'> 
          ".do_shortcode($content).
          "</div>";
}

add_shortcode('cont_submenus','cont_submenus_shortcode');


function page2_template_shortcode($atts, $content = null){
  $content = apply_filters('the_content', $content);

  extract(shortcode_atts(array(
    'class' => ''
) , $atts));

  return "<div class='contPage2 ".$class."'> ".do_shortcode($content)."</div>";
}

add_shortcode('page2_template','page2_template_shortcode');

function pageSidebar2_template_shortcode($atts, $content = null){
  $content = apply_filters('the_content', $content);
  return "<div class='sidebarP sidebarPage2'> ".do_shortcode($content)."</div>";
}

add_shortcode('page_sidebar2_template','pageSidebar2_template_shortcode');

function grid_layout_shortcode($atts, $content = null){
  extract(shortcode_atts(array(
    'src' => '',
    'version_grid' => 'v1',
) , $atts));

    $grid ='<div class="grid-layout '.$version_grid.'">';

    $no_whitespaces = preg_replace( '/\s*,\s*/', ',', filter_var( $src, FILTER_SANITIZE_STRING ) ); 
    $href_array = explode( ',', $no_whitespaces );


    foreach ($href_array as $key => $value) {
        $grid .='<div class="cont-img-grid">
                <img src="'.$value.'">
                </div>';
    }
    
    $grid .='</div>';

    return $grid;

}
add_shortcode('grid_layout','grid_layout_shortcode');


function col_1_shortcode($atts, $content = null){

  $content = apply_filters('the_content', $content);
  return "<div class='col-1'> ".do_shortcode($content)."</div>";
    
}
add_shortcode('col1','col_1_shortcode');

function col_2_shortcode($atts, $content = null){

  $content = apply_filters('the_content', $content);
  return "<div class='col-2'> ".do_shortcode($content)."</div>";
    
}
add_shortcode('col2','col_2_shortcode');

function col_3_shortcode($atts, $content = null){

  $content = apply_filters('the_content', $content);
  return "<div class='col-3'> ".do_shortcode($content)."</div>";
    
}
add_shortcode('col3','col_3_shortcode');

function col_4_shortcode($atts, $content = null){

  $content = apply_filters('the_content', $content);
  return "<div class='col-4'> ".do_shortcode($content)."</div>";
    
}
add_shortcode('col4','col_4_shortcode');

function flex_shortcode($atts, $content = null){

  extract(shortcode_atts(array(
    'class' => '',
), $atts));

  $content = apply_filters('the_content', $content);
  return "<div class='flex ".$class."'> ".do_shortcode($content)."</div>";
    
}
add_shortcode('flex','flex_shortcode');

function page_full_width_shortcode($atts, $content = null){

  extract(shortcode_atts(array(
    'class' => '',
  ), $atts));

  $content = apply_filters('the_content', $content);
  return "<div class='page-full-width ".$class."'> ".do_shortcode($content)."</div>";
    
}
add_shortcode('page_full_width','page_full_width_shortcode');

function img_vertical_shortcode($atts, $content = null){

  $content = apply_filters('the_content', $content);
  return "<div class='image-vertical'> ".do_shortcode($content)."</div>";
    
}
add_shortcode('img_vertical','img_vertical_shortcode');

//SHORTCODES DE DISEÑO

function home_title_descption_shortcode($atts, $content = null){

  extract(shortcode_atts(array(
    'title' => '',
    'color' => '',
), $atts));

  $content = apply_filters('the_content', $content);
  return "<h1 class='titleHome'>".$title."</h1> 
        <p class='descriptionHome'>".$content."</p>";
    
}
add_shortcode('home_title_descption','home_title_descption_shortcode');


function btn_link_shortcode($atts, $content = null){

  extract(shortcode_atts(array(
    'href' => '',
    'color' => '',
), $atts));

  $content = apply_filters('the_content', $content);
  return "<a href='".$href."' class='btn-link".$color."'> 
        <i class='fas fa-external-link-alt'></i>
        ".do_shortcode($content)."
      </a>";
    
}
add_shortcode('btn_link','btn_link_shortcode');

function card_blue_shortcode($atts, $content = null){
  extract(shortcode_atts(array(
    'title' => '',
    'mail' => '',
    'tel' => '',
    'wp' => '',
    'dir' => '',
    'pbx' => ''
), $atts));

return '<div class="card-blue">
          <h3 class="title">'.$title.'</h3>
          <p>'.$mail.'</p>
          <p>'.$tel.'</p>
          <p>'.$wp.'</p>
          <p>'.$dir.'</p>
          <p>'.$pbx.'</p>
        </div>';
}
add_shortcode('card_blue','card_blue_shortcode');


function pageSidebar1_submenu_shortcode($atts, $content = null){
  extract(shortcode_atts(array(
    'url' => '',
    'text_link' => '',
    'active' => '',
    'class' => '',
    'target' => ''
  ), $atts));
  
  return "<div class='page-item-submenu1 ".$active." ".$class."'>
  <a href='".$url."' target='".$target."'>".$text_link."</a>     
  </div>";
}
add_shortcode('submenu1','pageSidebar1_submenu_shortcode');

function pageSidebar1_submenu_contentItems_shortcode($atts, $content = null){
  extract(shortcode_atts(array(
      'url' => '',
      'text_link' => '',
      'active' => '',
      'class' => ''
  ), $atts));
            
    return "<div class='page-item-submenu1 subSubmenus".$active." ".$class."'>
              <a>".$text_link." <i class='submenuicon fas fa-chevron-down'></i></a>
              
              <div class='contentItems'>
                ".do_shortcode($content)."
              </div>   
            </div>";
  }
  add_shortcode('submenu1_contentItems','pageSidebar1_submenu_contentItems_shortcode');

function submenu1_items_shortcode($atts, $content = null){
  extract(shortcode_atts(array(
    'url' => '',
    'text_link' => '',
    'active' => '',
    'class' => '',
    'target' => '',
    'subrayar' => '',
), $atts));

  return "<div class='page-item-submenu1 items ".$active." ".$class."'>
            <a href='".$url."' target='".$target."'><i class='fas fa-level-up-alt'></i>
            ".$text_link." <span class='subrayar'>".$subrayar."</span></a>     
          </div>";
}
add_shortcode('submenu1_items','submenu1_items_shortcode');

function submenu1_items_container_shortcode($atts, $content = null){
  extract(shortcode_atts(array(
    'url' => '',
    'text_link' => '',
    'active' => '',
    'class' => ''
), $atts));

  return "<div class='page-item-submenu1 items container ".$active." ".$class."'>
            <a><i class='submenuicon fas fa-chevron-down'></i>
            <i class='fas fa-level-up-alt'></i>
            ".$text_link."</a>
            <div class='itemsContainer'>".do_shortcode($content)."</div>    
          </div>";
}
add_shortcode('submenu1_items_container','submenu1_items_container_shortcode');

function pageSidebar2_submenu_shortcode($atts, $content = null){
  extract(shortcode_atts(array(
    'icon' => 'fas fa-caret-right',
    'url' => '',
    'text_link' => '',
    'active' => '',
    'target' => ''
), $atts));

  return "
          <div class='page-item-submenu2 ".$active."'> 
            <i class='".$icon."'></i> 
            <a href='".$url."' target='".$target."'>".$text_link."</a>     
          </div>";
}
add_shortcode('submenu2','pageSidebar2_submenu_shortcode');

function pageSidebar2_submenu_subitems_shortcode($atts, $content = null){
  extract(shortcode_atts(array(
    'icon' => 'fas fa-caret-right',
    'url' => '',
    'text_link' => '',
    'active' => '',
    'target' => ''
), $atts));

  if ($active == 'active') {
      $icon = 'fas fa-caret-down';
  }

  return "
          <div class='page-item-submenu2 subitem ".$active."'> 
            <div class='item-principal'>
            <i class='".$icon."'></i> 
            <a href='".$url."' target='".$target."'>".$text_link."</a>
            </div>
            ".$content."    
          </div>";
}
add_shortcode('submenu2_subitems','pageSidebar2_submenu_subitems_shortcode');

function pageSidebar2_subitems_shortcode($atts, $content = null){
  extract(shortcode_atts(array(
    'icon' => 'fas fa-caret-right',
    'url' => '',
    'text_link' => '',
    'active' => '',
    'target' => ''
), $atts));

  return "
          <div class='cont-subitem ".$active."'> 
            <a href='".$url."' target='".$target."'>".$text_link."</a>   
          </div>";
}
add_shortcode('subitems','pageSidebar2_subitems_shortcode');



function title_submenu2_shortcode($atts, $content = null){
  extract(shortcode_atts(array(
    'title_section' => '',
    
) , $atts));

  return "<h3 id='titleSubMenus'>".$title_section."<i class='fas fa-chevron-down'></i></h3>";
}

add_shortcode('title_submenu2','title_submenu2_shortcode');

function card_horizontal_shortcode($atts, $content = null){
  extract(shortcode_atts(array(
    'title' => '',
    'text_button' => '',
    'src' => '',
    'link'=> ''
), $atts));

  return "<div class='cont-card'>
          <div class='card-img'>
            <img src=".$src." alt=".$title." />
          </div>
          <div class='info-card'>
            <h2>".$title."</h2>
            <a href='".$link."' class='btn-card' id='btnModal' target='_blank' >
            ".$text_button."
            </a>      
          </div>
  </div>";
}
add_shortcode('card_horizontal','card_horizontal_shortcode');


function title_page1_shortcode($atts, $content = null){
  extract(shortcode_atts(array(
    'color_bg' => 'blue',
), $atts));

  return "<div class='title-page1 ".$color_bg."'>
          <span></span>
          <h1>".$content."</h1>      
  </div>";
}
add_shortcode('title_page1','title_page1_shortcode');

function title_page2_shortcode($atts, $content = null){
  extract(shortcode_atts(array(
    'color_bg' => 'blue',
), $atts));

  return "<div class='title-page2 ".$color_bg."'>
          <span></span>
          <h1>".$content."</h1>      
  </div>";
}
add_shortcode('title_page2','title_page2_shortcode');

function title_line_shortcode($atts, $content = null){
  
  extract(shortcode_atts(array(
    'text' => '',
), $atts));

  return "<h2 class='title-line'>".$text."</h2>"; 
}

add_shortcode('title_line','title_line_shortcode');

function otros_links_shortdoce($atts, $content = null){


  extract(shortcode_atts( array(
    'url' => '',
    'icon' => 'far fa-arrow-alt-circle-down',
    'target' => ''
  ), $atts));


  $contLink = "<div class='link-otros'>";
  $contLink .="<a href='".$url."' target='".$target."'>";
  $contLink .="<i class='".$icon."'></i>";
  $contLink .=' '.$content;
  $contLink .="</a>";
  $contLink .="</div>";
    
  return  $contLink;
}
add_shortcode('otros_links','otros_links_shortdoce');



function circule_box_shortcode($atts, $content = null){

  $circule_atts = shortcode_atts( array(
    'src' => '',
    'alt' => '',
    'color' => 'black',
    'icon' => 'fas fa-lightbulb',
    'title' => 'Lorem',
    'textlink' => 'Ver más Información',
    'link' => ''

  ), $atts );
  
  $circuleStyles = '
  <div class="box-principal">
    <div class="img-box">
        <img src="'.esc_attr($circule_atts['src']).'" alt="'.esc_attr($circule_atts['alt']).'">

        <div class="contIcon '.esc_attr($circule_atts['color']).'">
            <i class="'.esc_attr($circule_atts['icon']).'"></i>
        </div>
    </div>
    <div class="textBox">
        <h3 class="titleBox">'.esc_attr($circule_atts['title']).'</h3>
        <p>'.$content.'</p>
        <a href="'.esc_attr($circule_atts['link']).'" class="btn-info">'.esc_attr($circule_atts['textlink']).'</a>
    </div>
</div>
  ';
    
	return $circuleStyles;
}

add_shortcode('circule_box','circule_box_shortcode');


function shortcode_recientes($atts, $content = null, $code) {
 
  extract(shortcode_atts(array(
      'limite' => 3,
      'longitud_titulo' => 100,
      'longitud_desc' => 80,
      'thumbnail' => true,
      'tamano' => 360
  ), $atts));

  $query = array('cat'=>$categorias,'showposts' => $limite, 'orderby'=> 'date', 'order'=>'DESC', 'post_status' => 'publish', 'ignore_sticky_posts' => 1);

  $q = new WP_Query($query);
  if ($q->have_posts()) :

  $salida  = '<div class="inicio-noticia">
  <div class="medium">
      <h2 class="title-noticia">Noticias</h2>   
      <div class="cont-box-noticia">';

  /* comienzo while */
  while ($q->have_posts()) : $q->the_post();
  $salida .= '<div class="box-noticia">';

  $cats =  get_the_category();
  $cat = $cats[0];
  $cat_name = $cat->name;

  // $salida .= '<p>'.$cat_name.'</p>';
                    
  if($cat_name == 'Sin categoría'){
    $salida .= '<a href="'.get_permalink().'">';
  }else{
    $salida .= '<a href="'.$cat->description.'" target="_blank">';
    
  }
  
  if ( has_post_thumbnail() && $thumbnail == true):
  $salida .= '<div class="box-noticia-img">';
  $salida .= get_the_post_thumbnail(get_the_id(),'entrada',array('title'=>get_the_title(),'alt'=>get_the_title(),'class'=>'imgEntradasTumb'));
  endif;
  $salida .='<div class="date-noticia">';
  $salida .= get_post_time( get_option( 'date_format' ));


  $salida .='</div>';
  $salida .='</div>';
  $salida .= '<h3 class="title-box-noticia">';
  $salida .= wp_html_excerpt (get_the_title(), $longitud_titulo );
  $salida .= '</h3>';
  $salida .= '</a>';
  $salida .='</div>';

  endwhile;
  wp_reset_query();
  /* fin while */

  endif;

  $salida .= '</div>
   </div>
  </div>
  </div>
  </div>
  </div>';

  return $salida;

}

add_shortcode('recientes',  'shortcode_recientes');


function title_post_single_shortcode($atts, $content = null, $code){

  return '<h1 class="titleHome single">'.get_the_title().'</h1>';
}
add_shortcode('title_post_single',  'title_post_single_shortcode');


function date_post_shortcode($atts, $content = null, $code){

  return '<div class="date-post">Publicado el: '.get_post_time( get_option( 'date_format' )).'</div>';
}
add_shortcode('date_post',  'date_post_shortcode');

function box_contact_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'title' => '',
    'tel' => '',
    'email' => ''
), $atts));

  return '<div class="box-contact">
            <div class="box-line-contact">
              <h3>'.$title.'</h3>
              <p> <i class="fas fa-phone-square"></i> '.$tel.'</p>
              <p> <i class="fas fa-envelope"></i> '.$email.'</p>
            </div>
          </div>';
}
add_shortcode('box_contact',  'box_contact_shortcode');


function box_teacher_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'image' => '',
    'name' => '',
    'cargo' => '',
    'titulos' => '',
), $atts));

  return '<div class="box-teacher">
            <div class="img-box-teacher">
              <img src="'.$image.'">
            </div>
            <div class="info-teacher">
              <h4>'.$cargo.'</h4>
              <p class="name">'.$name.'</p>
              <p>'.$titulos.'</p>
            </div>
          </div>';
}
add_shortcode('box_teacher',  'box_teacher_shortcode');

function box_award_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'titulo' => '',
    'otorgado' => '',
    'curso' => '',
), $atts));

  return '<div class="box-awards">
            <p><i class="fas fa-award"></i></p>
            <p><strong> Título:</strong> <br>'.$titulo.'</p>
            <p><strong>Otorgado por: </strong> <br>'.$otorgado.'</p>
            <p><strong>Grado:</strong> '.$curso.'</p>
          </div>';
}
add_shortcode('box_award',  'box_award_shortcode');

function icon_archives_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'icon' => '',
    'text' => '',
    'href' => ''
), $atts));

  return '<div class="icon-archive">
            <a href="'.$href.'" target="_blank">
            <p><i class="'.$icon.'"></i></p>
            <p>'.$text.'</p>
            </a>
          </div>';
}
add_shortcode('icon_archives',  'icon_archives_shortcode');

function beam_template_shortcode($atts, $content = null){
  $content = apply_filters('the_content', $content);
  return "<div class='beam_template'> ".do_shortcode($content)."</div>";
}

add_shortcode('beam_template','beam_template_shortcode');

function convenios_img_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'img' => '',
    'class' => '',
    'name' => ''
), $atts));

  return '<div class="convenio-img '.$class.'">
            <img src="'.$img.'" alt="'.$name.'">
          </div>';
}
add_shortcode('convenios_img',  'convenios_img_shortcode');

function beam_pse_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'url' => '',
    'text' => ''
), $atts));

  return '<div class="btn-beam pse">
    <a href="'.$url.'" target="_blank">
      <i class="fas fa-credit-card"></i> '.$text.'
    </a>
    </div>';
}
add_shortcode('beam_pse',  'beam_pse_shortcode');

function btn_link_submenu_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'url' => '',
    'text' => '',
    'class' => ''
), $atts));

  return '<div class="btn-link-submenu '.$class.'">
    <a href="'.$url.'" >
    <i class="fas fa-calendar-check"></i>
      '.$text.'
    </a>
    </div>';
}
add_shortcode('btn_link_submenu',  'btn_link_submenu_shortcode');


function redirect_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'url' => '',
), $atts));

  return "<script>window.location.href = '".$url."'</script>";
}
add_shortcode('redirect',  'redirect_shortcode');


function news_biblioteca_shortcode($atts, $content = null, $code){

  $content = apply_filters('the_content', $content);

  return '<div class="inicio-noticia">
  <div class="medium">
        <h2 class="title-noticia biblioteca">NOVEDADES NOVEDOSAS</h2>   
        <div class="cont-box-noticia">
            
          '.do_shortcode($content).'
        </div>
    </div>
  </div>';

}
add_shortcode('news_biblioteca',  'news_biblioteca_shortcode');


function news_biblioteca_content_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'src' => '',
    'title' => '',
  ), $atts));

  return '<div class="box-noticia biblio">
          <a>
            <div class="box-noticia-img">
              <img src='.$src.'>
            </div>
            <h3 class="title-box-noticia">
              '.$title.'
            </h3>
          </a>
        </div>';
}
add_shortcode('news_biblioteca_content',  'news_biblioteca_content_shortcode');


function content_social_icons_shortcode($atts, $content = null, $code){
  
  $content = apply_filters('the_content', $content);

  return '<div class="biblio-social">
          '.do_shortcode($content).'
        </div>';
}
add_shortcode('content_social_icons',  'content_social_icons_shortcode');


function procesoOH_shortcode($atts, $content = null, $code){

  $content = apply_filters('the_content', $content);

  extract(shortcode_atts(array(
    'title' => '',
    'color' => '',
  ), $atts));

  return '<div class="box-proceso">
            <h4 class="'.$color.'">
              '.$title.'
            </h4>
            <p>
            '.do_shortcode($content).'
            </p>
          </div>';
}
add_shortcode('procesoOH',  'procesoOH_shortcode');

function procesoOH_title_shortcode($atts, $content = null, $code){

  $content = apply_filters('the_content', $content);

  return '<h4 class="title_OH">
            '.do_shortcode($content).'
            </h4>';
}
add_shortcode('procesoOH_title',  'procesoOH_title_shortcode');


function convenios_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'title' => '',
    'color' => '',
    'class' => '',
  ), $atts));

  $content = apply_filters('the_content', $content);

  return '<div class="convenios-container '.$class.'">
            '.do_shortcode($content).'
            </div>';
}
add_shortcode('convenios',  'convenios_shortcode');

function content_form_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'class' => '',
  ), $atts));

  $content = apply_filters('the_content', $content);

  return '<form id="form" method="post" action="http://localhost/wordpress/index.php/validate/" class="form '.$class.'" enctype="multipart/form-data">
            '.do_shortcode($content).'
          </form>';
}
add_shortcode('content_form',  'content_form_shortcode');


function content_input_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'class' => '',
  ), $atts));

  $content = apply_filters('the_content', $content);

  return '<div class="content-input '.$class.'">
            '.do_shortcode($content).'
          </div>';
}
add_shortcode('content_input',  'content_input_shortcode');


function input_text_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'class' => '',
    'name' => '',
    'placeholder' => '',
  ), $atts));

  return '<input class="text '.$class.'" name="'.$name.'"  placeholder="'.$placeholder.'" required>';
}
add_shortcode('input_text',  'input_text_shortcode');

function input_file_shortcode($atts, $content = null, $code){


  return '<label for="file-upload" class="subir">
  <i class="fas fa-cloud-upload-alt"></i> Subir Hoja de Vida
</label>
<input id="file-upload" type="file" name="file" style="display: none;" required/>
<div id="info"></div>';
}

add_shortcode('input_file',  'input_file_shortcode');

function input_btn_shortcode($atts, $content = null, $code){


  return '<button class="btn-form" type="submit" >Enviar</button>';
}

add_shortcode('input_btn',  'input_btn_shortcode');

function video_iframe_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'class' => '',
    'src' => '',
  ), $atts));

  return '<div class="videoIframe '.$class.'">
            <iframe src="'.$src.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>';
}
add_shortcode('video_iframe',  'video_iframe_shortcode');

//[video_iframe src="https://www.youtube.com/embed/eA0dozN3SI4"]

function video_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'class' => '',
    'src' => '',
  ), $atts));

  return '<video id="videoPost" class="'.$class.'" controls>
            <source src="'.$src.'" type="video/mp4">
          </video>';
}
add_shortcode('video',  'video_shortcode');

function image_text_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'class' => '',
    'src' => '',
    'text' => '',
    'href' => '',
  ), $atts));

  return '<div class="text-image-as '.$class.'" >
          <a href="'.$href.'"  target="_blank">
            <img src="'.$src.'" >
            <h3>'.$text.'</h3>
          </a>
          </div>';
}
add_shortcode('image_text',  'image_text_shortcode');

function layout_grid_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'class' => '',
  ), $atts));

  $content = apply_filters('the_content', $content);

  return '<div class="layout-grid '.$class.'">
            '.do_shortcode($content).'
          </div>';
}
add_shortcode('layout_grid',  'layout_grid_shortcode');

function video_grid_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'class' => '',
    'src' => '',
    'title' => '',
    'subtitle' => '',
    'img' => ''
  ), $atts));

  $content = apply_filters('the_content', $content);

  return '<div class="grid-video '.$class.'">
            <h4>'.$title.' <span>'.$subtitle.'</span></h4>
            <button class="play"><i class="far fa-play-circle"></i></button>
            <div class="bg-grid-video">
            </div>
            <img src="'.$img.'" link="'.$src.'">
              '.do_shortcode($content).'
          </div>';
}
add_shortcode('video_grid',  'video_grid_shortcode');

function content_video_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'class' => '',

  ), $atts));

  $content = apply_filters('the_content', $content);

  return '<div id="content-video" class="bg-video-grid '.$class.'">
            <div class="cont-video">
              <div class="cont-close">
                <i id="close" class="far fa-times-circle"></i>
              </div>
                <video id="video" controls>
                  <source src="https://www.dscali.edu.co/videosWeb/video-ib-2.mp4" type="video/mp4">
                </video>
            </div> 
          </div>';
}
add_shortcode('content_video',  'content_video_shortcode');

function container_scroll_shortcode($atts, $content = null, $code){

  $content = apply_filters('the_content', $content);

  return '<div class="container-scroll" id="scroll">
            '.do_shortcode($content).'
          </div>';
}
add_shortcode('container_scroll',  'container_scroll_shortcode');

function img_video_expIB_shortcode($atts, $content = null, $code){

  extract(shortcode_atts(array(
    'class' => '',
    'title' => '',
    'footpage' => '',
    'src' => '',
    
  ), $atts));

  return '
            <div class="img-video-expIB '.$class.'"> 
              <h4>'.$title.'</h4>
              <div class="cont-image-play">
                <div class="cont-play">
                  <button class="play"><i class="far fa-play-circle"></i></button>
                </div>
                <img src="'.$src.'" />
              </div>
              <p>'.$footpage.'</p>
            </div>
          ';
}
add_shortcode('img_video_expIB',  'img_video_expIB_shortcode');

function arrow_up_shortcode($atts, $content = null, $code){

  return '<div class="arrow up" id="up">
              <i class="fas fa-chevron-circle-up"></i>
            </div>
            
           ';
}
add_shortcode('arrow_up',  'arrow_up_shortcode');

function arrow_down_shortcode($atts, $content = null, $code){
  
  return '
            <div class="arrow down" id="down">
              <i class="fas fa-chevron-circle-down"></i>
            </div>
           ';
}
add_shortcode('arrow_down',  'arrow_down_shortcode');
