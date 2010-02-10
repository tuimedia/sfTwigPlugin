<?php

class sfTwigNodeAsset extends Twig_Node/* implements Twig_NodeListInterface*/
{
  protected $helper;
  protected $values;
  protected $isMultitarget;

  public function __construct($helper, $values, $lineno, $tag = null)
  {
    parent::__construct($lineno, $tag);

    $this->helper = $helper;
    $this->values = $values;
  }
/*
  public function __toString()
  {
    $repr = array(get_class($this).'('.($this->isMultitarget ? implode(', ', $this->names) : $this->names).',');
    foreach ($this->isMultitarget ? $this->values : array($this->values) as $node)
    {
      foreach (explode("\n", $node->__toString()) as $line)
      {
        $repr[] = '  '.$line;
      }
    }
    $repr[] = ')';

    return implode("\n", $repr);
  }

  public function getNodes()
  {
    if ($this->isMultitarget)
    {
      return $this->values;
    }
    else
    {
      return array($this->values);
    }
  }

  public function setNodes(array $nodes)
  {
    $this->values = $this->isMultitarget ? $nodes : $nodes[0];
  }
*/
  public function compile($compiler)
  {
    $compiler->addDebugInfo($this);

    $compiler->write($this->helper."(");
    foreach ($this->values as $idx => $value)
    {
      if ($idx)
      {
        $compiler->raw(', ');
      }

      $compiler->subcompile($value);
    }
    $compiler->write(");\n");
  }
}
