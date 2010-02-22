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
 * I18N helpers.
 *
 * @package    sfTwigPlugin
 * @subpackage extension
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class I18N_Twig_Extension extends Twig_Extension
{
  public function getFilters()
  {
    return array(
      '__'                   => new Twig_Filter_Function('__'),
      't'                    => new Twig_Filter_Function('__'),
      'format_number_choice' => new Twig_Filter_Function('format_number_choice'),
      'format_country'       => new Twig_Filter_Function('format_country'),
      'format_language'      => new Twig_Filter_Function('format_language'),
    );
  }

  public function getName()
  {
    return 'i18n';
  }
}
