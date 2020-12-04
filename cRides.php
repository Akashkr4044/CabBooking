<?php include 'header1.php';?>

<?php 
session_start(); 
include 'config.php';
include 'classes/ride.php';

$dbconn = new DBConnection(); 
$con = $dbconn->connect();

$id = $_SESSION['user_id'];
$ride = new ride();
$pendingRides = $ride->showCompletedRides1($id,$con);

?>

<?php 
if(!($_SESSION['user_id'])){
    header('location: login.php');
}
?>
<?php include 'header.php'; ?>
<div class="pending">
    <h1 class="center">COMPLETED RIDES -</h1>
    <table class="adminTable">
    <th>RIDE ID</th><th>RIDE DATE</th><th>FROM</th><th>TO</th><th>TOTAL DISTANCE</th><th>LUGGAGE(in KG)</th><th>TOTAL FARE</th><th>INVOICE</th>
        <?php foreach($pendingRides as $key): ?>
            <tr>   
                <td>
                    <?php echo $key['ride_id']?>
                </td>
                <td>
                    <?php echo $key['ride_date']?>
                </td>
                <td>
                    <?php echo $key['from_location']?>
                </td>
                <td>
                    <?php echo $key['to_location']?>
                </td>
                <td>
                    <?php echo $key['total_distance']?>
                </td>
                <td>
                    <?php echo $key['luggage']?>
                </td>
                <td>₹ 
                    <?php echo $key['total_fare']?>
                </td>
                <td>
                <a href="invoice.php?id='.$row['ride_id'].'">Get Invoice</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>  

<?php include 'footer.php'; ?>