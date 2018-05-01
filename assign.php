<?php
/**
 * Created by PhpStorm.
 * User: Suleiman US
 * Date: 4/29/2018
 * Time: 1:20 AM
 */
include('includes/connec.inc.php');
	$sql= "SELECT * FROM experiments";
	$records= mysqli_query($conn,$sql);

	$sql2= "SELECT * FROM eaouser";
	$eao= mysqli_query($conn,$sql2);

	$eaooption="";
while ($rows = mysqli_fetch_array($eao)) {
    $eaoid=$rows['id'];
    $eaoname = $rows['firstname'];
    $eaoname2 = $rows['lastname'];
    $eaooption = $eaooption . "<option value='$eaoid' name='eaoname'>$eaoname $eaoname2</option>";
}
if (isset($_POST['submit'])){

	    if (isset($_POST['expid'])&&isset($_POST['expname'])&&isset($_POST['selecteao'])) {
            $expid = $_POST['expid'];
            $expname = $_POST['expname'];
            $eao1 = $_POST['selecteao'];
            if ($assigned2 < 2){
                $query = "INSERT INTO groupexperiment (`expname`,`exid`,`eaoid`) VALUES ('$expname','$expid', '$eao1')";
            $result = mysqli_query($conn, $query);
            if ($result == TRUE) {
                echo "<script> alert('EAO assigned successfully!');
                window.location='assign.php'
                    </script>";
            } else {
                echo mysqli_error($conn);
            }
        }else{
                echo "<script> alert('Cannot assigned more than two(2) EAOs!');
                window.location='assign.php'
                    </script>";
            }
            }   else {
	            echo "Select EAO from  dropdown menu";
            }


}

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
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid main-container">
    <div class="col-md-2 sidebar">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="admindashboard.php">Home</a></li>
            <li class="active"><a href="assign.php" style="background-color:purple;color: white">Assign Experiment to EAO's</a></li>
            <li><a href="viewstuds.php">View All Students</a></li>
            <li><a href="vieweao.php">View All EAO's</a></li>
            <li><a href="#">Manage Uploads</a></li>
            <li ><a href="addstud.php">Enroll Users</a></li>
        </ul>
    </div>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#eaceed;color: black">
                <h4><strong>Assign EAO's</strong></h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">Experiment No.</th>
                        <th scope="col">Experiment Name</th>
                        <th>Experimental Approval Officers</th>
                        <th>Assign</th>
                        <th>EAO'S Assigned</th>
                    </tr>
                <?php while( $exps=mysqli_fetch_assoc($records)){?>
                <form method="POST" action="" class="form-group">

                    <?php
                    $expid = $exps['id'];
                    $expname = $exps['expname'];

                    $assigned= "SELECT eaoid FROM groupexperiment WHERE expname='$expname'";
                    $assignedres= mysqli_query($conn,$assigned);
                    $assigned2 = mysqli_num_rows($assignedres);

                    echo "<tr>";
                        echo "<td><input type='hidden' name='expid' value='".$exps['id']."'>$expid</td>";

                        echo "<td><input type='hidden' name='expname' value='".$exps['expname']."'>$expname</td>";

                        echo "<td><input type='hidden' name='selecteao[]' value='$eaoid'>

                            <select name='selecteao'>
                                <option> Please select EAO</option>
                               <?php echo $eaooption ?>
                            </select></td>";

                        echo "<td><input name='submit[]' type='submit' value='Assign' class='btn' style='background-color: purple;color: white' ></td>";

                        echo "<td> $assigned2 </td>";

                        echo "</tr>"; //end while
                    ?>
                </form>
               <?php }?>
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
