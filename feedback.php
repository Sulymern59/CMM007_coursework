<?php
/**
 * Created by PhpStorm.
 * User: Suleiman US
 * Date: 4/30/2018
 * Time: 3:25 PM
 */
session_start();
include "includes/connec.inc.php";

if (isset($_GET['exid'])){
    $exex=$_GET['exid'];
}

$sql = "SELECT id FROM eaouser WHERE email = '" . $_SESSION['email'] . "'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$eaofid=$row['id'];

if (isset($_POST['submit'])){
    if (isset($_POST['feedbacks'])&&isset($_POST['exex'])){
        $feedback = $_POST['feedbacks'];
        $exex = $_POST['exex'];
        if (!empty($feedback)){

            $INSERT = "INSERT Into feedback (exfid,eaofid,comment) values(?,?,?)";
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("iis", $exex, $eaofid,  $feedback);
                $stmt->execute();
                if ($stmt==TRUE){
                echo "<script> alert('Feedback sent!');
                window.location='feedback.php'
                    </script>";
            }else{
                echo "<script> alert('Error sending feedback!');
                window.location='feedback.php'
                    </script>";
            }

        }else{
                echo "<script> alert('Feedback form is empty!');
                window.location='feedback.php'
                    </script>";
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
                <h4><strong>EXPERIMENT APPROVAL OFFICER'S DASHBOARD</strong></h4>
            </a>
        </div>

    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid main-container">
    <div class="col-md-2 sidebar">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="eaodashboard.php">Home</a></li>
            <li><a href="viewexp.php">Assigned Experiment</a></li>
            <li><a href="eaouploads.php?exid=<?php echo $exex;?>">Supporting Documents</a></li>
            <li class="active"><a href="feedback.php" style="background-color: purple;color: white">Feedback form</a></li>
        </ul>
    </div>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#eaceed;color: black">
                <h4><strong>FEEDBACK</strong></h4>
            </div>
            <div class="panel-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <input type="hidden" name="exex" value='<?php echo $exex;?>'>
                        <label for="message-text" class="col-form-label">Comment on the experiment:</label>
                        <textarea class="form-control" name="feedbacks" cols="142" rows="5" placeholder="Type here..."></textarea>
                        <br>
                        <button type="submit" name="submit" class="btn" style="background-color: purple;color: white">Send feedback</button>
                    </div>
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
