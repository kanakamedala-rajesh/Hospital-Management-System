<?php


  require_once(dirname(__FILE__) . "/../lib/exe_protect.php");
  executionProtection(__FILE__);

  $tbody = array();

  $row = Form::label("document_type", _("Document Type") . ":");
  $row .= Form::text("document_type",
    isset($formVar["document_type"]) ? $formVar["document_type"] : null,
    array(
      'size' => 40,
      'maxlength' => 128,
      'error' => isset($formError["document_type"]) ? $formError["document_type"] : null
    )
  );
  $tbody[] = $row;

  //$row .= Form::hidden("MAX_FILE_SIZE", "70000");
  // @todo hacer helper para esta estructura
  $row = Form::label("path_filename", _("Path Filename") . ":", array('class' => 'required'));
  $row .= Form::file("path_filename",
    isset($formVar['path_filename']) ? $formVar['path_filename'] : null,
    array(
      'size' => 50,
      'readonly' => true, // does not work in IE, Mozilla
      'error' => isset($formError["path_filename"]) ? $formError["path_filename"] : null
    )
  );
  if (isset($formVar['path_filename']))
  {
    $row .= Form::hidden('previous', $formVar['path_filename']);
    $row .= HTML::tag('strong', $formVar['path_filename'], array('class' => 'previous_file'));
  }
  $tbody[] = $row;

  $tfoot = array(
    Form::button("save", _("Submit"))
    . Form::generateToken()
  );

  echo Form::fieldset($title, $tbody, $tfoot);
?>
