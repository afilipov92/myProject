<?php

class BaseModel {
    private static $db;

    private function __construct() {
    }

    public static function connect() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8;', DB_USER, DB_PASSWORD);
            } catch (PDOException $e) {
                throw new Exception("Ошибка соединения с базой данных" . $e->getMessage());
            }
        }
        return self::$db;
    }

    public function __destructor() {
        self::$db = null;
    }
}