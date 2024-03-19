<?php
declare(strict_types=1);

namespace exercise6\Controller;

use exercise6\Model\ArraySortModel;

class ArraySortController
{
    private $model;

    public function __construct(ArraySortModel $model)
    {
        $this->model = $model;
    }

    public function sortArray(array $array, string $order): array
    {
        return $this->model->sortArray($array, $order);
    }
}