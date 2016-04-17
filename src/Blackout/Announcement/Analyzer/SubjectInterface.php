<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Blackout\Announcement\Analyzer;

interface SubjectInterface
{
  public function increaseChances(int $amount);
  public function decreaseChances(int $amount);
  public function resetChances();
  
  public function getBody();
  public function setBody($body);
}