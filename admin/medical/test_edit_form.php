<?php


  /**
   * Controlling vars
   */
  $tab = "medical";
  $nav = "problems";

  /**
   * Checking permissions
   */
  require_once("../auth/login_check.php");
  loginCheck(OPEN_PROFILE_ADMINISTRATIVE, false); // Not in DEMO to prevent users' malice

  require_once("../model/Patient.php");
  require_once("../model/Problem.php");
  require_once("../model/Test.php");

  /**
   * Retrieving vars (PGS)
   */
  $idProblem = Check::postGetSessionInt('id_problem');
  $idPatient = Check::postGetSessionInt('id_patient');
  $idTest = Check::postGetSessionInt('id_test');

  $patient = new Patient($idPatient);
  if ($patient->getName() == '')
  {
    FlashMsg::add(_("That patient does not exist."), OPEN_MSG_ERROR);
    header("Location: ../medical/patient_search_form.php");
    exit();
  }

  $problem = new Problem($idProblem);
  if ( !$problem )
  {
    FlashMsg::add(_("That medical problem does not exist."), OPEN_MSG_ERROR);
    header("Location: ../medical/patient_search_form.php");
    exit();
  }

  $test = new Test($idProblem, $idTest);
  if ( !$test )
  {
    FlashMsg::add(_("That medical test does not exist"), OPEN_MSG_ERROR);
    header("Location: ../medical/test_list.php");
    exit();
  }

  $formVar["document_type"] = $test->getDocumentType();
  $formVar["path_filename"] = $test->getPathFilename();

  /**
   * Show page
   */
  $title = _("Edit Medical Test");
  $titlePage = $patient->getName() . ' [' . $problem->getWordingPreview() . '] (' . $title . ')';
  $focusFormField = "document_type"; // to avoid JavaScript mistakes in demo version
  require_once("../layout/header.php");

  //$returnLocation = "../medical/test_list.php?id_problem=" . $idProblem . "&id_patient=" . $idPatient;
  $returnLocation = "../medical/test_list.php";

  /**
   * Breadcrumb
   */
  $links = array(
    _("Medical Records") => "../medical/index.php",
    $patient->getName() => "../medical/patient_view.php",
    _("Medical Problems Report") => "../medical/problem_list.php", //"?id_patient=" . $idPatient,
    $problem->getWordingPreview() => "../medical/problem_view.php",
    _("View Medical Tests") => $returnLocation,
    $title => ""
  );
  echo HTML::breadcrumb($links, "icon icon_patient");
  unset($links);

  echo $patient->getHeader();
  echo $problem->getHeader();

  echo Form::errorMsg();

  /**
   * Edit form
   */
  echo HTML::start('form',
    array(
      'method' => 'post',
      'action' => '../medical/test_edit.php',
      'enctype' => 'multipart/form-data',
      'onsubmit' => 'document.forms[0].upload_file.value = document.forms[0].path_filename.value; return true;'
    )
  );

  echo Form::hidden("id_problem", $idProblem);
  echo Form::hidden("id_patient", $idPatient);
  echo Form::hidden("id_test", $idTest);
  echo Form::hidden("upload_file", $formVar["path_filename"]);

  require_once("../medical/test_fields.php");

  echo HTML::end('form');

  echo Msg::hint('* ' . _("Note: The fields with * are required."));

  echo HTML::para(HTML::link(_("Return"), $returnLocation));

  /**
   * Destroy form values and errors
   */
  Form::unsetSession();

  require_once("../layout/footer.php");
?>
