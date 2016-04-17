<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Twitter\Timeline;

/**
 * Timeline Iterator class
 */
abstract class TimelineIterator extends AbstractTimeline implements \Iterator 
{
  /**
  * Iterator index
  */
  private $position = 0;
  
  /**
  * Get current element of the timeline
  */
  public function current()
  {
    return $this->getTweet($this->position);
  }
  
  /**
  * Get the key of the current element
  */
  public function key()
  {
    return $this->position;
  }
  
  /**
  * Move to the next element in the list
  */
  public function next()
  {
    $this->position++;
  }
  
  /**
  * Reset position pointer
  */
  public function rewind()
  {
    $this->position = 0;
  }
  
  /**
  * Check if the current position is valid
  */
  public function valid()
  {
    return $this->position < $this->count();
  }
}