<?php

class BaseModel {
    private static $db;
    protected $errors;

    private function __construct() {
    }

    /**
     * возвращает подключение к базе данных, если оно не было установленно
     * устанавливает его
     * @return PDO
     * @throws Exception
     */
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

    /**
     * Устанавливает в модель группу атрибутов из массива
     * @param array $arr ассоциативный массив имя свойства - значение
     */
    public function setAttributes(array $arr) {
        foreach ($arr as $key => $val) {
            $this->$key = $val;
        }
    }

    /**
     * возвращает ошибки
     * @return mixed
     */
    public function getErrors() {
        return $this->errors;
    }

    /**
     * закрывает подключение к базе данных
     */
    public function __destructor() {
        self::$db = null;
    }
}