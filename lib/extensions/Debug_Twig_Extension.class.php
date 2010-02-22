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
 * Debug helpers.
 *
 * @package    sfTwigPlugin
 * @subpackage extension
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class Debug_Twig_Extension extends Twig_Extension
{
  public function getFilters()
  {
    return array(
      'log_message' => new Twig_Filter_Function('log_message'),
    );
  }

  public function getName()
  {
    return 'debug';
  }
}
