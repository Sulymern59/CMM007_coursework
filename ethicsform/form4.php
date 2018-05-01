<?php
session_start();
include ('../sessionerror.php');
include ('../includes/connec.inc.php');
// Checking first page values for empty,If it finds any blank field then redirected to first page.
if (isset($_POST['q5a'])&&isset($_POST['q5b'])&&isset($_POST['q5c'])&&isset($_POST['q6a'])&&isset($_POST['q7'])&&isset($_POST['q7a'])&&isset($_POST['q7b'])&&isset($_POST['q7c'])&&isset($_POST['q7d'])&&isset($_POST['q8a'])||isset($_POST['q5com'])||isset($_POST['q6com'])||isset($_POST['q7com'])||isset($_POST['q7mem'])||isset($_POST['q7pvg'])||isset($_POST['q8com'])){

 if (empty($_POST['q5a'])|| empty($_POST['q5b'])|| empty($_POST['q5c'])|| empty($_POST['q6a'])|| empty($_POST['q7'])|| empty($_POST['q7a'])|| empty($_POST['q7b'])|| empty($_POST['q7c'])|| empty($_POST['q7d'])|| empty($_POST['q7pvg'])|| empty($_POST['q8a'])){ 
 // Setting error message
 $_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
 header("location: step4.php"); // Redirecting to first page 
 } else {

$_SESSION['POST']['q5a'] = mysqli_escape_string($conn, $_POST['q5a']);
$_SESSION['POST']['q5b'] = mysqli_escape_string($conn, $_POST['q5b']);
$_SESSION['POST']['q5c'] = mysqli_escape_string($conn, $_POST['q5c']);
$_SESSION['POST']['q5com'] = mysqli_escape_string($conn, $_POST['q5com']);
$_SESSION['POST']['q6a'] = mysqli_escape_string($conn, $_POST['q6a']);
$_SESSION['POST']['q6com'] = mysqli_escape_string($conn, $_POST['q6com']);
$_SESSION['POST']['q7'] = mysqli_escape_string($conn, $_POST['q7']);
$_SESSION['POST']['q7a'] = mysqli_escape_string($conn, $_POST['q7a']);
$_SESSION['POST']['q7b'] = mysqli_escape_string($conn, $_POST['q7b']);
$_SESSION['POST']['q7c'] = mysqli_escape_string($conn, $_POST['q7c']);
$_SESSION['POST']['q7d'] = mysqli_escape_string($conn, $_POST['q7d']);
$_SESSION['POST']['q7com'] = mysqli_escape_string($conn, $_POST['q7com']);
$_SESSION['POST']['q7mem'] = mysqli_escape_string($conn, $_POST['q7mem']);
$_SESSION['POST']['q7pvg'] = mysqli_escape_string($conn, $_POST['q7pvg']);
$_SESSION['POST']['q8a'] = mysqli_escape_string($conn, $_POST['q8a']);
$_SESSION['POST']['q8com'] = mysqli_escape_string($conn, $_POST['q8com']);

foreach ($_POST as $key => $value) {
 $_SESSION['POST'][$key] = $value;
 
 }

} 
} else {
 if (empty($_SESSION['error_page4'])) {
 header("location: step4.php");// Redirecting to first page.
 }
}