<?php
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
