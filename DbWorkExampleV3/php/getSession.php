<?php
session_start();

//var_dump($_SESSION);


echo "Current Name in Session" . $_SESSION["nameforsession"];
echo "Current anotherparameter in Session" . $_SESSION["anotherparameter"];
