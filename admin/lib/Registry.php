<?php
class Registry
{
  private static $_registry = null;

  /**
   * mixed getInstance(void)
   *
   * @return contents of registry
   * @access public
   * @static
   */
  public static function getInstance()
  {
    return self::$_registry;
  }

  /**
   * void unsetInstance(void)
   *
   * @return void
   * @access public
   * @static
   */
  public static function unsetInstance()
  {
    self::$_registry = null;
  }

  /**
   * mixed get(string $index)
   *
   * @param string $index
   * @return content of $index if exists, null otherwise
   * @access public
   * @static
   */
  public static function get($index)
  {
    return (self::isRegistered($index)) ? self::$_registry[$index] : null;
  }

  /**
   * bool isRegistered(string $index)
   *
   * @param string $index
   * @return bool
   * @access public
   * @static
   */
  public static function isRegistered($index)
  {
    return isset(self::$_registry[$index]);
  }

  /**
   * void set(string $index, mixed $value)
   *
   * @param string $index
   * @param mixed $value
   * @return void
   * @access public
   * @static
   */
  public static function set($index, $value)
  {
    self::$_registry[$index] = $value;
  }

  /**
   * void delete(string $index)
   *
   * @param string $index
   * @return void
   * @access public
   * @static
   */
  public static function delete($index)
  {
    unset(self::$_registry[$index]);
  }
}
?>
