<?php
    session_start();
?>
<html>
<head>
    <title>Notas</title>
    <style>
	table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin: 45px;     width: 350px; text-align: left;    border-collapse: collapse; }

    th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

    td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

    tr:hover td { background: #d0dafd; color: #339; }
    h1, h2, h3 {
        font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
        margin: 45px;
    }
    a {
        margin: 45px;
    }
	
    * { 
        background:url("css/fondolegal.png");
    }
	</style>
</head>
<body>
<?php

include ("conexion.php");

$registro=$_REQUEST['id_alumno'];


$sql1= "SELECT alumnos.nombre, alumnos.apellidos 
FROM alumnos WHERE alumnos.id_alumno=".$registro;

$result1= mysqli_query($conexion,$sql1);
if (mysqli_num_rows($result1) > 0) {
    while($row = mysqli_fetch_assoc($result1)) {
        echo "<h2>".$row["nombre"]."<br>".$row["apellidos"]."</h2>";
    }
	
} 


$sql =  "SELECT asignaturas.nombre, notas_alumnos_asignaturas.nota
FROM asignaturas INNER JOIN notas_alumnos_asignaturas 
ON asignaturas.id_asignatura=notas_alumnos_asignaturas.id_asignatura
WHERE notas_alumnos_asignaturas.id_alumno=".$registro;

$result = mysqli_query($conexion,$sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>Nombre asignatura</th><th>Nota</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["nombre"]. "</td><td> " . $row["nota"];
    }
    echo "</table>";
   
} 

mysqli_close($conexion);
?>
<br>
<a href="home.php?id">Inicio</a>
</body>
</html>