<?php

if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
  // 送信が正常に行われたときの処理
  $uploaded_file_name = $_FILES['upfile']['name']; //ファイル名の取得 
  $temp_path = $_FILES['upfile']['tmp_name']; //tmpフォルダの場所 
  $directory_path = 'upload/'; //アップロード先フォルダ
  $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
  $unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
  $filename_to_save = $directory_path . $unique_name;
} else {
  // 送られていない，エラーが発生，などの場合
  exit('Error:画像が送信されていません');
}
// var_dump($_FILES);
// exit();

if (is_uploaded_file($temp_path)) {
  // ↓ここでtmpファイルを移動する
  if (move_uploaded_file($temp_path, $filename_to_save)) {
    chmod($filename_to_save, 0644); // 権限の変更 
    $img = '<img src="' . $filename_to_save . '" >'; // imgタグを設定
  } else {
    exit('Error:アップロードできませんでした'); // 画像の保存に失敗 
  }
} else {
  exit('Error:画像がありません'); // tmpフォルダにデータがない 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>file_upload</title>
</head>

<body>
  <?php echo $img ?>

</body>

</html>