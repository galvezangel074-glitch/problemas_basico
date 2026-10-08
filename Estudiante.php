<?php
include_once("Persona.php");

class Estudiante extends Persona {
    protected string $codigo;
    protected float $indiceAcademico;
    protected int $cohorte;
    protected int $estadoAcademico;
    protected int $modalidadEstudio;

    public function __construct(
        string $codigo,
        float $indiceAcademico,
        int $cohorte,
        int $estadoAcademico,
        int $modalidadEstudio,
        string $nombre,
        string $apellido,
        string $fechaNacimiento
    ) {
        parent::__construct($nombre, $apellido, $fechaNacimiento);
        $this->codigo = $codigo;
        $this->indiceAcademico = $indiceAcademico;
        $this->cohorte = $cohorte;
        $this->estadoAcademico = $estadoAcademico;
        $this->modalidadEstudio = $modalidadEstudio;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getIndiceAcademico() {
        return $this->indiceAcademico;
    }

    public function getCohorte() {
        return $this->cohorte;
    }

    public function getEstadoAcademico() {
        return $this->estadoAcademico;
    }

    public function getModalidadEstudio() {
        return $this->modalidadEstudio;
    }
}
