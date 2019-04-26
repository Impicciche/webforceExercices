<?php

require __DIR__ . '/level3.php';


function level2($divident, $divisor) {
    if ($divisor === 0) {
        throw new RuntimeException('Trying to divide by zero');
    }

    level3($divident, $divisor);
}