<?php

namespace Library\Classes;

class Pagination
{
    public const props = [
        "pattern"=> "<li class='[active]' ><a href='?page=[page]'>[label]</a></li>",
        "container"=>"<ul class='uk-pagination'>[links]</ul>",
        "active"=>"uk-active",
        "disabled"=>"uk-disabled",
    ];
    public static function generateLinks($page, $pages, $props)
    {
        $props = array_merge(self::props, $props);
        $links = [];
        //previous page
        $prev_active_class = $page>1 ? "" : "uk-disabled";
        $link = $props["pattern"];
        $link = str_replace("[active]", $prev_active_class, $link);
        $link = str_replace("[page]", $page-1, $link);
        $link = str_replace("[label]", "<span uk-pagination-previous></span>", $link);
        $links[] = $link;

        //generate all links
        for($x=1; $x<=$pages; $x++) {
            $active_class = $x==$page ? $props["active"] : "";
            $link = $props["pattern"];
            $link = str_replace("[active]", $active_class, $link);
            $link = str_replace("[page]", $x, $link);
            $link = str_replace("[label]", $x, $link);

            $links[] = $link;
        }
        //next page
        $next_active_class = $page<$pages && $pages>1 ? "" : "uk-disabled";
        $link = $props["pattern"];
        $link = str_replace("[active]", $next_active_class, $link);
        $link = str_replace("[page]", $page+1, $link);
        $link = str_replace("[label]", "<span uk-pagination-next></span>", $link);
        $links[] = $link;


        $links = implode(PHP_EOL, $links);

        $container = str_replace("[links]", $links, $props["container"]);

        return $container;


    }
}
