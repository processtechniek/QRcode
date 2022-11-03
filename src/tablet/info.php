<?php
// Require db
require_once('config.php');

// Get uuid from URL
if(isset($_GET["uuid"]) && !empty(trim($_GET["uuid"]))){
    $uuid = $_GET["uuid"];
    // echo $uuid;
    } else {
        // Enable to redirect to error.php when no uuid given
        // header('Location: error.php');
        echo "Geen uuid opgegeven.";
        exit();
    }

?>

<?php
// Get name from uuid from database
    $sql = "SELECT name FROM tb_part WHERE uuid=?";

    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_uuid);

        $param_uuid = $uuid;

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $name = $row["name"];
            } else {
                // Enable to redirect to error.php when uuid is not found
                // header('Location: error.php');
                echo "uuid niet gevonden";
                exit();
            }
        } else {
                // Enable to redirect to error.php when error
                // header('Location: error.php');
            echo "Oeps! Er is iets fout gegaan...";
        }
    }

?>


<!-- HEADER -->
<?php include 'includes/header.php';?>

<div class="navbar">
  <div class="navbar__logo">
    <img src="assets/logo.png">
  </div>
  <div class="navbar__name">
    <h1><?php echo $name ?></h1>
  </div>
  <div class="navbar__tabs">
    <div class="main_tabs">
        <h1 data-tab-value="#tab_alg" onClick="hide()";>Algemeen</h1>
        <h1 data-tab-value="#tab_eq" onClick="hide()";>Equipment</h1>
    </div>
  </div>
</div>

<?php
// Get tab data
    $sql = "SELECT tb_category.name, tb_info.information FROM tb_category
    JOIN tb_info ON tb_category.id=tb_info.id
    WHERE tb_info.uuid=?";

    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_uuid);

        $param_uuid = $uuid;

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) > 0){
                echo "<div class='second_navbar'>";
                echo "<div class='second__navbar__tabs' id='tab_alg' data-tab-info>";
                echo "<div class='algemeen_tabs'>";
                while($row = mysqli_fetch_array($result)){
                    // echo "<button class=\"tablinks\" onclick=\"openInfo(event, '" . $row["name"] . "')\">" . $row['name'] . "</button>";
                    echo "<div class=\"test_div\">";
                    echo "<div><span class=\"test\" onClick=\"show(" . "'" . $row["name"] . "'" . ");\">" . $row["name"] . " " . "</span></div>";
                    echo "</div>";
                    $aTabID[] = $row['name'];
                    $aInformation[] = $row['information'];
                }
                
                echo "</div>";
                echo "</div>";
                echo "</div>";
                mysqli_free_result($result);

                foreach($aTabID as $key => $value) {
                    echo createInfo($value, $aInformation[$key]);
                }

            } else {
                // Enable to redirect to error.php when uuid is not found
                // header('Location: error.php');
                // echo "Geen gegevens gevonden...";
                // exit();
            }
        } else {
                // Enable to redirect to error.php when error
                // header('Location: error.php');
            echo "Oeps! Er is iets fout gegaan...";
        }
    } else {
        echo "Error";
    }

    function createInfo($id, $info) {
        $info = <<<INFO
            <div class="box">
                <div id="$id" class="content hideMe pre">
                    <p>$info</p>
                </div>
            </div>
            
    INFO;
        return $info;
    }

?>

<?php
// Get tab data
    $sql = "SELECT * FROM tb_type";


    if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0){
                echo "<div class='second_navbar'>";
                echo "<div class='second__navbar__tabs' id='tab_eq' data-tab-info>";
                echo "<div class='equipment_tabs'>";
                while($row = mysqli_fetch_array($result)){
                    // echo "<button class=\"tablinks\" onclick=\"openInfo(event, '" . $row["name"] . "')\">" . $row['name'] . "</button>";
                    echo "<div class=\"test_div\">";
                    echo "<div><span class=\"test\" onClick=\"show(" . "'" . $row["id"] . "'" . ");\">" . $row["name"] . " " . "</span></div>";
                    echo "</div>";
                    $aTabID[] = $row['id'];
                    $aInformation[] = $row['id'];
                    $tempId = $row['id'];
                }
                
                echo "</div>";
                echo "</div>";
                echo "</div>";
                mysqli_free_result($result);

                foreach($aTabID as $key => $value) {
                    echo createInfo2($value, $aInformation[$key], $uuid, $link);
                }

            } else {
                // Enable to redirect to error.php when uuid is not found
                // header('Location: error.php');
                // echo "Geen gegevens gevonden...";
                // exit();
            }
        } else {
                // Enable to redirect to error.php when error
                // header('Location: error.php');
            echo "Oeps! Er is iets fout gegaan...";
        }




    // $info = tb_type.id

    function createInfo2($id, $info, $uuid, $link) {

        $sql = "SELECT * FROM tb_document
          WHERE uuid=?
          AND type_id=?";
    
          if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "si", $param_uuid, $param_type_id);
    
            $param_uuid = $uuid;
            $param_type_id = $id;
    
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) > 0){
                    echo "<div class=\"box\">";
                    echo "<div id=" . $id . " class=\"content hideMe pre\">";
                    
                    while($row = mysqli_fetch_array($result)){
                                echo '<a href="' . "../admin/parts/" . $uuid . "/" . $row['documentname'] . '" target="_blank">' . $row['documentname'] . '</a> <br>';

                        }
                        echo "</div>";
                        echo "</div>";
                    }
                    
                    mysqli_free_result($result);
    
                } else {
                    // Enable to redirect to error.php when uuid is not found
                    // header('Location: error.php');
                    echo "Geen gegevens gevonden";
                    // exit();
                }
            } else {
                    // Enable to redirect to error.php when error
                    // header('Location: error.php');
                echo "Oeps! Er is iets fout gegaan...";
            }
        
    }
      

?>

<!-- FOOTER -->
<?php include 'includes/footer.php';?>