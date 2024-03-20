<?php
declare(strict_types=1);

namespace exercise2\Controller;

use exercise2\Model\CalculatorModel;

class CalculatorController
{
    private $model;

    public function __construct(CalculatorModel $model)
    {
        $this->model = $model;
    }

    public function calculate($a, $b, $operation)
    {
        // Validate input as integers
        $a = filter_var($a, FILTER_VALIDATE_INT);
        $b = filter_var($b, FILTER_VALIDATE_INT);

        if ($a === false || $b === false) {
            throw new \InvalidArgumentException("Inputs must be integers.");
        }

        switch ($operation) {
            case 'add':
                return $this->model->add($a, $b);
            case 'subtract':
                return $this->model->subtract($a, $b);
            case 'multiply':
                return $this->model->multiply($a, $b);
            case 'divide':
                return $this->model->divide($a, $b);
            default:
                throw new \InvalidArgumentException("Invalid operation.");
        }
    }
}
