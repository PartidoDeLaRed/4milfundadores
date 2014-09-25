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
*   pr($DB->addUser($u, false));
* } catch (Exception $e) {
*   echo 'Error de validación: ',  $e->getMessage(), "\n";
* }
**/

require_once '../config/load.php';
require_once 'medoo.php';

function pr($v, $d = true) {
  echo '<pre>'; print_r($v); echo '</pre>';
  if($d){ echo '<!-- Died -->'; die(); }
}

class DB {
  public $db;

  public static $userAttrs = array(
    'id',
    'first_name',
    'last_name'
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

  function userExists($dni) {
    return $this->db->has('contacts', array(
      'id' => $dni
    ));
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

  function addUser($user) {
    $user = $this->select_keys($user, self::$userAttrs);

    if( !preg_match("/^[0-9]+$/", $user['id']) ) {
      throw new Exception('El ID solo puede contener numeros.');
    }

    if( $this->userExists($user['id']) ) {
      throw new Exception('Afiliado existente.');
    }

    if( !preg_match("/[a-z]+/i", $user['first_name']) ) {
      throw new Exception('Debe tener nombre.');
    }

    if( !preg_match("/[a-z]+/i", $user['last_name']) ) {
      throw new Exception('Debe tener apellido.');
    }

    $user_cstm = array(
      'id_c' => (string)$user['id'],
      'dni_c' => $user['id'],
      'display_name_c' => trim(join(' ', array($user['first_name'], $user['last_name'])))
    );

    $this->db->insert('contacts', $user);

    $this->db->insert('contacts_cstm', $user_cstm);

    return $user;
  }
}

$DB = new DB();
