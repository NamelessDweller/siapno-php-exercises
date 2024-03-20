<?php
declare(strict_types=1);

namespace exercise8\Controller;

use exercise8\Model\DateTimeModel;

class DateTimeController
{
    private $model;

    public function __construct(DateTimeModel $model)
    {
        $this->model = $model;
    }

    public function getDateTime(): array
    {
        return $this->model->getDateTimeInfo();
    }
}
