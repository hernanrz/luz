<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Region\Timeline;

use Luz\Twitter\Timeline\Timeline;

/**
* Special instance of Twitter\Timeline, designed to be stored in cache
*/
class RegionTimeline extends Timeline
{
  /**
  * Maximum age of the object, in seconds 
  */
  const MAX_AGE = 600; // 10 minutes
  
  /**
  * @var int UNIX timestamp of the moment when the object was created, this is used
  * to check if the object should be fetched again (that is, expired) or not
  */
  protected $createdAt;
  
  function __construct()
  {
    $this->createdAt = time();
  }
  
  /**
  * Checks whether or not the current object is expired
  */
  public function isExpired(): bool
  {
    return (time() - $this->createdAt) > self::MAX_AGE;
  }
}