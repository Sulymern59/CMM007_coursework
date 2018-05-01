<?php
/**
 * Created by PhpStorm.
 * User: Suleiman US
 * Date: 4/28/2018
 * Time: 4:38 AM
 */

if (isset($_POST['submit'])) {

    if (isset($_POST['q9a'])&&isset($_POST['q10a'])&&isset($_POST['q11a'])||isset($_POST['q9com'])||isset($_POST['q10com'])||isset($_POST['q11com'])){

        if (empty($_POST['q9a'])|| empty($_POST['q10a'])|| empty($_POST['q11a'])){
            // Setting error message
            $_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
            header("location: step5.php"); // Redirecting to first page
        } else {

            $_SESSION['POST']['q9a'] = mysqli_escape_string($conn, $_POST['q9a']);
            $_SESSION['POST']['q9com'] = mysqli_escape_string($conn, $_POST['q9com']);
            $_SESSION['POST']['q10a'] = mysqli_escape_string($conn, $_POST['q10a']);
            $_SESSION['POST']['q10com'] = mysqli_escape_string($conn, $_POST['q10com']);
            $_SESSION['POST']['q11a'] = mysqli_escape_string($conn, $_POST['q11a']);
            $_SESSION['POST']['q11com'] = mysqli_escape_string($conn, $_POST['q11com']);

            if(isset($_FILES['addfile'])){
                $target = "ethicsform/";
                $target = $target . basename( $_FILES['addfile']['name']);
                $pic=($_FILES['addfile']['name']);


            }
            foreach ($_POST as $key => $value) {
                $_SESSION['POST'][$key] = $value;
            }
            extract($_SESSION['POST']); // Function to extract array.
            move_uploaded_file($file_loc,$folder.$final_file);
            $query = "UPDATE `ethicsform` SET  q1a='$q1a', q1b='$q1b', q1c='$q1c', q1d='$q1d', q1e='$q1e', q1com='$q1com', q2a='$q2a', q2com='$q2com', q3a='$q3a', q3b='$q3b', q3c='$q3c', q3d='$q3d', q3com='$q3com', q4a='$4a', q4b='$q4b', q4com='$q4com', q5a='$q5a', q5b='$q5b', q5c='$q5c', q5com='$q5com', q6a='$q6a', q6com='$q6com', q7='$q7', q7a='$q7a', q7b='$q7b', q7c='$q7c', q7d='$q7d', q7com='$q7com', q7mem='$q7mem', q7pvg='$q7pvg', q8a='$q8a', q8com='$q8com', q9a='$9a', q9com='$q9com', q10a='$q10a', q10com='$q10com', q11a='$q11a', q11com='$q11com' WHERE exid='$exid'";

            if ($conn->query($query) === TRUE) {
                (move_uploaded_file($_FILES['addfile']['tmp_name'],$target));
                echo "<script> alert('Sucessfully updated!');
                window.location='edit2.php'
                     </script>";
            } else {
                echo mysqli_error($conn);
            }
            unset($_SESSION['POST']); // Destroying session.

        }
    } else {
        echo "Error updating database!"; // Redirecting to first page.
    }
}