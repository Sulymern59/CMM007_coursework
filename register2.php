<?php include ('eaoreg.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row" style="margin-left: 99px">
<img src = "images/design2.png" alt = "banner">
</div>
<div class="container-fluid well well-lg">
<form class="form-horizontal" action="eaoreg.php" method="POST">
<fieldset>

<!-- Form Name -->
<legend style="text-align: center;"><strong>Experiment Approval Officer Registration Form</strong></legend>
<span style="color: green; text-align: center;"><?php
      if(isset($_GET['msg']) && !empty($_GET['msg']))
      {
        echo "<h4>New EAO added successfully!</h4>";
      }
?> </span> 
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">First name</label>  
  <div class="col-md-4">
  <input name="firstname" type="text" placeholder="Suleiman" class="form-control input-md" required="1">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Last name</label>  
  <div class="col-md-4">
  <input name="lastname" type="text" placeholder="Usman" class="form-control input-md" required="1">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Department</label>  
  <div class="col-md-4">
  <input name="dept" type="text" placeholder="microbiology" class="form-control input-md" required="1">
  </div>
</div>

<!-- Reg No. input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="reginput">Staff no.</label>  
  <div class="col-md-4">
  <input name="staffno" type="text" placeholder="1713978" class="form-control input-md" required="1" maxlength="7">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-mail</label>  
  <div class="col-md-4">
  <input name="email" type="text" placeholder="s.suleiman.rgu.ac.uk" class="form-control input-md" required="1">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Password</label>
  <div class="col-md-4">
    <input name="password" type="password" placeholder="Enter your password" class="form-control input-md" required="1">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Repeat password </label>
  <div class="col-md-4">
    <input name="repassword" type="password" placeholder="Repeat your password" class="form-control input-md" required="1">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button name="submit" type="submit" class="btn btn-primary">Register</button>
  </div>
</div>

</fieldset>
</form>
</div>
</div>
</body>
</html>