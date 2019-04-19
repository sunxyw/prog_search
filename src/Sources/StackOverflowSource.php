<?php

namespace App\Sources;

use QL\QueryList;

class StackOverflowSource extends Source
{
    public function __construct($keyword)
    {
        $api = 'https://stackoverflow.com/search?q=';
        $result = '.main-list .item';

        parent::__construct($keyword, $api, $result);
    }

    public function handle(QueryList $res)
    {
        $rules = [
            'author' => ['.search-result', 'text'],
            /*'title' => ['.title-row', 'text'],
            'vote' => ['.count', 'text'],*/
        ];

        dd($res->rules($rules)->query()->getData()->unique()->all());
    }
}