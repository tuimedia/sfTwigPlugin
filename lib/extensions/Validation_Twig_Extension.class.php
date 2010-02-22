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
 * Validation helpers.
 *
 * @package    sfTwigPlugin
 * @subpackage extension
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class Validation_Twig_Extension extends Twig_Extension
{
  public function getFilters()
  {
    return array(
      'form_has_error' => array('form_has_error', false),
      'form_error'     => array('form_error', false),
    );
  }

  public function getName()
  {
    return 'validation';
  }
}
