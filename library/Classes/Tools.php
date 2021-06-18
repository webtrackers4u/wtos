<?
namespace Library\Classes;

class Tools{

    public static function base_url($uri){
        return BASE_URL.$uri;
    }

    public static function redirect($uri){
        $url = self::base_url($uri);
        header("Location: $url");
        exit();
    }


}
