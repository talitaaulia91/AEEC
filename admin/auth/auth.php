<?php

session_start();
if(!isset($_SESSION["user"])) header("Location: ../../client/login/login.php");