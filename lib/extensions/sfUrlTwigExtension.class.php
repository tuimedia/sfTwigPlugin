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
 * @author     Yuriy Berest <djua.com@gmail.com>
 */
class sfUrlTwigExtension extends sfTwigExtension
{
    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return $this->buildMirrorFunctions(
            array(
                'link_to', 'link_to2', 'link_to1', 'link_to_if', 'link_to_unless',
                'url_for2', 'url_for1', 'url_for', 'url_for_form',
                'form_tag_for', 'public_path', 'button_to', 'form_tag', 'mail_to'
            ), array(
                'is_safe' => array('html')
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'url';
    }
}
