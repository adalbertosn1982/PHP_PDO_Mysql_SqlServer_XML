<?php

$SQLSRV["drive"]    = 'sqlsrv';
$SQLSRV["host"]     = "172.16.0.71"; //"172.16.0.17:49241" 
$SQLSRV["port"]     = "49241";
$SQLSRV["user"]     = "webcesumar";
$SQLSRV["password"] = "webcesumar123@";
$SQLSRV["database"] = "LYCEUM";


$db = array(
    'LYCEUM' => array(
      'HOST' => '172.16.0.71:49241',
      'DB' => 'LYCEUM',
      'USER' => 'webcesumar',
      'PASS' => 'webcesumar123@',
      'CONFIG' => 'SET CONCAT_NULL_YIELDS_NULL ON; SET ANSI_PADDING ON;  SET ANSI_WARNINGS ON;'
    )
 );   

?>