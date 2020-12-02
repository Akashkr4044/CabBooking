<?php  
class DBConnection {	
	protected $dbhost = "localhost";
	protected $dbuser = "root";
	protected $dbpass = "";
	protected $dbname = "CAB";
	
	// Open a connect to the database.
	// Make sure this is called on every page that needs to use the database.
	
  public function connect(){
    $conn = mysqli_connect("localhost","root","","CAB") or die("Couldn't connect");
    return $conn;
  }
}   
?>
