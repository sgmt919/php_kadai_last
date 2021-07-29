<?php
session_start();
include("functions.php");
check_session_id();
$pdo = connect_to_db();
$user_id = $_SESSION['id'];


if (
    !isset($_POST['tops_ss_capa']) || $_POST['tops_ss_capa'] == '' ||
    !isset($_POST['bottoms_ss_capa']) || $_POST['bottoms_ss_capa'] == '' ||
    !isset($_POST['dress_ss_capa']) || $_POST['dress_ss_capa'] == '' ||
    !isset($_POST['coat_ss_capa']) || $_POST['coat_ss_capa'] == '' ||
    !isset($_POST['tops_aw_capa']) || $_POST['tops_aw_capa'] == '' ||
    !isset($_POST['bottoms_aw_capa']) || $_POST['bottoms_aw_capa'] == '' ||
    !isset($_POST['dress_aw_capa']) || $_POST['dress_aw_capa'] == '' ||
    !isset($_POST['coat_aw_capa']) || $_POST['coat_aw_capa'] == ''


) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}


$tops_ss_capa = $_POST['tops_ss_capa'];
$bottoms_ss_capa = $_POST['bottoms_ss_capa'];
$dress_ss_capa = $_POST['dress_ss_capa'];
$coat_ss_capa = $_POST['coat_ss_capa'];
$tops_aw_capa = $_POST['tops_aw_capa'];
$bottoms_aw_capa = $_POST['bottoms_aw_capa'];
$dress_aw_capa = $_POST['dress_aw_capa'];
$coat_aw_capa = $_POST['coat_aw_capa'];



$sql = 'INSERT INTO capacity_list(id, tops_ss_capa, bottoms_ss_capa, dress_ss_capa, coat_ss_capa, tops_aw_capa, bottoms_aw_capa, dress_aw_capa, coat_aw_capa, updated_at) VALUES (NULL,:tops_ss_capa, :bottoms_ss_capa, :dress_ss_capa, :coat_ss_capa, :tops_aw_capa, :bottoms_aw_capa, :dress_aw_capa, :coat_aw_capa ,sysdate())';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':tops_ss_capa', $tops_ss_capa, PDO::PARAM_INT);
$stmt->bindValue(':bottoms_ss_capa', $bottoms_ss_capa, PDO::PARAM_INT);
$stmt->bindValue(':dress_ss_capa', $dress_ss_capa, PDO::PARAM_INT);
$stmt->bindValue(':coat_ss_capa', $coat_ss_capa, PDO::PARAM_INT);
$stmt->bindValue(':tops_aw_capa', $tops_aw_capa, PDO::PARAM_INT);
$stmt->bindValue(':bottoms_aw_capa', $bottoms_aw_capa, PDO::PARAM_INT);
$stmt->bindValue(':dress_aw_capa', $dress_aw_capa, PDO::PARAM_INT);
$stmt->bindValue(':coat_aw_capa', $coat_aw_capa, PDO::PARAM_INT);
$status = $stmt->execute();

// var_dump($_POST);
// exit();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:capacity_read.php");
    exit();
}
