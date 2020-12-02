<?php

class ride{
	public function totalFare($position,$destination,$cabtype,$luggage,$con)
	{
		session_start();
		$q1 = "SELECT `distance` from `tbl_location` where `name`='".$position."'";
		$r1 = mysqli_query($con, $q1);
		$d1 = mysqli_fetch_assoc($r1);


		$q2 = "SELECT `distance` from `tbl_location` where `name`='".$destination."'";
		$r2 = mysqli_query($con, $q2);
		$d2 = mysqli_fetch_assoc($r2);


		//Storing the distance between current and destination location in a variable
		$totalDistance = abs($d2['distance'] - $d1['distance']); 
		
		$_SESSION['total_distance'] = $totalDistance;
		$_SESSION['from'] = $position ;
		$_SESSION['to'] = $destination;
		$_SESSION['luggage'] = $luggage;

		//Creating variables to store total fare    
		$travel_fare = 0; $luggage_charge = 0;
		if($cabtype=="CedMini"){
			$travel_fare += 150; //booking charge
			if($totalDistance<=10)
		//for distance b/w locations is <=10km 
			$travel_fare += $totalDistance*14.5;
			else if($totalDistance>10 && $totalDistance<=60)
		//for 10km< distance <=60km the charge of first 10kms will be added directly(i.e.145) and the fare of the distance left after removing 10km from distance will be added
			$travel_fare += (($totalDistance-10)*13)+145;
			else if($totalDistance>60 && $totalDistance<=160)
		//for 60km< distance <=160km, as mentioned above, here the fare for first 10kms and next 50kms will be added directly(i.e.145+650)
			$travel_fare += (($totalDistance-60)*11.2)+145+650;
			else 
		//for 100km< distance, here the fare for first 10kms, next 50kms and next 100kms will be added directly(i.e.145+650+1120)
			$travel_fare += (($totalDistance-160)*9.5)+145+650+1120;
		}
		else if($cabtype=="CedRoyal"){
			$travel_fare += 200; //booking charge
			if($totalDistance<=10)
			$travel_fare += $totalDistance*15.5;
			else if($totalDistance>10 && $totalDistance<=60) 
			$travel_fare += (($totalDistance-10)*14)+155;
			else if($totalDistance>60 && $totalDistance<=160)
			$travel_fare += (($totalDistance-60)*12.2)+155+700;
			else
			$travel_fare += (($totalDistance-160)*10.5)+155+700+1220;
		}
		else if($cabtype=="CedSUV"){
			$travel_fare += 250; //booking charge
			if($totalDistance<=10)
			$travel_fare += $totalDistance*16.5;
			else if($totalDistance>10 && $totalDistance<=60)
			$travel_fare += (($totalDistance-10)*15)+165;
			else if($totalDistance>60 && $totalDistance<=160)
			$travel_fare += (($totalDistance-60)*13.2)+165+750;
			else
			$travel_fare += (($totalDistance-160)*11.5)+165+750+1320;
		}
		else {
			$travel_fare += 50; //booking charge
			if($totalDistance<=10)
			$travel_fare += $totalDistance*13.5;
			else if($totalDistance>10 && $totalDistance<=60)
			$travel_fare += (($totalDistance-10)*12)+135;
			else if($totalDistance>60 && $totalDistance<=160)
			$travel_fare += (($totalDistance-60)*10.2)+135+600;
			else
			$travel_fare += (($totalDistance-160)*8.5)+135+600+1020;
		}
		//Calculating fare for the luggage
		if($cabtype=="CedMini" || $cabtype=="CedRoyal"){
			if($luggage>0 && $luggage<=10)
				$luggage_charge = 50;
			else if($luggage>10 && $luggage<=20)
				$luggage_charge = 100;
			else if($luggage>20)
				$luggage_charge = 200;
		}
		else if($cabtype=="CedSUV"){
			if($luggage>0 && $luggage<=10)
				$luggage_charge = 100;
			else if($luggage>10 && $luggage<=20)
				$luggage_charge = 200;
			else if($luggage>20)
				$luggage_charge = 400;
		}
		//Now, adding the fare of travelling and the fare for luggage
		$total_fare = $travel_fare + $luggage_charge;
		$_SESSION['total_fare'] = $total_fare;
		return $total_fare;
	}

	public function insertRide($userid,$pickup,$destination,$luggage,$totalFare,$totalDistance,$con)
	{ 
		$query = "INSERT INTO `tbl_ride`(`ride_date`, `from_location`, `to_location`, `total_distance`, `luggage`, `total_fare`, `status`, `customer_user_id`) VALUES (now(),'".$pickup."','".$destination."','".$totalDistance."','".$luggage."','".$totalFare."','1','".$userid."')";    
        mysqli_query($con, $query);
        $success = "WAITING FOR ADMIN TO APPROVE YOUR RIDE !";
        return $success;
	}

	public function showPendingRides($con)
	{
		$query = "SELECT * FROM `tbl_ride` WHERE `status`='1'";
		$result = mysqli_query($con, $query);
		return $result;
	}

	public function showPendingRides1($id,$con)
	{
		$query = "SELECT * FROM `tbl_ride` WHERE `status`='1' && `customer_user_id`=$id";
		$result = mysqli_query($con, $query);
		return $result;
	}

	public function showCompletedRides($con)
	{
		$query = "SELECT * FROM `tbl_ride` WHERE `status`='2'";
		$result = mysqli_query($con, $query);
		return $result;
	}

	public function showCompletedRides1($id,$con)
	{
		$query = "SELECT * FROM `tbl_ride` WHERE `status`='2' && `customer_user_id`=$id";
		$result = mysqli_query($con, $query);
		return $result;
	}

	public function showCancelledRides($con)
	{
		$query = "SELECT * FROM `tbl_ride` WHERE `status`='0'";
		$result = mysqli_query($con, $query);
		return $result;
	}

	public function showAllRides($value,$con)
	{
		if($value=="")
		{
		$query = "SELECT * FROM `tbl_ride`";
		$result = mysqli_query($con, $query);
		return $result;
		}
		else if($value=="date"){
			$query = "SELECT * FROM `tbl_ride` ORDER BY `ride_date`";
	 		$result = mysqli_query($con, $query);
			return $result;
		}
		else if($value=="fare"){
			$query = "SELECT * FROM `tbl_ride` ORDER BY `total_fare` ASC";
	 		$result = mysqli_query($con, $query);
			return $result;
		}
	}
	
	public function showAllRides1($id,$con)
	{
		$query = "SELECT * FROM `tbl_ride` WHERE `customer_user_id`=$id";
		$result = mysqli_query($con, $query);
		return $result;
	}

	public function cancelRides($id,$con)
	{
		$query = "UPDATE `tbl_ride` SET `status`=".'0'." WHERE `ride_id`=".$id;
		$result = mysqli_query($con, $query);
	}

	public function completedRides($id,$con)
	{
		$query = "UPDATE `tbl_ride` SET `status`=".'2'." WHERE `ride_id`=".$id;
		$result = mysqli_query($con, $query);
	}
}

?>