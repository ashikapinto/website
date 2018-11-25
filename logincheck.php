<?php

$dbuser = "root";
	$dbpass = "";
	$dbhost = "localhost:3306";
	$dbname = "ashika";

	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	if($connection){
		echo "Connected to DATABASE<br>";
	}
	else{
		echo "NOT CONNECTED TO DATABASE<br>";
	}


   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myemail = mysqli_real_escape_string($connection,$_POST['email']);
      $mypassword = mysqli_real_escape_string($connection,$_POST['pass']); 
      
      $sql = "SELECT * FROM details WHERE email = '$myemail' and password = '$mypassword'";
     /* $result = mysqli_query($connection,$sql);
      $row = mysqli_fetch_array(MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);*/
	   
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
      

		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myemail;
                  $msg = "Hi ".$_SESSION['login_user']."  Make your dream trip happen here!";
echo "<script type='text/javascript'>alert('$msg');
window.location.href='packages.html';</script>";
      }else {
         $error = "Your Login Name or Password is invalid";
echo "<script type='text/javascript'>alert('$error');
window.location.href='login.html';</script>";
      }
   }
?>
<