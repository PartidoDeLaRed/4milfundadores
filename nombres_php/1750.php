<!--Page Preamble-->
<!--Master Page Preamble-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta http-equiv='X-UA-Compatible' content='IE=EmulateIE8' ><title>500</title>


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

$soporteON = "imagenes_php/soporteON.gif";
$soporteOFF = "imagenes_php/soporteOFF.gif";
$nombre = carga_nombres();


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
$contador=1;
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


function carga_nombres()
{
   
// SETA TODOS LOS TEXTOS COMO NUMEROS CORRELATIVOS A PARTIR DEL VALOR INICIAL
$valor_inicial=1501;

for($i=1;$i<=250;$i++){ 

$nombre[$i] = $valor_inicial++.";0";
   
}

// CARGA LA LISTA DE NOMBRES DESDE EL PRIMER VALOR

//$lista = explode (";","S. SIRI;
//E. BRENMAN;
//G. ARGUELLO;
//P. MANCINI;
//A. FRIZZERA;
//M. SOLIZ;
//MARIA E.;
//MARIANO G.;
//MARIANA C.;
//MARINA P.;
//DARIO G.;
//MATIAS A.;
//VOGEL G.;
//SILVANA C.;
//FEDERICO W.;
//LUCIO L.");

$cantidad=count($lista);

for($i=1;$i<=$cantidad;$i++){ 

$nombre[$i] = $lista[$i-1].";1";   
   
} 

return $nombre;
}
?>

</div>
</body>
</html>
