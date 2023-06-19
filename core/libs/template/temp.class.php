
<?php

class Load
{
    /**
     * load the comman file 
     *
     * @param  template_name $name
     * @return include_file
     */
    public static function common($name)
    {
        // echo "calling";
        $domain =   $_SERVER['HTTP_HOST'];
        $file_name = basename($_SERVER['PHP_SELF'], ".php");
        include GLOBAL_PATH . "_templates/common/_$name.php";
    }

    /**
     * load body    
     *
     * @param  directory_name $dir_name
     * @param  template_name  $name
     * @return include_file
     */
    public static function body($dir_name_, $name)
    {
        $domain =   $_SERVER['HTTP_HOST'];
        $file_name = basename($_SERVER['PHP_SELF'], ".php");
        include GLOBAL_PATH . "_templates/body/$dir_name_/$name.php";
    }

    /**
     * sidebar of the dashboard
     *
     * @param  sidebar_name $name
     * @return include_sidebar
     */
    public static function sidebar($name)
    {
        $domain =  $_SERVER['HTTP_HOST'];
        $file_name = basename($_SERVER['PHP_SELF'], ".php");
        include GLOBAL_PATH . "_templates/sidebar/$name.php";
    }

    
}
