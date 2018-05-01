<?php 
$host = "CSDM-WEBDEV";
    $dbUsername = "1713978";
    $dbPassword = "1713978";
    $dbname = "db1713978_cmm007";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

	$sql= "SELECT * FROM studentuser";
	$records= mysqli_query($conn,$sql);
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script type="text/javascript">
var uploadField = document.getElementById("file");

uploadField.onchange = function() {
    if(this.files[0].size > 307200){
       alert("File is too big!");
       this.value = "";
    };
};
</script>

<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="studentdashboard.php">
				<h4><strong>ADMINISTRATOR'S DASHBOARD</strong></h4>
			</a>
		</div>
		
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
		<div class="col-md-2 sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="admindashboard.php">Home</a></li>
				<li><a href="assign.php">Assign Experiment to EAO's</a></li>
				<li class="active"><a href="viewstuds.php" style="background-color: purple;color: white">View All Students</a></li>
				<li><a href="vieweao.php">View All EAO's</a></li>
				<li><a href="#">Manage Uploads</a></li>
				<li><a href="addstud.php">Enroll Users</a></li>
			</ul>
		</div>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#eaceed;color: black">
                    <h4><strong>STUDENTS</strong></h4>
                </div>
                <div class="panel-body">
                	<table class="table table-hover">
                		<tr>
                			<th>Firstname</th>
                			<th>Lastname</th>
                			<th>Department</th>
                			<th>Email Address</th>
                			<th>Registration Number</th>

                		</tr>
                		<?php 
                		
                		while ($studentuser=mysqli_fetch_assoc($records)) {
                			echo "<tr>";

                			echo "<td>".$studentuser['firstname']."</td>";

                			echo "<td>".$studentuser['lastname']."</td>";

                			echo "<td>".$studentuser['dept']."</td>";

                			echo "<td>".$studentuser['email']."</td>";

                			echo "<td>".$studentuser['regno']."</td>";

                            echo "<td><button class='btn btn-sm btn-danger'>Delete <span class='glyphicon glyphicon-trash'></span></button></td>";

                			echo "</tr>";
                		} //end while

                		?>
                	</table>
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