<?php

    require "../mysql.php";
    session_start();
    //cookie获取当前登录用户名
    //get获取从show_lp传入用户名，和用户Id名
    if($_SESSION["username"]==$_GET["username"]) {
        $Id=$_GET["Id"];
        $con=new Mysql();
        $del="delete from comment where Id=$Id;";
        $con->sql($del);
        $con->close();
        echo "<script>window.location.href=\"show_lp.php\";</script>";
    }else{
        echo "<script> alert(\"您无权操作他人的留言！\"); window.location.href=\"show_lp.php\"; </script>";
    }
