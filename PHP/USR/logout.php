<?php

    session_start();
    unset($_SESSION["username"]);
    setcookie("username","",time()-1);
    setcookie("password","",time()-1);
    header("location:../../HTML/login.html");