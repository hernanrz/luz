<?php
/**
* Copyright (c) Hernán Ruíz <hernan@null.net>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*/

namespace Luz\Blackout\Announcement\Analyzer;

use Luz\Twitter\Tweet\Tweet;
use Luz\Blackout\Announcement\CorpoelecTweet;
/**
 * Tweet analyzer class
 */
class TweetAnalyzer extends AbstractAnalyzer
{

  /**
  * The tweet being analyzed
  */
  private $tweet;

  /**
  * Fake apologies, often found at the end of the message
  */
  protected $apologies = [
    'Lamentamos las molestias', 'Ofrecemos disculpas', 'ofrece disculpas',
    'Molestias ocasionadas', 'Molestias causadas', "Disculpe", 'circuitos'
  ];
  
  /**
  * Words commonly used to avoid directly mentioning that they're going
  * to cut the electricity just because they are incompetent monkeys
  */
  protected $blackoutKeywords = [
    'realizando', 'preventivos',  'mantenimiento', 'sin servicio', 
    'trabajos en el sistema', 'de emergencia', 'reparación',
    ' repara', 'Sin energía', 'programado', 'repara', 'averías',
    '#mañana', '#ahora'
  ];
  
  /**
  * Words that identify the tweet as garbage (i.e. irrelevant)
  */
  protected $garbageWords = [
    'Aprovecha la luz',
    'puede realizar el pago del servicio',
    'el cumplimiento de la',
    'El agua es parte de la energía',
    'cumplimiento de la Resolución 035 ',
    'Estimado @',
    'Estimada @',
    'La preservación del Planeta',
    '#CuandoElCalorAprieta',
    'En nuestras manos están las generaciones',
    'desconecta el cargador',
    '#ElNinoNoEsJuego Es hora de tomar consciencia',
    'El Niño es el ',
    'Limita el uso de la secadora',
    'Los bombillos ahorradores',
    'efectos de El Niño',
    'cocinar los alimentos',
    ' eficiente ',
    '#FenomenoElNiño ',
    '#BandaVerde',
    'arboles',
    'la temperatura ideal',
    '#QuédateEnLaBandaVerde',
  ];
  
  
  /**
  * @param CorpoelecTweet $tweet - The corpoelec tweet to analyze
  */
  public function isAnnouncement(Tweet $tweet): bool
  {
    $this->tweet = $tweet;

    return $this->isApologizing() || $this->hasKeywords();
  }

  /**
  * Check if the tweet is irrelevant
  *
  * @return bool
  */
  public function isGarbage(): bool
  {
    return $this->containsOneOf($this->garbageWords);
  }
  
  /**
  * Checks if the tweet contains at least one apology
  *
  * @return bool
  */
  private function isApologizing(): bool
  {
    return $this->containsOneOf($this->apologies);
  }
  
  /**
  * Checks if the tweet contains at least one keyword for blackout
  *
  * @return bool
  */
  private function hasKeywords(): bool
  {
    return $this->containsOneOf($this->blackoutKeywords);
  }
  
  /**
  * Checks if the tweet contains at least one of the strings in the haystack
  */
  private function containsOneOf(array $haystack): bool
  {
    $result = false;
    
    for($i = 0; !$result && $i < count($haystack); $i++) {
      $result = $this->tweet->contains($haystack[$i]);
    }
    
    return $result;
  }
  
}