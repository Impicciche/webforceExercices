<?php
include 'dbconnect.php';

//If form not submitted, display form.
if (!isset($_POST['submit'])){
?>
 
<form method="post" action="form.php">
    titletosearch:  <br />
<input type="text" name="titletosearch" />
    <br />description:  <br />

    <input type="text" name="descriptiontosearch" />

    <p />
<input type="submit" name="submit" value="Go" />
</form>
 
<?php
//If form submitted, process input.
}else{
 //Retrieve string from form submission.

    if (empty($_POST['titletosearch']) && (empty($_POST['titletosearch']) )) echo "Form empty";
   // if ($_POST['titletosearch'] == "" ) echo "titletosearch empty";
    else {
        var_dump($_POST);

        echo "searching for titletosearch " . $_POST['titletosearch'];
        echo "searching for descriptiontosearch " . $_POST['descriptiontosearch'];


        $SearchStringTitle = "%".$_POST['titletosearch']."%";
        $SearchStringDescription = "%".$_POST['descriptiontosearch']."%";


        $SQL = $connection->prepare('SELECT id,title FROM article WHERE title LIKE :TITLE OR description LIKE :DESCRIPTION ');
        $SQL->bindParam(':TITLE',$SearchStringTitle, PDO::PARAM_STR);
        $SQL->bindParam(':DESCRIPTION',$SearchStringDescription, PDO::PARAM_STR);

        $SQL->execute();
        $SQL->setFetchMode(PDO::FETCH_ASSOC);
        print_r($SQL->rowCount());
        $result = $SQL->fetchAll();
        var_dump($result);

        for($ArrayIndex = 0 ; $ArrayIndex < count($result);$ArrayIndex++ ) {
            echo "<br>ArrayIndex ".$ArrayIndex;
            echo "<br>".$result[$ArrayIndex]['title'];

        }

    }
}
?>
 
</body>
</html>