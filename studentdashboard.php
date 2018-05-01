<?php
include ('includes/connec.inc.php');
session_start(); 
  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: studentlogin.php');
  }
  $sql = "SELECT lastname, regno FROM studentuser WHERE email = '" . $_SESSION['email'] . "'";
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
		<a class="navbar-brand" href="studentdashboard.php">
		STUDENT DASHBOARD <strong><?php echo "(". $row['lastname']. " , " . $row['regno']. " )";?></strong>	
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
				<li class="active"><a href="studentdashboard.php" style="background-color: purple;color: white">Home</a></li>
				<li><a href="addexp.php">My Experiments</a></li>
				<li><a href="#">EAO's Feedback</a></li>
				<li><a href="manageuploads.php?exid=<?php echo $exid ?>">Manage Uploads</a></li>
				
			</ul>
		</div>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #eaceed;">
              
                 <h4><strong>RESEARCH ETHICS: RESEARCH STUDENT AND SUPERVISOR ASSESSMENT (RESSA)</strong></h4>
                </div>
                <div class="panel-body">

                    <h5>The aim of the University’s <a href="http://www.rgu.ac.uk/research-ethics-policy">Research Ethics Policy</a> is to establish and promote good ethical practice in the conduct of academic research. This self assessment is intended to enable researchers to undertake an initial self-assessment of ethical issues in their research.
					<br><br>Ethical conduct is not primarily a matter of following fixed rules; it depends on researchers developing a considered, flexible and thoughtful practice.
					This self assessment aims to engage researchers discursively with the ethical dimensions of their work and potential ethical issues, and the main focus of any subsequent review is not to ‘approve’ or ‘disapprove’ of a project but to make sure that this process has taken place.
					<br><br>The Research Ethics Policy is available at <a href="http://www.rgu.ac.uk/research-ethics-policy">Research Ethics Policy</a>.</h5>
					<br><br><br>
					
					<h5>Click on the '<strong>Create New Experiment</strong>' tab by the left to get started with your experiment.</h5>
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