<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 06/03/2019
 * Time: 08:47
 */

include 'dbconnect.php';

//var_dump($_GET);

/*
foreach ($_GET as $key => $value) {
    echo "<br><br>MyParam: $key VAlue: $value";
}
*/

//echo "idtodosomething" . $_GET['idtodosomething'];

echo "title to search for" . $_GET['titletosearch'];



$SQL = $connection->prepare('SELECT id,title FROM article WHERE title LIKE :TITLE');
$SQL->bindParam(':TITLE',$_GET['titletosearch'], PDO::PARAM_STR);
$SQL->execute();
$SQL->setFetchMode(PDO::FETCH_ASSOC);
print_r($SQL->rowCount());
$result = $SQL->fetchAll();
var_dump($result);

for($ArrayIndex = 0 ; $ArrayIndex < count($result);$ArrayIndex++ ) {
    echo "<br>ArrayIndex ".$ArrayIndex;
    echo "<br><a href='view.php?'>".$result[$ArrayIndex]['title']."</a>";

}

