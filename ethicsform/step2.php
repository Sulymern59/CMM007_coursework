<?php 
session_start();
Include ('../sessionerror.php');
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
					<form class="form-group" method="POST" action="step3.php?exid=<?php echo $_GET['exid'];?>">
						<fieldset>
						<legend><strong>PART 1: DESCRIPTIVE QUESTIONS</strong></legend>
						<div class="form-group">
						<div>
						<h4 style="float: right; margin-left: 10px">NO</h4></div>
						<div><h4 style="float: right;">YES</h4></div>
						<div class="form-group"><label> 1) Does the research involve, or does information in the research relate to:<br>
						<a href="#" data-toggle="modal" data-target="#exampleModalLong">[see Guidance Note 1]</a></label>

						<!-- Button trigger modal -->
<!-- Modal -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Guidance Note 1</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
<p>Ethical principles normally apply to information, data, and derivative substances in the same way as they apply to the subjects themselves. Consequently, work with individual financial data is governed by the principles of work with individual human subjects, and work with animal tissue is governed by the principles of work with animals.</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

						</div>
						<div class="form-group"><p>(a)	individual human subjects<input type="radio" name="q1a" value="NO" style="float: right"><input type="radio" name="q1a" value="YES" style="float: right;  margin-right: 30px"> </p></div>
						<div class="form-group"> <p>(b)	groups (e.g. families, communities, crowds)<input type="radio" name="q1b" value="NO" style="float: right;"><input type="radio" name="q1b" value="YES" style="float: right;  margin-right: 30px"></p></div>
						<div class="form-group"><p>(c)	organisations<input type="radio" name="q1c" value="NO" style="float: right;"><input type="radio" name="q1c" value="YES" style="float: right;  margin-right: 30px"></p></div>
						<div class="form-group"><p>(d)	animals?<input type="radio" name="q1d" value="NO" style="float: right;"><input type="radio" name="q1d" value="YES" style="float: right;  margin-right: 30px"></p></div>
						<div class="form-group"><p>(e)	genetically-modified organisms <a href="www.rgu.ac.uk/hr/healthsafety/page.cfm?pge=26027#122628">Guide</a><input type="radio" name="q1e" value="NO" style="float: right;"><input type="radio" name="q1e" value="YES" style="float: right;  margin-right: 30px"> </p></div>
						<h5>Please provide further details:</h5>
						<textarea rows="5" cols="142" name="q1com"></textarea>
						<hr>
						<div class="form-group">
						<div class="form-group"><label style="float: right;">NO</label>
						<input type="radio" name="q2a" value="NO" style="float: right; margin-left: 10px;"></div>
						<div class="form-group"></div><label style="float: right;">YES</label>
						<input type="radio" name="q2a" value="YES" style="float: right;"></div>
						<label>2) Will the research deal with information which is private or confidential?		
						<br>
						<a href="#" data-toggle="modal" data-target="#exampleModalLong2">[see Guidance Note 2]</a></label>

						<!-- Modal -->
<div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Guidance Note 2</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
<p>The Australian National Health and Medical Research Council argues: “Individuals have a sphere of life from which they should be able to exclude any intrusion ... A major application of the concept of privacy is information privacy: the interest of a person in controlling access to and use of any information personal to that person.”<br> <span>This principle applies to all information about a person, whether or not it is obtained directly from that person. The area that is private is conventional and culturally defined; in the UK it commonly includes income and family arrangements. </span></p>
<br>
<p>The information obtained in research is not, however, necessarily private. Some material is in the public sphere, which includes published and broadcast material, academic discourse, and the activities of government. <br>Activities undertaken in a public place are public, rather than private, if they are openly displayed (e.g. artistic exhibition or attendance at a public event) or subject to public regulation (e.g. driving).”
</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
						<div class="form-group">
						<h5>Please provide further details:</h5>
						<textarea rows="5" cols="142" name="q2com"></textarea>
						</div>


						</div>
						</fieldset>
						<fieldset style="float: right;">
							<div>
							<span>1 of 4</span>
							<input type="submit" name="submit" value="Next"  class="btn btn-primary">
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