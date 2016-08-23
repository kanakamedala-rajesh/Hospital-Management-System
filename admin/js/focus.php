<?php
require_once("../lib/Check.php");
require_once("../config/i18n.php");

header("Content-Type: text/javascript; charset=" . OPEN_CHARSET);

$field = Check::safeText($_GET['field']);
?>
if (typeof addEvent == 'function')
{
  addEvent(window, 'load', focus, false); // event.js included!
}

/**
 * void focus(void)
 */
function focus()
{
  var field = document.getElementById('<?php echo $field; ?>');
  if (field != null)
  {
    field.focus();
  }
} // end of the 'focus()' function
