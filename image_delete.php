<?php
include('functions.php');

//セッションスタート
session_start();
// ログイン状態のチェック関数
check_session_id();

$id = $_GET['id'];
$pdo = connect_to_db();

//物理削除　後で論理削除に作り直し
//$sql = 'DELETE FROM images WHERE id=:id'; 

//論理削除
$sql = 'UPDATE images SET deleted_at = now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:image2.php");
exit();

?>