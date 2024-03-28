<?php

use Cake\Log\Engine\FileLog;
use Cake\Log\Log;

CONST LOG_PATH = __DIR__.'/../log/';

Log::setConfig('info', [
    'className' => FileLog::class,
    'path' => LOG_PATH,
    'levels' => ['info'],
    'file' => 'info',
]);

Log::setConfig('debug', [
    'className' => FileLog::class,
    'path' => LOG_PATH,
    'levels' => ['notice', 'debug'],
    'file' => 'debug',
]);

Log::setConfig('error', [
    'className' => FileLog::class,
    'path' => LOG_PATH,
    'levels' => ['warning', 'error', 'critical', 'alert', 'emergency'],
    'file' => 'error',
]);

