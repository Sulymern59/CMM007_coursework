<?php
include ('includes/connec.inc.php');
if (isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['dept'])&&isset($_POST['regno'])&&isset($_POST['email'])&&isset($_POST['password'])){

$firstname =  mysqli_escape_string($conn, $_POST['firstname']);
$lastname =   mysqli_escape_string($conn, $_POST['lastname']);
$dept =       mysqli_escape_string($conn, $_POST['dept']);
$regno =      mysqli_escape_string($conn, $_POST['regno']);
$email  =     mysqli_escape_string($conn, $_POST['email']);
$password_1 = mysqli_escape_string($conn, $_POST['password']);
$password =   md5($password_1);

if (!empty($firstname) || !empty($password) || !empty($lastname) || !empty($email) ||
!empty($dept) || !empty($regno)) {

     if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From studentuser Where email = ? Limit 1";
     $INSERT = "INSERT Into studentuser (firstname,lastname, dept,  email, password, regno) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssi", $firstname, $lastname,  $dept, $email, $password, $regno);
      $stmt->execute();
      header("location: register2.php?msg=run");
      //echo "New record inserted sucessfully";
      //echo "New record inserted sucessfully";
     } else {

          echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
}

 else {
 echo "All field are required";
 die();
}
}
?>
