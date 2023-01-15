<?php
include('functions.php');
$pdo = connect_to_db();

//セッションスタート
session_start();
$mail = $_POST['mail'];

$sql = "SELECT * FROM users WHERE mail = :mail";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mail', $mail);
$stmt->execute();
$member = $stmt->fetch();

//指定したハッシュがパスワードにマッチしているかチェック
if (password_verify($_POST['pass'], $member['pass'])) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $member['id'];
    $_SESSION['name'] = $member['name'];
    $msg = 'ログインしました。';
    $link = '<a href="upload.php">ホーム</a>';
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login_form.php">戻る</a>';
}

// ユーザ有無で条件分岐
$sql2 = "SELECT * FROM users WHERE mail = :mail";
$stmt2 = $pdo->prepare($sql2);
$stmt2->bindValue(':mail', $mail);

try {
  $status = $stmt2->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$user = $stmt2->fetch(PDO::FETCH_ASSOC);

if (!$user) {
  echo "<p>ログイン情報に誤りがあります</p>";
  echo "<a href=login_form.php>ログイン</a>";
  exit();
} else {
  $_SESSION = array();
  $_SESSION['session_id'] = session_id();
  //$_SESSION['is_admin'] = $user['is_admin'];
  $_SESSION['name'] = $user['name'];
  $_SESSION['id'] = $user['id'];
//   var_dump($_SESSION);
//   exit();
  header("Location:upload.php");
  exit();
}
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>