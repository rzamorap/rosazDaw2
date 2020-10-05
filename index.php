<h1>Calendario</h1>
<style>
table{
    width:300px;
    font-size:24px;
}
</style>
<?php 
$mes = date("m"); 
$año = date ("Y");
$semana = array ("Mon","Tue", "Wed", "Thu","Fri","Sat","Sun");
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
for ($i=0;$i<=6;$i++){
    if (date("D",mktime(0,0,0,$mes,1,$año))==$semana[$i]){
        echo "<td>", date("d", mktime(0,0,0,$mes,1,$año)) ,"</td>"; 
            if ( date("D",mktime(0,0,0,$mes,1,$año))=="Sun" ){
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
    if ( date("D",mktime(0,0,0,$mes,$j,$año))=="Sun" )  {
        echo      "<td>",   date("d", mktime(0,0,0,$mes,$j,$año)), "</td >", "</tr>", "<tr>"; 
    }else{
        echo      "<td>",   date("d", mktime(0,0,0,$mes,$j,$año)) ,  "</td>" ;
    }
}
echo "</tr>";
echo "</tbody>";
echo "</table>";

?>

