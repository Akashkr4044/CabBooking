
<?php 
session_start(); 
include 'config.php';
include 'classes/ride.php';

$dbconn = new DBConnection(); 
$con = $dbconn->connect();

$id = $_SESSION['user_id'];
$ride = new ride();
$pendingRides = $ride->showCompletedRides2($id,$con);

?>

<?php 
include 'header.php';
if(!($_SESSION['user_id'])){
    header('location: login.php');
}
?>

<html>
	<head>
		<title>Invoice</title>
		<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
		<style type="text/css">
		body {		
			font-family: Sofia;
			
		}
		
		div.invoice {
		border:5px solid grey;
		padding:10px;
		height:440pt;
		width:670pt;
		}

		div.company-address {
			border:2px solid black;
			float:right;
			width:100pt;
		}
		
		div.invoice-details {
			color: yellow;
			float:left;
			width:150pt;
		}
		
		div.customer-address {
			
			float:right;
			margin-bottom:50px;
			margin-top:100px;
			width:200pt;
		}
		
		div.clear-fix {
			clear:both;
			float:none;
		}
		
		table {
			width:100%;
		}
		
		th {
			text-align: left;
		}
		
		td {
		}
		
		.text-left {
			text-align:left;
		}
		
		.text-center {
			text-align:center;
		}
		
		.text-right {
			text-align:right;
		}
		
		</style>
	</head>

	<body>
	<center>
	<div class="invoice">
		<div class="company-address" ><center>
			CedCab Ltd
			<br />
			Central Park
			<br />
			New York
			<br /></center>
		</div>
	
		<div class="invoice-details">
			<center>
			<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
          	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          	<h1 style="padding: 10px; font-weight:500; margin-bottom:0; line-height:1.2; font-size: 2rem; color:rgb(220, 236, 80); margin-top:0; text-decoration:none; font-family: Sofia">Ced<span style="background-color:red; border-radius: 48px;">Cab</span> </h1>
			</center>
		</div>
		
		<div class="customer-address">
			<!-- To: -->
			<br />
			<!-- Mr. Bill Terence -->
			<br />
			<!-- 123 Long Street -->
			<br />
			<!-- London, DC3P F3Z  -->
			<br />
		</div>
		<div class="clear-fix"></div>
			<table border='1' cellspacing='0' class="adminTable">
				
				<th>RIDE ID</th><th>RIDE DATE</th><th>FROM</th><th>TO</th><th>TOTAL DISTANCE</th><th>LUGGAGE(in KG)</th><th>TOTAL FARE</th>

				<?php foreach($pendingRides as $key): ?>
				<tr>   
					<td>
						<?php echo $key['ride_id']?>
					</td>
					<td>
						<?php echo $key['ride_date']?>
					</td>
					<td>
						<?php echo $key['from_location']?>
					</td>
					<td>
						<?php echo $key['to_location']?>
					</td>
					<td>
						<?php echo $key['total_distance']?>
					</td>
					<td>
						<?php echo $key['luggage']?>
					</td>
					<td>₹ 
						<?php echo $key['total_fare']?>
					</td>
				</tr>
        		<?php endforeach ?>
			</table>
		</div>
		</center>
	</body>
</html>

<?php include 'footer.php';?>