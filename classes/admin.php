<?php

class admin{
	public function updatePass($id,$oldPassword,$newPassword,$con)
	{	
		$oldPassword = md5($oldPassword);

		$query1 = "SELECT `password` from `tbl_user` WHERE `user_id`='".$id."'"; 
		$result1 = mysqli_query($con, $query1);
		$pass_chk = mysqli_fetch_assoc($result1);

		if($pass_chk['password']==$oldPassword)
		{
		$newPassword = md5($newPassword);
		$query2 = "UPDATE `tbl_user` SET `password`='".$newPassword."' WHERE `user_id`='".$id."'";    
		$result2 = mysqli_query($con, $query2);
		
        $success = "PASSWORD UPDATED SUCCESSFULLY...!!";
		return $success;
		}
		else return "YOUR OLD PASSWORD IS INCORRECT !!";
	}

	public function showBlocked($con)
	{
		$query = "SELECT * FROM `tbl_user` WHERE `isblock`='0'";
		$result = mysqli_query($con, $query);
		return $result;	
	}

	public function showUnblocked($con)
	{
		$query = "SELECT * FROM `tbl_user` WHERE `isblock`='1'";
		$result = mysqli_query($con, $query);
		return $result;	
	}

	public function showAllusers($value,$con)
	{
		if($value=="")
		{
		$query = "SELECT * FROM `tbl_user`";
		$result = mysqli_query($con, $query);
		return $result;
		}
		else if($value=="date")
		{
			$query = "SELECT * FROM `tbl_user` ORDER BY `dateofsignup`";
	 		$result = mysqli_query($con, $query);
			return $result;
		}	
	}

	public function blockUnblock($id,$check,$con)
	{
		if($check==0) 
			$check=1;
		else $check=0;
		$query = "UPDATE `tbl_user` SET `isblock`='".$check."' WHERE `user_id`='".$id."'";
		$result = mysqli_query($con, $query);
	}
}
