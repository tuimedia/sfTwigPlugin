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
 * DateForm helpers.
 *
 * @package    sfTwigPlugin
 * @subpackage extension
 * @author     Henrik Bjornskov <henrik@bearwoods.dk>
 */
class DateForm_Twig_Extension extends Twig_Extension
{
  public function getFilters()
  {
    return array(
      'select_day_tag'      => array('select_day_tag', false),
      'select_month_tag'    => array('select_month_tag', false),
      'select_year_tag'     => array('select_year_tag', false),
      'select_date_tag'     => array('select_date_tag', false),
      'select_second_tag'   => array('select_second_tag', false),
      'select_minute_tag'   => array('select_minute_tag', false),
      'select_hour_tag'     => array('select_hour_tag', false),
      'select_ampm_tag'     => array('select_ampm_tag', false),
      'select_time_tag'     => array('select_time_tag', false),
      'select_datetime_tag' => array('select_datetime_tag', false),
      'select_number_tag'   => array('select_number_tag', false),
      'select_timezone_tag' => array('select_timezone_tag', false),
    );
  }

  public function getName()
  {
    return 'dateform';
  }
}
