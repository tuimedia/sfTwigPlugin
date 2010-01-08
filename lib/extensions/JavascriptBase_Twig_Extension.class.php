<?php
class Javascriptbase_Twig_Extension extends Twig_Extension
{
  public function getFilters()
  {
    return array(
              'link_to_function' => new Twig_Filter_Function('link_to_function'),
              'button_to_function' => new Twig_Filter_Function('button_to_function'),
              'javascript_tag' => new Twig_Filter_Function('javascript_tag'),
              'end_javascript_tag' => new Twig_Filter_Function('end_javascript_tag'),
              'javascript_cdata_section' => new Twig_Filter_Function('javascript_cdata_section'),
              'if_javascript' => new Twig_Filter_Function('if_javascript'),
              'end_if_javascript' => new Twig_Filter_Function('end_if_javascript'),
              'array_or_string_for_javascript' => new Twig_Filter_Function('array_or_string_for_javascript'),
              'options_for_javascript' => new Twig_Filter_Function('options_for_javascript'),
              'boolean_for_javascript' => new Twig_Filter_Function('boolean_for_javascript'),
            );
  }

  public function getName()
  {
    return 'javascriptbase';
  }
}
