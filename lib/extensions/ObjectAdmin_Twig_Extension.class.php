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
 * ObjectAdmin helpers.
 *
 * @package    sfTwigPlugin
 * @subpackage extension
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class ObjectAdmin_Twig_Extension extends Twig_Extension
{
  public function getFilters()
  {
    return array(
      'object_admin_input_file_tag' => array('object_admin_input_file_tag', false),
      'object_admin_double_list'    => array('object_admin_double_list', false),
      'object_admin_select_list'    => array('object_admin_select_list', false),
      'object_admin_check_list'     => array('object_admin_check_list', false),
    );
  }

  public function getName()
  {
    return 'objectadmin';
  }
}
