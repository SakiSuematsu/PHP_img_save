<?php
// DB接続
function connect_to_db()
{
$dbn ='mysql:dbname=img_save;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  return $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}
}

// ログイン状態のチェック関数
function check_session_id()
{
  if (!isset($_SESSION["session_id"]) ||$_SESSION["session_id"] !== session_id()) {
    header('Location:login_form.php');
    exit();
  } else {
    session_regenerate_id(true); // session_id再発行
    $_SESSION["session_id"] = session_id();
  }
}