<?php

class View {
    public function display($name) {
        require BASE_PATH . 'views' . DIRECTORY_SEPARATOR . 'header.php';
        require BASE_PATH . 'views' . DIRECTORY_SEPARATOR . $name . '.php';
        require BASE_PATH . 'views' . DIRECTORY_SEPARATOR . 'footer.php';
    }
}