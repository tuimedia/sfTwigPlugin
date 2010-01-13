<?php
/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 * (c) 2010-2010 Henrik Bjornskov <henrik@bearwoods.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Symfony specific Twig Environment, enables the user to get sfContext without the getInstance method.
 * and later on enable more symfony goodness
 *
 * @package    symfony
 * @subpackage sfTwigPlugin
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class sfTwigEnvironment extends Twig_Environment
{
    /**
     * @var sfContext
     */
    protected $context = null;
    
    /**
     * @see Twig_Environment::__construct()
     */
    public function __construct(Twig_LoaderInterface $loader, array $options = array())
    {
        parent::__construct($loader, $options);
        
        $this->context = isset($options['sf_context']) && $options['sf_context'] instanceof sfContext ? $options['sf_context'] : sfContext::getInstance();
    }
    
    /**
     * Returns sfContext this can be used in filters.
     *
     * @return sfContext
     */
    public function getContext()
    {
        return $this->context;
    }
}