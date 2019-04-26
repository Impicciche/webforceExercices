<?php 
    session_start();

    echo "Name of the session: " . $_GET['nameforsession'];

    $_SESSION['nameforsession'] = $_GET['nameforsession'];
?>