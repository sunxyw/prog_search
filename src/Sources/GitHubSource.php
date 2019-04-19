<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/19
 * Time: 21:45
 */

namespace App\Sources;


use QL\QueryList;

class GitHubSource extends Source
{
    public function __construct($keyword)
    {
        $api = 'https://github.com/search?q=';
        $result = '.main-list .item';

        parent::__construct($keyword, $api, $result);
    }

    public function handle(QueryList $res)
    {
        $rules = [
            'title' => ['a.v-align-middle', 'text'],
            'vote' => ['.pl-2>a.muted-link', 'text'],
        ];

        return $res->rules($rules)->query()->getData()->unique()->all();
    }
}