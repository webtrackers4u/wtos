<?php

namespace Models;

use Library\Classes\Model;

class pagecontent extends Model
{
    protected $table = "pagecontent";

    public function getPageContentById($id)
    {
        return $this->select(["title"], [
            "pagecontentId"=>$id
        ]);
    }
}
