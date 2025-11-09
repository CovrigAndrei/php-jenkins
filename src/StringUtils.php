<?php

class StringUtils
{
    public static function reverse($string)
    {
        return strrev($string);
    }
    
    public static function toUpperCase($string)
    {
        return strtoupper($string);
    }
    
    public static function toLowerCase($string)
    {
        return strtolower($string);
    }
    
    public static function capitalizeWords($string)
    {
        return ucwords($string);
    }
    
    public static function contains($haystack, $needle)
    {
        return strpos($haystack, $needle) !== false;
    }
}