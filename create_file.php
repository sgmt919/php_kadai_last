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






if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
  // 送信が正常に行われたときの処理
  $uploaded_file_name = $_FILES['upfile']['name']; //ファイル名の取得 
  $temp_path = $_FILES['upfile']['']; //tmpフォルダの場所 
  $directory_path = 'upload/'; //アップロード先フォルダ
  $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
  $unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
  $filename_to_save = $directory_path . $unique_name;
} else {
  // 送られていない，エラーが発生，などの場合
  // exit('Error:画像が送信されていません');
  $sql = 'INSERT INTO list_table(id, image, color, season, item1, item2, purchase, shop, favorite, memo) VALUES (NULL, NULL, :color,  :season, :item1, :item2, :purchase, :shop, :favorite, :memo)';

  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':color', $color, PDO::PARAM_STR);
  $stmt->bindValue(':season', $season, PDO::PARAM_STR);
  $stmt->bindValue(':item1', $item1, PDO::PARAM_STR);
  $stmt->bindValue(':item2', $item2, PDO::PARAM_STR);
  $stmt->bindValue(':purchase', $purchase, PDO::PARAM_STR);
  $stmt->bindValue(':shop', $shop, PDO::PARAM_STR);
  $stmt->bindValue(':favorite', $favorite, PDO::PARAM_STR);
  $stmt->bindValue(':memo', $memo, PDO::PARAM_STR);
  $status = $stmt->execute();
  if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
  } else {
    header("Location:todo_read.php");
    exit();
  }
}


if (is_uploaded_file($temp_path)) {
  // ↓ここでtmpファイルを移動する
  if (move_uploaded_file($temp_path, $filename_to_save)) {
    chmod($filename_to_save, 0644); // 権限の変更 
    // $img = '<img src="' . $filename_to_save . '" >'; // imgタグを設定
    // ここからファイルアップロード&DB登録の処理を追加しよう！！！
    $sql = 'INSERT INTO list_table(id, image, color, season, item1, item2, purchase, shop ,favorite ,memo) VALUES (NULL, :image, :color,  :season, :item1, :item2, :purchase, :shop, :favorite, :memo)';
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
    $status = $stmt->execute();

    // var_dump($_POST, $_FILES);
    // exit();



    if ($status == false) {
      $error = $stmt->errorInfo();
      echo json_encode(["error_msg" => "{$error[2]}"]);
      exit();
    } else {
      header("Location:todo_read.php");
      exit();
    }
  } else {
    exit('Error:アップロードできませんでした'); // 画像の保存に失敗 
  }
} else {
  //     exit('Error:画像がありません'); // tmpフォルダにデータがない 
  //  } else 
  //   {

}
