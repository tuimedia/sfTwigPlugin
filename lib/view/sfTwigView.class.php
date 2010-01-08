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
 * A view that uses Twig as the templating engine.
 *
 * @package    symfony
 * @subpackage sfTwigPlugin
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class sfTwigView extends sfPHPView
{
    protected
        $twig = null,
        $loader = null,
        $configuration = null;
        
    /**
     * Loads the Twig instance and registers the autoloader.
     *
     * @return void
     */
    public function configure()
    {
        parent::configure();
        
        $this->configuration = $this->context->getConfiguration();
        
        //Empty array becuase it changes based on the rendering context
        $this->loader = new Twig_Loader_Filesystem(array());
        
        $this->twig = new Twig_Environment($this->loader, array(
            'auto_reload' => sfConfig::get('sf_debug', false),
            'cache' => sfConfig::get('sf_template_cache_dir'),
            'debug' => sfConfig::get('sf_debug', false),
        )); 
        
        $this->loadExtensions();       
    }
    
    /**
     * Loads standard extensions for Symfony into the view, the extensions should be replaced
     * with real Twig extensions where tags and filters are determained.
     *
     * @return void
     */
    protected function loadExtensions()
    {
        //Should be replaced with sf_twig_standard_extensions
        $prefixes = array_merge(array('Helper', 'Url', 'Asset', 'Tag', 'Escaping', 'Partial'), sfConfig::get('sf_standard_helpers'));
        
        foreach ($prefixes as $prefix) {
            $class_name = $prefix . '_Twig_Extension';
            if (class_exists($class_name)) {
                $this->twig->addExtension(new $class_name());
            }
        }
    }
    
    /**
     * This renders a file based on the $file and sf_type
     *
     * @param string $file the fullpath to the template file
     * @return string
     */
    protected function renderFile($file)
    {
        if (sfConfig::get('sf_logging_enabled', false)) {
            $this->dispatcher->notify(new sfEvent($this, 'application.log', array(sprintf('Render "%s".', $file))));
        }
        
        if ($this->attributeHolder->get('sf_type') == 'layout') {
            $this->loader->setPaths(array_filter($this->configuration->getDecoratorDirs(), 'file_exists'));
        } else {
            $this->loader->setPaths(array_filter($this->configuration->getTemplateDirs($this->getModuleName()), 'file_exists'));
        }
        
        return $this->twig->loadTemplate(basename($file))->render($this->attributeHolder->getAll());
    }
    
    /**
     * Returns the extension for the templates, uses HTML so editors
     * will provided syntax highlighting. For nice syntax highlight get the
     * syntax for django html.
     *
     * @return string
     */
    public function getExtension()
    {
        return '.html';
    }
}