# ユーザ登録して、ログイン後に画像登録と表示

## DEMO

  - デプロイしている場合はURLを記入（任意）

## 紹介と使い方

  - ユーザー登録してログインしたら、画像を保存できるサイト
  - 更新・削除機能を追加
  - 合計枚数の表示を追加

## 工夫した点

  - ユーザー登録画面、ログイン画面、画像登録画面、画像表示画面の実装
  - ユーザー登録画面、ログイン画面と画像登録画面、画像表示画面はそれぞれ写経
  - ユーザーと画像を紐つけるようDBにテーブルを準備
  - ~~画像表示を３枠作って、一番新しいものと一番古いものとランダムを表示させるようにした~~
  - 画像表示画面には登録したすべての画像を表示するよう変更
  - 削除ボタンの実装
  - 編集ボタンの実装
  - セッションidの再生成の追加
  - ログアウト処理にブラウザに保存した情報の有効期限を操作を追加
  - 画像登録テーブルを一度DROP、登録日時・更新日時・削除日時のカラム追加してテーブル再作成
  - ユーザーテーブルに管理者権限を追加
  - 削除処理を論理削除に変更
  - 合計枚数の表示を追加

## 苦戦した点

  - 画像登録のページを作ってからログインページを作ったせいか、画面遷移で混乱
  - 画面遷移を整理したところで、DBの画像登録テーブルにユーザー名のカラムが足りてないことに気づく
  - カラム追加してみたら、色々エラーとワーニングが出てきた
  - でもPHPのエラーはそんなに苦戦しなくなってきた！
  - 画像のランダム表示が時々うまく読み込めていないようなので要修正→修正完了！
  - エスケープ文字を思い出すまでに時間がかかった（ダブルクオーテーションを文字列認識させたかった）
  - 編集ボタンの実装に苦戦した。
  - グローバル変数$_FILESを使うときは、formタグにenctype="multipart/form-data"が必要！大事！！
  - 提出直前にgithubに手こずった。
  - 原因はgithub上でREADMEを編集してしまって、commitの世代が離れてしまったため
  - エラーの対処を誤り、git fetch origin,git reset hard してしまい、ローカルのコードが世代返りしたw
  - 前日に修正・加筆したコードを書き直し、動作確認する作業発生（号泣）、その後無事pushできました
  - よくよく考えたら、git logでコミットID確認してからgit resetすればよかったのでは？

## やりたいこと
  - 編集画面、画像とメモの両方をinputしてないと更新されない！！どちらかだけの更新もできるよう、要修正！
  - 管理者画面を作りたい、余力があれば（ファイルだけ作った中身空）
  - 削除処理実行時の/images配下の画像のデータ処理をどうするか検討中
  - フレームワークを使ってみたい

## 参考にした web サイトなど

  - PHP 画像のアップロード　https://qiita.com/ryo-futebol/items/11dea44c6b68203228ff
  - PHP ログイン　https://qiita.com/ryo-futebol/items/5fb635199acc2fcbd3ff
  - MySQLの乱数　https://dev.mysql.com/doc/refman/5.6/ja/mathematical-functions.html
  - rand()　https://atsuizo.hatenadiary.jp/entry/2020/12/04/090000
  - グローバル変数　$_FILES　https://webukatu.com/wordpress/blog/20969/
  - Warning: Array to string conversion in の対応 https://qiita.com/ryouya3948/items/00234d81d00fd0125f63
