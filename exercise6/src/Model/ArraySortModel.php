<?php
declare(strict_types=1);

namespace exercise6\Model;

class ArraySortModel
{
    public function sortArray(array $array, string $order = 'asc'): array
    {
        if ($order === 'asc') {
            sort($array);
        } else {
            rsort($array);
        }
        return $array;
    }
}
