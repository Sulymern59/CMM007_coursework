<?php 

include ('form2.php');
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="css/table1css.css">
<link rel="stylesheet" type="text/css" href="css/table2css.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
				<li><a href="#">EAO's Feedback</a></li>
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
					<form class="form-group" method="POST" action="step4.php?exid=<?php echo $_GET['exid'];?>">
						<fieldset>
						<legend><strong>PART 2: THE IMPACT OF THE RESEARCH</strong></legend>
						<div class="form-group">
						<div>
						<h4 style="float: right; margin-left: 10px">NO</h4></div>
						<div><h4 style="float: right;">YES</h4></div>
						<div class="form-group"><label> 3) In the process of doing the research, is there any potential for harm to be done to, or costs to be imposed on:
						<a href="#">[see Guidance Note 3(i)]</a></label>
						</div>
						<div class="form-group"><p>(a)	research participants?<input type="radio" name="q3a" value="NO" style="float: right"><input type="radio" name="q3a" value="YES" style="float: right; margin-right: 30px"></p></div>
						<div class="form-group"><p>(b)	research subjects? [see Guidance Note 3(ii)]<input type="radio" name="q3b" value="NO" style="float: right;"><input type="radio" name="q3b" value="YES" style="float: right; margin-right: 30px"></p></div>
						<div class="form-group"><p>(c)	you, as the researcher?<input type="radio" name="q3c" value="NO" style="float: right;"><input type="radio" name="q3c" value="YES" style="float: right; margin-right: 30px"></p></div>
						<div class="form-group"><p>(d)	third parties? [see Guidance Note 3(iii)]<input type="radio" name="q3d" value="NO" style="float: right;"><input type="radio" name="q3d" value="YES" style="float: right; margin-right: 30px"></p></div><br>
						<div class="form-group">
						<h5>Please provide further details:</h5>
						<textarea rows="5" cols="142" name="q3com">

						</textarea></div>
						
						<hr>


						<div class="form-group">
						<div class="form-group">
						<h4 style="float: right; margin-left: 10px">NO</h4></div>
						<div class="form-group"><h4 style="float: right;">YES</h4></div>
						<div class="form-group"><label>4) When the research is complete, could negative consequences follow:</label>
						</div>
						<div class="form-group"><p>(a)	for research subjects<input type="radio" name="q4a" value="NO" style="float: right"><input type="radio" name="q4a" value="YES" style="float: right; margin-right: 30px"></p></div>
						<div><p>(b)    or elsewhere? [see Guidance Note 4]<input type="radio" name="q4b" value="NO" style="float: right;"><input type="radio" name="q4b" value="YES" style="float: right; margin-right: 30px"></p></div>	<br>
						<div class="form-group"><h5>Please state what you believe are the consequences of the research:</h5>
						<textarea rows="5" cols="142" name="q4com"></textarea>
						</div>
						</div>
						</fieldset>
						<fieldset style="float: right;">
							<div>
							<a href="step2.php" class="btn btn-primary">Previous</a>
							<span>2 of 4</span>
							<input type="submit" name="submit" value="Next" class="btn btn-primary"> 
							</div>
						</fieldset>
					</form> 
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