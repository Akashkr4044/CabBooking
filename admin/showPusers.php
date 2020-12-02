<?php 
session_start();
include '../config.php';
include '../classes/admin.php';

$dbconn = new DBConnection(); 
$con = $dbconn->connect();

$admin = new admin();
$bUser = $admin->showBlocked($con);
?>

<?php  
if(!($_SESSION['check'])){
    header('location: ../login.php');
}
?>
<?php include 'header.php'; ?>
<div class="pending">
    <h1 class="center">PENDING REQUESTS -</h1>
    <table class="adminTable">
    <th>USER ID</th><th>NAME</th><th>USERNAME</th><th>DATE OF SIGNUP</th><th>MOBILE</th><th></th><th></th>
        <?php foreach($bUser as $key): ?>
            <tr>   
            <td><?php echo $key['user_id'];?></td><td><?php echo $key['name']?></td><td><?php echo $key['user_name'];?></td><td><?php echo $key['dateofsignup'];?></td><td><?php echo $key['mobile'];?></td><td></td><td><input class="btn" id="allow-<?php echo $key['user_id'];?>" type="button" value="UNBLOCK" onclick="myFunction0(<?php echo $key['user_id'];?>,<?php echo $key['isblock'];?>)"></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'footer.php'; ?>