<?php

class File
{
    public static function upload()
    {
        $id = rand(0, 999999);
        $types = ['png', 'jpeg', 'PNG', 'JPEG'];
        if (isset($_FILES['files'])) {
            // Count # of uploaded files in array
            $total = count($_FILES['files']['name']);
            // echo "Total files " .$total."<br>";

            if ($total == 1) {
                // echo "counting....";

                //Setup our new file path
                $tmpFilePath = $_FILES['files']['tmp_name'][0];
                $target_file = basename($_FILES["files"]["name"][0]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                if (in_array($imageFileType, $types)) {
                    $t = time();
                    $name = $id . "_" . $t . "." . $imageFileType;
                    $newFilePath = "../images/" . $name;
                    //Upload the file into the temp dir
                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        return $name;
                        //Handle other code here
                    } else {
                        // echo "failed in single image";
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                //echo $_FILES['files']['name'][1];

                $image = [];
                // Loop through each file
                for ($i = 0; $i < $total; $i++) {

                    //Get the temp file path
                    $tmpFilePath = $_FILES['files']['tmp_name'][$i];
                    $target_file = basename($_FILES["files"]["name"][0]);
                    // echo "Target file : $target_file <br>";
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if (in_array($imageFileType, $types)) {
                        $t = time();
                        $name = $id . "_" . $i . "_" . $t . "." . $imageFileType;
                        //Make sure we have a file path
                        if ($tmpFilePath != "") {
                            //Setup our new file path
                            $newFilePath = "../images/" . $name;
                            //Upload the file into the temp dir
                            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                                $image["$i"] = $name;
                                // echo "<br> success <br> ";
                            } else {

                                return false;
                            }
                        } else {

                            return false;
                        }
                    } else {

                        return false;
                    }
                }
                // return $image;
                return implode(",", $image);
            }
        }
    }
}
