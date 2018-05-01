<?php
session_start();
include ('../sessionerror.php');
include ('../includes/connec.inc.php');
if (isset($_GET['exid'])) {
    $exid = $_GET['exid'];	# code...
}


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
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!------ Include the above in your HEAD tag ---------->

<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="studentdashboard.php">
				<h4><strong>STUDENT DASHBOARD</strong></h4>
			</a>
		</div>
		
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
		<div class="col-md-2 sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="../studentdashboard.php">Home</a></li>
				<li class="active"><a href="../addexp.php">My Experiments</a></li>
				<li><a href="#">Uploads</a></li>
				<li><a href="../logout.php">LOGOUT</a></li>
			</ul>
		</div>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><strong>NEW EXPERIMENT ETHICS FORM</strong></h4>
                </div>
                <div class="panel-body">
					<span style="color: green; text-align: center;"><?php
							      if(isset($_GET['msg']) && !empty($_GET['msg']))

							      {
							        echo "<h3>Ethics form submitted Successfully!</h3>";
							      }
							?> </span> 
							<span style="color: red; text-align: left;"><?php
							      if(isset($_GET['msg2']) && !empty($_GET['msg2']))
							      	
							      {
							        echo "<h3>Ethics form submission failed!</h3>";
							      }
							?> </span> 
                </div>
            </div>
		</div>
		<div class="container-fluid">
		<footer class="pull-left footer">
			<p>
				<hr class="divider">
				Copyright &COPY; 2018 <a href="index.php">Project Ethical Approval System</a>
			</p>
		</footer>
	</div>