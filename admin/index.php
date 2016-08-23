<?php

  // Ensuring a minimum version of PHP
  define("OPEN_PHP_VERSION", '5.3.1'); // @fixme in global_constants.php
  if (version_compare(phpversion(), OPEN_PHP_VERSION) < 0)
  {
    exit(sprintf('PHP %s or higher is required.', OPEN_PHP_VERSION));
  }

  require_once("./config/database_constants.php");

  function _message()
  {
    $no = mysql_errno();
    $msg = mysql_error();
    echo $no . '<br />' . $msg . '<hr />';
    echo 'This Server is not ready to work. Contact admin and ask to start MySQL server.<br />';
    //echo 'If it is your first use <a href="./install/wizard.php">go to the new installation process</a>.';
    //echo '<br />Or if you prefer <a href="./install/index.php">go to normal install script</a>.';
  }

  if ( !extension_loaded("mysql") )
  {
    echo 'It is impossible execute OpenClinic without MySQL support.' . '<br />';
    echo 'When you installed it, try again.' . '<br />';
    //echo 'For more details, see <a href="./install.html">Install instructions</a>.';
    exit();
  }

  $db = @mysql_connect(
    OPEN_HOST . (defined("OPEN_PORT") ? ':' . OPEN_PORT : ''),
    OPEN_USERNAME,
    OPEN_PWD
  );
  if ( !$db )
  {
    _message();
    exit();
  }

  $selectResult = mysql_select_db(OPEN_DATABASE, $db);
  if ( !$selectResult )
  {
    _message();
    exit();
  }

  @mysql_close($db);

  header("Location: home/index.php");
?>
