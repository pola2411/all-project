<?php
include './function.php';

session_unset();
session_destroy();
go("login.php");
?>