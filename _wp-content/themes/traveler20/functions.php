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

// get meta description from the content
function get_meta_description() {
  global $post;
  $description = "";
  if ( is_home() ) {
    // ホームでは、ブログの説明文を取得
    $description = get_bloginfo( 'description' );
  }
  elseif ( is_category() ) {
    // カテゴリーページでは、カテゴリーの説明文を取得
    $description = category_description();
  }
  elseif ( is_single() ) {
    if ($post->post_excerpt) {
      // 記事ページでは、記事本文から抜粋を取得
      $description = $post->post_excerpt;
    } else {
      // post_excerpt で取れない時は、自力で記事の冒頭100文字を抜粋して取得
      $description = strip_tags($post->post_content);
      $description = str_replace("\n", "", $description);
      $description = str_replace("\r", "", $description);
      $description = mb_substr($description, 0, 100) . "...";
    }
  } else {
    ;
  }

  return $description;
}

// echo meta description tag
function echo_meta_description_tag() {
  if ( is_home() || is_category() || is_single() ) {
    echo '<meta name="description" content="' . get_meta_description() . '" />' . "\n";
  }
}


// カスタムフィールド追加
add_action('admin_menu', 'my_add_custom_fields');
add_action('save_post', 'my_save_custom_fields');
function my_add_custom_fields() {
  add_meta_box( 'my_f01', 'メタキーワード(検索キーワード)', 'my_keywords', 'post');
  add_meta_box( 'my_f01', 'メタキーワード(検索キーワード)', 'my_keywords', 'page');
  add_meta_box( 'my_f02', 'メタディスクリプション(ページの説明)', 'my_description', 'post');
  add_meta_box( 'my_f02', 'メタディスクリプション(ページの説明)', 'my_description', 'page');
}
 
// カスタムフィールドの入力欄表示
function my_keywords() {
  global $post;
  $f_data = get_post_meta($post->ID,'meta_keywords',true);
  wp_nonce_field( wp_create_nonce( __FILE__ ), 'ul_nonce' );
  echo '<p>キーワードは半角カンマ「,」で区切ります。</p>';
  echo '<input style="width:100%" type="text" name="meta_keywords" value="'.htmlspecialchars($f_data).'" />';
}
function my_description() {
  global $post;
  $f_data = get_post_meta($post->ID,'meta_description',true);
  wp_nonce_field( wp_create_nonce( __FILE__ ), 'ul_nonce' );
  echo '<p>全角120字以内が望ましいです。</p>';
  echo '<textarea style="width:100%" rows="4" type="text" name="meta_description">'.htmlspecialchars($f_data).'</textarea>';
}
 
// カスタムフィールドの値を保存
function my_save_custom_fields( $post_id ) {
 
  //nonceによるセキュリティ対策
  $ul_nonce = isset( $_POST['ul_nonce'] ) ? $_POST['ul_nonce'] : null;
  if ( !wp_verify_nonce( $ul_nonce, wp_create_nonce( __FILE__ ) ) ) {
      return $post_id;
  }
 
  //例外処理
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { 
    return $post_id;
  }
  if ( !current_user_can( 'edit_post', $post_id ) ) {
    return $post_id;
  }
 
  //カスタムフィールドのキー一覧
  $keys = array(
    'meta_keywords',
    'meta_description',
  );
  
  //カスタムフィールドの更新
  foreach( $keys as $key ){
    $data = $_POST[$key];
    if ( get_post_meta( $post_id, $key ) == "" ) {
        add_post_meta( $post_id, $key, $data, true );
    } elseif ( $data != get_post_meta( $post_id, $key, true ) ) {
        update_post_meta( $post_id, $key, $data );
    } elseif ( $data == "" ) {
        delete_post_meta( $post_id, $key, get_post_meta( $post_id, $key, true ) );
    }
  }
 
}
     
//メタキーワード取得
function my_meta_keywords_set(){
    //記事ページ
    if( get_post_meta(get_the_ID(), 'meta_keywords', true) ){
        echo htmlspecialchars(get_post_meta(get_the_ID(), 'meta_keywords', true));
    //その他・共通
    }else{
        echo htmlspecialchars('web,web-designer');
    }
}
 
//メタディスクリプション取得
function my_meta_description_set(){
    //記事ページ
    if( get_post_meta(get_the_ID(), 'meta_description', true) ){
        echo htmlspecialchars(get_post_meta(get_the_ID(), 'meta_description', true));
    //その他・共通
    }else{
        echo htmlspecialchars('WEB Designer. WEB Developer.');
    }
}






//カスタム投稿作成の定義
function new_post_type(){
  register_post_type(
      'blog', //投稿タイプ名
      array(
          'label'=> 'blog', //ラベル名
          'labels' => array(
              'menu_name' => 'blog' //管理画面のメニュー名
              ),
          'description'=> 'ディスクリプション',
          'public' => true, //公開状態
          'query_var' => true, // スラッグでURLをリクエストできる
          'hierarchical' => false, //固定ページのように親ページを指定するならtrue
          'rewrite' => array('slug' => 'blog'), //スラッグ名
          'supports' => array(
              'title',
              'editor',
              'custom-fields',
              'thumbnail',
              'page-attributes',
              'excerpt'
          ),
        'has_archive' => true,
      )
    );
 
 register_taxonomy(
     'blogcat', //タクソノミ名
     'blog', //タクソノミを使う投稿タイプ名
     array(
         'rewrite' => array('slug' => 'blog'), //投稿タイプのスラッグ
         'label' => 'blogカテゴリー', //ラベル名
         'labels' => array(
             'menu_name' => 'カテゴリー' //管理画面のメニュー名
         ),
         'public' => true, //公開状態
         'hierarchical' => true, //カテゴリのように扱う場合はtrue
         'has_archive' => true,
         'query_var' => true,
         'show_admin_column' => true, //投稿タイプのテーブルにタクソノミーのカラムを生成
     )
   );
  }
 add_action('init', 'new_post_type');

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