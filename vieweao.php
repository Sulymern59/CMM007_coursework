<?php 
Include ('includes/connec.inc.php');
	$sql= "SELECT * FROM eaouser";
	$records= mysqli_query($conn,$sql);
    session_start(); 
  if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: adminlogin.php');
  }
  $sql = "SELECT lastname, regno FROM studentuser WHERE email = '" . $_SESSION['email'] . "'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="js/jquery.tabledit.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
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
                <li><a href="assign.php">Assign Experiments to EAO's</a></li>
                <li><a href="viewstuds.php">View All Students</a></li>
                <li class="active"><a href="vieweao.php" style="background-color:purple;color: white">View All EAO's</a></li>
                <li><a href="#">Manage Uploads</a></li>
                <li><a href="addstud.php">Enroll Users</a></li>
			</ul>
		</div>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #eaceed;">
                    <h4><strong>EAO's</strong></h4>
                </div>
                <div class="panel-body">
                	<table class="table table-hover" id="editable_table">
                		<tr>
                			<th>Firstname</th>
                			<th>Lastname</th>
                			<th>Department</th>
                			<th>Email Address</th>
                			<th>Staff Number</th>


                		</tr>
                		<?php 
                		
                		while ($studentuser=mysqli_fetch_assoc($records)) {
                			echo "<tr>";

                			echo "<td>".$studentuser['firstname']."</td>";

                			echo "<td>".$studentuser['lastname']."</td>";

                			echo "<td>".$studentuser['dept']."</td>";

                			echo "<td>".$studentuser['email']."</td>";

                			echo "<td>".$studentuser['staffno']."</td>";

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
        <script>
            $('#example5').Tabledit({
                url: 'example.php',
                rowIdentifier: 'data-id',
                buttons: {
                    delete: {
                        class: 'btn btn-sm btn-danger',
                        html: '<span class="glyphicon glyphicon-trash"></span> &nbsp Delete',
                        action: 'delete'
                    },
                    confirm: {
                        class: 'btn btn-sm btn-default',
                        html: 'Are you sure?'
                    }
                },
            });

        </script>