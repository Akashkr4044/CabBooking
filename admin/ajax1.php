<?
    $id = $_POST['id'];
    include '../classes/ride.php';
    include '../config.php';
    $dbconn = new DBConnection(); 
    $con = $dbconn->connect();
    $ride = new ride();
    $ride->completedRides($id,$con);
?>