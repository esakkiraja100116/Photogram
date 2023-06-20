<?php

if (php_sapi_name() == "cli") {
    $dir_name = "/home/Esakkiraja/htdocs/photogram/core/libs";
}else{
    $dir_name = $_SERVER['DOCUMENT_ROOT']."/core/libs";
}

includeAll($dir_name);

$webAPI = new WebAPI();
$webAPI->initiateSession();

function includeAll($dir_name)
{
    foreach (scandir($dir_name) as $key => $dir_n) {
        // echo "$key and $dir_n <br>";
        if ($key !=0 && $key !=1 && $dir_n != "load.php") {
            // echo "scanning.... ". $dir_n."<br>";
            foreach (glob("$dir_name/$dir_n/*.php") as $filename) {
                include_once $filename;
                // echo $filename."<br>";
            }        
        }   
    }
}

function getConfig($key, $default=null)
{
    $config_path = "/home/Esakkiraja/core-php.json";
    $myfile = fopen($config_path, "r") or die("Unable to open file!");
    $content =  fread($myfile, filesize($config_path));
    $array = json_decode($content, true);
    if (isset($array[$key])) {
        return $array[$key];
    } else {
        return $default;
    }
}
