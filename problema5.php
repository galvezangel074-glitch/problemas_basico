<?php
include("Estudiante.php");
include("Docente.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 5</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<?php include("menu.php"); ?>

<h1>Problema 5</h1>
<p>Crear la clase Persona y dos clases que la hereden: Estudiante y Docente.</p>

<h2>Estudiante</h2>
<?php
$miEstudiante = new Estudiante(
    "8-988-123", // código
    3.5,         // índice académico
    2023,        // cohorte
    1,           // estado académico (1 = activo)
    2,           // modalidad de estudio (2 = virtual)
    "Juan",
    "Pérez",
    "2000-05-15"
);

echo "Nombre: " . $miEstudiante->getNombre() . "<br>";
echo "Apellido: " . $miEstudiante->getApellido() . "<br>";
echo "Fecha de nacimiento: " . $miEstudiante->getFechaNacimiento() . "<br>";
echo "Código: " . $miEstudiante->getCodigo() . "<br>";
echo "Índice académico: " . $miEstudiante->getIndiceAcademico() . "<br>";
echo "Cohorte: " . $miEstudiante->getCohorte() . "<br>";
echo "Estado académico: " . $miEstudiante->getEstadoAcademico() . "<br>";
echo "Modalidad de estudio: " . $miEstudiante->getModalidadEstudio();
?>

<h2>Docente</h2>
<?php
$miDocente = new Docente(
    "DOC-0457",
    "Computación",
    "Titular",
    "Magíster",
    "Tiempo completo",
    "María",
    "González",
    "1982-03-20"
);

echo "Nombre: " . $miDocente->getNombre() . "<br>";
echo "Apellido: " . $miDocente->getApellido() . "<br>";
echo "Fecha de nacimiento: " . $miDocente->getFechaNacimiento() . "<br>";
echo "Código: " . $miDocente->getCodigo() . "<br>";
echo "Departamento: " . $miDocente->getDepartamento() . "<br>";
echo "Categoría: " . $miDocente->getCategoria() . "<br>";
echo "Máximo título: " . $miDocente->getMaximoTitulo() . "<br>";
echo "Tipo de contratación: " . $miDocente->getTipoContratacion();
?>

<p>Estado académico: 0 Inactivo, 1 Activo, 2 Retirado, 3 Graduado.<br>
Modalidad: 1 Presencial, 2 Virtual, 3 Híbrida.</p>

</body>
</html>
