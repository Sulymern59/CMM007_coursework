
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="studentdashboard.php">
				STUDENT'S DASHBOARD

			</a>
		</div>
		<div class="collapse navbar-collapse">			
			<ul class="nav navbar-nav navbar-right">
				<li><a style="color: black;" class="btn" href="logout.php"><strong>LOGOUT</strong></a></li>
			</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
		<div class="col-md-2 sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="studentdashboard.php">Home</a></li>
				<li class="active"><a href="addexp.php">My Experiments</a></li>
				<li><a href="#">EAO's Feedback</a></li>
				<li><a href="upload.php">Uploads</a></li>
			</ul>
		</div>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><strong>NEW EXPERIMENT</strong></h4>
                </div>
				<div class="panel-body">
				<form class="form-group" action="expform.php" method="POST" name= "form">
				<fieldset>
				<div class="form-group">
				  <label class="control-label" for="textinput">Experiment Name</label>  
				  <input name="expname" type="text" class="form-control input-md" required="1">
				  </div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="control-label" for="textinput">Student Name</label>  
				  <input name="studentname" type="text" class="form-control input-md" required="1">
				  
				</div>
				<!-- Text input-->
				<div class="form-group">
				  <label class="control-label" for="textinput">Project Title</label>  
				  <input name="proj" type="text"  class="form-control input-md" required="1">
				  </div>

				<!-- Reg No. input-->
				<div class="form-group">
				  <label class="control-label" for="reginput">Course of Study</label>  
				 <input name="course" type="text"  id= "regstud" class="form-control input-md" required="1">
				</div>
				<!-- Text input-->
				<div class="form-group">
				  <label class="control-label" for="email">Department</label> 
				  <input name="dept" type="text" class="form-control input-md" required="1">
				  </div>
				<!-- Button -->
				<div class="form-group">
				  <label class="control-label" for="singlebutton"></label>
				  <div class="control-label">
				    <button name="submit" type= "submit" class="btn btn-primary">Create</button>
				  </div>
				</div>

				</fieldset>
</form>
</div>
</div>	
						
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