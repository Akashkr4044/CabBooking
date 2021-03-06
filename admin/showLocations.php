

<?php 
include '../config.php';
include '../classes/location.php';

$dbconn = new DBConnection(); 
$con = $dbconn->connect();

$location = new location();
$showLocations = $location->showLocation($con);


if(isset($_POST['submit'])){
  $id = $_POST['ride_id'];
  $name = $_POST['locationName'];
  $distance = $_POST['distance'];

  $location->editLocation($id,$name,$distance,$con);
  header('location: showLocations.php');
}
?>

<?php 
session_start(); 
if(!($_SESSION['check'])){
    header('location: ../login.php');
}
?>
<?php include 'header.php'; ?>
<div class="pending">
    <h1 class="center">LOCATIONS -</h1>
    <table class="adminTable"><?php $i=0;?>
    <th>Sr. No.</th><th>LOCATION NAME</th><th>DISTANCE</th><th>AVAILABILITY</th><th></th><th></th><th></th>
        <?php foreach($showLocations as $key=>$value): ?>
            <tr>   
              <td style="margin: 10px;"><?php echo ++$i;?></td>
              <td><?php echo $value['name'];?></td>
              <td><?php echo $value['distance'];?></td>
              <td><?php echo $value['is_available'];?></td>

              <td><input id="ride-<?php echo $value['id'];?>" type="button" style=" color: white; background-color: black; border-radius: 50%; padding: 10px;" value="EDIT" onclick="edit(<?php echo $value['id']; ?>,'<?php echo $value['name'];?>',<?php echo $value['distance'];?>)"></td>

              <td><input id="allow-<?php echo $value['id'];?>" type="button" style=" color: white; background-color: black; border-radius: 50%; padding: 10px;" value="DELETE" onclick="deletee(<?php echo $value['id'];?>)"></td>

              <td><input id="toggle-<?php echo $value['is_available'];?>" type="button" style=" color: white; background-color: black; border-radius: 50%; padding: 10px;" value="TOGGLE" onclick="toggle(<?php echo $value['id'];?>)"></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="center editt">
  <form action="" method="POST">
    <label for="lname">Location Name</label>
    <input type="text" id="locationName" name="locationName" onkeypress="return alphaonly(event)" placeholder="Input location name.."><br>

    <label for="distance">Distance</label>
    <input type="number" id="distance" name="distance" placeholder="Distance from Charbagh.." maxlength="4"><br>

    <input type="hidden" id="ride_id" name="ride_id"><br>

    <input type="submit" name="submit" value="Submit">
  </form>
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
<?php include '../footer.php'; ?>