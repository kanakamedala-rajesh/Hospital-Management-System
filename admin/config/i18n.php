<?php

  require_once(dirname(__FILE__) . "/../lib/exe_protect.php");
  executionProtection(__FILE__);

  require_once("../lib/I18n.php");

  $nls = I18n::getNLS();
  if ( !defined("OPEN_LANGUAGE") )
  {
    define("OPEN_LANGUAGE", I18n::setLanguage());
  }
  else
  {
    I18n::setLanguage(OPEN_LANGUAGE);
  }

  define("OPEN_CHARSET",
    (isset($nls['charset'][OPEN_LANGUAGE])
      ? $nls['charset'][OPEN_LANGUAGE]
      : $nls['default']['charset']
    )
  );
  define("OPEN_DIRECTION",
    (isset($nls['direction'][OPEN_LANGUAGE])
      ? $nls['charset'][OPEN_LANGUAGE]
      : $nls['default']['direction']
    )
  );
  define("OPEN_ENCODING",
    (isset($nls['encoding'][OPEN_LANGUAGE])
      ? $nls['encoding'][OPEN_LANGUAGE]
      : $nls['default']['encoding']
    )
  );

  I18n::initLanguage(OPEN_LANGUAGE);

  if ( !defined("OPEN_TIME_ZONE") )
  {
    define("OPEN_TIME_ZONE", "Europe/Madrid");
  }
  date_default_timezone_set(OPEN_TIME_ZONE);
?>
