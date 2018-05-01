<?php
include ('../../sessionerror.php');
include ('../../includes/connec.inc.php');
if (isset($_GET['exid'])) {
    $exid = $_GET['exid'];}
// Checking first page values for empty,If it finds any blank field then redirected to first page.
if (isset($_POST['submit'])) {
    $_SESSION['POST']['q5a'] = mysqli_escape_string($conn, $_POST['q5a']);
    $_SESSION['POST']['q5b'] = mysqli_escape_string($conn, $_POST['q5b']);
    $_SESSION['POST']['q5c'] = mysqli_escape_string($conn, $_POST['q5c']);
    $_SESSION['POST']['q5com'] = mysqli_escape_string($conn, $_POST['q5com']);
    $_SESSION['POST']['q6a'] = mysqli_escape_string($conn, $_POST['q6a']);
    $_SESSION['POST']['q6com'] = mysqli_escape_string($conn, $_POST['q6com']);
    $_SESSION['POST']['q7'] = mysqli_escape_string($conn, $_POST['q7']);
    $_SESSION['POST']['q7a'] = mysqli_escape_string($conn, $_POST['q7a']);
    $_SESSION['POST']['q7b'] = mysqli_escape_string($conn, $_POST['q7b']);
    $_SESSION['POST']['q7c'] = mysqli_escape_string($conn, $_POST['q7c']);
    $_SESSION['POST']['q7d'] = mysqli_escape_string($conn, $_POST['q7d']);
    $_SESSION['POST']['q7com'] = mysqli_escape_string($conn, $_POST['q7com']);
    $_SESSION['POST']['q7mem'] = mysqli_escape_string($conn, $_POST['q7mem']);
    $_SESSION['POST']['q7pvg'] = mysqli_escape_string($conn, $_POST['q7pvg']);
    $_SESSION['POST']['q8a'] = mysqli_escape_string($conn, $_POST['q8a']);
    $_SESSION['POST']['q8com'] = mysqli_escape_string($conn, $_POST['q8com']);

    foreach ($_POST as $key => $value) {
        $_SESSION['POST'][$key] = $value;
    }
    extract($_SESSION['POST']); // Function to extract array.
    $query = "UPDATE `ethicsform` SET  q5a='$q5a', q5b='$q5b', q5c='$q5c', q5com='$q5com', q6a='$q6a', q6com='$q6com', q7='$q7', q7a='$q7a', q7b='$q7b', q7c='$q7c', q7d='$q7d', q7com='$q7com', q7mem='$q7mem', q7pvg='$q7pvg', q8a='$q8a', q8com='$q8com' WHERE exid='$exid'";

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
				<li class="active"><a href="addexp.php">My Experiments</a></li>
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
					<form class="form-group" method="POST" action="new.php?exid=<?php echo $_GET['exid'];?>">
						<fieldset>
						<legend><strong>PART 4: THE RESEARCH RELATIONSHIP</strong></legend>
						<div class="form-group">
							<div class="form-group">
						<label style="float: right;">NO</label>
                                <input type="radio" name="q9a" value="NO" <?php if ($row['q9a'] == 'NO') echo 'checked="checked"'; ?> style="float: right;margin-left: 10px;">
						<label style="float: right;">YES</label>
                                <input type="radio" name="q9a" value="YES" <?php if ($row['q9a'] == 'YES') echo 'checked="checked"'; ?> style="float: right; ">
						<label>9) Does the research require you to give or make undertakings to research participants or subjects about the use of data?<br> <a href="#">[see Guidance Note 9]</a>
						</label>
						<h5>If you answered yes to the above, please outline the likely undertakings:</h5>
						<textarea rows="5" cols="142" name="q9com"><?php echo $row['q9com']?></textarea>
						</div>
						<hr>
						<div class="form-group">
						<label style="float: right;">NO</label>
                            <input type="radio" name="q10a" value="NO" <?php if ($row['q10a'] == 'NO') echo 'checked="checked"'; ?> style="float: right; margin-left: 10px;">
						<label style="float: right;">YES</label>
                            <input type="radio" name="q10a" value="YES" <?php if ($row['q10a'] == 'YES') echo 'checked="checked"'; ?> style="float: right; margin-left: 10px;">
						<label>10) Is the research likely to be affected by the relationship with a sponsor, funder or employer?
						<a href="#"> [see Guidance Note 10]</a>
						</label>
						<h5>If you answered yes to the above, please identify how the research may be affected:</h5>
						<textarea rows="5" cols="142" name="q10com"><?php echo $row['q10com']?></textarea>
						</div>
						<hr>
						<legend><strong>PART 5: OTHER ISSUES</strong></legend>
						<div class="form-group">
						<label style="float: right;">NO</label>
                            <input type="radio" name="q11a" value="NO" <?php if ($row['q11a'] == 'NO') echo 'checked="checked"'; ?> style="float: right; margin-left: 10px;">
						<label style="float: right;">YES</label>
                            <input type="radio" name="q11a" value="YES" <?php if ($row['q11a'] == 'YES') echo 'checked="checked"'; ?> style="float: right;">

						<label>11) Are there any other ethical issues not covered by this form which you believe you should raise?
						</label>
						<h5>Please provide further details:</h5>
						<textarea rows="5" cols="142" name="q11com"><?php echo $row['q11com']?></textarea>
						</div>
						</div>
						<hr>
						<div>
						<h3>Statement by Student,</h3>
						<fieldset class="checkbox-1">
						<label for="checkbox-1">Please Tick</label>
						<input type="checkbox" required="1">
						</fieldset>
						<h3>I believe that the information I have given in this form is correct, and that I have addressed the ethical issues as fully as possible at this stage.
						</h3>
						</div>
						</fieldset>
						<br>
						<fieldset style="float: right;">
							<div>
							<a href="edit3.php" type="submit" class="btn btn-primary">Previous</a>
							<span>4 of 4</span>
							<input type="submit" class="btn btn-primary" name="submit" value="Submit" /> 
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