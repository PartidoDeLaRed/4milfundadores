<?

$configFile = file_exists('config.ini') ? 'config.ini' : $_ENV['CONFIG'];

if( file_exists($configFile) ) {
  $config = parse_ini_file($configFile);

  foreach( $config as $k => $v ){
    $_ENV[$k] = $v
  }
} else {
  throw new Exception('Archivo de configuración no encontrado.');
}