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
                  
                    $path = 'assets/qrcodes/';

                    // IMPORTANT
                    // https://stackoverflow.com/questions/35034428/how-to-merge-multiple-images-and-text-into-single-image

                    // Attempt select query execution
                    $sql = "SELECT tb_part.uuid, tb_part.id, tb_part.name, tb_part.qrcode
                    FROM tb_part";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="student_table">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>uuid</th>";
                                        echo "<th>Naam</th>";
                                        echo "<th>Acties</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['uuid'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="http://localhost/Projects/Procestechniek/src/tablet/info.php?uuid='. $row['uuid'] .'" class="table-icons" title="Bekijk Item" data-toggle="tooltip" target="_blank"><iconify-icon icon="bi:eye-fill"></iconify-icon></a>';
                                            echo '<a href="editPart.php?uuid='. $row['uuid'] .'" class="table-icons" title="Update Item" data-toggle="tooltip"><iconify-icon icon="clarity:pencil-solid"></iconify-icon></a>';
                                            echo '<a href="deletePart.php?uuid='. $row['uuid'] .'" class="table-icons" title="Verwijder Item" data-toggle="tooltip"><iconify-icon icon="bxs:trash-alt"></iconify-icon></a>';
                                            echo '<a href="'. 'parts/' . $row['uuid'] . '/' . $row['qrcode'] .'" class="table-icons" title="Download QRCode" data-toggle="tooltip" download><iconify-icon icon="vaadin:qrcode"></iconify-icon></a>';
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