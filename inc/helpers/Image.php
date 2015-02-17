<?php

class Image {
    protected $font = "consola.ttf";
    protected $fontSize = 12;
    protected $imgWidth = 80;
    protected $imgHeight = 40;
    protected $text;

    /**
     * @param string $text
     */
    public function __construct($text = '') {
        $this->text = $text;
    }

    /**
     * Add noise.
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
     * Rendering CAPTCHA
     */
    public function send() {
        // Creation of the canvas
        $img = imagecreate($this->imgWidth, $this->imgHeight);
        // Background color
        $backGroudColor = imagecolorallocate($img, rand(200, 255), rand(200, 255), rand(200, 255));
        // Filling in the background
        imagefill($img, 0, 0, $backGroudColor);
        // Adding noise
        $this->addNoise($img, 9, 12);
        // Drawing pictures
        $len = strlen($this->text);
        for ($i = 0; $i < $len; $i++) {
            // text color
            $textColor = imagecolorallocate($img, rand(0, 150), rand(0, 150), rand(0, 150));
            imagettftext(
                $img, // canvas
                $this->fontSize, // font size
                rand(-25, 25), // angle of slope
                5 + $i * 10, // horizontal shift
                ($this->imgHeight + $this->fontSize) / 2, // vertical shift
                $textColor, // text color
                BASE_PATH . "fonts" . DIRECTORY_SEPARATOR . $this->font, // name font
                $this->text[$i]
            );
        }
        // header to indicate the type
        header('Content-Type: image/png');
        // output image stream
        imagepng($img);
        // memory cleaning
        imagedestroy($img);
    }
}