<?php
session_start();
include("functions.php");
check_session_id();
$pdo = connect_to_db();
$user_id = $_SESSION['id'];


$select3 = $_POST['select3'];
$select4 = $_POST['select4'];


$sql = "SELECT  * FROM list_table WHERE item1  ='$select4' AND season in ('$select3','シーズンレス')";
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
    $output1 = "";
    foreach ($result as $record) {
        $output1 .= "<tr>";
        $output1 .= "<td><img src='{$record["image"]}' height=150px></td>";
        $output1 .= "</tr>";
    }
    unset($value);
}
$sql = "SELECT * FROM capacity_list ORDER BY updated_at desc limit 1";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output2 = "";
    foreach ($result as $record) {
        $output .= "<tr>";

        $output2 .= "<td>{$record["tops_ss_capa"]}</td>";
        $output2 .= "<td>{$record["bottoms_ss_capa"]}</td>";
        $output2 .= "<td>{$record["dress_ss_capa"]}</td>";
        $output2 .= "<td>{$record["coat_ss_capa"]}</td>";
        $output2 .= "<td>{$record["tops_aw_capa"]}</td>";
        $output2 .= "<td>{$record["bottoms_aw_capa"]}</td>";
        $output2 .= "<td>{$record["dress_aw_capa"]}</td>";
        $output2 .= "<td>{$record["coat_aw_capa"]}</td>";
        $output2 .= "<td>{$record["updated_at"]}</td>";
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
    <fieldset>
        <legend>クローゼットcapacity</legend>



        <table>
            <thead>
                <tr>
                    <th>TOPS-SS</th>
                    <th>BOTTOMS-SS</th>
                    <th>DRESS-SS</th>
                    <th>COAT-SS</th>
                    <th>TOPS-AW</th>
                    <th>BOTTOMS-AW</th>
                    <th>DRESS-AW</th>
                    <th>COAT-AW</th>
                    <th>更新日</th>



                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?= $output2 ?>
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
    <h3>MY WARDROBE</h3>
    <fieldset>
        <p>filter</p>
        <form method="post" action="wardrobe.php">
            <div>
                <input type="radio" name="select3" value="春夏" id="春夏"><label for="春夏">春夏</label>
                <input type="radio" name="select3" value="秋冬" id="秋冬"><label for="秋冬">秋冬</label>

            </div>
            <div>
                <input type="radio" name="select4" value="tops" id="tops"><label for="tops">トップス</label>
                <input type="radio" name="select4" value="bottoms" id="bottoms"><label for="bottoms">ボトムス</label>
                <input type="radio" name="select4" value="dress" id="dress"><label for="dress">ワンピース</label>
                <input type="radio" name="select4" value="others" id="others"><label for="others">その他</label>
            </div>
            <div>
                <button>submit</button>
            </div>

    </fieldset>
    <fieldset>
        <legend><?php echo $select3 . 'の' . $select4 . 'は' . $count . 'アイテムあります。'; ?></legend>
        <table>
            <tbody>
                <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
                <?= $output1 ?>
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