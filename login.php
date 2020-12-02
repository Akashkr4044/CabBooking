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
  $password = $_POST['password'];

  $user = new user();
  $error = $user->login($username,$password,$con);
}
?>

<?php include 'header.php';?>

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
          <td><input class="text" name="username"type="text" required="" placeholder="Enter your Username"></td>
        </tr>
        <tr>
          <td><b>Password : </b></td>
          <td><input class="password" name="password" type="password" required="" placeholder="Enter your Password"></td>
        </tr>
        <tr></tr><tr></tr><tr></tr><tr></tr>
        <tr> 
          <td></td>
          <td><input type="checkbox" id="check" name="check" value="check"><b>Remember Me</b></td>
        </tr>
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

<?php include 'footer.php';?>