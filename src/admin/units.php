<?php include 'assets/includes/header.php';?>

<div class="container">
  <h1>Units</h1>
  <div class="students_wrapper">
        <div class="students_container">
            <div class="students_row">
                <div class="col-md-12">
                    <div class="student-buttons">
                      <div class="student-search-container">
                      </div>
                        <a href="createUnit.php" class="student-toevoegen"><i class="fa fa-plus"></i> Unit Toevoegen</a>
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
                                        echo "<th>Naam</th>";
                                        echo "<th>Acties</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="editUnit.php?id='. $row['id'] .'" class="table-icons" title="Update Item" data-toggle="tooltip"><iconify-icon icon="clarity:pencil-solid"></iconify-icon></a>';
                                            echo '<a href="deleteUnit.php?id='. $row['id'] .'" class="table-icons" title="Verwijder Item" data-toggle="tooltip"><iconify-icon icon="bxs:trash-alt"></iconify-icon></a>';
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