<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';
include 'header.php';

$SQL = $connection->prepare('SELECT * FROM article');
$SQL->execute();
$SQL->setFetchMode(PDO::FETCH_ASSOC);
print_r($SQL->rowCount());
$result = $SQL->fetchAll();

//var_dump($result);
print_r($_SESSION);

	/// UPDATED LINE ////////////////////////////////
    if($_SESSION && $_SESSION['loggedin'] == true) { 
		echo "<div class='row'><p>Hello ".$_SESSION['username']." <a href='new.php'> new.php </a></p></div>";
	}


for ($count = 0; $count < count($result); $count++) { 
	echo "<div class='row'>";

  
	if(is_array($result[$count]) == true ) {
		foreach ($result[$count] as $key => $value) {
			echo "<div class='col'>";
			if($key == 'img') echo "<img src='$value'>";
			else echo "<p> <a href='view.php?id=".$result[$count]['id']."'</a> $value </p>";
			echo "</div>";		
		}
	}
	echo "</div>";
}



