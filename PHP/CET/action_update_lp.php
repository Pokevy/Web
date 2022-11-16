<?php

    require "../mysql.php";
    //post获取从input_update_lp表单提交的更新评论
    //cookie获取在input_update_lp设置的用户Id
    update($_POST["re_com"],date("Y-m-d H:i:s"),$_COOKIE["Id"]);
    echo '<script>window.location.href="show_lp.php"</script>';

    function update($data,$time,$Id){
        $con=new Mysql();
        $update="update comment set data='$data',time='$time' where Id='$Id';";
        $con->sql($update);
        $con->close();
    }
