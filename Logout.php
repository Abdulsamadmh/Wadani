<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["FULLNAME"]);
unset($_SESSION["FULLNAME"]);
header("Location:index.php");
?>