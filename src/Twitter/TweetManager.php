<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Twitter;

use Luz\Twitter\Timeline\Timeline;
use Luz\Twitter\Tweet\TweetBuilder;
use Abraham\TwitterOAuth\TwitterOAuth;

/**
 * Fetches tweets and other stuff
 */
class TweetManager
{

  /**
  * @var TwitterAuth
  */
  private $connection;
  
  /**
  * @param  TwitterOAuth  $conn   - TwitterOAuth object to be used to connect to the Twitter API
  */
  public function __construct(TwitterOAuth $conn)
  {
    $this->connection = $conn;
  }
  
  /**
  * Get timeline of a twitter user
  *
  * @param string   $screenName - The screen name of the user
  * @param array    $params     - Additional query string parameters to be sent with the API request
  *
  * @return array
  */
  public function fetchUserTweets(string $screenName, array $params = [])
  {
    $_params = [
      'count'           => 25,
      'screen_name'     => $screenName,
      'include_rts'     => 'false',
      'exclude_replies' => 'true',
    ];
    
    $_params = array_merge($_params, $params);
    
    return $this->connection->get("statuses/user_timeline", $_params);
  }
  
  /**
  * Get tweets directly from the API for multiple screen names
  *
  * @param  array   $screenNames  - Array of screen names
  * @param  array   $params       - Array of parameters to be used in each API request
  *
  * @return array
  */
  public function mergeUserTweets(array $screenNames, array $params = [])
  {
    $total = [];
    
    foreach ($screenNames as $name) {
      $total += $this->fetchUserTweets($name, $params);
    }
    
    return $total;
  }
  
  /**
  * Get a Timeline for a given username
  *
  * @param  string  $screenName   - Screen name of the user
  * @param  int     $count        - Max. amounf of tweets to get
  *
  * @return Timeline
  */
  public function getTimeline(string $screenName, int $count = 25): Timeline
  {
    $timeline = new Timeline();
    
    $params = [
      'count' => $count,
    ];

    $rawTl = $this->fetchUserTweets($screenName, $params);
    
    foreach($rawTl as $status) {
      $timeline->appendTweet(TweetBuilder::buildFromObject($status));
    }
    
    return $timeline;
  }
}