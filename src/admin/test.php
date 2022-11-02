<?php

require_once "config.php";


// Define variables and initialize with empty values
$test = "";
$test_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){ 

// Validate password
if(empty(trim($_POST["test"]))){
    $test_err = "Please enter a password.";     
} else {
    $test = trim($_POST["test"]);
}



function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

$uuid = gen_uuid();


    // Check input errors before inserting in database
    if(empty($test_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO tb_part (uuid, name) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_uuid, $param_test);
            
            $param_uuid = $uuid;
            $param_test = $test;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                if (!file_exists("parts/$uuid")) {
                    mkdir("parts/$uuid", 0777, true);
                    } else {
                        return;
                    }
                
                // Redirect to login page
                header("location: succes.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Docent Toevoegen</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Test</label>
                            <input type="text" name="test" class="form-control <?php echo (!empty($test_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $test; ?>">
                            <span class="invalid-feedback"><?php echo $test_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-success" value="Toevoegen">
                        <input type="reset" class="btn btn-secondary" value="Reset">
                        <a href="employees.php" class="btn btn-primary">Annuleren</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    
</body>
</html>