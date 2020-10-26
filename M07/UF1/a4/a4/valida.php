<?php
   //comprobando campos de usuario y contraseña
   $errornom="";
   $errorpass="";
   $error=false;
   
   function valida_email($email){
       if (empty($email)){
           $errornom = "el email es obligatorio";
       }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $errornom = "EL formato es incorrecto";
       }else if ($email == "rosa@gmail.com"){
           $errornom="";
       }else {
           $errornom="incorrecte";
       }
       return $errornom;
   }
   
   
   //validacion de contraseña obligatoria solo letras y numeros
   function valida_contrasena($pass){
       if (empty($pass)){
           $errorpass = "La contraseña es obligatoria";
       }else if (!preg_match("/^[a-zA-Z0-9-' ]*$/",$pass)) {
           $errorpass = "Solo letras y numeros";
       }else if ($pass == "sol123"){
           $errorpass="";
       }else {
           $errorpass="contraseña incorrecta";
       }
       return $errorpass;
   }
            ?>