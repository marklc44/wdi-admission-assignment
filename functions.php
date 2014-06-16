<?php

// Styles and Scripts
function theme_styles() {
	wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style('style_css', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'theme_styles');

function theme_js() {

	global $wp_scripts;

	// important that web font loading happens as close to the top of the head as possible
	wp_enqueue_script('font_script', get_template_directory_uri() . '/js/fonts.js','','', false);

	wp_register_script('html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js','','',false);
	wp_register_script('respond', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js','','',false);

	$wp_scripts->add_data('html5_shiv', 'conditional', 'lt IE 9');
	$wp_scripts->add_data('respond', 'conditional', 'lt IE 9');
	
	// bug: 1000004 jQuery dependencies causing jQuery to load in the head and load multiple times
	// possible solution: load jQuery manually once at the bottom before dependents?
	wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'),'', true);
	wp_enqueue_script('modernizr_js', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.min.js','','',true);
	wp_enqueue_script('imgloaded_js', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'),'',true);
	wp_enqueue_script('shuffle_js', get_template_directory_uri() . '/components/shuffle/shuffle.min.js', array('jquery'),'',true);
	wp_enqueue_script('theme_js', get_template_directory_uri() . '/theme.js', array('jquery'),'', true);

}

add_action('wp_enqueue_scripts', 'theme_js');


// Custom Theme Menus
add_theme_support('menus');

function register_theme_menus() {

	register_nav_menus(
			array(
					'header-menu' => __('Header Menu'),
					'header-menu-alt' => __('Alternate Header Menu')
				)
		);
}
add_action('init', 'register_theme_menus');

// Widget areas
function create_widget($name, $id, $description) {

	register_sidebar(array(
			'name' => __( $name ),
			'id' => $id,
			'description' => __( $description ),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		));
}

create_widget( 'Front Page Left', 'front-left', 'Displays on the left of the home page');
create_widget( 'Front Page Center', 'front-center', 'Displays in the center of the home page');
create_widget( 'Front Page Right', 'front-right', 'Displays on the right of the home page');

create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar');
create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of blog pages with a sidebar');

// Post Thumbnails
add_theme_support('post-thumbnails');





