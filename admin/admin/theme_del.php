<?php

  /**
   * Controlling vars
   */
  $returnLocation = "../admin/theme_list.php";

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

  /**
   * Retrieving post vars
   */
  $idTheme = intval($_POST["id_theme"]);

  /**
   * Delete theme
   */
  require_once("../model/Query/Theme.php");
  $themeQ = new Query_Theme();
  if ( !$themeQ->select($idTheme) )
  {
    FlashMsg::add(_("That theme does not exist."), OPEN_MSG_ERROR);
    header("Location: " . $returnLocation);
    exit();
  }

  $theme = $themeQ->fetch();

  $themeQ->delete($idTheme);

  $themeQ->close();
  unset($themeQ);

  if ( !$theme->isCssReserved($theme->getCssFile()) )
  {
    @unlink(dirname(__FILE__) . '/../css/' . basename($theme->getCssFile()));
  }

  /**
   * Redirect to $returnLocation to avoid reload problem
   */
  FlashMsg::add(sprintf(_("Theme, %s, has been deleted."), $theme->getName()));
  header("Location: " . $returnLocation);
?>
