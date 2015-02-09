<?php

class BaseModel {
    /**
     * @var PDO
     */
    private static $db;
    /**
     * @var array errors
     */
    protected $errors;

    /**
     * Returns the connection to the database
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
     * Sets a model attribute group from the array
     * @param array $arr assoc array: property name - value
     */
    public function setAttributes(array $arr) {
        foreach ($arr as $key => $val) {
            $this->$key = $val;
        }
    }

    /**
     * Returns an error
     * @return mixed
     */
    public function getErrors() {
        return $this->errors;
    }

    /**
     * Closes the connection to the database
     */
    public function __destructor() {
        self::$db = null;
    }
}