<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Blackout\Announcement;

use Luz\Twitter\Tweet\Tweet;

class CorpoelecTweet extends Tweet
{
  /**
  * Checks whether the tweet is complete or if there is a full story posted 
  * somewhere else
  *
  * @return boolean
  */
  public function isTruncated(): bool
  {
    return $this->contains("(cont)") && $this->contains("https://t.co");
  }
  
  /**
  * Check if the tweet contains a given string
  *
  * @param string   $needle - The string to look for
  *
  * @return boolean
  */
  public function contains(string $needle): bool
  {
    return false !== strpos($this->text, $needle);
  }
}