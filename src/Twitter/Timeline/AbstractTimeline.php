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
* Interface for a Timeline class, provides access to a collection of Tweet objects
*/
abstract class AbstractTimeline
{
  /**
  * @var int The total amount of Tweet objects contained in the class
  */
  protected $count = 0;
  
  /**
  * @var array  - The array containing the tweets
  */
  protected $tweets = [];
  
  /**
  * Get a tweet
  *
  * @param int  $index  - The index of the tweet
  */
  public function getTweet(int $index): Tweet
  {
    return $this->tweets[$index];
  }
  
  /**
  * Gets the total amount of tweets contained
  */
  public function count(): int
  {
    return $this->count;
  }

  /**
  * Append a Tweet object to the timeline
  *
  * @param Tweet  $tweet - The tweet
  */
  abstract public function appendTweet(Tweet $tweet);
  
  /**
  * Prepend a Tweet object to the timeline
  *
  * @param Tweet  $tweet - The tweet
  */
  abstract public function prependTweet(Tweet $tweet);
  
  /**
  * Remove a Tweet object from the Timeline
  *
  * @param int  $index - The index of the object to remove
  */
  abstract public function removeTweet(int $index);
}