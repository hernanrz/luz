<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Blackout\Announcement\Analyzer;

use Luz\Twitter\Tweet\Tweet;
use Luz\Blackout\Announcement\CorpoelecTweet;

/**
* Abstract analyzer class
*
* Analyzer objects determine if a given Subject (in this case, a tweet) is in
* fact a blackout announcement
*/
abstract class AbstractAnalyzer
{
  /**
  * Check if current subject is in fact a blackout announcement or not
  *
  * @return bool
  */
  abstract public function isAnnouncement(Tweet $tweet): bool;
}
