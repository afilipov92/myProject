<?php

class MarkerModel {
    public $categories = array(
        1 => 'Предупреждающие знаки',
        'Знаки приоритета',
        'Запрещающие знаки',
        'Предписывающие знаки',
        'Информационно-указательные знаки',
        'Знаки сервиса',
        'Знаки дополнительной информации (таблички)'
    );
    protected $listMarkers;

    public function getListMarkers() {
        $this->listMarkers = array();
        foreach ($this->categories as $key => $a) {
            $this->listMarkers[$key] = array_diff(scandir(IMAGE_PATH . DIRECTORY_SEPARATOR . $key . DIRECTORY_SEPARATOR),
                array('..', '.')
            );
        }
        return $this->listMarkers;
    }

}