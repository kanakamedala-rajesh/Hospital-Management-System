if (typeof addLoadEvent == 'function')
{
  addLoadEvent(initRelativeForm); // event.js included!
}

/**
 * void initRelativeForm(void)
 *
 * Adds event handlers to relative form elements
 *
 * @return void
 * @since 0.8
 */
function initRelativeForm()
{
  var element = document.getElementById('select_all_checks');
  if (element != null)
  {
    element.onclick = function()
    {
      setCheckboxes(1, 'check[]', true);

      return false;
    };
  }

  element = document.getElementById('unselect_all_checks');
  if (element != null)
  {
    element.onclick = function()
    {
      setCheckboxes(1, 'check[]', false);

      return false;
    };
  }
}

/**
 * bool setCheckboxes(int indexForm, string elementName, bool doCheck)
 *
 * Checks/unchecks all checkboxes of a form
 *
 * @param int the form index
 * @param string the element name
 * @param bool whether to check or to uncheck the element
 * @return bool always true
 */
function setCheckboxes(indexForm, elementName, doCheck)
{
  var selectedObject = document.forms[indexForm].elements[elementName];
  var selectedCount  = selectedObject.length;

  for (var i = 0; i < selectedCount; i++)
  {
    selectedObject[i].checked = doCheck;
  } // end for

  return true;
} // end of the 'setCheckboxes()' function
