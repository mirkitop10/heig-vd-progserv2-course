<?php
require_once __DIR__ . '/../src/CalculatorInterface.php';
class Calculator implements CalculatorInterface {
    private float $currentValue = 0;

    public function add(float $a, ?float $b = null): float {
        if ($b === null) {
            $this->currentValue = $this->currentValue + $a;   // un seul argument
        } else {
            $this->currentValue = $a + $b;   // deux arguments
        }
        return $this->currentValue;
    }
    public function subtract(float $a, ?float $b = null): float {
        if ($b === null) {
            $this->currentValue = $this->currentValue - $a;   // un seul argument
        } else {
            $this->currentValue = $a - $b;   // deux arguments
        }
        return $this->currentValue;
    }
    public function clear(): void {
        $this->currentValue = 0;
    }

    public function getCurrentValue(): float {
        return $this->currentValue;
    }
}
