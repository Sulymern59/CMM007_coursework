<?php

include ('includes/connec.inc.php');
session_start();// Starting Session

// Storing Session
$user_check = $_SESSION['studentuser'];

// SQL Query To Fetch Complete Information Of User
$query = "SELECT email from studentuser where email = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['email'];
?>