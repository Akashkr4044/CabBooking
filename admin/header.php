<!doctype html>
<html>
<head>
	<title>Online Cab Management</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../css/style2.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script>
    function myFunction0(id,value){
      $.ajax({
        
            url: 'ajax.php',
            data: { id: id, check: value},
            type: "POST",
            success: function (response) {
              location.reload();
            }
            });
    }
    function myFunction1(id){
      $.ajax({
            url: 'ajax1.php',
            data: { id: id},
            type: "POST",
            success: function (response) {
              location.reload();
            }
            });
    }
    function myFunction2(id){
      $.ajax({
            url: 'ajax2.php',
            data: { id: id},
            type: "POST",
            success: function (response) {
              location.reload();
            }
            });
    }
    function edit(id,name,distance){
      $(".editt").css("visibility","visible");   
      $("#locationName").val(name);
      $("#distance").val(distance);
      $("#ride_id").val(id);
    }
    function deletee(id){
      $.ajax({
            url: 'ajax3.php',
            data: { id: id},
            type: "POST",
            success: function (response) {
              location.reload();
            }
            });
    }

    function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>
</head>

<body>
<div style="padding: 0px;">
  <ul style="padding: 20px;">
    <li><a href="dashboard.php">Home</a></li>
    <li class="dropdown1">
      <a href="javascript:void(0)" class="dropbtn1">Rides&#x21B4;</a>
      <div class="dropdown-content1">
        <a href="pendingRides.php">Pending Rides</a>
        <a href="completedRides.php">Completed Rides</a>
        <a href="cancelledRides.php">Cancelled Rides</a>
        <a href="allRides.php">All Rides</a>
      </div>
    </li>
    <li class="dropdown1">
      <a href="javascript:void(0)" class="dropbtn1">Users&#x21B4;</a>
      <div class="dropdown-content1">
        <a href="showPusers.php">Pending User Request</a>
        <a href="showAusers.php">Approved User Request</a>
        <a href="showusers.php">All User</a>
      </div>
    </li>
    <li class="dropdown1">
      <a href="javascript:void(0)" class="dropbtn1">Location&#x21B4;</a>
      <div class="dropdown-content1">
        <a href="showLocations.php">Location List</a>
        <a href="addLocation.php">Add New Location</a>
      </div>
    </li>
    <li class="dropdown1">
      <a href="javascript:void(0)" class="dropbtn1">Account&#x21B4;</a>
      <div class="dropdown-content1">
        <a href="changePass.php">Change Password</a>
      </div>
    </li>
    <li><a href="../logout.php">Logout</a></li>
  </ul>
</div>


