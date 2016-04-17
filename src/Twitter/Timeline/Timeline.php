<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Twitter\Timeline;

use Luz\Twitter\Tweet\Tweet;

/**
* Timeline object, provides access to a collection of tweets
*/
class Timeline extends TimelineIterator
{
  /**
  * Appends a Tweet to the timeline
  *
  * @param Tweet $tweet - The Tweet to append
  */
  public function appendTweet(Tweet $tweet)
  {
    $this->tweets[] = $tweet;
    $this->count++;
    
    return $this;
  }
  
  /**
  * Prepends a Tweet to the timeline
  *
  * @param Tweet $tweet - The Tweet to prepend
  */
  public function prependTweet(Tweet $tweet)
  {
    array_unshift($this->tweets, $tweet);
    $this->count++;
    
    return $this;
  }
  
  /**
  * Removes a Tweet from the timeline
  *
  * @param int $index - The index of the tweet to remove
  */
  public function removeTweet(int $index)
  {
    unset($this->tweets[$index]);
    $this->count--;
  }
}
