<?php

/**
 * PHP version 8.1.2
 *
 * @category Main_File
 * @package  Imbuild_Package
 * @author   Esakkiraja <esakkiraja100116@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://photogram1.selfmade.one/
 */

require "core/libs/load.php";

if (Session::get("user_login") == "success") {
    
    Session::set("current_dir", "dashboard");
    Load::common("header");
    Load::common("navbar");
    Load::body("dashboard", "main");
    Load::common("footer");
    Load::common("scripts");

} else {
    
    Session::set("current_dir", "sign_in");
    Load::common("header");
    Load::body("sign_in", "main");
    Load::common("scripts");
}   