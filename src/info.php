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

<?php echo $name; ?>

<!-- Display tabs -->
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
                echo "<div class='tab'>";
                while($row = mysqli_fetch_array($result)){
                    echo "<button class=\"tablinks\" onclick=\"openInfo(event, '" . $row["name"] . "')\">" . $row['name'] . "</button>";
                    $aTabID[] = $row['name'];
                    $aInformation[] = $row['information'];
                }
                
                echo "</div>";
                mysqli_free_result($result);

                foreach($aTabID as $key => $value) {
                    echo createInfo($value, $aInformation[$key]);
                }

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
    } else {
        echo "Error";
    }

    function createInfo($id, $info) {
        $info = <<<INFO
            <div id="$id" class="tabcontent">
                <p>$info</p>
            </div>
            
    INFO;
        return $info;
    }

?>


<!-- FOOTER -->
<?php include 'includes/footer.php';?>