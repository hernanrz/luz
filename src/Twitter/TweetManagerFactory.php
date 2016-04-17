<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Twitter;

use Luz\Twitter\OAuth\InstanceFactory;

/**
* TweetManager factory class
*/
class TweetManagerFactory
{
  private function __construct()
  {
  }
  
  /**
  * Creates a TwitterOAuth object using enviroment variables
  * and then injects it into a new TweetManager class
  *
  * @return TweetManager
  */
  public static function createInstance(): TweetManager
  {
    $oauth = InstanceFactory::buildFromEnviroment();
    
    return new TweetManager($oauth);
  }
}
