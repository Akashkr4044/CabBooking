

<?php

session_start();
include '../config.php';
include '../classes/admin.php';

$dbconn = new DBConnection(); 
$con = $dbconn->connect();

$admin = new admin();

include 'header.php';
?>

<?php
$error = "";
if(isset($_POST['submit'])){
    $id = $_SESSION['user_id'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $reNewPassword = $_POST['reNewPassword'];

    if($oldPassword=="" || $newPassword=="" || $reNewPassword=="")
    {
      $error = "NO FIELD MUST BE EMPTY !!";
    }
    else if($newPassword==$reNewPassword)
    {
      $error = $admin->updatePass($id,$oldPassword,$newPassword,$con);
    }
    else $error = "YOUR BOTH PASSWORD'S DO NOT MATCH !!";
}
?>

<!DOCTYPE html>
<html>
<style>
    input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }

    input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    input[type=submit]:hover {
    background-color: #45a049;
    }

    div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    }
</style>
<body>

<div class="main">
	<h1 style="text-align: center;">UPDATE PASSWORD</h1>
		<div>
			<p><?php echo "<b>".$error."</b>" ?></p>
		</div>
  <div>
  <form action="" method="POST" novalidate>
      <label for="oldPass">OLD PASSWORD</label>
      <input type="password" value="" name="oldPassword" placeholder="Enter your Old Password"><br/>
      
      <label for="newPass">NEW PASSWORD</label>
      <input type="password" value="" name="newPassword" placeholder="Enter your New Password"><br/>

      <label for="reNewPass">RE-ENTER NEW PASSWORD</label>
      <input type="password" value="" name="reNewPassword" placeholder="Re-enter your New Password"><br/>
    
      <input type="submit" name = "submit" value="Submit">
    </form>
  </div>
</div>

<?php include '../footer.php'; ?>

