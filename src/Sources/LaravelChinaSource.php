<?php

namespace App\Sources;

use QL\QueryList;

class LaravelChinaSource
{
    public $keyword;

    public function __construct($keyword)
    {
        $this->keyword = $keyword;
    }

    public function search()
    {
        return QueryList::getInstance()->get('https://learnku.com/laravel/search?q=' . $this->keyword);
    }
}