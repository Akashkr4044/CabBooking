<?php include 'header1.php';?>

<?php
$error = "";

if (isset($_POST['submit']))
{
	include 'config.php';
	include 'classes/user.php';

	$dbconn = new DBConnection(); 
	$con = $dbconn->connect();

	$name = $_POST['name'];
	$username = $_POST['username'];
	$username=strtolower($username);
	$password = $_POST['password'];
	$repassword = $_POST['rePassword'];
	$mobileNum = $_POST['mobileNum'];

	if($password==$repassword){
		$user = new user();
		$error = $user->register($username,$name,$mobileNum,$password,$repassword,$con);
	}
	else $error = "Password miss-matched..!!";
}
?>

<?php include "header.php"; ?>
<div class="main">
	<h1 class="heading">USER REGISTRATION PANEL</h1>
		<div>
			<p style="color:black;"><?php echo "<b>".$error."</b>" ?></p>
		</div>
	<div id="div">

		<form action="" method="POST">
			<label for="name"><b>Name</b></label>
			<input type="text" class="text" placeholder="Your name..." onkeypress="return alphaonly(event)" name="name" placeholder="Your name..." required><br/>

			<label for="user_name"><b>User Name</b></label>
			<input type="text" class="text" name="username" placeholder="Your user name..." require>
			
			
			<label for="password"><b>Password</b></label>
			<input type="password" class="password" name="password" placeholder="Your Password..." require>
			
			<label for="rePassword"><b>Confirm Password</b></label>
			<input type="password" class="password" name="rePassword" placeholder="Confirm your Password..." require>
			
			
			<label for="mobileNum" onkeypress="return onlynum(event)"><b>Mobile No.</b></label>
			<input type="number" class="text" name="mobileNum" placeholder="Your mobile number..." maxlength="10" required>
		
			<input type="submit" class="submit2" name="submit" value="Register">
  		</form>
		<br/>
	</div>
</div>
<script>
  function alphaonly(button) {
    console.log(button.which);
    var code = button.which;
    if ((code > 64 && code < 91) || (code < 123 && code > 96)|| (code==08))
        return true;
    return false;
    }
</script>
<?php include 'footer.php'; ?>