<?php
declare(strict_types=1);

namespace exercise8\Model;

class DateTimeModel
{
    public function getDateTimeInfo(): array
    {
        $now = new \DateTime('now', new \DateTimeZone('Asia/Manila'));

        return [
            'ymdHis' => $now->format('Y-m-d H:i:s'),
            'dayName' => $now->format('l'),
            'iso8601' => $now->format(\DateTime::ATOM),
            'rfc2822' => $now->format(\DateTime::RFC2822),
            'timestamp' => $now->getTimestamp()
        ];
    }
}
