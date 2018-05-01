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
    $exid=$_GET['exid'];
}

$sql = "SELECT id FROM eaouser WHERE email = '" . $_SESSION['email'] . "'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$eaofid=$row['id'];

$sql = "SELECT * FROM uploads WHERE expid='$exid'";
$res = mysqli_query($conn,$sql);
$rows =mysqli_fetch_array($res);
$filename = $rows['filename'];
$expid = $rows['expid'];
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
            <li class="active" ><a href="" style="background-color: purple;color: white">Supporting Documents</a></li>

        </ul>
    </div>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#eaceed;color: black">
                <h4><strong>FEEDBACK</strong></h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <table class="table table-hover">
                        <tr>
                            <th>Document Name</th>
                            <th>View</th>
                            <th>Experiment No.</th>
                        </tr>
                        <tr>
                            <td><?php echo $filename; ?></td>
                            <td><a href="uploads/<?php echo $filename; ?>">Click to view </a> </td>
                            <td><?php echo $expid; ?></td>

                        </tr>

                    </table></div>

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
