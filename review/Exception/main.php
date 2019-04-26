<?php

require __DIR__ . '/level1.php';


function main($divident, $divisor) {
    level1($divident, $divisor);
}

for ($i = 10;$i >= 0; $i--) {
    main(100, $i);
}
