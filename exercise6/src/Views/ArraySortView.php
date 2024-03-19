<?php
declare(strict_types=1);

namespace exercise6\Views;

class ArraySortView
{
    public function render(bool $postRequestMade, $originalArrayInput, $sortedArrayString, $order)
    {
        $showResults = $postRequestMade && $sortedArrayString !== '';
        include "ArraySortForm.php";
    }
}