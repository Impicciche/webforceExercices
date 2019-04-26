<?php

require_once __DIR__ . '/BufferedLogger.php';

$logger = new BufferedLogger(__DIR__ . '/test2.log');

$start = microtime(true);
foreach (range(0, 1000) as $line) {
    $logger->addMessage("$line \n");
}
echo 'Execution time : ' . (microtime(true) - $start);