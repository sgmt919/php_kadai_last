<?php
session_start();
include("functions.php");
check_session_id();
$pdo = connect_to_db();
$user_id = $_SESSION['id'];



// $sql = "SELECT TOP 1  FROM list_table ORDER BY NEWID()";
// $sql = SELECT TOP 10 カラム名 FROM 表 ORDER BY NEWID();
$sql = "SELECT * FROM list_table WHERE item1 ='tops'  ORDER BY RAND() LIMIT 1";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();


if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output1 = "";
    foreach ($result1 as $record1) {
        $output1 .= "<tr>";
        $output1 .= "<td><img src='{$record1["image"]}' height=400px></td>";
        $output1 .= "<td>{$record1["favorite"]}</td>";
        $output1 .= "<td>{$record1["season"]}</td>";
        $output1 .= "<td>{$record1["purchase"]}</td>";
        $output1 .= "<td>{$record1["memo"]}</td>";
        $output1 .= "</tr>";
    }
    unset($value);
}
$sql = "SELECT * FROM list_table WHERE item1 ='bottoms'  ORDER BY RAND() LIMIT 1";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output2 = "";
    foreach ($result2 as $record2) {
        $output2 .= "<tr>";
        $output2 .= "<td><img src='{$record2["image"]}' height=400px></td>";
        $output2 .= "<td>{$record2["favorite"]}</td>";
        $output2 .= "<td>{$record2["season"]}</td>";
        $output2 .= "<td>{$record2["purchase"]}</td>";
        $output2 .= "<td>{$record2["memo"]}</td>";
        $output2 .= "</tr>";
    }
    unset($value);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クローゼットリスト（一覧画面）</title>
    <a href="todo_read.php">全てのアイテムを見る</a>
    <a href="top_page.php">TOP PAGEにもどる</a>
    <a href="todo_logout.php">logout</a>
</head>

<body>
    <h3>CORDINATE</h3>
    <a href="random.php">change</a>
    <table>
        <tbody>
            <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
            <?= $output1 ?>
            <?= $output2 ?>

        </tbody>
        <style>
            table {
                width: 300px;
                justify-content: center;
            }
        </style>
    </table>

</body>

</html>