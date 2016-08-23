<?php

define("OPEN_VISITED_ITEMS", 3);   // number of items of visited patients list

class LastViewedPatient
{
  public static function add($idPatient, $name)
  {
    if (defined("OPEN_DEMO") && OPEN_DEMO)
    {
      return;
    }

    if ($idPatient <= 0 || trim($name) == '')
    {
      return; // invalid data!
    }

    $_SESSION['last_viewed_patient'][$idPatient] = $name;
    $_SESSION['last_viewed_patient'] = array_unique($_SESSION['last_viewed_patient']);

    if (sizeof($_SESSION['last_viewed_patient']) > OPEN_VISITED_ITEMS)
    {
      reset($_SESSION['last_viewed_patient']);
      $aux = array_keys($_SESSION['last_viewed_patient']);
      unset($_SESSION['last_viewed_patient'][$aux[0]]);
    }
  }

  /**
   * void delete(int $idPatient)
   *
   * Delete a visited patient from the list
   *
   * @param int $idPatient key of patient to show header
   * @return void
   * @access public
   * @static
   * @see OPEN_DEMO
   */
  public static function delete($idPatient)
  {
    if (defined("OPEN_DEMO") && OPEN_DEMO)
    {
      return;
    }

    unset($_SESSION['last_viewed_patient'][$idPatient]);
  }

  /**
   * mixed get(void)
   *
   * Returns reverse array (FILO)
   *
   * @return mixed array of patients, or null if not exists
   * @access public
   * @static
   */
  public static function get()
  {
    if ( !isset($_SESSION['last_viewed_patient']) )
    {
      return null;
    }

    return array_reverse($_SESSION['last_viewed_patient'], true);
  }
} // end class
?>
