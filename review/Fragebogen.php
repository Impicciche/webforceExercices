<?php

use App\Animal\Fish\Morue;
use Human\Human;
use Logger\BufferedLogger;
use Logger\Logger;
use Time\Logger as TimeLogger;

function load($fqn) {
    $file = __DIR__ . '/' . $fqn . '.php';
    echo "Import file $file \n";
    require_once $file;
}
spl_autoload_register('load');

//load('App\Animal\Fish\Morue');
new Morue();
new Human('MALE');
new Logger(__DIR__ . '/f.log');
new BufferedLogger(__DIR__ . '/b.log');
new TimeLogger();
