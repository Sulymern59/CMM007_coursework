<?php
include ('includes/connec.inc.php');

session_start(); // Starting Session
$error = ''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "email or Password is invalid";
}
else
{
// Define $email and $password
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password_1 = mysqli_real_escape_string($conn,$_POST['password']);
$password = md5($password_1);

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT email, password from studentuser where email=? AND password=? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$stmt->bind_result($email, $password);
$stmt->store_result();

if($stmt->fetch()) //fetching the contents of the row
        {
     	 	$_SESSION['email'] = $email;
  	  		header('location: studentdashboard.php'); // Redirecting To Profile Page	

			$sql = "SELECT lastname, regno FROM studentuser WHERE email = '" . $_SESSION['email'] . "'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result);
         }    
else {
       $error = "email or Password is invalid";
     }
mysqli_close($conn); // Closing Connection
}
}
?>

