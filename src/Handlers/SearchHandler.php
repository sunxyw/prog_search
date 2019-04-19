<?php

namespace App\Handlers;

use App\Sources\GitHubSource;
use App\Sources\JuejinSource;

class SearchHandler
{
    public $keyword;

    public function __construct($keyword)
    {
        $this->keyword = $keyword;
    }

    public function search()
    {
        $data = (new JuejinSource($this->keyword))->search();
        $data = array_merge($data, (new GitHubSource($this->keyword))->search());
        usort($data, function ($a, $b) {
            if (preg_match('/[0-9]+k{1}/', $a['vote']) > 0 || preg_match('/[0-9]+k{1}/', $b['vote']) > 0) {
                $a['vote'] = str_replace('k', 000, $a['vote']);
                $b['vote'] = str_replace('k', 000, $b['vote']);
            } else {
                $a['vote'] = $a['vote'] * 10;
                $b['vote'] = $b['vote'] * 10;
            }
            if ($a['vote'] > $b['vote']) {
                return +1;
            }

            return -1;
        });
        return $data;
    }
}