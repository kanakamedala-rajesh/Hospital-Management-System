﻿<?php
  $tab = "home";
  $nav = "summary";

  require_once("../config/environment.php");
  if (isset($_SESSION['auth']['token']))
  {
    /**
     * Checking permissions
     */
    include_once("../auth/login_check.php");
    loginCheck();
  }
  require_once("../lib/Check.php");

  /**
   * Show page
   */
  $title = _("Welcome");
  require_once("../layout/header.php");

  echo HTML::section(1, $title);
  


  echo HTML::section(2, HTML::link(_("Medical Records"), '../medical/index.php'), array('class' => 'icon icon_medical'));
  echo HTML::para(_("Use this tab to manage your patient's medical records."));
  echo HTML::para(_("Patient's Administration:"));

  $array = array(
    _("Search, new, delete, edit"),
    _("Social Data"),
    _("Clinic History"),
    _("Problem Reports")
  );
  echo HTML::itemList($array);

  echo HTML::rule();

  echo HTML::section(2, HTML::link(_("Admin"), '../admin/index.php'), array('class' => 'icon icon_admin'));
  echo HTML::para(_("Use this tab to manage administrative options."));

  $array = array(
    _("Staff members"),
    _("Config settings"),
    //_("Clinic themes editor"),
    _("System users"),
    _("Dumps"),
    _("Logs")
  );
  echo HTML::itemList($array);

  require_once("../layout/footer.php");
?>
</body>
