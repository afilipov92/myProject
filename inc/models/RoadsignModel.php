<?php

class RoadsignModel extends BaseModel {
    public $id = "";
    public $latitude = "";
    public $longitude = "";
    public $number = "";
    public $rotation = "";
    public $info = "";
    public $id_user;
    public $date;

    /**
     * Sets date and id_user
     * @param $id_user
     */
    public function __construct($id_user) {
        $this->date = date("Y-m-d H:i:s");
        $this->id_user = $id_user;
    }

    /**
     * checks the validity of the road_signs form
     * @return bool
     */
    public function isFormVaild() {
        $this->errors = array();
        if (preg_match('/-?\d{1,3}\.\d+/', $this->latitude) == 0) {
            $this->errors['latitude'] = "Неверная широта";
        }
        if (preg_match('/-?\d{1,3}\.\d+/', $this->longitude) == 0) {
            $this->errors['longitude'] = 'Неверная долгота';
        }
        if (preg_match('/^[1-7][_0-9]+$/', $this->number) == 0) {
            $this->errors['number'] = "Неверный номер знака";
        }
        return empty($this->errors);
    }

    /**
     * adds information about the new road sign to the database
     * @return bool
     */
    public function addRoadSign() {
        $ins = self::connect()->prepare('INSERT INTO road_signs (latitude, longitude, number, rotation, info, date, id_user) VALUES (:latitude, :longitude, :number, :rotation, :info, :date, :id_user)');
        return $ins->execute(array(
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'number' => $this->number,
            'rotation' => $this->rotation,
            'info' => $this->info,
            'date' => $this->date,
            'id_user' => $this->id_user
        ));
    }

    /**
     * edit information about road sign to the database
     * @return bool
     */
    public function editRoadSign() {
        $ins = self::connect()->prepare('UPDATE road_signs SET latitude=:latitude, longitude=:longitude, number=:number, rotation=:rotation, info=:info, date=:date, id_user=:id_user WHERE id=:id');
        return $ins->execute(array(
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'number' => $this->number,
            'rotation' => $this->rotation,
            'info' => $this->info,
            'date' => $this->date,
            'id_user' => $this->id_user,
            'id' => $this->id
        ));
    }

    /**
     * delete road signs from database
     * @return bool
     */
    public function deleteRoadSign() {
        $ins = self::connect()->prepare('DELETE FROM road_signs WHERE id=:id');
        return $ins->execute(array(
            'id' => $this->id
        ));
    }

    /**
     * sample of all road signs
     * @return array
     */
    public static function  selectSigns() {
        return self::connect()->query('SELECT * FROM road_signs', PDO::FETCH_ASSOC)->fetchAll();
    }
}