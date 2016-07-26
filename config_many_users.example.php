<?php
$config = array();

define("MANY_USERS", true);

include "include_config_path.php";

include "config_compile.php";

define("IS_WINDOWS", strpos(strtoupper(PHP_OS), "WIN") !==false);

return $config;