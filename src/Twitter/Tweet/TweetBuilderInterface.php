<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Twitter\Tweet;

/**
* Tweet Builder interface
*/
interface TweetBuilderInterface
{
  public static function buildFromArray(array $src): Tweet;
  public static function buildFromObject(\StdClass $src): Tweet;
}