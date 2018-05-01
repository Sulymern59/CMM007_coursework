<?php
session_start();
include ('../sessionerror.php');
include ('../includes/connec.inc.php');
// Checking first page values for empty,If it finds any blank field then redirected to first page.
if (isset($_POST['q3a'])&&isset($_POST['q3b'])&&isset($_POST['q3c'])&&isset($_POST['q3d'])&&isset($_POST['q4a'])&&isset($_POST['q4b'])||isset($_POST['q3com'])||isset($_POST['q4com'])){

 if (empty($_POST['q3a'])|| empty($_POST['q3b'])|| empty($_POST['q3c'])|| empty($_POST['q3d'])|| empty($_POST['q4a'])|| empty($_POST['q4b'])){ 
 // Setting error message
 $_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
 header("location: step3.php"); // Redirecting to first page 
 } else {

$_SESSION['POST']['q3a'] = mysqli_escape_string($conn, $_POST['q3a']);
$_SESSION['POST']['q3b'] = mysqli_escape_string($conn, $_POST['q3b']);
$_SESSION['POST']['q3c'] = mysqli_escape_string($conn, $_POST['q3c']);
$_SESSION['POST']['q3d'] = mysqli_escape_string($conn, $_POST['q3d']);
$_SESSION['POST']['q3com'] = mysqli_escape_string($conn, $_POST['q3com']);
$_SESSION['POST']['q4a'] = mysqli_escape_string($conn, $_POST['q4a']);
$_SESSION['POST']['q4b'] = mysqli_escape_string($conn, $_POST['q4b']);
$_SESSION['POST']['q4com'] = mysqli_escape_string($conn, $_POST['q4com']);

foreach ($_POST as $key => $value) {
 $_SESSION['POST'][$key] = $value;
 
 }

} 
} else {
 if (empty($_SESSION['error_page3'])) {
 header("location: step3.php");// Redirecting to first page.
 }
}
