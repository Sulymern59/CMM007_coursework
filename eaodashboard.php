<?php
include ('includes/connec.inc.php');
session_start(); 
  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: eaologin.php');
  }

$sql = "SELECT lastname, staffno FROM eaouser WHERE email = '" . $_SESSION['email'] . "'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			
			<a class="navbar-brand" href="#">
				EXPERIMENT APPROVAL OFFICER'S DASHBOARD <strong><?php echo "( Welcome,   " . $row['lastname']. " )";?></strong>
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">			
			<ul class="nav navbar-nav navbar-right">
				<li><a style="color: black;" class="btn" href="logout.php"><strong>LOGOUT</strong></a></li>
				
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
		<div class="col-md-2 sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li class="active"><a href="#" style="background-color: purple;color: white">Home</a></li>
				<li><a href="viewexp.php">Assigned Experiments</a></li>
			</ul>
		</div>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#eaceed;color: black">
                    <h4><strong>RESEARCH ETHICS: RESEARCH STUDENT AND SUPERVISOR ASSESSMENT (RESSA)</strong></h4>
                </div>
                <div class="panel-body">
                    <h4>Experiment Approval Officers should be able to view experiments that have been assigned to them, give comments on an experiment, and finally decide whether to grant ethical approval for a project.</h4>
					<br><br><br>

					<h5>Click on the '<strong>Experiments</strong>' tab by the left to view and asses students experiments.</h5>
                </div>
            </div>
		</div>
		<footer class="pull-left footer">
			<p class="col-md-12">
				<hr class="divider">
				Copyright &COPY; 2018 <a href="index.php">Project Ethical Approval System</a>
			</p>
		</footer>
	</div>