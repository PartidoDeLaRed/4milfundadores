<?php

///////////////////////////////////////////////////////////////////////////////////////////////////
//
// ESTA PARTE PROCESA EL FORMULARIO CUANDO ES ENVIADO
//
////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////
//
// FUNCIONES
//
////////////////////////////////////////////////////////////////////////////////////////////////////

function hora_local($zona_horaria)
{
    if ($zona_horaria > -12.1 and $zona_horaria < 12.1)
    {
        $hora_local = time() + ($zona_horaria * 3600);
        return $hora_local;
    }
    return 'error';
}


function agrega_a_txt($dato, $ruta_txt)
{

    $archivo = fopen($ruta_txt, 'a') or die("Se produjo un error inesperado, por favor intentelo nuevamente");
    fwrite($archivo, $dato);
    fclose($archivo);

}

function decodifica_mail($mail_codificado)
{

    return base64_decode(substr($mail_codificado, -5) . substr($mail_codificado, 0, -5));

}




////////////////////////////////////////////////////////////////////////////////////////////////////

$hora = gmdate('Y-m-d H:i:s', hora_local(-3));

$enviado = $_GET["enviado"];

$mail = $_GET["mail"];

$codigo = $_GET["codigo"];

$codigo = decodifica_mail($codigo);

$nombre = $_GET["nombre"];

$barrio = $_GET["barrio"];

/////////////////////////////////////////////////


// saque esto
// $dato = $hora."\t"."$mail\t"."$nombre\t"."$barrio \n";
// $ruta_txt = "datos/listado_de_mails_140304_1632.txt";
// agrega_a_txt($dato,$ruta_txt);


if (($mail !== $codigo) || ($mail == null) || ($codigo == null))
{

    echo "<center>El Mail no pudo verificarse, si el problema continua por favor contactenos a: afiliacionespdr@gmail.com</center>";
    die;
} else
{

    if ($enviado == 1)
    {



        if ($_POST["dni"])
        {

            $nombre = $_POST["nombre"];

            $apellido = $_POST["apellido"];


            $dato = $hora . "\t" . "$mail\t" . "$nombre $apellido\t" . "$barrio\t" . "ENVIO EL FORMULARIO\n" . "<br>";
            $ruta_txt = "datos/datos_diarios.html";

            agrega_a_txt($dato, $ruta_txt);

        } else
        {


            $dato = $hora . "\t" . "$mail\t" . ">>>ERROR SUBIENDO EL FORMULARIO<<<\n" . "<br>";
            $ruta_txt = "datos/datos_diarios.html";
            agrega_a_txt($dato, $ruta_txt);

            echo "<center>Se produjo un error al intentar subir el formulario, por favor intentalo nuevamente.<br>
        Si el problema continua por favor escribinos a afiliacionespdr@gmail.com para informarnos del problema así podemos resolverlo.<br>Gracias por tu ayuda!</center>";

            die;


        }


    } else
    {
        $dato = $hora . "\t" . "$mail\t" . "$nombre\t" . "$barrio\t" . "CONFIRMADO\n" . "<br>";
        $ruta_txt = "datos/datos_diarios.html";
        agrega_a_txt($dato, $ruta_txt);

    }

}


if ($enviado == 1)
{

    //$mail = $_GET["mail"];

    //$barrio = $_GET["barrio"];

    $nombre = $_POST["nombre"];

    $apellido = $_POST["apellido"];

    $dni = $_POST["dni"];

    $dni = str_replace(".", "", $dni);

    $dia = $_POST["dia"];

    $mes = $_POST["mes"];

    $ano = $_POST["ano"];

    $fecha_nacimiento = $dia . "/" . $mes . "/" . $ano;

    $lugar_nacimiento = $_POST["lugar_nacimiento"];

    $sexo = $_POST["sexo"];

    $estado_civil = $_POST["estado_civil"];

    $domicilio = $_POST["domicilio"];

    $telefono = $_POST["telefono"];

    $profesion = $_POST["profesion"];

    $mosaico = $_POST["mosaico"];


    ////*** TXT ***//
    $nombre_archivo = $dni;

    $contenido = "$dni $apellido" . "\t" . "\t" . "\t" . "\t" . "\t" . "\t" . "ONLINE" . "\t" . $nombre . "\t" . $apellido . "\t" . $dni . "\t" . $sexo . "\t" . $fecha_nacimiento . "\t" . $lugar_nacimiento .
        "\t" . $profesion . "\t" . $estado_civil . "\t" . $domicilio . "\t" . $mail . "\t" . $telefono . "\t" . "\t" . $mosaico . "\t" . $barrio;


    $fp = fopen("subidas_web/" . $dni . ".txt", "w+");
    if (fwrite($fp, "$contenido"))
    {

        //echo "se subio correctamente el txt" ;
    } else
    {
        echo "<center>SE PRODUJO UN ERROR AL INTENTAR CARGAR EL FORMULARIO.<br>
    POR FAVOR VUELVA A INTENTARLO O REPORTE EL INCONVENIENTE A afiliacionespdr@gmail.com</center>";

    }

    fclose($fp);

    ////*** Attachment 1 ***//
    if ($_FILES["foto1"]["name"] != "")
    {

        $nombre_archivo = $_FILES["foto1"]["name"];
        $extension = end(explode(".", $nombre_archivo));

        if (!copy($_FILES["foto1"]["tmp_name"], "subidas_web/" . $dni . _1 . "." . $extension))
        {
            echo "<center>SE PRODUJO UN ERROR AL INTENTAR CARGAR LA FOTO 1 DEL FORMULARIO.<br>
    POR FAVOR VUELVA A INTENTARLO O REPORTE EL INCONVENIENTE A afiliacionespdr@gmail.com</center>";

        }
    }


    ////*** Attachment 2 ***//
    if ($_FILES["foto2"]["name"] != "")
    {

        $nombre_archivo = $_FILES["foto2"]["name"];
        $extension = end(explode(".", $nombre_archivo));

        if (!copy($_FILES["foto2"]["tmp_name"], "subidas_web/" . $dni . _2 . "." . $extension))
        {
            echo "<center>SE PRODUJO UN ERROR AL INTENTAR CARGAR LA FOTO 2 DEL FORMULARIO.<br>
    POR FAVOR VUELVA A INTENTARLO O REPORTE EL INCONVENIENTE A afiliacionespdr@gmail.com</center>";

        }
    }

    ////*** Attachment 3 ***//
    if ($_FILES["foto3"]["name"] != "")
    {

        $nombre_archivo = $_FILES["foto3"]["name"];
        $extension = end(explode(".", $nombre_archivo));

        if (!copy($_FILES["foto3"]["tmp_name"], "subidas_web/" . $dni . _3 . "." . $extension))
        {
            echo "<center>SE PRODUJO UN ERROR AL INTENTAR CARGAR LA FOTO 3 DEL FORMULARIO.<br>
    POR FAVOR VUELVA A INTENTARLO O REPORTE EL INCONVENIENTE A afiliacionespdr@gmail.com</center>";

        }
    }

    // EL FORMULARIO SE CARGO Y REDIRECCIONA
    //include("gracias_form.html");


    header('Location: gracias.html');


    die;


}

//echo $barrio."<br>".$mail."<br>".$nombre_mosaico;


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="TBSOFT" />

	<title>Formulario</title>


    <script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53108826-1', 'auto');
  ga('send', 'pageview');


function validateForm()
{

var campo="apellido";
var elemento=document.forms["formulario"][campo].value;
if (elemento=null || elemento==""){cargandoOFF();alert("Falta completar el Apellido");document.forms["formulario"].elements[campo].focus();return false}

var campo="nombre";
var elemento=document.forms["formulario"][campo].value;
if (elemento=null || elemento==""){cargandoOFF();alert("Falta completar el Nombre");document.forms["formulario"].elements[campo].focus();return false}

var campo="dni";
var elemento=document.forms["formulario"][campo].value;
if (elemento=null || elemento==""){cargandoOFF();alert("Falta completar el Número de DNI");document.forms["formulario"].elements[campo].focus();return false}

var campo="sexo";
var elemento=document.forms["formulario"][campo].value;
if (elemento=null || elemento==""){cargandoOFF();alert("Falta completar el Sexo");document.forms["formulario"].elements[campo].focus();return false}

var campo="dia";
var elemento=document.forms["formulario"][campo].value;
if (elemento=null || elemento==""){cargandoOFF();alert("Falta completar el Dia de Nacimiento");document.forms["formulario"].elements[campo].focus();return false}

var campo="mes";
var elemento=document.forms["formulario"][campo].value;
if (elemento=null || elemento==""){cargandoOFF();alert("Falta completar el Mes de Nacimiento");document.forms["formulario"].elements[campo].focus();return false}

var campo="ano";
var elemento=document.forms["formulario"][campo].value;
if (elemento=null || elemento==""){cargandoOFF();alert("Falta completar el Año de Nacimiento");document.forms["formulario"].elements[campo].focus();return false}

var campo="lugar_nacimiento";
var elemento=document.forms["formulario"][campo].value;
if (elemento=null || elemento==""){cargandoOFF();alert("Falta completar el Lugar de Nacimiento");document.forms["formulario"].elements[campo].focus();return false}

var campo="profesion";
var elemento=document.forms["formulario"][campo].value;
if (elemento=null || elemento==""){cargandoOFF();alert("Falta completar la Profesión u Oficio");document.forms["formulario"].elements[campo].focus();return false}

var campo="estado_civil";
var elemento=document.forms["formulario"][campo].value;
if (elemento=null || elemento==""){cargandoOFF();alert("Falta completar el Estado Civil");document.forms["formulario"].elements[campo].focus();return false}

var campo="domicilio";
var elemento=document.forms["formulario"][campo].value;
if (elemento=null || elemento==""){cargandoOFF();alert("Falta completar el Domicilio");document.forms["formulario"].elements[campo].focus();return false}

var campo="foto1";
var elemento=document.forms["formulario"][campo].value;
if (elemento=null || elemento==""){cargandoOFF();alert("Falta seleccionar la foto del DNI");document.forms["formulario"].elements[campo].focus();return false}

var campo="foto2";
var elemento=document.forms["formulario"][campo].value;
if (elemento=null || elemento==""){cargandoOFF();alert("Falta seleccionar la foto del dorso del DNI");document.forms["formulario"].elements[campo].focus();return false}

}


</script>




<style type="text/css">
span.estilo{font-family:"Verdana", sans-serif; font-size:16.0px; line-height:1.13em;color:#3D3D3D;}

span.rojo{font-family:"Verdana", sans-serif; font-size:16.0px; line-height:1.13em;color: #AD0000;font-weight: bold;}



</style>




</head>

<body text="#000000" style="background-color:#ffffff;background-image:url(wpimages/wpa21cc0b3_06.png);background-repeat:repeat;background-position:top center;background-attachment:scroll; text-align:center; height:1000px; /*Master Page Body Style*/ /*Page Body Style*/" >



<div style="background-color:transparent;text-align:left;margin-left:auto;margin-right:auto;position:relative;width:960px;height:1400px;" __AddCode="Master DIV Tag">

<img src="imagenes/head_formulario.jpg" width="930" height="245" border="0" >
<br /><br />

<div style="margin-left:auto;margin-right:auto;position:relative; position:relative;left:40px;">

<form id="formulario" name="formulario" onsubmit="return validateForm()" action="formulario_web.php<?php

echo "?mail=" . $_GET["mail"] . "&codigo=" . $_GET["codigo"] . "&barrio=" . $_GET["barrio"] . "&enviado=1"

?>" accept-charset="UTF-8" method="post" target="_self" enctype="multipart/form-data" style="margin:0px; /*MainDivStyle*/" >




<span class="estilo">Apellido/s (Como Figura en tu DNI)</span><BR>
<input type=text NAME=apellido size=33 placeholder="REQUERIDO"><BR><BR>

<span class="estilo">Nombre/s (Como Figura en tu DNI)</span><BR>
<input type=text NAME=nombre size=33 placeholder="REQUERIDO"><BR><BR>

<span class="estilo">Número de DNI</span><BR>
<input type=text NAME=dni size=33 placeholder="REQUERIDO"><BR><BR>

<span class="estilo">Sexo</span><BR>
<select  name="sexo" >
    <option value="" selected >-&nbsp;SEXO&nbsp;-</option>
    <option value="F" >Femenino</option>
    <option value="M" >Masculino</option>
</select><BR><BR>

<span class="estilo">Fecha de Nacimiento</span><BR>
<select  name="dia" size="1" >
    <option value="" selected >-&nbsp;DIA&nbsp;-</option>
<?php
   for ($day=1;$day<32;$day++){
     echo "<option value=\"" . str_pad($day,2,"0", STR_PAD_LEFT) . "\" >" . str_pad($day,2,"0",STR_PAD_LEFT) . "</option>" . "\n";
   } 
?>
</select>


<select  name="mes" size="1">
    <option value="" selected >-&nbsp;MES&nbsp;-</option>
<?php 
   for ($month=1;$month<32;$month++){
     echo "<option value=\"" . str_pad($month,2,"0", STR_PAD_LEFT) . "\" >" . str_pad($month,2,"0",STR_PAD_LEFT) . "</option>" . "\n";
   } 
?>
</select>

<select  name="ano" size="1">
    <option value="" selected >-&nbsp;AÑO&nbsp;-</option>
<?php
  // un poco pesimista considerar que ningun afiliado tendra mas de 110. Si lo hay, sera noticia ;P
  date_default_timezone_set('UTC');
  for ($any=date("Y", strtotime("-16 year", time()));$any>date("Y", strtotime("-110 year", time()));$any--){
     echo "<option value=\"" . $any . "\" >" . $any . "</option>" . "\n";
  }
?>

</select><BR><BR>

<span class="estilo">Lugar de Nacimiento como figura en tu DNI.<BR>(Esta escrito en el Dorso del DNI Tarjeta o Segunda hoja del DNI Libro)</span><BR>
<input type=text NAME=lugar_nacimiento size=33 placeholder="REQUERIDO"><BR><BR>

<span class="estilo">Profesión u Oficio</span><BR>
<input type=text NAME=profesion size=33 placeholder="REQUERIDO"><BR><BR>

<span class="estilo">Estado Civil</span><BR>
<input type=text NAME=estado_civil size=33 placeholder="REQUERIDO"><BR><BR>

<span class="estilo">Domicilio como figura en tu DNI.<BR>(Si es DNI Libro, el último domicilio registrado legalmente)</span><BR>
<input type=text NAME=domicilio size=33 placeholder="REQUERIDO"><BR><BR>

<span class="estilo">Teléfono</span><BR>
<input type=text NAME=telefono size=33 placeholder="OPCIONAL"><BR><BR>

<span class="estilo">Como queres que figure tu nombre en el mosaico de los 4.000 Fundadores.</span><BR>
<span class="estilo">(Ej. P. Gonzalez ó Pablo G.)</span><BR>

<select  name="mosaico" >
    <option value="poner_nombre" selected >NOMBRE + INICIAL APELLIDO</option>
    <option value="poner_apellido" >INICIAL NOMBRE + APELLIDO</option>
</select><BR><BR>

<span class="estilo">Subí las dos caras de tu DNI que tengan un máximo de 6MB.</span><BR>
<span class="rojo">Es muy importante que las fotos esten en foco y que los datos sean legibles.</span><BR>
<span class="rojo">Si tu cámara no permite tomar fotos en foco de muy cerca,</span><BR>
<span class="rojo">aléjala unos centímetros hasta que los datos en las fotos aparezcan legibles.</span><BR><BR>

<span class="estilo">Subir Frente DNI Tarjeta ó Primera hoja con foto DNI Libro (Requerido)</span><BR>
<input type="file" name="foto1" ><BR><BR>

<span class="estilo">Subir Dorso DNI Tarjeta ó Segunda Hoja DNI libro (Requerido)</span><BR>
<input type="file" name="foto2" ><BR><BR>

<span class="estilo">En el caso que haya cambio de domicilio en DNI libro, subirlo también:</span><BR>
<input type="file" name="foto3" ><BR><BR>



<INPUT TYPE=SUBMIT VALUE="ENVIAR!" onclick="cargandoON()">

</FORM>

</div>


<div id="carga" style="margin-left:40px; display:none;">
<img src="imagenes/carga.gif" width="418" height="54" border="0" id="agif1" alt="" >

<script type="text/javascript">
function cargandoOFF()
{
   document.getElementById("carga").style.display = "none"; // to display
   return true;
}
function cargandoON()
{
   document.getElementById("carga").style.display = ""; // to display
   return true;
}
</script>

<script type="text/javascript" src="wpscripts/jsValidation.js"></script>

</div>

<br/><br/>

<div>
<img src="imagenes/banda.jpg" width="929" height="43" border="0" id="agif1" alt="" >
</div>
</div>
</body>
</html>


