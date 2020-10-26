<?php
//iniciamos sesion

session_start();
$error="";
    if(isset($_COOKIE["password"])){
        if($_COOKIE["password"]=="782b2fcdcd91cdb82fa4634942e6b7dacbcbbf73" 
        && $_COOKIE["nomusuari"]=="rosa@gmail.com"){
        
            $_SESSION["username"]=$_COOKIE["nomusuari"];
            header('Location:privado.php');  
        }else{
            $error="error";
        }
            
    }

  
    if(isset($_REQUEST["submit"])){
        //encriptado contraseña "sol123"
                if(sha1(md5($_REQUEST["password"]))=="782b2fcdcd91cdb82fa4634942e6b7dacbcbbf73"){
            if(isset($_REQUEST["recordar"])&&$_REQUEST["recordar"]==1){
        /* aqui se crea la cockie con el valor que recogemos del encriptado de
        la contraseña  */ 
                setcookie("password",sha1(md5($_REQUEST["password"])),time()+365*24*60*60);
                setcookie("nomusuari",($_REQUEST["username"]),time()+365*24*60*60);
            }
            header('Location:privado.php');           
        }else{
            $error="Usuario o contraseña incorrecta.";
        }
}
 

// para llamar la validacion 

function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
     }

// validando con funciones externa
if ($_SERVER['REQUEST_METHOD']=='POST'){
    include 'valida.php';
    $usuario = test_input($_REQUEST["username"]);
    $password = test_input($_REQUEST["password"]);        
  
    $errusuario= valida_email( $usuario );
    $errpassword= valida_contrasena($password);
                
    
    }
                

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Login </title>
</head>

    <?=$error?>

<body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sesiones y Cockies</title>
</head>
<form  method="post" action="" enctype="multipart/form-data"  align=center>

  
        <label> Usuario </label>
          <input type="text"  name="username" value="<?php if ($_SERVER['REQUEST_METHOD']=='POST') echo $_REQUEST["username"] ?>" id=""/>
          <span class="error"><? if (isset($errusuario)) echo $errusuario;?></span>
   
          <br><br>
         
      <label for="password">Password</label>
             <input type="password" name="password"  value="<?=$password?>">
             <sapn class="error"><? if (isset($errpassword))echo$errpassword;?></span>
           
             <br><br>
      <label for="password">Recordar</label>
        <input type="checkbox" checked="checked" name="recordar" value="1">
         <br><br>
         <input type="submit" name="submit" value="Enviar">
         <br><br>                  
         
    </form>
    <div>
     
     <!-- Mensaje de cookies -->
     <div class="cookies" align=center>
         
         <p>Aceptas nuestras cookies</p>
         <a href="?politica-cookies=1">Aceptar</a>
         <a href="https://www.google.com/">Rechazar</a>
     </div>

</div>
    

</body>
</html>