<?php
function load_css()
{
        wp_register_style('bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css',array(),false,'all');
        wp_enqueue_style('bootstrap');

        wp_register_style('main', get_template_directory_uri() .'/css/main.css',array(),false,'all');
        wp_enqueue_style('main');
}

add_action('wp_enqueue_scripts','load_css');


function load_js(){
        wp_enqueue_script('jquery');
        
        wp_register_script('bootstrap',get_template_directory_uri(). '/js/bootstrap.min.js','jquery',false,true);
        wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts','load_js');


add_theme_support('menus');
add_theme_support('widgets');
add_theme_support( 'post-thumbnails' );

register_nav_menus(
        
        array(
        'top-menu'=>'Top Menu Location',
        'mobile-menu'=>'Mobile Menu Location',       
        )
);

//Register side bar
function my_sidebars(){
        
        register_sidebar(  
                array(
                        'name'=>'Page Sidebar',
                        'id'=>'page-sidebar',
                        'before-title'=>'<h4 class="widget-title">',
                        'after_title'=>'</h4>'
                )
        );

}

add_action('widgets_init','my_sidebars');

//Custom post type

function custom_post(){

        $args = array(
                'labels'=>array(
                        'name'=>'Cars',
                        'singular_name'=>'Car',
                ),
                'hierarchical'=>true,
                'public'=>true,
                'has_archive'=>true,
                'menu_icon'=>'dashicons-images-alt2',
                'supports'=>array('title','editor','thumbnail','custom-fields'),
        );

      register_post_type('cars',$args);         
}

add_action('init','custom_post');


function car_taxonomy(){
        $args = array(
                'labels'=>array(
                        'name'=>'Brands',
                        'singular_name'=>'Brand',
                ),
                'public'=>true,
                'hierarchical'=>true,
        );

        register_taxonomy('brands',array('cars'),$args);

}

add_action('init','car_taxonomy');