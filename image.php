<?php
//セッションスタート
session_start();
// ログイン状態のチェック関数
check_session_id();
$username = $_SESSION['name'];
if (isset($_SESSION['id'])) {//ログインしているとき
    $msg =  htmlspecialchars($username, \ENT_QUOTES, 'UTF-8') . 'さんの登録した画像です';
    $link = '<a href="logout.php">ログアウト</a>';
} else {//ログインしていない時
    $msg = 'ログインしていません';
    $link = '<a href="login.php">ログイン</a>';
}

$dbn ='mysql:dbname=img_save;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
    $dbh = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo $e->getMessage();
}
    //最後に登録した画像
    $sql_0 = "SELECT * FROM images WHERE id = (select MAX(id) from images where user_name=:username)";
    $stmt_0 = $dbh->prepare($sql_0);
    $stmt_0->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt_0->execute();
    $image_0 = $stmt_0->fetch();
    
    //最初に登録した画像
    $sql_1 = "SELECT * FROM images WHERE id = (select MIN(id) from images where user_name=:username)";
    $stmt_1 = $dbh->prepare($sql_1);
    $stmt_1->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt_1->execute();
    $image_1 = $stmt_1->fetch();

    //ランダム表示 表示されたりされなかったり、なぜだ？
    //$sql_2 = "SELECT * FROM images WHERE user_name=:username and id = floor((SELECT MIN(id) FROM images WHERE user_name=:username)+rand()*3)" ;
    
    //修正版
    $sql_2 = "SELECT * FROM images WHERE id > (SELECT MIN(id) FROM IMAGES WHERE user_name=:username) and id < (SELECT MAX(id) FROM IMAGES WHERE user_name=:username) ORDER BY rand() LIMIT 1";
    $stmt_2 = $dbh->prepare($sql_2);
    $stmt_2->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt_2->execute();
    $image_2 = $stmt_2->fetch();
?>

<h1>画像表示</h1>
<h2><?php echo $msg; ?></h2>
<img src="images/<?php echo $image_0['img_name']; ?>" width="150" height="200">
<img src="images/<?php echo $image_1['img_name']; ?>" width="150" height="200">
<img src="images/<?php echo $image_2['img_name']; ?>" width="150" height="200">
<a href="upload.php">画像アップロード</a>
<?php echo $link; ?>
