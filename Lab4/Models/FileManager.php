<?php
namespace Models;

class FileManager {
    public static $dir = 'text';

    public static function readFile($filename) {
        $fullPath = self::$dir . '/' . $filename;
        return file_exists($fullPath) ? file_get_contents($fullPath) : '';
    }

    public static function writeFile($filename, $data) {
        $fullPath = self::$dir . '/' . $filename;
        return file_put_contents($fullPath, $data, FILE_APPEND) !== false;
    }

    public static function clearFile($filename) {
        $fullPath = self::$dir . '/' . $filename;
        return file_put_contents($fullPath, '') !== false;
    }
}