<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Blackout\Announcement;

/**
* Blackout Announcement meta-data container
*/
class Announcement
{
  /**
  * @var string
  */
  protected $duration;
  
  /**
  * @var string
  */
  protected $startingAt;
  
  /**
  * @var string
  */
  protected $finishingAt;
  
  /**
  * @var \DateTime
  */
  protected $datePublished;
  
  /**
  * @var string
  */
  protected $affectedAreas;
  
  public function getDuration()
  {
    return $this->duration;
  }
  
  public function setDuration($duration)
  {
    $this->duration = $duration;
    
    return $this;
  }
  
  public function getStartingAt()
  {
    return $this->startingAt;
  }
  
  public function setStartingAt($startingAt)
  {
    $this->startingAt = $startingAt;
    
    return $this;
  }

  public function getFinishingAt()
  {
    return $this->finishingAt;
  }
  
  public function setFinishingAt($finishingAt)
  {
    $this->finishingAt = $finishingAt;
    
    return $this;
  }
  
  public function getDatePublished()
  {
    return $this->datePublished;
  }
  
  public function setDatePublished($datePublished)
  {
    $this->datePublished = $datePublished;
    
    return $this;
  }
  
  public function getAffectedAreas()
  {
    return $this->affectedAreas;
  }
  
  public function setAffectedAreas($affectedAreas)
  {
    $this->affectedAreas = $affectedAreas;
    
    return $this;
  }
}