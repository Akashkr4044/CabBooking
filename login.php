

<?php
session_start();
if (isset($_SESSION['login'])){   //&& $_SESSION['isblock']=='1'
  //header("Location:");
}
?>

<?php
$error = "";
if(isset($_POST['submit'])){
  include 'config.php';
  include 'classes/user.php';

  $dbconn = new DBConnection(); 
  $con = $dbconn->connect();

  $username = $_POST['username'];
  $username=strtolower($username);
  $password = $_POST['password'];

  $user = new user();
  $error = $user->login($username,$password,$con);
}
?>
<?php include 'header.php';?>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<title>
Login
</title>
<!-- <link rel="stylesheet" href="cab.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>
<div class="main">
  <h1 class="heading">LOGIN PANEL</h1>
  <div>
    <p style="color:black;"><?php echo '<b>'.$error.'</b>'?></p>
  </div>
  <div class="section">
    <form action="" method="POST" novalidate>
      <table class="center" style="padding-top:50px;">
        <tr>
          <td><b>Username : </b></td>
          <td><input class="text form" name="username" type="text" required="" placeholder="Enter your Username"></td>
        </tr>
        <tr>
          <td><b>Password : </b></td>
          <td><input class="password form" name="password" type="password" required="" placeholder="Enter your Password"></td>
        </tr>
        <tr></tr><tr></tr><tr></tr><tr></tr>
        <tr> 
          <td></td>
          <td><input type="checkbox" id="check" name="check" value="check"><b>Remember Me</b></td>
        </tr>
        <br>
        <tr>
          <td>
            <td><input class="submit2" name="submit" type="submit" value="Login">
          </td>
        </tr>
      </table>
    </form>
    <br/>
  </div>
</div>
<br><br><br>
<br><br>
<script>
	$('.form').on("cut copy paste drag drop",function(e) {
		e.preventDefault();
	});
</script>

<?php include 'footer.php';?>
</body>