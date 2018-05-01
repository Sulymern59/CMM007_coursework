<?php
/**
 * Created by PhpStorm.
 * User: Suleiman US
 * Date: 4/28/2018
 * Time: 12:37 PM
 */
error_reporting(E_ERROR | E_PARSE);
include ('../../includes/connec.inc.php');
if (isset($_GET['exid'])) {
    $exid = $_GET['exid'];}

if (isset($_POST['submit'])) {
    $_SESSION['POST']['q9a'] = mysqli_escape_string($conn, $_POST['q9a']);
    $_SESSION['POST']['q9com'] = mysqli_escape_string($conn, $_POST['q9com']);
    $_SESSION['POST']['q10a'] = mysqli_escape_string($conn, $_POST['q10a']);
    $_SESSION['POST']['q10com'] = mysqli_escape_string($conn, $_POST['q10com']);
    $_SESSION['POST']['q11a'] = mysqli_escape_string($conn, $_POST['q11a']);
    $_SESSION['POST']['q11com'] = mysqli_escape_string($conn, $_POST['q11com']);
    if (isset($_FILES['addfile'])){
    $target_dir = "ethicsform/";
    $target_file = $target_dir . basename($_FILES["addfile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["addfile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["addfile"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["addfile"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    }
    foreach ($_POST as $key => $value) {
        $_SESSION['POST'][$key] = $value;
    }

    extract($_SESSION['POST']); // Function to extract array.
    $query = "UPDATE `ethicsform` SET q9a='$q9a', q9com='$q9com', q10a='$q10a', q10com='$q10com', q11a='$q11a', q11com='$q11com', addfile='$target_file' WHERE exid=$exid";

    if ($conn->query($query) === TRUE) {
        echo "<script> alert('Ethics Form succefully updated!');
                window.location='../../addexp.php'
                    </script>";
    } else {
        echo mysqli_error($conn);
    }
}

    else
    {
        echo mysqli_error($conn); // Redirecting to first page.

    }



?>