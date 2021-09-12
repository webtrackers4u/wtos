<?php

namespace Library\Classes;

use Medoo\Medoo;
class Db extends Medoo
{
    protected $pagination = [
        "rows"=> 30,
        "page"=>1,
    ];
    /**
     * Modify data from the table.
     *
     * @param string $table
     * @param array $data
     * @param array $where
     * @return \PDOStatement|null
     */

    public function __construct(array $options)
    {
        parent::__construct($options);
        $this->loadAllModels();
    }

    protected function loadAllModels(){
        $models = glob(BASE_DIR."/Models/*.php");
        foreach ($models as $model){
            require $model;
            $model = str_replace([".php", BASE_DIR], "", $model);
            $model_class_name = str_replace("/","\\", $model);
            $model_name = str_replace("/Models/","", $model);
            if(class_exists($model_class_name)){
                $this->$model_name = new $model_class_name($this);
            }
        }
    }

    public function upsert($table, $data, $where=null): ?\PDOStatement
    {
        if($this->has($table,$where)){
            return $this->update($table,$data,$where);
        } else {
            return $this->insert($table,$data);
        }
    }
    public function paginate(string $table,  $columns = null , $where= null, $pagination=[], $join = null): array
    {

        $isJoin = $this->isJoin($join);
        $pagination = array_merge($this->pagination, $pagination);
        // the offset of the list, based on current page
        $offset = ($pagination["page"] - 1) * $pagination["rows"];
        //getting count of all data
        $total = $isJoin?$this->count($table, $join, "*", $where):$this->count($table, "*", $where);
        //getting total number of page
        $pages = ceil ($total / $pagination["rows"]);
        //generate limit object
        $where["LIMIT"] =  [$offset, $pagination["rows"]];
        //getting data
        $data = $isJoin?$this->select($table, $join, $columns, $where):$this->select($table, $columns, $where);
        //creating response
        $response = [
            "data"=>$data,
            "pager"=> [
                "page"=>$pagination["page"],
                "pages"=>$pages,
                "total"=>$total,
                "from"=>$offset+1,
                "to"=> $pagination["page"]==$pages? $total: ($offset+1+$pagination["rows"])
            ]
        ];
        return $response;
    }

}
