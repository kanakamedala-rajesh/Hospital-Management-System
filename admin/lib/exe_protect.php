<?php


  executionProtection(__FILE__);

/**
 * void executionProtection(string $file, string $redirect = '../index.php')
 *
 * If complete path (__FILE__ in calling archive) is equal than execution script,
 * function redirects to a well-known page
 * Serves to protect incorrect code execution
 *
 * Use case: (in the begining of the file, include these lines)
 *  require_once(dirname(__FILE__) . "/../lib/exe_protect.php");
 *  executionProtection(__FILE__);
 *
 * @param string $file
 * @param string $redirect (optional)
 * @return void
 * @access public
 */
function executionProtection($file, $redirect = '../index.php')
{
  if (empty($file))
  {
    exit(); // if not parameter, exit before continue with script execution
  }

  $_serverVar = (strpos(PHP_SAPI, 'cgi') !== false)
    ? $_SERVER['PATH_TRANSLATED']
    : $_SERVER['SCRIPT_FILENAME'];

  if (str_replace("\\", "/", $file) == str_replace("\\", "/", $_serverVar))
  {
    header("Location: " . $redirect);
    exit();
  }
}
?>
