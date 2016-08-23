<?php
  require_once(dirname(__FILE__) . "/../lib/exe_protect.php");
  executionProtection(__FILE__);

  require_once("../layout/component.php");

  $array = null;
  $array[] = HTML::link(_("Summary"), '../home/index.php', null,
    $nav == 'summary' ? array('class' => 'selected') : null
  );


  if (defined("OPEN_DEMO") && !OPEN_DEMO)
  {
    $sessLogin = isset($_SESSION['auth']['login_session']) ? $_SESSION['auth']['login_session'] : '';
    if ( !empty($sessLogin) && !isset($_SESSION['auth']['invalid_token']) )
    {	
	//for doctor only appointments
	if( isset($_SESSION['auth']['is_admin']) && isset($_SESSION['auth']['is_administrative']) && isset($_SESSION['auth']['is_doctor']))
		{
		$is_doc = 0;
		if( $_SESSION['auth']['is_admin'] =="") $is_doc++;
		if( $_SESSION['auth']['is_administrative'] =="") $is_doc++;
		if( $_SESSION['auth']['is_doctor'] =="") $is_doc++;
		
			if($is_doc == 2)
			$array[] = HTML::link(_("Appointment requests"), '../home/appointment.php', null,
			$nav == 'app' ? array('class' => 'selected') : null);
		}
	  

      $array[] = HTML::link(_("Logout"), '../auth/logout.php');
    }
    else
    {
      $array[] = HTML::link(_("Log in"), '../auth/login_form.php', null,
        $nav == 'login' ? array('class' => 'selected') : null
      ); // @fixme login
    }
  }

  /*$array[] = HTML::link(_("Help"), '../doc/index.php',
    array(
      'tab' => $tab,
      'nav' => $nav
    ),
    array(
      'title' => _("Opens a new window"),
      'class' => 'popup'
    )
  );*/

  echo navigation($array);
  unset($array);
?>
