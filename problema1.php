<?php include("CocheDeLujo.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 1</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<?php include("menu.php"); ?>

<h1>Problema 1</h1>
<p>Crear la clase CocheDeLujo que hereda de Coche.</p>

<h2>Resultado</h2>
<?php
$miCoche = new CocheDeLujo();
$miCoche->setColor('negro');
$miCoche->setExtras('TV');
$miCoche->printCaracteristicas();
?>

</body>
</html>
