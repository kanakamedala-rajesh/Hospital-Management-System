<?php

  require_once(dirname(__FILE__) . "/../lib/exe_protect.php");
  executionProtection(__FILE__);

/**
 * A T T E N T I O N !
 *
 * Please modify the following database connection variables to match
 * the MySQL database and user that you have created for OpenClinic.
 */
  define("OPEN_HOST",       "localhost");
  define("OPEN_DATABASE",   "openclinic");
  define("OPEN_USERNAME",   "root");
  define("OPEN_PWD",        "");
  define("OPEN_PERSISTENT", true);
?>
