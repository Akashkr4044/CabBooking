<?php 
    session_start();
    include 'config.php';
    include 'classes/user.php';

    $dbconn = new DBConnection(); 
    $con = $dbconn->connect();

    $id = $_SESSION['login'];

    $user = new user();
    $user1 = $user->showDetails($id,$con); 
    
?>

<?php include 'header.php'; ?>

<?php
$error = "";
if(isset($_POST['submit'])){
  
  $id = $_SESSION['login'];
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  
  $user = new user();
  $error = $user->updateDetails($id,$name,$mobile,$con);
  header('location: updateProfile.php');
}
?>

<!DOCTYPE html>
<html>
<style>
input[type=text], select {
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
	<h1 style="text-align: center;">PROFILE UPDATE PANEL</h1>
			<div>
					<p><?php echo "<b>".$error."</b>" ?></p>
			</div>
  <div>
  <form action="" method="POST" novalidate>
      <label for="fname">USERNAME</label>
      <input type="text" value="<?php echo $user1['user_name']; ?>" name="username" disabled><br/>

      <label for="lname">NAME</label>
      <input type="text" value="<?php echo $user1['name']; ?>" name="name"><br/>
      
      <label for="lname">MOBILE</label>
      <input type="text" value="<?php echo $user1['mobile']; ?>" name="mobile" maxlength="10"><br/>
    
      <input type="submit" name = "submit" value="Submit">
    </form>
  </div>
</div>

<?php include 'footer.php';?>