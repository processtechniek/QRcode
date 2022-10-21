<?php
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
</head>
<body>

<?php
$sql = "SELECT c.name, i.information FROM tb_category c INNER JOIN tb_info i ON c.id = i.category_id";

$tabID = "";
$information = "";

if($result = mysqli_query($link, $sql)){
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


    } else{
        echo "Niks gevonden.";
    }
} else{
    echo "Error.";
}

// Close connection
mysqli_close($link);



function createInfo($id, $info) {
    $info = <<<INFO
        <div id="$id" class="tabcontent">
            <h3>test</h3>
            <p>$info</p>
        </div>
        
INFO;
    return $info;
}
?>


<script>
function openInfo(evt, infoName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(infoName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

</body>
</html>