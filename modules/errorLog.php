<?php
/**
 * Created by JetBrains PhpStorm.
 * User: General ZOD
 * Date: 10/7/13
 * Time: 7:54 PM
 * To change this template use File | Settings | File Templates.
 */

class ErrorLog {
    private $photo_count = array();
    private $file_name = "";
    private $pattern = "";
    private $unique_id_count = 0;

    public function __construct($filename, $pattern){
        $this->file_name = $filename;
        $this->pattern = $pattern;
    }

    public function begin(){
        if (file_exists($this->file_name))
            $this->getFile();
        else
            exit("File does not exist");

    }

    public function echoOutput(){
        echo "<h1>The total unique count is {$this->unique_id_count}</h1>";
        foreach($this->photo_count as $key=>$value){
            echo "$key : $value <br />";
        }
    }

    public function getCount(){
        return $this->photo_count;
    }

    public function getTotalUniqueCount(){
        return $this->unique_id_count;
    }

    private function getFile(){
        $fp = fopen($this->file_name, "r");
        while(($content = fgets($fp)) != ""){
            $match = array();
            preg_match($this->pattern, $content, $match);
            if (count($match) > 0){//match is found
                if (array_key_exists($match[1], $this->photo_count)){
                    $this->photo_count[$match[1]] = (int) $this->photo_count[$match[1]] + 1;
                }else{
                    $this->photo_count[$match[1]] = 1;
                    $this->unique_id_count++;
                }
            }
        }
        fclose($fp);
    }

}

