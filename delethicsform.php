<?php
session_start();
include ('includes/connec.inc.php');
if (isset($_GET['exid'])) {
    $exid = $_GET['exid'];
// sql to delete a record
    $sql = "DELETE FROM experiments WHERE id=$exid";

    if ($conn->query($sql) === TRUE) {
        header("location: addexp.php?msg=run");
    } else {
        echo "Error deleting record";
}}
