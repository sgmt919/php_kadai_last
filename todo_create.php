<?php
session_start();
include("functions.php");
check_session_id();
$pdo = connect_to_db();

if (
  !isset($_POST['color']) || $_POST['color'] == '' ||
  !isset($_POST['season']) || $_POST['season'] == '' ||
  !isset($_POST['item1']) || $_POST['item1'] == '' ||
  !isset($_POST['item2']) || $_POST['item2'] == '' ||
  !isset($_POST['purchase']) || $_POST['purchase'] == '' ||
  !isset($_POST['shop']) || $_POST['shop'] == '' ||
  !isset($_POST['favorite']) || $_POST['favorite'] == '' ||
  !isset($_POST['memo']) || $_POST['memo'] == ''

) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$color = $_POST['color'];
$season = $_POST['season'];
$item1 = $_POST['item1'];
$item2 = $_POST['item2'];
$purchase = $_POST['purchase'];
$shop = $_POST['shop'];
$favorite = $_POST['favorite'];
$memo = $_POST['memo'];


$sql = 'INSERT INTO list_table(id, image, color, season, item1, item2, shop, purchase ,favorite ,memo) VALUES (NULL, :image, :color, :season, :item1, :item2, :shop, :purchase, :favorite, :memo)';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':color', $color, PDO::PARAM_STR);
$stmt->bindValue(':season', $season, PDO::PARAM_STR);
$stmt->bindValue(':item1', $item1, PDO::PARAM_STR);
$stmt->bindValue(':item2', $item2, PDO::PARAM_STR);
$stmt->bindValue(':shop', $shop, PDO::PARAM_STR);
$stmt->bindValue(':purchase', $purchase, PDO::PARAM_STR);
$stmt->bindValue(':favorite', $favorite, PDO::PARAM_STR);
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);
$stmt->bindValue(':image', $filename_to_save, PDO::PARAM_STR);

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:todo_input.php");
  exit();
}
