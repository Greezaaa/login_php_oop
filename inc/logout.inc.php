<?php
session_start();
session_unset();
session_destroy();
session_start();
$_SESSION['msg'] = "User session has been destroyed.";
header("Location: ../index.php");
