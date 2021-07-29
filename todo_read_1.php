<?php
session_start();
include("functions.php");
check_session_id();
$pdo = connect_to_db();
$user_id = $_SESSION['id'];

$select1 = $_POST['select1'];
$select2 = $_POST['select2'];


$sql = "SELECT  * FROM list_table WHERE color ='$select1' AND season ='$select2'";
// $sql = 'SELECT * FROM list_table LEFT OUTER JOIN (SELECT todo_id, COUNT(id) AS cnt FROM like_table GROUP BY todo_id) AS result_table ON list_table.id = result_table.todo_id';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
$count = $stmt->rowCount();



echo '色は' . $select1;
echo 'シーズンは' . $select2 . $count . 'item　SELECTしました。';
if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($result as $record) {
        $output .= "<tr>";
        $output .= "<td><img src='{$record["image"]}' height=150px></td>";
        $output .= "<td>{$record["color"]}</td>";
        $output .= "<td>{$record["season"]}</td>";
        $output .= "<td>{$record["item1"]}</td>";
        $output .= "<td>{$record["item2"]}</td>";
        $output .= "<td>{$record["shop"]}</td>";
        $output .= "<td>{$record["memo"]}</td>";
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
    <title>クローゼットリスト（一覧画面）</title>
</head>

<body>
    <fieldset>
        <legend>クローゼットリスト（一覧画面）</legend>
        <a href="todo_input.php">入力画面</a>
        <a href="todo_logout.php">logout</a>
        <a href="todo_read.php">全てのアイテムを見る</a>

        <table>
            <thead>
                <tr>
                    <th>color</th>
                    <th>season</th>
                    <th>item1</th>
                    <th>item2</th>
                    <th>shop</th>
                    <th>memo</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>


            <tbody>
                <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
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