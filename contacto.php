<?php

//////////////////////////////////////////////////////////////////////////////////////////
//
// ESTE ES EL PHP AL QUE APUNTA EL FORMULARIO DE 4MILFUNDADORES.COM
//
//////////////////////////////////////////////////////////////////////////////////////////

function hora_local($zona_horaria)
{
    if ($zona_horaria > -12.1 and $zona_horaria < 12.1)
    {
        $hora_local = time() + ($zona_horaria * 3600);
        return $hora_local;
    }
    return 'error';
}

function valida_mail($mail)
{


    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $mail))
    {
        echo "<br>Ups! Hubo un error.<br>";
        echo "<br>Parece que el mail no es una direcci�n v�lida. Por favor intentalo de nuevamente y si el error persiste por favor escribinos a: afiliacionespdr@gmail.com";

        exit;
    }
}

//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

$hora = gmdate('Y-m-d H:i:s', hora_local(-3));


$nombre = $_POST["nombre"];

$mail = $_POST["mail"];

valida_mail($mail);

$barrio = $_POST["barrio"];

$enlace = "http://www.4milfundadores.com/formulario_web.php" . "?mail=" . $mail .
    "&codigo=" . codifica_mail($mail) . "&nombre=" . urlencode($nombre) . "&barrio=" .
    urlencode($barrio);

$para = $mail;
$titulo = '4.000 Fundadores';

if ($barrio != "no_caba")
{
    $mensaje = "�Bienvenido! Ya diste el primer paso para ser uno de los fundadores del Partido de la Red.<br><br>

Debido a exigencias en la legislaci�n, necesitamos concretar 4.000 o m�s afiliaciones formales,<br>
para obtener la personer�a definitiva como partido y as� poder participar en las futuras elecciones.<br><br>
Si hab�as firmado el a�o pasado la ficha de adhesi�n, te aclaramos que �sta es otra instancia diferente.<br>
Ahora necesitamos tu afiliaci�n ya que la ley nos exige que seamos 4 mil afiliados los que fundemos el Partido de la Red.<br><br>
Por eso, te proponemos que hagas un clic en el siguiente enlace y completes este formulario Online:<br>
<a href=" . $enlace . "> IR AL FORMULARIO ONLINE</a><br><br>

S�, un formulario m�s, que puede hacerse en cualquier momento del d�a.<br>
Pero se trata de un formulario que tiene la intenci�n de unir las voces de 4.000 ciudadanos que quieren transformar la pol�tica para hacerla m�s transparente y participativa.<br><br>

Consolidemos la existencia del Partido de la Red, y mejoremos la democracia.<br><br>

��Juntos podemos hacerlo!!
";
} else
{
    $dato = $hora . "\t" . "$mail\t" . "$nombre\t" . "$barrio\t" . "DIRECTO NO CABA\n"."<br>";
    $ruta_txt = "datos/datos_diarios.html";

    agrega_a_txt($dato, $ruta_txt);


    header('Location: no_caba.html');
    die;


}


//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
//                           CORTAFUEGOS
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////


//$RutaTxtIPs = "datos/IPs_Directo_I34y96nO.txt";

//$chequear = "DIRECTO";

//include "auxiliar.php";

//include "cortafuegos.php";

//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////


mandar_mail($para, $titulo, $mensaje, $cabeceras,$hora,$mail,$nombre,$barrio);


function agrega_a_txt($dato, $ruta_txt)
{

    $archivo = fopen($ruta_txt, 'a') or die("Se produjo un error inesperado, por favor intentelo nuevamente");
    fwrite($archivo, $dato);
    fclose($archivo);

}


function codifica_mail($mail)
{

    $mail_codificado = base64_encode($mail);

    return (substr($mail_codificado, 5) . substr($mail_codificado, 0, 5));

}

function decodifica_mail($mail_codificado)
{

    return base64_decode(substr($mail_codificado, -5) . substr($mail_codificado, 0,
        -5));

}

function mandar_mail($para, $titulo, $mensaje, $cabeceras,$hora,$mail,$nombre,$barrio)
{

    $cabeceras = "Content-type: text/html; charset=iso-8859-1 \r\n" .
        "From: Partido de la Red <pdr@4milfundadores.com>";

    if (mail($para, $titulo, $mensaje, $cabeceras))
    {

        $dato = $hora . "\t" . "$mail\t" . "$nombre\t" . "$barrio\t" . "DIRECTO\n"."<br>";
        $ruta_txt = "datos/datos_diarios.html";

        agrega_a_txt($dato, $ruta_txt);

        header('Location: mail_automatico.html');
    } else
    {
        $dato = $hora . "\t" . "$mail\t" . "$nombre\t" . "$barrio\t" .
            "DIRECTO ERROR ENVIANDO MAIL\n"."<br>";
        $ruta_txt = "datos/datos_diarios.html";

        agrega_a_txt($dato, $ruta_txt);


        echo "Hubo un error al intentar enviar tu solicitud, por favor int�ntalo nuevamente o escr�benos a preguntasenred@gmail.com";
    }
    ;

}

?>