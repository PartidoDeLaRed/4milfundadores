<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="author" content="TBSOFT" />

	<title>Generador de Enlaces</title>
    <head>



<body text="#000000" style="background-color:#ffffff;text-align:center; height:933px;">
<form id="form_1" name="contacto" onsubmit="return validate_form_1(this)" action="http://4milfundadores.com/administracion/generador_de_enlace.php" accept-charset="UTF-8" method="post" target="_self" enctype="application/x-www-form-urlencoded" style="margin:0px;">
<input type="text" id="edit_1" name="nombre" value=""  /*Tag Style*/ border:none " __AddCode="here" placeholder="  NOMBRE">
<input type="text" id="edit_2" name="mail" value=""  /*Tag Style*/ border:none" __AddCode="here" placeholder="  MAIL">
<select id="combo_1" name="barrio" size="1" /*Tag Style*/ border:none">
    <option value="">SELECCIONAR&nbsp;BARRIO</option>
    <option value="Abasto">Abasto</option>
    <option value="Agronomia">Agronomia</option>
    <option value="Almagro">Almagro</option>
    <option value="Balvanera">Balvanera</option>
    <option value="Barracas">Barracas</option>
    <option value="Barrio Norte">Barrio&nbsp;Norte</option>
    <option value="Belgrano">Belgrano</option>
    <option value="Boedo">Boedo</option>
    <option value="Caballito">Caballito</option>
    <option value="Centro">Centro</option>
    <option value="Chacarita">Chacarita</option>
    <option value="Coghlan">Coghlan</option>
    <option value="Colegiales">Colegiales</option>
    <option value="Constitucion">Constitucion</option>
    <option value="Flores">Flores</option>
    <option value="Floresta">Floresta</option>
    <option value="La Boca">La&nbsp;Boca</option>
    <option value="Liniers">Liniers</option>
    <option value="Mataderos">Mataderos</option>
    <option value="Microcentro">Microcentro</option>
    <option value="Monserrat">Monserrat</option>
    <option value="Monte Castro">Monte&nbsp;Castro</option>
    <option value="Nuñez">Nuñez</option>
    <option value="Nueva Pompeya">Nueva&nbsp;Pompeya</option>
    <option value="Palermo">Palermo</option>
    <option value="Palermo Viejo">Palermo&nbsp;Viejo</option>
    <option value="Parque Avellaneda">Parque&nbsp;Avellaneda</option>
    <option value="Parque Chacabuco">Parque&nbsp;Chacabuco</option>
    <option value="Parque Patricios">Parque&nbsp;Patricios</option>
    <option value="Paternal">Paternal</option>
    <option value="Puerto Madero">Puerto&nbsp;Madero</option>
    <option value="Recoleta">Recoleta</option>
    <option value="Retiro">Retiro</option>
    <option value="Saavedra">Saavedra</option>
    <option value="San Cristobal">San&nbsp;Cristobal</option>
    <option value="San Nicolas">San&nbsp;Nicolas</option>
    <option value="San Telmo">San&nbsp;Telmo</option>
    <option value="Velez Sarsfield">Velez&nbsp;Sarsfield</option>
    <option value="Versalles">Versalles</option>
    <option value="Villa Crespo">Villa&nbsp;Crespo</option>
    <option value="Villa Devoto">Villa&nbsp;Devoto</option>
    <option value="Villa General Mitre">Villa&nbsp;General&nbsp;Mitre</option>
    <option value="Villa Lugano">Villa&nbsp;Lugano</option>
    <option value="Villa Luro">Villa&nbsp;Luro</option>
    <option value="Villa Ortuzar">Villa&nbsp;Ortuzar</option>
    <option value="Villa Pueyrredon">Villa&nbsp;Pueyrredon</option>
    <option value="Villa Real">Villa&nbsp;Real</option>
    <option value="Villa Riachuelo">Villa&nbsp;Riachuelo</option>
    <option value="Villa Santa Rita">Villa&nbsp;Santa&nbsp;Rita</option>
    <option value="Villa Soldati">Villa&nbsp;Soldati</option>
    <option value="Villa Urquiza">Villa&nbsp;Urquiza</option>
    <option value="Villa del Parque">Villa&nbsp;del&nbsp;Parque</option>
    <option value="no_caba">No&nbsp;vivo&nbsp;en&nbsp;CABA</option>
</select>
<button type="submit">Generar Código</button>
</form>
<br>
<br>

<?php

function codifica_mail($mail){

$mail_codificado = base64_encode($mail);

return (substr($mail_codificado, 5).substr($mail_codificado, 0, 5));

}

function decodifica_mail($mail_codificado){
  
return base64_decode(substr($mail_codificado, -5).substr($mail_codificado, 0,-5));

}

////////////////////////////////////////


$nombre= $_POST["nombre"];
$barrio= $_POST["barrio"];
$mail= $_POST["mail"];

$codigo= codifica_mail($mail);


echo "http://4milfundadores.com/formulario_web.php?mail=".$mail."&codigo=".$codigo."&nombre=".$nombre."&barrio=".$barrio;


?>
