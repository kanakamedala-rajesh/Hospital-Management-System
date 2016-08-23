<?php

  echo HTML::end('div'); // #content
  echo HTML::end('div'); // #main

  echo HTML::rule();

  echo HTML::start('div', array('id' => 'navigation'));
  if (isset($tab) && is_file('../layout/' . $tab . '.php'))
  {
    include_once("../layout/" . $tab . ".php"); // ul
  }
  echo clinicInfo();
  echo HTML::end('div'); // #navigation


  echo HTML::end('div'); // #wrap
  echo HTML::end('body');
  echo HTML::end('html');

  if (defined("OPEN_BUFFER") && OPEN_BUFFER)
  {
    ob_end_flush();
    flush();
  }
?>