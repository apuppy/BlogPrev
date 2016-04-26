<?php

class ImageMagic{
    public $image;
    public function __construct($file)
    {
        $this->image = new Imagick($file);
        return $this->image;
    }

    public function getSize()
    {
        $wh = [];
        $wh['width'] = $this->image->getImageWidth();
        $wh['height'] = $this->image->getImageHeight();
        return $wh;
    }

    /**
     * display image
     */
    public function show(){
        header("Content-Type:{$this->image->getImageMimeType()}");
        $data = $this->image->getImageBlob();
        echo $data;
    }

    public function copy($dir='',$fileName=''){
        /**
         * two ways
         * $this->image->writeImage($path);
         * file_put_contents($path, $this->image);
         */
        $fileName = $fileName ? $fileName : $this->genFileName();
        $format = strtolower($this->image->getImageFormat());
        $fileName = $fileName.'.'.$format;
        $blobData = $this->image->getImageBlob();
        $result = file_put_contents($dir.'/'.$fileName,$blobData);
        //$result = $this->image->writeImage('/tmp/a.jpg');
        return $result;
    }

    public function genFileName(){
        return date('YmdHis').uniqid();
    }
}

$img = new ImageMagic('imgs/girl.jpg');
$img->copy();