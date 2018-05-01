<?php
session_start();
include ('../sessionerror.php');
include ('../includes/connec.inc.php');
$exid = $_GET['exid'];
// Checking first page values for empty,If it finds any blank field then redirected to first page.
if (isset($_POST['submit'])) {

if (isset($_POST['q9a'])&&isset($_POST['q10a'])&&isset($_POST['q11a'])||isset($_POST['q9com'])||isset($_POST['q10com'])||isset($_POST['q11com'])){

 if (empty($_POST['q9a'])|| empty($_POST['q10a'])|| empty($_POST['q11a'])){ 
 // Setting error message
 $_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
 header("location: submit.php"); // Redirecting to first page 
 } else {

$_SESSION['POST']['q9a'] = mysqli_escape_string($conn, $_POST['q9a']);
$_SESSION['POST']['q9com'] = mysqli_escape_string($conn, $_POST['q9com']);
$_SESSION['POST']['q10a'] = mysqli_escape_string($conn, $_POST['q10a']);
$_SESSION['POST']['q10com'] = mysqli_escape_string($conn, $_POST['q10com']);
$_SESSION['POST']['q11a'] = mysqli_escape_string($conn, $_POST['q11a']);
$_SESSION['POST']['q11com'] = mysqli_escape_string($conn, $_POST['q11com']);

foreach ($_POST as $key => $value) {
 $_SESSION['POST'][$key] = $value;
 }
 extract($_SESSION['POST']); // Function to extract array.
 $query = "INSERT INTO `ethicsform`(`q1a`, `q1b`, `q1c`, `q1d`, `q1e`, `q1com`, `q2a`, `q2com`, `q3a`, `q3b`, `q3c`, `q3d`, `q3com`, `q4a`, `q4b`, `q4com`, `q5a`, `q5b`, `q5c`, `q5com`, `q6a`, `q6com`, `q7`, `q7a`, `q7b`, `q7c`, `q7d`, `q7com`, `q7mem`, `q7pvg`, `q8a`, `q8com`, `q9a`, `q9com`, `q10a`, `q10com`, `q11a`, `q11com`,`exid`) VALUES ('$q1a','$q1b','$q1c','$q1d','$q1e','$q1com','$q2a','$q2com','$q3a','$q3b','$q3c','$q3d','$q3com','$q4a','$q4b','$q4com','$q5a','$q5b','$q5c','$q5com','$q6a','$q6com','$q7','$q7a','$q7b','$q7c','$q7d','$q7com','$q7mem','$q7pvg','$q8a','$q8com','$q9a','$q9com','$q10a','$q10com','$q11a','$q11com','$exid')";

 if ($conn->query($query) === TRUE) {

 header("location: submit.php?msg=run");
 } else {
 echo mysqli_error($conn);
 } 
 unset($_SESSION['POST']); // Destroying session.

}
} else {
 echo "Error updating database!"; // Redirecting to first page.
 }
}