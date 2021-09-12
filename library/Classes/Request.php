<?
namespace Library\Classes;
class Request{
    const POST_METHOD ='POST';
    const GET_METHOD ='GET';
    public static function  getMethod(){
        return $_SERVER["REQUEST_METHOD"];
    }
    public static function getQueries(){
        return $_REQUEST;
    }
    public static function getGets(){
        return $_GET;
    }
    public static function getPosts(){
        return $_POST;
    }
    public static function getFiles(){
        return $_FILES;
    }
    public static function getQuery($key){
        return @$_REQUEST[$key];
    }
    public static function getGet($key){
        return $_GET[$key]??false;
    }
    public static function getPost($key){
        return @$_POST[$key];
    }
    public static function getFile($key){
        return @$_FILES[$key];
    }

}
?>
