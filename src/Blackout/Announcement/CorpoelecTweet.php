<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Blackout\Announcement;

use Luz\Twitter\Tweet\Tweet;
use Luz\TwitLonger\PostLoader;

class CorpoelecTweet extends Tweet
{
  /**
  * @var string
  */
  protected $fullText;
  
  /**
  * Get complete corpoelec announcement
  *
  * @return string
  */
  public function getText(): string
  {
    // Check if post is a twitlonger post, if so return the full text
    if($this->isTruncated()) {
      // Get full text if it hasn't been loaded before
      if(null === $this->fullText) {
        $post = PostLoader::loadFromShortUrl($this->urls[0]);
        $this->fullText = $post->getText();
      }
      
      return $this->fullText;
    }
    
    return $this->text;
  }
  
  /**
  * Checks whether the tweet is complete or if there is a full story posted 
  * somewhere else
  *
  * @return boolean
  */
  public function isTruncated(): bool
  {
    return strpos($this->text, "(cont)") !== false && strpos($this->text, "https://t.co") !== false;
  }
  
  /**
  * Check if the tweet contains a given string
  *
  * @param string   $needle - The string to look for
  *
  * @return boolean
  */
  public function contains(string $needle, bool $caseSensitive = false): bool
  {
    $text = $this->fullText ?? $this->text;
    
    return false !== ($caseSensitive ? strpos($text, $needle) : stripos($text, $needle));
  }
}