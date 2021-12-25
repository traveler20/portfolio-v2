# HTML の WordPress 化

## 実装手順

1. HTML の実装
2. 共通部分のパーツ化/パーツの読み込み
3. テーマのアップ/有効化
4. テンプレートタグを使ってパスを書き換える
5. お知らせ等の投稿データを出力
6. テンプレートファイルの概念に従い各種ファイル作成
7. 微調整

# 1. HTML の実装

HTML/CSS で制作したサイトを実装する。

# 2. 共通部分のパーツ化/パーツの読み込み

include タグを使って、ヘッダー・サイドバー・フッターを読み込む

```
<?php get_header();?>
```

```
header.php
index.php
sidebar.php
footer.php
style.css
```

# 3. テーマのアップ/有効化

`themes`にアップ

# 4. テンプレートタグを使ってパスを書き換える

css/js/img などのパスを WordPress 用に設定する。

```
src="<?php home_url(); ?>asset/img/sample.jpg"
```

# 5. お知らせ等の投稿データを出力

WordPress 投稿を使った記事の管理。

```

```

# 6. テンプレートファイルの概念に従い各種ファイル作成

各種必要なテーマファイルを作成。

```
page.php
single.php
```

固定ページだと以下のようなテンプレート階層に従ってサイトが構築される。

```
php-{slug}.php
php-{id}.php
page.php
```

# 7. 微調整
