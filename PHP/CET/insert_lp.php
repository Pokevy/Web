<?php

    require "../mysql.php";
    session_start();
    //cookie获取当前登录用户名
    //post获取从show_lp表单提交的用户评论
    insert($_SESSION["username"],$_POST["data"],date("Y-m-d H:i:s"));
    echo "<script>window.location='show_lp.php'</script>";

    function insert($username,$data,$time){
        $conn = new Mysql();
        $insert = "insert into comment (username,data,time) values ('$username','$data','$time')";
        $conn->sql($insert);
        $conn->close();
    }
