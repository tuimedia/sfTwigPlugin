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
 * Partial helpers.
 *
 * @package    sfTwigPlugin
 * @subpackage extension
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 * @author     Yuriy Berest <djua.com@gmail.com>
 */
class sfPartialTwigExtension extends Twig_Extension
{
    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        $options = array('is_safe' => array('html'));

        return array(
            'include_component_slot' => new Twig_Function_Function('include_component_slot', $options),
            'get_component_slot' => new Twig_Function_Function('get_component_slot', $options),
            'has_component_slot' => new Twig_Function_Function('has_component_slot'),
            //
            'include_component' => new Twig_Function_Function('include_component'),
            'get_component' => new Twig_Function_Function('get_component', $options),
            'include_partial' => new Twig_Function_Function('include_partial'),
            'get_partial' => new Twig_Function_Function('get_partial', $options),
            //
            'slot' => new Twig_Function_Function('slot'),
            'end_slot' => new Twig_Function_Function('end_slot'),
            'has_slot' => new Twig_Function_Function('has_slot'),
            'include_slot' => new Twig_Function_Function('include_slot'),
            'get_slot' => new Twig_Function_Function('get_slot', $options),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'partial';
    }
}
