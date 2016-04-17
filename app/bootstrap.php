<?php
/**
* Initializes autoloader and sets up enviroment
*
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/
require dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(dirname(__DIR__));

$dotenv->load();

// Make sure enviroment variables aren't empty, if they are empty a RuntimeException will be thrown
$dotenv->required(['TW_CONSUMER_KEY', 'TW_CONSUMER_SECRET'])->notEmpty();

define('REGION_DATA', json_decode(file_get_contents(dirname(__DIR__) . '/res/corpoelec-ve.json'), true));