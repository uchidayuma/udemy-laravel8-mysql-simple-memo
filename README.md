# 【作って学ぶ】laravel8とMySQLで作るシンプルToDoアプリ

こちらは打田裕馬がUdemyで公開している「laravel8とMySQLで作るシンプルToDoアプリ」のリポジトリです。

詳しくは [Udemy](https://www.udemy.com/course/laravel8mysql)からご覧ください。

[GitHubリポジトリはこちら](https://github.com/uchidayuma/udemy-laravel8-mysql-simple-memo)

[データベース構造（ER図）](https://dbdiagram.io/d/60bdb1efb29a09603d183ab7)

## コマンド一覧
```
composer create-project 'laravel/laravel=8.5.19' --prefer-dist laravel-simple-memo
composer require laravel/ui
php artisan ui bootstrap --auth
npm install && npm run dev
↑でうまくいかないときは
npm audit fix
npm audit fix --force
npm install
npm run dev
.envいじる
php artisan migrate
```


## ソースコード対応表

| レクチャー名                                 | ブランチ名     | 
| -------------------------------------------- | -------------- | 
| マイグレーションファイルにテーブル定義を実装 | migration-file | 
| ログイン機能の実装                       |  login  | 
| 認証用レイアウトファイルの作成             | layout| 
| レイアウトの大枠を開発                    | card-layout        | 
| メモ作成機能の開発（View側）              |  memo-create-1   | 
| メモ作成機能の開発（DB側）                |    memo-create-2 | 
| メモ一覧取得（DB側）                     |      memo-get-1  | 
| メモ一覧をレンダリング                    |       memo-get-2  | 
| メモ更新機能（View側）                   |      memo-update-1  | 
| メモ更新機能（DB側）                     |      memo-update-2  | 
| メモ削除機能の開発                       |     delete-1        |  
| メモにタグを付けられるように改良            |      add-tag       | 
| メモに既存タグを付けられるように改良        |      add-tag-2     | 
| メモ更新にもタグ機能を付与（View側）        |  edit-tag-1  |
| メモ更新にもタグ機能を付与（DB側）         |  edit-tag-2  |
| ViewComposerで共通処理をまとめる         |  view-composer  |
| タグからの絞り込み検索（View側）          |  filter-1  |
| タグからの絞り込み検索（絞り込みロジック）  | filter-2 |
| タグ検索ロジックのリファクタリング         | filter-refactaling |
| メモ作成機能にバリデーションを追加しよう    | validation-1 |
| メモ削除機能に確認をはさもう              | delete-confirm |
| fontawesomeの導入                     | fontawesome |
| 追加CSSで全体を整える                   | css-fix |
| bootstrapとCSSを使ってレスポンシブ対応をしよう |  responsive  |
| 完成物                               | main |


## 各種リンク

[Progate PHP基礎](https://prog-8.com/courses/php)

[Progate HTML・CSS・基礎](https://prog-8.com/courses/html)

[Bootstrapのグリッド・システム](https://getbootstrap.jp/docs/4.2/layout/grid/)

[Bootstrapリファレンス（card)](https://getbootstrap.jp/docs/4.2/components/card/)

[Bootstrapリファレンス（spacing)](https://getbootstrap.jp/docs/4.2/utilities/spacing/)

[Laravel8のバリデーション](https://readouble.com/laravel/8.x/ja/validation.html)

[fontawesome](https://fontawesome.com/v5.15/icons?d=gallery)

[fontawesomeCDN](https://fontawesome.com/v5.15/how-to-use/customizing-wordpress/snippets/setup-cdn-webfont)

[FlexBoxの解説](https://www.webcreatorbox.com/tech/css-flexbox-cheat-sheet#flexbox5)

[BootstrapのFlexBoxプロパティ](https://getbootstrap.jp/docs/5.0/utilities/flex/#justify-content)

