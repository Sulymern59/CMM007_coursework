<?php
/**
 * Created by PhpStorm.
 * User: Suleiman US
 * Date: 3/23/2018
 * Time: 9:19 PM
 */
session_start();
$connect = mysqli_connect("localhost", "root" , "");
mysqli_select_db($connect, "test");
$duration = "";
$res = mysqli_query($connect, "SELECT * FROM timer");
while ($row = mysqli_fetch_array($res)){

    $duration = $row ["duration"];
}
$_SESSION ["duration"]= $duration;
$_SESSION ["start_time"]= date("Y-m-d H:i:s");

$end_time = date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes', strtotime($_SESSION["start_time"])));

$_SESSION["end_time"]= $end_time;

?>
<script type="text/javascript">
    window.location = "index.php";
</script>