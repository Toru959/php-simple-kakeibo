<?php

// DBへの接続
include_once('./dbconnect.php');

// function.phpを読み込む
include_once('./functions.php');

// {処理の流れ}
// 1.画面で入力されてた値の取得
// 2.PHPからmysqlへ接続
// 3.sql文を作成して、画面で入力された値でrecordsテーブルを更新
// 4.index.phpに画面遷移する

$date = $_POST['date'];
$title = $_POST['title'];
$amount = $_POST['amount'];
$type = $_POST['type'];
$id = $_POST['id'];

$sql = "UPDATE records SET title = :title, type = :type, amount = :amount, date = :date, updated_at = now() WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(':title', $title, PDO::PARAM_STR);
$stmt->bindParam(':type', $type, PDO::PARAM_INT);
$stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
$stmt->bindParam(':date', $date, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);

$stmt->execute();

header('Location: ./index.php');
exit;