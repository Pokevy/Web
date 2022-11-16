<?php

    require "../mysql.php";

    $username=$_GET["username"];
    $con=new Mysql();
    $sql="select * from information_schema.TABLES where TABLE_NAME = '$username';";
    if($con->sql($sql)){
        $sql=$sql = "CREATE TABLE MyGuests (
                        Id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                        username VARCHAR(255) NOT NULL,
                        data VARCHAR(255) NOT NULL,
                        )";
       $re_= $con->sql($sql);
       $con->close();
    }

?>
<!--HTML代码-->
<html lang="zh">
    <head>

        <title>回复留言</title>
        <link rel="stylesheet" type="text/css" href="../../CSS/input_update_lp.css">

    </head>

    <body >
        <div class="input">
            <form action="insert_lp.php" method="post"  onsubmit="return check_comment(data)">
                <label class="aaa">
                    <!--name传输参数名-->
                    <textarea class="text" name="data" placeholder="输入你的回复内容"></textarea>
                </label>
                <input class="button" type="submit"  value="发布">
            </form>
        </div>
    </body>

</html>

