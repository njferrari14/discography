<?php ob_start();
try {
include './includes/title.php';
require_once './includes/header.php';

$error = '';
if (isset($_POST['login'])) {
    session_start();
    $username = trim($_POST['username']);
    $password = trim($_POST['pwd']);
    $_SESSION['username'] = $username;
    // location to redirect on success
    $redirect = 'http://localhost/working_revamp/admin.php';
    require_once './includes/authenticate_pdo.php';
}
?>

<body>
<?php
require_once './includes/menu.php';
if ($error) {
    echo "<p>$error</p>";
} elseif (isset($_GET['expired'])) { ?>
    <p>Your session has expired. Please log in again.</p>
<?php } ?>

<div class="container col-3" style="min-width: 350px; max-width: 400px; background: #C9BF67; padding-top:15px; padding-bottom:15px; margin-top: 150px;">
    <div class="row">
        <div class="col-12">    
            <div class="col bg-danger text-white" style="min-width: 300px; max-width: 400px; padding-top: 15px; padding-left: 25px; padding-bottom: 10px;">
                <form method="post" action="login.php">
                    <p class="form-group col">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </p>
                    <p class="form-group col">
                        <label for="pwd">Password:</label>
                        <input type="password" name="pwd" id="pwd" class="form-control">
                    </p>
                    <p class="form-group col">
                        <input name="login" type="submit" value="Log in" class="form-control">
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="js/jquery.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } catch (Exception $e) {
    ob_end_clean();
    header('Location: http://localhost/phpsols-4e/error.php');
}
ob_end_flush();
?>