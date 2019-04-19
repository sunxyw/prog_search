<?php

namespace App\Sources;


use QL\Dom\Elements;
use QL\Dom\Query;
use QL\QueryList;

class Source
{
    public $keyword;
    public $api;
    public $result;

    public function __construct($keyword, $api, $result)
    {
        $this->keyword = $keyword;
        $this->api = $api;
        $this->result = $result;
    }

    public function search()
    {
        return $this->handle(QueryList::getInstance()->get($this->api . $this->keyword));
    }

    public function handle(QueryList $res)
    {
        return $res;
    }
}