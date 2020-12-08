

<?php 
$value= "";
if(isset($_POST['select']))
{
$value = $_POST['select'];
}

include '../config.php';
include '../classes/ride.php';

$dbconn = new DBConnection(); 
$con = $dbconn->connect();

$ride = new ride();
$allRides = $ride->showAllRides($value,$con);

?>

<?php 
session_start(); 
if(!($_SESSION['check'])){
    header('location: ../login.php');
}
?>
<?php include 'header.php'; ?>
<div class="pending">
    <h1 class="center">ALL RIDES -</h1>
    <div style="float:right;">
    <form method="POST">
    <select id="select" name="select" onchange="this.form.submit()">
        <option value="0">Sort By</option>
        <option value="date">Date</option>
        <option value="fare">Fare</option>
    </select>
    </form>    
    </div>
    <table class="adminTable">
    <th>RIDE ID</th><th>RIDE DATE</th><th>FROM</th><th>TO</th><th>TOTAL DISTANCE</th><th>LUGGAGE(in KG)</th><th>TOTAL FARE</th><th>STATUS</th><th>USER ID</th>
        <?php foreach($allRides as $key=>$value): ?>
            <tr>   
            <td><?php echo $value['ride_id']?></td><td><?php echo $value['ride_date']?></td><td><?php echo $value['from_location']?></td><td><?php echo $value['to_location']?></td><td><?php echo $value['total_distance']?></td><td><?php echo $value['luggage']?></td><td><?php echo $value['total_fare']?></td><td><?php echo $value['status']?></td><td><?php echo $value['customer_user_id']?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<?php include '../footer.php'; ?>