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
 * Loading sf helpers.
 *
 * @author Henrik Bjornskov <henrik@bearwoods.dk>
 * @author Yuriy Berest <henrik@bearwoods.dk>
 */
class sfHelperTwigExtension extends Twig_Extension
{

    /**
     * @var sfContext
     */
    protected $sfContext;

    /**
     * {@inheritdoc}
     */
    public function initRuntime(Twig_Environment $environment)
    {
        /** @var $environment sfTwigEnvironment */
        if ($environment instanceof sfTwigEnvironment) {
            $this->sfContext = $environment->getContext();
        } else {
            throw new \InvalidArgumentException('$environment must be instance of sfTwigEnvironment class');
        }

        parent::initRuntime($environment);
    }

    /**
     * Загрузка старнадтного helper'a symfony
     */
    public function loadSfExtension()
    {
        $this->sfContext->getConfiguration()
            ->loadHelpers(func_get_args(), $this->sfContext->getModuleName());
    }

    /**
     * Вызов любой ф-и
     *
     * @return mixed
     */
    public function callHelperFunction()
    {
        $args = func_get_args();
        $funcName = array_shift($args);

        return call_user_func_array($funcName, $args);
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'use_helper' => new Twig_Function_Function(array($this, 'loadSfExtension')),
            'call_helper_func' => new Twig_Function_Function(array($this, 'callHelperFunction'), array(
                'is_safe' => array('html')
            )),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'helper';
    }
}
