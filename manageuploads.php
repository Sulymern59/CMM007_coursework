<?php
session_start();
include ('includes/connec.inc.php');
if (isset($_GET['exid'])) {
    $exid = $_GET['exid'];
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
            <li><a href="studentdashboard.php">Home</a></li>
            <li><a href="addexp.php">My Experiments</a></li>
            <li><a href="#">EAO's Feedback</a></li>
            <li class="active"><a href="upload.php" style="background-color: purple;color: white">Uploads</a></li>
        </ul>
    </div>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #eaceed;">
                <h4><strong>UPLOADS</strong></h4>
            </div>
            <div class="panel-body">

                <div><h4><strong>Manage uploads</strong></h4>
                    <table class="table table-hover">
                        <?php
                        $sql = "SELECT * FROM uploads WHERE expid='$exid'";
                        $res = mysqli_query($conn,$sql);
                        $rows =mysqli_fetch_array($res);
                        $filename = $rows['filename'];
                        $expid = $rows['expid'];
                        ?>
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
</div>
<div class="container-fluid">
    <footer class="pull-left footer">
        <p>
        <hr class="divider">
        Copyright &COPY; 2018 <a href="index.php">Project Ethical Approval System</a>
        </p>
    </footer>
</div>

