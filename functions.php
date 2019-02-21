<?php

require get_template_directory() . '/inc/walker.php';

class Functions {
    public function __construct() {

	    $this->theme_setup();
        $this->add_actions();
        $this->add_filters();
        
        
    }

    public function theme_setup() {
        add_action( 'after_setup_theme', array( $this, 'theme_setup_core' ) );
    }
    public function theme_setup_core() {
        add_theme_support('menus');
        register_nav_menu('primary', 'Główne menu');
        add_theme_support( 'custom-logo');
        add_theme_support( 'post-thumbnails' );
    }

    public function add_actions() {
        add_action('wp_enqueue_scripts', array($this, 'include_custom_jquery'));
        add_action( 'wp_enqueue_scripts', array($this, 'load_scripts_and_styles') );
        add_action('init', array($this, 'removes'));
        add_action( 'init', array($this,'dogs_post_type') );
        add_action( 'init', array($this,'cats_post_type') );
        add_action( 'init', array($this,'problems_post_type') );
        add_action( 'init', array($this,'gallery_post_type') );
        add_action( 'widgets_init', array($this,'footer_sidebars')  );
        add_action( 'pre_get_posts', array($this, 'parse_request') );

    }

    public function add_filters(){
        add_filter('piklist_admin_pages', array($this,'medor_settings'));
        add_filter( 'post_type_link', array($this, 'remove_slug' ),10, 3 );
        add_filter( 'enter_title_here', array($this,'wpb_change_title_text' ));
    }

    public function include_custom_jquery() {
        wp_deregister_script('jquery');
    }

    public function load_scripts_and_styles() {
        //wp_enqueue_style('bootstrap', get_template_directory_uri() . '/scss/bootstrap/bootstrap.css', array(), '4.2.1', 'all');
        wp_enqueue_style('medor', get_template_directory_uri() . '/dist/dist.min.css', array(), '1.0.2', 'all');
        wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), '3.1.1', false);
        wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.1.1', true);
        wp_enqueue_script('medorjs', get_template_directory_uri() . '/dist/dist.min.js', array(), '1.0.1', true);
    }
    public function removes(){
        remove_post_type_support('post', 'excerpt');
        remove_post_type_support( 'page', 'comments');
        remove_post_type_support( 'page', 'thumbnail');
    }

   
    

    public function dogs_post_type() {
        register_post_type('dogs',
          array(
            'labels' => array(
              'name' => __( 'Psy' ),
              'singular_name' => __( 'Pies' ),
              'add_new' => 'Dodaj Psa',
              'all_items' => 'Wszystkie Psy',
              'add_new_item' => 'Dodaj Psa',
              'edit_item' => 'Edytuj Psa',
              'new_item' => 'Nowy Pies',
              'view_item' => 'Zobacz Psa',
              'search_item' => 'Szukaj Psa',
              'not_found' => 'Psa nie znaleziono',
              'not_found_in_trash' => 'Nie ma psa w koszu',
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => "dogs", 'with_front' => false ),
            'menu_icon'   => 'dashicons-image-filter',
          )
        );
      }

      public function cats_post_type() {
        register_post_type('cats',
          array(
            'labels' => array(
              'name' => __( 'Koty' ),
              'singular_name' => __( 'Kot' ),
              'add_new' => 'Dodaj Kota',
              'all_items' => 'Wszystkie Koty',
              'add_new_item' => 'Dodaj Kota',
              'edit_item' => 'Edytuj Kota',
              'new_item' => 'Nowy Kot',
              'view_item' => 'Zobacz Kota',
              'search_item' => 'Szukaj Kota',
              'not_found' => 'Kota nie znaleziono',
              'not_found_in_trash' => 'Nie ma Kota w koszu',
            ),
            'public' => true,
            'has_archive' => true,
            
            'rewrite' => array('slug' => "cats", 'with_front' => false ),
            'menu_icon'   => 'dashicons-image-filter',
          )
        );
      }

      
      public function problems_post_type() {
        register_post_type('problems',
          array(
            'labels' => array(
              'name' => __( 'Nasze problemy' ),
              'singular_name' => __( 'Problem' ),
              'add_new' => 'Dodaj Problem',
              'all_items' => 'Wszystkie Problemy',
              'add_new_item' => 'Dodaj Problem',
              'edit_item' => 'Edytuj Problem',
              'new_item' => 'Nowy Problem',
              'view_item' => 'Zobacz Problem',
              'search_item' => 'Szukaj Problemu',
              'not_found' => 'Problemu nie znaleziono',
              'not_found_in_trash' => 'Nie ma Problemu w koszu',
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => "problems", 'with_front' => false ),
            'menu_icon'   => 'dashicons-image-filter',
            'supports' => array('title','editor','excerpt'),
          )
        );
      }

      

      public function gallery_post_type() {
        register_post_type('gallery',
          array(
            'labels' => array(
              'name' => __( 'Galeria' ),
              'singular_name' => __( 'Zdjęcie' ),
              'add_new' => 'Dodaj Zdjęcie',
              'all_items' => 'Wszystkie Zdjęcia',
              'add_new_item' => 'Dodaj Zdjęcie',
              'edit_item' => 'Edytuj Zdjęcie',
              'new_item' => 'Nowe Zdjęcie',
              'view_item' => 'Zobacz Zdjęcie',
              'search_item' => 'Szukaj Zdjęcia',
              'not_found' => 'Zdjęcia nie znaleziono',
              'not_found_in_trash' => 'Nie ma Zdjęcia w koszu',
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => "gallery", 'with_front' => false ),
            'menu_icon'   => 'dashicons-image-filter',
            'supports' => array('title','excerpt', 'thumbnail'),
          )
        );
      }

    public function footer_sidebars() {
        register_sidebar( array(
            'name' => __( 'Footer sidebar 1'),
            'id' => 'footer-sidebar-1',
            'description' => __( 'Pierwszy sidebar'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
            ) );
        register_sidebar( array(
            'name' => __( 'Footer sidebar 2'),
            'id' => 'footer-sidebar-2',
            'description' => __( 'Drugi sidebar'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
            ) );
        register_sidebar( array(
            'name' => __( 'Trzeci sidebar 3'),
            'id' => 'footer-sidebar-3',
            'description' => __( 'Pierwszy sidebar'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
            ) );
        register_sidebar( array(
            'name' => __( 'Footer sidebar 4'),
            'id' => 'footer-sidebar-4',
            'description' => __( 'Czwarty sidebar'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
            ) );
                    
    }   

    
    function medor_settings ($pages) {
        $pages[] = array(
         'page_title' => __('Ustawienia motywu')
         ,'menu_title' => __('Settings', 'piklist')
        // ,'sub_menu' => 'themes.php' //Under Appearance menu
         ,'capability' => 'manage_options'
         ,'menu_slug' => 'custom_settings'
         ,'setting' => 'my_theme_settings'
         // ,'menu_icon' => plugins_url('piklist/parts/img/piklist-icon.png')
         // ,'page_icon' => plugins_url('piklist/parts/img/piklist-page-icon-32.png')
         ,'single_line' => true
         ,'default_tab' => 'Basic'
         ,'save_text' => 'Zapisz ustawienia'
       );
     
       return $pages;
     }
    
 
     function remove_slug( $post_link, $post ) {
        
            if ( 'dogs' != $post->post_type || 'publish' != $post->post_status ) {
                return $post_link;
            }
         
            $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
        
            return $post_link;
        }
        function parse_request( $query ) {
            
                if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
                    return;
                }
            
                if ( ! empty( $query->query['name'] ) ) {
                    $query->set( 'post_type', array( 'post', 'dogs', 'cats', 'problems', 'page' ) );
                }
            }

            function wpb_change_title_text( $title ){
                $screen = get_current_screen();
             
                if  ( 'cats' == $screen->post_type ) {
                     $title = 'Wpisz imię kota';
                }
                if  ( 'dogs' == $screen->post_type ) {
                    $title = 'Wpisz imię psa';
               }
             
                return $title;
            }
            



}

$functions = new Functions;

add_filter('manage_gallery_posts_columns', 'gallery_column', 10);
add_action('manage_gallery_posts_custom_column', 'gallery_column_content', 10, 2);


 
function gallery_column($defaults){
    $defaults['riv_post_thumbs'] = __('Zdjęcie');
    return $defaults;
}
 
function gallery_column_content($column_name, $id){
    if($column_name === 'riv_post_thumbs'){
        echo   the_post_thumbnail( 'thumbnail', array( 'class' => 'img-fluid' ) );
 
    }
}