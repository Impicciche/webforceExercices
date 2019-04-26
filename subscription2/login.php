<?php
/**
 * Created by PhpStorm.
 * User: etudiant
 * Date: 07/03/2019
 * Time: 12:20
 */

require_once 'dbconnection.php';
require_once 'function.php';


$error = false;


if(isset($_POST['submit']))
{
    $username = $_POST['username']??'';
    $password = $_POST['password']??'';



    $sql = $connection->prepare("SELECT * FROM user WHERE username=:USERNAME AND password=:PASSWORD;");
    $sql->bindParam(':USERNAME',$username);
    $sql->bindParam(':PASSWORD', $password);

    if(!$sql->execute())
        echo "Error in the login query";

    $users = $sql->fetchAll();




    if(!count($users))
        $error=true;
    else{
        $user = $users[0];

        session_start([
            'cookie_lifetime' => 600,
        ]);

        $_SESSION['user'] = $username;

        $_SESSION['hash'] = encryptData($user['id']);



       header("Location: dashboard.php");
    }



}

if(isset($_SESSION['hash']))
    header("Location: dashboard.php");


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<aticle>
    <h1>Login:</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <?php if($error)
        {
            ?>
            <div class="error">Username and password combination not valid</div>
            <?php
        }
        ?>
        <label for="username">Username:</label><br>
        <input type="text" name="username" placeholder="Username..." id="" pattern="[a-zA-Z0-9_-!$?èàé+]+"><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="" placeholder="Password..."><br>
        <input type="submit" value="Sign In" name="submit"><button>Sign Up</button>

    </form>
</aticle>
</body>
</html>




