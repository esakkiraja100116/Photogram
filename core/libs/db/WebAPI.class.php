<?php

Class WebAPI
{
    public function __construct()
    {
        if(php_sapi_name() == "cli"){

        }elseif(php_sapi_name() == "apache2handler"){
            session::start();
        }

        Database::getConnection();
    }

    public function initiateSession(){
        
    }
} 