<?php

  /**
   * Controlling vars
   */
  $tab = "admin";
  $nav = "staff";
  $returnLocation = "../admin/staff_list.php";

  /**
   * Checking permissions
   */
  require_once("../auth/login_check.php");
  loginCheck(OPEN_PROFILE_ADMINISTRATOR);

  require_once("../lib/Check.php");

  /**
   * Show page
   */
  $memberType = (isset($_GET["type"])) ? Check::safeText($_GET["type"]) : "A"; // Administrative by default

  switch (strtolower($memberType))
  {
    case "a":
      $title = _("Add New Administrative Information");
      $typeValue = OPEN_ADMINISTRATIVE;
      break;

    case "d":
      $title = _("Add New Doctor Information");
      $typeValue = OPEN_DOCTOR;
      break;
  }

  $focusFormField = "nif"; // to avoid JavaScript mistakes in demo version
  require_once("../layout/header.php");

  /**
   * Breadcrumb
   */
  $links = array(
    _("Admin") => "../admin/index.php",
    _("Staff Members") => $returnLocation,
    $title => ""
  );
  echo HTML::breadcrumb($links, "icon icon_staff");
  unset($links);

  echo Form::errorMsg();

  /**
   * New form
   */
  echo HTML::start('form', array('method' => 'post', 'action' => '../admin/staff_new.php?type=' . $memberType));

  echo Form::hidden("member_type", $typeValue);

  require_once("../admin/staff_fields.php");

  echo HTML::end('form');

  echo Msg::hint('* ' . _("Note: The fields with * are required."));

  echo HTML::para(HTML::link(_("Return"), $returnLocation));

  /**
   * Destroy form values and errors
   */
  Form::unsetSession();

  require_once("../layout/footer.php");
?>
