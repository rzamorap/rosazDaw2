<?php
// definimos los valores iniciales para nuestro calendario
$month=date("n");  //mes
$year=date("Y");  //dia
$diaActual=date("j"); //dia actual
 // la funcion mktime  devuelve la marca de tiempo de Unix 
// Obtenemos el dia de la semana del primer dia
//Devuelve 0 para domingo, 6 para sabado
$diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;
// Obtenemos el ultimo dia del mes
$ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
 
$meses=array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
"Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario con PHP y HTML</title>
    <style>
    table {
        border-collapse: collapse;
      
    }

    table,
    th,
    td {
        border: 1px solid black;
        text-align:right;
        padding:5px;
        margin:8px;
    }
    </style>
</head>

<body>
    <h1>Calendario</h1>
    <table>
    <!-- mostramos el mes y el año como cabecera de la tabla-->
        <caption><?php echo $meses[$month-1]." ".$year?></caption>
        <tr>
            <th>Lun</th>
            <th>Mar</th>
            <th>Mie</th>
            <th>Jue</th>
            <th>Vie</th>
            <th>Sab</th>
            <th>Dom</th>
        </tr>
        <tr>
            <?php

		$last_cell=$diaSemana+$ultimoDiaMes;
		// hacemos un bucle hasta 42, que es el máximo de valores que puede
		//  haber... 6 columnas de 7 dias
		for($i=1;$i<=42;$i++)
		{
			if($i==$diaSemana)
			{
				// determinamos en que dia empieza
				$day=1;
			}
			if($i<$diaSemana || $i>=$last_cell)
			{
				// celda vacia
				echo "<td>&nbsp;</td>";
			}else{
				// mostramos el dia actual
				if($day==$diaActual)
					echo "<td >$day</td>";
				else
					echo "<td>$day</td>";
				$day++;
			}
			// cuando llega al final de la semana, iniciamos una columna nueva
			if($i%7==0)
			{
				echo "</tr><tr>\n";
			}
		} 
	?>
        </tr>
    </table>
</body>

</html>