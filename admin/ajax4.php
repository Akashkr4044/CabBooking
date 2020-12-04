<?
    $id = $_POST['id'];
    include '../classes/location.php';
    include '../config.php';
    $dbconn = new DBConnection(); 
    $con = $dbconn->connect();
    $loc = new location();
    $loc->toggleLocation($id,$con);
?>