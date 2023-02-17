<?php

function get_config($key, $default=null)
{
    $config_path = "/home/Esakkiraja/core-php.json";
    $myfile = fopen($config_path,"r") or die("Unable to open file!");
    $content =  fread($myfile,filesize($config_path));
    $array = json_decode($content, true);
    if (isset($array[$key])) {
        return $array[$key];
    } else {
        return $default;
    }
}
