<?php
session_start();

//var_dump($_GET);


echo "Name for Session" . $_GET['nameforsession'];
$_SESSION['nameforsession'] = $_GET['nameforsession'];
$_SESSION['anotherparameter'] = "Something";
