<?php 

// правильный способ подключить стили и скрипты
add_action( 'wp_enqueue_scripts', 'brendiruy_scripts' );
add_action( 'wp_enqueue_scripts', 'theme_name_styles' );
function theme_name_styles() {
	// wp_enqueue_style( 'bootstrap-reboot', get_template_directory_uri() . '/libs/bootstrap/scss/bootstrap-reboot.scss');
	// wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/libs/bootstrap/dist/css/bootstrap.min.css');
	// wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/libs/bootstrap/dist/css/bootstrap-grid.css');
	// wp_enqueue_style( 'owl', get_template_directory_uri() . '/libs/owl.carousel/dist/assets/owl.carousel.min.css');
	// wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/libs/owl.carousel/dist/assets/owl.theme.default.min.css');
	
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );
}

function brendiruy_scripts() {
	add_action( 'wp_enqueue_scripts', 'my_scripts_method', 11 );
	function my_scripts_method() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/libs/jquery/dist/jquery.min.js', true);
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, false );
	}
}

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );

add_action( 'after_setup_theme', 'theme_register_nav_menu' );
	function theme_register_nav_menu() {
	register_nav_menu( 'primary', 'Primary Menu' );
}

add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){
	register_sidebar( array(
		'name'          => sprintf(__('Sidebar %d'), $i ),
		'id'            => "sidebar-$i",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => "</li>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
	) );

	register_sidebar( array(
		'name'          => sprintf(__('Brendiruy Sidebar'), $i ),
		'id'            => "sidebar-$i",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => "</li>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
	) );

}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
