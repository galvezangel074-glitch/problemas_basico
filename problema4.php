<?php include("Circulo.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 4</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<?php include("menu.php"); ?>

<h1>Problema 4</h1>
<p>Crear una clase para generar el área y el perímetro de un círculo.</p>

<h2>Resultado</h2>
<?php
$miCirculo = new Circulo(4);
echo "Radio: 4<br>";
echo "Área del círculo: " . number_format($miCirculo->calcularArea(), 2, ".", ",") . "<br>";
echo "Perímetro del círculo: " . number_format($miCirculo->calcularPerimetro(), 2, ".", ",");
?>

</body>
</html>
