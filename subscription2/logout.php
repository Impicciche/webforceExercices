<?php
/**
 * Created by PhpStorm.
 * User: etudiant
 * Date: 07/03/2019
 * Time: 14:54
 */


$params = session_get_cookie_params();

setcookie(session_name(), '', time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
);
session_destroy();

header("Location: login.php");
?>