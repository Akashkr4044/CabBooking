<?php include '../header1.php'; ?>

<?php 
session_start();
$addLocation = "";
if(isset($_POST['submit'])){
include '../config.php';
include '../classes/location.php';

$lname = $_POST['locationName'];
$distance = $_POST['distance'];

$dbconn = new DBConnection(); 
$con = $dbconn->connect();

$location = new location();
$addLocation = $location->addLocation($lname,$distance,$con);
}

?>

<?php 
if(!($_SESSION['check'])){
    header('location: ../login.php');
}
?>

<?php include 'header.php'; ?>

<div class="approved">
    <h1 class="center">ADD LOCATION -</h1>
</div>
<div>
    <p><?php echo "<b>".$addLocation."</b>" ?></p>
</div>
<div class="center">
  <form action="" method="POST">
    <label for="lname"><b>Location Name : </b></label>
    <input type="text" pattern="[a-zA-Z_]+([a-zA-Z]+){1,20}" title="Only letters are accepted" name="locationName" placeholder="Input location name..!" required><br>

    <label for="distance"><b>Distance : </b></label>
    <input type="number" name="distance" placeholder="Distance from Charbagh..!" maxlength="4"><br>

    <input type="submit" name="submit" value="Submit">
  </form>
</div>
<?php include '../footer.php'; ?>