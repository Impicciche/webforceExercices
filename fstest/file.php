<?php
$fileResourse = fopen("fileTest.txt","a+");

echo "I'm in : " . getcwd() . "\n<br><br>";

echo "The siye of my php file is: " . filesize("fileTest.txt") . "KB\n<br><br>";

fseek($fileResourse,-100,SEEK_END);

fputs($fileResourse,"TEXT ADDED BY FPUTS");

fseek($fileResourse,0);





$content = fread($fileResourse,filesize("fileTest.txt"));

echo $content;



fclose($fileResourse);

function fattorial($num)
{
    if(!$num)
        return 1;

    return $num*fattorial(--$num);
}

echo '<br><br>' . fattorial(5);


?>