<?php

class Filter
{

    // checking only for strings
    public static function check_string($str)
    {
        if (preg_match('/[^A-Za-z ]/', $str)) { // '/[^a-z\d]/i' should also work.
            return -1;
        } else {
            return 1;
        }
    }


    // checking only for numbers
    public static function check_number($num)
    {
        if (preg_match("/[^0-9 +]/", $num)) {
            return -1;
        } else {
            return 1;
        }
    }

    // check if the string contains number and texts

    public static function check_num_text($val)
    {
        if (preg_match('/[^a-zA-Z0-9 ]/', $val)) { // '/[^a-z\d]/i' should also work.
            return -1;
        } else {
            return 1;
        }
    }


    // checking for right date of birth

    public static function check_dob($dob)
    {
        //$date = "01/09/2012";

        if (preg_match("/^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/", $dob)) {
            return true;
        } else {
            return false;
        }
    }


    public static function check_gst($number)
    {
        if (preg_match("/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/", $number)) {
            return true;
        } else {
            return false;
        }
    }

    // filter the values 
    public static function input($val)
    {
        $check =  htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
        return strip_tags($check);
    }


    // checking for status approved,declined, processing,claimed
    public static function check_status($val)
    {
        $expected_val = [0, 1, 2, -1];
        if (in_array($val, $expected_val)) { // '/[^a-z\d]/i' should also work.
            return 1;
        } else {
            return -1;
        }
    }


    // return 1 if this is correct mail id

    public static function is_email($mail)
    {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
            echo "your email address is invalid";
        } else {
            return 1;
        }
    }

    public static function check_ip($ip)
    {
        if (preg_match(
            '/^(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:[.](?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3}$/',
            $ip
        )
        ) {
            return true;
        } else {
            return false;
        }
    }

    public static function tag($arr)
    {
        $sold_number = explode(",", $arr);
        $temp = [];
        foreach ($sold_number as $key => $value) {
            $split = explode('"', $sold_number[$key]);
            $i = $split[3];
            $temp[] = $i;
        }
        // print_r($temp);
        return implode(",", $temp);
    }
}
