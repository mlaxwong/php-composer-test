<?php
require __DIR__.'/vendor/autoload.php';


// die;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Composer\Util\Platform;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 0);
// echo getenv('COMPOSER_HOME');
// $alt = Platform::isWindows() ? 'APPDATA' : 'HOME';
// echo getenv($alt);die;
// die;

$_ENV['COMPOSER_HOME'] = __DIR__ . '/runtime';
// $_ENV['COMPOSER_HOME'] = 'C:\Users\Inspiren\AppData\Roaming\Composer';
$process = new Process([__DIR__ . '/vendor/bin/composer', 'require', 'yiisoft/yii2']);
$process->run();

// executes after the command finishes
if (!$process->isSuccessful()) {
    // throw new ProcessFailedException($process);
    echo '<pre>';
    echo (new ProcessFailedException($process))->getMessage();
    die;
}

echo '<pre>';
echo $process->getOutput();
echo '</pre>';

// $process = new Process(['git', '--version']);
// $process->run();

// // executes after the command finishes
// if (!$process->isSuccessful()) {
//     throw new ProcessFailedException($process);
// }

// echo $process->getOutput();