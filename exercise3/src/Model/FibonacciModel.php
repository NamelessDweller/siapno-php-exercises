<?php
declare(strict_types=1);

namespace exercise3\Model;

class FibonacciModel
{
    public function generateSeries(int $length): array
    {
        $fibonacci = [0, 1];
        for ($i = 2; $i < $length; $i++) {
            $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
        }
        return $fibonacci;
    }
}
