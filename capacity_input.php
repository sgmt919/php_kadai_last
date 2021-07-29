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
    <title>CLOSETのCAPACITY（入力画面）</title>
</head>

<body>
    <img src="https://ak1.ostkcdn.com/images/products/30749396/Closet-Co-132-L-Custom-Closet-System-bcf184d2-cf29-40c1-8b48-70f7c04f6580.jpg">

    <form method="post" action="capacity_act.php">
        <fieldset>
            <legend>CLOSETのCAPACITY（入力画面）</legend>
            <a href="top_page.php">TOP PAGEにもどる</a>
            <a href="todo_logout.php">logout</a>
            <div>
                春夏　トップス<input type="number" name="tops_ss_capa">アイテム<br>
                春夏　ボトムス<input type="number" name="bottoms_ss_capa">アイテム<br>
                春夏　ワンピース<input type="number" name="dress_ss_capa">アイテム<br>
                春夏　コート<input type="number" name="coat_ss_capa">アイテム<br>
                秋冬　トップス<input type="number" name="tops_aw_capa">アイテム<br>
                秋冬　ボトムス<input type="number" name="bottoms_aw_capa">アイテム<br>
                秋冬　ワンピース<input type="number" name="dress_aw_capa">アイテム<br>
                秋冬　コート<input type="number" name="coat_aw_capa">アイテム<br>
            </div>


            <div>
                <button>submit</button>
            </div>
        </fieldset>
    </form>

</body>

</html>