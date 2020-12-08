

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
<head>
<link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<section style="margin-top:50px; margin-bottom:100px; margin-left:60px;">
  <div class="first" style="margin:5px;"><h2 style="padding-top:10px;">Number of Pending Users</h2><center><h1><?php echo $puCount;?></h1></center></div>
  <div class="third" style="margin:5px;"><h2 style="padding-top:10px;">Number of Approved Users</h2><center><h1><?php echo $buCount;?></h1></center></div>
  <div class="second" style="margin:5px;"><h2 style="padding-top:10px;">Total number of Users</h2><center><h1><?php echo $auCount;?></h1></center></div>
  <div class="fourth" style="margin:5px;"><h2 style="padding-top:10px;">Number of Pending Rides</h2><center><h1><?php echo $prCount;?></h1></center></div>
  <div class="fifth" style="margin:5px;"><h2 style="padding-top:10px;">Number of Completed Rides</h2><center><h1><?php echo $crCount;?></h1></center></div>
  <div class="sixth" style="margin:5px;"><h2 style="padding-top:10px;">Number of Cancelled Rides</h2><center><h1><?php echo $c2rCount;?></h1></center></div>
  <div class="seventh" style="margin:5px;"><h2 style="padding-top:10px;">Total number of Rides</h2><center><h1><?php echo $arCount;?></h1></center></div>
  <div class="eighth" style="margin:5px;"><h2 style="padding-top:10px;">Total Expected Fare</h2><center><h1>₹ <?php echo $totalFARE;?></h1></center></div>
  <div class="first" style="margin:5px;"><h2 style="padding-top:10px;">Total Locations</h2><center><h1><?php echo $tlCount;?></h1></center></div>
  <!-- <div class="third"><h1 style="padding-top:30px;">Currently Unavailable</h1><h2><?php //echo $;?></h2></div>
  <div class="second"><h1 style="padding-top:30px;">Currently Unavailable</h1><h2><?php //echo $;?></h2></div>
  <div class="fourth"><h1 style="padding-top:30px;">Currently Unavailable</h1><h2><?php //echo $;?></h2></div> -->
</section>
</body>
​