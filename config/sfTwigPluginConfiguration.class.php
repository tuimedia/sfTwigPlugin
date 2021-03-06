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
 * sfTwigPlugin configuration.
 *
 * @package    sfTwigPlugin
 * @subpackage config
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 * @author     Kris Wallsmith <kris.wallsmith@symfony-project.com>
 * @author     Yurii Berest <djua.com@gmail.com>
 */
class sfTwigPluginConfiguration extends sfPluginConfiguration
{
    const VERSION = '0.1.4-DEV';

    /**
     * @see sfPluginConfiguration
     */
    public function configure()
    {
        $defaultDir = dirname(__FILE__) . '/../lib/vendor/Twig/lib';
        require_once sfConfig::get('sf_twig_lib_dir', $defaultDir) . '/Twig/Autoloader.php';

        Twig_Autoloader::register();

        $this->dispatcher->connect('context.load_factories', array($this, 'listenToLoadFactoriesEvent'));
    }

    /**
     * @param sfEvent $event
     */
    public function listenToLoadFactoriesEvent(sfEvent $event)
    {
        /** @var sfContext $sfContext */
        sfTwigRenderEngine::addEngineToContext($event->getSubject());
    }

}
