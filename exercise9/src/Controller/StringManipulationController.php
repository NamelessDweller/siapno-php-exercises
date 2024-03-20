<?php
declare(strict_types=1);

namespace exercise9\Controller;

use exercise9\Model\StringManipulationModel;

class StringManipulationController
{
    private $model;

    public function __construct(StringManipulationModel $model)
    {
        $this->model = $model;
    }

    public function concatenate($str1, $str2)
    {
        return $this->model->concatenate($str1, $str2);
    }

    public function getSubstring($str, $start, $length = null)
    {
        return $this->model->getSubstring($str, $start, $length);
    }

    public function replaceSubstring($str, $search, $replace)
    {
        $subStr = $this->getSubstring($str, (int) $search);
        return str_replace($subStr, $replace, $str);
    }
}
