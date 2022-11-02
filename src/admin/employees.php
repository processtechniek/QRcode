<?php

require_once "config.php";

?>

<?php include 'assets/includes/header.php';?>

<div class="container">
  <h1>Docenten</h1>
  <div class="students_wrapper">
        <div class="students_container">
            <div class="students_row">
                <div class="col-md-12">
                    <div class="student-buttons">
                      <div class="student-search-container">
                      </div>
                        <a href="createEmployee.php" class="student-toevoegen"><i class="fa fa-plus"></i> Docent Toevoegen</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT tb_user.id, tb_user.username, tb_user.email, tb_user.role_id, tb_role.name
                    FROM tb_user
                    INNER JOIN tb_role
                    ON tb_user.role_id=tb_role.id";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="student_table">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Gebruikersnaam</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Rol</th>";
                                        echo "<th>Actie</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="viewEmployee.php?id='. $row['id'] .'" class="table-icons" title="Bekijk Docent" data-toggle="tooltip"><iconify-icon icon="bi:eye-fill"></iconify-icon></a>';
                                            echo '<a href="editEmployee.php?id='. $row['id'] .'" class="table-icons" title="Update Docent" data-toggle="tooltip"><iconify-icon icon="clarity:pencil-solid"></iconify-icon></a>';
                                            echo '<a href="deleteEmployee.php?id='. $row['id'] .'" class="table-icons" title="Verwijder Docent" data-toggle="tooltip"><iconify-icon icon="bxs:trash-alt"></iconify-icon></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "Geen docenten gevonden.";
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