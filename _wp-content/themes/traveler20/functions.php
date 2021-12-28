<?php
function my_scripts() {
	wp_enqueue_style( 'style-name', get_template_directory_uri() . '/asset/css/style.css', array(), '1.0.0', 'all' );
  wp_enqueue_script( 'script-name', get_template_directory_uri() . '/asset/js/script.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );
?>

<?php
function traveler20setup() {
  add_theme_support( 'post-thumbnails' ); //アイキャッチ画像をON
  add_theme_support( 'menus');  //メニュー機能をON
}
add_action( 'after_setup_theme', 'traveler20setup' );
//最後に作成したafter_setup_themeアクションフック※に登録します。

// create custom post type(お知らせ)
// function cpt_register_news(){
//   $labels = (
//     "singular_name"=>"news",
//     "edit_item"=>"news",
//   );
//   $args = (
//     "label" => "新着情報",
//     "labels" => $labels,
//     "description"=>"",
//     "public"=>true,


//     'publicly_queryable' => true,
//     'show_ui' => true,
//     'query_var' => true,
//     'rewrite'  => true,
//     'capability_type' => 'post',
//     'hierarchical' => false,
//     'menu_position' => 4,
//     'has_archive' => true,
//     'rewrite' => array( 'slug' => 'news'),
//     'supports' => array('title','editor','thumbnail')
//   );
//   register_post_type('news',$args);

// }
// add_action('init', 'cpt_register_news()');

// ?>