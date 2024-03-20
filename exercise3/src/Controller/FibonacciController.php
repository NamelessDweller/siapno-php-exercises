<?php
declare(strict_types=1);

namespace exercise3\Controller;

use exercise3\Model\FibonacciModel;

class FibonacciController
{
    private $model;

    public function __construct(FibonacciModel $model)
    {
        $this->model = $model;
    }

    public function generateSeries(int $length): array
    {
        return $this->model->generateSeries($length);
    }
}
