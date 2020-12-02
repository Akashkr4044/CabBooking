<?php
include 'classes/ride.php';
include 'config.php';

$dbconn = new DBConnection(); 
$con = $dbconn->connect();

$position = $_POST['pickup'];
$destination = $_POST['destination'];
$cabtype = $_POST['cabtype'];
$luggage = $_POST['luggage'];

$ride = new ride();
$totalFare = $ride->totalFare($position,$destination,$cabtype,$luggage,$con);
echo $totalFare;
?>

