<?php

  /**
   * Controlling vars
   */
  $returnLocation = "../admin/staff_list.php";

  /**
   * Checking for post vars. Go back to $returnLocation if none found.
   */
  if (count($_POST) == 0 || !is_numeric($_POST["id_member"]))
  {
    header("Location: " . $returnLocation);
    exit();
  }

  /**
   * Checking permissions
   */
  require_once("../auth/login_check.php");
  loginCheck(OPEN_PROFILE_ADMINISTRATOR);

  require_once("../model/Query/Staff.php");

  /**
   * Validate data
   */
  $errorLocation = "../admin/staff_edit_form.php?id_member=" . intval($_POST["id_member"]); // controlling var
  $staff = new Staff();

  $staff->setIdMember($_POST["id_member"]);

  require_once("../admin/staff_validate_post.php");

  /**
   * Destroy form values and errors
   */
  Form::unsetSession();

  /**
   * Update staff member
   */
  $staffQ = new Query_Staff();
  if ($staffQ->existLogin($staff->getLogin(), $staff->getIdMember()))
  {
    FlashMsg::add(sprintf(_("Login, %s, already exists. The changes have no effect."), $staff->getLogin()),
      OPEN_MSG_WARNING
    );
  }
  else
  {
    $staffQ->update($staff);
    $info = $staff->getFirstName() . " " . $staff->getSurname1() . " " . $staff->getSurname2();
    FlashMsg::add(sprintf(_("Staff member, %s, has been updated."), $info));
  }
  $staffQ->close();
  unset($staffQ);
  unset($staff);

  /**
   * Redirect to $returnLocation to avoid reload problem
   */
  header("Location: " . $returnLocation);
?>
