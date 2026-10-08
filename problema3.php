<?php
final class CocheFinal {
    public function getColor() {
        echo "Rojo";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 3</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<?php include("menu.php"); ?>

<h1>Problema 3</h1>
<p>Impedir que la clase pueda heredarse usando la palabra final.</p>

<?php
$coche = new CocheFinal();
$coche->getColor();

// Intenta heredar de la clase final: da error fatal
include("CocheDeLujoFinal.php");
?>

</body>
</html>
