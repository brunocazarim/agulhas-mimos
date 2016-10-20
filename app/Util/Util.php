<?php

namespace AgulhasMimos\Util;

class Util
{
    public static function FillWithLeftZeros($stringToFill, $stringLength)
    {
        if(strlen($stringToFill) >= $stringLength)
        {
            return $stringToFill;
        }
        else
        {
            while(strlen($stringToFill) < $stringLength)
            {
                $stringToFill = "0".$stringToFill;
            }
            return $stringToFill;
        }
    }
}