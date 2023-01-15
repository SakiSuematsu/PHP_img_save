<?php
include('functions.php');
$pdo = connect_to_db();

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

$sql = 'SELECT * FROM images WHERE user_name=:username order by id' ;

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";

foreach ($result as $record) {
  $output .= "
    <tr>
      <td><img src=\"images/{$record["img_name"]}\" style= \"width: 150px;height: auto;\"></td> 
      <td>{$record["memo"]}</td>
       <td>
        <a href='image_edit.php?id={$record["id"]}'>edit</a>
      </td>
      <td>
        <a href='image_delete.php?id={$record["id"]}'>delete</a>
      </td>
    </tr>
  ";
}

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
  <fieldset>
    <legend>画像登録（一覧画面）</legend>
    <a href="upload.php">画像アップロード</a>
    <table>
      <thead>
        <tr>
          <th>img</th>
          <th>memo</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
  <a href="upload.php">画像アップロード</a>
<?php echo $link; ?>
</body>

</html>