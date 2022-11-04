<?php

require_once "config.php";

session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


// Define variables and initialize with empty values
$test = "";
$test_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){ 

// Validate password
if(empty(trim($_POST["test"]))){
    $test_err = "Vul een naam in.";     
} else {
    
    // Prepare a select statement
    $sql = "SELECT id FROM tb_part WHERE name = ?";
        
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_test);
        
        // Set parameters
        $param_test = trim($_POST["test"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);
            
            if(mysqli_stmt_num_rows($stmt) == 1){
                $test_err = "Deze part bestaat al.";
            } else{
                $test = trim($_POST["test"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
    
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

                    require_once 'phpqrcode/qrlib.php';

                    $path = "parts/$uuid/";
                    // $qrcode = $path.time().".png";
                    // $qrimage = time().".png";
                    $qrcode = $path."QR-".$uuid.".png";
                    $qrimage = "QR-".$uuid.".png";

                    $url = $_SERVER['REQUEST_URI'];

                    QRcode :: png("http://localhost/Projects/Procestechniek/src/tablet/info.php?uuid=" . $uuid, $qrcode, 'H',3 , 3);

                    // Prepare an insert statement
                    $sql = "UPDATE tb_part SET qrcode=? WHERE uuid=?";
                        
                    if($stmt = mysqli_prepare($link, $sql)){
                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt, "ss", $param_qrimage, $param_uuid);
                        
                        // Set parameters
                        $param_qrimage = $qrimage;
                        $param_uuid = $uuid;
                        
                        // Attempt to execute the prepared statement
                        if(mysqli_stmt_execute($stmt)){

                            header("location: parts.php");
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    }
                
                // Redirect to login page
                // header("location: succes.php");
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Procestechniek</title>
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
                    <h2 class="mt-5">Part Toevoegen</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Naam</label>
                            <input type="text" name="test" class="form-control <?php echo (!empty($test_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $test; ?>">
                            <span class="invalid-feedback"><?php echo $test_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-success" value="Toevoegen">
                        <input type="reset" class="btn btn-secondary" value="Reset">
                        <a href="parts.php" class="btn btn-primary">Annuleren</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    
</body>
</html>