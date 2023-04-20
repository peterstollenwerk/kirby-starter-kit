<?php

$root = realpath(__DIR__);
echo "Root: " . $root . '<br>';

$target =  $root . '/symlink-test.txt';
echo "Target: " . $target . '<br>';

$f = file_exists($target);
echo "Target file exists: ";
var_dump($f);
echo '<br>';
echo '<br>';


$link = $root . '/media/symlink_test/test.txt';
echo 'Link: ' . $link . '<br>';
$dir = dirname($link);
echo 'Dirname: ' . $dir . '<br>';

echo 'Dirname: ';
var_dump($dir);

mkdir($dir); // not recursive!
symlink($target, $link);
sleep(1);

$f = file_exists($link);

echo '<br>';
echo 'Symlink exists: ';
var_dump($f);
echo '<br>';

?>

<a href="<?= '/media/symlink_test/test.txt' ?>">/media/symlink_test/test.txt</a>
<hr>


<?php

phpinfo();

?>