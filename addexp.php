<?php
include ('includes/connec.inc.php');
include ('ethicsform/editform/new.php');
error_reporting(E_ERROR | E_PARSE);
session_start(); 
  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: studentlogin.php');
  }
  $sql = "SELECT lastname, regno, id FROM studentuser WHERE email = '" . $_SESSION['email'] . "'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result);
 $studid = $row['id'];
 
 function checkexperiments($studid){
    $host = "CSDM-WEBDEV";
    $dbUsername = "1713978";
    $dbPassword = "1713978";
    $dbname = "db1713978_cmm007";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
        	$query = "SELECT * FROM experiments WHERE studid = $studid ORDER BY id DESC";
        	$result = mysqli_query($conn,$query);
        	if($result)
        		return $result;
        	else
        		return false;
        }	
 $msg = checkexperiments($studid);


?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid" >
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			
			<a class="navbar-brand" href="studentdashboard.php">
			<strong>STUDENT DASHBOARD</strong>
				
			</a>

		</div>
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
				<li><a href="studentdashboard.php">Home</a></li>
				<li class="active"><a href="addexp.php" style="background-color: purple;color: white">My Experiments</a></li>
				<li><a href="#">EAO's Feedback</a></li>
				<li><a href="upload.php">Uploads</a></li>
			</ul>
		</div>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #eaceed;" >
                 <h4><strong>MY EXPERIMENTS</strong></h4>
                </div>

           <div class="panel-body">
                   <div class="row-fluid">
     					<div class="addashmain well">
					      <h4><strong><?php echo " Hello,   " . $row['lastname'];?></strong>	</h4>
					      <h4>Your Regno : <span style="color:red;text-transform: none;"><?php echo $row['regno']; ?></span> </h4>
					      <?php
				            if(!$msg)
				              echo "<p><i>You Have No experiments created. Please create an experiment.</i></p>";
				            else{
				            	$i=0;
				            	while ($value =$msg-> fetch_assoc()) {
				            		$i++;
				            	}
				            	echo "<p><i>You Have ".$i." Experiment</i></p>";

				            }
					      ?>

					      <span style="color:red; text-align: left;"><?php
							      if(isset($_GET['msg']) && !empty($_GET['msg']))

							      {
							        echo "<h3>Experiment Deleted Successfully</h3>";
							        
							      }
							?> </span> 
					      <span style="margin-left: 1000px;">
					      <a href="createexp.php"><input type="submit" name="cg" value="Create Experiment" class="btn" style="background-color: #800080; color: white" ></a></span>
				     </div>

				    
				    </div>  
				    <div class="ruler"></div>
                    <!-- Section Two --> 

     		<div class="row-fluid eachgr well">

	      	<?php
	      		$result = checkexperiments($studid);
	      		
	      		if ($result) {
        	while ($value = $result->fetch_assoc()) {
        		$expname = $value['expname'];
        		$course = $value['course'];
        		$studentname = $value['studentname'];
        		$project = $value['proj'];
        		$dept = $value['dept'];
        		$id = $value['id'];

            $query = "SELECT exid FROM ethicsform WHERE exid = $id";
            $ethres = mysqli_query($conn,$query);
            $row = mysqli_num_rows($ethres);
	      	 ?>
              <ul class="list-group">
                  <li class="list-group-item"> <h2 style="margin-top: 1px; margin-left: 10px"><?php echo $value['expname'];?></h2></li>
                  <li class="list-group-item list-group-item-action list-group-item-dark"> <p style="font-size: 15px;margin-left: 10px;"><strong>Project Title:</strong><span style="margin-left: 20px"><?php echo $project;?></span></p></li>
                  <li class="list-group-item list-group-item-action list-group-item-dark"><p style="font-size: 15px;margin-left: 10px;"><strong>Course of study:</strong><span style="margin-left: 20px"><?php echo $course;?></span></p></li>
                  <li class="list-group-item list-group-item-action list-group-item-dark"><p style="font-size: 15px;margin-left: 10px;"><strong>Department:</strong><span style="margin-left: 20px"><?php echo $dept;?></span></p></li>
                  <li class="list-group-item list-group-item-action list-group-item-dark"><p style="font-size: 15px;margin-left: 10px;"><strong>Status:</strong><span style="margin-left: 20px; color: red"><i>Pending</i></span></p></li>
	      		<?php if ($row==0) {?>
                 <li class="list-group-item list-group-item-action list-group-item-dark"><a href="ethicsform/step2.php?exid=<?php echo $id;?>"><input type="submit" class="btn" style="background-color: #800080; color: white"  name="addquestion" value="Fill Ethics Form" name=""></a>
                  	<?php }?>
                  <a href="upload.php?exid=<?php echo $id;?>"><input type="submit" class="btn" style="background-color: #800080; color: white" name="addquestion" value="Upload file" name=""></a>
		        <?php if ($row>0) {?>
              <a href="ethicsform/editform/edit1.php?exid=<?php echo $value['id'];?>"><input type="submit" name="editgr" class="btn" style="background-color: #800080; color: white"  value="View/Edit Ethics"></a>
              <?php }?>
                     <a href="delethicsform.php?exid=<?php echo $value['id'];?>"><input class="btn" style="background-color: #800080; color: white"  onclick=" return confirm('Are You Sure To Delete?')" type="submit" name="delegr" value="Delete"></a></li>
              </ul>
	       <?php } }?>
            </div>
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