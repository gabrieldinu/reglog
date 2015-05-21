<?php
require_once 'includ/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Social Site</title>

        <!-- CSS3 & Bootstrap 3.3.2 -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/index.css">

    </head>
    <body>
        <?php include_once 'header.php'; ?>

        <div class="container" id="main">
            <div class="row" >
                <div class="col-sm-6 col-sm-offset-3 text-center">
                    <?php notify(); ?>
                </div>
            </div>       
        </div>

        <?php include_once 'footer.php'; ?> 
        <!-- JavaScript & Bootstrap 3.3.2
       ================================================== -->
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>
    </body>
</html>
