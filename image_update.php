<?php
include('functions.php');

//更新処理　失敗　後でやり直し
if (isset($_POST['update'])) {//送信ボタンが押された場合
        $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
        $image .= '.' . substr(strrchr($_FILES['image'], '.'), 1);//アップロードされたファイルの拡張子を取得
        $memo = $_POST['memo'];
        //var_dump($username);
        $file = "images/$image";
        $sql = "UPDATE images SET image_name = :image , memo= :memo WHERE id=:id'";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        //$stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':memo', $memo, PDO::PARAM_STR);
        if (!empty($_FILES['image'])) {//ファイルが選択されていれば$imageにファイル名を代入
            move_uploaded_file($_FILES['image'], './images/' . $image);//imagesディレクトリにファイル保存
            if (exif_imagetype($file)) {//画像ファイルかのチェック
                $message = '画像をアップロードしました';
                $stmt->execute();
            } else {
                $message = '画像ファイルではありません';
            }
        }
    }


?>