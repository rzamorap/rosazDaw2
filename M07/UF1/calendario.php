<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <h1>Calendario</h1>
<style>
table{
    width:300px;
    font-size:24px;
}
</style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario PHP</title>
</head>
<body> 
    




<style>
table{
    width:300px;
    font-size:24px;
}
</style>
<?php 
$mes = date("m"); 
$any= date ("Y");
$semana = array('Mon','Thw','Wen','Thu','Fry','Sat','Sun');;
echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<th colspan='7'>",date("M, Y"),"</th>";
echo "</tr>";
echo "<tr>";
echo "<th>Lu</th><th>Ma</th><th>Mi</th><th>Ju</th><th>Vi</th><th>Sa</th><th>Do</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
//// MARCO EL DÍA 1º DEL MES:  ////////////////////
echo "<tr>";
//compara mktime con la array semana
for ($i=0;$i<=6;$i++){
    if (date("D",mktime(0,0,0,$mes,1,$any))==$semana[$i]){
        echo "<td>", date("d", mktime(0,0,0,$mes,1,$any)) ,"</td>"; 
            if ( date("D",mktime(0,0,0,$mes,1,$any))=="Sun" ){ // si es domingo haz otra fila 
                echo "</tr>","<tr>"; 
                break;
            }else{
                break;
            }
        break;        
    }else{
        echo  "<td>", "</td>"  ;
    }
}


/////////marco los días subsiguientes////////////////////
for ($j=2;$j<=date("t");$j++){
    if ( date("D",mktime(0,0,0,$mes,$j,$any))=="Sun" )  {
        echo      "<td>",   date("d", mktime(0,0,0,$mes,$j,$any)), "</td >", "</tr>", "<tr>"; 
    }else{
        echo      "<td>",   date("d", mktime(0,0,0,$mes,$j,$any)) ,  "</td>" ;
    }
}
echo "</tr>";
echo "</tbody>";
echo "</table>";


?>
 </body>
</html> 