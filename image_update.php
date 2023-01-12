<?php
include('functions.php');
$pdo = connect_to_db();

//セッションスタート
session_start();
$username = $_SESSION['name'];

// 入力項目のチェック
if (
  !isset($_FILES['image']) || $_FILES['image'] === '' ||
  !isset($_POST['memo']) || $_POST['memo'] === '' ||
  !isset($_POST['id']) || $_POST['id'] === ''
) {
  exit('paramError');
}

//更新処理
if (isset($_POST['update'])) {//送信ボタンが押された場合
        $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
        $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
        $file = "images/$image";
        $memo = $_POST['memo'];
        $id = $_POST['id'];
        $sql = "UPDATE images SET img_name = :image , memo= :memo WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        //$stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':memo', $memo, PDO::PARAM_STR);
        if (!empty($_FILES['image']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
            move_uploaded_file($_FILES['image']['tmp_name'], './images/' . $image);//imagesディレクトリにファイル保存
            if (exif_imagetype($file)) {//画像ファイルかのチェック
                $message = '画像をアップロードしました';
                $stmt->execute();
            } else {
                $message = '画像ファイルではありません';
            }
        }
    }
header('Location:image2.php');
exit();
?>