<?
namespace Library\Classes;
class Template {
    public static $DEFAULT_TEMPLATE= "template-default.php";
    public static function get_fields($template){
        $fields = json_decode(file_get_contents(__DIR__."/../../wtosApps/config/fields.json"));
        return (array)@$fields->$template;
    }
    public static function get_templates(){
        $templates = [];
        $files = glob(__DIR__."/../../wtosApps/template-*.php");
        foreach ($files as $file){
            $file = basename($file);
            $name =  str_replace(["template-",".php"], "", $file);
            $name =  str_replace("-", " ", $name);
            $name = ucwords($name);
            $templates[$file] = $name;
        }
        return $templates;
    }

    public static function save_field($name, $value, $pagecontentId){
        global $os;
        $existing = $os->mfa($os->mq("SELECT * FROM pagecontentmeta WHERE pagecontentId='$pagecontentId' AND name='$name'"));
        $query = "";
        if ($existing){
            $query = "UPDATE pagecontentmeta SET value='$value'  WHERE pagecontentId='$pagecontentId' AND name='$name'";
        } else {
            $query = "INSERT INTO  pagecontentmeta SET value='$value' , pagecontentId='$pagecontentId',  name='$name'";
        }
        return $os->mq($query);
    }

    public static function get_field($name, $pagecontentId){
        global $os;
        $existing = @$os->mfa($os->mq("SELECT * FROM pagecontentmeta WHERE pagecontentId='$pagecontentId' AND name='$name'"))["value"];
        if($existing){
            if(@unserialize($existing)){
                $existing = unserialize($existing);
            }
        }

        return $existing;
    }

    public static function delete_fields($pagecontentId, $names = []){
        global $os;
        $names = !empty($names)?" AND name IN('".implode("','", $names)."')":"";
        return $os->mq("DELETE FROM pagecontentmeta WHERE pagecontentId='$pagecontentId' $names");
    }

    public static function get_page_by_slug($slug){
        $slug = ltrim($slug, "/");
        global $os;
        $db = Db::instance();
        $page = $db->query("SELECT * FROM pagecontent WHERE seoId='$slug'")->fetch();
        $page["meta"] = $db->query("SELECT * FROM pagecontentmeta WHERE pagecontentId='".$page["pagecontentId"]."'")->fetchAll();
        return $page;

    }

}
?>
