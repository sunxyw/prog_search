<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Handlers\SearchHandler;

$keyword = $_GET['q'];

dd((new SearchHandler($keyword))->search());