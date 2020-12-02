<?php 
include '../config.php';
include '../classes/ride.php';

$dbconn = new DBConnection(); 
$con = $dbconn->connect();

$ride = new ride();
$completedRides = $ride->showCompletedRides($con);

?>

<?php 
session_start(); 
if(!($_SESSION['check'])){
    header('location: ../login.php');
}
?>
<?php include 'header.php'; ?>
<div class="pending">
    <h1 class="center">COMPLETED RIDES -</h1>
    <table class="adminTable">
    <th>RIDE ID</th><th>RIDE DATE</th><th>FROM</th><th>TO</th><th>TOTAL DISTANCE</th><th>LUGGAGE(in KG)</th><th>TOTAL FARE</th><th>USER ID</th>
        <?php foreach($completedRides as $key): ?>
            <tr>   
            <td><?php echo $key['ride_id']?></td><td><?php echo $key['ride_date']?></td><td><?php echo $key['from_location']?></td><td><?php echo $key['to_location']?></td><td><?php echo $key['total_distance']?></td><td><?php echo $key['luggage']?></td><td><?php echo $key['total_fare']?></td><td><?php echo $key['customer_user_id']?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<?php include 'footer.php'; ?>