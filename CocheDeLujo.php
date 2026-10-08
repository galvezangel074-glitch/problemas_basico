<?php
include_once("Coche.php");

class CocheDeLujo extends Coche {
    protected $extras;

    public function setExtras($extras) {
        $this->extras = $extras;
    }

    public function getExtras() {
        return $this->extras;
    }

    public function printCaracteristicas() {
        echo 'Color: ' . $this->color;
        echo '<hr/>';
        echo 'Extras: ' . $this->extras;
    }
}
