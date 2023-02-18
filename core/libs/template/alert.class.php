<?php

class Alert
{
    public static function delete()
    {
        echo '<div class="alert alert-danger" role="alert">
        Deleted successfully
      </div>';
    }

    public static function update()
    {
        echo ' <div class="alert alert-success" role="alert">
        Updated successfully
      </div>';
    }

    public static function insert()
    {
        echo ' <div class="alert alert-success" role="alert">
        Insert successfully
      </div>';
    }

    public static function msg($msg)
    {
        echo " <div class='alert alert-danger' role='alert'>
          $msg
      </div>";
    }

   
}