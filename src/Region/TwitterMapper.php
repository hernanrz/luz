<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Region;

use Luz\Twitter\TweetManager;
use Luz\Twitter\Timeline\Timeline;
use Luz\Region\Timeline\RegionTimeline;
use Luz\Blackout\Announcement\Analyzer\TweetAnalyzer;
use Luz\Blackout\Announcement\CorpoelecTweet;

/**
 * Takes care of generating timelines for a specific region
 */
class TwitterMapper extends TweetManager
{
  /**
  * @var array Contains an associative array with the region names as keys and 
  * the twitter account names as values, if there are multiple accounts the
  * value will be an indexed array with each account's screen name
  */
  protected $regionTwitterMap = [];

  /**
  * Gets the twitter account or accounts for a given region, returns an empty
  * string if no region was found
  *
  * @param  string  $regionName - The name of the region
  *
  * @return string|array
  */
  public function getRegionTwitter(string $regionName)
  {
    return $this->regionTwitterMap[$regionName] ?? '';
  }
  
  /**
  * Sets the region map to be used
  */
  public function setTwitterMap(array $map)
  {
    $this->regionTwitterMap = $map;
    
    return $this;
  }
  
  /**
  * Gets the timeline for a given region
  * 
  * @param string $regionName - The name of the region
  * @param int    $count      - Maximum amount of tweets to fetch
  *
  * @return RegionTimeline
  */
  public function getTimeline(string $regionName, int $count = 25): Timeline
  {
    $analyzer = new TweetAnalyzer();
    $regionTl = new RegionTimeline();
    
    $regionTwitter = $this->getRegionTwitter($regionName);
    
    if('' === $regionTwitter) {
      throw new \Exception('Region name could not be found', 404);
    }
    
    $params = [
      'count' => $count,
    ];
    
    $tweets = is_array($regionTwitter) ? $this->mergeUserTweets($regionTwitter, $params) : $this->fetchUserTweets($regionTwitter, $params);
    
    foreach($tweets as $_tweet) {
      $tweet = CorpoelecTweetBuilder::buildFromObject($_tweet);

      if($analyzer->isAnnouncement($tweet)) {
        $regionTl->prependTweet($tweet);
      }elseif ($analyzer->isGarbage()) {
        continue;
      }else {
        $regionTl->appendTweet($tweet);
      }
    }
    
    return $regionTl;
  }
}