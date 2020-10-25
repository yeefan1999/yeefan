<?php
// Initialize the session
session_start();
session_destroy();
setcookie("c_login", "0", time() + (10 * 365 * 24 * 60 * 60), "/HTML/");
header("Location: sign_in.php");
?>