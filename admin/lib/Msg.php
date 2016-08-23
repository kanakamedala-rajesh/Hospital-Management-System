<?php

require_once(dirname(__FILE__) . "/HTML.php");
class Msg
{
  /**
   * string hint(string $text)
   *
   * @param string $text
   * @return string HTML message
   * @access public
   * @static
   */
  public static function hint($text)
  {
    return HTML::message($text, OPEN_MSG_HINT);
  }

  /**
   * string info(string $text)
   *
   * @param string $text
   * @return string HTML message
   * @access public
   * @static
   */
  public static function info($text)
  {
    return HTML::message($text, OPEN_MSG_INFO);
  }

  /**
   * string warning(string $text)
   *
   * @param string $text
   * @return string HTML message
   * @access public
   * @static
   */
  public static function warning($text)
  {
    return HTML::message($text, OPEN_MSG_WARNING);
  }

  /**
   * string error(string $text)
   *
   * @param string $text
   * @return string HTML message
   * @access public
   * @static
   */
  public static function error($text)
  {
    return HTML::message($text, OPEN_MSG_ERROR);
  }
} // end class
?>
