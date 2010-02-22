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
 * Asset helpers.
 *
 * @package    sfTwigPlugin
 * @subpackage extension
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class Asset_Twig_Extension extends Twig_Extension
{
  public function getFilters()
  {
    return array(
      'auto_discovery_link_tag'        => new Twig_Filter_Function('auto_discovery_link_tag'),
      'javascript_path'                => new Twig_Filter_Function('javascript_path'),
      'javascript_include_tag'         => new Twig_Filter_Function('javascript_include_tag'),
      'stylesheet_path'                => new Twig_Filter_Function('stylesheet_path'),
      'stylesheet_tag'                 => new Twig_Filter_Function('stylesheet_tag'),
      'use_stylesheet'                 => new Twig_Filter_Function('use_stylesheet'),
      'use_javascript'                 => new Twig_Filter_Function('use_javascript'),
      'decorate_with'                  => new Twig_Filter_Function('decorate_with'),
      'image_path'                     => new Twig_Filter_Function('image_path'),
      'image_tag'                      => new Twig_Filter_Function('image_tag'),
      'include_metas'                  => new Twig_Filter_Function('include_metas'),
      'include_http_metas'             => new Twig_Filter_Function('include_http_metas'),
      'include_title'                  => new Twig_Filter_Function('include_title'),
      'get_javascripts'                => new Twig_Filter_Function('get_javascripts'),
      'include_javascripts'            => new Twig_Filter_Function('include_javascripts'),
      'get_stylesheets'                => new Twig_Filter_Function('get_stylesheets'),
      'include_stylesheets'            => new Twig_Filter_Function('include_stylesheets'),
      'dynamic_javascript_include_tag' => new Twig_Filter_Function('dynamic_javascript_include_tag'),
      'use_dynamic_javascript'         => new Twig_Filter_Function('use_dynamic_javascript'),
      'use_dynamic_stylesheet'         => new Twig_Filter_Function('use_dynamic_stylesheet'),
      'getjavascripts'                 => new Twig_Filter_Function('getjavascripts'),
      'get_javascripts_for_form'       => new Twig_Filter_Function('get_javascripts_for_form'),
      'include_javascripts_for_form'   => new Twig_Filter_Function('include_javascripts_for_form'),
      'use_javascripts_for_form'       => new Twig_Filter_Function('use_javascripts_for_form'),
      'getstylesheets'                 => new Twig_Filter_Function('getstylesheets'),
      'get_stylesheets_for_form'       => new Twig_Filter_Function('get_stylesheets_for_form'),
      'include_stylesheets_for_form'   => new Twig_Filter_Function('include_stylesheets_for_form'),
      'use_stylesheets_for_form'       => new Twig_Filter_Function('use_stylesheets_for_form'),
    );
  }

  public function getName()
  {
    return 'asset';
  }
}
