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
 * Tag helpers.
 *
 * @package    sfTwigPlugin
 * @subpackage extension
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class Tag_Twig_Extension extends Twig_Extension
{
    public function getFunctions()
    {
        $options = array('is_safe' => array('html'));

        return array(
            'tag' => new Twig_Filter_Function('tag', $options),
            'content_tag' => new Twig_Filter_Function('content_tag', $options),
            'cdata_section' => new Twig_Filter_Function('cdata_section', $options),
            'comment_as_conditional' => new Twig_Filter_Function('comment_as_conditional', $options),
            'escape_javascript' => new Twig_Filter_Function('escape_javascript', $options),
            'escape_once' => new Twig_Filter_Function('escape_once', $options),
            'fix_double_escape' => new Twig_Filter_Function('fix_double_escape', $options),
            'get_id_from_name' => new Twig_Filter_Function('get_id_from_name', $options),
        );
    }

    public function getName()
    {
        return 'tag';
    }
}
