<?php

class user{

	public function login($user_name,$password,$con)
	{
		if($user_name=="" || $password==""){
			$error = "NO FIELD MUST BE EMPTY...!!";
			return $error;
		}
		$password = md5($password);
		$query = "SELECT `user_id`,`user_name`,`name`,`password`,`isblock`,`is_admin` FROM `tbl_user` WHERE `user_name`='$user_name' and `password`='$password' LIMIT 1";
		$result = mysqli_query($con, $query);
		$user_chk = mysqli_fetch_assoc($result);
		
		if(mysqli_num_rows($result) > 0) {
			if($user_chk['user_name']==$user_name && $user_chk['password']==$password && $user_chk['is_admin']=='1')
			{
				$_SESSION['user_id'] = $user_chk['user_id'];
				$_SESSION['check'] = "true" ;
				if(isset($_POST['user_id'])){
					setcookie('admin',$user_name,time()+60*60*7);
					setcookie('pass',$password,time()+60*60*7);
				}
				header("location:admin/dashboard.php");
			}
			else if($user_chk['user_name']==$user_name && $user_chk['password']==$password && $user_chk['is_admin']=='0') 
			{
				$_SESSION['login'] = $user_chk['user_name'];
				$_SESSION['isblock'] = $user_chk['isblock'];
				if($_SESSION['isblock']==1){
					$_SESSION['user_id'] = $user_chk['user_id'];
					$_SESSION['name'] = $user_chk['name'];
					if(isset($_POST['user_id'])){
						setcookie('username',$user_name,time()+60*60*7);
						setcookie('password',$password,time()+60*60*7);
					}
					header("Location: dashboard.php");
				}
				else {
					$error = "HELLO - `".$_SESSION['login']."` WAITING FOR ADMIN TO APPROVE YOUR REQUEST...!!";
					return $error;
				}
			}
		}
		else
		{
			$error = "USERNAME OR PASSWORD IS INCORRECT...!!";
			return $error;
		}
    }	
    
	public function register($username,$name,$mobileNum,$password,$repassword,$con)
	{
        if($name=="" || $username=="" || $password=="" || $repassword=="" || $mobileNum=="")
            {
                $error = "NO FIELD MUST BE EMPTY...!!";
			    return $error;
            }

        $query = "SELECT * FROM tbl_user WHERE user_name='$username' LIMIT 1";
        $result = mysqli_query($con, $query);
        $user_chk = mysqli_fetch_assoc($result);

        if ($user_chk) { // if user exists
            if ($user_chk['user_name'] === $username) {
                $error = "USERNAME ALREADY EXISTS...!!";
                return $error;
            }
        }

        $query = "INSERT INTO tbl_user (user_name,name,dateofsignup,mobile,isblock,password,is_admin) 
        VALUES ('".$username."','".$name."',now(),'".$mobileNum."','0','".md5($password)."','0')";    
        mysqli_query($con, $query);
        $success = "REGISTRATION SUCCESSFUL...!!";
        return $success;
	}

	public function showDetails($id,$con)
	{
		$query = "SELECT `user_name`,`name`,`password`,`mobile` FROM `tbl_user` WHERE `user_name`='".$id."' LIMIT 1";    
		$result = mysqli_query($con, $query);
		$user_chk = mysqli_fetch_assoc($result);
		return $user_chk;
	}

	public function updateDetails($id,$name,$mobile,$con)
	{	
		$query = "UPDATE `tbl_user` SET `name`='".$name."', `mobile`='".$mobile."' WHERE `user_name`='".$id."'";    
        $result = mysqli_query($con, $query);
        $success = "PROFILE UPDATED SUCCESSFULLY...!!";
		return $success;
	}

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
		
        header("location: logout.php");
		}
		else return "YOUR OLD PASSWORD IS INCORRECT !!";
	}
}

?>