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
 * Asset helpers.
 *
 * @package    sfTwigPlugin
 * @subpackage extension
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 * @author     Yuriy Berest <djua.com@gmail.com>
 */
class sfAssetTwigExtension extends sfTwigExtension
{

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        $result = $this->buildMirrorFunctions(array(
            'image_tag',
            'decorate_with',
            'auto_discovery_link_tag',
            'include_metas', 'include_http_metas', 'include_title',
            //
            'javascript_include_tag', 'get_javascripts', 'include_javascripts',
            'dynamic_javascript_include_tag', 'use_dynamic_javascript', 'use_dynamic_stylesheet',
            'get_javascripts_for_form', 'include_javascripts_for_form',
            //
            'stylesheet_tag', 'get_stylesheets', 'include_stylesheets',
            'get_stylesheets_for_form', 'include_stylesheets_for_form'
        ), array(
            'is_safe' => array('html')
        ));

        return array_merge($result, $this->buildMirrorFunctions(array(
            'javascript_path', 'use_javascript',
            'stylesheet_path', 'use_stylesheet',
            'image_path', 'use_stylesheets_for_form'
        )));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'asset';
    }
}
