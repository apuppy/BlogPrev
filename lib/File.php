<?php
namespace lib;

class File{
    /**
     * @var resource
     */
    public $file;
    /**
     * @var string
     */
    public $filePath;

    /**
     * File constructor.
     * @param string $file
     * @param string $mode
     */
    public function __construct($file='',$mode='r')
    {
        $this->file = fopen($file,$mode);
        $this->filePath = $file;
        return $this->file;
    }

    /**
     * 读取文件所有内容
     * @return string
     */
    public function read()
    {
        $contents = fread($this->file,filesize($this->filePath));
        return $contents;
    }

    /**
     * 按行读取，返回数组
     * @return array
     */
    public function readByLine()
    {
        $doc = [];
        while(!feof($this->file)) {
            $doc['line'][] = fgets($this->file);
        }
        return $doc;
    }

    /**
     * 返回文件夹中条目
     * @param string $dir
     * @return array|string
     */
    public static function listFilesInDir($dir='.'){
        chdir($dir);
        $dirObj = opendir($dir);
        $directory = [];
        while(($file = readdir($dirObj)) !== false)
        {
            $fileSize = filesize($file);
            $type = is_dir($file) ? 'directory' : 'file';
            $directory[] = [
                'type' => $type,
                'size' => $fileSize,
                'readableSize' => self::fileSizeConvert($fileSize),
                'name' => $file
            ];
        }
        return $directory;
    }

    /**
     * 进制转换为易读格式
     * @param $bytes
     * @return float|string
     */
    public function fileSizeConvert($bytes){
        $convertUnits = [
            0 => [
                "UNIT" => "TB",
                "VALUE" => pow(1024,4)
            ],
            1 => [
                "UNIT" => "GB",
                "VALUE" => pow(1024,3)
            ],
            2 => [
                "UNIT" => "MB",
                "VALUE" => pow(1024,2)
            ],
            3 => [
                "UNIT" => "KB",
                "VALUE" => 1024
            ],
            4 => [
                "UNIT" => "B",
                "VALUE" => 1
            ]
        ];

        $result = '';
        foreach($convertUnits as $item){
            if($bytes >= $item["VALUE"]){
                $result = $bytes / $item['VALUE'];
                $result = round($result).' '.$item['UNIT'];
                break;
            }
        }
        return $result;
    }

    /**
     * 关闭文件
     */
    public function __destruct()
    {
        fclose($this->file);
    }

}


/*$file = new File('./mysqlInfo.txt');
var_dump($file->read());
print_r($file->readByLine());*/
/*$dir = File::listFilesInDir('/usr/local/bin');
print_r($dir);*/