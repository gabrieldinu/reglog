<?php
require_once "/includ/connect.php";
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
        <div class="col-sm-6 hidden-xs">
            <!--                    <div id="map-canvas"></div>     -->
        </div>
        <div class="col-sm-6">
            <!-- Register Form -->
            <div class="panel panel-info">
                <div class="panel-heading"><h3 class="panel-title"><strong>REGISTER</strong></h3></div>
                <div class="panel-body">
                    <form action="#" class="form-horizontal" id="form_register" name="form_register" method="POST">
                        <div class="form-group">
                            <label for="email_register" class="col-sm-3 control-label hidden-xs">Email</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="email_register" name="email_register" placeholder="Email" maxlength="50">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-3 col-xs-offset-7">
                                <button type="submit" id="user_register" name="user_register" class="btn btn-warning">
                                    SIGN UP
                                </button>
                            </div>
                        </div>
                    </form>
                    <p>By clicking SIGN UP, you agree to our <a href="termsofuse.php">Terms of use</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>

<!-- JavaScript & Bootstrap 3.3.2
================================================== -->
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script>
</body>
</html>
