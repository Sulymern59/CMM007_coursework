<?php
include ('includes/connec.inc.php');

$studreg = ''; 
if( isset( $_POST['regno'])) {
    $studreg = $_POST['regno']; 
}

$check = mysqli_query ($conn, "SELECT regno FROM regstud WHERE regno='$studreg'");

$check_num_rows = mysqli_num_rows ($check);
 if ($studreg==NULL)

	echo "";

	elseif (strlen($studreg)<7) {
		echo "<strong>Too short!<strong>";
	}
	else {

		if ($check_num_rows==0)
			echo "<strong>Not Registered!</strong>";
		elseif ($check_num_rows==1) {
			echo "<strong>Registered!</strong>";
		}
	}  
