<?php
class Helper{
    public static function Load(){
        $helperDir = realpath('.') . '/app/helper/';
        if($dh = openDir($helperDir)){
            while($files = readdir($dh)){
                if(is_file($helperDir . "/" . $files)){
                    require $helperDir . "/" . $files;
                }
            }
        }
    }
}