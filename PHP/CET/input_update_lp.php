<?php

    session_start();
    //get获取从show_lp传入的用户Id，并将其设置为cookie，以至于在action_update_lp获取
    setcookie("Id",$_GET["Id"],time()+3600);

    //判断用户是否一致,不一致则跳转show_lp.php页面
    if($_SESSION["username"]!=$_GET["username"])
        echo "<script> alert(\"您无权操作他人的留言！\"); window.location.href=\"show_lp.php\"; </script>";
?>

<!--HTML代码-->
<html lang="zh">
    <head>

        <title>修改留言</title></head>
        <link rel="stylesheet" type="text/css" href="../../CSS/input_update_lp.css">

    <body >
        <div class="input_data">
            <form action="action_update_lp.php" method="post">
                <label>
                    <input class="re_com" type="text" name="re_com" autocomplete="off" placeholder="输入修改后的内容">
                </label>

                <label>
                    <button class="button_" type="submit" name="update">修改</button>
                </label>
            </form>
        </div>
    </body>

</html>


