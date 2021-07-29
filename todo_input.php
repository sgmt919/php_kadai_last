<?php
session_start();
include("functions.php");
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（入力画面）</title>
</head>

<body>
  <form method="post" action="create_file.php" enctype="multipart/form-data">
    <fieldset>
      <legend>CLOSET（入力画面）</legend>
      <a href="todo_read.php">一覧画面</a>
      <a href="todo_logout.php">logout</a>
      <a href="top_page.php">TOP PAGEにもどる</a>
      <div>
        <input type="file" name="upfile" accept="image/*" capture="camera">
      </div>

      <!-- <div>色
        <select name='color'>
          <option value='white'>白</option>
          <option value='black'>黒</option>
          <option value='brown'>ブラウン</option>
          <option value='blue'>ネイビー・ブルー</option>
          <option value='red'>赤</option>
          <option value='other'>その他</option>
        </select>
      </div> -->
      <div>
        色:
        <input type="radio" name="color" value="白" id="white" checked><label for="white">白</label>
        <input type="radio" name="color" value="黒" id="black"><label for="black">黒</label>
        <input type="radio" name="color" value="ブラウン" id="brown"><label for="brown">ブラウン</label>
        <input type="radio" name="color" value="blue" id="blue"><label for="blue">ブルー・ネイビー</label>
        <input type="radio" name="color" value="red" id="red"><label for="red">赤</label>
        <input type="radio" name="color" value="その他" id="otehrs"><label for="others">その他</label>
      </div>
      <div>
        季節:
        <input type="radio" name="season" value="春夏" id="春夏" checked><label for="春夏">春夏</label>
        <input type="radio" name="season" value="秋冬" id="秋冬"><label for="秋冬">秋冬</label>
        <input type="radio" name="season" value="シーズンレス" id="シーズンレス"><label for="シーズンレス">シーズンレス</label>
      </div>
      <div>
        アイテム１:
        <input type="radio" name="item1" value="tops" id="tops" checked><label for="tops">トップス</label>
        <input type="radio" name="item1" value="bottoms" id="bottoms"><label for="bottoms">ボトムス</label>
        <input type="radio" name="item1" value="dress" id="dress"><label for="dress">ワンピース</label>
        <input type="radio" name="item1" value="others" id="others"><label for="others">その他</label>
      </div>
      <div>
        アイテム２:
        <input type="radio" name="item2" value="shirts" id="shirts" checked><label for="shirts">シャツ・ブラウス</label>
        <input type="radio" name="item2" value="knitt" id="knitt"><label for="knitt">ニット・カーディガン</label>
        <input type="radio" name="item2" value="jacket" id="jacket"><label for="jacket">ジャケット・ブルゾン</label>
        <input type="radio" name="item2" value="cutsaw" id="cutsaw"><label for="cutsaw">カットソー</label>
        <input type="radio" name="item2" value="coat" id="coat"><label for="coat">コート</label>
        <input type="radio" name="item2" value="pants" id="pants"><label for="pants">パンツ・ジーンズ</label>
        <input type="radio" name="item2" value="skirt" id="skirt"><label for="skirt">スカート</label>
        <input type="radio" name="item2" value="others" id="others"><label for="others">その他</label>
      </div>
      <div>
        購入日:<label><input type="date" name="purchase"></label>
      </div>
      <div>
        購入店:<label><input type="text" name="shop"></label>
      </div>
      <div>
        お気に入り度:
        <input type="radio" name="favorite" value="1" id="1" checked><label for="1">1</label>
        <input type="radio" name="favorite" value="2" id="2"><label for="2">2</label>
        <input type="radio" name="favorite" value="3" id="3"><label for="3">3</label>
        <input type="radio" name="favorite" value="4" id="4"><label for="4">4</label>
        <input type="radio" name="favorite" value="5" id="5"><label for="5">5</label>

      </div>
      <!-- <div>
        リストに入れた日:<label><input type="date" name="created_at"></label>
      </div> -->
      <div>
        memo:<label><input type="text" name="memo"></label>
      </div>


      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>