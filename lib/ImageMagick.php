<?php

class ImageMagic{
    /**
     * @var Imagick
     */
    public $image;

    /**
     * ImageMagic constructor.
     * @param $file
     */
    public function __construct($file)
    {
        $this->image = new Imagick($file);
        return $this->image;
    }

    /**
     * 获取图片尺寸
     * @return array
     */
    public function getSize()
    {
        $wh = [];
        $wh['width'] = $this->image->getImageWidth();
        $wh['height'] = $this->image->getImageHeight();
        return $wh;
    }

    /**
     * 显示图片
     */
    public function show(){
        header("Content-Type:{$this->image->getImageMimeType()}");
        $data = $this->image->getImageBlob();
        echo $data;
    }

    /**
     * 复制图片
     * @param string $dir
     * @param string $fileName
     * @return mixed
     */
    public function copy($dir='',$fileName=''){
        /**
         * two ways
         * $this->image->writeImage($path);
         * file_put_contents($path, $this->image);
         */
        $fileName = $fileName ? $fileName : $this->genFileName();
        $format = strtolower($this->image->getImageFormat());
        $fileName = $fileName.'.'.$format;
        $dir = rtrim($dir,'/').'/';
        $realFileName = $dir.$fileName;
        //origin file_put_contents
        /*
        $blobData = $this->image->getImageBlob();
        $result = file_put_contents($realFileName,$blobData);
        */
        //writeImage
        $result = $this->image->writeImage($realFileName);
        $storage['fileName'] = $fileName;
        $storage['flag'] = $result ? true : false;
        return $storage;
    }

    /**
     * 获取随机文件名
     * @return string
     */
    public function genFileName(){
        return date('YmdHis').uniqid();
    }

}

/*$img = new ImageMagic('imgs/girl.jpg');
$result = $img->copy('./tmp','test');
var_dump($result);*/
