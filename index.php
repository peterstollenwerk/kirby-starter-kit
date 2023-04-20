<?php

require __DIR__ . '/symlink-test.php';

return;

require __DIR__ . '/kirby/bootstrap.php';

echo (new Kirby)->render();