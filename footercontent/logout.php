<?php
session_start();
session_unset();
session_destroy();
header("Location: loginsignup.php"); // Redirect to login/signup page
exit();
?>
