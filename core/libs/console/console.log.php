<?php

class Console{
    public static function log($arr){

        $arr = json_encode($arr);
        echo "<script> console.log($arr); </script>";
    }
}