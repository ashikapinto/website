
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

	
$sql="CREATE TABLE ashika.DETAILS(
NAME VARCHAR(50) NOT NULL,
EMAIL VARCHAR(40) NOT NULL,
PASSWORD VARCHAR(40) NOT NULL,
PRIMARY KEY(NAME) )";
 
$result = mysqli_query($connection,$sql);
if($result){
		echo "yes<br>";
	}
else{
		echo "no<br>";
	}
	

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['username'];
		$email = $_POST['email'];
		$psw = $_POST['psw'];
		
		print("Elements collected<br>");
		print_r($_POST);
		print("<br>");
	}
else{
		echo "Elements could not be collected<br>";
	}

	
	$sql = "INSERT ashika.DETAILS(NAME,EMAIL,PASSWORD)
	VALUES('$name','$email','$psw')";

	$result = mysqli_query($connection,$sql);
	if($result){
		echo "ROW IS INSERTED<br>";
	}
	else{
		echo "ROW COULD NOT BE INSERTED<br>";
	}
	
	
	$sql = "SELECT * FROM ashika.DETAILS";
	$result = mysqli_query($connection,$sql);

	echo "<table style='border:2px solid black;'><tr><th>NAME</th><th>EMAIL</th><th>PASSWORD</th></tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>$row[NAME]</td>";
		echo "<td>$row[EMAIL]</td>";
		echo "<td>$row[PASSWORD]</td>";
		echo "</tr>";
	}
	echo "</table>";
	$message = "Account created,you will be redirected to login page";
echo "<script type='text/javascript'>alert('$message');
window.location.href='login.html';</script>";
	
	//header("location: login.html");
	
	


 
?>