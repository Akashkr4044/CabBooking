<?
    $is_available = $_POST['is_available'];
    include '../classes/location.php';
    include '../config.php';
    $dbconn = new DBConnection(); 
    $con = $dbconn->connect();
    $loc = new location();
    $loc->toggleLocation($is_available,$con);
?>