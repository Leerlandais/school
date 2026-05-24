<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class SchoolVisitLogsMapping extends AbstractMapping
{
    private int $visit_id;
    private string $visit_ip;
    private string $visit_date;

    public function getVisitId(): int
    {
        return $this->visit_id;
    }

    public function setVisitId(int $visit_id): void
    {
        $this->visit_id = $visit_id;
    }

    public function getVisitDate(): string
    {
        return $this->visit_date;
    }

    public function setVisitDate(string $visit_date): void
    {
        $this->visit_date = $visit_date;
    }

    public function getVisitIp(): string
    {
        return $this->visit_ip;
    }

    public function setVisitIp(string $visit_ip): void
    {
        $this->visit_ip = $visit_ip;
    }


}