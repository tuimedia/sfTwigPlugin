<?php
class Cache_Twig_Extension extends Twig_Extension
{
  public function getFilters()
  {
    return array(
              'cache' => new Twig_Filter_Function('cache'),
              'cache_save' => new Twig_Filter_Function('cache_save'),
            );
  }

  public function getName()
  {
    return 'cache';
  }
}
