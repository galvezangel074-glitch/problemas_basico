<?php
class A {
    public static function miFuncion() {
        echo __CLASS__;
    }

    public static function otraFuncion() {
        static::miFuncion();
    }

    public static function otraFuncionSelf() {
        self::miFuncion();
    }
}

class B extends A {
    public static function miFuncion() {
        echo __CLASS__;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 2</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<?php include("menu.php"); ?>

<h1>Problema 2</h1>
<p>Correrlo con static y con self, y revisar los resultados.</p>

<h2>Resultado</h2>
<p>Con static: <?php B::otraFuncion(); ?></p>
<p>Con self: <?php B::otraFuncionSelf(); ?></p>

</body>
</html>
