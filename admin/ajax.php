<?
    $id = $_POST['id'];
    $check = $_POST['check'];
    
    include '../config.php';
    include '../classes/admin.php';

    $dbconn = new DBConnection(); 
    $con = $dbconn->connect();
    $admin = new admin();
    $admin->blockUnblock($id,$check,$con);
?>