<?php
include_once("Persona.php");

class Docente extends Persona {
    protected string $codigo;
    protected string $departamento;
    protected string $categoria;
    protected string $maximoTitulo;
    protected string $tipoContratacion;

    public function __construct(
        string $codigo,
        string $departamento,
        string $categoria,
        string $maximoTitulo,
        string $tipoContratacion,
        string $nombre,
        string $apellido,
        string $fechaNacimiento
    ) {
        parent::__construct($nombre, $apellido, $fechaNacimiento);
        $this->codigo = $codigo;
        $this->departamento = $departamento;
        $this->categoria = $categoria;
        $this->maximoTitulo = $maximoTitulo;
        $this->tipoContratacion = $tipoContratacion;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getMaximoTitulo() {
        return $this->maximoTitulo;
    }

    public function getTipoContratacion() {
        return $this->tipoContratacion;
    }
}
