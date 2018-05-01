<?php
include ('includes/connec.inc.php');

session_start(); 
  if (isset($_SESSION['email'])) {

    $sql = "SELECT id FROM studentuser WHERE email = '" . $_SESSION['email'] . "'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);
  }
  

if (isset($_POST['expname'])&&isset($_POST['studentname'])&&isset($_POST['proj'])&&isset($_POST['course'])&&isset($_POST['dept'])) {

$expname =  mysqli_escape_string($conn, $_POST['expname']);
$studentname =   mysqli_escape_string($conn, $_POST['studentname']);
$proj =       mysqli_escape_string($conn, $_POST['proj']);
$course =    mysqli_escape_string($conn, $_POST['course']);
$dept  =     mysqli_escape_string($conn, $_POST['dept']);


if (!empty($expname) || !empty($studentname) || !empty($proj) || !empty($course) ||!empty($dept)){
    
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT expname From experiments Where expname = ? Limit 1";
     $INSERT = "INSERT Into experiments (expname,studentname, proj,  course, dept, studid) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $expname);
     $stmt->execute();
     $stmt->bind_result($expname);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssi", $expname, $studentname,  $proj, $course, $dept, $row['id']);
      $stmt->execute();
     header("location: addexp.php");
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
