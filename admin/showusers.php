<?php 
$value= "";
if(isset($_POST['select']))
{
$value = $_POST['select'];
}

include '../config.php';
include '../classes/admin.php';

$dbconn = new DBConnection(); 
$con = $dbconn->connect();

$admin = new admin();
$aUsers = $admin->showAllusers($value,$con);

?>

<?php 
session_start(); 
if(!($_SESSION['check'])){
    header('location: ../login.php');
}
?>
<?php include 'header.php'; ?>
<div class="pending">
    <h1 class="center">ALL USERS -</h1>
    <div style="float:right;">
    <form method="POST">
    <select id="select" name="select" onchange="this.form.submit()">
        <option value="0">Sort By</option>
        <option value="date">Date</option>
    </select>
    </form>    
    </div>
    <table class="adminTable">
    <th>USER ID</th><th>NAME</th><th>USERNAME</th><th>DATE OF SIGNUP</th><th>MOBILE</th><th>ACCESS</th><th>isADMIN</th>
        <?php foreach($aUsers as $key): ?>
            <tr>   
            <td><?php echo $key['user_id']?></td><td><?php echo $key['name']?></td><td><?php echo $key['user_name']?></td><td><?php echo $key['dateofsignup']?></td><td><?php echo $key['mobile']?></td><td><?php echo $key['isblock']?></td><td><?php echo $key['is_admin']?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>

<?php include 'footer.php'; ?>