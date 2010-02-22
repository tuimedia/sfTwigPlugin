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
 * Helper helpers.
 *
 * @package    sfTwigPlugin
 * @subpackage extension
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class Helper_Twig_Extension extends Twig_Extension
{
  public function getFilters()
  {
    return array(
      'use_helper' => new Twig_Filter_Function('use_helper'),
    );
  }

  public function getName()
  {
    return 'helper';
  }
}
