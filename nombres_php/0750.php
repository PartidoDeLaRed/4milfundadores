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
$valor_inicial=501;

for($i=1;$i<=250;$i++){ 

$nombre[$i] = $valor_inicial++.";0";
   
}

// CARGA LA LISTA DE NOMBRES DESDE EL PRIMER VALOR

$lista = explode (";","FEDERICO M.;
M. MARTIN;
A.MARTINELLI;
HERNAN M.;
CARMEN M.;
MAXI M.;
MARINA M.;
MARTIN M.;
IGNACIO M.;
RODRIGO M.;
MARCOS M.;
CHRISTIAN M.;
FRANCISCO M.;
ELIAS M.;
MARTIN M.;
MERCEDES M.;
MARCOS M.;
M. MOSPAN;
PAULA M.;
C. NAVARRO;
D. NAVON;
ALEJANDRO N.;
G. NOBILE;
IGNACIO N.;
S. NUÑEZ;
G. ORSI;
GERÓNIMO O.;
JAVIER O.;
JUAN O.;
BEATRIZ P.;
K. ALBERTO P.;
TATIANA P.;
FERNANDO P.;
ANABELLA P.;
ERICA P.;
LUCIANA P.;
MARIANA P.;
E. PERRET;
LUZ P.;
JULIA P.;
SANTIAGO P.;
LEANDRO P.;
J. POSE;
MARTIN P.;
G. PUGLIESE;
C. QUINTEROS;
ANDREA R.;
NAHUEL R.;
SEBASTIÁN R.;
ISABEL R.;
M. REGALINI;
JOSEFINA R.;
DIANA R.;
P. RODRIGUEZ;
ANALÍA R.;
RODRIGO R.;
LEONARDO R.;
MARIANA R.;
PABLO R.;
DANIELA R.;
IGNACIO R.;
OMAR R.;
BURSTEIN R.;
EDUARDO R.;
SEBASTIAN R.;
AGUSTÍN R.;
P.SABBATELLA;
D. SADRAS;
GUILLERMO S.;
E.SALVATIERRA;
MANUELA S.;
MARINA S.;
LEONARDO S.;
E.SCHVINDLERMAN;
RODRIGO S.;
CAMILO S.;
AGUSTÍN S.;
MANUEL S.;
GABRIEL S.;
ALEJANDRO S.;
ORLANDO S.;
RENATA S.;
URIEL S.;
PAULA S.;
GUSTAVO S.;
JAVIER S.;
S.SZUCHMACHER;
M. TARANTINO;
FERNANDO T.;
S. TEDESCO;
ANA T.;
DIEGO T.;
MARTÍN T.;
D. UMASCHI;
F. UMINSKY;
MARTÍN U.;
GERMÁN V.;
F. VEGA;
NATALIA V.;
E.VILLAMAYOR;
JUAN V.;
N. VITALE;
S. VIZCAINO;
LEANDRO V.;
M. VORRABER;
G. WAGNER;
NORBERTO W.;
TOMÁS W.;
D. WERNER;
A. WINOGRAD;
PABLO Y.;
GUIDO Z.;
MARIA Z.;
PABLO Z.;
M. PIANA;
DIEGO S.;
O. DUHALDE;
MANUELA G.;
GERALDINE M.;
IAN A.;
S. QUIROS;
SERGUEI K.;
GABRIELA S.;
L. COPELZON;
LUCIANO S.;
TOMAS D.;
CRISTIAN C.;
J. ARANOVICH;
MARIANO M.;
OSCAR E.;
YANKELEVICH;
ERNESTO A.;
AGUSTIN F.;
SOLEDAD S.;
JOSE F.;
CELINA L.;
FEDERICO M.;
S. YELMINI;
L. DIAZ;
PABLO M.;
AGUSTINA L.;
ARIEL K.;
AGUSTIN G.;
ANDRéS S.;
MARíA A.;
TOMAS L.;
EDUARDO P.;
MARíA S.;
MATíAS L.;
NICOLAS T.;
B. BAUAB;
CRISTIAN C.;
VIVIANA C.;
A. ABADI;
MARIA P.;
SERGIO S.;
MARCELO M.;
SERGIO S.;
P. KUSINSKY;
LILIANA L.;
V. MACARIAN;
PAULA V.;
F. MARTIN;
LUCIO N.;
VICTOR E.;
LEONEL C.;
BEATRIZ N.;
JUAN E.;
NESTOR R.;
NICOLE P.;
SILVINA P.;
YARON Z.;
LUIS P.;
SILVEYRA L.;
CAROLINA C.;
PABLO T.;
DANIEL M.;
PEDRO V.;
D. HERNANDEZ;
NAHUEL C.;
N. LAURITO;
MARIANO F.;
CARLOS M.;
AGUSTINA P.;
I. ARANOVICH;
IGNACIO M.;
ELIAS B.;
P. DIONISIO;
SANGUINETI;
A. FONSECA;
OMAR L.;
M. MARCARIAN;
FLAVIO D.;
JUAN G.;
HERNAN F.;
CASERO P.;
ANDRES G.;
FLORENCIA M.;
MARIA R.;
XIMENA C.;
MABEL A.;
RUBEN W.;
MARGARITA O.;
FLORES L.;
MARIA M.;
GUILLERMO R.;
MARCOS W.;
F. MUSCÓ;
MARCOS F.;
ROCíO F.;
CARLOS G.;
ALFREDO L.;
SILVIA L.;
RODRIGO H.;
FEDERICO S.;
MARIANO O.;
J. MORVILLO;
MARIANGELES;
MARIA H.;
GISELLE S.;
DIEGO T.;
SEBASTIAN S.;
JUAN R.;
S. MERCADO;
L. MARTINO;
L. MUSTAFA;
ALBERTO J.;
O. SCIGOLINI;
S. CYMBLICH;
M. DEL RIO;
S. GAIDO;
ANDREA A.;
R. FERNANDEZ;
MARíA D.;
T. ILARREGUI;
A. CORBILLON;
M. ARIAS;
J. PAZO;
A. COSTA;
NAHUEL R.;
A. FERNANDEZ;
M. CORBILLON;
A. VERA;
C. KNELL;
CARLA M.;
MARíA M.;
ARIEL S.;
I. BRIGGILER;
A. CAMA;
G. MIRA
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
