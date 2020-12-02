<?php
  session_start();

  include '../config.php';
  include '../classes/admin.php';
  include '../classes/ride.php';
  include '../classes/location.php';

  if(!($_SESSION['check'])){
    header('location: ../login.php');
  }

  include 'header.php';

  $dbconn = new DBConnection(); 
  $con = $dbconn->connect();

  $u = new admin();
  $r = new ride();
  $l = new location();

  $puCount = 0;
  $buCount = 0;
  $auCount = 0;
  $prCount = 0;
  $crCount = 0;
  $c2rCount = 0;
  $arCount = 0;
  $totalFARE = 0;
  $tlCount = 0;

  $pu = $u->showBlocked($con);
  $bu = $u->showUnblocked($con);
  $au = $u->showAllusers("",$con);

  $pr = $r->showPendingRides($con);
  $cr = $r->showCompletedRides($con);
  $c2r = $r->showCancelledRides($con);
  $ar = $r->showAllRides("",$con);

  $tl = $l->showLocation($con);

  foreach($pu as $key){
    ++$puCount;
  }
  foreach($bu as $key){
    ++$buCount;
  }
  foreach($au as $key){
    ++$auCount;
  }
  foreach($pr as $key){
    ++$prCount;
  }
  foreach($cr as $key){
    ++$crCount;
  }
  foreach($c2r as $key){
    ++$c2rCount;
  }
  foreach($ar as $key){
    ++$arCount;
    $totalFARE+= (int) $key['total_fare'];
  }
  foreach($tl as $key){
    ++$tlCount;
  }
?>

<div class="container" style="margin-top:50px; margin-bottom:50px;">
  <div class="first"><h1 style="padding-top:30px;">Number of Pending Users</h1><h2><?php echo $puCount;?></h2></div>
  <div class="third"><h1 style="padding-top:30px;">Number of Approved Users</h1><h2><?php echo $buCount;?></h2></div>
  <div class="second"><h1 style="padding-top:30px;">Total number of Users</h1><h2><?php echo $auCount;?></h2></div>
  <div class="fourth"><h1 style="padding-top:30px;">Number of Pending Rides</h1><h2><?php echo $prCount;?></h2></div>
  <div class="fifth"><h1 style="padding-top:30px;">Number of Completed Rides</h1><h2><?php echo $crCount;?></h2></div>
  <div class="sixth"><h1 style="padding-top:30px;">Number of Cancelled Rides</h1><h2><?php echo $c2rCount;?></h2></div>
  <div class="seventh"><h1 style="padding-top:30px;">Total number of Rides</h1><h2><?php echo $arCount;?></h2></div>
  <div class="eighth"><h1 style="padding-top:30px;">Total Expected Fare</h1><h2>₹ <?php echo $totalFARE;?></h2></div>
  <div class="first"><h1 style="padding-top:30px;">Total Locations</h1><h2><?php echo $tlCount;?></h2></div>
  <!-- <div class="third"><h1 style="padding-top:30px;">Currently Unavailable</h1><h2><?php //echo $;?></h2></div>
  <div class="second"><h1 style="padding-top:30px;">Currently Unavailable</h1><h2><?php //echo $;?></h2></div>
  <div class="fourth"><h1 style="padding-top:30px;">Currently Unavailable</h1><h2><?php //echo $;?></h2></div> -->
</div>
<?php include 'footer.php'; ?>​