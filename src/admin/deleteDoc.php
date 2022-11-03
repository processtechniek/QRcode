<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


// Process delete operation after confirmation
if(isset($_POST["iddoc"]) && !empty($_POST["iddoc"])){
    // Include config file
    require_once "config.php";
    
    // Prepare a delete statement
    $sql = "SELECT documentname
    FROM tb_document
    WHERE iddoc = ?
    AND uuid = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "is", $param_iddoc, $param_uuid);
        
        // Set parameters
        $param_iddoc = trim($_POST["iddoc"]);
        $param_uuid = trim($_POST["uuid"]);

        $uuid = trim($_POST["uuid"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){

            $result = mysqli_stmt_get_result($stmt);

            while($row = mysqli_fetch_array($result)){
                    $file =  $row['documentname'];

                    $path = "parts/$uuid/$file";

                    // Use unlink() function to delete a file
                    if (!unlink($path)) {
                        echo ("$path cannot be deleted due to an error");
                    }
                    else {
                        $sql = "DELETE FROM tb_document WHERE iddoc = ?";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "i", $param_iddoc);
                                
                                // Set parameters
                                $param_iddoc = trim($_POST["iddoc"]);
                                
                                // Attempt to execute the prepared statement
                                if(mysqli_stmt_execute($stmt)){
                                    // Records deleted successfully. Redirect to landing page
                                    header("location: parts.php");
                                    exit();
                                } else{
                                    echo "Oops! Something went wrong. Please try again later.";
                                }
                            }
                    }
            }

            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["iddoc"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Verwijder Document</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="iddoc" value="<?php echo trim($_GET["iddoc"]); ?>"/>
                            <input type="hidden" name="uuid" value="<?php echo ($_GET["uuid"]); ?>"/>
                            <p>Weet je zeker dat je deze document wilt verwijderen?</p>
                            <p>
                                <input type="submit" value="Ja" class="btn btn-danger">
                                <a href="employees.php" class="btn btn-secondary">Nee</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>