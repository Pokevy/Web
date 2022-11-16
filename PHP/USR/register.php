<?php
    //声明页面编码
    header("Content-type:text/html;charset=UTF-8");
    require "../mysql.php";
    //接受从register表单提交的用户信息
    $username=$_POST["username"];
    $password=$_POST["password_1"];
    //实例化对象并连接数据库
    $conn=new Mysql();
    $sql="select * from user where username='$username';";
    $sql_2="insert into user (username,password) values ('$username',$password)";
    //执行SQL语句并返回影响结果集
    $response=$conn->sql($sql);
    //判断用户是否存在
    if($response==1)
        echo '<script>alert("该用户已存在");window.location.href="../../HTML/register.html";</script>';
    else{
        $response_2=$conn->sql($sql_2);
        $conn->close();
        echo '<script>alert("注册用户成功");window.location.href="../../HTML/login.html";</script>';
    }
