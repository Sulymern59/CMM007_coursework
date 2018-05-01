<?php
 include ('form3.php');
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
					<form class="form-group" method="POST" action="step5.php?exid=<?php echo $_GET['exid'];?>">
						<fieldset>
						<legend><strong>PART 3: ETHICAL PROCEDURES</strong></legend>
						<div class="form-group">
						<div class="form-group">
						<h4 style="float: right; margin-left: 10px">NO</h4></div>
						<div class="form-group"><h4 style="float: right;">YES</h4></div>
						<div class="form-group"><label> 5) Does the research require informed consent or approval from:
						<a href="#">[see Guidance Note 5(i)]</a></label>
						</div>
						<div class="form-group">(a)	research participants?<input type="radio" name="q5a" value="NO" style="float: right"><input type="radio" name="q5a" value="YES" style="float: right; margin-right: 30px"></div>
						<div class="form-group">(b)	research subjects? [see Guidance Note 5(ii)]<input type="radio" name="q5b" value="NO" style="float: right;"><input type="radio" name="q5b" value="YES" style="float: right; margin-right: 30px"></div>
						<div class="form-group">(c)	external bodies? [see Guidance Note 5(iii)]<input type="radio" name="q5c" value="NO" style="float: right;"><input type="radio" name="q5c" value="YES" style="float: right; margin-right: 30px"></div>
						<div class="form-group"><h5>If you answered yes to any of the above, please explain your answer:</h5>
						<textarea rows="5" cols="142" name="q5com"></textarea></div>
						
						<hr>

						<div class="form-group">
						<label style="float: right;">NO</label>
						<input type="radio" name="q6a" value="YES" style="float: right; margin-left: 10px;">
						<label style="float: right;">YES</label>
						<input type="radio" name="q6a" value="NO" style="float: right;"></div>
						<label>6) Are there reasons why research subjects may need safeguards or protection?</label>		
						<br>
						<a href="#">[see Guidance Note 6]</a>	
						<div class="form-group"><h5>If you answered yes to the above, please state the reasons and indicate the measures to be taken to address them:</h5>
						<textarea rows="5" cols="142" name="q6com"></textarea>
						</div>
						</div>

						<hr>
						<div class="form-group"> 
						<label style="float: right;">NO</label>
						<input type="radio" name="q7" value="YES" style="float: right; margin-left: 10px;">
						<label style="float: right;">YES</label>
						<input type="radio" name="q7" value="NO" style="float: right;"></div>
						<label> 7) Does the research involve any “regulated work with children” and/or “regulated work with protected adults”, <br>therefore requiring membership of the Protecting Vulnerable Groups (PVG) Scheme?<a href="#"> [see Guidance Note 7]</a></label>
						
						<br><br>
						<div>[Please note: if the research potentially involves “regulated work”, this MUST be raised with your HR Business Partner immediately. In this instance, the Human Resources Department will conduct a detailed assessment and will confirm whether or not PVG Membership is required.]</div><br>
						
						<div class="form-group">(a)	PVG membership is not required.<input type="radio" name="q7a" value="NO" style="float: right"><input type="radio" name="q7a" value="YES" style="float: right;  margin-right: 30px"></div>
						<div class="form-group">(b)	PVG membership may be required for working with children.<input type="radio" name="q7b" value="NO" style="float: right;"><input type="radio" name="q7b" value="YES" style="float: right;  margin-right: 30px"></div>
						<div class="form-group">(c)	PVG membership may be required for working with protected adults.<input type="radio" name="q7c" value="NO" style="float: right;"><input type="radio" name="q7c" value="YES" style="float: right;  margin-right: 30px"></div>
						<div class="form-group">(d)	PVG membership may be required for working with both children and protected adults.<input type="radio" name="q7d" value="NO" style="float: right;"><input type="radio" name="q7d" value="YES" style="float: right;  margin-right: 30px"></div><hr>
						<label>If you answered yes to (b), (c) or (d) above, please give further information about the work you will be required to undertake and the nature of the contact with these groups. Please provide as much detail as possible:</label>
						<textarea rows="5" cols="142" name="q7com"></textarea><br><hr>
						<div class="form-group"><label style="float: right;">NO</label>
						<input type="radio" name="q7mem" value="YES" style="float: right; margin-left: 10px;">
						<label style="float: right;">YES</label>
						<input type="radio" name="q7mem" value="NO" style="float: right;"></div>
						<div class="form-group"><label>Are you already a PVG member?</label>		
						<br>
						<label>If yes, please provide your PVG Scheme number:</label><input type="text" name="q7pvg" size="50"></div>
						<hr>
						<div class="form-group">
						<label style="float: right;">NO</label>
						<input type="radio" name="q8a" value="YES" style="float: right; margin-left: 10px;">
						<label style="float: right;">YES</label>
						<input type="radio" name="q8a" value="NO" style="float: right;">
						<label>8) Are specified procedures or safeguards required for recording, management, or storage of data? 
						<br>
						<a href="#">[see Guidance Note 8]</a>
						</label>
						<h5>Please provide further details:</h5>
						<textarea rows="5" cols="142" name="q8com"> </textarea>
						</div>

						<hr>
						</fieldset>
						<fieldset style="float: right;">
							<div>
							<a href="step3.php" type="submit" class="btn btn-primary">Previous</a>
							<span>3 of 4</span>
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