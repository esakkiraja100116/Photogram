#   🧑🏾‍🚀  Xincks API

[![GitHub release](https://img.shields.io/static/v1?label=WEB_APP&message=Photogram&color=informational)](https://www.w3schools.com/html/)


## 📂 File structure

[![GitHub release](https://img.shields.io/static/v1?label=Normal-files&message=PHP&color=brightgreen)](https://www.w3schools.com/html/)

[config.php](https://github.com/esakkiraja100116/core-php/blob/master/libs/db/config.php) - configuration file <br>
 
[load.php](https://github.com/esakkiraja100116/core-php/blob/master/libs/load.php) - It will load all the necessary backend code  <br>
 
[check.php](https://github.com/esakkiraja100116/core-php/blob/master/libs/db/check.php)   - Checking for user cookie

[![GitHub release](https://img.shields.io/static/v1?label=Class-files&message=PHP&color=brightgreen)](https://www.w3schools.com/html/) 
 
[db.class.php](https://github.com/esakkiraja100116/core-php/blob/master/libs/db/db.class.php)  - Miscellaneous functions


[filter.class.php](https://github.com/esakkiraja100116/core-php/blob/master/libs/db/filter.class.php)  - Filter the input and prevent from unwanted hacks.

<br>

> Note: return 1(success) or -1(fails).

<br>

    * Filter::check_string($str)
    * Filter::check_number($num)
    * Filter::check_num_text($val)
    * Filter::check_dob($dob) `01/09/2023`
    * Filter::check_gst($number) 
    * Filter::check_status($val) `expected $val - 0,1,2,-1`
    * Filter::is_email($mail)
    * Filter::check($ip)
    * Filter::link($link)
    
<br>

> Note: return $data.

<br>

    * Filter::input(val) `it return the filtered data
    
[session.class.php](https://github.com/esakkiraja100116/core-php/blob/master/libs/db/session.clas.php)  - set,get,delete,destory the session

    * Session::set($key,$value)
    * Session::get($key)
    * Session::isset($key)
    * Session::destroy()
    * Session::delete($key)
    * Session::unset()

<br>

> Note: Enable .htaccess file in linux.

<br>

1. Path ```(etc/apache2/apache2.conf)```
  
    Default conf 
    ``` <Directory /var/www/>
            Options Indexes FollowSymLinks
            AllowOverride None
            Require all granted
        </Directory> 
     ``` 
    
    Change conf 
    ``` <Directory /var/www/>
            Options Indexes FollowSymLinks
            AllowOverride All
            Require all granted
        </Directory> 
     ``` 

    Don't forget to do this after change the conf

    ``` 
    sudo a2enmod rewrite  
    ```
    ``` 
    sudo service apache2 restart 
    ```


   
