<?php

namespace App\Sources;


use QL\Dom\Elements;
use QL\QueryList;

class JuejinSource extends Source
{
    public function __construct($keyword)
    {
        $api = 'https://juejin.im/search?type=all&query=';
        $result = '.main-list .item';

        parent::__construct($keyword, $api, $result);
    }

    public function handle(QueryList $res)
    {
        $rules = [
            'author' => ['.user-popover-box', 'text'],
            'title' => ['.title-row', 'text'],
            'vote' => ['.count', 'text'],
        ];

        return $res->rules($rules)->query()->getData()->unique()->all();
    }
}