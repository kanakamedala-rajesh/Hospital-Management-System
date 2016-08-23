<?php
 
  require_once(dirname(__FILE__) . "/../lib/exe_protect.php");
  executionProtection(__FILE__);

  require_once("../lib/Form.php");
  Form::compareToken($errorLocation);

  $theme->setName($_POST["theme_name"]);
  $_POST["theme_name"] = $theme->getName();

  $theme->setCssFile($_POST["css_file"]);
  $_POST["css_file"] = $theme->getCssFile();

  $theme->setCssRules($_POST["css_rules"]);
  $_POST["css_rules"] = $theme->getCssRules();

  if ( !$theme->validateData() )
  {
    $formError["theme_name"] = $theme->getNameError();
    $formError["css_file"] = $theme->getCssFileError();
    $formError["css_rules"] = $theme->getCssRulesError();

    Form::setSession($_POST, $formError);

    header("Location: " . $errorLocation);
    exit();
  }
?>
