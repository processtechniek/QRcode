<?php

require_once "config.php";

$count = "SELECT * FROM tb_part";
if ($result=mysqli_query($link,$count)) {
    $usercount=mysqli_num_rows($result);
}

$count = "SELECT * FROM tb_user";
if ($result=mysqli_query($link,$count)) {
    $partcount=mysqli_num_rows($result);
}

?>

<?php include 'assets/includes/header.php';?>

<div class="container">
    <h1>Overzicht</h1>
        <div class="overzicht-container">
            <div class="aantal-studenten">
                <div class="aantal-stundeten-text">
                    <h2>Aantal Docenten</h2>
                    <div class="studentcount"><?php echo $partcount; ?></div>
                </div>
                <div class="aantal-studenten-icon">
                    <iconify-icon icon="charm:people"></iconify-icon>
                </div>
            </div>
            <div class="aantal-items">
                <div class="aantal-items-text">
                    <h2>Aantal Parts</h2>
                    <div class="itemcount"><?php echo $usercount; ?></div>
                </div>
                <div class="aantal-items-icon">
                    <iconify-icon icon="akar-icons:shipping-box-01">
                </div>
            </div>
        </div>
</div>
 
<?php include 'assets/includes/footer.php';?>