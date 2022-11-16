<?php
    //设置页面编码
    header("Content-type:text/html;charset=UTF-8");
    //调用mysql.php文件
    require "../mysql.php";
    //开启会话
    session_start();
    //接受用户表单
    $username=$_POST["username"];
    $password=$_POST["password"];
    $verify=$_POST["verify"];
    $code=$_SESSION["code"];
    //获取是否选择了自动登录
    $autologin=isset($_POST["autologin"])?1:0;

    //判断用户密码是否为空
    if (checkNull($username,$password)) {
        //判断验证码是否正确
        if (checkVerify($verify,$code)) {
            //判断用户密码是否正确
            if (checkUser($username, $password)) {
                    $_SESSION["username"]=$username;
                    $_SESSION["password"]=$password;
                    setcookie("username",$username,time()+3600*24*3);
                    setcookie("password",md5($password),time()+3600*24*3);
                    header("location:../CET/show_lp.php");
            }
        }
    }
    //检查密码是否为空
    function checkNull($username,$password): bool{
        if (($username)===""||($password)==="") die('<script>alert("用户名或密码为空");</script>');
        else return true;
    }
    //检查验证码是否正确
    function checkVerify($verify,$code): bool{
        if($verify==$code) return true;
        else echo ('<script>alert("验证码为空或错误！");window.location.href="../../HTML/login.html"</script>');
        return false;
    }
    //检查用户密码是否正确
    //连接数据库-->查询数据-->返回数据
    function checkUser($username,$password): bool{
        $conn = new Mysql();
        $sql = "select * from user where username='$username' and password='$password';";
        $response=$conn->sql($sql);
        if($response) return true;
        else echo '<script>alert("用户不存在或密码错误！");window.location.href="../../HTML/login.html"</script>';
        $conn->close();
        return false;
    }