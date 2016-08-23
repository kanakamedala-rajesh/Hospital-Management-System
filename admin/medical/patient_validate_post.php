<?php

  require_once(dirname(__FILE__) . "/../lib/exe_protect.php");
  executionProtection(__FILE__);

  require_once("../lib/Form.php");
  Form::compareToken($errorLocation);

  //$pat->setLastUpdateDate($_POST["last_update_date"]);
  //$_POST["last_update_date"] = $pat->getLastUpdateDate();

  $pat->setIdMember($_POST["id_member"]);
  $_POST["id_member"] = $pat->getIdMember();

  $pat->setNIF($_POST["nif"]);
  $_POST["nif"] = $pat->getNIF();

  $pat->setFirstName($_POST["first_name"]);
  $_POST["first_name"] = $pat->getFirstName();

  $pat->setSurname1($_POST["surname1"]);
  $_POST["surname1"] = $pat->getSurname1();

  $pat->setSurname2($_POST["surname2"]);
  $_POST["surname2"] = $pat->getSurname2();

  $pat->setAddress($_POST["address"]);
  $_POST["address"] = $pat->getAddress();

  $pat->setPhone($_POST["phone_contact"]);
  $_POST["phone_contact"] = $pat->getPhone();

  $pat->setSex($_POST["sex"]);
  $_POST["sex"] = $pat->getSex();

  $pat->setRace($_POST["race"]);
  $_POST["race"] = $pat->getRace();

  $pat->setBirthDateFromParts($_POST["month"], $_POST["day"], $_POST["year"]);
  $_POST["birth_date"] = $pat->getBirthDate();

  $pat->setBirthPlace($_POST["birth_place"]);
  $_POST["birth_place"] = $pat->getBirthPlace();

  $pat->setDeceaseDateFromParts($_POST["dmonth"], $_POST["dday"], $_POST["dyear"]);
  $_POST["decease_date"] = $pat->getDeceaseDate();

  $pat->setNTS($_POST["nts"]);
  $_POST["nts"] = $pat->getNTS();

  $pat->setNSS($_POST["nss"]);
  $_POST["nss"] = $pat->getNSS();

  $pat->setFamilySituation($_POST["family_situation"]);
  $_POST["family_situation"] = $pat->getFamilySituation();

  $pat->setLabourSituation($_POST["labour_situation"]);
  $_POST["labour_situation"] = $pat->getLabourSituation();

  $pat->setEducation($_POST["education"]);
  $_POST["education"] = $pat->getEducation();

  $pat->setInsuranceCompany($_POST["insurance_company"]);
  $_POST["insurance_company"] = $pat->getInsuranceCompany();

  if ( !$pat->validateData() )
  {
    $formError["first_name"] = $pat->getFirstNameError();
    $formError["surname1"] = $pat->getSurname1Error();
    $formError["nif"] = $pat->getSurname2Error();
    $formError["birth_date"] = $pat->getBirthDateError();
    $formError["decease_date"] = $pat->getDeceaseDateError();

    Form::setSession($_POST, $formError);

    header("Location: " . $errorLocation);
    exit();
  }
?>
