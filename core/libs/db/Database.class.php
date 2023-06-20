<?php

class Unique
{
    public $conn;
    public $table_name;
    public $id;

    public function __construct($name, $id)
    {
        $this->conn = Database::getConnection();
        $this->table_name = $name;
        $this->id = $id;
    }

    public function __call($name, $arguments)
    {
        $property = preg_replace("/[^0-9a-zA-Z]/", "", substr($name, 3));
        $property = strtolower(preg_replace('/\B([A-Z])/', '_$1', $property));
        if (substr($name, 0, 3) == "get") {
            return $this->_get_data($property);
        } elseif (substr($name, 0, 3) == "set") {
            return $this->_set_data($property, $arguments[0]);
        } else {
            throw new Exception("User::__call() -> $name, function unavailable.");
        }
    }

    //this function helps to retrieve data from the database
    private function _get_data($var)
    {
        if (!$this->conn) {
            $this->conn = Database::getConnection();
        }
        $query = "SELECT `$var` FROM `$this->table_name` WHERE `id` = $this->id"; // phone number removed
        // console::log($query);
        $result = $this->conn->query($query) or die($this->conn->error);
        //print_r(mysqli_fetch_all($result));
        if (mysqli_num_rows($result)) {
            $files = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $files[] = $row;
            }
            // print_r($files);
            return $files[0]["$var"];
        } else {
            return "EMPTY";
        }
    }

    //This function helps to  set the data in the database
    private function _set_data($var, $data)
    {
        if (!$this->conn) {
            $this->conn = Database::getConnection();
        }
        $sql = "UPDATE `$this->table_name` SET `$var`='$data',`updated_at` = now() WHERE `id`=$this->id";
        // echo $sql;
        if ($this->conn->query($sql)) {
            return 1;
        } else {
            return false;
        }
    }


    // insert_data dynamically
    public function insert_data($assoc_array)
    {
        $keys = array();
        $values = array();
        foreach ($assoc_array as $key => $value) {
            $keys[] = $key;
            $values[] = $value;
        }

        $query = "INSERT INTO `$this->table_name`(`" . implode("`,`", $keys) . "` ,`created_at` ) VALUES ('" . implode("','", $values) . "' , now() )";
        // echo $query;
        console::log($query);
        return unique::process_query($this->conn, $query);
    }


    /**
     * Dynamic update
     * 1st key should be id for update that particular row
     *
     * @param  array_value $data
     * @return true_or_false
     */
    public function ipdate_data($data)
    {
        $cols = array();
        foreach ($data as $key => $val) {
            $cols[] = "`$key` = '$val'";
        }

        $sql = "UPDATE `$this->table_name` SET " . implode(', ', $cols) . ", `updated_at` = now() WHERE  $cols[0]";
        console::log($sql);
        return unique::process_query($this->conn, $sql);
    }

    /**
     * Get total rows from table based on one_col 
     *
     * @param  column_name $col
     * @param  row_value   $value
     * @return data (if not it will be NULL)
     */

    public function getTotalBased($col,$value)
    {        
        $sql = "SELECT * FROM `$this->table_name` WHERE `$col` = '$value' AND `deleted_at` IS NULL;";
        // echo $sql;
        return unique::get_data(Database::getConnection(), $sql);
    }

     /**
      * Get total rows from table based on two column
      *
      * @param  coloumn_name_1 $col_1
      * @param  row_value_1    $value_1
      * @param  coloumn_name_2 $col_2
      * @param  row_value_2    $value_2
      * @return data (if not it will be NULL)
      */

    public function getTotalBased2($col_1,$value_1,$col_2,$value_2)
    {        
        $sql = "SELECT * FROM `$this->table_name` WHERE `$col_1` = '$value_1' AND `$col_2` = '$value_2' AND `deleted_at` IS NULL;";
        // echo $sql;
        return unique::get_data(Database::getConnection(), $sql);
    }

    /**
     * Get total rows from table 
     *
     * @return data (if not it will be NULL)
     */

    public function getTotal()
    {        
        $sql = "SELECT * FROM `$this->table_name`  WHERE `deleted_at` IS NULL ;";
        return unique::get_data(Database::getConnection(), $sql);
    }

    /**
     * Get ID from table based on col_name and value
     *
     * @param  col_name $col_name
     * @param  value    $value
     * @return data (if not it will be NULL)
     */

    public function getId($col_name,$value)
    {        
        $sql = "SELECT `id` FROM `$this->table_name` WHERE `$col_name` = '$value' AND `deleted_at` IS NULL;";
        $data = unique::get_data(Database::getConnection(), $sql);
        return $data[0]['id']??null;
    }


    /**
     * Get particular value from table based on col_name and value
     *
     * @param  selected_col $select
     * @param  col_name     $col_name
     * @param  value        $value
     * @return selected_value (if not it will be NULL)
     */

    public function getItem($select,$col_name,$value)
    {        
        $sql = "SELECT `$select` FROM `$this->table_name` WHERE `$col_name` = '$value' AND `deleted_at` IS NULL;";
        $data = unique::get_data(Database::getConnection(), $sql);
        return $data[0]["$select"]??null;
    }

    /**
     * Delete row using particular value
     *
     * @param  col_name $coL
     * @param  value    $val
     * @return True_or_False 
     */

    public function DeleteBased($col,$val)
    {
        $query = "UPDATE `$this->table_name` SET `deleted_at`= now() WHERE `$col`= '$val';";
        $result = unique::process_query($this->conn, $query);
        return $result;
    }

    
    public function getCount()
    {
        if (!$this->conn) {
            $this->conn = Database::getConnection();
        }
        $date = date("Y-m-d", time());
        $sql = "SELECT count(*) FROM `$this->table_name`  WHERE `deleted_at` IS NULL;";
        //print($sql);
        $result = $this->conn->query($sql);
        if ($result and $result->num_rows == 1) {
            //print("Res: ".$result->fetch_assoc()["$var"]);
            return $result->fetch_assoc()['count(*)'];
        } else {
            return null;
        }
    }

    // get all data from the table
    public static function get_data($conn, $sql)
    {
        $result = $conn->query($sql) or die($conn->error);
        //print_r(mysqli_fetch_all($result));
        if (mysqli_num_rows($result)) {
            $files = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $files[] = $row;
            }
            return $files;
        }
    }


    // process query 
    public static function process_query($conn, $sql)
    {
        try {
            if ($conn->query($sql)) {

                return true;
            }
        } catch (mysqli_sql_exception $e) {

            return false;
        }
    }

    

}
