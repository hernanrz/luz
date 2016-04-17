<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Blackout\Announcement\Analyzer;

/**
* Abstract subject class
*/
abstract class AbstractSubject implements SubjectInterface
{
  /**
  * @var int Amount of likelyness of the subject being a blackout announcement
  */
  protected $chances = 0;
  
  /**
  * @var mixed The body of the subject to be analyzed
  */
  protected $body;
  
  /**
  * Increase chances
  *
  * @return void
  */
  public function increaseChances(int $amount)
  {
    $this->chance += $amount;
  }
  
  /**
  * Decrease chances
  *
  * @return void
  */
  public function decreaseChances(int $amount)
  {
    $this->chance -= $amount;
  }
  
  /**
  * Set chances back to zero
  *
  * @return void
  */
  public function resetChances()
  {
    $this->chance = 0;
  }
  
  /**
  * Get the subject's body
  *
  * @return mixed
  */
  public function getBody()
  {
    return $this->body;
  }
  
  /**
  * Set the subject body
  *
  * @return AbstractSubject
  */
  public function setBody($body)
  {
    $this->body = $body;
    
    return $this;
  }
}