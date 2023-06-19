<?php

// echo "<pre>";

// print_r($_SERVER);

// // echo get_config("username");
// echo "</pre>";

require "core/libs/load.php";

$insert_data = [
    "email" => "admin@photogram.com",
    "password" => password_hash("admin@123", PASSWORD_DEFAULT),
];

$database = new Unique("users", "-");
$database->insert_data($insert_data);

// echo $result;



// $arr = [
//     "email" => "nattu@gmail.com",
//     "password" => password_hash("user@123",PASSWORD_DEFAULT)
// ];

// $user = new Unique("users","");
// $result = $user->insert_data($arr);
