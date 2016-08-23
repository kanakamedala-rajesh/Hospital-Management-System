<?php

  /**
   * Controlling vars
   */
  $returnLocation = "../admin/staff_list.php";

  /**
   * Checking for post vars. Go back to $returnLocation if none found.
   */
  if (count($_POST) == 0)
  {
    header("Location: " . $returnLocation);
    exit();
  }

  /**
   * Checking permissions
   */
  require_once("../auth/login_check.php");
  loginCheck(OPEN_PROFILE_ADMINISTRATOR);

  require_once("../lib/Form.php");

  Form::compareToken($returnLocation);

  require_once("../model/Query/Staff.php");

  /**
   * Retrieving post var
   */
  $idMember = intval($_POST["id_member"]);

  /**
   * Delete staff member
   */
  $staffQ = new Query_Staff();
  if ( !$staffQ->select($idMember) )
  {
    $staffQ->close();

    FlashMsg::add(_("That staff member does not exist."), OPEN_MSG_ERROR);
    header("Location: " . $returnLocation);
    exit();
  }

  $staff = $staffQ->fetch();
  if ( !$staff )
  {
    $staffQ->close();
    Error::fetch($staffQ);
  }

  $staffQ->delete($staff->getIdMember(), $staff->getIdUser());

  $info = $staff->getFirstName() . " " . $staff->getSurname1() . " " . $staff->getSurname2();
  FlashMsg::add(sprintf(_("Staff member, %s, has been deleted."), $info));

  $staffQ->close();
  unset($staffQ);
  unset($staff);

  /**
   * Redirect to $returnLocation to avoid reload problem
   */
  header("Location: " . $returnLocation);
?>
