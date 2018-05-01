<?php
/**
 * Created by PhpStorm.
 * User: Suleiman US
 * Date: 3/23/2018
 * Time: 10:02 PM
 */
session_start();
require 'includes/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ethical Approval System </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>

<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1>My First Bootstrap Page</h1>
                <p>This is some text.</p>
            </div>

            <div class="col-lg-4">
                <h1>My Second Bootstrap Page</h1>
                <p>This is some text.</p>
            </div>
        </div>

    </div>
</main>
<?php
include('includes/footer.php');
?>
</body>
</html>