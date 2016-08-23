<?php

  require_once("../config/session_info.php");

  /**
   * Session destroy
   */
  //echo session_encode(); // debug
  $_SESSION = array(); // deregister all current session variables

  /**
   * Cookie destroy
   */
  $params = session_get_cookie_params();
  setcookie(session_name(), 0, 1, $params['path']);
  unset($params);
  /*if (isset($_COOKIE[session_name()])) // PHP Manual (session_destroy)
  {
    setcookie(session_name(), '', time() - 42000, '/');
  }*/

  session_destroy(); // clean up session ID

  header("Location: ../home/index.php");
?>
