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
 * Url helpers.
 *
 * @package    sfTwigPlugin
 * @subpackage extension
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class Url_Twig_Extension extends Twig_Extension
{
    public function getFunctions()
    {
        $options = array('is_safe' => array('html'));

        return array(
            'link_to2' => new Twig_Function_Function('link_to2', $options),
            'link_to1' => new Twig_Function_Function('link_to1', $options),
            'url_for2' => new Twig_Function_Function('url_for2', $options),
            'url_for1' => new Twig_Function_Function('url_for1', $options),
            'url_for' => new Twig_Function_Function('url_for', $options),
            'link_to' => new Twig_Function_Function('link_to', $options),
            'url_for_form' => new Twig_Function_Function('url_for_form', $options),
            'form_tag_for' => new Twig_Function_Function('form_tag_for', $options),
            'link_to_if' => new Twig_Function_Function('link_to_if', $options),
            'link_to_unless' => new Twig_Function_Function('link_to_unless', $options),
            'public_path' => new Twig_Function_Function('public_path', $options),
            'button_to' => new Twig_Function_Function('button_to', $options),
            'form_tag' => new Twig_Function_Function('form_tag', $options),
            'mail_to' => new Twig_Function_Function('mail_to', $options),
        );
    }

    public function getName()
    {
        return 'url';
    }
}
