<?php

class location{
	public function addLocation($lname,$distance,$con)
	{
		$query = "INSERT INTO `tbl_location` (`name`, `distance`, `is_available`) VALUES ('".$lname."','".$distance."','1')";    
        mysqli_query($con, $query);
        $success = "LOCATION ADDED SUCCESSFULLY !";
        return $success;
	}

	public function showLocation($con)
	{
		$query = "SELECT * FROM `tbl_location` ORDER BY `distance` ASC";
		$result = mysqli_query($con, $query);
		return $result;
	}

	public function editLocation($id,$name,$distance,$con)
	{
		$query = "UPDATE `tbl_location` SET `name`='".$name."', `distance`='".$distance."' WHERE `id`='".$id."'";    
		mysqli_query($con, $query);
	}

	public function deleteLocation($id,$con)
	{
		$query = "DELETE FROM `tbl_location` WHERE `id`=$id";
		mysqli_query($con, $query);
	}
}

?>