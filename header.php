<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Social Site</a>
        <?php
        if (!isset($_SESSION['id_user'])) {
            include_once './includ/header_logedout.php';
        } else { include_once './includ/header_logedin.php'; }
        ?>
    </div>
</nav>  