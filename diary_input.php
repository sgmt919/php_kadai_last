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
    <form method="post" action="create_file2.php" enctype="multipart/form-data">
        <fieldset>
            <legend>event（入力画面）</legend>
            <a href="todo_read.php">全てのitemを見る</a>
            <a href="top_page.php">TOP PAGEにもどる</a>
            <a href="todo_logout.php">logout</a>

            <div>
                <input type="file" name="upfile2" accept="image/*" capture="camera">
            </div>
            <div>
                日付:
                <input type="date" name="event_date" id="event_date">

            </div>
            <div>
                scene:
                <input type="radio" name="event" value="結婚式" id="結婚式"><label for="結婚式">結婚式</label>
                <input type="radio" name="event" value="食事会" id="食事会"><label for="食事会">食事会</label>
                <input type="radio" name="event" value="入学・卒業式" id="入学・卒業式"><label for="入学・卒業式">入学・卒業式</label>
                <input type="radio" name="event" value="参観日" id="参観日"><label for="参観日">参観日</label>
                <input type="radio" name="event" value="褒められた！" id="褒められた！"><label for="褒められた！">褒められた！</label>
            </div>

            <div>
                memo2:
                <input type="text" name="memo2" id="memo2">

            </div>





            <div>
                <button>submit</button>
            </div>
        </fieldset>
    </form>

</body>

</html>