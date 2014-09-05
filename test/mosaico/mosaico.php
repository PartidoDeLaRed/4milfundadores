<!--Page Preamble-->
<!--Master Page Preamble-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta http-equiv='X-UA-Compatible' content='IE=EmulateIE8' ><title>250</title>


<style type="text/css">
span.estilo{font-family:"Arial", sans-serif; color:#ffffff; font-size:9.0px; line-height:1.25em;}

</style>
<script type="text/javascript" src="wpscripts/jspngfix.js"></script>
<link rel="stylesheet" href="wpscripts/wpstyles.css" type="text/css"><script type="text/javascript">
var blankSrc = "wpscripts/blank.gif";
</script>
</head>

<body text="#000000" style="background-color:#ffffff; text-align:center; height:450px; /*Master Page Body Style*/ /*Page Body Style*/" __AddCode="MasterPageInBodyTag" __AddCode="PageInBodyTag">

<?php

$datos = lee_txt("listado_total.txt");

$mosaico = $_GET["mosaico"];

$valor_inicial=$mosaico+1;

$soporteON = "imagenes_php/soporteON.gif";
$soporteOFF = "imagenes_php/soporteOFF.gif";
$nombre = carga_nombres($datos,$valor_inicial);
arma_mosaico($nombre, $soporteON, $soporteOFF);


////////////////////////////////////////////
////////////////////////////////////////////
////////////////////////////////////////////


function imprimir_array($array)
{
    foreach ($array as $linea)
    {
        echo $linea . "<br>";

    }

}


function lee_txt($RutaTxtIPs)
{
    //LEE EL TXT DEL SERVER
    $txt = trim(file_get_contents($RutaTxtIPs));

    return $txt;
}


function carga_nombres($datos,$valor_inicial)
{

    $lista = array();

    $datos = preg_split("/[\n]+/", $datos);

    foreach ($datos as &$linea)
    {


        $final = strpos($linea, ";");

        $linea = substr($linea, 0, $final);
        
        array_push($lista, $linea);


    }



    // SETA TODOS LOS TEXTOS COMO NUMEROS CORRELATIVOS A PARTIR DEL VALOR INICIAL
   // $valor_inicial = 1;

    for ($i = 1; $i <= 250; $i++)
    {

        $nombre[$i] = $valor_inicial++ . ";0";

    }

    // CARGA LA LISTA DE NOMBRES DESDE EL PRIMER VALOR


//    $lista = explode(";", "CARLOS A.;
//EXEQUIEL A.;
//FLORENCIA A.;
//GABRIELA A.;
//SILVINA A.;
//MATIAS A.;
//JAVIER A.;
//MARIANO A.;
//MARÍA A.;
//G. ARGÜELLO;
//FEDERICO A.;
//MATIAS A.;
//M. AVALLONE
//");


    $cantidad = count($lista);

    for ($i = 1; $i <= $cantidad; $i++)
    {

        $nombre[$i] = $lista[$i - 1] . ";1";

    }

    return $nombre;
}


function arma_mosaico($nombre, $soporteON, $soporteOFF)
{
    //Hace un loop para construir las 25 filas de soportes

    ////LOOP de columnas
    $loop2 = 1;
    $top = 0;
    $contador = 1;

    while ($loop2 <= 25)
    {


        //    LOOP de filas
        $loop = 1;
        $left = 2;
        while ($loop <= 10)
        {

            $partes = explode(";", $nombre[$contador]);

            if ($partes[1] == 1)
            {

                $soporte = $soporteON;
            } else
            {

                $soporte = $soporteOFF;
            }

            $contador++;


            echo '<img src="' . $soporte .
                '" width="90" height="15" border="0" id="pic_268" alt="" onload="OnLoadPngFix()" style="position:absolute;left:' .
                $left . 'px;top:' . $top . 'px; /*Tag Style*/" __AddCode="here">';

            $loop++;
            $left += 93;
        }
        $loop2++;
        $top += 18;

    }

    //Pega los texos arriba
    $contador = 1;
    $loop2 = 1;
    $top = -13;

    while ($loop2 <= 25)
    {

        $loop = 1;
        $left = 11;

        while ($loop <= 10)
        {

            $partes = explode(";", $nombre[$contador]);


            echo '<div id="txt_3" style="position:absolute;left:' . $left . 'px;top:' . $top .
                'px;width:80px;height:13px; /*BorderDivStyle*/" __AddCode="InsideBorderDiv">
            <p><span class="estilo">' . $partes[0] . '</span></p>
</div>';


            $contador++;

            $left += 93;
            $loop++;
        }
        $loop2++;
        $top += 18;

    }
}

?>

</div>
</body>
</html>
