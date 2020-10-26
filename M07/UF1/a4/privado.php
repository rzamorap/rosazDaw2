<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
   
 </head>
<body>
<?php
session_start();
if(isset($_REQUEST["logout"])){
    session_destroy();
    setcookie("password",0,1);
    setcookie("nomusuari",0,1);
    header('Location:Login.php');           
}


if(isset($_COOKIE["nomusuari"])&&$_COOKIE["nomusuari"]=="rosa"){
    ?> 
          Bienvenido ......<?=$_COOKIE["nomusuari"]?>
          
          <a href="privado.php?logout"><input type="submit" name="registro" value="logout"></a>
         
  <?php
  }else{
      header('Location:Login.php');           
  
  }
  ?>

<?php
if(isset($_REQUEST['politica-cookies'])) {
    // Crea una cookie con la caducidad en este caso un año
    setcookie('politica', '1', time() + + 365 * 24 * 60 * 60);

}

?>
         
</body>
</html>