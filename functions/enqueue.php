<?php
/*********************************/
/*
/* enqueue_scripts
/*
/*********************************/
if ( !is_admin() ) {
	add_action( 'wp_enqueue_scripts', function (){
		wp_enqueue_style( 'swiper-style', get_theme_file_uri( '/assets/css/vender/swiper.min.css' ), array(), '' );
		wp_enqueue_style( 'mgn-style', get_theme_file_uri( '/dist/css/style.css' ) );
		wp_enqueue_style( 'editor-style', get_theme_file_uri( '/dist/css/editor-style.css' ) );

		wp_enqueue_script( 'popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'tile-js', get_theme_file_uri( '/assets/js/vender/jquery.tile.min.js' ), array( 'jquery' ), true, true );
		wp_enqueue_script( 'ofi-js', get_theme_file_uri( '/assets/js/vender/ofi.min.js' ), array() 'jquery' , true, true );
		wp_enqueue_script( 'picturefill-js', get_theme_file_uri( '/assets/js/vender/picturefill.min.js' ), array( 'jquery' ), true, true );
		wp_enqueue_script( 'swiper-js', get_theme_file_uri( '/assets/js/vender/swiper.min.js' ), array( 'jquery' ), true, true );
		wp_enqueue_script( 'mgn-scripts', get_theme_file_uri( '/dist/js/app.js' ), array( 'jquery' ), '', true );
	});
}

add_action( 'enqueue_block_editor_assets', 'add_block_editor_style' );
function add_block_editor_style() {
	wp_enqueue_style( 'block-editor-style', get_theme_file_uri( '/dist/css/editor-style.css' ) );
}


add_action( 'after_setup_theme', function (){
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));
});
