<?php
session_start();
include("functions.php");
check_session_id();
$pdo = connect_to_db();

if (
    !isset($_POST['event_date']) || $_POST['event_date'] == '' ||
    !isset($_POST['event']) || $_POST['event'] == '' ||
    !isset($_POST['memo2']) || $_POST['memo2'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}


$event_date = $_POST['event_date'];
$event = $_POST['event'];
$memo2 = $_POST['memo2'];




if (isset($_FILES['upfile2']) && $_FILES['upfile2']['error'] == 0) {
    // 送信が正常に行われたときの処理
    $uploaded_file_name = $_FILES['upfile2']['name']; //ファイル名の取得 
    $temp_path = $_FILES['upfile2']['tmp_name']; //tmpフォルダの場所 
    $directory_path = 'upload/'; //アップロード先フォルダ
    $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
    $unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
    $filename_to_save = $directory_path . $unique_name;
} else {
    // 送られていない，エラーが発生，などの場合
    // exit('Error:画像が送信されていません');
    $sql = 'INSERT INTO event_table(id, event_date, event, image2, memo2) VALUES (NULL, :event_date, :event, NULL ,:memo2)';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':event_date', $event_date, PDO::PARAM_STR);
    $stmt->bindValue(':event', $event, PDO::PARAM_STR);
    $stmt->bindValue(':memo2', $memo2, PDO::PARAM_STR);

    $status = $stmt->execute();
    if ($status == false) {
        $error = $stmt->errorInfo();
        echo json_encode(["error_msg" => "{$error[2]}"]);
        exit();
    } else {
        header("Location:diary_read.php");
        exit();
    }
}


if (is_uploaded_file($temp_path)) {
    // ↓ここでtmpファイルを移動する
    if (move_uploaded_file($temp_path, $filename_to_save)) {
        chmod($filename_to_save, 0644); // 権限の変更 
        // $img = '<img src="' . $filename_to_save . '" >'; // imgタグを設定
        // ここからファイルアップロード&DB登録の処理を追加しよう！！！
        $sql = 'INSERT INTO event_table (id, event_date, event, image2 ,memo2) VALUES (NULL, :event_date, :event, :image2, :memo2)';

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':event_date', $event_date, PDO::PARAM_STR);
        $stmt->bindValue(':event', $event, PDO::PARAM_STR);
        $stmt->bindValue(':image2', $filename_to_save, PDO::PARAM_STR);
        $stmt->bindValue(':memo2', $memo2, PDO::PARAM_STR);

        $status = $stmt->execute();





        if ($status == false) {
            $error = $stmt->errorInfo();
            echo json_encode(["error_msg" => "{$error[2]}"]);
            exit();
        } else {
            header("Location:diary_read.php");
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
