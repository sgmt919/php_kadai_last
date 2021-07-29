<?php
session_start();
include("functions.php");
check_session_id();
$pdo = connect_to_db();
$user_id = $_SESSION['id'];


$select3 = $_POST['select3'];
$select4 = $_POST['select4'];


$sql = "SELECT  * FROM list_table WHERE favorite in ('1','2')";
// $sql = 'SELECT * FROM list_table LEFT OUTER JOIN (SELECT todo_id, COUNT(id) AS cnt FROM like_table GROUP BY todo_id) AS result_table ON list_table.id = result_table.todo_id';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
$count = $stmt->rowCount();




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
        $output .= "<td>{$record["favorite"]}</td>";
        $output .= "<td>{$record["season"]}</td>";
        $output .= "<td>{$record["purchase"]}</td>";
        $output .= "<td>{$record["memo"]}</td>";
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
    <a href="todo_read.php">全てのアイテムを見る</a>
    <a href="top_page.php">TOP PAGEにもどる</a>
    <a href="todo_logout.php">logout</a>
</head>

<body>
    <h3>GET RID OF(手放す候補）</h3>

    <fieldset>
        <legend><?php echo $select3 . 'の' . $select4 . 'は' . $count . 'アイテムあります。'; ?></legend>
        <table>
            <tbody>
                <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
                <?= $output ?>
            </tbody>
            <style>
                tbody {
                    display: flex;
                }

                table {
                    width: 300px;
                }
            </style>
        </table>
    </fieldset>
</body>

</html>