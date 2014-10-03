<?php
/**
* PartidoDeLaRed Afiliados DB Simple Manager
*
* Ejemplo:
*
* $u = array(
*   'id' => '350123123',
*   'first_name' => 'Matias',
*   'last_name' => 'Lescano'
* );
*
* try {
*   pr($DB->saveAfiliado($u, false));
* } catch (Exception $e) {
*   echo 'Error de validación: ',  $e->getMessage(), "\n";
* }
**/

require_once dirname(__FILE__).'/../config/load.php';
require_once dirname(__FILE__).'/medoo.php';

function pr($v, $d = true) {
  echo '<pre>'; print_r($v); echo '</pre>';
  if( $d ){ echo '<!-- Died -->'; die(); }
}

class DBValidationException extends Exception { }

class DB {
  public $db;

  public $allowedFotoTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
  public $allowedFotoSize = 6; // MB

  public $attrsFotos = array('foto1', 'foto2', 'foto3');
  public $attrsAfiliado = array(
    'dni',
    'nombres',
    'apellido',
    'sexo',
    'dia',
    'mes',
    'ano',
    'lugar_nac',
    'profesion',
    'est_civil',
    'direccion',
    'telefono',
    'mail',
    'mosaico'
  );

  function __construct() {
    $this->connect();
  }

  private function connect() {
    $this->db = new medoo($_ENV['DB']);
  }

  function info() {
    return $this->db->info();
  }

  private function select_keys($arry, $keys) {
    $a = array();

    foreach( $keys as $k ) {
      if( isset($arry[$k]) ) {
        $a[$k] = $arry[$k];
      }
    }

    return $a;
  }

  function afiliadoExists($dni) {
    return $this->db->has('afiliados', array(
      'dni' => $dni
    ));
  }

  function validateAfiliado($a) {
    $errors = array();

    if( !preg_match("/^[0-9]+$/", $a['dni']) ) {
      array_push($errors, 'DNI inválido.');
    }

    if( $this->afiliadoExists($a['dni']) ) {
      array_push($errors, 'Afiliado existente.');
    }

    if( !preg_match("/[a-zA-Z]+/", $a['nombres']) ) {
      array_push($errors, 'Debe tener nombre.');
    }

    if( !preg_match("/[a-zA-Z]+/", $a['apellido']) ) {
      array_push($errors, 'Debe tener apellido.');
    }

    if( $a['sexo'] != 'f' && $a['sexo'] != 'm' ) {
      array_push($errors, 'Sexo inválido.');
    }

    if( (int)$a['dia'] < 1 || (int)$a['dia'] > 31 ) {
      array_push($errors, 'Día de nacimieto inválido.');
    }

    if( (int)$a['mes'] < 1 || (int)$a['mes'] > 31 ) {
      array_push($errors, 'Mes de nacimieto inválido.');
    }

    if( (int)$a['ano'] < 1900 || (int)$a['ano'] > 1996 ) {
      array_push($errors, 'Año de nacimieto inválido.');
    }

    if( !preg_match("/[a-zA-Z]+/", $a['lugar_nac']) ) {
      array_push($errors, 'Lugar de nacimiento inválido.');
    }

    if( !preg_match("/[a-zA-Z]+/", $a['profesion']) ) {
      array_push($errors, 'Profesión inválida.');
    }

    if( !preg_match("/[a-zA-Z]+/", $a['est_civil']) ) {
      array_push($errors, 'Estado Civil inválido.');
    }

    if( !preg_match("/[a-zA-Z]+/", $a['direccion']) ) {
      array_push($errors, 'Dirección inválida.');
    }

    if( count($errors) > 0 ) {
      throw new DBValidationException( join($errors, "\n") );
    }

    return true;
  }

  function validateFotos($files) {
    $errors = array();

    if( !$this->hasFile($files, 'foto1') ) {
      array_push($errors, 'Tenés que subir el frente del DNI Tarjeta o la primer hoja con foto del DNI libro.');
    }

    if( !$this->hasFile($files, 'foto2') ) {
      array_push($errors, 'Tenés que subir el dorso del DNI Tarjeta o la segunda hoja del DNI libro.');
    }

    foreach( $this->attrsFotos as $f ) {
      if( !$this->hasFile($files, $f) ) continue;

      if( !$this->validateFotoType($files[$f]) ) {
        array_push($errors, $f.' sólo puede ser JPG o PNG.');
      }

      if( !$this->validateFotoSize($files[$f]) ) {
        array_push($errors, $f.' no puede pesar más de '.$this->allowedFotoSize.'MB.');
      }
    }

    if( count($errors) > 0 ){
      throw new DBValidationException(join($errors, "\n"));
    }

    return true;
  }

  function hasFile($files, $file) {
    return isset($files[$file])
        && is_uploaded_file($files[$file]['tmp_name'])
        && file_exists($files[$file]['tmp_name']);
  }

  function validateFotoType($file) {
    $type = exif_imagetype($file['tmp_name']);
    return in_array($type, $this->allowedFotoTypes);
  }

  function validateFotoSize($file) {
    return $file['size'] <= ($this->allowedFotoSize * 1024 * 1024);
  }

  function saveAfiliado($a) {
    $afiliado = array(
      'dni' => $a['dni'],
      'nombres' => $a['nombres'],
      'apellido' => $a['apellido'],
      'sexo' => $a['sexo'],
      'fecha_nac' => $a['ano'].'-'.$a['mes'].'-'.$a['dia'],
      'lugar_nac' => $a['lugar_nac'],
      'profesion' => $a['profesion'],
      'est_civil' => $a['est_civil'],
      'direccion' => $a['direccion'],
      'telefono' => $a['telefono'],
      'mail' => $a['mail'],
      'source_site' => '4milfundadores'
      // 'mosaico', => $a['mosaico'] // Falta agregar a la DB
    );

    $this->db->insert('afiliados', $afiliado);

    return true;
  }

  function saveFotos($afiliado, $files) {
    $path = rtrim($_ENV['IMGS']['path'], '/');

    foreach( $this->attrsFotos as $f ) {
      if( !$this->hasFile($files, $f) ) continue;

      $file = $files[$f];
      $ext = end(explode(".", $file['name']));
      $filedest = $afiliado['dni'] . '_' . $f . '.' . $ext;
      $dest = join('/', array($path, $filedest));

      if( !move_uploaded_file($file['tmp_name'], $dest) ) {
        throw new Exception('Se produjo un error al guardar las fotos.');
      }
    }
  }
}

$DB = new DB();
