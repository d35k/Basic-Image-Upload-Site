<?php
session_start();
ob_start();

//helperleri ve classları otomatik olarak yükleyelim
function __autoload($className)
{
    $classFile = realpath('.') . '/app/classes/class.' . strtolower($className) . '.php';
    if (file_exists($classFile)) {
        require $classFile;
    }
}

Helper::Load();
//veritabanı bağlantısı yapalım
include 'system/config.php';

try {
    $baglanti = new PDO('mysql:host=' . $datab['database']['host'] . ';dbname=' . $datab['database']['dbname'] . ';charset=utf8;', $datab['database']['user'], $datab['database']['pass']);
} catch (PDOException $e) {
    print $e->getMessage();
}
//ayarlarımızı halledelim

//sabitler