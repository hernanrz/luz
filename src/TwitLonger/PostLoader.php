<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\TwitLonger;

/**
 * Loads twitlonger posts
 *
 * We're using a loader class so we can later replace our current scraper with 
 * a decent API wrapper (whenever TwitLonger feels like replying to my e-mails,
 * that is)
 */
class PostLoader
{
    /**
    * Loads a twitlonger post given its id
    *
    * @return TwitLongerPost
    */
    public static function loadFromId(string $postId): TwitLongerPost
    {
      $scraper = new Scraper\Scraper("http://www.twitlonger.com/show/{$postId}");
      
      $post = new TwitLongerPost($postId);
      
      return $post->setText($scraper->getPostText());;
    }
    
    /**
    * Loads a twitlonger post given a http://tl.gd/{postId} short url
    */
    public static function loadFromShortUrl(string $shortUrl): TwitLongerPost
    {
      $postId = str_replace('http://tl.gd', '', $shortUrl);
      
      // Remove any (possible) trailing backslash
      $postId = rtrim($postId, '/');
      
      return self::loadFromId($postId);
    }
}