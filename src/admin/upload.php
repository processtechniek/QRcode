<?php

require_once "config.php";

  
$filename = $_FILES["file"]["name"];
$uuid = $_POST["uuid"];
$typeid = $_POST["typeid"];

// File upload path
$targetDir = "parts/$uuid/";
$filenamebase = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $filenamebase;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


$sql = "INSERT INTO tb_document (uuid, documentname, type_id) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_uuid, $param_filename, $param_typeid);
            
            $param_uuid= $uuid;
            $param_filename = $filename;
            $param_typeid = $typeid;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

              move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
                // Redirect to login page
                header("location: parts.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    
        // Close connection
        mysqli_close($link);



?>