<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>                    
</div>
<div id="navbar" class="navbar-collapse collapse">
    <form action="php_processor.php" class="navbar-form navbar-right" id="form_login" method="POST">                        
        <div class="form-group">
            <input type="email" placeholder="Email" class="form-control" id="email_login" name="email_login" maxlength="50">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Password" class="form-control" id="password_login" name="password_login" maxlength="50">
        </div>
        <button type="submit" id="btn_login" name="btn_login" class="btn btn-success">Log In</button>         
        <a href="forgot_password.php" id="forgot_password">Forgot password?</a>
    </form>
</div>