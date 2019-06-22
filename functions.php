<?php 


// правильный способ подключить стили и скрипты
function multitorg_styles() {
	// wp_enqueue_style( 'bootstrap-reboot', get_template_directory_uri() . '/libs/bootstrap/scss/bootstrap-reboot.scss');
	// wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/libs/bootstrap/dist/css/bootstrap.min.css');
	// wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/libs/bootstrap/dist/css/bootstrap-grid.css');
	// wp_enqueue_style( 'owl', get_template_directory_uri() . '/libs/owl.carousel/dist/assets/owl.carousel.min.css');
	// wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/libs/owl.carousel/dist/assets/owl.theme.default.min.css');
	
	wp_register_style( 'main-style', get_stylesheet_uri() );
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'multitorg_styles' );

function multitorg_scripts() {		
	wp_register_script( 'scripts', get_template_directory_uri() . '/js/app.js');
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/app.js', '', '', true);
}
add_action( 'wp_enqueue_scripts', 'multitorg_scripts' );


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

