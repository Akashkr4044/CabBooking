<!doctype html>
<html>
<head>
  <meta charset = "UTF-8" />
	<title>ONLINE CAB MANAGEMENT</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body{
      margin: 0px;
    }
    .welcome{
      padding: 12px;
      color: rgb(48, 230, 48);
      text-align: center;
    }
    ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    }
    li {
      float: left;
    }
    li a, .dropbtn1 {
      display: inline-block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    .hov:hover {
      background-color: #202020;
    }
    a:link {
      text-decoration: none;
    }
    .color{
      color:white;
    }
    /* li a:hover, .dropdown1:hover .dropbtn1 {
      background-color: blue;
    } */
    li.dropdown1 {
      display: inline-block;
    }
    .dropdown-content1 {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    .dropdown-content1 a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }
    .dropdown-content1 a:hover {
      background-color: #f1f1f1;
    }
    .dropdown1:hover .dropdown-content1 {
      display: block;
    }
    .center{
      text-align: center;
    }
    .adminTable{
      margin: 20px 0px;
    }
    .adminTable th{
      text-decoration: underline;
      text-align: center;
      padding: 10px;
    }
    .adminTable{
      text-align: center;
      padding: 5px;
    }
    /* body{
      background-color: grey;
    } */
    .heading{
      text-align: center; 
      margin: 0px; 
      padding-top: 40px;
      padding-bottom: 20px;
    }
    h1{
      padding-top: 40px;
      text-decoration: underline;
    }
    .text ,.password ,select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    .submit2 {
      width: auto;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .submit2 :hover {
      background-color: #45a049;
    }
    #div {
      border-radius: 5px;
      padding: 20px;
    }
  </style>
  <script>
    function myFunction() 
    {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) 
      {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) 
        {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) 
          {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>
</head>

<body>
<div style="padding:0px;">
  <ul style="margin:0px; " >
    <?php if(isset($_SESSION['login']) && isset($_SESSION['name'])){ ?>
      <li class="welcome">Welcome-<b>"<?php echo $_SESSION['login']; ?>"</b></li>
    <li><a href="dashboard.php">Home</a></li>
    <li><a href="index.php">Book Cab</a></li>

    <li class="dropdown1">
      <a href="javascript:void(0)" class="dropbtn1">Rides&#x21B4;</a>
      <div class="dropdown-content1">
        <a href="pRides.php">Pending Rides</a>
        <a href="cRides.php">Completed Rides</a>
        <a href="aRides.php">All Rides</a>
      </div>
    </li>
    <li class="dropdown1">
      <a href="javascript:void(0)" class="dropbtn1">Account&#x21B4;</a>
      <div class="dropdown-content1">
        <a href="updateProfile.php">Update Information</a>
        <a href="updatePassword.php">Change Password</a>
      </div>
    </li>
    <?php } if(isset($_SESSION['login'])){ ?>
    <li><a href="logout.php">Logout</a></li>
    <?php }else{ ?>
      <li><a href="index.php">Book Cab</a></li>
      <li><a class="active" href="login.php">Log In</a></li>
      <li><a href="signup.php">Sign Up</a></li>
    <?php } ?><!-- <h1 class="center" style="color:white; margin:0px; padding: 280px 0px;">PLEASE GO TO "BOOK CAB" SECTION TO BOOK A CAB !!</h1> -->
  </ul>
</div>

