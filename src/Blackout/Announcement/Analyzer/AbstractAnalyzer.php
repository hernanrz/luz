<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Blackout\Announcement\Analyzer;

/**
* Abstract analyzer class
*
* Analyzer objects determine if a given Subject (in this case, a tweet) is in
* fact a blackout announcement. They do this by running some tests on the subject
* and then calculating the subject's likelyness of being an announcement
*/
abstract class AbstractAnalyzer
{
  
  public function __construct(SubjectInterface $subject)
  {
    $this->subject = $subject;
  }
  
  /**
  * Run all tests on the current subject
  *
  * The tests should modify the subjects $chances property which will later 
  * be used to determine if it's an announcement or not, depeding on the threshold
  *
  * @return void
  */
  abstract function analyze();
  
  /**
  * Check if current subject is in fact a blackout announcement or not
  *
  * @return bool
  */
  abstract function isAnnouncement(): bool;
}
