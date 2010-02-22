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
 * Number helpers.
 *
 * @package    sfTwigPlugin
 * @subpackage extension
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class Number_Twig_Extension extends Twig_Extension
{
  public function getFilters()
  {
    return array(
      'format_number'   => new Twig_Filter_Function('format_number'),
      'format_currency' => new Twig_Filter_Function('format_currency'),
    );
  }

  public function getName()
  {
    return 'number';
  }
}
