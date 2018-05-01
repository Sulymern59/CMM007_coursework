<?php 
include ('includes/connec.inc.php');
if (isset($_POST['regno'])) {
$studreg= $_POST['regno'];
if (!empty($_POST['regno'])){

if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT regno From regstud Where regno = ? Limit 1";
     $INSERT = "INSERT Into regstud (regno) values(?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $studreg);
     $stmt->execute();
     $stmt->bind_result($studreg);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("i", $studreg);
      $stmt->execute();
         echo "<script> alert('Staff/Reg No. added successfully!');
                window.location='addstud.php'
                    </script>";
      //echo "New record inserted sucessfully";
      //echo "New record inserted sucessfully";
     } else {

          echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
}

 else {
 echo "All field are required";
 die();
}
}

$sql= "SELECT * FROM regstud";
$records= mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Administrator</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<strong>ADMINISTRATOR'S DASHBOARD</strong>
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php" target="_blank">LOGOUT</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
		<div class="col-md-2 sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="admindashboard.php">Home</a></li>
				<li><a href="assign.php">Assign Students to EAO's</a></li>
				<li><a href="viewstuds.php">View All Students</a></li>
				<li><a href="vieweao.php">View All EAO's</a></li>
				<li><a href="#">Manage Uploads</a></li>
				<li class="active"><a href="addstud.php" style="background-color:purple;color: white">Enroll Users</a></li>
			</ul>
		</div>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#eaceed;color: black">
                    <h4><strong>Add Staff and Students</strong></h4>
                </div>
                <div class="panel-body">
                    <h4>Enroll new students</h4>
					<br><br>
				<form class="form-horizontal" method="POST" action="">
				<div class="form-group">
				 <label class="col-md-4 control-label" for="textinput">Choose user:</label>  
				  <div class="col-md-4">
							  <select class="" style="width: 250px" name="regno">
							  <option value="regno">Student</option>
							  <option value="staffno">Staff</option>
							  </select>
				  </div>
				</div>	
				<div class="form-group">
				 <label class="col-md-4 control-label" for="textinput">Enter Staff / Reg. no:</label>  
				  <div class="col-md-4">
				  <input name="regno" type="text" placeholder="1713978" class="form-control input-md" required="">
				  </div>
				</div>	
				<div class="form-group">
				  <label class="col-md-4 control-label" for="singlebutton"></label>
				  <div class="col-md-4">
				    <button name="submit" type= "submit" class="btn btn-primary">Enroll</button>
				  </div>
				</div>	
				</form>

				<table class="table table-striped">
                		<tr>
                			<th>IDs</th>
                			<th>Staff/Regno.</th>
                		</tr>
                		<?php 
                		
                		while ($regstud=mysqli_fetch_assoc($records)) {
                			echo "<tr>";

                			echo "<td>".$regstud['id']."</td>";

                			echo "<td>".$regstud['regno']."</td>";

                			echo "</tr>";
                		} //end while

                		?>
                	</table>
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
</body>
</html>