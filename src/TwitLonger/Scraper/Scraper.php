<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\TwitLonger\Scraper;

use GuzzleHttp\Client;

/**
 * TwitLonger scraper
 */
class Scraper extends Client
{
  
  /**
  * id attribute of the dom element containing the text of the post
  */
  const POST_TEXT_ID = 'posttext';
  
  /**
  * URL to the post to scrap
  *
  * @var string
  */
  protected $url;
  
  /**
  * @var \SimpleXMLElement
  */
  protected $DOM;
  
  function __construct(string $url)
  {
    $this->url = $url;
    
    parent::__construct();
  }

  /**
  * Get the text of the twitlonger message
  */
  public function getPostText(): string
  {
    if (null === $this->DOM) {
      $this->loadDocument();
    }
    
    $node = $this->DOM->getElementById(self::POST_TEXT_ID);
    
    return $node->nodeValue;
  }
  
  /**
  * Get the HTML source of the post
  */
  private function loadDocument()
  {
    $response = $this->get($this->url);
    
    $this->createDOMTree($response->getBody());
  }
  
  /**
  * Parse and string and create a XML tree to scrap
  *
  * @return void
  */
  private function createDOMTree(string $source)
  {
    $this->DOM = new \DOMDocument();
    
    $this->DOM->validateOnParse = true;
    
    @$this->DOM->loadHTML($source);
  }
}