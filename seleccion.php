<?php
    session_start();
?>
<html>
<head>
    <title>Alumnos</title>
    <style>
	table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin: 45px;     width: 500px; text-align: left;    border-collapse: collapse; }

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

$registro=$_REQUEST['id_curso'];

$sql =  "SELECT alumnos.id_alumno, alumnos.nombre, alumnos.apellidos, alumnos.curso 
FROM alumnos INNER JOIN cursos ON alumnos.curso=cursos.nombre 
WHERE cursos.id_curso=".$registro;

$result = mysqli_query($conexion,$sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Curso</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["id_alumno"]. "</td><td> " . $row["nombre"]. "</td><td> " . $row["apellidos"]. "</td><td> " . $row["curso"];
        echo "</td><td> <a href=notas.php?id_alumno=". $row["id_alumno"].">Ver Notas</a> ";
    }
	echo "</table>";
} 

mysqli_close($conexion);
?>
<br>
<a href="home.php">Inicio</a>
</body>
</html>