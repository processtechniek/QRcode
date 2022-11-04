<?php
// Include config file
require_once "config.php";

session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if (isset($_GET['uuid'])) {
    $uuid =  $_GET['uuid'];
} else {
    echo "Geen uuid gevonden.";
}
 
// Define variables and initialize with empty values
$catid = $information = "";
$catid_err = $information_err  = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate email
    if(empty(trim($_POST["catid"]))){
        $catid_err = "Verplicht.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM tb_info WHERE uuid = ? AND category_id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_uuid, $param_catid);
            
            // Set parameters
            $param_uuid = $uuid;
            $param_catid = trim($_POST["catid"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $catid_err = "Deze categorie heeft al informatie.";
                } else{
                    $catid = trim($_POST["catid"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


      // Validate roleid
      $input_information = trim($_POST["information"]);
      if(empty($input_information)){
          $information_err = "Dit veld is verplicht.";     
      } else{
          $information = $input_information;
      }
    
    
    // Check input errors before inserting in database
    if(empty($catid_err) && empty($information_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO tb_info (uuid, category_id, information) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sis", $param_uuid, $param_catid, $param_information);
            
            $param_uuid = $uuid;
            $param_catid = $catid;
            $param_information = $information;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
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
                    <h2 class="mt-5">Informatie Toevoegen</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                            <label>Categorie</label>
                            <select name="catid" class="form-control <?php echo (!empty($catid_err)) ? 'is-invalid' : ''; ?>">
                            <?php

                            $sql = "SELECT * FROM tb_category";
                            if($result = mysqli_query($link, $sql)){
                                if(mysqli_num_rows($result) > 0){

                                  while($row = mysqli_fetch_array($result)){
                                    echo '<option value='. $row['id'] .'>'. $row['name'] .'</option>';
                                  }

                                  mysqli_free_result($result);
                                } else {
                                    echo "Geen types gevonden.";
                                }
                            } else {
                                echo "Oops! Something went wrong. Please try again later.";
                            }

                            ?>
                            </select>
                            <span class="invalid-feedback"><?php echo $catid_err; ?></span>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control <?php echo (!empty($information_err)) ? 'is-invalid' : ''; ?>" name="information" rows="18"><?php echo $information; ?></textarea>
                            <span class="invalid-feedback"><?php echo $information_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-success" value="Toevoegen">
                        <input type="reset" class="btn btn-secondary" value="Reset">
                        <a href="employees.php" class="btn btn-primary">Annuleren</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>

<?php include 'assets/includes/footer.php';?>