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
$valor_inicial=1;

for($i=1;$i<=250;$i++){ 

$nombre[$i] = $valor_inicial++.";0";
   
}

// CARGA LA LISTA DE NOMBRES DESDE EL PRIMER VALOR

$lista = explode (";","CARLOS A.;
EXEQUIEL A.;
FLORENCIA A.;
GABRIELA A.;
SILVINA A.;
MATIAS A.;
JAVIER A.;
MARIANO A.;
MARÍA A.;
MARTIN A.;
A. ARBIT;
G. ARGÜELLO;
FEDERICO A.;
MATIAS A.;
M. AVALLONE;
J. BABINO;
FEDERICO B.;
GUILLERMO B.;
GUIDO B.;
SEBASTIAN B.;
FERNANDO B.;
GABRIEL B.;
JUAN B.;
PAULA B.;
MATÍAS B.;
A. BONOMO;
OSCAR B.;
PABLO B.;
E. BRENMAN;
DIEGO B.;
SILVANA C.;
JANETTE C.;
MARIA C.;
ROSARIO C.;
MICAELA C.;
YANINA C.;
MARIA C.;
MARIANA C.;
R. COLONGO;
AGUSTINA C.;
FELIX C.;
P. CORNU;
HECTOR C.;
JULIA C.;
CHRISTIAN C.;
LILIANA C.;
DIEGO D.;
SOLEDAD D.;
JUAN D.;
MAURO D.;
HERNAN D.;
CRISTIAN D.;
MIGUEL D.;
MARIA E.;
DALIA E.;
E. ELVAS;
DAMIAN F.;
G. FARJI;
ROMINA F.;
M. FEIS;
R. FERNANDEZ;
S. FERNANDEZ;
LEONARDO F.;
IGNACIO F.;
SANTIAGO F.;
PABLO F.;
NATALIA F.;
MARTIN G.;
MARIANO G.;
M. GALLO;
HERNAN G.;
MAGDALENA G.;
MARCELA G.;
LUIS G.;
CARLOS G.;
DARIO G.;
ANA G.;
M. GOMEZ;
SABRINA G.;
MIGUEL G.;
MARIA G.;
DANIEL H.;
FLORENCIA H.;
LAUTARO H.;
JUAN H.;
GABRIEL H.;
CRISTIAN I.;
INÉS J.;
VALERIA K.;
MONICA K.;
IGNACIO L.;
JUAN L.;
LUCIO L.;
JUAN L.;
ERIC L.;
S. LIFSZYC;
FEDERICO L.;
JOSE L.;
M. LOPATA;
IRENE L.;
ROBERTO L.;
RAUL L.;
EZEQUIEL L.;
SILVINA M.;
HUGO M.;
P. MANCINI;
KARINA M.;
AGUSTINA M.;
X. MARTIN;
PABLO M.;
ETIENNE M.;
VALERIA M.;
N.MONTENEGRO;
GUILLERMO M.;
F. MUÑOZ;
FEDERICO N.;
FRANCISCO O.;
ROMINA O.;
LORENA P.;
ISABEL P.;
MARINA P.;
TOMÁS P.;
RODRIGO P.;
ADRIAN P.;
MARINA P.;
PABLO P.;
ENRIQUE P.;
CLARA P.;
M. QUEVEDO;
E. QUEVEDO;
PABLO R.;
MARIA R.;
FEDERICO R.;
CARLOS R.;
D. REINHOLD;
DANIEL R.;
GONZALO R.;
MARIANO R.;
MARIA R.;
ANA R.;
RODRIGO R.;
GABRIELA R.;
FLORENCIA R.;
NORA R.;
IGNACIO S.;
SEBASTIÁN S.;
SOL S.;
MARIANO S.;
FLAVIA S.;
S. SCANLAN;
JESICA S.;
S. SIRI;
JAVIERA S.;
LUCIANO S.;
M. SOLIZ;
S. TACCHELLA;
MARIANO T.;
GABRIELA T.;
B. UCCIFERRI;
V. URTIAGA;
MONICA V.;
G. VILARIÑO;
JOSE V.;
MATIAS V.;
MARÍA V.;
M. VOLPE;
DANIEL W.;
MATIAS W.;
JOAQUIN W.;
ROCÍO W.;
NICOLAS W.;
F. WERNER;
M. WORCEL;
RUBEN Z.;
VALERIA Z.;
V. ZAIDEL;
VIVIANA Z.;
ROSA Z.;
VERONICA Z.;
F. SILBERMAN;
GAL M.;
GISELLE U.;
ADRIAN P.;
AXEL F.;
M.GLASSERMAN;
FRANCISCO G.;
NICOLAS L.;
MERCEDES O.;
J. PELLER;
SOLEDAD P.;
SEBASTIÁN W.;
BRUNO C.;
FELIPE G.;
HILDA L.;
G. LUCERO;
OFELIA M.;
JUAN P.;
ALAN T.;
IGNACIO C.;
MARIANA L.;
NICOLÁS M.;
MARÍA M.;
SEBASTIÁN P.;
MARIA V.;
FEDERICO V.;
GABRIEL A.;
OMAR A.;
JOSEFINA A.;
MARIA B.;
NOELIA B.;
CAROLINA G.;
D. LUACES;
BRENDA M.;
LUZ M.;
HERNÁN P.;
MARIA R.;
JUAN S.;
CATALINA C.;
CARLOS F.;
LEONARDO G.;
ALEXIS J.;
YOLANDA L.;
SOLEDAD L.;
E. NANYO;
VALENTINA N.;
V. PAZO;
MILCA Z.;
MARTIN A.;
FRANCISCO G.;
C. ACOSTA;
I. ALDERETE;
GONZALO A.;
G. CHIESA;
LUCAS F.;
FRANCISCO M.;
DANIEL V.;
MIRIAM A.;
ALEJANDRO B.;
S. BURGUBURU;
ERNESTO C.;
MIGUEL C.;
LAUTARO C.;
NICOLAS D.;
F. ELIZALDE;
NILDA F.;
LEANDRO G.;
JUAN G.;
DANIELA M.;
JESSICA M.;
S. MENDEZ
");

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
