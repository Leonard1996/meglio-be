<?php

namespace App\Logging;

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler as MonologRotatingFileHandler;

/**
 * This is a custom log handler that generates a year folder, month folder and appends the date to the file name
 *
 * So if the path given is
 * /storage/logs/errors/laravel.log
 *
 * it will generate files such as
 * /storage/logs/errors/2021/03/laravel-2021-03-09.log
 *
 * @author Arun A S <arun@webandcrafts.in>
 */
class RotatingFileHandler extends MonologRotatingFileHandler
{
    /**
     * @param string     $filename
     * @param int        $maxFiles       The maximal amount of files to keep (0 means unlimited)
     * @param string|int $level          The minimum logging level at which this handler will be triggered
     * @param bool       $bubble         Whether the messages that are handled can bubble up the stack or not
     * @param int|null   $filePermission Optional file permissions (default (0644) are only for owner read/write)
     * @param bool       $useLocking     Try to lock log file before doing any writes
     */
    public function __construct(string $filename, int $maxFiles = 0, $level = Logger::DEBUG, bool $bubble = true, ?int $filePermission = 777, bool $useLocking = false)
    {

        $date = now();
        $year = $date->format('Y');
        $month = $date->format('m');
        $fileInfo = pathinfo($filename);

        $customFileName = $fileInfo['dirname'] . '/' . $year . '/' . $month . '/' . $fileInfo['basename'];

        parent::__construct($customFileName, $maxFiles, $level, $bubble, $filePermission, $useLocking);
    }
}
