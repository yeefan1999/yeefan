<?php
// Initialize the session
session_start();
session_destroy();
setcookie("ad_login", "0", time() + (10 * 365 * 24 * 60 * 60), "/pages/");
header("Location: login.php");

?>