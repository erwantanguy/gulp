<?php
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-background' );
set_post_thumbnail_size( 150, 150, array( 'center', 'center')  );
add_theme_support( 'menus' );


/* MENU */


register_nav_menus(array(
	'premier' => 'Menu principale home',
	'second' => 'Menu principale',
	'deuxieme' => 'Petit menu optionnel',
	'troisieme' => 'Menu pied de page',
	'lieux' => 'Menu des lieux',
	//'oeuvres' => 'Menu pour les oeuvres quand il n\'y a pas d\'événements'
));

/************* WIDGETS *************/

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => 'ma_sidebar',
        //'id' => 1,
		'before_widget' => '<div class="widget_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
}

/************ menu boostrap **********/

class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {

   function start_lvl(&$output, $depth = 0, $args = array()) {
      $output .= "\n<ul class=\"dropdown-menu\">\n";
   }

   function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
       $element_html = '';
       parent::start_el($element_html, $item, $depth, $args);
       if ( $item->is_dropdown && $depth === 0 ) {
           $element_html = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $element_html );
           $element_html = str_replace( '</a>', ' <b class="caret"></b></a>', $element_html );
       }
       $output .= $element_html;
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        if ( $element->current ) {
            $element->classes[] = 'active';
        }
        $element->is_dropdown = !empty( $children_elements[$element->ID] );
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}
class theme_blue_walker_nav_menu extends Walker_Nav_Menu{
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0){
		$element_html = '';
		parent::start_el($element_html, $item, $depth, $args);
		//if ( $item->is_dropdown && $depth === 0 ) {
			$element_html = str_replace( '<a', '<a class="inner-link"', $element_html );
		//}
		$output .= $element_html;
	}
}

/**** options ACF ****/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Page Accueil Thème',
		'menu_title'	=> 'Theme GULP',
		'menu_slug' 	=> 'gulptheme',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Gestion de la page d\'accueil',
		'menu_title'	=> 'Accueil',
		'parent_slug'	=> 'gulptheme',
	));
	/*acf_add_options_sub_page(array(
	'page_title' 	=> 'Theme Header Settings',
	'menu_title'	=> 'Header',
	'parent_slug'	=> 'theme-general-settings',
	));*/

}

/*********** IMAGES ************/

add_image_size( 'events', 300, 120, array( 'left', 'top' ) );
add_image_size( 'event', 300,120 );
add_image_size('mobile',768);
add_image_size('mobile1',768,270,array( 'center', 'center' ));
add_image_size('mobile2',768,512,array( 'center', 'center' ));
add_image_size('mobile3',768,328,array( 'center', 'center' ));
add_image_size('oeuvres',275, 206, true);
add_image_size('home_oeuvres',390, 295, true);
add_image_size('tablette',1000);
add_image_size('sidebar',360);
add_image_size('boutique',250);
//add_image_size('vignette',225,225,array( 'left', 'top' ));
add_image_size('vignette',225,225,array( 'center', 'center' ));
add_image_size('news',390,390,array( 'center', 'center' ));
add_image_size('vignetteAccueil',410,410,array( 'center', 'center' ));
add_image_size('vignetteAccueil2',450,450,array( 'center', 'center' ));
add_image_size('calendar', 294,154);
add_image_size('lactu',180,135,array( 'center', 'center' ));
add_image_size('lactu2',180,100,array( 'center', 'center' ));
add_image_size('page',1140,400,array( 'center', 'center' ));
add_image_size('slider',1170,500,array( 'center', 'center' ));
add_image_size('box',2000);

/************ JS ***************/
add_action('init', 'gkp_insert_js_in_footer');
function gkp_insert_js_in_footer() {
     if( !is_admin() ) :
        //wp_deregister_script( 'jquery' );
        wp_register_script('functions', get_bloginfo( 'template_directory' ).'/bundle.js','',false,true);
        wp_enqueue_script( 'functions' );
        wp_enqueue_style('style', '/wp-content/themes/gulp/app.css', array(), time());
    endif;
}