<?php

    session_start();
    if(empty($_COOKIE["username"])&&empty($_COOKIE["password"])) {
        if (isset($_SESSION["username"]))
            echo '欢迎登录！'.$_SESSION["username"];
        else
            header("location:../../HTML/login.html");
    } else
        echo '欢迎登录！'.$_COOKIE["username"];
        echo '  <a class="a" href="../USR/logout.php">退出登录</a>';
?>

<!--HTML文档-->
<!DOCTYPE html>
<html lang="en">
    <header>
        <meta charset="UTF-8">
        <title>用户留言</title>
        <script src="../../JS/comment.js"></script>
        <link rel="stylesheet" type="text/css" href="../../CSS/show_lp.css">

    </header>

    <body>

    <div class="input">
        <form action="insert_lp.php" method="post"  onsubmit="return check_comment(data)">
        <label>
            <!--name传输参数名-->
            <textarea class="text" name="data" placeholder="输入你的留言"></textarea>
        </label class="aaa">
            <input class="button" type="submit"  value="发布">
        </form>
    </div>

    <?php
        $con=new mysqli("localhost","root","root","_lp","3306");
        $sel="select * from comment order by id ASC ;";
        $re=$con->query($sel);
        while ($row=mysqli_fetch_array($re)) {
            echo "<ul>";
            echo "<li>楼层：{$row["Id"]}</li>";
            echo "<li>昵称：{$row["username"]}</li>";
            echo "<li>内容：{$row["data"]}</li>";
            echo "<li>时间：{$row["time"]}</li>";
            echo "<li>操作：
                    <a class='a' href='del_lp.php?username={$row["username"]}&Id={$row["Id"]}'>删除</a>
                    <a class='a' href='input_update_lp.php?username={$row["username"]}&Id={$row["Id"]}'>修改</a>
                    <a class='a' href='input_reply_lp.php?username={$row["username"]}&Id={$row["Id"]}'>回复</a>
                  </li>";
            echo "</ul>";
        }
        $con->close();

    ?>

    </body>

</html>