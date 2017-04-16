<?php

namespace Controller;

class BannerImageController {

    /** @var string  */
    protected $imageName;

    public function __construct()
    {
        $this->imageName = $_SERVER['DOCUMENT_ROOT'] . '/img/image.jpg';
    }

    public function render()
    {
        $fp = fopen($this->imageName, 'rb');

        header("Content-Type: image/jpeg");
        header("Content-Length: " . filesize($this->imageName));
        fpassthru($fp);
    }
}