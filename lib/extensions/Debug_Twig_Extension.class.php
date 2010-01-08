<?php
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
