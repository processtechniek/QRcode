<?php

session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Process delete operation after confirmation
if(isset($_POST["uuid"]) && !empty($_POST["uuid"])){
    // Include config file
    require_once "config.php";
    
    $uuid = trim($_POST["uuid"]);

    $path = "parts/$uuid";

    if (!is_dir($path)) {
        mkdir ("$path cannot be deleted due to an error");
    }
    else {
                // Prepare a delete statement
        $sql = "DELETE FROM tb_part WHERE uuid = ?";
            
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_uuid);
            
            // Set parameters
            $param_uuid = trim($_POST["uuid"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                $uuid = $_POST["uuid"];

                $path = "parts/$uuid";

                array_map('unlink', glob("$path/*.*"));

                rmdir($path);
                
                // Records deleted successfully. Redirect to landing page
                header("location: parts.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
            
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }
            

 
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["uuid"]))){
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
    <title>Procestechniek</title>
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
                    <h2 class="mt-5 mb-3">Verwijder Part</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="uuid" value="<?php echo trim($_GET["uuid"]); ?>"/>
                            <p>Weet je zeker dat je dit Part wilt verwijderen?</p>
                            <p>
                                <input type="submit" value="Ja" class="btn btn-danger">
                                <a href="parts.php" class="btn btn-secondary">Nee</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>