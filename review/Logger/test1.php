<?php

require_once __DIR__ . '/Logger.php';

$logger = new Logger(__DIR__ . '/test1.log');

$start = microtime(true);
foreach (range(0, 1000) as $line) {
    $logger->addMessage("$line \n");
}
echo 'Execution time : ' . (microtime(true) - $start);