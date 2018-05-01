<?php
   session_start();


        if(isset($_POST['email'])){
            $_SESSION['email']= $_POST['email'];
            echo "Welcome {$_SESSION['email']}";
        }

        if (!$_SESSION['email']){
            echo "Please login";
            exit;
        }