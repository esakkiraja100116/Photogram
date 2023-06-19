<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
    // console::log("working");
    $username = Filter::input($_POST['username']);
    $password = Filter::input($_POST['password']);

    $users = new Unique("users", "");
    $db_password = $users->getItem("password", "email", $username);

    if (password_verify($password, strval($db_password))) {
        // admin
        session::set("user_login", "success");
        session::set("login_timestamp", time());

        setcookie("admin", "21232f297a57a5a743894a0e4a801fc3", time() + (86400 * 30 * 10), "/");
        echo "<script> window.location.reload(); </script>";
    } else {
        session::set("user_login", "failed");
    }
}