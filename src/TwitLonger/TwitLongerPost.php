<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\TwitLonger;

/**
 * TwitLonger post abstract class
 */
class TwitLongerPost
{

    /**
    * Full text of the TwitLonger post
    *
    * @var string
    */
    protected $text;

    /**
    * Identifier of the TwitLonger post
    *
    * @var string
    */
    protected $postId;

    /**
    * @param string $postId   - Identifier of the TwitLonger post
    */
    function __construct(string $postId)
    {
      $this->postId = $postId;
    }
    
    /**
    * Get full (expanded) text of the twitlonger post
    */
    public function getText(): string
    {
      return $this->text;
    }
    
    /**
    * Set post text
    *
    * @param string $text - The text
    *
    * @return TwitLongerPost
    */
    public function setText($text)
    {
      $this->text = $text;
      
      return $this;
    }
}