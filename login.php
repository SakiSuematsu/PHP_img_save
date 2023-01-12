<?php
include('functions.php');
$pdo = connect_to_db();

//セッションスタート
session_start();
$mail = $_POST['mail'];
// $dbn ='mysql:dbname=img_save;charset=utf8mb4;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';
// try {
//     $dbh = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//     $msg = $e->getMessage();
// }

$sql = "SELECT * FROM users WHERE mail = :mail";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mail', $mail);
$stmt->execute();
$member = $stmt->fetch();
//var_dump($member);
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
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>