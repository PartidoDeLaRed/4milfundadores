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
$valor_inicial=251;

for($i=1;$i<=250;$i++){ 

$nombre[$i] = $valor_inicial++.";0";
   
}

// CARGA LA LISTA DE NOMBRES DESDE EL PRIMER VALOR

$lista = explode (";","MARIA P.;
LESLIE Q.;
GUSTAVO S.;
DANIEL S.;
FEDERICO T.;
SILVIA W.;
MARINA B.;
MARIANA B.;
GABRIEL B.;
DIEGO C.;
T. DUPUY;
GABRIELA G.;
MARÍA G.;
CECILIA I.;
MANUEL L.;
ALEJANDRO L.;
SERGIO M.;
ALEJANDRO N.;
PEZZOLO G.;
MARIA R.;
M. ROSENTAL;
P. SACK;
SARA S.;
JOHANNA S.;
SOLEDAD T.;
DANIELA V.;
F. ALAZRAKI;
ANDREA A.;
MARCELA B.;
M. BONIFATI;
MARIA B.;
LAURA C.;
ARIEL D.;
PABLO D.;
MARIA E.;
JAVIER F.;
JULIA F.;
ROMIRA I.;
RAMIRO P.;
MAYRA T.;
M. VOLPE;
FRANCISCO C.;
ELIO O.;
PATRICIA E.;
MARINA P.;
MARIA P.;
AGUSTIN B.;
NICOLAS K.;
CARLA C.;
JUAN D.;
DAIANA G.;
MARIANO A.;
SOLANA M.;
MATIAS P.;
FEDERICA B.;
ANALIA F.;
ALEJANDRO M.;
ANDREA S.;
NORA I.;
LILIANA C.;
IONEL B.;
LUCIANA C.;
RICARDO C.;
CLEVER C.;
PABLO M.;
MARIA P.;
JUAN A.;
MAXI P.;
MARIA A.;
FLAVIA B.;
MAITE C.;
MARIANO D.;
PABLO F.;
PABLO F.;
TERESA G.;
MELINA K.;
JESICA L.;
IVAN L.;
MELISA L.;
JULIETA M.;
MAURICIO M.;
MARIA M.;
KARINA O.;
KARINA P.;
FERNANDO P.;
M. PERULLINI;
FERNANDO R.;
GISELLE S.;
DIEGO H.;
VERONICA M.;
MARIA S.;
D. VEGA;
MARÍA B.;
HILDA S.;
DIEGO H.;
ROBERTO M.;
FRANCO C.;
NADIA C.;
SEBASTIAN G.;
ALEJANDRO S.;
FERNANDO S.;
AXEL A.;
MATIAS A.;
C. AGUILAR;
C. AIANI;
DANIEL A.;
FEDERICO Á.;
A. ALVAREZ;
O. ALZOGARAY;
JAIME A.;
P. AMATO;
I. ANAYA;
M. ARCALÁ;
LEANDRO A.;
E. ARZANI;
INGRID A.;
G. AVIGLIANO;
JORGE B.;
MARTIN B.;
M. BARLETTA;
HIPÓLITO B.;
M. BEKERMAN;
B. BERRY;
ALEJANDRO B.;
A. BLYTHMAN;
MARTIN B.;
BERNABE B.;
J.BOTTINELLI;
M. BRAHIM;
M. BRONZINO;
RAMIRO B.;
M. BRUNETTI;
N. CABIRON;
J. CABRINI;
SEBASTIAN C.;
CLAUDIA C.;
E. CALDARARO;
TOMAS C.;
EMANUEL C.;
M. CAPUTO;
SERGIO C.;
SANTIAGO C.;
M. CASANOVA;
D. CASTEX;
J. CASTRO;
LORENA C.;
FLAVIA C.;
LEANDRO C.;
DIEGO C.;
T. CHERNOFF;
J. CHESTER;
ROMINA C.;
ANDRES C.;
G. CHWOJNIK;
M. COBE;
CAMILO C.;
I. COLENZIO;
ALVARO C.;
PABLO C.;
V.COSTANTINO;
MAURO C.;
JUAN C.;
MARTIN C.;
DALESSANDRO;
GABRIELA D.;
G. DIAZ;
GUIDO D.;
CARMEN D.;
A. DORFMAN;
E. DUCROS;
F. DURANTE;
GABRIEL E.;
ALAN E.;
GUILLERMO E.;
MARTÍN E.;
PABLO F.;
M. FAL;
FEDERICO F.;
M. FERNANDEZ;
JOSE F.;
ANDRES F.;
S. FERNANDEZ;
G. FERREIRA;
LUIS F.;
NICOLÁS F.;
M. FLOCCARI;
D. FRANCISCO;
S. FREIMAN;
ALEJANDRO F.;
E. FRITZ;
SEBASTIAN G.;
LUCIANO G.;
G. GARCIA;
JUAN G.;
J. GAZZANO;
BRUNO G.;
M. GELMAN;
ANDRES G.;
MARIANO G.;
B.GIELCZYNSKY;
JUAN G.;
F. GIRASOL;
EZEQUIEL G.;
GONZALO G.;
ROCÍO G.;
G. GONZÁLEZ;
RICARDO G.;
SERGIO G.;
PABLO G.;
D. GRAU;
MARIA G.;
SEBASTIAN G.;
DAMIAN G.;
RENATA G.;
MARTÍN G.;
FRANCISCO G.;
NICOLÁS G.;
JUAN G.;
OSCAR G.;
LAUTARO H.;
G. HEILER;
SILVIA I.;
SILVIA I.;
I. JARDON;
W. JIMENEZ;
F. JOHANN;
P. JUTARD;
BRIAN K.;
AGUSTIN K.;
J. KATSELIS;
MARTIN K.;
L. KOMRATOV;
SANTIAGO L.;
JUAN L.;
DAMIANA L.;
TEO L.;
PABLO L.;
M. LOIZAGA;
LUIS L.;
D. LOPEZ;
MARÍA L.;
ALEJANDRO L.;
SEBASTIAN L.;
FERNANDO M.;
DAMIAN M.;
B. MAGGI;
M. MAGRI;
P. MALATO;
EMILIO M.;
MATÍAS M.
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
