<?php

add_theme_support( 'post-thumbnails' );

function moesubs_start_session() {
    if(!session_id()) {
        session_start();
    }
}

add_action('init', 'moesubs_start_session', 1);

function admin_bar(){

  if(is_user_logged_in()){
    add_filter( 'show_admin_bar', '__return_true' , 1000 );
  }
}
add_action('init', 'admin_bar' );

add_post_type_support( 'rilisan', array('comments' ));
add_post_type_support( 'proyek', array('comments' ));


function my_remove_menu_pages()
{
	remove_submenu_page( 'edit.php?post_type=proyek', 'edit-tags.php?taxonomy=kualitas&amp;post_type=proyek');
}
add_action('admin_menu', 'my_remove_menu_pages');

function theme_scripts() 
{
	wp_enqueue_style('materialize', get_template_directory_uri().'/assets/css/materialize.min.css');
	wp_enqueue_style('animate', get_template_directory_uri().'/assets/css/animate.css');
	wp_enqueue_style('style', get_template_directory_uri().'/assets/css/style.css');
	wp_enqueue_script('jquery-min', get_template_directory_uri().'/assets/js/jquery.min.js', array ('jquery'), '', false);
	wp_enqueue_script('materialize', get_template_directory_uri().'/assets/js/materialize.min.js', array(), '', false );
	wp_enqueue_script('moesubs', get_template_directory_uri().'/assets/js/moesubs.js', array ( 'jquery' ), '', false);
}
add_action( 'wp_enqueue_scripts', 'theme_scripts');

register_nav_menus(array(
	'menu_atas'	  => 'Menu Atas',
	'menu_utama'	=> 'Menu Utama'
));

function wrap_menu_utama() {
  // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
  
  // open the <ul>, set 'menu_class' and 'menu_id' values
  $wrap  = '<ul id="%1$s" class="%2$s left">';
  
  // the static link 
  $wrap .= '<li class="moe-home-lock"><a href="'.home_url('/').'"><i class="moe-main-menu material-icons">home</i></a></li>';
  
  // get nav items as configured in /wp-admin/
  $wrap .= '%3$s';
  
  // close the <ul>
  $wrap .= '</ul>';
  // return the result
  return $wrap;
}

add_filter('next_posts_link_attributes', 'posts_link_attributes_next');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_prev');

function posts_link_attributes_next() 
{
  return 'class="moesubs red-text tooltipped" data-delay="50" data-position="top" data-tooltip="Lihat sebelumnya"';
}

function posts_link_attributes_prev() 
{
  return 'class="moesubs red-text tooltipped" data-delay="50" data-position="top" data-tooltip="Lihat sesudahnya"';
}