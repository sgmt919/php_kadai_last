<?php
session_start();
include("functions.php");
check_session_id();
$pdo = connect_to_db();
$user_id = $_SESSION['id'];


$sql = "SELECT * FROM event_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($result as $record) {
        $output .= "<tr>";
        $output .= "<td><img src='{$record["image2"]}' height=200px></td>";
        $output .= "<td>{$record["event_date"]}</td>";
        $output .= "<td>{$record["event"]}</td>";
        $output .= "<td>{$record["memo2"]}</td>";

        $output .= "<td><a href='like_create.php?user_id={$user_id}&todo_id={$record["id"]}'>like{$record['cnt']}</a></td>";
        $output .= "<td><a href='todo_edit.php?id={$record["id"]}'>edit</a></td>";
        $output .= "<td><a href='todo_delete.php?id={$record["id"]}'>delete</a></td>";

        $output .= "</tr>";
    }
    unset($value);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クローゼットリスト：全アイテム表示（一覧画面）</title>
</head>

<body>

    <fieldset>
        <legend>コーデ記録（一覧画面）</legend>
        <a href="diary_input.php">入力画面</a>
        <a href="todo_logout.php">logout</a>



        <table>
            <thead>
                <tr>
                    <th>event_date</th>
                    <th>scene</th>

                    <th>memo2</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?= $output ?>
            </tbody>
            <!-- <style>
          tbody {
            background: #e4f5f7;
            flex-wrap: wrap;

          }

          table {
            width: 300px;

          }
        </style> -->
        </table>
    </fieldset>
</body>

</html>