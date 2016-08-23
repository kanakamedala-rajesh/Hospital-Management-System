<?php

  /**
   * Controlling vars
   */
  $errorLocation = "../admin/theme_new_form.php";
  $returnLocation = "../admin/theme_list.php";

  /**
   * Checking for post vars. Go back to form if none found.
   */
  if (count($_POST) == 0)
  {
    header("Location: " . $errorLocation);
    exit();
  }

  /**
   * Checking permissions
   */
  require_once("../auth/login_check.php");
  loginCheck(OPEN_PROFILE_ADMINISTRATOR);

  /**
   * Validate data
   */
  require_once("../model/Query/Theme.php");
  $theme = new Theme();

  require_once("../admin/theme_validate_post.php");

  /**
   * Destroy form values and errors
   */
  Form::unsetSession();

  /**
   * Insert new theme
   */
  $themeQ = new Query_Theme();
  if ($themeQ->existCssFile($theme->getCssFile()))
  {
    FlashMsg::add(sprintf(_("Filename of theme, %s, already exists. The changes have no effect."), $theme->getName()));
  }
  else
  {
    $themeQ->insert($theme);
    FlashMsg::add(sprintf(_("Theme, %s, has been added."), $theme->getName()));
  }
  $themeQ->close();
  unset($themeQ);
  unset($theme);

  /**
   * Redirect to $returnLocation to avoid reload problem
   */
  header("Location: " . $returnLocation);
?>
