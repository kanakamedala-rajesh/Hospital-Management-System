<?php

  require_once(dirname(__FILE__) . "/../lib/exe_protect.php");
  executionProtection(__FILE__);

  $tbody = array();

  $row = Form::label("parents_status_health", _("Parents Status Health") . ":");
  $row .= Form::textArea("parents_status_health",
    $formVar["parents_status_health"],
    array(
      'rows' => 4,
      'cols' => 90
    )
  );
  $tbody[] = $row;

  $row = Form::label("brothers_status_health", _("Brothers and Sisters Status Health") . ":");
  $row .= Form::textArea("brothers_status_health",
    $formVar["brothers_status_health"],
    array(
      'rows' => 4,
      'cols' => 90
    )
  );
  $tbody[] = $row;

  $row = Form::label("spouse_childs_status_health", _("Spouse and Childs Status Health") . ":");
  $row .= Form::textArea("spouse_childs_status_health",
    $formVar["spouse_childs_status_health"],
    array(
      'rows' => 4,
      'cols' => 90
    )
  );
  $tbody[] = $row;

  $row = Form::label("family_illness", _("Family Illness") . ":");
  $row .= Form::textArea("family_illness",
    $formVar["family_illness"],
    array(
      'rows' => 4,
      'cols' => 90
    )
  );
  $tbody[] = $row;

  $tfoot = array(
    Form::button("update", _("Update"))
    . Form::generateToken()
  );

  $options = array(
    'class' => 'large_area'
  );

  echo Form::fieldset($title, $tbody, $tfoot, $options);
?>
