<?php
// DBへの接続
include_once('./dbconnect.php');

// function.phpを読み込む
include_once('./functions.php');

$id = $_GET['id'];

// SQL文を作成
$sql = "DELETE FROM records WHERE id = :id";
// SQLの実行準備
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
// SQLの実行
$stmt->execute();

header('Location: ./index.php');
exit;

?>