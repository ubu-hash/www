<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset=UTF-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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
<h1>Curso 2020-2021</h1>
<h2>Profesor <?php echo $_SESSION['usuario'];?> bienvenido al portal de notas del instituto DS.</h2>
<h3>Selecciona qué curso quieres consultar:</h3>
<?php

include ("conexion.php");

$sql =  "SELECT id_curso, nombre FROM cursos";
$result = mysqli_query($conexion,$sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>ID</th><th>CURSO</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["id_curso"]. "</td><td> " . $row["nombre"];
        echo "</td><td> <a href=seleccion.php?id_curso=". $row["id_curso"].">Seleccionar</a> ";
    }
	echo "</table>";
} 

mysqli_close($conexion);
?>
<br>
<a href="logout.php">Cerrar Sesión</a>
</body>
</html>