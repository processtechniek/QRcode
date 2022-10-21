<?php
require_once('config.php');

if (empty($_GET)) {
    // Enable to redirect to error.php when no uuid given
    // header('Location: error.php');
    echo "Geen uuid opgegeven.";
} else {
    $uuid = $_GET["uuid"];
    echo $uuid;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procestechniek</title>
</head>
<body>

<!-- Display Name -->


</body>
</html>