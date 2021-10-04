<?
namespace Library\Classes;

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class Block{
    protected static $BLOCK_DIR = __DIR__."/../../blocks/";
    public static function get_blocks(): array
    {
        $blocks = array_filter(glob(self::$BLOCK_DIR."/*"), function ($block){
            if(!is_dir($block)) return false;
            if(self::get_configuration($block, false)) return true;
            return false;
        });


        $blcks = [];
        foreach ($blocks as $block){
            $config = self::get_configuration($block, false);
            $blcks[$config->name] = $config->title;
        }

        return $blcks;
    }
    public static function get_fields($block, $path = true){
        $config = self::get_configuration($block,$path);
        return $config->fields;
    }

    public static function get_configuration($block, $path=true){
        $full_path = "";
        if($path){
            $full_path = self::$BLOCK_DIR."$block/config.json";
        } else {
            $full_path = $block."/config.json";
        }
        if(file_exists($full_path)){
            $config =  json_decode(file_get_contents($full_path))??false;
            return $config?:false;
        } else {
            return false;
        }


    }

    public static function render_form($block, $basename, $values=[], $path=true){
        $config = self::get_configuration($block,$path);
        if(!$config) return "";
        $fields = $config->fields;
        $default_values = is_array($values)?$values:@unserialize($values)??[];
        ?>
        <div class="uk-card uk-card-outline uk-card-default  uk-card-small">
            <div class="uk-card-header">
                <h4>Block Properties - <?=$config->title; ?></h4>
            </div>
            <div class="uk-card-body">
            <? foreach($fields as $field){
                $default_value = @$default_values[$field->name];
                ?>
                <div class="uk-margin-small">
                    <label><?= $field->label ?></label>
                    <div>
                        <? if($field->type=="text"){?>
                            <input class="uk-input uk-form-small" placeholder="<?= $field->placeholder?>" type="text" name="<?= $basename?>[<?= $field->name?>]" value="<?= $default_value?>">
                        <?}?>

                        <? if($field->type=="number"){?>
                            <input  class="uk-input uk-form-small" placeholder="<?= $field->placeholder?>" type="number" name="<?= $basename?>[<?= $field->name?>]" value="<?= $default_value?>">
                        <?}?>
                        <? if($field->type=="password"){?>
                            <input class="uk-input uk-form-small" placeholder="<?= $field->placeholder?>" type="password" name="<?= $basename?>[<?= $field->name?>]" value="<?= $default_value?>">
                        <?}?>
                        <? if($field->type=="textarea"){?>
                            <textarea class="uk-textarea uk-form-small" placeholder="<?= $field->placeholder?>" type="text" name="<?= $basename?>[<?= $field->name?>]"><?= $default_value?></textarea>
                        <?}?>
                        <? if($field->type=="rich-text"){?>
                            <textarea class="uk-textarea uk-form-small tmce" placeholder="<?= $field->placeholder?>" type="text" name="<?= $basename?>[<?= $field->name?>]"><?= $default_value?></textarea>
                        <?}?>

                        <? if($field->type=="radio"){
                            $values = (array)@$field->values;
                            foreach ($values as $key=>$val){
                                ?>
                                <input class="uk-radio" type="radio" value="<?= $key?>" name="<?= $basename?>[<?= $field->name?>]" <?= $val==$default_value?"checked":""?>> <label><?=$val?></label>
                                <?
                            }
                        }
                        ?>

                        <? if($field->type=="select"){
                            $values = (array)@$field->values;
                            ?>
                            <select class="uk-select" name="<?= $basename?>[<?= $field->name?>]">
                                <? foreach ($values as $key=>$val){?>
                                    <option value="<?= $key?>" <?= $default_value==$key?"selected":""?>><?=$val?></option>
                                <?} ?>
                            </select>
                        <? } ?>

                        <? if($field->type=="checkbox"){
                            $values = (array)@$field->values;
                            $already_values = @(array)$default_value;
                            foreach ($values as $key=>$val){
                                $no = "fields_".$field->name.rand(0, 100);
                                ?>
                                <label for="<?= $no?>">
                                    <input class="uk-checkbox" type="checkbox" value="<?= $key?>" name="<?= $basename?>[<?= $field->name?>][]" id="<?= $no?>" <?= in_array($key, $already_values)?"checked":""?>> <span><?=$val?></span>
                                </label><br>
                                <?
                            }
                        }
                        ?>
                    </div>
                </div>
            <?}?>
            </div>
        </div>
        <?php
    }

    public static function get_view($block_id): string
    {
        global $os;
        $twig = Twig::getInstance(self::$BLOCK_DIR);
        $block_details = $os->_db->selectOne("wtbox", "*", [
            "OR"=>[
                "accessKey"=>$block_id,
                "wtboxId"=>$block_id
            ]
        ]);



        $block = $block_details["block"];
        $values = @unserialize($block_details["block_values"]);

        if($block==""){
            return  $block_details["content"];
        }

        try {
            return $twig->render($block."/template.twig", $values);
        } catch (LoaderError $e) {
            dump($e);
        } catch (RuntimeError $e) {
            dump($e);
        } catch (SyntaxError $e) {
            dump($e);
        }
        return "";
    }
    public static function render($block_id)
    {
        echo self::get_view($block_id);
    }

}
