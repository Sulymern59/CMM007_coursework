<?php
include ('../../sessionerror.php');
include ('../../includes/connec.inc.php');
if (isset($_GET['exid'])) {
    $exid = $_GET['exid'];}
// Checking first page values for empty,If it finds any blank field then redirected to first page.
if (isset($_POST['submit'])) {
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
    extract($_SESSION['POST']); // Function to extract array.
    $query = "UPDATE `ethicsform` SET  q1a='$q1a', q1b='$q1b', q1c='$q1c', q1d='$q1d', q1e='$q1e', q1com='$q1com', q2a='$q2a', q2com='$q2com' WHERE exid='$exid'";

    if ($conn->query($query) === TRUE){
        echo "Done!";
    } else {
        echo mysqli_error($conn);
    }
    unset($_SESSION['POST']); // Destroying session.


} else {
    echo mysqli_error($conn); // Redirecting to first page.

}

$sql = "SELECT * FROM ethicsform WHERE exid =$exid";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

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
					<form class="form-group" method="POST" action="edit3.php?exid=<?php echo $_GET['exid'];?>">
						<fieldset>
						<legend><strong>PART 2: THE IMPACT OF THE RESEARCH</strong></legend>
						<div class="form-group">
						<div>
						<h4 style="float: right; margin-left: 10px">NO</h4></div>
						<div><h4 style="float: right;">YES</h4></div>
						<div class="form-group"><label> 3) In the process of doing the research, is there any potential for harm to be done to, or costs to be imposed on:
						<a href="#">[see Guidance Note 3(i)]</a></label>
						</div>
						<div class="form-group"><p>(a)	research participants?<input type="radio" name="q3a" value="NO"  <?php if ($row['q3a'] == 'NO') echo 'checked="checked"'; ?> style="float: right"><input type="radio" name="q3a" value="YES"  <?php if ($row['q3a'] == 'YES') echo 'checked="checked"'; ?> style="float: right; margin-right: 30px"></p></div>
						<div class="form-group"><p>(b)	research subjects? [see Guidance Note 3(ii)]<input type="radio" name="q3b" value="NO"  <?php if ($row['q3b'] == 'NO') echo 'checked="checked"'; ?> style="float: right;"><input type="radio" name="q3b" value="YES"  <?php if ($row['q3b'] == 'YES') echo 'checked="checked"'; ?> style="float: right; margin-right: 30px"></p></div>
						<div class="form-group"><p>(c)	you, as the researcher?<input type="radio" name="q3c" value="NO"  <?php if ($row['q3c'] == 'NO') echo 'checked="checked"'; ?> style="float: right;"><input type="radio" name="q3c" value="YES"  <?php if ($row['q3c'] == 'YES') echo 'checked="checked"'; ?> style="float: right; margin-right: 30px"></p></div>
						<div class="form-group"><p>(d)	third parties? [see Guidance Note 3(iii)]<input type="radio" name="q3d" value="NO"  <?php if ($row['q3d'] == 'NO') echo 'checked="checked"'; ?> style="float: right;"><input type="radio" name="q3d" value="YES"  <?php if ($row['q3d'] == 'YES') echo 'checked="checked"'; ?> style="float: right; margin-right: 30px"></p></div><br>
						<div class="form-group">
						<h5>Please provide further details:</h5>
						<textarea rows="5" cols="142" name="q3com"><?php echo $row['q3com']?></textarea>
                        </div>
						
						<hr>


						<div class="form-group">
						<div class="form-group">
						<h4 style="float: right; margin-left: 10px">NO</h4></div>
						<div class="form-group"><h4 style="float: right;">YES</h4></div>
						<div class="form-group"><label>4) When the research is complete, could negative consequences follow:</label>
						</div>
						<div class="form-group"><p>(a)	for research subjects<input type="radio" name="q4a" value="NO"  <?php if ($row['q4a'] == 'NO') echo 'checked="checked"'; ?> style="float: right"><input type="radio" name="q4a" value="YES"  <?php if ($row['q4a'] == 'YES') echo 'checked="checked"'; ?> style="float: right; margin-right: 30px"></p></div>
						<div><p>(b)    or elsewhere? [see Guidance Note 4]<input type="radio" name="q4b" value="NO"  <?php if ($row['q4b'] == 'NO') echo 'checked="checked"'; ?> style="float: right;"><input type="radio" name="q4b" value="YES"  <?php if ($row['q4b'] == 'YES') echo 'checked="checked"'; ?> style="float: right; margin-right: 30px"></p></div>	<br>
						<div class="form-group"><h5>Please state what you believe are the consequences of the research:</h5>
						<textarea rows="5" cols="142" name="q4com"><?php echo $row['q4com']?></textarea>
						</div>
						</div>
						</fieldset>
						<fieldset style="float: right;">
							<div>
							<a href="edit1.php" class="btn btn-primary">Previous</a>
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