<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header('location: login.php');
}
include 'header.php';
?>

<div style="background-color:grey; height:100%; width:100%;" >
<h1 class="center" style="color:white; margin:0px;"><img src="logos.png" alt="customerlogo"></h1>

</div>

<?php include 'footer.php'; ?>