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

    public static function ValidateIsNotNullNorEmpty($variableName, $variableValue)
    {
        if(is_null($variableValue) || empty($variableValue))
        {
            throw new Exception($variableName." não pode ser vazio(a)");
        }   
    }
}