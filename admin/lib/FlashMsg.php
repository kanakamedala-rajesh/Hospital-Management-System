<?php


require_once(dirname(__FILE__) . "/HTML.php");

class FlashMsg
{

  public static function add($message, $type = OPEN_MSG_INFO, $key = null)
  {
    if (empty($message))
    {
      return false;
    }

    if (isset($key)) // "private" message
    {
      $_SESSION['flash_msg'][$key][] = array('msg' => $message, 'type' => $type);
    }
    else // "public" message
    {
      $_SESSION['flash_msg_public'][] = array('msg' => $message, 'type' => $type);
    }

    return true;
  }

  /**
   * string get(string $key = null)
   *
   * @param string $key (optional) for "private" message
   * @return string
   * @access public
   * @static
   */
  public static function get($key = null)
  {
    $_html = '';

    if ( !isset($key) ) // "public" message(s)
    {
      if (isset($_SESSION['flash_msg_public']))
      {
        foreach ($_SESSION['flash_msg_public'] as $_value)
        {
          $_html .= HTML::message($_value['msg'], $_value['type']);
        }
        unset($_SESSION['flash_msg_public']);
      }
    }
    else // "private" message(s)
    {
      if (isset($_SESSION['flash_msg'][$key]))
      {
        foreach ($_SESSION['flash_msg'][$key] as $_value)
        {
          $_html .= HTML::message($_value['msg'], $_value['type']);
        }
        unset($_SESSION['flash_msg'][$key]);
      }
    }

    return $_html;
  }
}
?>
