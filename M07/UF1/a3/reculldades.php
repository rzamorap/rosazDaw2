<?php

echo "Bienvenido " .$_REQUEST["nom"]." ".$_REQUEST["cognom"];

/*controlando si una variable no esta definida*/
if (isset($_REQUEST["nom"]) ){
    print_r($_REQUEST["nom"]);
}



?>