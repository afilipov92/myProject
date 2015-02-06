<?php

class Image {
    protected $font = "consola.ttf";
    protected $fontSize = 12;
    protected $imgWidth = 80;
    protected $imgHeight = 30;
    protected $text;

    /**
     * @param string $text
     */
    public function __construct($text = '') {
        $this->text = $text;
    }

    /**
     * добавление шума
     * @param $img
     * @param $colLine1
     * @param $colLine2
     */
    protected function addNoise($img, $colLine1, $colLine2) {
        $lineNum = rand($colLine1, $colLine2);
        for ($i = 0; $i < $lineNum; $i++) {
            $color = imagecolorallocate($img, rand(150, 255), rand(150, 255), rand(150, 255));
            imageline($img, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
        }
    }

    /**
     * отрисовка каптчи
     */
    public function send() {
        // Создаем холст
        $img = imagecreate($this->imgWidth, $this->imgHeight);
        // Создаем цвет фона
        $backGroudColor = imagecolorallocate($img, rand(200, 255), rand(200, 255), rand(200, 255));
        // заполняем фон
        imagefill($img, 0, 0, $backGroudColor);
        // добавляем шум
        $this->addNoise($img, 9, 12);
        // рисуем картинку
        $len = strlen($this->text);
        for ($i = 0; $i < $len; $i++) {
            // Цвет текста
            $textColor = imagecolorallocate($img, rand(0, 150), rand(0, 150), rand(0, 150));
            imagettftext(
                $img, // холст
                $this->fontSize, // ращмер шрифта
                rand(-10, 10), // угол наклона
                5 + $i * 10, // сдвиг по горизонтали
                ($this->imgHeight + $this->fontSize) / 2, // сдвиг по вертикали
                $textColor, // цвет текста
                BASE_PATH . "fonts" . DIRECTORY_SEPARATOR . $this->font, // имя шрифта
                $this->text[$i]
            );
        } // текст*
        // заголовк для указания типа
        header('Content-Type: image/png');
        // выводим картинку в поток
        imagepng($img);
        // Очищаем память
        imagedestroy($img);
    }
}