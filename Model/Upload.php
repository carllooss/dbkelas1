<?php

class Upload
{
    public static function image()
    {
        $target_dir = __DIR__.'/../images/';
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $filename = $_FILES["gambar"]["name"];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $hashName = md5(date('Y-m-d H:i:s') . $filename) . "." . $imageFileType;
        $target_file = $target_dir . $hashName;
        //check if image file is an actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["gambar"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        //check if file already exists
        if(file_exists($target_file)) {
            echo "Sorry, your file is already exists.";
            $uploadOk = 0;
        } 
        
        //check file size
        if($_FILES["gambar"]["size"] > 500000) {
            echo " Sorry, your file is too large.";
            $uploadOk = 0;
        }

        //Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, PNG, JPEG, GIf allowed.";
            $uploadOk = 0;
        }

        //check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return false;
            //if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                return $hashName;
            } else {
                return false;
            }
        }
    }
}