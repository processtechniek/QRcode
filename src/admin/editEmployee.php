<?php
// Include config file
require_once "config.php";

session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Define variables and initialize with empty values
$username = $email = $roleid  = "";
$username_err = $email_err = $roleid_err = "";
 
    // Processing form data when form is submitted
    if(isset($_POST["id"]) && !empty($_POST["id"])){
      // Get hidden input value
      $id = $_POST["id"];
        
    // Validate username
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Dit veld is verplicht.";     
    } else{
        $username = $input_username;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Dit veld is verplicht.";     
    } else{
        $email = $input_email;
    }

    // Validate roleid
    $input_roleid = trim($_POST["roleid"]);
    if(empty($input_roleid)){
        $roleid_err = "Dit veld is verplicht.";     
    } else{
        $roleid = $input_roleid;
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($email_err) && empty($roleid_err)){
        // Prepare an update statement
        $sql = "UPDATE tb_user SET username=?, email=?, role_id=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssii", $param_username, $param_email, $param_roleid, $param_id);
            
            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_roleid = $roleid;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: employees.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM tb_user WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $username = $row["username"];
                    $email = $row["email"];
                    $roleid = $row["role_id"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
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
    <title>Docent Aanpassen</title>
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
                    <h2 class="mt-5">Docent Aanpassen</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Gebruikersnaam</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" readonly>
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" readonly>
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Rol</label>
                              <select name="roleid" class="form-control <?php echo (!empty($roleid_err)) ? 'is-invalid' : ''; ?>">
                                <option value="<?php echo $roleid; ?>"><?php echo($roleid == 2) ? 'Beheerder' : 'Docent'; ?></option>
                                <option value="<?php echo($roleid == 2) ? '1' : '2' ?>"><?php echo($roleid == 1) ? 'Beheerder' : 'Docent'; ?></option>
                              </select>
                            <span class="invalid-feedback"><?php echo $roleid_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Update">
                        <a href="employees.php" class="btn btn-secondary ml-2">Annuleren</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>