

<?php 
session_start(); 
include 'config.php';
include 'classes/ride.php';

$dbconn = new DBConnection(); 
$con = $dbconn->connect();

$id = $_SESSION['user_id'];
$ride = new ride();
$pendingRides = $ride->showAllRides1($id,$con);
?>

<?php 
if(!($_SESSION['user_id'])){
    header('location: login.php');
}
?>
<?php include 'header.php'; ?>

<head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.3.5/css/autoFill.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/autofill/2.3.5/js/dataTables.autoFill.min.js">
</script>
</head>
<body>
<div class="pending">
    <h1 class="center">ALL RIDES -</h1>
    <table class="adminTable display" id="myTable" data-order='[[ 1, "asc" ]]'>
        <thead>
            <tr>
                <th>RIDE ID</th>
                <th>RIDE DATE</th>
                <th>FROM</th>
                <th>TO</th>
                <th>TOTAL DISTANCE</th>
                <th>LUGGAGE(in KG)</th>
                <th>TOTAL FARE</th>
            </tr>
        </thead>
        <?php foreach($pendingRides as $key): ?>
        <tbody>
            <tr>   
                <td><?php echo $key['ride_id']?></td>
                <td><?php echo $key['ride_date']?></td>
                <td><?php echo $key['from_location']?></td>
                <td><?php echo $key['to_location']?></td>
                <td><?php echo $key['total_distance']?></td>
                <td><?php echo $key['luggage']?></td>
                <td>₹ <?php echo $key['total_fare']?></td>
            </tr>
        </tbody>
        <?php endforeach ?>
    </table>
</div>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>

<?php include 'footer.php'; ?>
</body>