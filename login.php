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
$query = "SELECT email, password from adminuser where email=? AND password=? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$stmt->bind_result($email, $password);
$stmt->store_result();

if($stmt->fetch()) //fetching the contents of the row
        {
          $_SESSION['email'] = $email; // Initializing Session
          header('location: admindashboard.php'); // Redirecting To Profile Page
        }
else {
       $error = "email or Password is invalid";
     }
mysqli_close($conn); // Closing Connection
}
}
?>

