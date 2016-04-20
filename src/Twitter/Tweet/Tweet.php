<?php 
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Twitter\Tweet;

/**
 * Tweet entity
 */
class Tweet implements \JsonSerializable
{
  /**
  * The tweet's text contents
  *
  * @var string
  */
  protected $text;
  
  /**
  * Screen name of the tweets author
  *
  * @var string
  */
  protected $author;

  /**
  * Expanded urls contained in the tweet
  *
  * @var array
  */
  protected $urls = [];
  
  
  /**
  * serialize the tweet
  */
  public function jsonSerialize()
  {
    return [
      'text'   => $this->getText(),
      'author' => $this->getAuthor(),
    ];
  }
  
  public function getText(): string
  {
    return $this->text;
  }
  
  public function setText(string $text)
  {
    $this->text = str_replace("@LMOTTAD", "", $text);

    return $this;
  }
  
  public function getAuthor(): string
  {
    return $this->author;
  }
  
  public function setAuthor(string $author)
  {
    $this->author = $author;
    
    return $this;
  }
  
  public function getUrls(): array
  {
    return $this->urls;
  }
  
  public function setUrls(array $urls)
  {
    $this->urls = $urls;
  }
}