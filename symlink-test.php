<?php
function fileExists($path) {
    return (file_exists($path)) ? 'true' : 'false';
};
function dirExists($path) {
    return is_dir($path) ? 'true' : 'false';
}

$root = realpath(__DIR__);
$filename = 'symlink-hello.txt';
$targetPath = $root . '/'. $filename;
$targetExists = fileExists($targetPath);

$subdirName = date('Ymd-His');
$symlinkRootRelativePath = '/' . 'symlink' . '/' . $subdirName . '/' . $subdirName; 
$symlinkRoot = $root . $symlinkRootRelativePath;
if(!is_dir($symlinkRoot)) {
    mkdir($symlinkRoot, 0777, $recursively = true);
}

$symlinkRootExists = dirExists($symlinkRoot);


$symlinkFilename = 'test.txt';
$symlinkPath = $symlinkRoot . '/' . $symlinkFilename;
if(!file_exists($symlinkPath)) {
    symlink($targetPath, $symlinkPath);
}
$symlinkTarget = readlink($symlinkPath);

$symlinkExists = fileExists($symlinkPath);
$symlinkRelativePath = $symlinkRootRelativePath . '/' . $symlinkFilename; 

?>



<hr>

<style>
    .label { display: inline-block; min-width: 25ch; }
    [data-file-exists="false"] { color: red; }
    [data-file-exists="true"] { color: green; }
</style>

<span class="label">$root:</span> <?= $root ?> <br>
<span class="label">$targetPath:</span> <?= $targetPath ?> <br>
<span class="label">$targetExists:</span> <span data-file-exists="<?= $targetExists ?>"><?= $targetExists ?></span> <br>
<br>
<span class="label">$symlinkPath:</span>  <?= $symlinkPath ?>  <br>
<span class="label">$symlinkRootExists:</span> <span data-file-exists="<?= $symlinkRootExists ?>"><?= $symlinkRootExists ?></span> <br>
<span class="label">$symlinkExists:</span> <span data-file-exists="<?= $symlinkExists ?>"><?= $symlinkExists ?></span> <br>
<span class="label">$symlinkTarget:</span> <span data-file-exists="<?= $symlinkTarget ?>"><?= $symlinkTarget ?></span> <br>
<br>
<br>
<span class="label">$symlinkRootRelativePath:</span> <span data-file-exists="<?= $symlinkRootRelativePath ?>"><?= $symlinkRootRelativePath ?></span> <br>
<span class="label">$symlinkRelativePath:</span> <span data-file-exists="<?= $symlinkRelativePath ?>"><?= $symlinkRelativePath ?></span> <br>




<br>
<a href="<?= $symlinkRelativePath ?>"><?= $symlinkRelativePath ?></a>

<?php

phpinfo();

?>