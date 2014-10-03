<?php
$configFile = realpath(dirname(__FILE__) . '/config.ini');
if( !$configFile ) $configFile = $_ENV['CONFIG'];

if( $configFile ) {
  $config = parse_ini_file($configFile, true);

  foreach( $config as $k => $v ){
    $_ENV[$k] = $v;
  }
} else {
  throw new Exception('Archivo de configuración no encontrado.');
}