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
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <!-- Register Form -->
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3 class="panel-title"><strong>FORGOT PASSWORD</strong></h3></div>
                        <div class="panel-body">
                            <h4>To reset password fill in the e-mail used for registration.</h4><br/>
                            <form action="php_processor.php" class="form-horizontal" id="form_forgot_password" name="form_forgot_password" method="POST">                            
                                <div class="form-group">
                                    <label for="forgot_password_email" class="col-sm-3 control-label hidden-xs">Account email </label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="forgot_password_email" name="forgot_password_email" placeholder="Email" maxlength="50">
                                    </div>                                     
                                </div>                       
                                <div class="form-group">
                                   <div class="col-sm-2 col-sm-offset-9">
                                        <button type="submit" id="forgot_password_btn" name="forgot_password_btn" class="btn btn-warning">SEND</button>
                                    </div>
                                </div>
                            </form>                            
                        </div>
                    </div>
                </div>                
            </div>            
            <div class="row">
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
