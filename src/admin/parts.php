<?php include 'assets/includes/header.php';?>

<div class="container">
  <h1>Parts</h1>
  <div class="students_wrapper">
        <div class="students_container">
            <div class="students_row">
                <div class="col-md-12">
                    <div class="student-buttons">
                      <div class="student-search-container">
                      </div>
                      <a href="createPart.php" class="student-toevoegen"><i class="fa fa-plus"></i> Part Toevoegen</a>
                    </div>
                    <?php

                    // Attempt select query execution
                    $sql = "SELECT *
                    FROM tb_unit";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="student_table">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Units</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>";
                                            echo '<a href="viewParts.php?unitid='. $row['id'] .'" class="table-icons units" title="Update Item" data-toggle="tooltip">'. $row['name'] .'</a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>Geen parts gevonden.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</div>

<?php include 'assets/includes/footer.php';?>