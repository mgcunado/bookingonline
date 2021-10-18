<?php 
$vargenamodificar = "comodin='yes'";
$importets1 ? $vargenamodificar .= ", iva=$importets1" : $vargenamodificar = $vargenamodificar;
$importets2 ? $vargenamodificar .= ", habindividual=$importets2" : $vargenamodificar = $vargenamodificar;
$importets3 ? $vargenamodificar .= ", habdoble=$importets3" : $vargenamodificar = $vargenamodificar;
$importets4 ? $vargenamodificar .= ", habdoblesupl=$importets4" : $vargenamodificar = $vargenamodificar;
$importets5 ? $vargenamodificar .= ", habfamiliar=$importets5" : $vargenamodificar = $vargenamodificar;
$importets6 ? $vargenamodificar .= ", pvphabindividual=$importets6" : $vargenamodificar = $vargenamodificar;
$importets7 ? $vargenamodificar .= ", pvphabdoble=$importets7" : $vargenamodificar = $vargenamodificar;
$importets8 ? $vargenamodificar .= ", pvphabdoblesupl=$importets8" : $vargenamodificar = $vargenamodificar;
$importets9 ? $vargenamodificar .= ", pvphabfamiliar=$importets9" : $vargenamodificar = $vargenamodificar;
$importets10 ? $vargenamodificar .= ", pvpdesayuno=$importets10" : $vargenamodificar = $vargenamodificar;


$qrytarstd = "update variablesgenerales set $vargenamodificar"; 
 $restarstd = $conexion->query($qrytarstd);








