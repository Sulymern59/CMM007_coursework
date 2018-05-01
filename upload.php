<?php
session_start();

include ('includes/connec.inc.php');
if (isset($_GET['exid'])) {
    $exid = $_GET['exid'];
    $_SESSION['exid']=$exid;
}

    if (isset($_POST['submit'])) {
            $exid = $_POST['exid'];
        if (isset($_FILES['addfile'])) {
            $filename= $_FILES["addfile"]["name"];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["addfile"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if file already exists
            if (file_exists($target_file)) {
                echo "<script> alert('File already exist!');
                window.location='upload.php'
                    </script>";
                $uploadOk = 0;
            }
// Check file size
            if ($_FILES["addfile"]["size"] > 500000) {
                echo "<script> alert('File size to large!');
                window.location='upload.php'
                    </script>";
                $uploadOk = 0;
            }
// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<script> alert('Sorry, your file was not uploaded!');
                window.location='upload.php'
                    </script>";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["addfile"]["tmp_name"], $target_file)) {

                    $query = mysqli_query($conn, "INSERT INTO uploads (filename,expid) VALUES ('$filename','$exid');");
                    echo "<script> alert('The file " . basename($_FILES["addfile"]["name"]) . " has been uploaded.!');
                window.location='upload.php'
                    </script>";

                } else {
                    echo "<script> alert('Sorry, there was an error uploading your file.!');
                window.location='upload.php'
                    </script>";
                }
            }
        }

    }
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
				<li><a href="studentdashboard.php?exid=<?php echo $exid ?>">Home</a></li>
				<li class="active"><a href="addexp.php" style="background-color: purple;color: white">My Experiments</a></li>
				<li><a href="#">EAO's Feedback</a></li>
				<li><a href="manageuploads.php?exid=<?php echo $exid ?>">Manage Uploads</a></li>
			</ul>
		</div>
		<div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #eaceed;">
                    <h4><strong>UPLOADS</strong></h4>
                </div>
                <div class="panel-body">
                	<div><h4> Kindly upload any supporting documents that may further help in explaining your experiment.</h4><br>

                		<p> <strong>NOTE:</strong> Documemt size should not exceed 200KB.	
                	</div>
                    <div class="form-group">
                	<form class="form-group" method="POST" action="upload.php" enctype="multipart/form-data">

                		<fieldset>
                            <input type="hidden" name="exid" value='<?php echo $exid;?>'>
                			<input type="file" name="addfile" class="form-control-file">
                			<input type="submit" class="btn" style="background-color: purple;color: white;float: right;" name="submit" value="Submit"> 
                		</fieldset>
                	</form>
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

 