<?
namespace Library\Classes;
class Router {
    var $pattern = "/";
    var $uri = "";
    var $keys = [];
    var $values = [];
    var $params = [];

    protected function scrumbleURI($URI){
        return explode("/", $URI);
    }

    protected function generateParams(){
        $list = [];
        foreach($this->keys as $id=> $key){
            $value = @$this->values[$id];
            if(Tools::startsWith($key,":")){
                $key = str_replace(":","", $key);
                $list[$key] = $value;
            } else if($key!=$value) {
                throw new \Exception("Invalid pattern registered in router.");
            }
        }
        $this->params = $list;
    }

    public function __construct($pattern="/:slug"){
        $this->pattern = $pattern;
        $this->uri = str_replace(BASE_FOLDER, "", $_SERVER["REQUEST_URI"]);

        $this->keys = $this->scrumbleURI($this->pattern);
        $this->values = $this->scrumbleURI($this->uri);
        $this->generateParams();
    }
    public function getParam($key){
        return @$this->params[$key]?:null;
    }
}
?>
