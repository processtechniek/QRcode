<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $notes = $productid = $itemid = "";
$name_err = $notes_err = $productid_err = $itemid_err = "";
 
    // Processing form data when form is submitted
    if(isset($_POST["id"]) && !empty($_POST["id"])){
      // Get hidden input value
      $id = $_POST["id"];
        
      // Validate name
      $input_name = trim($_POST["name"]);
      if(empty($input_name)){
          $name_err = "Dit veld is verplicht.";     
      } else{
          $name = $input_name;
      }


      // Validate notes
      $input_notes = trim($_POST["notes"]);
      if(empty($input_notes)){
          $notes_err = "";     
      } else{
          $notes = $input_notes;
      }


      // Validate itemid
      $input_itemid = trim($_POST["itemid"]);
      if(empty($input_itemid)){
          $itemid_err = "Dit veld is verplicht.";     
      } else{
          $itemid = $input_itemid;
      }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($notes_err) && empty($itemid_err)){
        // Prepare an update statement
        $sql = "UPDATE tb_item SET name=?, notes=?, item_id=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_notes, $param_itemid, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_notes = $notes;
            $param_itemid= $itemid;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: items.php");
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
        $sql = "SELECT * FROM tb_item WHERE id = ?";
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
                    $name = $row["name"];
                    $notes = $row["notes"];
                    $itemid = $row["item_id"];
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
    <title>Item Aanpassen</title>
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
                    <h2 class="mt-5">Item Aanpassen</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Naam</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Notities</label>
                            <input type="text" name="notes" class="form-control" value="<?php echo $notes; ?>">
                        </div>
                        <div class="form-group">
                            <label>Item ID</label>
                            <input type="text" name="itemid" class="form-control <?php echo (!empty($itemid_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $itemid; ?>">
                            <span class="invalid-feedback"><?php echo $itemid_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Update">
                        <a href="items.php" class="btn btn-secondary ml-2">Annuleren</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>