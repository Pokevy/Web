<?php

    session_start();
    if(empty($_COOKIE["username"])&&empty($_COOKIE["password"])) {
        if (isset($_SESSION["username"]))
            echo '<script>window.location.href="/PHP/CET/show_lp.php"</script>';
        else
            header("location:/HTML/login.html");
    } else
        echo '<script>window.location.href="/PHP/CET/show_lp.php"</script>';
