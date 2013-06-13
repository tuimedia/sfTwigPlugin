<?php
/**
 * Класс для ленивой инициализации twig
 *
 * @author Yuriy Berest <djua.com@gmail.com>
 */
class sfTwigRenderEngine
{

    const SF_CONTEXT_ATTR_NAME = 'twig.engine';

    /**
     * @param sfContext $context
     *
     * @return sfTwigRenderEngine
     */
    public static function getInstanceFromContext(sfContext $context)
    {
        return $context->get(self::SF_CONTEXT_ATTR_NAME);
    }

    /**
     * @param sfContext $context
     */
    public static function addEngineToContext(sfContext $context)
    {
        if (!$context->has(self::SF_CONTEXT_ATTR_NAME)) {
            $context->set(self::SF_CONTEXT_ATTR_NAME, new sfTwigRenderEngine($context));
        }
    }

    /**
     * @var sfTwigEnvironment
     */
    protected $twig = null;

    /**
     * @var sfContext
     */
    protected $sfContext;

    /**
     * @param sfContext $context
     */
    public function __construct(sfContext $context)
    {
        $this->sfContext = $context;
    }

    /**
     * Создание и предварительное конфигурирование лоадера
     *
     * @return sfTwigLoaderFs
     */
    protected function createLoader()
    {
        $loader = new sfTwigLoaderFs(sfConfig::get('sf_app_dir'));

        return $loader;
    }

    /**
     * @return sfTwigEnvironment
     */
    protected function createTwigInstance()
    {
        $twig = new sfTwigEnvironment($this->createLoader(), array(
            'cache' => sfConfig::get('sf_template_cache_dir'),
            'debug' => sfConfig::get('sf_debug', false),
            'sf_context' => $this->sfContext,
        ));

        if ($twig->isDebug()) {
            $twig->enableAutoReload();
            $twig->setCache(null);
        }

        return $twig;
    }


    /**
     * Loads standard extensions for Symfony into the view.
     */
    protected function loadExtensions()
    {
        // should be replaced with sf_twig_standard_extensions
        $prefixes = array_merge(
            array('Helper', 'Url', 'Asset', 'Tag', 'Escaping', 'Partial', 'I18N'),
            sfConfig::get('sf_standard_helpers')
        );

        foreach ($prefixes as $prefix) {
            $className = $prefix . '_Twig_Extension';
            if (class_exists($className)) {
                $this->twig->addExtension(new $className());
            }
        }

        // for now the extensions needs the original helpers so lets load thoose.
        $this->sfContext->getConfiguration()->loadHelpers($prefixes);

        // makes it possible to load custom twig extensions.
        foreach (sfConfig::get('sf_twig_extensions', array()) as $extension) {
            if (!class_exists($extension)) {
                throw new InvalidArgumentException(sprintf(
                    'Unable to load "%s" as an Twig_Extension into Twig_Environment',
                    $extension
                ));
            }

            $this->twig->addExtension(new $extension());
        }
    }

    public function getTwig()
    {
        if ($this->twig === null) {
            $this->twig = $this->createTwigInstance();
            $this->loadExtensions();
        }

        return $this->twig;
    }

}
