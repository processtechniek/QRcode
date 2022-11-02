<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $notes = $productid = $itemid = "";
$name_err = $notes_err = $productid_err = $itemid_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  
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
 
    // Validate productid
    if(empty(trim($_POST["productid"]))){
        $productid_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM tb_item WHERE product_id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_productid);
            
            // Set parameters
            $param_productid = trim($_POST["productid"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $productid_err = "This productid is already taken.";
                } else{
                    $productid = trim($_POST["productid"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
  

      // Validate itemid
      $input_itemid = trim($_POST["itemid"]);
      if(empty($input_itemid)){
          $itemid_err = "Dit veld is verplicht.";     
      } else{
          $itemid = $input_itemid;
      }
    
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($item_err) && empty($productid_err) &&  empty($itemid_err)){

        
        require_once 'phpqrcode/qrlib.php';

        $path = 'assets/qrcodes/';
        $qrcode = $path.time().".png";
        $qrimage = time().".png";

        QRcode :: png("http://localhost/Projects/ICTOpslag_Dashboard/src/mobile/index.php?productid=" . $productid, $qrcode, 'H',4 , 4);
        
        // Prepare an insert statement
        $sql = "INSERT INTO tb_item (name, notes, product_id, item_id, status_id, qrcode) VALUES (?, ?, ?, ?, 1, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_notes, $param_productid, $param_itemid, $param_qrimage);
            
            // Set parameters
            $param_name = $name;
            $param_notes = $notes;
            $param_productid = $productid;
            $param_itemid = $itemid;
            $param_qrimage = $qrimage;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                header("location: items.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
 <?php include 'assets/includes/header.php';?>

<div class="container">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="mt-5 mb-3">
          <h2>Item Aanmaken</h2>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="create-form-container">
              <div class="form-group-create">
                  <label>Naam</label>
                  <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                  <span class="invalid-feedback"><?php echo $name_err; ?></span>
              </div>
              <div class="create-button-container">
                <div class="create-form-buttons">
                    <input type="submit" class="create-add-button" value="Submit">
                    <input type="reset" class="create-cancel-button" value="Reset">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'assets/includes/footer.php';?>