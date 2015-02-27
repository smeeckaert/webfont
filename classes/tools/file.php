<?php

namespace Dev\Webfont;

class Tools_File
{
    static function addSlash($string)
    {
        $lastChar = substr($string, -1);
        if ($lastChar != DS) {
            $string .= DS;
        }
        return $string;
    }


}