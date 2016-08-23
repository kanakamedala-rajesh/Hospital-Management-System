<?php
require_once(dirname(__FILE__) . "/../lib/exe_protect.php");
  executionProtection(__FILE__);

  require_once("../layout/component.php");

  $linkList = array(
    "index" => array(_("OpenClinic Install"), '../install/index.php'),
    "create" => array(_("Database Creation"), '../install/install.php'),
    "upgrade" => array(_("Upgrade Database"), '../install/upgrade.php'),
    "wizard" => array(_("Install Wizard"), '../install/wizard.php'),
    "instruction" => array(_("Install Instructions"), '../install.html')
  );

  $array = null;
  if ( !isset($nav) )
  {
    $nav = "";
  }
  foreach ($linkList as $key => $value)
  {
    $array[] = HTML::link($value[0], $value[1], null, $nav == $key ? array('class' => 'selected') : null);
  }
  unset($linkList);

  /*$array[] = HTML::link(_("Help"), '../doc/index.php',
    array(
      'tab' => $tab,
      'nav' => $nav
    ),
    array(
      'title' => _("Opens a new window"),
      'class' => 'popup'
    )
  );*/

  echo navigation($array);
  unset($array);
?>
