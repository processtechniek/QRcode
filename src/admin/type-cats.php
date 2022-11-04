<?php

require_once "config.php";

?>

<?php include 'assets/includes/header.php';?>

<div class="container">
  <h1>Categoriën en Types</h1>
    <div class="students_wrapper">
        <div class="students_container">
        <div class="tab">
            <button class="tablinks" onclick="openCat(event, 'Categoriën')">Categoriën</button>
            <button class="tablinks" onclick="openCat(event, 'Types')">Types</button>
        </div>

            <div id="Categoriën" class="tabcontent">
            <a href="createCat.php" class="student-toevoegen"><i class="fa fa-plus"></i> Categorie Toevoegen</a>
            <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM tb_category ";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="student_table">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Naam</th>";
                                        echo "<th>Actie</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="editCat.php?id='. $row['id'] .'" class="table-icons" title="Update Docent" data-toggle="tooltip"><iconify-icon icon="clarity:pencil-solid"></iconify-icon></a>';
                                            echo '<a href="deleteCat.php?id='. $row['id'] .'" class="table-icons" title="Verwijder Docent" data-toggle="tooltip"><iconify-icon icon="bxs:trash-alt"></iconify-icon></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "Geen categoriën gevonden.";
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    ?>
            </div>

            <div id="Types" class="tabcontent">
            <a href="createType.php" class="student-toevoegen"><i class="fa fa-plus"></i> Type Toevoegen</a>
            <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM tb_type ";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="student_table">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Naam</th>";
                                        echo "<th>Actie</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="editType.php?id='. $row['id'] .'" class="table-icons" title="Update Docent" data-toggle="tooltip"><iconify-icon icon="clarity:pencil-solid"></iconify-icon></a>';
                                            echo '<a href="deleteType.php?id='. $row['id'] .'" class="table-icons" title="Verwijder Docent" data-toggle="tooltip"><iconify-icon icon="bxs:trash-alt"></iconify-icon></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "Geen types gevonden.";
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

<script>
    function openCat(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
 
<?php include 'assets/includes/footer.php';?>