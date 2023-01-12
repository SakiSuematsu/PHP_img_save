<?php
include('functions.php');
$pdo = connect_to_db();

//セッションスタート
session_start();
$username = $_SESSION['name'];
//var_dump($username);
if (isset($_SESSION['id'])) {//ログインしているとき
    $msg = 'こんにちは' . htmlspecialchars($username, \ENT_QUOTES, 'UTF-8') . 'さん';
    $link = '<a href="logout.php">ログアウト</a>';
} else {//ログインしていない時
    $msg = 'ログインしていません';
    $link = '<a href="login.php">ログイン</a>';
}

// $dbn ='mysql:dbname=img_save;charset=utf8mb4;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// //DB接続
// try {
//     $dbh = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//     echo $e->getMessage();
// }
    if (isset($_POST['upload'])) {//送信ボタンが押された場合
        $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
        $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
        $username = $_SESSION['name'];
        $memo = $_POST['memo'];
        //var_dump($username);
        $file = "images/$image";
        $sql = "INSERT INTO images(id,img_name,user_name,memo) VALUES (NULL, :image, :username,:memo)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
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

?>

<h1>画像アップロード</h1>
<h2><?php echo $msg; ?></h2>
<?php echo $link; ?>
<!--送信ボタンが押された場合-->
<?php if (isset($_POST['upload'])): ?>
    <p><?php echo $message; ?></p>
    <p><a href="image2.php">画像表示へ</a></p>
<?php else: ?>
    <form method="post" enctype="multipart/form-data">
        <p>アップロード画像</p>
        <input type="file" name="image">
        <input type="test" name="memo">
        <button><input type="submit" name="upload" value="送信"></button>
    </form>
<?php endif;?>