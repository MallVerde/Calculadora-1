<?php
  require_once('lib/nusoap.php');
  require_once('calculadora.php');

  $server = new nusoap_server();
  $server -> register('calculadora');
  
  $server -> service(file_get_contents("php://input"));
?>