<?php
include('functions.php');

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
// id受け取り
$id = $_GET['id'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM images WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>画像登録（一覧画面）</title>
</head>

<body>
  <h2><?php echo $msg; ?></h2>
  <form action="image_update.php" method="post" enctype="multipart/form-data" >
  <fieldset>
    <legend>画像登録（編集画面）</legend>
    <a href="image2.php">画像画像一覧</a>
    <div>
        img: <input type="file" name="image" >
        <img src="images/<?= $record['img_name'] ?>" style= "width: 150px;height: auto;\">
    </div>
    <div>
        memo: <input type="text" name="memo" value="<?= $record['memo'] ?>">
    </div>
    <div>
        <input type="hidden" name="id" value="<?= $record['id'] ?>">
    </div>
    <div>
        <button><input type="submit" name="update" value="更新"></button>
    </div>
  </fieldset>
</form>
  <a href="image2.php">画像一覧</a>
<?php echo $link; ?>
</body>

</html>