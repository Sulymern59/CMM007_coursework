<?php
/**
 * Created by PhpStorm.
 * User: Suleiman US
 * Date: 4/30/2018
 * Time: 11:37 AM
 */
session_start();
include "includes/connec.inc.php";
if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: eaologin.php');
}
$sql = "SELECT id,lastname, staffno FROM eaouser WHERE email = '" . $_SESSION['email'] . "'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$eaoid=$row['id'];

$query = "SELECT expname, exid FROM groupexperiment WHERE eaoid=$eaoid";
$result = mysqli_query($conn,$query);

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
            <li class="active"><a href="viewexp.php" style="background-color: purple;color: white">Assigned Experiment</a></li>
        </ul>
    </div>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#eaceed;color: black">
                <h4><strong>EXPERIMENTS</strong></h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Experiment No.</th>
                        <th>Experiment Name</th>
                        <th>View Ethics form</th>
                    </tr>

                    <?php
                    while($rows = mysqli_fetch_array($result)) {
                        $expid = $rows['exid'];
                        $expname = $rows['expname'];

                        echo "<tr>";
                        echo "<td><input type='hidden' name='expid' value='" . $rows['exid'] . "'>$expid</td>";

                        echo "<td><input type='hidden' name='expname' value='" . $rows['expname'] . "'>$expname</td>";

                        echo "<td><a href='editform.php?exid=$expid'>$expname</a> </td>";

                        echo "</tr>";
                    }
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