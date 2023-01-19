<?php
include('functions.php');
$pdo = connect_to_db();

//フォームからの値をそれぞれ変数に代入
$username = $_POST['username'];
$mail = $_POST['mail'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

//フォームに入力されたmailがすでに登録されていないかチェック
$sql = "SELECT * FROM users WHERE mail = :mail";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mail', $mail);
$stmt->execute();
$member = $stmt->fetch();
if ($member['mail'] === $mail) {
    $msg = '同じメールアドレスが存在します。';
    $link = '<a href="signup.php">戻る</a>';
} else {
    //登録されていなければinsert 
    $sql = "INSERT INTO users(name, mail, pass, is_admin, created_at, updated_at, deleted_at) VALUES (:username, :mail, :pass, 0, now(), now(), NULL)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':mail', $mail);
    $stmt->bindValue(':pass', $pass);
    $stmt->execute();
    $msg = '会員登録が完了しました';
    $link = '<a href="login_form.php">ログインページ</a>';
}
?>

<h1><?php echo $msg; ?></h1><!--メッセージの出力-->
<?php echo $link; ?>