<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Twitter\Tweet;

/**
 * Tweet builder
 */
class TweetBuilder implements TweetBuilderInterface
{

  /**
  * Creates a new instance of Tweet
  *
  * @return Tweet
  */
  public static function createTweet(): Tweet
  {
    return new Tweet;
  }
  
  /**
  * Extracts the expanded urls from a tweet's urls array
  */
  protected static function extractExpandedUrls(array $rawUrls): array
  {
    return array_map(function ($url)
    {
      
      return $url->{'expanded_url'};
      
    }, $rawUrls);
  }
  
  /**
  * Creates a Tweet object using an array
  */
  public static function buildFromArray(array $src): Tweet
  {
    $tweet = self::createTweet();
    
    $tweet->setAuthor($src['user']['screen_name'])
          ->setText($src['text'])
          ->setUrls(self::extractExpandedUrls($src['urls']));
    
    return $tweet;
  }
  
  /**
  * Creates a Tweet object using an anonymous object obtained from the REST API
  */
  public static function buildFromObject(\StdClass $src): Tweet
  {
    $tweet = self::createTweet();
    
    $tweet = $tweet->setAuthor($src->user->screen_name)
                   ->setText($src->text);
                   
    if(!empty($src->entities->urls)) {
      $tweet->setUrls(self::extractExpandedUrls($src->entities->urls));
    }               
    
    return $tweet;
  }
}