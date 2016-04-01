<?php

$mail_template = "<!DOCTYPE html>
<html style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0;\">
    <head>
        <!-- If you delete this meta tag, Half Life 3 will never be released. -->
        <meta name=\"viewport\" content=\"width=device-width\">
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
        <title>Account activation</title>
        
    </head>
    <body bgcolor=\"#FFFFFF\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;\">
        <!-- BODY -->
        <table class=\"body-wrap\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; width: 100%; margin: 0; padding: 0;\">
            <tr style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0;\">
                <td style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0;\"></td>
                <td class=\"container\" bgcolor=\"#FFFFFF\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;\">
                    <div class=\"content\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; max-width: 600px; display: block; margin: 0 auto; padding: 15px;\">
                        <table style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; width: 100%; margin: 0; padding: 0;\">
                            <tr style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0;\">
                                <td style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0;\">
                                    <h3 style=\"font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; line-height: 1.1; color: #000; font-weight: 500; font-size: 27px; margin: 0 0 15px; padding: 0;\">Hi, $fn</h3>
                                    <p class=\"lead\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-weight: normal; font-size: 17px; line-height: 1.6; margin: 0 0 10px; padding: 0;\">Your account on social.com is not active.</p>
                                    <p style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-weight: normal; font-size: 14px; line-height: 1.6; margin: 0 0 10px; padding: 0;\"><strong style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0;\">This email activation will expire in 24 hours! </strong></p>
                                    <!-- Callout Panel -->
                                    <p class=\"callout\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-weight: normal; font-size: 14px; line-height: 1.6; background-color: #ECF8FF; margin: 0 0 15px; padding: 15px;\">
                                        To activate your account on social.com, click this link: <a href=\"http://$site_name/reglog/processes/email_activation.php?idu=$idu&amp;ecv=$ecv\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #2BA6CB; font-weight: bold; margin: 0; padding: 0;\">Click here! »</a>
                                    </p>
<!-- /Callout Panel -->
                                    <!-- social & contact -->
                                    <table class=\"social\" width=\"100%\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; width: 100%; background-color: #ebebeb; margin: 0; padding: 0;\" bgcolor=\"#ebebeb\">
                                        <tr style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0;\">
                                            <td style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0;\">
                                                <!-- column 1 -->
                                                <table align=\"left\" class=\"column\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; width: 280px; float: left; min-width: 279px; margin: 0; padding: 0;\">
                                                    <tr style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0;\">
                                                        <td style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 15px;\">                                                            <h5 class=\"\" style=\"font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; line-height: 1.1; color: #000; font-weight: 900; font-size: 17px; margin: 0 0 15px; padding: 0;\">Connect with Us:</h5>
                                                            <p class=\"\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-weight: normal; font-size: 14px; line-height: 1.6; margin: 0 0 10px; padding: 0;\"><a href=\"#\" class=\"soc-btn fb\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #FFF; font-size: 12px; text-decoration: none; font-weight: bold; display: block; text-align: center; background-color: #3B5998 !important; margin: 0 0 10px; padding: 3px 7px;\">Facebook</a> <a href=\"#\" class=\"soc-btn tw\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #FFF; font-size: 12px; text-decoration: none; font-weight: bold; display: block; text-align: center; background-color: #1daced !important; margin: 0 0 10px; padding: 3px 7px;\">Twitter</a> <a href=\"#\" class=\"soc-btn gp\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #FFF; font-size: 12px; text-decoration: none; font-weight: bold; display: block; text-align: center; background-color: #DB4A39 !important; margin: 0 0 10px; padding: 3px 7px;\">Google+</a></p>                                                      </td>
                                                    </tr>
                                                </table>
<!-- /column 1 -->
                                                <!-- column 2 -->
                                                <table align=\"left\" class=\"column\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; width: 280px; float: left; min-width: 279px; margin: 0; padding: 0;\">
                                                    <tr style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0;\">
                                                        <td style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 15px;\">
                                                            <h5 class=\"\" style=\"font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; line-height: 1.1; color: #000; font-weight: 900; font-size: 17px; margin: 0 0 15px; padding: 0;\">Contact Info:</h5>												
                                                            <p style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-weight: normal; font-size: 14px; line-height: 1.6; margin: 0 0 10px; padding: 0;\">Phone: <strong style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0;\">0761568271</strong><br style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0;\">
                                                                Email: <strong style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0;\"><a href=\"emailto:gabidinu987@gmail.com\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #2BA6CB; margin: 0; padding: 0;\">hseldon@trantor.com</a></strong></p>

                                                        </td>
                                                    </tr>
                                                </table>
<!-- /column 2 -->
                                                <span class=\"clear\" style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; display: block; clear: both; margin: 0; padding: 0;\"></span>
                                            </td>
                                        </tr>
                                    </table>
<!-- /social & contact -->
                                </td>
                            </tr>
                        </table>
                    </div>
<!-- /content -->
                </td>
                <td style=\"font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; margin: 0; padding: 0;\"></td>
            </tr>
        </table>
<!-- /BODY -->
    </body>
</html>
";
