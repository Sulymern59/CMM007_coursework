<?php
session_start();
Include ('includes/dbcontroller.php');

if (isset($_GET['exid'])) {
    $exid = $_GET['exid'];
    global $exid;
}
$db_handle = new DBController();
$query = "SELECT * FROM ethicsform WHERE exid = '$exid'";
$ethics = $db_handle->runQuery($query);

$db_handle2 = new DBController();
$query = "SELECT * FROM experiments WHERE id = '$exid'";
$exp = $db_handle2->runQuery($query);
/*$sql= "SELECT * FROM experiments WHERE id = $exid";
$records= mysqli_query($conn,$sql);*/

if (isset($_POST['submit'])){
    $exid= $_POST['exid'];
    $accepted= $_POST['Accept'];

    $db_handle3 = new DBController();
    $query = "UPDATE groupexperiment SET status='$accepted' WHERE exid='$exid' LIMIT 1";
    $status= $db_handle3->executeUpdate($query);
    if($status){

        echo "<script> alert('Experiment Approved!');
                window.location='editform.php'
                    </script>";
    }
}

?>

<script>
    $('.form-disable').on('submit', function () {

        var self = $(this),
            button = self.find('input[type="submit"], button'),
            submitValue = button.data('submit-value');

        button.attr('disabled','disabled').val(submitValue) ? submitValue: 'Please wait...');
    });

</script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="studentdashboard.php">
                <h4><strong>EXPERIMENT APPROVAL OFFICER'S DASHBOARD</strong></h4>
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
            <li><a href="eaodashboard.php">Home</a></li>
            <li class="active"><a href="viewexp.php" style="background-color: purple;color: white">My Experiments</a></li>
            <li><a href="eaouploads.php?exid=<?php echo $exid;?>">Supporting Documents</a></li>
        </ul>
    </div>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #eaceed;">
                <h4><strong>Ethics Form</strong></h4>
            </div>
            <div class="panel-body">
                <?php
               foreach($ethics as $k=>$v) {
                foreach ($exp as $key => $value) {
                    ?>
                    <div class="table-responsive-lg">
                        <table class="table table-striped"> 
                          <ul class="list-group">
                              <li class="list-group-item list-group-item-action list-group-item-dark"><strong>Experiment <?php echo $exid; ?>:</strong> <?php echo $exp[$key]['expname']; ?></li>
                              <li class="list-group-item list-group-item-action list-group-item-dark"><strong>Student name:</strong> <?php echo $exp[$key]['studentname']; ?></li>

                              <li class="list-group-item list-group-item-action list-group-item-dark"><strong>Project Title:</strong> <?php echo $exp[$key]['proj']; ?></li>

                              <li class="list-group-item list-group-item-action list-group-item-dark"><strong>Course of study:</strong> <?php echo $exp[$key]['course']; ?></li>
                          </ul>
                         
                            
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">PART 1: DESCRIPTIVE QUESTIONS</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">(1)</th>
                                <td>Does the research involve, or does information in the research relate to:</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(a) individual human subjects</td>

                               <?php echo "<td>".$ethics[$k]['q1a']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(b) groups (e.g. families, communities, crowds)</td>
                                <?php echo "<td>".$ethics[$k]['q1b']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(c) organisations</td>
                                <?php echo "<td>".$ethics[$k]['q1c']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(d) animals?</td>
                                <?php echo "<td >".$ethics[$k]['q1d']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td> (e)genetically-modified organisms Guide</td>
                                <?php echo "<td  >".$ethics[$k]['q1e']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>Further details:</td>
                                <?php echo "<td  >".$ethics[$k]['q1com']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row">(2)</th>
                                <td> Will the research deal with information which is private or confidential?</td>
                                <?php echo "<td  >".$ethics[$k]['q2a']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>Further details:</td>
                                <?php echo "<td  >".$ethics[$k]['q2com']."</td>";?>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive-lg">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">PART 2: THE IMPACT OF THE RESEARCH</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">(3)</th>
                                <td>In the process of doing the research, is there any potential for harm to be done to, or costs to be imposed on:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(a) research participants?</td>
                                <?php echo "<td  >".$ethics[$k]['q3a']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(b) research subjects?</td>
                                <?php echo "<td  >".$ethics[$k]['q3b']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(c) you, as the researcher?</td>
                                <?php echo "<td  >".$ethics[$k]['q3c']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(d) third parties?</td>
                                <?php echo "<td  >".$ethics[$k]['q3d']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td> Further details:</td>
                                <?php echo "<td  >".$ethics[$k]['q3com']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row">(4)</th>
                                <td>When the research is complete, could negative consequences follow:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(a) for research subjects</td>
                                <?php echo "<td  >".$ethics[$k]['q4a']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(b) or elsewhere?</td>
                               <?php echo "<td  >".$ethics[$k]['q4b']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td> What you believe are the consequences of the research:</td>
                                <?php echo "<td  >".$ethics[$k]['q4com']."</td>";?>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive-lg">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">PART 3: ETHICAL PROCEDURES</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">(5)</th>
                                <td>Does the research require informed consent or approval from:</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(a) research participants?</td>
                                <?php echo "<td  >".$ethics[$k]['q5a']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(b) research subjects?</td>
                               <?php echo "<td  >".$ethics[$k]['q5b']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(c) external bodies?</td>
                                <?php echo "<td  >".$ethics[$k]['q5c']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td> Explanation to answer:</td>
                                <?php echo "<td  >".$ethics[$k]['q5com']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row">(6)</th>
                                <td> Are there reasons why research subjects may need safeguards or protection?</td>
                                <?php echo "<td  >".$ethics[$k]['q6a']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>Reasons and the measures to be taken to address them:</td>
                                <?php echo "<td  >".$ethics[$k]['q6com']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row">(7)</th>
                                <td>Does the research involve any “regulated work with children” and/or “regulated work with protected adults”,
                                    therefore requiring membership of the Protecting Vulnerable Groups (PVG) Scheme?</td>
                                <?php echo "<td  >".$ethics[$k]['q7']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td><small>
                                        [Please note: if the research potentially involves “regulated work”, this MUST be raised with your HR Business Partner immediately. In this instance, the Human Resources Department will conduct a detailed assessment and will confirm whether or not PVG Membership is required.]</small>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(a) PVG membership is not required.</td>
                                <?php echo "<td  >".$ethics[$k]['q7a']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(b) PVG membership may be required for working with children.</td>
                                <?php echo "<td  >".$ethics[$k]['q7b']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(c) PVG membership may be required for working with protected adults.</td>
                                <?php echo "<td  >".$ethics[$k]['q7c']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>(d) PVG membership may be required for working with both children and protected adults</td>
                                <?php echo "<td  >".$ethics[$k]['q7d']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>Further information about the work you will be required to undertake and the nature of the contact with these groups.(Detailed)</td>
                                <?php echo "<td  >".$ethics[$k]['q7com']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>Are you already a PVG member?</td>
                                <?php echo "<td  >".$ethics[$k]['q7mem']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td> PVG Scheme number:</td>
                                <?php echo "<td  >".$ethics[$k]['q7pvg']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row">(8)</th>
                                <td> Are specified procedures or safeguards required for recording, management, or storage of data?</td>
                                <?php echo "<td  >".$ethics[$k]['q8a']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>Further details:</td>
                                <?php echo "<td  >".$ethics[$k]['q8com']."</td>";?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive-lg">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">PART 4: THE RESEARCH RELATIONSHIP</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">(9)</th>
                                <td>Does the research require you to give or make undertakings to research participants or subjects about the use of data?</td>
                                <?php echo "<td  >".$ethics[$k]['q9a']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>Outline of the likely undertakings:</td>
                                <?php echo "<td  >".$ethics[$k]['q9com']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row">(10)</th>
                                <td>Is the research likely to be affected by the relationship with a sponsor, funder or employer?</td>
                                <?php echo "<td  >".$ethics[$k]['q10a']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>How the research may be affected:</td>
                                <?php echo "<td  >".$ethics[$k]['q10com']."</td>";?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive-lg">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">PART 5: OTHER ISSUES</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">(11)</th>
                                <td>Are there any other ethical issues not covered by this form which you believe you should raise?</td>
                                <?php echo "<td  >".$ethics[$k]['q11a']."</td>";?>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>Further details:</td>
                                <?php echo "<td  >".$ethics[$k]['q11com']."</td>";?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php  }}?>
                <hr>
                <div class="form-group">
                    <form method="POST" action="" class="form-disable">
                    <input type="hidden" name="exid" value="<?php echo $exid ?>">
                    <button type="submit" style="float: right;margin-left: 30px" class="btn btn-lg btn-success" name="submit" data-submit-value="Approved">Accept</button>
                    <button type="submit" style="float: right;" class="btn btn-lg btn-danger"  name="rejected">Reject</button>
                    </form>
                    <a href="feedback.php?exid=<?php echo $exid?>" name="feedback" class="btn btn-lg btn-info">Give Feedback</a>

                </div>

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

 