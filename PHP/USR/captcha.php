<?php
    //开启会话
    session_start();
    //创建画布
    $image=imagecreatetruecolor(100,45);
    //设置背景颜色
    $backcolor=imagecolorallocate($image,255,255,255);
    //将白色铺满地图
    imagefill($image,0,0,$backcolor);
    //存储验证码
    $captcha_code="";
    //验证码为随机4个数字
    for ($i=0;$i<4;$i++) {
        $fontsize=10;
        $fontcolor=imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));  //随机颜色
        $font_content=rand(0,9);
        //连接字符串
        $captcha_code.=$font_content;
        $x=($i*100/4)+rand(5,10);
        $y=rand(5,10);
        imagestring($image,$fontsize,$x,$y,$font_content,$fontcolor);
    }
    //保存验证码
    $_SESSION["code"]=$captcha_code;
    //增加干扰点
    for($i=0;$i<200;$i++) {
        $point_color=imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
        imagesetpixel($image,rand(1,99),rand(1,29),$point_color);
    }
    //增加干扰线
    for($i=0;$i<3;$i++) {
        $line_color=imagecolorallocate($image,rand(80,220),rand(80,220),rand(80,220));
        imageline($image,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$line_color);
    }
    //向浏览器输出图片头信息
    header('content-type:image.png');
    //输出图片到浏览器
    imagepng($image);
    //销毁图片
    imagedestroy($image);
