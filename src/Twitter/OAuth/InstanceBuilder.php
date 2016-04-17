<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Twitter\OAuth;

use Abraham\TwitterOAuth\TwitterOAuth;

/**
* TwitterOAuth Builder
*/
class InstanceBuilder
{
  /**
  * Creates a new instance of TwitterOAuth
  *
  * @param string   $consumerKey    The Twitter application's consumer key
  * @param string   $consumerSecret The Twitter application's secret
  *
  * @return TwitterOAuth
  */
  public static function buildInstance(string $consumerKey, string $consumerSecret): TwitterOAuth
  {
    return new TwitterOAuth($consumerKey, $consumerSecret);
  }

  /**
  * Creates an instance of TwitterOAuth using the following enviroment variables:
  *   - TW_CONSUMER_KEY =>    For the consumer key
  *   - TW_CONSUMER_SECRET => For the consumer secret
  * 
  */
  public static function buildFromEnviroment(): TwitterOAuth
  {
    return self::buildInstance(getenv('TW_CONSUMER_KEY'), getenv('TW_CONSUMER_SECRET'));
  }
}
