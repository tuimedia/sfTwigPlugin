<?php

class Partial_Twig_Extension extends Twig_Extension
{
  public function getFilters()
  {
    return array(
              "include_component_slot" => new Twig_Filter_Function('include_component_slot'),
              "get_component_slot" => new Twig_Filter_Function('get_component_slot'),
              "has_component_slot" => array("has_component_slot", false),
              "include_component" => array("include_component", false),
              "get_component" => array("get_component", false),
              "include_partial" => new Twig_Filter_Function('include_partial'),
              "get_partial" => array("get_partial", false),
              "slot" => array("slot", false),
              "end_slot" => array("end_slot", false),
              "has_slot" => array("has_slot", false),
              "include_slot" => array("include_slot", false),
              "get_slot" => array("get_slot", false),
            );
  }

  public function getName()
  {
    return "partial";
  }
}
