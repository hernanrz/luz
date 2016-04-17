<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Twitter\Tweet;

/**
* Tweet factory interface
*/
interface TweetFactoryInterface
{
  public static function createFromArray(array $src): Tweet;
  public static function createFromObject(\StdClass $src): Tweet;
}