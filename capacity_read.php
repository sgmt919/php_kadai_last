<?php
session_start();
include("functions.php");
check_session_id();
$pdo = connect_to_db();
$user_id = $_SESSION['id'];


$sql = "SELECT * FROM capacity_list ORDER BY updated_at desc limit 1";
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

        $output .= "<td>{$record["tops_ss_capa"]}</td>";
        $output .= "<td>{$record["bottoms_ss_capa"]}</td>";
        $output .= "<td>{$record["dress_ss_capa"]}</td>";
        $output .= "<td>{$record["coat_ss_capa"]}</td>";
        $output .= "<td>{$record["tops_aw_capa"]}</td>";
        $output .= "<td>{$record["bottoms_aw_capa"]}</td>";
        $output .= "<td>{$record["dress_aw_capa"]}</td>";
        $output .= "<td>{$record["coat_aw_capa"]}</td>";
        $output .= "<td>{$record["updated_at"]}</td>";




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
    <title>クローゼットcapacity</title>
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