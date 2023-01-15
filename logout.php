<?php
session_start();

//セッションの中身をすべて削除
$_SESSION = array();

// ブラウザに保存した情報の有効期限を操作
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '', time() - 42000, '/');
}

//セッションを破壊
session_destroy();
?>

<p>ログアウトしました。</p>
<a href="signup.php">ログインへ</a>