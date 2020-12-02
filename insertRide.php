<?php
session_start();
include 'config.php';
include 'classes/ride.php';

$dbconn = new DBConnection(); 
$con = $dbconn->connect();

$ride1 = new ride();

if(isset($_SESSION['user_id']))
{
    $userid = $_SESSION['user_id'];
    $pickup = $_POST['pickup'];
    $destination = $_POST['destination'];
    $luggage = $_POST['luggage'];
    $totalFare = $_POST['total_fare'];
    $totalDistance = $_SESSION['total_distance'];

    $result = $ride1->insertRide($userid,$pickup,$destination,$luggage,$totalFare,$totalDistance,$con);
    echo $result;
}
else {
    echo "PLEASE LOG IN FIRST..!";
}
?>