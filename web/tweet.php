<?php

require dirname(__DIR__) . '/app/bootstrap.php';

use Luz\Twitter\OAuth\InstanceBuilder as OAuthBuilder;
use Luz\TwitLonger\PostLoader as Loader;
use Luz\Region\TwitterMapper;

$api = OAuthBuilder::buildFromEnviroment();
$mapper = new TwitterMapper($api);

$mapper->setTwitterMap(REGION_DATA);

header('Content-type: application/json');
header('X-Patria-Version: 420');

try {
  $tl = $mapper->getTimeline($_GET['state']);
} catch (Exception $e) {
  die('<em>Something went wrong: '. $e->getMessage() .'</em>');
}


die(json_encode($tl));