<?php
/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 * (c) 2004-2006 Sean Kerr <sean@code-box.org>
 * (c) 2010-2010 Henrik Bjornskov <henrik@bearwoods.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * A view that uses Twig as the templating engine.
 *
 * Unlike original Henrik's branch, my interest in using twig is to ease the
 * development <-> integration communication by removing duplicate work. I want
 * all templates to be in one place, and only one.
 *
 * Therefore, templates are not anymore in modules, but in %sf_data_dir%/template/module_name/template
 *
 * This may change.
 *
 * TODO
 * - find a way to change template in actions
 *
 * @package    symfony
 * @subpackage sfTwigPlugin
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 * @author     Romain Dorgueil <romain.dorgueil@symfony-project.com>
 */
class sfTwigView extends sfPHPView
{
  /**
   * @var Twig_Environment
   */
  protected $twig = null;

  /**
   * @var Twig_Loader_Filesystem
   */
  protected $loader = null;

  /**
   * @var sfApplicationConfiguration
   */
  protected $configuration = null;

  /**
   * @var string Extension used by twig templates. which is .html
   */
  protected $extension = '.html';

  /**
   * Loads the Twig instance and registers the autoloader.
   *
   * @return void
   */
  public function configure()
  {
    // is this the best way ?
    $this->directory = sfConfig::get('sf_data_dir').'/template/module/'.$this->moduleName;
    $this->decoratorDirectory = sfConfig::get('sf_data_dir').'/template/application/'.sfConfig::get('sf_app');

    parent::configure();

    $this->configuration = $this->context->getConfiguration();

    // Empty array becuase it changes based on the rendering context
    $this->loader = new Twig_Loader_Filesystem(array());

    $this->twig = new sfTwigEnvironment($this->loader, array(
          'cache' => sfConfig::get('sf_template_cache_dir'),
          'debug' => sfConfig::get('sf_debug', false),
          'sf_context' => $this->context,
          ));

    if ($this->twig->isDebug())
    {
      $this->twig->setAutoReload(true);
    }

    $this->loadExtensions();
  }

  /**
   * Sets the template for this view.
   *
   * If the template path is relative, it will be based on the currently
   * executing module's template sub-directory.
   *
   * @param string $template  An absolute or relative filesystem path to a template
   */
  public function setTemplate($template)
  {
    if (sfToolkit::isPathAbsolute($template))
    {
      // TODO remove line below
      $this->directory or $this->directory = dirname($template);
      $this->template  = basename($template);
    }
    else
    {
      // TODO remove line below
      $this->directory or $this->directory = $this->context->getConfiguration()->getTemplateDir($this->moduleName, $template);
      $this->template = $template;
    }
  }

  /**
   * Returns the Twig_Environment
   *
   * @return Twig_Environment
   */
  public function getEngine()
  {
    return $this->twig;
  }

  /**
   * Loads standard extensions for Symfony into the view, the extensions should be replaced
   * with real Twig extensions where tags and filters are determained.
   *
   * @return void
   */
  protected function loadExtensions()
  {
    $this->twig->addExtension(new sfTwigExtensionAsset());
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

    $this->loader->setPaths((array) realpath(dirname($file)));

    $event = $this->dispatcher->filter(new sfEvent($this, 'template.filter_parameters'), $this->attributeHolder->getAll());

    return $this->twig->loadTemplate(basename($file))->render($event->getReturnValue());
  }
}
