<?php

class View {
    /**
     * Connection views
     * @param $name
     */
    public function display($name) {
        require BASE_PATH . 'views' . DIRECTORY_SEPARATOR . 'header.php';
        require BASE_PATH . 'views' . DIRECTORY_SEPARATOR . $name . '.php';
        if ($name == 'roadsigns/map') {
            $this->displayPartial('roadsigns/script-for-map');
        } else {
            $this->displayPartial('common/script-for-form');
        }
        require BASE_PATH . 'views' . DIRECTORY_SEPARATOR . 'footer.php';
    }

    /**
     * connection view part
     * @param $name
     */
    public function displayPartial($name) {
        require BASE_PATH . 'views' . DIRECTORY_SEPARATOR . $name . '.php';
    }
}