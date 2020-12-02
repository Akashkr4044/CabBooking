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
		<!-- <form action="" method="POST">
			<table class="center" style="padding-top: 50px;">
				<tr>
					<td>Name :</td>
					<td><input type="text" name="name" placeholder="Enter your Name" required></td>
				</tr>
				<tr>
					<td>Username :</td>
					<td><input type="text" name="username" placeholder="Enter your Username" required></td>
				</tr>
				<tr>
					<td>Password :</td>
					<td><input type="password" name="password" placeholder="Enter your Password" required></td>
				</tr>
				<tr>
					<td>Re-enter Password :</td>
					<td><input type="password" name="rePassword" placeholder="Confirm your Password" required></td>
				</tr>
				<tr>
					<td>Mobile No :</td>
					<td><input name="mobileNum" type="text" placeholder="Enter your Mobile Number" maxlength="10" required></td>
				</tr>
				<tr>
					<td></td>
					<td><input class="submit" type="submit" name="submit" value="Register">
					</td>
				</tr>
			</table>
		</form> -->

		<form action="" method="POST">
			<label for="name"><b>Name</b></label>
			<input type="text" class="text" name="name" placeholder="Your name..." require><br/>

			<label for="user_name"><b>User Name</b></label>
			<input type="text" class="text" name="username" placeholder="Your user name..." require>
			
			
			<label for="password"><b>Password</b></label>
			<input type="password" class="password" name="password" placeholder="Your Password..." require>
			
			<label for="rePassword"><b>Confirm Password</b></label>
			<input type="password" class="password" name="rePassword" placeholder="Confirm your Password..." require>
			
			
			<label for="mobileNum"><b>Mobile No.</b></label>
			<input type="text" class="text" name="mobileNum" placeholder="Your mobile number..." maxlength="10" require>
		
			<input type="submit" class="submit2" name="submit" value="Register">
  		</form>
		<br/>
	</div>
</div>
<?php include 'footer.php'; ?>