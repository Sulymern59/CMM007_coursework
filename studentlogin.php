<?php
include('login3.php'); // Includes Login Script
?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Student Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
  
    <form class="form-signin" action="" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <span style="color: red"><strong><?php echo $error; ?></strong></span> <br>
      <label for="inputemail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
      <span>Don't have an account?  <a href="register1.php">Sign up!</a></span>
      <p class="mt-5 mb-3 text-muted">&copy;2018</p>
    </form>
  </body>
</html>