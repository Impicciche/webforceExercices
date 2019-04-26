<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $error = false;
    if (empty($_POST['firstname'])) {
        $error = true;
    }
    if (empty($_POST['lastname'])) {
        $error = true;
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error = true;
    }


    if (!$error) {
        $connection = new PDO(
            'mysql:host=localhost;dbname=formReview',
            'root'
        );
        $connection->query(
            'INSERT INTO formReview(firstname, lastname, email)
             VALUE(
              "'.mysqli_real_escape_string($_POST['firstname']).'", 
              "'.mysqli_real_escape_string($_POST['lastname']).'", 
              "'.mysqli_real_escape_string($_POST['email']).'"
              )'
        );




        $stmt = $connection->prepare(
            'INSERT INTO formReview(firstname, lastname, email)
             VALUE(:one, :two, :three)'
        );

        $result = $stmt->execute(
            [
                'one' => $_POST['firstname'],
                'two' => $_POST['lastname'],
                'three' => $_POST['email']
            ]
        );

        if(!$result) {
            var_dump($stmt->errorInfo());
            die;
        }
    }

} else {
    header('Location: ./myForm.html');
}
