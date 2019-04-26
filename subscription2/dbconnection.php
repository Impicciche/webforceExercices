<?php
/**
 * Created by PhpStorm.
 * User: etudiant
 * Date: 07/03/2019
 * Time: 12:32
 */

$db = "subscription";
$host = "localhost";
$user= "root";
$password="";

$dns = "mysql:dbname=$db;host=$host";

try{
    $connection = new PDO($dns,$user,$password);

}catch (PDOException $exp)
{
    exit("Error in the database connection " . $exp->getMessage());
}
?>