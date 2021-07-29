<?php
session_start();

include("functions.php");
check_session_id();

$id = $_GET["id"];

$pdo = connect_to_db();

$sql = 'SELECT * FROM list_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（編集画面）</title>
</head>

<body>
  <form action="todo_update.php" method="POST">
    <input type="hidden" name="id" value="<?= $record['id'] ?>">
    <fieldset>
      <legend>DB連携型todoリスト（入力画面）</legend>
      <a href="todo_read.php">一覧画面</a>
      <a href="todo_logout.php">logout</a>

      <div>
        <input type="file" name="upfile" accept="image/*" capture="camera" value="<?= $record["upfile"] ?>">
      </div>
      <div>
        <select name='color'>
          <option value='white'>白</option>
          <option value='black'>黒</option>
          <option value='brown'>ブラウン</option>
          <option value='blue'>ネイビー・ブルー</option>
          <option value='red'>赤</option>
          <option value='other'>その他</option>
        </select>
      </div>

      <!-- <input type="radio" id="color1" name="color" value="<?= $record["color"] ?>" /><label for="color1">白</label>
        <input type="radio" id="color2" name="color" value="<?= $record["color"] ?>" /><label for="color2">黒</label>
        <input type="radio" id="color3" name="color" value="<?= $record["color"] ?>" /><label for="color3">ブラウン</label>
        <input type="radio" id="color4" name="color" value="<?= $record["color"] ?>" /><label for="color4">ブルー・ネイビー</label>
        <input type="radio" id="color5" name="color" value="<?= $record["color"] ?>" /><label for="color5">赤</label>
        <input type="radio" id="color6" name="color" value="<?= $record["color"] ?>" /><label for="color6">その他</label> -->


      <!-- 色:
        <input type="radio" name="color" value="<?= $record["color"] ?>" id="white"><label for="white">白</label>
        <input type="radio" name="color" value="<?= $record["color"] ?>" id="black"><label for="black">黒</label>
        <input type="radio" name="color" value="<?= $record["color"] ?>" id="brown"><label for="brown">ブラウン</label>
        <input type="radio" name="color" value="<?= $record["color"] ?>" id="blue"><label for="blue">ブルー・ネイビー</label>
        <input type="radio" name="color" value="<?= $record["color"] ?>" id="red"><label for="red">赤</label>
        <input type="radio" name="color" value="<?= $record["color"] ?>" id="otehrs"><label for="others">その他</label> -->
      <!-- <label><input type="radio" value="白" name="color" <?php if ($record->color == "白") {
                                                                print "checked";
                                                              } ?>>白</label>
        <label><input type="radio" value="黒" name="color" <?php if ($record->color == "黒") {
                                                            print "checked";
                                                          } ?>>黒</label>
        <label><input type="radio" value="ブラウン" name="color" <?php if ($record->color == "ブラウン") {
                                                                print "checked";
                                                              } ?>>ブラウン</label>
        <label><input type="radio" value="ブルー・ネイビー" name="color" <?php if ($record->color == "ブルー・ネイビー") {
                                                                    print "checked";
                                                                  } ?>>ブルー・ネイビー</label>
        <label><input type="radio" value="赤" name="color" <?php if ($record->color == "赤") {
                                                            print "checked";
                                                          } ?>>赤</label>
        <label><input type="radio" value="その他" name="color" <?php if ($record->color == "その他") {
                                                              print "checked";
                                                            } ?>>その他</label> -->
      </div>
      <div>
        季節:
        <input type="radio" name="season" value="<?= $record["season"] ?>">

      </div>
      <div>
        アイテム１:
        <input type="radio" name="item1" value="<?= $record["item1"] ?>">

      </div>
      <div>
        アイテム２:
        <input type="radio" name="item2" value="<?= $record["item2"] ?>">

      </div>
      <div>
        購入日:<input type="date" name="purchase" value="<?= $record["purchase"] ?>">
      </div>
      <div>
        購入店:<input type="text" name="shop" value="<?= $record["shop"] ?>">
      </div>
      <div>
        お気に入り度:
        <input type="radio" name="favorite" value="<?= $record["favorite"] ?>">


      </div>
      <!-- <div>
        リストに入れた日:<label><input type="date" name="created_at"></label>
      </div> -->
      <div>
        memo:<input type="text" name="memo" value="<?= $record["memo"] ?>">
      </div>


      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>