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
 * Partial helpers.
 *
 * @package    sfTwigPlugin
 * @subpackage extension
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class Partial_Twig_Extension extends Twig_Extension
{
  public function getFilters()
  {
    return array(
      'include_component_slot' => new Twig_Filter_Function('include_component_slot'),
      'get_component_slot'     => new Twig_Filter_Function('get_component_slot'),
      'has_component_slot'     => new Twig_Filter_Function('has_component_slot'),
      'include_component'      => new Twig_Filter_Function('include_component'),
      'get_component'          => new Twig_Filter_Function('get_component'),
      'include_partial'        => new Twig_Filter_Function('include_partial'),
      'get_partial'            => new Twig_Filter_Function('get_partial'),
      'slot'                   => new Twig_Filter_Function('slot'),
      'end_slot'               => new Twig_Filter_Function('end_slot'),
      'has_slot'               => new Twig_Filter_Function('has_slot'),
      'include_slot'           => new Twig_Filter_Function('include_slot'),
      'get_slot'               => new Twig_Filter_Function('get_slot'),
    );
  }

  public function getName()
  {
    return 'partial';
  }
}
