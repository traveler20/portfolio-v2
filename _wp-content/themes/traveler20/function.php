<?php

// create custom post type(お知らせ)
function cpt_register_news(){
  $labels = (
    "singular_name"=>"news",
    "edit_item"=>"news",
  );
  $args = (
    "label" => "新着情報",
    "labels" => $labels,
    "description"=>"",
    "public"=>true,


    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite'  => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 4,
    'has_archive' => true,
    'rewrite' => array( 'slug' => 'news'),
    'supports' => array('title','editor','thumbnail')
  );
  register_post_type('news',$args);

}
add_action('init', 'cpt_register_news()');

?>