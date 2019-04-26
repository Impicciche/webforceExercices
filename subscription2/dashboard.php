<?php
/**
 * Created by PhpStorm.
 * User: etudiant
 * Date: 07/03/2019
 * Time: 12:21
 */

require_once 'dbconnection.php';

session_start();

if(!isset($_SESSION['hash']))
    header("Location: login.php");

$status=0;

if(isset($_POST["submit"]))
{
    $status = 1;


}
if(isset($_POST['confirm']))
{
    $status = 2;
    $idUser = "";

    $sql = $connection->prepare("SELECT id FROM user WHERE username=" . $_SESSION['user'] . ";");

    $result = $sql->fetch();

    $idUser = $result['id'];

    $query = "INSERT INTO subscription SET iduser=$idUser, exp_date=" . date("Y-m-d 00:00:00", strtotime("+1 month")) . ", type=" . $_POST['subscription'] . ";";

    echo $query;
    $sql = $connection->prepare("INSERT INTO subscription SET iduser=$idUser, exp_date=" . date("Y-m-d 00:00:00", strtotime("+1 month")) . ", type=" . $_POST['subscription'] . ";");


}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <style>
        .cardPlan{
            width: 22%;
            background-color: #cd9093;
            padding: 10px;
        }
        form{
            display: flex;
            justify-content: space-between;
            padding: 20px;
            flex-wrap: wrap;
        }
        .radioPar{
            text-align: center;
        }
        #submitDiv{
            width: 100%;
            text-align: center;
            margin: 20px 0px;
        }
    </style>

</head>
<body>
    <haeder>
        <nav>
            <a href="logout.php">Logout</a>
        </nav>
    </haeder>
    <main>
        <h1>Welcome back <?php echo $_SESSION['user'];?></h1>
        <h2>Fitness Plan</h2>
        <?php if($status==0)
            {
                ?>
        <section>
        <h3>Choose your Fitness plan:</h3>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <article class="cardPlan">
                <h4>Basic</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet dignissimos enim eveniet in itaque laborum libero magni molestiae molestias, nam porro quaerat quas quibusdam quidem reprehenderit sequi similique vitae.</p>
                <p class="radioPar"><input type="radio" name="subscription" id="" value="B" checked></p>
            </article>
            <article class="cardPlan">
                <h4>Premium</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet dignissimos enim eveniet in itaque laborum libero magni molestiae molestias, nam porro quaerat quas quibusdam quidem reprehenderit sequi similique vitae.</p>
                <p class="radioPar"><input type="radio" name="subscription" id="" value="P"></p>
            </article>
            <article class="cardPlan">
                <h4>Silver</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet dignissimos enim eveniet in itaque laborum libero magni molestiae molestias, nam porro quaerat quas quibusdam quidem reprehenderit sequi similique vitae.</p>
                <p class="radioPar"><input type="radio" name="subscription" id="" value="S"></p>
            </article>
            <article class="cardPlan">
                <h4>Gold</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet dignissimos enim eveniet in itaque laborum libero magni molestiae molestias, nam porro quaerat quas quibusdam quidem reprehenderit sequi similique vitae.</p>
                <p class="radioPar"><input type="radio" name="subscription" id="" value="G"></p>
            </article>
            <div id="submitDiv"><input type="submit" value="Buy" name="submit"></div>
        </form>
        </section>
             <?php
            }if($status==1){
            ?>
            <section>
                <article>
                    <h2>Recap of your choosed fitness plan.</h2>
                    <h3><?php
                        switch($_POST["subscription"]){
                            case 'B':
                                echo 'Basic';
                                break;
                            case 'P':
                                echo 'Premium';
                                break;
                            case 'S':
                                echo 'Silver';
                                break;
                            case 'G':
                                echo 'Gold';
                                break;
                        }
                        ;?></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore excepturi, minus natus neque provident voluptate! Dicta dolores itaque iure magnam minus, mollitia non, omnis, pariatur perspiciatis praesentium quidem sapiente vel!</p>
                </article>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <input type="hidden" name="subscription">
                    <input type="submit" value="Confirm" name="confirm">
                </form>
            </section>
        <?php
        }if($status==2){
            ?>
        <h2>Fitness plan added with success....</h2>
        <?php
            //header("Location: dashboard.php; Refresh: 5");
        }?>
    </main>
</body>
</html>
