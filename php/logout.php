<?php //log out and erase all session data
if(!session_id()) session_start();
session_destroy();
header("Location: ../index.php");
?>