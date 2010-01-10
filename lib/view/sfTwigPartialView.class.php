<?php
/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 * (c) 2004-2006 Sean Kerr <sean@code-box.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 

/**
 * A partial view that uses Twig as the templating engine.
 *
 * @package    symfony
 * @subpackage sfTwigPlugin
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class sfTwigPartialView extends sfTwigView
{
    /**
     * @var array of variables to pass to the partial template
     */
    protected $partialVars = array();
    
    /**
     * Method used by symfony to force add the extra variables when rendering a partial
     *
     * @param array $variables
     * @return void
     */
    public function setPartialVars(array $variables)
    {
        $this->partialVars = $variables;
        $this->getAttributeHolder()->add($variables);
    }
    
    /**
     * Invokes the parent configure and forces the this view object not to decorate
     *
     * @return false
     */
    public function configure()
    {
        parent::configure();        
        $this->setDecorator(false);
    }
}