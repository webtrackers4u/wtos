<?php

namespace Library\Classes;

class Tools
{
    public static function base_url($uri)
    {
        return BASE_URL.$uri;
    }

    public static function redirect($uri)
    {
        $url = self::base_url($uri);
        header("Location: $url");
        exit();
    }

    public static function startsWith($string, $startString)
    {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }

    public static function endsWith($string, $endsString)
    {
        $len = strlen($endsString);
        $strlen = strlen($string);
        return (substr($string, $strlen-$len, $len) === $endsString);
    }





}
