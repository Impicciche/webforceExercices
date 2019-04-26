<?php

require_once __DIR__ . '/Human/Human.php';

use Human\Human;

$girl = new Human();
$girl->setGender('F');
echo 'Girl is a '.Human::guessGender($girl);

echo "\n";

$boy = new Human();
$boy->setGender('E');
echo 'Boy is a '.Human::guessGender($boy);
