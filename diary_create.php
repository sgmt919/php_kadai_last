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




$sql = 'INSERT INTO event_table(id, event_date, event, image2) VALUES (NULL, :event_date, :event, :image2)';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':event_date', $event_date, PDO::PARAM_STR);
$stmt->bindValue(':event', $event, PDO::PARAM_STR);
$stmt->bindValue(':memo2', $memo2, PDO::PARAM_STR);

$stmt->bindValue(':image2', $filename_to_save, PDO::PARAM_STR);

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:diary_read.php");
    exit();
}
