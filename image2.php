<?php
// include('functions.php');
// $pdo = connect_to_db();

// $dbn = 'mysql:dbname=gsf_d12_15;charset=utf8mb4;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//   $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//   echo json_encode(["db error" => "{$e->getMessage()}"]);
//   exit();
// }


$dbn ='mysql:dbname=img_save;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo $e->getMessage();
}
//セッションスタート
session_start();
$username = $_SESSION['name'];
if (isset($_SESSION['id'])) {//ログインしているとき
    $msg =  htmlspecialchars($username, \ENT_QUOTES, 'UTF-8') . 'さんの登録した画像です';
    $link = '<a href="logout.php">ログアウト</a>';
} else {//ログインしていない時
    $msg = 'ログインしていません';
    $link = '<a href="login.php">ログイン</a>';
}

$sql = 'SELECT * FROM images' ;

$stmt = $pdo->prepare($sql);

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
      <td><img src="images/{$record["img_name"]}>" width="150" height="200"></td> 
      <td>{$record["memo"]}</td>
       <td>
        <a href='todo_edit.php?id={$record["id"]}'>edit</a>
      </td>
      <td>
        <a href='todo_delete.php?id={$record["id"]}'>delete</a>
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
    <a href="update.php">画像アップロード</a>
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