<?php

class UserModel extends BaseModel {
    public $login = "";
    public $email = "";
    public $password = "";
    public $passwordConfirm = "";

    public function __construct() {
    }

    /**
     * проверяет валидность формы регистрации
     * @return bool
     */
    public function isFormVaild() {
        $this->errors = array();
        if (preg_match('/^[a-zA-Z][a-zA-Z0-9-_\.]{5,20}$/', $this->login) == 0) {
            $this->errors['login'] = "Логин должен быть от 5 до 20 символов\n
            начинатся с буквы и состоять из букв, цифр, нижнего подчеркивания и точки";
        }
        if ($this->findBy(array("login" => $this->login)) != false) {
            $this->errors['login'] = 'Пользователь с таким логином уже существует';
        }
        if ($this->findBy(array("email" => $this->email)) != false) {
            $this->errors['email'] = 'Пользователь с таким E-mail уже существует';
        }
        if (preg_match('/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/', $this->email) == 0) {
            $this->errors['email'] = 'Проверьте ввод email';
        }
        if (preg_match('/(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $this->password) == 0) {
            $this->errors['password'] = "Проверьте ввод пароля (пароль должен быть от 6 символов, должны присутствовать:\n
            загланвые буквы, цифры, допускаются спец символы)";
        }
        if ($this->password != $this->passwordConfirm) {
            $errors['password'] = 'Пароли не совпадают';
        }
        return empty($this->errors);
    }

    /**
     * Находит первого пользователя, который подпадает под указанные условия поиска,
     * если пользователь не найден возвращает false
     * @param array $condition массив: поле - значение
     * @return mixed
     */
    public function findBy(array $condition) {
        $query = "SELECT * FROM users";
        if (!empty($condition)) {
            $query .= " WHERE ";
            $whereCondition = array();
            foreach ($condition as $key => $val) {
                array_push($whereCondition, "$key = :$key");
            }
            $query .= implode(" AND ", $whereCondition);
        }
        try {
            $sel = self::connect()->prepare($query);
            $sel->execute($condition);
            return $sel->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /**
     * добавляет данные о новом пользователе в базу данных
     * @return bool
     */
    public function addUser() {
        $ins = self::connect()->prepare('INSERT INTO users (login, email, password, id_status, hash) VALUES (:login, :email, :password, :id_status, :hash)');
        return $ins->execute(array(
            'login' => $this->login,
            'email' => $this->email,
            'password' => self::getHashPass($this->password),
            'id_status' => ID_USER,
            'hash' => md5($this->login)
        ));
    }

    /**
     * возвращает захэшированный пароль
     * @param $pass
     * @return bool|string
     */
    protected static function getHashPass($pass) {
        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        return password_hash($pass, PASSWORD_BCRYPT, $options);
    }
}