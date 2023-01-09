<?php

namespace App\Helpers;

use App\Logging\RotatingFileHandler;
use Monolog\Logger;

class Helpers
{

    public static function getProductIdByProductName(string $product = null): int
    {
        if ($product === "auto") {
            return 1;
        }
        if ($product === "moto") {
            return 2;
        }
        if ($product === "autocarro") {
            return 3;
        }
        if ($product === "profession") {
            return 4;
        }
        return 0;
    }

    public static function getProductNameById(string $product = null): string
    {
        if ((int)$product === 1) {
            return "auto";
        }
        if ((int)$product === 2) {
            return  "moto";
        }
        if ((int)$product === 3) {
            return "autocarro";
        }
        if ((int)$product === 4) {
            return "profession";
        }
        return 'not found';
    }

    public static function getIp(): string
    {

        $ip = null;

        if (array_key_exists('HTTP_CF_CONNECTING_IP', $_SERVER)) {
            $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        }

        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && $ip == null) {
            $ip = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
        }

        if (array_key_exists('HTTP_X_REAL_IP', $_SERVER) && $ip == null) {
            $ip = $_SERVER['HTTP_X_REAL_IP'];
        }

        if (array_key_exists('HTTP_X_CLIENT_IP', $_SERVER) && $ip == null) {
            $ip = $_SERVER['HTTP_X_CLIENT_IP'];
        }

        if (array_key_exists('HTTP_FORWARDED_FOR', $_SERVER) && $ip == null) {
            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
        }

        if (array_key_exists('HTTP_CLIENT_IP', $_SERVER) && $ip == null) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }

        if ($ip == null) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    public static function createNewRequestTooken(): string
    {
        // Create GUID (Globally Unique Identifier)
        // REFERENCE: https://www.php.net/manual/en/function.com-create-guid.php#124635

        $guid = '';
        $namespace = rand(11111, 99999);
        $uid = uniqid('', true);
        $data = $namespace;
        $data .= $_SERVER['REQUEST_TIME'];
        $data .= $_SERVER['HTTP_USER_AGENT'];
        $data .= $_SERVER['REMOTE_ADDR'];
        $data .= $_SERVER['REMOTE_PORT'];
        $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
        $guid = substr($hash, 0, 8) . '-' .
            substr($hash, 8, 4) . '-' .
            substr($hash, 12, 4) . '-' .
            substr($hash, 16, 4) . '-' .
            substr($hash, 20, 12);
        return strtolower($guid);
    }

    public static function validateSource(string $source = ""): bool
    {

        // this function needs to move in a validator context
        // to move in a .ENV or SETTINGS FILE
        $allowedSources = [
            'localhost',
            'develop',
            'meglioquestio.it'
        ];

        return in_array($source, $allowedSources);
    }

    public static function writeInfoLogs($channel, $log_name, $log_message, $model_data = null): void
    {

        $logger = new Logger(strtoupper($channel));
        $handler = new RotatingFileHandler(storage_path("/logs/" . strtolower($log_name) . ".log"), 0, Logger::INFO, true, 0664);
        $handler->setFilenameFormat('{filename}-{date}', 'Y-m');
        $logger->pushHandler($handler);

        $array = [$model_data];
        $logger->info($log_message, $array);
    }

    public static function writeErrorLogs($log_message, $model_data = null): void
    {

        $logger = new Logger(strtoupper('error'));
        $handler = new RotatingFileHandler(storage_path("/logs/error.log"), 0, Logger::ERROR, true, 0664);
        $handler->setFilenameFormat('{filename}-{date}', 'Y-m');
        $logger->pushHandler($handler);

        $array = [$model_data];
        $logger->error($log_message, $array);
    }

    public static function createCompanyTooken(string $name): string
    {
        $guid = '';
        $namespace = rand(11111, 99999);
        $uid = uniqid('', true);
        $data = $namespace;
        $data .=  microtime();
        $data .= $name;
        $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
        $guid = substr($hash, 0, 8) . '-' .
            substr($hash, 8, 4) . '-' .
            substr($hash, 12, 4) . '-' .
            substr($hash, 16, 4) . '-' .
            substr($hash, 20, 12);

        return strtolower($guid);
    }
}
