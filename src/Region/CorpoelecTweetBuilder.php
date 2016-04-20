<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Region;

use Luz\Twitter\Tweet\TweetBuilder;
use Luz\Blackout\Announcement\CorpoelecTweet;
use Luz\Twitter\Tweet\Tweet;

/**
 * Creates CorpoelecTweets
 */
class CorpoelecTweetBuilder extends TweetBuilder
{
  /**
  * @return CorpoelecTweet
  */
  public static function createTweet(): Tweet
  {
    return new CorpoelecTweet;
  }
}
