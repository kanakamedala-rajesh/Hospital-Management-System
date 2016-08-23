<?php

  /**
   * Checking for post vars. Go back to form if none found.
   */
  if (count($_POST) == 0)
  {
    header("Location: ../medical/patient_search_form.php");
    exit();
  }

  /**
   * Checking permissions
   */
  require_once("../auth/login_check.php");
  loginCheck(OPEN_PROFILE_ADMINISTRATIVE);

  require_once("../lib/Form.php");

  Form::compareToken('../medical/patient_search_form.php');

  require_once("../model/Query/Relative.php");
  require_once("../model/Query/Page/Record.php");
  require_once("../lib/Check.php");

  /**
   * Retrieving post vars
   */
  $idPatient = intval($_POST["id_patient"]);
  $idRelative = intval($_POST["id_relative"]);
  $relName = Check::safeText($_POST["name"]);

  /**
   * Prevent user from aborting script
   */
  $oldAbort = ignore_user_abort(true);

  /**
   * Delete relative
   */
  $relQ = new Query_Relative();

  /**
   * Record log process (before deleting process)
   */
  $recordQ = new Query_Page_Record();
  $recordQ->log("Query_Relative", "DELETE", array($idPatient, $idRelative));
  $recordQ->close();
  unset($recordQ);

  $relQ->delete($idPatient, $idRelative);

  $relQ->close();
  unset($relQ);

  /**
   * Reset abort setting
   */
  ignore_user_abort($oldAbort);

  /**
   * Redirect to $returnLocation to avoid reload problem
   */
  FlashMsg::add(sprintf(_("Relative, %s, has been deleted."), $relName));
  //$returnLocation = "../medical/relative_list.php?id_patient=" . $idPatient; // controlling var
  $returnLocation = "../medical/relative_list.php"; // controlling var
  header("Location: " . $returnLocation);
?>
