<?php
class Circulo {
    private float $radio;

    public function __construct(float $radio) {
        $this->radio = $radio;
    }

    public function calcularArea() {
        return M_PI * ($this->radio * $this->radio);
    }

    public function calcularPerimetro() {
        return 2 * M_PI * $this->radio;
    }
}
