<?php include ('studreg.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#check').load('check.php').show();

      $('#regstud').keyup(function(){
        $.post('check.php', {regno:form.regno.value}, 
          function(result){ 
          $('#check').html(result).show();
        });
      });
    });
  </script>
</head>
<body>

<div class="container-fluid well well-lg">
<form class="form-horizontal" action="studreg.php" method="POST" name= "form">
<fieldset class="container-fluid">

<!-- Form Name -->
<legend style="text-align: center;"><strong>Student Registration Form</strong></legend>
<span style="color: green; text-align: center;"><?php
      if(isset($_GET['msg']) && !empty($_GET['msg']))
      {
        echo "<h4>New student added successfully!</h4>";
      }
?> </span> <br><br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">First name</label>  
  <div class="col-md-4">
  <input name="firstname" type="text" placeholder="John" class="form-control input-md" required="">
    
  </div>
</div>
    <br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Last name</label>  
  <div class="col-md-4">
  <input name="lastname" type="text" placeholder="Smith" class="form-control input-md" required="">
  </div>
</div><br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Department</label>  
  <div class="col-md-4">
  <input name="dept" type="text" placeholder="Pharmacy" class="form-control input-md" required="">
  </div>
</div>
    <br>
<!-- Reg No. input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="reginput">Registration no.</label>  
  <div class="col-md-4">
  <input name="regno" type="text" placeholder="1713978" id= "regstud" class="form-control input-md" required="" maxlength="7">
  </div><div id="check"></div>
</div><br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-mail</label>  
  <div class="col-md-4">
  <input name="email" type="text" placeholder="s.suleiman.rgu.ac.uk" class="form-control input-md" required="">
    
  </div>
</div>
    <br>
<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Password</label>
  <div class="col-md-4">
    <input name="password" type="password" placeholder="Enter your password" class="form-control input-md" required="">
    
  </div>
</div>
    <br>
<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Repeat password </label>
  <div class="col-md-4">
    <input name="repassword" type="password" placeholder="Repeat your password" class="form-control input-md" required="">
    
  </div>
</div>
    <br>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button name="submit" type= "submit" class="btn" style="background-color: purple;color: white">Register</button>
  </div>
</div>

</fieldset>
</form>
</div>
</div>
</body>
</html>