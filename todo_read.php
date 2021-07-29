<?php
session_start();
include("functions.php");
check_session_id();
$pdo = connect_to_db();
$user_id = $_SESSION['id'];


$sql = "SELECT * FROM list_table";
// $sql = 'SELECT * FROM list_table LEFT OUTER JOIN (SELECT todo_id, COUNT(id) AS cnt FROM like_table GROUP BY todo_id) AS result_table ON list_table.id = result_table.todo_id';
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
    $output .= "<td><img src='{$record["image"]}' height=120px></td>";
    $output .= "<td>{$record["color"]}</td>";
    $output .= "<td>{$record["season"]}</td>";
    $output .= "<td>{$record["item1"]}</td>";
    $output .= "<td>{$record["item2"]}</td>";
    $output .= "<td>{$record["shop"]}</td>";
    $output .= "<td>{$record["purchase"]}</td>";
    $output .= "<td>{$record["favorite"]}</td>";
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
  <title>クローゼットリスト：全アイテム表示（一覧画面）</title>
</head>

<body>
  <form method="post" action="todo_read_1.php">
    <fieldset>
      <h3>FILTER</h3>
      <div>
        色:
        <input type="radio" name="select1" value="白" id="white" checked><label for="white">白</label>
        <input type="radio" name="select1" value="黒" id="黒"><label for="黒">黒</label>
        <input type="radio" name="select1" value="茶" id="brown"><label for="brown">ブラウン</label>
        <input type="radio" name="select1" value="ネイビー" id="blue"><label for="blue">ブルー・ネイビー</label>
        <input type="radio" name="select1" value="赤" id="red"><label for="red">赤</label>
        <input type="radio" name="select1" value="その他" id="otehrs"><label for="others">その他</label>
      </div>
      <div>
        季節:
        <input type="radio" name="select2" value="春夏" id="春夏" checked><label for="春夏">春夏</label>
        <input type="radio" name="select2" value="秋冬" id="秋冬"><label for="秋冬">秋冬</label>

      </div>
      <button>submit</button>

      </div>
    </fieldset>
    <!-- <style>
      fieldset {
        background-color: salmon;
      }
    </style> -->

  </form>
  <fieldset>
    <legend>クローゼットリスト：全アイテム表示（一覧画面）</legend>
    <a href="todo_input.php">listに入れる</a>
    <a href="todo_logout.php">logout</a>
    <a href="top_page.php">TOP PAGEにもどる</a>

    <table>
      <thead>
        <tr>
          <th>color</th>
          <th>season</th>
          <th>item1</th>
          <th>item2</th>
          <th>shop</th>
          <th>purchase</th>
          <th>favorite</th>
          <th>memo</th>
          <th></th>
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