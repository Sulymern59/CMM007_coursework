<?php session_start();
include ('../sessionerror.php');
include ('../includes/connec.inc.php');
// Checking first page values for empty,If it finds any blank field then redirected to first page.
if (isset($_POST['q1a'])&&isset($_POST['q1b'])&&isset($_POST['q1c'])&&isset($_POST['q1d'])&&isset($_POST['q1e'])&&isset($_POST['q2a'])||isset($_POST['q1com'])||isset($_POST['q2com'])){

 if (empty($_POST['q1a'])|| empty($_POST['q1b'])|| empty($_POST['q1c'])|| empty($_POST['q1d'])|| empty($_POST['q1e'])|| empty($_POST['q2a'])){ 
 // Setting error message
 //$_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
 echo "<script> alert('Mandatory field(s) are missing, Please fill it again');
                window.location='step2.php'
       </script>"; // Redirecting to first page 
 } 
 else {

		$_SESSION['POST']['q1a'] = mysqli_escape_string($conn, $_POST['q1a']);
		$_SESSION['POST']['q1b'] = mysqli_escape_string($conn,$_POST['q1b']);
		$_SESSION['POST']['q1c'] = mysqli_escape_string($conn,$_POST['q1c']);
		$_SESSION['POST']['q1d'] = mysqli_escape_string($conn,$_POST['q1d']);
		$_SESSION['POST']['q1e'] = mysqli_escape_string($conn,$_POST['q1e']);
		$_SESSION['POST']['q1com'] = mysqli_escape_string($conn,$_POST['q1com']);
		$_SESSION['POST']['q2a'] = mysqli_escape_string($conn,$_POST['q2a']);
		$_SESSION['POST']['q2com'] = mysqli_escape_string($conn,$_POST['q2com']);

foreach ($_POST as $key => $value) {
		 $_SESSION['POST'][$key] = $value;
		 
		 }

} 


} else {
 if (empty($_SESSION['error_page2'])) {
 header("location: step2.php");// Redirecting to first page.
 }
}?>