<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT tb_item.id, tb_item.name, tb_item.notes, tb_item.product_id, tb_item.item_id, tb_item.qrcode, tb_status.status FROM tb_item INNER JOIN tb_status ON tb_item.status_id=tb_status.id WHERE tb_item.id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $id = $row["id"];
                $name = $row["name"];
                $notes= $row["notes"];
                $productid = $row["product_id"];
                $itemid = $row["item_id"];
                $status = $row["status"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
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
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<?php include 'assets/includes/header.php';?>

<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="student-content">
                <h1 class="mt-5 mb-3">Item Overzicht</h1>
                <div class="stundent-info">
                    <div class="student-top-container">
                        <div class="form-group">
                            <label>ID</label>
                            <p><b><?php echo $row["id"]; ?></b></p>
                        </div>
                        <div class="form-group">
                            <label>Naam</label>
                            <p><b><?php echo $row["name"]; ?></b></p>
                        </div>
                        <div class="form-group">
                            <label>Notities</label>
                            <p><b><?php echo $row["notes"]; ?></b></p>
                        </div>
                    </div>
                    <div class="student-middle-container">
                        <div class="form-group">
                            <label>Product ID</label>
                            <p><b><?php echo $row["product_id"]; ?></b></p>
                        </div>
                        <div class="form-group">
                            <label>Item ID</label>
                            <p><b><?php echo $row["item_id"]; ?></b></p>
                        </div>  
                        <div class="form-group">
                            <label>Status</label>
                            <p><b><?php echo $row["status"]; ?></b></p>
                        </div>
                    </div>  
                    <p><a href="items.php" class="student-terug">Terug</a></p>
                </div>
            </div>
        </div>        
    </div>
</div>

<?php include 'assets/includes/footer.php';?>