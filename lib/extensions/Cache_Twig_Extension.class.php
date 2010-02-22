<?php

/*
 * This file is part of the sfTwigPlugin package.
 *
 * (c) Henrik Bjornskov <henrik@bearwoods.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Cache helpers.
 *
 * @package    sfTwigPlugin
 * @subpackage extension
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class Cache_Twig_Extension extends Twig_Extension
{
  public function getFilters()
  {
    return array(
      'cache'      => new Twig_Filter_Function('cache'),
      'cache_save' => new Twig_Filter_Function('cache_save'),
    );
  }

  public function getName()
  {
    return 'cache';
  }
}
