<?php
require_once 'app/db/db.php';

$afiliado = array();

if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

  foreach( $DB->attrsAfiliado as $v ){
    $afiliado[$v] = isset($_POST[$v]) ? $_POST[$v] : '';
  }

  try {

    $DB->validateAfiliado($afiliado);
    $DB->validateFotos($_FILES);

  } catch( DBValidationException $e ) {
    echo $e->getMessage();
    die();
  }

  try {

    $DB->saveFotos($afiliado, $_FILES);
    $DB->saveAfiliado($afiliado, $_FILES);

  } catch( Exception $e ) {
    echo $e->getMessage();
    die();
  }

  include 'app/views/gracias.html';
} else {

  foreach( $DB->attrsAfiliado as $v ){
    $afiliado[$v] = isset($_GET[$v]) ? $_GET[$v] : '';
  }

  include 'app/views/form.html';
}
