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
                <div class="col-sm-6 hidden-xs">                    
                    <div id="map-canvas"></div>     
                </div>
                <div class="col-sm-6">
                    <!-- Register Form -->
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3 class="panel-title"><strong>REGISTER</strong></h3></div>
                        <div class="panel-body">                            
                            <form action="php_processor.php" class="form-horizontal" id="form_register" name="form_register" method="POST">
                                <div class="form-group">
                                    <label for="first_name" class="col-sm-3 control-label hidden-xs">First Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" maxlength="30">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="last_name" class="col-sm-3 control-label hidden-xs">Last Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" maxlength="30">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="birthday" class="col-sm-3 control-label hidden-xs">Birthday</label>
                                    <div class="col-sm-7" id="birthday">
                                        <select form="form_register" name="day" id="day">
                                            <option selected disabled hidden>Day</option>
                                            <?php
                                            for ($d = 1; $d <= 31; $d++) {
                                                $days[] = $d;
                                            }
                                            foreach ($days as $day) {
                                                echo '<option value="' . $day . '">' . $day . '</option>';
                                            }
                                            ?>                                     
                                        </select>
                                        <select form="form_register" name="month" id="month">
                                            <option selected disabled hidden>Month</option>
                                            <?php
                                            for ($m = 1; $m <= 12; $m++) {
                                                $months[] = $m;
                                            }
                                            foreach ($months as $month) {
                                                echo '<option value="' . $month . '">' . $month . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <select form="form_register" name="year" id="year">
                                            <option selected disabled hidden>Year</option>
                                            <?php
                                            for ($y = date("Y"); $y >= 1920; $y--) {
                                                $years[] = $y;
                                            }
                                            foreach ($years as $year) {
                                                echo '<option value="' . $year . '">' . $year . '</option>';
                                            }
                                            ?>                                                                                              
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email_register" class="col-sm-3 control-label hidden-xs">Email</label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" id="email_inregistrare" name="email_register" placeholder="Email" maxlength="50">
                                    </div>
                                </div>                             
                                <div class="form-group">
                                    <label for="password_register" class="col-sm-3 control-label hidden-xs">Password</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="password_register" name="password_register" placeholder="Password" maxlength="50">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="repassword_register" class="col-sm-3 control-label hidden-xs">Re-enter password</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="repassword_register" name="repassword_register" placeholder="Re-enter password" maxlength="50">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city" class="col-sm-3 control-label hidden-xs">City</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $ul_city; ?>" maxlength="30">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="col-sm-3 control-label hidden-xs">Gender</label>
                                    <div class="col-sm-7" id="gender">
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" id="male" value="m"><span class="glyphicon glyphicon-male"></span> Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" id="female" value="f"><span class="glyphicon glyphicon-female"></span> Female
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-3 col-xs-offset-7">
                                        <button type="submit" id="user_register" name="user_register" class="btn btn-warning">SIGN UP</button>
                                    </div>
                                </div>
                            </form>
                            <p>By clicking SIGN UP, you agree to our <a href="">Terms of use</a></p>
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
        <script src="js/index.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <script src="js/geolocation.js"></script>>
    </body>
</html>
