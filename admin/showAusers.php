

<?php 
include '../config.php';
include '../classes/admin.php';

$dbconn = new DBConnection(); 
$con = $dbconn->connect();

$admin = new admin();
$uUser = $admin->showUnblocked($con);
?>

<?php 
session_start(); 
if(!($_SESSION['check'])){
    header('location: ../login.php');
}
?>

<?php include 'header.php'; ?>

<div class="approved">
    <h1 class="center">APPROVED REQUESTS -</h1>
    <table class="adminTable">
        <th>USER ID</th><th>NAME</th><th>USERNAME</th><th>DATE OF SIGNUP</th><th>MOBILE</th><th></th><th></th>
        <?php foreach($uUser as $key): ?>
            <tr>   
            <td><?php echo $key['user_id']?></td>
            <td><?php echo $key['name']?></td>
            <td><?php echo $key['user_name']?></td>
            <td><?php echo $key['dateofsignup']?></td>
            <td><?php echo $key['mobile']?></td
            ><td></td>
            <td><input class="btn" style=" color: white; background-color: black; border-radius: 50%; padding: 10px;" id="allow-<?php echo $key['user_id']?>" type="button" value="BLOCK" onclick="myFunction0(<?php echo $key['user_id']?>,<?php echo $key['isblock']?>)"></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>

<?php include '../footer.php'; ?>