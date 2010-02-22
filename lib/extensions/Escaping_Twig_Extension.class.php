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
 * Escaping helpers.
 *
 * @package    sfTwigPlugin
 * @subpackage extension
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class Escaping_Twig_Extension extends Twig_Extension
{
  public function getFilters()
  {
    return array(
      'esc_entities'       => new Twig_Filter_Function('esc_entities'),
      'esc_specialchars'   => new Twig_Filter_Function('esc_specialchars'),
      'esc_raw'            => new Twig_Filter_Function('esc_raw'),
      'esc_js'             => new Twig_Filter_Function('esc_js'),
      'esc_js_no_entities' => new Twig_Filter_Function('esc_js_no_entities'),
    );
  }

  public function getName()
  {
    return 'escaping';
  }
}
