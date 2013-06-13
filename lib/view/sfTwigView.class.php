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
 * A view that uses Twig as the templating engine.
 *
 * @package    sfTwigPlugin
 * @subpackage view
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 * @author     Yurii Berest <djua.com@gmail.com>
 */
class sfTwigView extends sfPHPView
{

    /**
     * @var string Extension used by twig templates. which is .html
     */
    protected $extension = '.twig';

    /**
     * Returns the Twig_Environment
     *
     * @return Twig_Environment
     */
    public function getEngine()
    {
        return sfTwigRenderEngine::getInstanceFromContext($this->context)->getTwig();
    }

    protected function getNamespaceByTplPath($tplPath)
    {
        $tplPath = realpath($tplPath);

        $moduleDir = sfConfig::get('sf_app_module_dir');
        $str = str_replace($moduleDir, '', $tplPath);
        $str = ltrim($str, '/\\');
        $data = explode('/', $str);
        if (count($data) === 3) {
            return $data[0];
        } else {
            return 'root';
        }
    }

    /**
     * This renders a file based on the $file and sf_type.
     *
     * @param string $file the fullpath to the template file
     *
     * @return string
     */
    protected function renderFile($file)
    {
        if (sfConfig::get('sf_logging_enabled', false)) {
            $this->dispatcher->notify(new sfEvent($this, 'application.log', array(sprintf('Render "%s"', $file))));
        }

        $namespace = $this->getNamespaceByTplPath($file);
        $tplName = '@' . $namespace . '/' . basename($file);

        $event = $this->dispatcher->filter(new sfEvent($this, 'template.filter_parameters'), $this->attributeHolder->getAll());

        return $this->getEngine()->loadTemplate($tplName)->render($event->getReturnValue());
    }
}
