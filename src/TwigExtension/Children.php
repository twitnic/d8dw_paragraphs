<?php

namespace Drupal\d8dw_paragraphs\TwigExtension;


class Children extends \Twig_Extension
{

  /**
   * Generates a list of all Twig filters that this extension defines.
   */
  public function getFilters()
  {
    return [
      new \Twig_SimpleFilter('children', array($this, 'children')),
    ];
  }


  /**
   * Gets a unique identifier for this Twig extension.
   */
  public function getName()
  {
    return 'd8dw_paragraphs.twig_extension';
  }


  /**
   * Get the children of a field (FieldItemList)
   */
  public static function Children($variable)
  {
    if (!empty($variable['#items']) && $variable['#items']->count() > 0) {
      return $variable['#items']->getIterator();
    }

    return null;
  }

}
