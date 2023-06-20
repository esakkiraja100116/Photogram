<?php

if (php_sapi_name() == "cli") {
    $path = "/home/Esakkiraja/htdocs/photogram/core/";
}else{
    $path = $_SERVER['DOCUMENT_ROOT']."/core/";
}

define("GLOBAL_PATH", $path);

class Database
{
    public static $conn = null;
    /**
     * get the connection 
     *
     * @return connection
     */
    public static function getConnection()
    { 
        if (Database::$conn == null) {

            $servername = getConfig('db_server');
            $username = getConfig('db_username');
            $password = getConfig('db_password');
            $dbname = getConfig('db_name');

            // Create connection
            $connection = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error); //TODO: Replace this with exception handling
            } else {
                // printf("New connection establishing...");
                // echo $servername;
                Database::$conn = $connection; //replacing null with actual connection
                return Database::$conn;
            }
        } else {
            // printf("Returning existing establishing...");
            return Database::$conn;
        }
    }
}